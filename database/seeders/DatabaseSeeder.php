<?php

namespace Database\Seeders;

use App\Models\ContactEnquiry;
use App\Models\Plot;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Default Admin User
        User::updateOrCreate(
            ['email' => 'admin@navagruha.com'],
            [
                'name' => 'Navagruha Admin',
                'username' => 'admin',
                'password' => Hash::make('Admin@12345'),
                'phone' => '+91 98765 43210',
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // 2. Create Realistic Plotted Inventory for AIIMS Bibinagar Venture
        $ratePerSqYd = 14999.00;

        $plotsData = [
            [
                'plot_number' => 'Plot #101',
                'title' => '167 Sq. Yds East Facing Prime Plot',
                'plot_type' => 'regular',
                'size_sq_yards' => 167.00,
                'price_per_sq_yard' => $ratePerSqYd,
                'total_price' => round(167.00 * $ratePerSqYd, 2),
                'facing' => 'East',
                'road_width_ft' => 40,
                'boundary_dimensions' => "36'0\" x 41'9\"",
                'status' => 'available',
                'is_vaastu_compliant' => true,
                'notes' => 'Near main entrance arch, immediate spot registration available.',
            ],
            [
                'plot_number' => 'Plot #102',
                'title' => '167 Sq. Yds West Facing Plot',
                'plot_type' => 'regular',
                'size_sq_yards' => 167.00,
                'price_per_sq_yard' => $ratePerSqYd,
                'total_price' => round(167.00 * $ratePerSqYd, 2),
                'facing' => 'West',
                'road_width_ft' => 40,
                'boundary_dimensions' => "36'0\" x 41'9\"",
                'status' => 'available',
                'is_vaastu_compliant' => true,
                'notes' => 'Direct access to 40ft wide CC road, avenue plantation in front.',
            ],
            [
                'plot_number' => 'Plot #103',
                'title' => '200 Sq. Yds North Facing Villa Plot',
                'plot_type' => 'regular',
                'size_sq_yards' => 200.00,
                'price_per_sq_yard' => $ratePerSqYd,
                'total_price' => round(200.00 * $ratePerSqYd, 2),
                'facing' => 'North',
                'road_width_ft' => 40,
                'boundary_dimensions' => "40'0\" x 45'0\"",
                'status' => 'available',
                'is_vaastu_compliant' => true,
                'notes' => '100% Vaastu compliant, underground drainage line connected.',
            ],
            [
                'plot_number' => 'Plot #104',
                'title' => '200 Sq. Yds East Facing Plot',
                'plot_type' => 'regular',
                'size_sq_yards' => 200.00,
                'price_per_sq_yard' => $ratePerSqYd,
                'total_price' => round(200.00 * $ratePerSqYd, 2),
                'facing' => 'East',
                'road_width_ft' => 40,
                'boundary_dimensions' => "40'0\" x 45'0\"",
                'status' => 'reserved',
                'is_vaastu_compliant' => true,
                'notes' => 'Token advance received from Mr. Ramesh Reddy. Bank loan in progress with SBI.',
            ],
            [
                'plot_number' => 'Plot #105',
                'title' => '220 Sq. Yds North-East Corner Plot',
                'plot_type' => 'corner',
                'size_sq_yards' => 220.00,
                'price_per_sq_yard' => 15499.00,
                'total_price' => round(220.00 * 15499.00, 2),
                'facing' => 'North-East',
                'road_width_ft' => 60,
                'boundary_dimensions' => "44'0\" x 45'0\"",
                'status' => 'available',
                'is_vaastu_compliant' => true,
                'notes' => 'Premium corner junction plot facing 60ft main boulevard road.',
            ],
            [
                'plot_number' => 'Plot #106',
                'title' => '267 Sq. Yds North Facing Plot',
                'plot_type' => 'regular',
                'size_sq_yards' => 267.00,
                'price_per_sq_yard' => $ratePerSqYd,
                'total_price' => round(267.00 * $ratePerSqYd, 2),
                'facing' => 'North',
                'road_width_ft' => 40,
                'boundary_dimensions' => "48'0\" x 50'0\"",
                'status' => 'available',
                'is_vaastu_compliant' => true,
                'notes' => 'Adjacent to landscaped children park & walking track.',
            ],
            [
                'plot_number' => 'Plot #107',
                'title' => '300 Sq. Yds 60ft Road Commercial Plot',
                'plot_type' => 'commercial',
                'size_sq_yards' => 300.00,
                'price_per_sq_yard' => 16999.00,
                'total_price' => round(300.00 * 16999.00, 2),
                'facing' => 'East',
                'road_width_ft' => 60,
                'boundary_dimensions' => "50'0\" x 54'0\"",
                'status' => 'sold',
                'is_vaastu_compliant' => true,
                'notes' => 'Sold and registered to Dr. K. Srinivas. Document No: 4891/2026.',
            ],
            [
                'plot_number' => 'Plot #108',
                'title' => '500 Sq. Yds Grand Estate Plot',
                'plot_type' => 'regular',
                'size_sq_yards' => 500.00,
                'price_per_sq_yard' => $ratePerSqYd,
                'total_price' => round(500.00 * $ratePerSqYd, 2),
                'facing' => 'North',
                'road_width_ft' => 60,
                'boundary_dimensions' => "60'0\" x 75'0\"",
                'status' => 'reserved',
                'is_vaastu_compliant' => true,
                'notes' => 'Booked by NRI client. Site visit conducted last Sunday.',
            ],
        ];

        $createdPlots = [];
        foreach ($plotsData as $data) {
            $createdPlots[] = Plot::updateOrCreate(
                ['plot_number' => $data['plot_number']],
                $data
            );
        }

        // 3. Create Sample Real-Estate Enquiries
        $enquiriesData = [
            [
                'name' => 'Suresh Varma',
                'email' => 'suresh.varma@gmail.com',
                'phone' => '+91 98480 12345',
                'plot_id' => $createdPlots[0]->id,
                'subject' => 'Interested in 167 Sq Yds East Facing Plot #101',
                'message' => 'Hello, I saw your venture near AIIMS Bibinagar. I am looking for an East facing 167 sq. yds plot. Can you please share the layout PDF and loan options?',
                'preferred_visit_date' => now()->addDays(2),
                'status' => 'new',
                'admin_notes' => null,
            ],
            [
                'name' => 'Dr. Ananya Sharma',
                'email' => 'dr.ananya@apollohospitals.com',
                'phone' => '+91 94401 56789',
                'plot_id' => $createdPlots[4]->id,
                'subject' => 'Enquiry for Corner Plot #105 near 60ft road',
                'message' => 'We are working at AIIMS Bibinagar hospital and interested in purchasing a corner plot for immediate construction. Kindly arrange a site visit this Saturday.',
                'preferred_visit_date' => now()->addDays(4),
                'status' => 'contacted',
                'admin_notes' => 'Called customer. Scheduled site inspection for Saturday 11:00 AM with sales executive Ravi.',
            ],
            [
                'name' => 'K. Venkateshwar Rao',
                'email' => 'k.venkat.rao@yahoo.com',
                'phone' => '+91 99890 87654',
                'plot_id' => $createdPlots[2]->id,
                'subject' => 'Bank loan eligibility for 200 Sq Yds',
                'message' => 'Looking for bank loan pre-approval details from HDFC / SBI for Plot #103. Is spot registration included in the price?',
                'preferred_visit_date' => now()->addDays(3),
                'status' => 'in_progress',
                'admin_notes' => 'SBI bank loan executive shared rate sheet and document checklist with customer.',
            ],
            [
                'name' => 'Mahesh Babu G.',
                'email' => 'mahesh.goud@outlook.com',
                'phone' => '+91 91234 56780',
                'plot_id' => $createdPlots[3]->id,
                'subject' => 'Site visit completed for Plot #104',
                'message' => 'Visited the site yesterday with family. Impressed by the 40ft concrete roads and plantation. Would like to proceed with booking.',
                'preferred_visit_date' => now()->subDays(2),
                'status' => 'closed',
                'admin_notes' => 'Token advance of Rs. 1,00,000 received. Plot status marked as Booked.',
            ],
            [
                'name' => 'Pradeep Chary',
                'email' => 'pradeep.chary@gmail.com',
                'phone' => '+91 97000 11223',
                'plot_id' => null,
                'subject' => 'General enquiry about upcoming phase in Bibinagar',
                'message' => 'Hi Team, do you have any 150-180 sq yds plots with North facing available in phase 2? Please call back.',
                'preferred_visit_date' => now()->addDays(5),
                'status' => 'new',
                'admin_notes' => null,
            ],
        ];

        foreach ($enquiriesData as $enquiry) {
            ContactEnquiry::updateOrCreate(
                ['phone' => $enquiry['phone'], 'subject' => $enquiry['subject']],
                $enquiry
            );
        }
    }
}
