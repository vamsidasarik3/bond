<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the About Us page for Navagruha Infra Developers.
     */
    public function index()
    {
        $leadership = [
            [
                'name'  => 'Srinivasa Rao Narravula',
                'title' => 'Managing Director',
                'photo' => 'images/srinivasa-rao-narravula.jpg',
                'bio'   => 'Mr. Srinivasa Rao Narravula is the founding Managing Director of Navagruha Infra Developers. Raised in an agrarian family, he channeled his early values of integrity and perseverance into a successful entrepreneurial career. Beginning in the seafood industry, he expanded into residential plotted development, completing his first HMDA-approved layout in the early 2000s. Today, he leads the company with a philosophy built on transparent documentation, planned infrastructure, and customer-first commitments.',
            ],
            [
                'name'  => 'Manoj Kumar Narravula',
                'title' => 'Director, Business Development',
                'photo' => 'images/manoj-kumar-narravula.jpg',
                'bio'   => "Manoj Kumar Narravula leads business development and project acquisition at Navagruha Infra Developers. He focuses on identifying high-growth corridors, regulatory due diligence, and building partnerships with financial institutions to provide buyers with bank loan accessibility. He plays a key role in expansion planning and customer engagement across the company's active and upcoming projects.",
            ],
        ];

        $coreValues = [
            [
                'number' => '01',
                'title'  => 'Transparency',
                'desc'   => 'Every project begins with fully verified approvals, clear title documentation, and accessible legal records. Buyers can inspect every document before committing.',
            ],
            [
                'number' => '02',
                'title'  => 'Quality',
                'desc'   => 'Our layouts are built to HMDA town planning standards — wide concrete roads, underground drainage, dedicated water storage, and green park zones.',
            ],
            [
                'number' => '03',
                'title'  => 'Customer Commitment',
                'desc'   => 'From first site visit through bank loan facilitation and spot registration, we provide complete end-to-end guidance so every buyer proceeds with confidence.',
            ],
        ];

        $milestones = [
            [
                'year'  => '2004',
                'event' => 'First HMDA-Approved Layout',
            ],
            [
                'year'  => '2020',
                'event' => 'Phase 1 — 74 Plots Delivered',
            ],
            [
                'year'  => '2023',
                'event' => 'HMDA Final Sanction — Phase 2',
            ],
            [
                'year'  => '2024',
                'event' => 'TSRERA Certified & Infrastructure Complete',
            ],
            [
                'year'  => '2025',
                'event' => 'Phase 2 Active Registrations',
            ],
        ];

        $stats = [
            ['value' => '3+',    'label' => 'Projects'],
            ['value' => '400+',  'label' => 'Plots Delivered'],
            ['value' => '17+',   'label' => 'Acres Developed'],
            ['value' => '2004',  'label' => 'Since'],
        ];

        return view('about', compact(
            'leadership',
            'coreValues',
            'milestones',
            'stats'
        ));
    }
}
