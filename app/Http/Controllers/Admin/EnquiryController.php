<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use App\Models\Plot;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EnquiryController extends Controller
{
    /**
     * Display a listing of customer contact enquiries with search, status & date filters, and pagination.
     */
    public function index(Request $request)
    {
        $query = ContactEnquiry::with('plot');

        // 1. Status Filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 2. Search by Name, Email, or Phone Number
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        // 3. Date-based filtering
        if ($request->filled('date_filter')) {
            match ($request->date_filter) {
                'today' => $query->whereDate('created_at', today()),
                'yesterday' => $query->whereDate('created_at', today()->subDay()),
                'last_7_days' => $query->where('created_at', '>=', now()->subDays(7)),
                'last_30_days' => $query->where('created_at', '>=', now()->subDays(30)),
                default => null,
            };
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Paginated results (10 per page)
        $enquiries = $query->latest()->paginate(10)->withQueryString();

        // Status counts for filter tabs
        $counts = [
            'all' => ContactEnquiry::count(),
            'new' => ContactEnquiry::new()->count(),
            'contacted' => ContactEnquiry::contacted()->count(),
            'in_progress' => ContactEnquiry::inProgress()->count(),
            'closed' => ContactEnquiry::closed()->count(),
        ];

        return view('admin.enquiries.index', compact('enquiries', 'counts'));
    }

    /**
     * Display the detailed enquiry view.
     */
    public function show(ContactEnquiry $enquiry)
    {
        $enquiry->load('plot');
        $plots = Plot::orderBy('plot_number')->get(['id', 'plot_number', 'size_sq_yards', 'status']);

        return view('admin.enquiries.show', compact('enquiry', 'plots'));
    }

    /**
     * Update status, plot association, and internal notes for an enquiry.
     */
    public function update(Request $request, ContactEnquiry $enquiry)
    {
        $validated = $request->validate([
            'status' => ['required', 'string', Rule::in(['new', 'contacted', 'in_progress', 'closed'])],
            'admin_notes' => ['nullable', 'string', 'max:2000'],
            'plot_id' => ['nullable', 'exists:plots,id'],
        ]);

        $enquiry->update($validated);

        return redirect()->back()
            ->with('success', 'Enquiry status and notes have been updated successfully.');
    }

    /**
     * Remove the enquiry from storage.
     */
    public function destroy(ContactEnquiry $enquiry)
    {
        $name = $enquiry->name;
        $enquiry->delete();

        return redirect()->route('admin.enquiries.index')
            ->with('success', "Enquiry from '{$name}' was removed successfully.");
    }
}
