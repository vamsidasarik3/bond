<?php

namespace App\Http\Controllers;

use App\Models\ContactEnquiry;
use App\Models\Plot;
use App\Services\LeadNotificationService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
            'venture' => 'Navagruha Infra Developers, AIIMS Bibinagar',
            'total' => $plots->count(),
            'data' => $plots,
        ]);
    }

    /**
     * Handle public contact / lead enquiry submission.
     */
    public function submitEnquiry(Request $request)
    {
        // 1. Anti-spam Honeypot check
        if ($request->filled('website_hp')) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your request has been received.',
            ]);
        }

        // 2. Strict Server-Side Validation
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email:rfc,filter', 'max:255'],
            'phone' => ['required', 'string', 'min:10', 'max:50', 'regex:/^[0-9+\s\-()]{10,20}$/'],
            'preferred_visit_date' => ['nullable', 'date', 'after_or_equal:today'],
            'project' => ['nullable', 'string', 'max:150'],
            'landing_page' => ['nullable', 'string', 'max:255'],
            'source' => ['nullable', 'string', 'max:100'],
            'utm_source' => ['nullable', 'string', 'max:100'],
            'utm_medium' => ['nullable', 'string', 'max:100'],
            'utm_campaign' => ['nullable', 'string', 'max:100'],
            'referrer' => ['nullable', 'string', 'max:500'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:3000'],
            'plot_id' => ['nullable', 'exists:plots,id'],
        ], [
            'name.required' => 'Please provide your full name.',
            'name.min' => 'Your name must be at least 2 characters.',
            'email.required' => 'Please provide your valid email address.',
            'email.email' => 'Please provide a valid email address.',
            'phone.required' => 'Please provide your 10-digit mobile number.',
            'phone.regex' => 'Please provide a valid mobile number.',
            'preferred_visit_date.after_or_equal' => 'The preferred visit date must be today or a future date.',
        ]);

        // 3. Normalize & Persist Lead in Database
        $rawSource = ! empty($validated['source']) ? trim($validated['source']) : 'Landing page';
        $source = str_ireplace('Landing Page 2', 'Landing page', $rawSource);

        $landingPage = ! empty($validated['landing_page']) ? trim($validated['landing_page']) : ($request->header('Referer') ? parse_url($request->header('Referer'), PHP_URL_PATH) : '/');
        if ($landingPage === '/landing2/' || $landingPage === '/landing2') {
            $landingPage = '/';
        }

        $visitDate = null;
        if (! empty($validated['preferred_visit_date'])) {
            try {
                $visitDate = Carbon::parse($validated['preferred_visit_date'])->format('Y-m-d');
            } catch (\Exception $e) {
                $visitDate = null;
            }
        }

        $enquiry = ContactEnquiry::create([
            'name' => trim($validated['name']),
            'email' => strtolower(trim($validated['email'])),
            'phone' => trim($validated['phone']),
            'preferred_visit_date' => $visitDate,
            'project' => ! empty($validated['project']) ? trim($validated['project']) : 'RRR Prekshitha Enclave',
            'landing_page' => $landingPage,
            'source' => $source,
            'utm_source' => $validated['utm_source'] ?? null,
            'utm_medium' => $validated['utm_medium'] ?? null,
            'utm_campaign' => $validated['utm_campaign'] ?? null,
            'referrer' => $validated['referrer'] ?? $request->header('Referer'),
            'subject' => $validated['subject'] ?? 'Site Visit & Project Enquiry',
            'message' => $validated['message'] ?? null,
            'plot_id' => $validated['plot_id'] ?? null,
            'status' => 'new',
        ]);

        // 4. Fail-Safe Email Notifications
        try {
            app(LeadNotificationService::class)->sendLeadNotifications($enquiry);
        } catch (\Throwable $e) {
            Log::error('PublicController: Notification service error: '.$e->getMessage());
        }

        // 5. Response
        if ($request->wantsJson() || $request->ajax() || $request->isJson()) {
            return response()->json([
                'success' => true,
                'lead_number' => $enquiry->lead_number,
                'message' => "Thank you, {$enquiry->name}! Your site visit request (Ref: {$enquiry->lead_number}) has been recorded. Our property advisor will contact you shortly.",
                'enquiry_id' => $enquiry->id,
            ]);
        }

        return redirect()->back()
            ->with('success', "Thank you, {$enquiry->name}! Your enquiry (Ref: {$enquiry->lead_number}) has been received. Our executive will reach out to you shortly.");
    }
}
