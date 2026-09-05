<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use App\Models\Plot;

class DashboardController extends Controller
{
    /**
     * Display the Admin Dashboard with comprehensive real-estate metrics,
     * portfolio overview, inventory distributions, CRM leads, and recent activity.
     */
    public function index()
    {
        // 1. Core Summary Metrics (100% dynamic from DB)
        $totalProjects = 2; // Navagruha Prekshitha Enclave, Navagruha Golden Farms
        $totalPlots = Plot::count();
        $availablePlots = Plot::available()->count();
        $reservedPlots = Plot::reserved()->count();
        $soldPlots = Plot::sold()->count();
        $totalEnquiries = ContactEnquiry::count();
        $newEnquiries = ContactEnquiry::where('status', 'new')->count();
        $siteVisits = ContactEnquiry::whereNotNull('preferred_visit_date')->count();

        // 2. Real Valuation & Pipeline Metrics
        $totalInventoryValue = (float) Plot::sum('total_price');
        $soldInventoryValue = (float) Plot::sold()->sum('total_price');
        $availableInventoryValue = (float) Plot::available()->sum('total_price');
        $reservedInventoryValue = (float) Plot::reserved()->sum('total_price');

        // 3. Inventory Distribution by Facing Direction (for Chart)
        $plotsByFacing = Plot::selectRaw('facing, count(*) as count')
            ->groupBy('facing')
            ->orderBy('count', 'desc')
            ->pluck('count', 'facing')
            ->toArray();

        // 4. CRM Leads by Status (for Funnel/Pipeline Chart)
        $enquiryStatusCounts = [
            'new'         => ContactEnquiry::new()->count(),
            'contacted'   => ContactEnquiry::contacted()->count(),
            'in_progress' => ContactEnquiry::inProgress()->count(),
            'closed'      => ContactEnquiry::closed()->count(),
        ];

        // 5. Portfolio Summary Snapshot
        $projectsSummary = [
            [
                'name'         => 'Navagruha Prekshitha Enclave',
                'category'     => 'Residential Plotted Community',
                'extent'       => '17 Acres',
                'total_units'  => $totalPlots,
                'available'    => $availablePlots,
                'status'       => 'Ongoing',
                'status_class' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                'image'        => 'images/projects/rrr-prekshitha/entrance-arch-grand.webp',
            ],
            [
                'name'         => 'Navagruha Golden Farms',
                'category'     => 'Farmland & Residential Plots',
                'extent'       => 'Boutique Estate',
                'total_units'  => 30,
                'available'    => 12,
                'status'       => 'Ongoing',
                'status_class' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                'image'        => 'venture/photos/14.jpg',
            ],
        ];

        // 6. Recent Activity
        $recentEnquiries = ContactEnquiry::latest()
            ->take(5)
            ->get();

        $recentPlots = Plot::orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProjects',
            'totalPlots',
            'availablePlots',
            'reservedPlots',
            'soldPlots',
            'totalEnquiries',
            'newEnquiries',
            'siteVisits',
            'totalInventoryValue',
            'soldInventoryValue',
            'availableInventoryValue',
            'reservedInventoryValue',
            'plotsByFacing',
            'enquiryStatusCounts',
            'projectsSummary',
            'recentEnquiries',
            'recentPlots'
        ));
    }
}
