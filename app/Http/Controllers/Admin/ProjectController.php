<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plot;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of real-estate projects / ventures in the admin portal.
     */
    public function index(Request $request)
    {
        // Real-world venture data matching the company's portfolio
        $totalPlots = Plot::count();
        $availablePlots = Plot::available()->count();
        $soldPlots = Plot::sold()->count();
        $reservedPlots = Plot::reserved()->count();

        $allProjects = [
            [
                'id'             => 'prekshitha-enclave',
                'name'           => 'Navagruha Prekshitha Enclave',
                'tagline'        => 'HMDA Final Approved 17-Acre Residential Plotted Community',
                'location'       => 'AIIMS Bibinagar, NH-163 Warangal Highway',
                'category'       => 'Residential Villa Plots',
                'extent'         => '17 Acres',
                'units'          => $totalPlots . ' Registered Plots',
                'available_units'=> $availablePlots,
                'reserved_units' => $reservedPlots,
                'sold_units'     => $soldPlots,
                'road_widths'    => "40' & 30' Concrete Roads",
                'approvals'      => 'HMDA Final LP & TG RERA Approved',
                'status'         => 'Ongoing',
                'status_class'   => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                'status_dot'     => 'bg-emerald-500',
                'launch_year'    => '2024 - 2026',
                'plot_sizes'     => '167, 200, 220, 267 & 500 Sq. Yds',
                'highlights'     => [
                    'Opposite AIIMS Bibinagar on NH-163',
                    '100% Clear Title, Spot Registration',
                    'Underground Drainage, Water & Electricity',
                    'Avenue Plantation & Children Play Park',
                ],
                'image'          => 'images/projects/rrr-prekshitha/entrance-arch-grand.webp',
                'is_active'      => true,
            ],
            [
                'id'             => 'golden-farms',
                'name'           => 'Navagruha Golden Farms',
                'tagline'        => 'Agro-Centric Farmland & Residential Plotted Community',
                'location'       => 'Near NH-65 & Outer Ring Road (ORR)',
                'category'       => 'Farmland & Residential Plots',
                'extent'         => 'Boutique Farmland Estate',
                'units'          => '30 Units',
                'available_units'=> 12,
                'reserved_units' => 6,
                'sold_units'     => 12,
                'road_widths'    => "50' & 30' Blacktop Roads",
                'approvals'      => 'Clear Marketable Registered Deeds',
                'status'         => 'Ongoing',
                'status_class'   => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                'status_dot'     => 'bg-emerald-500',
                'launch_year'    => 'Active Venture',
                'plot_sizes'     => '200 to 500+ Sq. Yards',
                'highlights'     => [
                    '6-foot compound wall with two-side plastering',
                    'Drip irrigation system across layout',
                    'Organic farming initiatives with bio-fertilizers',
                    'Personalized granite name boards for plots',
                ],
                'image'          => 'venture/photos/14.jpg',
                'is_active'      => true,
            ],
        ];

        $totalCount = count($allProjects);
        $ongoingCount = count(array_filter($allProjects, fn($p) => strtolower($p['status']) === 'ongoing'));

        $projects = $allProjects;

        // Filter by category or status if requested
        if ($request->filled('status')) {
            $statusFilter = strtolower($request->status);
            $projects = array_values(array_filter($projects, function ($p) use ($statusFilter) {
                return str_contains(strtolower($p['status']), $statusFilter);
            }));
        }

        if ($request->filled('search')) {
            $search = strtolower($request->search);
            $projects = array_values(array_filter($projects, function ($p) use ($search) {
                return str_contains(strtolower($p['name']), $search) ||
                       str_contains(strtolower($p['location']), $search) ||
                       str_contains(strtolower($p['category']), $search);
            }));
        }

        return view('admin.projects.index', compact('projects', 'totalCount', 'ongoingCount'));
    }
}
