<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestorGuideController extends Controller
{
    /**
     * Display the comprehensive Investor Corner page with authoritative venture data.
     */
    public function index()
    {
        $ventureLegal = [
            'project_name'       => 'RRR Prekshitha Enclave',
            'developer'          => 'M/s RRR Infra Developers (Rep. by Ramidi Raji Reddy)',
            'hmda_lp_no'         => '000022/LO/Plg/HMDA/2023',
            'hmda_file_no'       => '062715/LT/GHT/FLT/U6/HMDA/27052024',
            'hmda_approval_date' => '23 December, 2025',
            'tsrera_status'      => 'TSRERA Form C Certified',
            'survey_numbers'     => 'Sy. No. 421/P & 435/PART',
            'location'           => 'Bibinagar Village & Mandal, Yadadri Bhuvanagiri District (Pin: 501301)',
            'total_extent'       => '17 Acres (Phase 2 Extent: 48,272.46 Sq. Meters / 224 Units)',
            'spot_registration'  => 'Immediate Spot Registration at Bibinagar Sub-Registrar Office',
        ];

        $whyInvest = [
            [
                'number' => '01',
                'icon'   => 'fa-map-location-dot',
                'title'  => 'Strategic Growth Corridors',
                'desc'   => 'Located along major arterial growth corridors like the NH-163 6-lane expressway, adjacent to national infrastructure anchors including AIIMS Bibinagar and the planned Regional Ring Road (RRR).',
            ],
            [
                'number' => '02',
                'icon'   => 'fa-drafting-compass',
                'title'  => 'Planned Gated Infrastructure',
                'desc'   => 'HMDA-sanctioned residential layouts engineered with 40-foot and 30-foot heavy-duty M-25 concrete avenues, underground drainage, overhead water storage, and landscaped recreation parks.',
            ],
            [
                'number' => '03',
                'icon'   => 'fa-shield-halved',
                'title'  => 'Transparent Documentation',
                'desc'   => 'Clear marketable titles with verified HMDA final layout sanctions, TSRERA registration, unbroken link document chains, and immediate spot registration at the local Sub-Registrar Office.',
            ],
            [
                'number' => '04',
                'icon'   => 'fa-chart-line',
                'title'  => 'Accessible Value & Growth',
                'desc'   => 'Delivering upscale plotted communities at accessible, modest pricing without hidden charges — providing buyers and families with enduring asset value and solid appreciation potential.',
            ],
        ];

        $hyderabadStory = [
            'eyebrow'    => 'WHERE INVESTMENTS FLOURISH',
            'headline'   => 'Hyderabad — A Thriving Hub for Real Estate',
            'lead'       => 'Once celebrated as the City of Pearls, Hyderabad has transformed into one of India’s most dynamic and resilient real estate powerhouses.',
            'paragraphs' => [
                'Driven by world-class infrastructure, seamless connectivity, stable governance, and an expanding economic base of IT corridors, pharmaceutical clusters, and premier educational institutions, the city is a primary destination for both long-term investors and families building custom homes.',
                'With major national healthcare institutions like AIIMS Bibinagar, the 6-lane NH-163 expressway, and the upcoming Regional Ring Road (RRR), the eastern growth corridor represents one of Hyderabad’s most balanced and infrastructure-backed growth paths.',
                'What sets plotted land apart is 100% direct land ownership without depreciating super-built-up structures, consistent capital appreciation, and the freedom to build on your own schedule with complete peace of mind.',
            ],
        ];

        $locationHighlights = [
            [
                'name'     => 'AIIMS Medical University & Hospital (750 Beds)',
                'distance' => '2.5 Km',
                'time'     => '05 Mins',
                'icon'     => 'fa-hospital',
                'desc'     => 'Premier national medical institute with 750 operational beds, medical college, and healthcare staff.',
                'image'    => asset('venture/landmarks/Aiims Bibinagar.jpg'),
            ],
            [
                'name'     => 'National Highway NH-163 (Hyd-Warangal 6-Lane)',
                'distance' => '1.5 Km',
                'time'     => '03 Mins',
                'icon'     => 'fa-road',
                'desc'     => '6-lane highway connecting eastern Hyderabad directly to Yadadri, Jangaon, and Warangal.',
                'image'    => asset('venture/landmarks/National Highway NH - 163.jpg'),
            ],
            [
                'name'     => 'Bibinagar Junction Railway Station',
                'distance' => '3.0 Km',
                'time'     => '05 Mins',
                'icon'     => 'fa-train-subway',
                'desc'     => 'Suburban railway junction with direct suburban services connecting to Secunderabad and Kazipet.',
                'image'    => asset('venture/landmarks/MMTS BIBINAGAR.jpg'),
            ],
            [
                'name'     => 'Outer Ring Road (ORR Exit No. 9 Ghatkesar)',
                'distance' => '14 Km',
                'time'     => '15 Mins',
                'icon'     => 'fa-route',
                'desc'     => 'Signal-free expressway access connecting to Rajiv Gandhi International Airport and the Financial District.',
                'image'    => null,
            ],
            [
                'name'     => 'Infosys SEZ Campus, Pocharam',
                'distance' => '18 Km',
                'time'     => '20 Mins',
                'icon'     => 'fa-laptop-code',
                'desc'     => '450-acre IT development center employing over 25,000 technology professionals.',
                'image'    => null,
            ],
            [
                'name'     => 'Uppal Metro Station',
                'distance' => '28 Km',
                'time'     => '30 Mins',
                'icon'     => 'fa-train',
                'desc'     => 'Rapid metro transit access connecting eastern Hyderabad to Ameerpet and Hitec City.',
                'image'    => null,
            ],
        ];

        $buyersGuide = [
            [
                'number'  => '01',
                'title'   => 'Priced for Potential',
                'tagline' => 'Transparent Pricing Structure',
                'icon'    => 'fa-tags',
                'desc'    => 'We are committed to offering residential plots at accessible pricing that delivers exceptional asset value without compromise. Our transparent pricing structure, completely free from hidden charges, ensures you know exactly what you invest in. With developments located in active growth corridors, your land is positioned for long-term appreciation from day one.',
                'takeaway'=> 'Our focus is on helping you make a smart, secure, and rewarding investment decision.',
            ],
            [
                'number'  => '02',
                'title'   => 'Mastery in Execution',
                'tagline' => 'Rigorous On-Ground Quality',
                'icon'    => 'fa-screwdriver-wrench',
                'desc'    => 'Impeccable execution is at the heart of every project we deliver. From detailed civil planning to on-ground implementation, our team follows a streamlined process driven by precision and professionalism. Wide concrete avenues, engineered underground drainage, and durable utility networks are built strictly to municipal standards.',
                'takeaway'=> 'We don’t just promise quality — we consistently deliver it on the ground.',
            ],
            [
                'number'  => '03',
                'title'   => 'Service with Integrity',
                'tagline' => 'Customer-Centric Advisory',
                'icon'    => 'fa-handshake-angle',
                'desc'    => 'Customer-centric service is our core operating philosophy. We prioritize your needs at every step — helping you select the right plot, reviewing legal documentation in clear terms, coordinating bank loan verification with leading lenders, and providing dedicated on-ground registration support.',
                'takeaway'=> 'Trust is built through genuine care, accessible documentation, and consistent support.',
            ],
            [
                'number'  => '04',
                'title'   => 'Project Orientation',
                'tagline' => 'Dry Run Experience on Ground',
                'icon'    => 'fa-compass',
                'desc'    => 'We understand the importance of making informed decisions. That is why we provide a complete project orientation experience: walk through the layout in person, inspect individual plot boundaries, observe completed amenities, and verify documentation before making any commitment.',
                'takeaway'=> 'Complete clarity and confidence at every step of your buying journey.',
            ],
        ];

        $projects = [
            [
                'id'           => 'rrr-prekshitha-enclave',
                'name'         => 'RRR Prekshitha Enclave (Phase 2)',
                'category'     => 'HMDA & RERA Approved Residential Plotted Community',
                'status_badge' => 'Active Project',
                'badge_class'  => 'status-available',
                'location'     => 'Opposite AIIMS Bibinagar, NH-163 Corridor',
                'extent'       => '17 Acres (Phase 2 Sanction)',
                'units'        => '150+ Plotted Units',
                'plot_sizes'   => '167, 200, 220 & 267 Sq. Yards',
                'road_widths'  => "40' & 30' M-25 Concrete Roads",
                'approvals'    => 'HMDA LP No: 000022/LO/Plg/HMDA/2023 & TSRERA Form C',
                'amenities'    => '3 Landscaped Theme Parks, Underground Drainage, Overhead Water Tank, LED Lighting, Security Cabin',
                'image'        => asset('images/projects/rrr-prekshitha/entrance-arch-grand.webp'),
                'view_url'     => route('plots.index'),
                'view_label'   => 'Check Plot Availability',
                'layout_url'   => asset('venture/docs/RRR PREKSHITHA ENCLAVE LAYOUT.pdf'),
                'brochure_url' => asset('venture/docs/RRR PREKSHITHA ENCLAVE BROCHURE.pdf'),
            ],
            [
                'id'           => 'golden-farms',
                'name'         => 'Navagruha Golden Farms',
                'category'     => 'Premium Managed Farmland Development',
                'status_badge' => 'Available',
                'badge_class'  => 'status-reserved',
                'location'     => 'Expanding Green Corridor, Greater Hyderabad',
                'extent'       => 'Managed Agricultural Layout',
                'units'        => 'Spacious Farmland Units',
                'plot_sizes'   => '605 & 1,210 Sq. Yards (0.5 & 1 Guntha+)',
                'road_widths'  => "30' Wide Internal Roads",
                'approvals'    => 'Clear Title Deeds & Transparent Land Documentation',
                'amenities'    => 'Drip Irrigation Infrastructure, Fruit-Bearing Plantation, Perimeter Fencing, Security Gate',
                'image'        => asset('venture/photos/09.jpg'),
                'view_url'     => route('contact'),
                'view_label'   => 'Enquire About Farmland',
                'layout_url'   => null,
                'brochure_url' => null,
            ],
        ];

        $ventureDocs = [
            [
                'name'      => 'HMDA Final Sanction Order',
                'authority' => 'Hyderabad Metropolitan Development Authority',
                'reference' => 'LP No: 000022/LO/Plg/HMDA/2023',
                'subtext'   => 'File No: 062715/LT/GHT/FLT/U6/HMDA/27052024, Approved 23 Dec 2025',
                'icon'      => 'fa-certificate',
                'badge'     => 'HMDA Final',
                'url'       => asset('venture/docs/HMDA FINAL APPROVAL PHASE2.pdf'),
            ],
            [
                'name'      => 'Telangana RERA Registration',
                'authority' => 'Telangana Real Estate Regulatory Authority',
                'reference' => 'TSRERA Form C Certified',
                'subtext'   => 'Compliant residential plotted layout registration under TSRERA',
                'icon'      => 'fa-shield-halved',
                'badge'     => 'TSRERA Certified',
                'url'       => asset('venture/docs/RERA APPROVAL PHASE1.pdf'),
            ],
            [
                'name'      => 'Master Layout Blueprint',
                'authority' => 'HMDA Sanctioned Layout Plan',
                'reference' => '158 Plotted Units Layout',
                'subtext'   => 'High-resolution blueprint with road alignments, plot dimensions, and park boundaries',
                'icon'      => 'fa-map',
                'badge'     => 'Layout Plan',
                'url'       => asset('venture/docs/RRR PREKSHITHA ENCLAVE LAYOUT.pdf'),
            ],
            [
                'name'      => 'Project Information Brochure',
                'authority' => 'Navagruha Infra Developers',
                'reference' => 'RRR Prekshitha Enclave Dossier',
                'subtext'   => 'Comprehensive project overview, civic specifications, and regional connectivity route',
                'icon'      => 'fa-book-open',
                'badge'     => 'Official Brochure',
                'url'       => asset('venture/docs/RRR PREKSHITHA ENCLAVE BROCHURE.pdf'),
            ],
            [
                'name'      => 'Project Summary Pamphlet',
                'authority' => 'Navagruha Infra Developers',
                'reference' => 'Quick Reference Dossier',
                'subtext'   => 'Key layout features, dimensions overview, and corridor road connectivity summary',
                'icon'      => 'fa-file-lines',
                'badge'     => 'Quick Summary',
                'url'       => asset('venture/docs/RRR PREKSHITHA ENCLAVE PAMPHLET.pdf'),
            ],
        ];

        $infrastructureStatus = [
            [
                'title'  => "40' & 30' M-25 Concrete Roads",
                'status' => 'Completed',
                'desc'   => 'Heavy-duty concrete avenues built for long-term durability, with integrated side kerbing and storm drainage.',
                'image'  => asset('images/projects/rrr-prekshitha/concrete-boulevard-40ft.webp'),
                'icon'   => 'fa-road',
            ],
            [
                'title'  => 'Underground Drainage Network',
                'status' => 'Completed',
                'desc'   => 'Fully underground sewage and storm-water drainage channels preventing waterlogging and stagnation.',
                'image'  => asset('venture/photos/04.jpg'),
                'icon'   => 'fa-faucet-drip',
            ],
            [
                'title'  => 'Overhead Water Tank & Supply',
                'status' => 'Constructed',
                'desc'   => 'Dedicated overhead water storage tank with underground supply pipelines connected to individual plot boundaries.',
                'image'  => asset('images/projects/rrr-prekshitha/overhead-water-tank.webp'),
                'icon'   => 'fa-water',
            ],
            [
                'title'  => 'Electricity & LED Street Lighting',
                'status' => 'Installed',
                'desc'   => 'Dedicated electrical transformer, underground distribution lines, and energy-efficient LED streetlights.',
                'image'  => asset('venture/photos/05.jpg'),
                'icon'   => 'fa-bolt',
            ],
            [
                'title'  => '3 Thematic Landscaped Parks',
                'status' => 'Developed',
                'desc'   => 'Over 1.5 acres of designated green park zones with paved walking tracks, shaded seating, and children play areas.',
                'image'  => asset('images/projects/rrr-prekshitha/layout-parks-broad-view.webp'),
                'icon'   => 'fa-tree',
            ],
            [
                'title'  => 'Grand Entrance Arch & Security',
                'status' => 'Completed',
                'desc'   => 'Monumental entrance gateway with 24/7 security cabin and demarcated perimeter fencing.',
                'image'  => asset('images/projects/rrr-prekshitha/entrance-arch-grand.webp'),
                'icon'   => 'fa-archway',
            ],
        ];

        $investmentSteps = [
            [
                'step'  => '01',
                'title' => 'Enquire',
                'desc'  => 'Connect with our team online or by phone to discuss your budget, preferred plot dimensions, and purchase timeline.',
            ],
            [
                'step'  => '02',
                'title' => 'Understand the Project',
                'desc'  => 'Review the HMDA-approved master plan, plot orientations (East / West), dimensional specifications, and infrastructure.',
            ],
            [
                'step'  => '03',
                'title' => 'Visit the Site',
                'desc'  => 'Experience the venture on-ground with guided walkthroughs and complimentary pickup from Uppal Metro or Ghatkesar ORR Exit 9.',
            ],
            [
                'step'  => '04',
                'title' => 'Verify Documentation',
                'desc'  => 'Inspect certified copies of the HMDA Final Sanction LP order, TSRERA certificate, title link documents, and Encumbrance Certificate.',
            ],
            [
                'step'  => '05',
                'title' => 'Select Your Plot',
                'desc'  => 'Choose your exact plot number from our live inventory, confirm boundary measurements, and review transparent cost sheets.',
            ],
            [
                'step'  => '06',
                'title' => 'Spot Registration',
                'desc'  => 'Complete direct sale deed spot registration and official revenue mutation at the Bibinagar Sub-Registrar Office with full developer support.',
            ],
        ];

        $faqs = [
            [
                'question' => 'What makes plotted development an attractive real estate option?',
                'answer'   => 'Plotted development provides 100% direct land ownership without depreciating super-built-up structures. It gives you the flexibility to build your custom home or villa on your own schedule, while land values in infrastructure-backed corridors historically appreciate more predictably.',
            ],
            [
                'question' => 'What official government approvals does RRR Prekshitha Enclave hold?',
                'answer'   => 'The venture holds HMDA Final Layout Sanction under LP No: 000022/LO/Plg/HMDA/2023 (File No: 062715/LT/GHT/FLT/U6/HMDA/27052024, approved 23 December 2025) and is registered under Telangana RERA (TSRERA Form C certified).',
            ],
            [
                'question' => 'How can I inspect and verify the project documentation?',
                'answer'   => 'Certified copies of the HMDA sanction order, TSRERA registration certificate, master layout blueprint, and chain-of-title link documents are available for inspection at our office or can be downloaded directly from the Approvals section on this page.',
            ],
            [
                'question' => 'Can I schedule an on-ground site visit before making a decision?',
                'answer'   => 'Yes. Guided on-site inspections are available seven days a week from 9:00 AM to 6:30 PM. We also provide complimentary site transportation from Uppal Metro Station and Ghatkesar ORR Exit 9.',
            ],
            [
                'question' => 'How can I check live plot availability in the project?',
                'answer'   => 'You can explore our interactive layout on the Plots page, which displays available, reserved, and registered plots with exact dimensions, facing directions (East/West), and road widths.',
            ],
            [
                'question' => 'Are bank loan facilities available for plot purchase and construction?',
                'answer'   => 'Yes. The layout is approved for plot purchase and home construction loans up to 75% to 80% through premier financial institutions including State Bank of India (SBI), HDFC Bank, ICICI Bank, and LIC Housing Finance.',
            ],
            [
                'question' => 'What is the standard registration process for a plot?',
                'answer'   => 'Once documentation and formalities are finalized, direct spot registration of the sale deed is completed at the Bibinagar Sub-Registrar Office, accompanied by our legal executive, followed by revenue mutation in your name.',
            ],
            [
                'question' => 'How can I obtain current pricing and commercial terms?',
                'answer'   => 'You can click "Unlock Price" on any plot card on our Plots page to view direct developer pricing, or contact our team directly at +91 9617 699 699 for an all-inclusive cost breakdown.',
            ],
        ];

        return view('investors-guide', compact(
            'ventureLegal',
            'whyInvest',
            'hyderabadStory',
            'locationHighlights',
            'buyersGuide',
            'projects',
            'ventureDocs',
            'infrastructureStatus',
            'investmentSteps',
            'faqs'
        ));
    }
}
