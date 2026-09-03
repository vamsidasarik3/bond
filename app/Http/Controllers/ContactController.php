<?php

namespace App\Http\Controllers;

use App\Models\ContactEnquiry;
use App\Models\Plot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display the public contact & site visit booking page.
     */
    public function index(Request $request)
    {
        $ventureDetails = [
            'address' => 'Near AIIMS 750-Bed Hospital, NH-163 Warangal Expressway, Bibinagar, Telangana 508126.',
            'phone' => '+91 9617 699 699',
            'email' => 'info@navagruha.com',
            'website' => 'www.navagruha.com',
            'hours' => 'Mon – Sun: 9:00 AM – 6:30 PM',
        ];

        $plots = Plot::orderBy('plot_number')->get();
        $selectedPlotId = $request->query('plot_id');

        return view('contact', compact('ventureDetails', 'plots', 'selectedPlotId'));
    }

    /**
     * Handle public contact form & site visit booking submission.
     */
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'plot_id' => ['nullable', 'exists:plots,id'],
            'plot_size' => ['nullable', 'string', 'max:100'],
            'preferred_visit_date' => ['nullable', 'date', 'after_or_equal:today'],
            'time_slot' => ['nullable', 'string', 'max:50'],
            'pickup_location' => ['nullable', 'string', 'max:150'],
            'message' => ['nullable', 'string', 'max:3000'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        // Build rich enquiry details
        $extraDetails = [];
        if (!empty($validated['time_slot'])) {
            $extraDetails[] = "Time Slot: " . $validated['time_slot'];
        }
        if (!empty($validated['pickup_location'])) {
            $extraDetails[] = "Cab Pickup: " . $validated['pickup_location'];
        }
        if (!empty($validated['plot_size'])) {
            $extraDetails[] = "Plot Preference: " . $validated['plot_size'];
        }

        $fullMessage = $validated['message'] ?? '';
        if (!empty($extraDetails)) {
            $fullMessage = trim($fullMessage . "\n\n[Visit Details: " . implode(' | ', $extraDetails) . "]");
        }

        $visitDate = $validated['preferred_visit_date'] ?? null;
        $subject = $visitDate ? 'Site Visit Booking for ' . date('d M Y', strtotime($visitDate)) : 'Venture Enquiry & Site Tour Request';

        $enquiry = ContactEnquiry::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'plot_id' => !empty($validated['plot_id']) ? $validated['plot_id'] : null,
            'subject' => $subject,
            'message' => $fullMessage,
            'preferred_visit_date' => $visitDate,
            'status' => 'new',
            'admin_notes' => !empty($extraDetails) ? implode(', ', $extraDetails) : null,
        ]);

        return redirect()->route('contact')
            ->with('success', 'Your site visit request has been scheduled successfully! Booking ID: #' . str_pad($enquiry->id, 5, '0', STR_PAD_LEFT) . '. Our venture coordinator will call you to confirm your visit.');
    }
}
