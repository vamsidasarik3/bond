<?php

namespace App\Http\Controllers;

use App\Models\Plot;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display the dedicated Projects portfolio & Master Plan Overview page.
     */
    public function index()
    {
        $projects = [
            [
                'id' => 'rrr-prekshitha-enclave',
                'name' => 'Navagruha Prekshitha Enclave',
                'short_name' => 'RRR Prekshitha Enclave',
                'tagline' => 'HMDA & RERA Approved Residential Plotted Community near AIIMS Bibinagar',
                'status_key' => 'ongoing',
                'badge_type' => 'green',
                'status_badge' => 'Ongoing',
                'category' => 'Residential Villa Plots',
                'category_overlay' => 'HMDA & RERA Approved',
                'overview_stats' => '17 Acres, 150+ Plots, 40\' & 30\' Roads',
                'location' => 'AIIMS Bibinagar, Hyderabad to Warangal Highway (NH-163) Corridor',
                'total_extent' => '17 Acres',
                'total_extent_sub' => '48,272.46 Sq. M HMDA Sanction',
                'total_units' => '150+ Plots',
                'total_units_sub' => 'Clear Title Villa Plots',
                'road_widths' => "40' & 30'",
                'road_widths_sub' => 'M-25 Concrete Avenues',
                'vaastu' => '100%',
                'vaastu_sub' => 'East & West Facing Grid',
                'plot_sizes' => '167, 200, 220, 267 & 500 Sq. Yards',
                'approvals' => 'HMDA Final Sanction (LP No. 062715/2024) & TSRERA Registered',
                'launch_year' => '2024 to 2026 Active Launch',
                'highlights' => [
                    'Opposite AIIMS Bibinagar on Hyderabad to Warangal Highway (NH-163)',
                    'HMDA final approved layout with immediate spot registration',
                    'Grand entrance arch with 24/7 security cabin and boom barrier access',
                    'Three landscaped theme parks with walking tracks and children play areas',
                    'Dedicated overhead water tank with pressurized pipeline network to each plot',
                    'Underground drainage, electricity with transformer and modern LED streetlights',
                    '100% Vaastu Compliance plots with clear boundary curb stones',
                    'Bank loan assistance approved through leading financial institutions (SBI, HDFC, ICICI)',
                ],
                'image' => asset('images/projects/rrr-prekshitha/entrance-arch-grand.webp'),
                'gallery' => [
                    asset('images/projects/rrr-prekshitha/entrance-arch-grand.webp'),
                    asset('images/projects/rrr-prekshitha/master-layout-aerial.webp'),
                    asset('images/projects/rrr-prekshitha/concrete-boulevard-40ft.webp'),
                    asset('images/projects/rrr-prekshitha/aerial-drone-banner.webp'),
                    asset('images/projects/rrr-prekshitha/avenue-plantation-walkway.webp'),
                    asset('images/projects/rrr-prekshitha/overhead-water-tank.webp'),
                    asset('images/projects/rrr-prekshitha/layout-parks-broad-view.webp'),
                    asset('images/projects/rrr-prekshitha/high-altitude-site-grid.webp'),
                ],
                'docs' => [
                    'layout' => asset('venture/docs/RRR PREKSHITHA ENCLAVE LAYOUT.pdf'),
                    'hmda' => asset('venture/docs/HMDA FINAL APPROVAL PHASE2.pdf'),
                    'rera' => asset('venture/docs/RERA APPROVAL PHASE1.pdf'),
                    'brochure' => asset('venture/docs/RRR PREKSHITHA ENCLAVE BROCHURE.pdf'),
                ],
                'video' => asset('data/Site Developments/Site Developments/NAVAGRUHA PREKSHITHA ENCLAVE.mp4'),
                'is_featured' => true,
            ],
            [
                'id' => 'golden-farms',
                'name' => 'Navagruha Golden Farms',
                'short_name' => 'Golden Farms',
                'tagline' => 'Agro-Centric Farmland & Residential Plotted Community near NH-65 & ORR',
                'status_key' => 'completed',
                'badge_type' => 'green',
                'status_badge' => 'Delivered',
                'category' => 'Farmland & Residential Plots',
                'category_overlay' => 'Agro-Centric Farmland',
                'overview_stats' => 'Boutique Estate, 30 Units, 50\' & 30\' Roads',
                'location' => 'Near NH-65 (Hyderabad-Vijayawada Corridor) & Outer Ring Road (ORR)',
                'total_extent' => 'Boutique Estate',
                'total_extent_sub' => 'Agro Farmland Community',
                'total_units' => '30 Units',
                'total_units_sub' => 'Exclusive Gated Plots',
                'road_widths' => "50' & 30'",
                'road_widths_sub' => 'Blacktop Road Network',
                'vaastu' => '100%',
                'vaastu_sub' => 'Clear Demarcated Plots',
                'plot_sizes' => '200 to 500+ Sq. Yards',
                'approvals' => 'Clear Marketable Titles & Registered Deeds',
                'launch_year' => 'Delivered & Established',
                'highlights' => [
                    'Grand aesthetic entrance arch with controlled gated access',
                    '6-foot file foundation compound wall with two-side plastering for perimeter security',
                    '50-feet blacktop main boulevard and 30-feet internal road grid',
                    'Drip irrigation system implemented throughout the community for lush landscaping',
                    'Organic farming initiatives supported by natural bio-fertilizers',
                    'Dedicated electricity transformer with energy-efficient street lighting',
                    'Personalized granite name boards installed for each individual plot',
                    'Strategic connectivity to NH-65 and Outer Ring Road with rapid capital appreciation',
                ],
                'image' => asset('venture/photos/14.jpg'),
                'gallery' => [
                    asset('venture/photos/14.jpg'),
                    asset('venture/photos/15.jpg'),
                    asset('venture/photos/18.jpg'),
                    asset('venture/photos/16.jpg'),
                ],
                'docs' => [
                    'brochure' => asset('venture/docs/RRR PREKSHITHA ENCLAVE BROCHURE.pdf'),
                ],
                'is_featured' => false,
            ],
        ];

        $ventureDocs = [
            'hmda_approval' => asset('venture/docs/HMDA FINAL APPROVAL PHASE2.pdf'),
            'rera_approval' => asset('venture/docs/RERA APPROVAL PHASE1.pdf'),
            'master_layout' => asset('venture/docs/RRR PREKSHITHA ENCLAVE LAYOUT.pdf'),
            'brochure' => asset('venture/docs/RRR PREKSHITHA ENCLAVE BROCHURE.pdf'),
            'pamphlet' => asset('venture/docs/RRR PREKSHITHA ENCLAVE PAMPHLET.pdf'),
            'master_video' => asset('data/Site Developments/Site Developments/NAVAGRUHA PREKSHITHA ENCLAVE.mp4'),
        ];

        return view('projects', compact('projects', 'ventureDocs'));
    }
}
