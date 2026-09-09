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
        $companyName = 'Navagruha Infra Developers';

        $leadership = [
            [
                'name'  => 'Mr. Srinivasa Rao Narravula',
                'title' => 'Founder and Managing Director',
                'photo' => 'images/srinivasa-rao-narravula.jpg?v=3.1',
                'paragraphs' => [
                    'Mr. Srinivasa Rao Narravula, Founder and Managing Director of Navagruha Infra Developers, is a real estate professional driven by the values of integrity, perseverance, and customer trust. Coming from an agrarian family background, he built a successful business with a clear vision of delivering well planned residential communities backed by transparent documentation, quality infrastructure, and a customer first approach.',
                ],
                'quote' => 'Our journey is rooted in trust, and our goal is to create lasting value for homebuyers and investors.',
            ],
            [
                'name'  => 'Manoj Kumar Narravula',
                'title' => 'Director, Business Development',
                'photo' => 'images/manoj-kumar-narravula.jpg',
                'paragraphs' => [
                    "Manoj Kumar Narravula serves as Director, Business Development at Navagruha Infra Developers, leading the company's growth strategy, project execution, and business expansion initiatives. He oversees the identification and evaluation of high potential development opportunities, regulatory due diligence, and strategic planning across the organisation's project portfolio.",
                ],
                'quote' => 'We focus on creating well planned communities that enhance lifestyles and deliver long term growth.',
            ],
        ];

        $coreValues = [
            [
                'number' => '01.',
                'title'  => 'Transparency',
                'desc'   => 'We uphold the highest standards of transparency through verified approvals, clear land titles, and comprehensive documentation. Every customer is provided with complete access to project information, enabling informed and confident investment decisions.',
            ],
            [
                'number' => '02.',
                'title'  => 'Quality',
                'desc'   => 'Quality is embedded in every stage of development. Our projects are designed in accordance with HMDA planning standards and feature well engineered infrastructure, including wide internal roads, underground drainage systems, water management facilities, and thoughtfully planned open spaces.',
            ],
            [
                'number' => '03.',
                'title'  => 'Customer Commitment',
                'desc'   => 'We are committed to delivering a seamless customer experience from enquiry to registration. Through dedicated support, financing assistance, and end to end guidance, we ensure every customer receives the confidence and clarity needed throughout their investment journey.',
            ],
        ];

        return view('about', compact(
            'companyName',
            'leadership',
            'coreValues'
        ));
    }
}
