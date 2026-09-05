<?php

namespace App\Http\Controllers;

use App\Models\ContactEnquiry;
use App\Models\Plot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlotController extends Controller
{
    /**
     * Helper to format Eloquent Plot model into sanitized array for visitor.
     */
    protected function transformPlot(Plot $plot, bool $isUnlocked): array
    {
        $data = [
            'id' => (string) $plot->id,
            'number' => $plot->plot_number,
            'title' => $plot->title ?? ($plot->plot_number . ', ' . round($plot->size_sq_yards) . ' Sq. Yds'),
            'plot_type' => $plot->plot_type ?? 'regular',
            'size_sq_yards' => (float) $plot->size_sq_yards,
            'area' => $plot->area,
            'sqft' => $plot->sqft,
            'dimensions' => $plot->boundary_dimensions ?? "36'0\" × 45'0\"",
            'facing' => $plot->facing ?? 'East',
            'road_width' => $plot->road_width,
            'road_width_ft' => $plot->road_width_ft ?? 40,
            'status' => strtolower($plot->status ?? 'available'),
            'is_vaastu_compliant' => (bool) ($plot->is_vaastu_compliant ?? true),
            'description' => $plot->notes ?? ('Auspicious ' . ($plot->facing ?? 'East') . '-facing residential villa plot located along the ' . ($plot->road_width ?? '40 Ft Road') . '. 100% Vaastu Compliance with underground utility connections, ready for immediate spot registration.'),
            'image' => $plot->image_url,
            'gallery' => $plot->gallery,
            'all_venture_photos' => $plot->all_venture_photos,
            'video_url' => 'https://www.youtube-nocookie.com/embed/JMyl8K2voHU',
            'is_price_unlocked' => $isUnlocked,
        ];

        if ($isUnlocked) {
            $data['price'] = $plot->formatted_price;
            $data['exact_price'] = $plot->formatted_exact_price;
            $data['price_per_sq_yard'] = (float) $plot->price_per_sq_yard;
            $data['price_per_sq_yard_formatted'] = $plot->formatted_price_per_sq_yard;
        }

        return $data;
    }

    /**
     * Display the public plot catalog listing — Interactive Availability Board.
     */
    public function index(Request $request)
    {
        $isUnlocked = session('prices_unlocked', false);

        // Select only columns needed for the board — excludes price columns for locked sessions
        $selectColumns = [
            'id', 'plot_number', 'title', 'plot_type', 'size_sq_yards',
            'facing', 'road_width_ft', 'boundary_dimensions',
            'status', 'is_vaastu_compliant', 'image', 'notes',
        ];
        // Only load price columns if unlocked
        if ($isUnlocked) {
            $selectColumns = array_merge($selectColumns, ['price_per_sq_yard', 'total_price']);
        }

        // Load all plots — client-side JS handles filtering/search for instant UX
        // Status-ordered: available first → reserved → sold, then by plot_number
        $allPlots = Plot::select($selectColumns)
            ->orderByRaw("FIELD(status, 'available', 'reserved', 'booked', 'sold')")
            ->orderBy('plot_number')
            ->get()
            ->map(fn($p) => $this->transformPlot($p, $isUnlocked));

        // Dynamic filter metadata from DB (no hardcoding)
        $distinctSizes   = Plot::select('size_sq_yards')->distinct()->orderBy('size_sq_yards')->pluck('size_sq_yards');
        $distinctFacings = Plot::select('facing')->distinct()->orderBy('facing')->pluck('facing');
        $distinctRoads   = Plot::select('road_width_ft')->distinct()->orderBy('road_width_ft')->pluck('road_width_ft');
        $distinctTypes   = Plot::select('plot_type')->distinct()->orderBy('plot_type')->pluck('plot_type');

        $counts = [
            'all'       => Plot::count(),
            'available' => Plot::available()->count(),
            'reserved'  => Plot::reserved()->count(),
            'sold'      => Plot::sold()->count(),
        ];

        $availableCount = $counts['available'];
        $reservedCount  = $counts['reserved'];
        $soldCount      = $counts['sold'];
        $totalCount     = $counts['all'];

        return view('plots.index', compact(
            'allPlots', 'counts',
            'availableCount', 'reservedCount', 'soldCount', 'totalCount',
            'distinctSizes', 'distinctFacings', 'distinctRoads', 'distinctTypes',
            'isUnlocked'
        ));
    }

    /**
     * Display individual plot details.
     */
    public function show($plotIdentifier)
    {
        $isUnlocked = session('prices_unlocked', false);

        // Find by primary ID, or by plot_number (e.g. "Plot #102", "102")
        $plotModel = Plot::where('id', $plotIdentifier)
            ->orWhere('plot_number', $plotIdentifier)
            ->orWhere('plot_number', 'Plot #' . $plotIdentifier)
            ->orWhere('plot_number', 'Plot #' . str_pad($plotIdentifier, 3, '0', STR_PAD_LEFT))
            ->first();

        if (!$plotModel) {
            abort(404, 'Plot not found in venture inventory.');
        }

        $plot = $this->transformPlot($plotModel, $isUnlocked);

        // Fetch other dynamic plots from database:
        // Guaranteed minimum 2 Available, 2 Filling up Fast (Reserved/Booked), and 1 Sold plot
        $otherPlots = $this->getOtherPlots($plotModel, $isUnlocked);

        // Status badge configuration
        $statusKey = strtolower($plot['status'] ?? 'available');
        $statusLabel = match($statusKey) {
            'reserved', 'booked' => 'Filling up Fast',
            'sold' => 'Sold Out',
            default => 'Available'
        };
        $statusClass = match($statusKey) {
            'reserved', 'booked' => 'status-reserved',
            'sold' => 'status-sold',
            default => 'status-available'
        };
        $statusIcon = match($statusKey) {
            'reserved', 'booked' => 'fa-fire-flame-curved',
            'sold' => 'fa-circle-xmark',
            default => 'fa-circle-check'
        };

        return view('plots.show', compact('plot', 'otherPlots', 'isUnlocked', 'statusClass', 'statusIcon', 'statusLabel'));
    }

    /**
     * Fetch other plots with guaranteed breakdown:
     * Minimum 2 Available, 2 Filling up Fast (Reserved/Booked), and 1 Sold plot,
     * prioritizing diverse sizes from the current plot.
     */
    protected function getOtherPlots(Plot $currentPlot, bool $isUnlocked): array
    {
        $currentSize = (float) $currentPlot->size_sq_yards;

        $getDiverse = function ($query, int $count) use ($currentSize) {
            $plots = collect();
            $distinctSizes = (clone $query)->distinct()->pluck('size_sq_yards');

            // Order sizes by greatest difference from current plot size to showcase other sizes
            $sortedSizes = $distinctSizes->sortByDesc(fn($sz) => abs((float) $sz - $currentSize))->values();

            foreach ($sortedSizes as $size) {
                if ($plots->count() >= $count) {
                    break;
                }
                $plot = (clone $query)->where('size_sq_yards', $size)->first();
                if ($plot && !$plots->contains('id', $plot->id)) {
                    $plots->push($plot);
                }
            }

            // Fill up if distinct sizes were fewer than requested count
            if ($plots->count() < $count) {
                $remaining = (clone $query)
                    ->whereNotIn('id', $plots->pluck('id'))
                    ->take($count - $plots->count())
                    ->get();
                $plots = $plots->concat($remaining);
            }

            return $plots;
        };

        // Minimum 2 Available, 2 Filling up Fast (reserved/booked), 1 Sold
        $availPlots = $getDiverse(Plot::where('id', '!=', $currentPlot->id)->available(), 2);
        $resvPlots  = $getDiverse(Plot::where('id', '!=', $currentPlot->id)->reserved(), 2);
        $soldPlots  = $getDiverse(Plot::where('id', '!=', $currentPlot->id)->sold(), 1);

        $selectedModels = $availPlots->concat($resvPlots)->concat($soldPlots);

        return $selectedModels->map(fn($p) => $this->transformPlot($p, $isUnlocked))->all();
    }

    /**
     * Handle lead submission to unlock price.
     */
    public function unlockPrice(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'phone' => 'required|string|min:10|max:20',
            'email' => 'required|email|max:150',
            'plot_id' => 'nullable|string|max:50',
            'preferred_visit_date' => 'nullable|date',
            'notes' => 'nullable|string|max:1000',
        ]);

        $plotId = $validated['plot_id'] ?? null;
        $plotModel = null;

        if ($plotId) {
            $plotModel = Plot::where('id', $plotId)
                ->orWhere('plot_number', $plotId)
                ->orWhere('plot_number', 'Plot #' . $plotId)
                ->orWhere('plot_number', 'Plot #' . str_pad($plotId, 3, '0', STR_PAD_LEFT))
                ->first();
        }

        if (!$plotModel) {
            $plotModel = Plot::first();
        }

        $notesText = !empty($validated['notes']) ? ', ' . $validated['notes'] : '';

        // Save Contact Enquiry lead to database
        $enquiry = ContactEnquiry::create([
            'plot_id' => $plotModel?->id,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'message' => 'Price Unlock Request for ' . ($plotModel ? $plotModel->plot_number : 'General Inventory') . $notesText,
            'preferred_visit_date' => $validated['preferred_visit_date'] ?? null,
            'status' => 'new',
            'source' => 'unlock_price_modal',
        ]);

        // Unlock price in visitor session
        session(['prices_unlocked' => true]);

        // Format response
        $price = $plotModel ? $plotModel->formatted_price : '₹25.05 Lakh';
        $exactPrice = $plotModel ? $plotModel->formatted_exact_price : '₹25,04,833';
        $rate = $plotModel ? (float) $plotModel->price_per_sq_yard : 14999;
        $rateFormatted = $plotModel ? $plotModel->formatted_price_per_sq_yard : '₹ 14,999 / Sq. Yard';

        // Load all plots formatted for updating client views
        $allPlotsData = Plot::select(['id', 'plot_number', 'size_sq_yards', 'price_per_sq_yard', 'total_price'])
            ->get()
            ->map(function ($p) {
                return [
                    'id' => (string) $p->id,
                    'number' => $p->plot_number,
                    'price' => $p->formatted_price,
                    'exact_price' => $p->formatted_exact_price,
                    'price_per_sq_yard' => (float) $p->price_per_sq_yard,
                    'price_per_sq_yard_formatted' => $p->formatted_price_per_sq_yard,
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Official Price Unlocked Successfully!',
            'plot_id' => $plotModel?->id,
            'plot_number' => $plotModel?->plot_number,
            'price' => $price,
            'exact_price' => $exactPrice,
            'price_per_sq_yard' => $rate,
            'price_per_sq_yard_formatted' => $rateFormatted,
            'all_plots' => $allPlotsData,
        ]);
    }
}
