<?php

namespace App\Http\Controllers;

use App\Models\ContactEnquiry;
use App\Models\Plot;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Public Plot Inventory API (Returns dynamic database plots for frontend interactive layouts and maps).
     */
    public function getPlotsApi(Request $request)
    {
        $query = Plot::query();

        if ($request->filled('status')) {
            if ($request->status === 'reserved' || $request->status === 'booked') {
                $query->whereIn('status', ['reserved', 'booked']);
            } else {
                $query->where('status', $request->status);
            }
        }

        $plots = $query->orderBy('plot_number')->get()->map(function ($plot) {
            return [
                'id' => $plot->id,
                'plot_number' => $plot->plot_number,
                'title' => $plot->title,
                'plot_type' => $plot->plot_type,
                'size_sq_yards' => (float) $plot->size_sq_yards,
                'price_per_sq_yard' => (float) $plot->price_per_sq_yard,
                'total_price' => (float) $plot->total_price,
                'formatted_price' => $plot->formatted_price,
                'formatted_exact_price' => $plot->formatted_exact_price,
                'facing' => $plot->facing,
                'road_width_ft' => $plot->road_width_ft,
                'boundary_dimensions' => $plot->boundary_dimensions,
                'status' => strtolower($plot->status) === 'booked' ? 'reserved' : strtolower($plot->status),
                'is_vaastu_compliant' => (bool) $plot->is_vaastu_compliant,
                'notes' => $plot->notes,
                'image_url' => $plot->image_url,
                'badge' => $plot->status_badge,
                'updated_at' => $plot->updated_at->toISOString(),
            ];
        });

        return response()->json([
            'success' => true,
            'venture' => 'Navagruha Infra Developers — AIIMS Bibinagar',
            'total' => $plots->count(),
            'data' => $plots,
        ]);
    }

    /**
     * Handle public contact / lead enquiry submission.
     */
    public function submitEnquiry(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:3000'],
            'plot_id' => ['nullable', 'exists:plots,id'],
            'preferred_visit_date' => ['nullable', 'date'],
        ]);

        $validated['status'] = 'new';
        $enquiry = ContactEnquiry::create($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your enquiry has been received. Our property executive will contact you shortly.',
                'enquiry_id' => $enquiry->id,
            ]);
        }

        return redirect()->back()
            ->with('success', 'Thank you! Your enquiry has been received. Our executive will reach out to you shortly.');
    }
}
