<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmenityController extends Controller
{
    /**
     * Display the dedicated Amenities & Infrastructure page.
     */
    public function index()
    {
        $amenityCategories = [
            'Roads & Infrastructure' => [
                [
                    'icon' => 'fa-road',
                    'title' => "40' & 30' M-25 CC Roads",
                    'desc' => 'High-grade heavy-duty concrete roads designed for heavy vehicle transit, with curbs and side drains.',
                ],
                [
                    'icon' => 'fa-archway',
                    'title' => 'Grand Entrance Arch',
                    'desc' => 'Majestic monumental entrance gateway with 24/7 security cabin and automated boom barrier access.',
                ],
                [
                    'icon' => 'fa-faucet-drip',
                    'title' => 'Underground Drainage',
                    'desc' => 'Fully closed underground sewage and storm-water drainage channels preventing water stagnation.',
                ],
                [
                    'icon' => 'fa-bolt',
                    'title' => 'Underground Electricity & Lighting',
                    'desc' => 'Concealed power distribution cables, dedicated transformers, and energy-efficient LED street lighting.',
                ],
            ],
            'Nature & Community Parks' => [
                [
                    'icon' => 'fa-tree',
                    'title' => '3 Thematic Landscaped Parks',
                    'desc' => 'Over 1.5 acres of manicured green parks with lawns, flowering shrubs, and shade trees.',
                ],
                [
                    'icon' => 'fa-person-walking',
                    'title' => 'Jogging & Walking Track',
                    'desc' => 'Dedicated tiled jogging paths surrounding the central park for morning fitness and strolls.',
                ],
                [
                    'icon' => 'fa-baseball-bat-ball',
                    'title' => 'Children Play Area',
                    'desc' => 'Safe, child-friendly play equipment including swings, slides, seesaws, and sand pits.',
                ],
                [
                    'icon' => 'fa-umbrella-beach',
                    'title' => 'Pergolas & Senior Citizen Gazebo',
                    'desc' => 'Shaded sitting alcoves with stone benches designed for relaxation and community bonding.',
                ],
            ],
            'Security & Legal Approvals' => [
                [
                    'icon' => 'fa-shield-halved',
                    'title' => '24/7 CCTV & Security',
                    'desc' => 'Compound wall securing the entire 17-acre perimeter with round-the-clock security personnel.',
                ],
                [
                    'icon' => 'fa-certificate',
                    'title' => 'HMDA & RERA Approved',
                    'desc' => '100% legally clear layout with HMDA Final Sanction Letter and Telangana RERA Registration.',
                ],
                [
                    'icon' => 'fa-compass',
                    'title' => '100% Vaastu Compliant',
                    'desc' => 'Layout strictly planned according to authentic Vaastu principles with East and West facing options.',
                ],
                [
                    'icon' => 'fa-building-columns',
                    'title' => 'Bank Loan Assistance',
                    'desc' => 'Pre-approved loan facilities up to 80% with SBI, HDFC, ICICI, and LIC Housing Finance.',
                ],
            ],
        ];

        return view('amenities', compact('amenityCategories'));
    }
}
