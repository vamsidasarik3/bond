<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PlotController extends Controller
{
    /**
     * Display a listing of plots with search, filtering, and pagination.
     */
    public function index(Request $request)
    {
        $query = Plot::query();

        // 1. Filter by Status (Available, Reserved, Sold)
        if ($request->filled('status')) {
            if ($request->status === 'reserved' || $request->status === 'booked') {
                $query->whereIn('status', ['reserved', 'booked']);
            } else {
                $query->where('status', $request->status);
            }
        }

        // 2. Filter by Facing
        if ($request->filled('facing')) {
            $query->where('facing', $request->facing);
        }

        // 3. Filter by Plot Type
        if ($request->filled('plot_type')) {
            $query->where('plot_type', $request->plot_type);
        }

        // 4. Search by Plot Number, Description, or Title
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('plot_number', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%")
                  ->orWhere('boundary_dimensions', 'like', "%{$search}%")
                  ->orWhere('notes', 'like', "%{$search}%");
            });
        }

        // 5. Sorting
        $sort = $request->get('sort', 'plot_number');
        $direction = $request->get('direction', 'asc');
        if (in_array($sort, ['plot_number', 'size_sq_yards', 'total_price', 'updated_at', 'status'])) {
            $query->orderBy($sort, $direction === 'desc' ? 'desc' : 'asc');
        } else {
            $query->orderBy('plot_number', 'asc');
        }

        $plots = $query->paginate(10)->withQueryString();

        // Status counts for filter tabs
        $counts = [
            'all' => Plot::count(),
            'available' => Plot::available()->count(),
            'reserved' => Plot::reserved()->count(),
            'sold' => Plot::sold()->count(),
        ];

        return view('admin.plots.index', compact('plots', 'counts'));
    }

    /**
     * Show the form for creating a new plot.
     */
    public function create()
    {
        return view('admin.plots.create');
    }

    /**
     * Store a newly created plot in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'plot_number' => ['required', 'string', 'max:50', 'unique:plots,plot_number'],
            'title' => ['nullable', 'string', 'max:255'],
            'plot_type' => ['nullable', 'string', Rule::in(['regular', 'corner', 'commercial'])],
            'size_sq_yards' => ['required', 'numeric', 'min:1', 'max:99999'],
            'price_per_sq_yard' => ['required', 'numeric', 'min:1', 'max:999999'],
            'facing' => ['required', 'string', 'max:50'],
            'road_width_ft' => ['nullable', 'integer', 'min:10', 'max:200'],
            'boundary_dimensions' => ['nullable', 'string', 'max:100'],
            'status' => ['required', 'string', Rule::in(['available', 'reserved', 'booked', 'sold'])],
            'is_vaastu_compliant' => ['nullable', 'boolean'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
        ], [
            'plot_number.unique' => 'A plot with this Plot Number already exists in the inventory.',
            'size_sq_yards.required' => 'Please enter the plot area in Sq. Yards.',
            'price_per_sq_yard.required' => 'Please enter the price rate per Sq. Yard.',
        ]);

        // Calculate total price
        $validated['total_price'] = round($validated['size_sq_yards'] * $validated['price_per_sq_yard'], 2);
        $validated['is_vaastu_compliant'] = $request->boolean('is_vaastu_compliant');
        $validated['plot_type'] = $validated['plot_type'] ?? 'regular';
        $validated['road_width_ft'] = $validated['road_width_ft'] ?? 40;

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('plots', 'public');
        }

        $plot = Plot::create($validated);

        return redirect()->route('admin.plots.index')
            ->with('success', "Plot '{$plot->plot_number}' ({$plot->size_sq_yards} Sq. Yds) has been created successfully.");
    }

    /**
     * Display the specified plot details.
     */
    public function show(Plot $plot)
    {
        $plot->load(['enquiries' => function ($q) {
            $q->latest();
        }]);

        return view('admin.plots.show', compact('plot'));
    }

    /**
     * Show the form for editing the specified plot.
     */
    public function edit(Plot $plot)
    {
        return view('admin.plots.edit', compact('plot'));
    }

    /**
     * Update the specified plot in storage.
     */
    public function update(Request $request, Plot $plot)
    {
        $validated = $request->validate([
            'plot_number' => ['required', 'string', 'max:50', Rule::unique('plots', 'plot_number')->ignore($plot->id)],
            'title' => ['nullable', 'string', 'max:255'],
            'plot_type' => ['nullable', 'string', Rule::in(['regular', 'corner', 'commercial'])],
            'size_sq_yards' => ['required', 'numeric', 'min:1', 'max:99999'],
            'price_per_sq_yard' => ['required', 'numeric', 'min:1', 'max:999999'],
            'facing' => ['required', 'string', 'max:50'],
            'road_width_ft' => ['nullable', 'integer', 'min:10', 'max:200'],
            'boundary_dimensions' => ['nullable', 'string', 'max:100'],
            'status' => ['required', 'string', Rule::in(['available', 'reserved', 'booked', 'sold'])],
            'is_vaastu_compliant' => ['nullable', 'boolean'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
        ], [
            'plot_number.unique' => 'A plot with this Plot Number already exists in the inventory.',
        ]);

        $validated['total_price'] = round($validated['size_sq_yards'] * $validated['price_per_sq_yard'], 2);
        $validated['is_vaastu_compliant'] = $request->boolean('is_vaastu_compliant');
        $validated['plot_type'] = $validated['plot_type'] ?? 'regular';
        $validated['road_width_ft'] = $validated['road_width_ft'] ?? 40;

        // Handle image replacement
        if ($request->hasFile('image')) {
            if ($plot->image && Storage::disk('public')->exists($plot->image)) {
                Storage::disk('public')->delete($plot->image);
            }
            $validated['image'] = $request->file('image')->store('plots', 'public');
        }

        $plot->update($validated);

        return redirect()->route('admin.plots.index')
            ->with('success', "Plot '{$plot->plot_number}' has been updated successfully.");
    }

    /**
     * Update the status of the specified plot directly from index page.
     */
    public function updateStatus(Request $request, Plot $plot)
    {
        $validated = $request->validate([
            'status' => ['required', 'string', Rule::in(['available', 'reserved', 'booked', 'sold'])],
        ]);

        $plot->update(['status' => $validated['status']]);

        // Recalculate status counts
        $counts = [
            'all' => Plot::count(),
            'available' => Plot::available()->count(),
            'reserved' => Plot::reserved()->count(),
            'sold' => Plot::sold()->count(),
        ];

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => "Plot '{$plot->plot_number}' status updated to " . ucfirst($plot->status),
                'status' => $plot->status,
                'plot_id' => $plot->id,
                'counts' => $counts,
            ]);
        }

        return back()->with('success', "Plot '{$plot->plot_number}' status updated to " . ucfirst($plot->status));
    }

    /**
     * Remove the specified plot from storage.
     */
    public function destroy(Plot $plot)
    {
        $plotNum = $plot->plot_number;

        // Remove image if exists
        if ($plot->image && Storage::disk('public')->exists($plot->image)) {
            Storage::disk('public')->delete($plot->image);
        }

        $plot->delete();

        return redirect()->route('admin.plots.index')
            ->with('success', "Plot '{$plotNum}' was deleted from inventory successfully.");
    }
}
