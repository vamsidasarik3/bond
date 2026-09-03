<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestorGuideController extends Controller
{
    /**
     * Display the comprehensive Investor's Guide page with authoritative venture data.
     */
    public function index()
    {
        $ventureLegal = [
            'project_name' => 'Navagruha Prekshitha Enclave (RRR Prekshitha Enclave)',
            'developer' => 'M/s RRR Infra Developers (Rep. by Ramidi Raji Reddy)',
            'hmda_file_no' => '062715/LT/GHT/FLT/U6/HMDA/27052024',
            'draft_lp_no' => '057865/GHT/LT/U6/HMDA/15112022',
            'hmda_approval_date' => '23 December, 2025',
            'tsrera_status' => 'TSRERA Form C Certified',
            'survey_numbers' => 'Sy. No. 421/P & 435/PART',
            'location' => 'Bibinagar Village & Mandal, Yadadri Bhuvanagiri District (Pin: 501301)',
            'total_extent' => '17 Acres (Phase 2 Extent: 48,272.46 Sq. Meters / 224 Units)',
            'spot_registration' => 'Immediate Spot Registration at Bibinagar Sub-Registrar Office',
        ];

        $roiFactors = [
            [
                'icon' => 'fa-hospital',
                'title' => 'AIIMS Medical Hub Multiplier',
                'metric' => '750 Beds & Medical College',
                'desc' => 'Premier national medical institute with 750 beds, 200+ doctors, and 5,000+ daily visitor footfall creating massive demand for residential rentals, clinics, and staff housing just 5 minutes away.',
            ],
            [
                'icon' => 'fa-road',
                'title' => 'NH-163 & Regional Ring Road (RRR)',
                'metric' => '6-Lane Highway & 340-km RRR',
                'desc' => 'Direct frontage along the Hyderabad-Warangal 6-lane industrial corridor and immediate proximity to the proposed 340-km Regional Ring Road (RRR) junction linking all major national highways.',
            ],
            [
                'icon' => 'fa-laptop-code',
                'title' => 'IT & Industrial Corridor Corridor',
                'metric' => '35,000+ IT Workforce',
                'desc' => 'Just 15-20 minutes from the Infosys Pocharam SEZ campus, Raheja Mindspace IT Park, and Singapore Township, driving steady executive housing demand.',
            ],
            [
                'icon' => 'fa-train-subway',
                'title' => 'Multi-Modal Transit Connectivity',
                'metric' => 'MMTS Station & Metro Link',
                'desc' => 'Located just 5 minutes from Bibinagar MMTS Suburban Railway Station and 30 minutes from Uppal Metro Station via signal-free expressway.',
            ],
            [
                'icon' => 'fa-building-shield',
                'title' => '100% Final HMDA LP Sanction',
                'metric' => 'Zero Legal Risk',
                'desc' => 'Approved by HMDA Planning Dept. (File No. 062715/2024) and TSRERA certified. Full underground drainage, 40ft/30ft concrete roads, and clear title guarantee.',
            ],
            [
                'icon' => 'fa-landmark-dome',
                'title' => 'Pre-Approved Institutional Bank Loans',
                'metric' => 'Up to 75% Plot Loans',
                'desc' => 'Eligible for seamless plot purchase and villa construction loans from leading nationalized banks including SBI, HDFC, ICICI, and LIC Housing Finance.',
            ],
        ];

        $historicalAppreciation = [
            [
                'period' => '2018 (AIIMS Groundbreaking)',
                'rate_range' => '₹4,500 – ₹6,000 / Sq. Yd',
                'catalyst' => 'Initial land acquisition for AIIMS Bibinagar and 6-lane NH-163 survey',
                'growth' => 'Base Level',
            ],
            [
                'period' => '2021 (AIIMS OPD Functional)',
                'rate_range' => '₹8,000 – ₹10,500 / Sq. Yd',
                'catalyst' => 'Outpatient towers operational; medical student batch commencement',
                'growth' => '+75% Appreciation',
            ],
            [
                'period' => '2024 (750-Bed Expansion & RRR Work)',
                'rate_range' => '₹12,500 – ₹14,000 / Sq. Yd',
                'catalyst' => 'Full in-patient specialty towers active; RRR southern & eastern alignment finalized',
                'growth' => '+140% Cumulative',
            ],
            [
                'period' => '2026 (Navagruha Prekshitha Enclave Launch)',
                'rate_range' => 'Active Launch Phase',
                'catalyst' => 'HMDA Final Approved gated infrastructure with underground utilities & spot registration',
                'growth' => 'High Growth Entry',
            ],
            [
                'period' => '2028 (RRR Operational & Corridor Maturity)',
                'rate_range' => 'Projected ₹22,000 – ₹28,000+ / Sq. Yd',
                'catalyst' => 'Full Regional Ring Road operational; expansion of Pharma City and IT logistics hubs',
                'growth' => 'Projected 2X Returns',
            ],
        ];

        $investmentSteps = [
            [
                'step' => '01',
                'title' => 'Plot Selection & Orientation',
                'desc' => 'Choose your preferred plot size (167, 200, 220, or 267 Sq. Yds) and facing (East/West/Corner) from the live master layout blueprint.',
            ],
            [
                'step' => '02',
                'title' => 'Complimentary Guided Site Visit',
                'desc' => 'Avail our private AC vehicle pick-up from Uppal Metro Station or Ghatkesar ORR Exit 9 for an on-ground venture inspection.',
            ],
            [
                'step' => '03',
                'title' => 'Legal Due Diligence Verification',
                'desc' => 'Inspect the HMDA final approved LP docket, TSRERA certificate, Link Documents, and Nil-Encumbrance Certificate (EC).',
            ],
            [
                'step' => '04',
                'title' => 'Bank Loan Processing (Optional)',
                'desc' => 'Pre-approved loan facilities up to 75% through SBI, HDFC, ICICI, and LIC Housing Finance with doorstep documentation.',
            ],
            [
                'step' => '05',
                'title' => 'Immediate Spot Registration',
                'desc' => 'Execute registered sale deed conveyance and receive official revenue passbooks at the Bibinagar Sub-Registrar Office.',
            ],
        ];

        $ventureDocs = [
            'master_layout' => asset('venture/docs/RRR PREKSHITHA ENCLAVE LAYOUT.pdf'),
            'hmda_approval' => asset('venture/docs/HMDA FINAL APPROVAL PHASE2.pdf'),
            'rera_approval' => asset('venture/docs/RERA APPROVAL PHASE1.pdf'),
            'brochure' => asset('venture/docs/RRR PREKSHITHA ENCLAVE BROCHURE.pdf'),
            'pamphlet' => asset('venture/docs/RRR PREKSHITHA ENCLAVE PAMPHLET.pdf'),
            'master_video' => asset('data/Site Developments/Site Developments/NAVAGRUHA PREKSHITHA ENCLAVE.mp4'),
        ];

        return view('investors-guide', compact('ventureLegal', 'roiFactors', 'historicalAppreciation', 'investmentSteps', 'ventureDocs'));
    }
}
