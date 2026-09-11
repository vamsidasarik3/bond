<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use App\Models\EnquiryNote;
use App\Models\Plot;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EnquiryController extends Controller
{
    /**
     * Build the filtered enquiries query based on request parameters.
     */
    protected function buildEnquiryQuery(Request $request)
    {
        $query = ContactEnquiry::with('plot');

        // 1. Status Filter
        if ($request->filled('status')) {
            $status = $request->status;
            if ($status === 'in_progress') {
                $query->inProgress();
            } elseif ($status === 'closed') {
                $query->closed();
            } else {
                $query->where('status', $status);
            }
        }

        // 2. Search by Lead Number, Name, Email, Phone, Project, or Message
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('lead_number', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('project', 'like', "%{$search}%")
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

        return $query;
    }

    /**
     * Display a listing of customer contact enquiries with search, status & date filters, and pagination.
     */
    public function index(Request $request)
    {
        $query = $this->buildEnquiryQuery($request);

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
     * Export customer contact enquiries to a downloadable CSV file.
     */
    public function exportCsv(Request $request)
    {
        $query = $this->buildEnquiryQuery($request);

        $filename = 'leads-export-' . now()->format('Y-m-d_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $columns = [
            'Lead Number',
            'Name',
            'Email',
            'Phone',
            'Status',
            'Preferred Visit Date',
            'Project',
            'Related Plot',
            'Subject',
            'Message',
            'Source',
            'Landing Page',
            'UTM Source',
            'UTM Medium',
            'UTM Campaign',
            'Referrer',
            'Admin Notes',
            'Submission Date',
            'Last Updated',
        ];

        $callback = function () use ($query, $columns) {
            $handle = fopen('php://output', 'w');

            // UTF-8 BOM for Microsoft Excel compatibility
            fputs($handle, "\xEF\xBB\xBF");

            // Write CSV column headers
            fputcsv($handle, $columns);

            // Stream chunked records to keep memory usage minimal
            $query->latest()->chunk(200, function ($enquiries) use ($handle) {
                foreach ($enquiries as $enquiry) {
                    fputcsv($handle, [
                        $enquiry->lead_number ?: 'LEAD-#' . $enquiry->id,
                        $enquiry->name,
                        $enquiry->email,
                        $enquiry->phone,
                        ucfirst(str_replace('_', ' ', $enquiry->status)),
                        $enquiry->preferred_visit_date ? $enquiry->preferred_visit_date->format('Y-m-d') : '',
                        $enquiry->project ?? '',
                        $enquiry->plot ? $enquiry->plot->plot_number : ($enquiry->plot_id ? '#' . $enquiry->plot_id : ''),
                        $enquiry->subject ?? '',
                        $enquiry->message ?? '',
                        $enquiry->source ?? '',
                        $enquiry->landing_page ?? '',
                        $enquiry->utm_source ?? '',
                        $enquiry->utm_medium ?? '',
                        $enquiry->utm_campaign ?? '',
                        $enquiry->referrer ?? '',
                        $enquiry->admin_notes ?? '',
                        $enquiry->created_at ? $enquiry->created_at->format('Y-m-d H:i:s') : '',
                        $enquiry->updated_at ? $enquiry->updated_at->format('Y-m-d H:i:s') : '',
                    ]);
                }
            });

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Display the detailed enquiry view.
     */
    public function show(ContactEnquiry $enquiry)
    {
        $enquiry->load(['plot', 'emailLogs', 'notes.user']);
        $plots = Plot::orderBy('plot_number')->get(['id', 'plot_number', 'size_sq_yards', 'status']);
        $statuses = ContactEnquiry::getAvailableStatuses();

        return view('admin.enquiries.show', compact('enquiry', 'plots', 'statuses'));
    }

    /**
     * Update status, plot association, and internal notes for an enquiry.
     */
    public function update(Request $request, ContactEnquiry $enquiry)
    {
        $allowedStatuses = array_merge(array_keys(ContactEnquiry::getAvailableStatuses()), ['in_progress']);

        $validated = $request->validate([
            'status' => ['required', 'string', Rule::in($allowedStatuses)],
            'admin_notes' => ['nullable', 'string', 'max:3000'],
            'plot_id' => ['nullable', 'exists:plots,id'],
            'project' => ['nullable', 'string', 'max:150'],
        ]);

        $enquiry->update($validated);

        return redirect()->back()
            ->with('success', "Lead #{$enquiry->lead_number} status and details updated successfully.");
    }

    /**
     * Store a new internal chronological note for the lead.
     */
    public function storeNote(Request $request, ContactEnquiry $enquiry)
    {
        $validated = $request->validate([
            'note' => ['required', 'string', 'min:2', 'max:3000'],
        ], [
            'note.required' => 'Please enter note content.',
            'note.min' => 'The note must be at least 2 characters.',
        ]);

        EnquiryNote::create([
            'contact_enquiry_id' => $enquiry->id,
            'user_id' => auth()->id(),
            'author_name' => auth()->user()->name ?? 'Admin',
            'note' => trim($validated['note']),
        ]);

        return redirect()->back()
            ->with('success', 'Internal note added to lead record successfully.');
    }

    /**
     * Remove the enquiry from storage.
     */
    public function destroy(ContactEnquiry $enquiry)
    {
        $name = $enquiry->name;
        $leadNum = $enquiry->lead_number;
        $enquiry->delete();

        return redirect()->route('admin.enquiries.index')
            ->with('success', "Lead {$leadNum} from '{$name}' was removed successfully.");
    }
}
