<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use App\Models\Plot;

class DashboardController extends Controller
{
    /**
     * Display the Admin Dashboard with plot inventory summary, plot status overview,
     * recent enquiries, and recent plot updates.
     */
    public function index()
    {
        // Summary Card Counts (all dynamic from database)
        $totalPlots = Plot::count();
        $availablePlots = Plot::available()->count();
        $reservedPlots = Plot::reserved()->count();
        $soldPlots = Plot::sold()->count();
        $totalEnquiries = ContactEnquiry::count();

        // Recent Enquiries (Latest submissions with name, email, phone, submitted date, message)
        $recentEnquiries = ContactEnquiry::latest()
            ->take(5)
            ->get();

        // Recent Plot Updates (Recently added or updated plots with plot_number, size, price, facing, status, last updated)
        $recentPlots = Plot::orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalPlots',
            'availablePlots',
            'reservedPlots',
            'soldPlots',
            'totalEnquiries',
            'recentEnquiries',
            'recentPlots'
        ));
    }
}
