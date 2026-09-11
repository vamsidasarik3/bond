<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\ContactEnquiry;
use App\Models\EmailLog;
use App\Models\User;

$id = $argv[1] ?? null;
if (!$id) {
    echo "Usage: php tests/inspect_test_leads.php <enquiry_id_or_lead_number>\n";
    exit(1);
}

$lead = is_numeric($id) ? ContactEnquiry::find($id) : ContactEnquiry::where('lead_number', $id)->first();

if (!$lead) {
    echo "ERROR: Lead '{$id}' not found in database.\n";
    exit(1);
}

echo "===================================================\n";
echo "LEAD RECORD DETAILS:\n";
echo "===================================================\n";
echo "ID:                   {$lead->id}\n";
echo "Lead Number:          {$lead->lead_number}\n";
echo "Name:                 {$lead->name}\n";
echo "Email:                {$lead->email}\n";
echo "Phone:                {$lead->phone}\n";
echo "Status:               {$lead->status}\n";
echo "Preferred Visit Date: " . ($lead->preferred_visit_date ? $lead->preferred_visit_date->format('d F Y') . ' (' . $lead->preferred_visit_date->format('Y-m-d') . ')' : 'NULL (Omitted)') . "\n";
echo "Project:              {$lead->project}\n";
echo "Landing Page:         {$lead->landing_page}\n";
echo "Source:               {$lead->source}\n";
echo "Created At:           {$lead->created_at}\n";
echo "Updated At:           {$lead->updated_at}\n";

echo "\n===================================================\n";
echo "ASSOCIATED EMAIL LOGS (Total: " . $lead->emailLogs->count() . "):\n";
echo "===================================================\n";
foreach ($lead->emailLogs as $log) {
    echo "- Type:        {$log->mail_type}\n";
    echo "  Recipient:   {$log->recipient_email}\n";
    echo "  Subject:     {$log->subject}\n";
    echo "  Status:      {$log->status}\n";
    echo "  Error:       " . ($log->error_message ?: 'None') . "\n";
    echo "  Recorded At: {$log->created_at}\n";
    echo "---------------------------------------------------\n";
}

echo "\n===================================================\n";
echo "CHECK ADMIN DETAIL VIEW RENDERING:\n";
echo "===================================================\n";
try {
    $admin = User::first();
    if ($admin) {
        auth()->login($admin);
    }
    $plots = \App\Models\Plot::orderBy('plot_number')->get(['id', 'plot_number', 'size_sq_yards', 'status']);
    $statuses = ContactEnquiry::getAvailableStatuses();
    $html = view('admin.enquiries.show', [
        'enquiry' => $lead,
        'plots' => $plots,
        'statuses' => $statuses,
        'errors' => new \Illuminate\Support\ViewErrorBag(),
    ])->render();

    echo "Admin Detail View Rendered Successfully (" . strlen($html) . " bytes)\n";
    echo "Detail Contains Lead Number: " . (strpos($html, $lead->lead_number) !== false ? "YES (" . $lead->lead_number . ")" : "NO") . "\n";
    echo "Detail Contains Name:        " . (strpos($html, $lead->name) !== false ? "YES" : "NO") . "\n";
    echo "Detail Contains Status:      " . (strpos($html, $lead->status) !== false ? "YES" : "NO") . "\n";
    if ($lead->preferred_visit_date) {
        echo "Detail Contains Visit Date:  " . (strpos($html, $lead->preferred_visit_date->format('d F, Y')) !== false ? "YES (" . $lead->preferred_visit_date->format('d F, Y') . ")" : "NO") . "\n";
    } else {
        echo "Detail Displays 'Not specified': " . (strpos($html, 'Not specified') !== false ? "YES" : "NO") . "\n";
    }

    echo "\n===================================================\n";
    echo "CHECK ADMIN LEADS LISTING (INDEX VIEW):\n";
    echo "===================================================\n";
    $req = \Illuminate\Http\Request::create('/admin/enquiries', 'GET');
    app()->instance('request', $req);
    $enquiries = ContactEnquiry::with('plot')->latest()->paginate(10);
    $counts = [
        'all' => ContactEnquiry::count(),
        'new' => ContactEnquiry::new()->count(),
        'contacted' => ContactEnquiry::contacted()->count(),
        'in_progress' => ContactEnquiry::inProgress()->count(),
        'closed' => ContactEnquiry::closed()->count(),
    ];
    $indexHtml = view('admin.enquiries.index', compact('enquiries', 'counts'))->render();
    echo "Admin Index View Rendered Successfully (" . strlen($indexHtml) . " bytes)\n";
    echo "Lead Appears in Admin Table: " . (strpos($indexHtml, $lead->lead_number) !== false ? "YES (" . $lead->lead_number . ")" : "NO") . "\n";
    echo "Customer Name Appears:       " . (strpos($indexHtml, $lead->name) !== false ? "YES" : "NO") . "\n";
    echo "Mobile Appears:              " . (strpos($indexHtml, $lead->phone) !== false ? "YES" : "NO") . "\n";
} catch (\Throwable $e) {
    echo "ERROR rendering admin view: " . $e->getMessage() . "\n";
}

