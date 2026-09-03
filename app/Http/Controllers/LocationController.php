<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display the dedicated Location Highlights & Growth Corridor page.
     */
    public function index()
    {
        $locationHighlights = [
            'Healthcare & Medical Hub' => [
                [
                    'name' => 'AIIMS Medical University & Hospital (750 Beds)',
                    'distance' => '2.5 Km',
                    'time' => '05 Mins',
                    'icon' => 'fa-hospital',
                    'desc' => 'Premier national super-specialty medical institute with 750 operational beds and medical college.',
                ],
                [
                    'name' => 'Bibinagar Community Health Centre',
                    'distance' => '3.0 Km',
                    'time' => '06 Mins',
                    'icon' => 'fa-stethoscope',
                    'desc' => 'Primary healthcare support and emergency services located within Bibinagar town.',
                ],
            ],
            'Highways, Transit & Metro' => [
                [
                    'name' => 'National Highway NH-163 (Hyd-Warangal 6-Lane)',
                    'distance' => '1.5 Km',
                    'time' => '03 Mins',
                    'icon' => 'fa-road',
                    'desc' => 'Major 6-lane economic and logistics corridor connecting Hyderabad to Warangal.',
                ],
                [
                    'name' => 'Bibinagar Junction Railway Station',
                    'distance' => '3.0 Km',
                    'time' => '05 Mins',
                    'icon' => 'fa-train',
                    'desc' => 'Active rail junction connecting to Secunderabad, Kazipet, and Nalgonda.',
                ],
                [
                    'name' => 'Outer Ring Road (ORR Exit No. 9 Ghatkesar)',
                    'distance' => '14 Km',
                    'time' => '15 Mins',
                    'icon' => 'fa-route',
                    'desc' => 'Seamless signal-free 8-lane expressway connectivity to RGIA Airport and Gachibowli Financial District.',
                ],
                [
                    'name' => 'Uppal Metro Station',
                    'distance' => '28 Km',
                    'time' => '30 Mins',
                    'icon' => 'fa-train-subway',
                    'desc' => 'Direct metro transit connecting eastern Hyderabad to Hitec City and Ameerpet.',
                ],
            ],
            'IT Hubs & Educational Institutes' => [
                [
                    'name' => 'Infosys SEZ Campus, Pocharam',
                    'distance' => '18 Km',
                    'time' => '20 Mins',
                    'icon' => 'fa-building',
                    'desc' => 'Over 450-acre IT development center employing 25,000+ technology professionals.',
                ],
                [
                    'name' => 'Raheja Mindspace IT Park, Pocharam',
                    'distance' => '19 Km',
                    'time' => '22 Mins',
                    'icon' => 'fa-laptop-code',
                    'desc' => 'Major commercial IT park hosting Fortune 500 tech companies.',
                ],
                [
                    'name' => 'Vignan University & Engineering Colleges',
                    'distance' => '12 Km',
                    'time' => '12 Mins',
                    'icon' => 'fa-graduation-cap',
                    'desc' => 'Leading educational institutions and engineering colleges along the Ghatkesar-Bibinagar belt.',
                ],
            ],
            'Heritage, Spiritual & Tourism' => [
                [
                    'name' => 'Yadadri Sri Lakshmi Narasimha Swamy Temple',
                    'distance' => '22 Km',
                    'time' => '25 Mins',
                    'icon' => 'fa-gopuram',
                    'desc' => 'World-famous spiritual destination attracting millions of pilgrims every month.',
                ],
                [
                    'name' => 'Surendrapuri Mythological Theme Park',
                    'distance' => '20 Km',
                    'time' => '22 Mins',
                    'icon' => 'fa-landmark',
                    'desc' => 'Renowned cultural tourist complex located along the temple expressway.',
                ],
                [
                    'name' => 'Bhongir Heritage Fort & Rock Climbing',
                    'distance' => '15 Km',
                    'time' => '15 Mins',
                    'icon' => 'fa-mountain',
                    'desc' => 'Historical monolithic rock fort offering scenic trekking and adventure tourism.',
                ],
            ],
        ];

        return view('location', compact('locationHighlights'));
    }
}
