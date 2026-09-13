@extends('layouts.app')

@section('title', 'Plots Near AIIMS Bibinagar — Location & Connectivity | Navagruha')
@section('meta_description', 'Explore plots near AIIMS Bibinagar along the NH-163 Warangal Highway corridor. High-growth villa plots near AIIMS Bibinagar, residential plots, and investment plots in Bibinagar.')
@section('meta_keywords', 'Plots Near AIIMS Bibinagar, Villa Plots Near AIIMS Bibinagar, Residential Plots Near AIIMS Bibinagar, Investment Plots in Bibinagar')
@section('canonical_url', route('location'))

@section('structured_data')
<script type="application/ld+json">
{
  "{{ '@' }}context": "https://schema.org",
  "{{ '@' }}type": "Place",
  "name": "Plots Near AIIMS Bibinagar — Navagruha Prekshitha Enclave Location",
  "description": "Explore plots near AIIMS Bibinagar along the NH-163 Warangal Highway corridor. High-growth villa plots near AIIMS Bibinagar, residential plots, and investment plots in Bibinagar.",
  "url": "{{ route('location') }}",
  "address": {
    "{{ '@' }}type": "PostalAddress",
    "streetAddress": "Opposite AIIMS Medical Campus, NH-163 Warangal Highway",
    "addressLocality": "Bibinagar",
    "addressRegion": "Telangana",
    "postalCode": "508126",
    "addressCountry": "IN"
  }
}
</script>
@endsection

@section('content')

    <!-- Hero / Breadcrumb Banner with Real Venture Background -->
    <section class="section-dark text-light relative overflow-hidden py-5 border-bottom border-white-10" style="background: linear-gradient(135deg, rgba(14, 26, 36, 0.93) 0%, rgba(20, 37, 51, 0.85) 50%, rgba(35, 65, 89, 0.90) 100%), url('{{ asset('venture/landmarks/Aiims Bibinagar.jpg') }}') center/cover no-repeat;">
        <div class="wm-hero-watermark" style="opacity: 0.05;">BIBINAGAR</div>
        <div class="container relative z-2">
            <div class="row g-4 justify-content-between align-items-center">
                <div class="col-md-8">
                    <div class="subtitle text-brand-secondary font-copperplate mb-2">
                        <i class="fa-solid fa-map-location-dot me-1"></i> Regional Connectivity
                    </div>
                    <h1 class="fs-48 text-white font-copperplate lh-1-1 mb-2">
                        Location and Connectivity
                    </h1>
                    <p class="text-white-50 fs-16 mb-0">
                        Located near AIIMS Bibinagar on the Hyderabad to Warangal highway (NH-163).
                    </p>
                </div>
                <div class="col-md-4 text-md-end">
                    <ul class="crumb text-light font-copperplate fs-12 list-inline mb-0">
                        <li class="list-inline-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a> &nbsp;/</li>
                        <li class="list-inline-item active text-brand-secondary">Location</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Location Matrix & Highlights Section -->
    <section class="bg-brand-dark text-light py-80">
        <div class="container">
            
            <!-- Commute Quick Stat Bar -->
            <div class="row g-3 mb-5">
                <div class="col-6 col-md-3">
                    <div class="stat-metric-card p-3">
                        <i class="fa-solid fa-hospital text-brand-secondary fs-24"></i>
                        <div>
                            <div class="stat-metric-title fs-16">05 Mins</div>
                            <div class="stat-metric-subtitle fs-11">AIIMS Medical Hub</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-metric-card p-3">
                        <i class="fa-solid fa-road text-brand-secondary fs-24"></i>
                        <div>
                            <div class="stat-metric-title fs-16">05 Mins</div>
                            <div class="stat-metric-subtitle fs-11">NH-163 Expressway</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-metric-card p-3">
                        <i class="fa-solid fa-route text-brand-secondary fs-24"></i>
                        <div>
                            <div class="stat-metric-title fs-16">20 Mins</div>
                            <div class="stat-metric-subtitle fs-11">ORR Exit 9 (Ghatkesar)</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-metric-card p-3">
                        <i class="fa-solid fa-building text-brand-secondary fs-24"></i>
                        <div>
                            <div class="stat-metric-title fs-16">20 Mins</div>
                            <div class="stat-metric-subtitle fs-11">Infosys Pocharam SEZ</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Visual Landmark Showcase Gallery -->
            <div class="mb-5">
                <div class="subtitle text-brand-secondary font-copperplate mb-1">Surrounding Infrastructure</div>
                <h2 class="fs-28 text-white font-copperplate mb-4 pb-2 border-bottom border-white-10">
                    Key Landmark Connectivity
                </h2>

                <div class="row g-4">
                    <div class="col-md-4 col-12">
                        <div class="gallery-showcase-item">
                            <img src="{{ asset('venture/landmarks/Aiims Bibinagar.jpg') }}" alt="AIIMS Bibinagar Super Specialty Hospital">
                            <div class="gallery-showcase-overlay"></div>
                            <div class="gallery-showcase-content">
                                <h4 class="gallery-showcase-title">AIIMS Bibinagar</h4>
                                <div class="gallery-showcase-subtitle">750-Bed Hospital, 5 Minutes Away</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="gallery-showcase-item">
                            <img src="{{ asset('venture/landmarks/National Highway NH - 163.jpg') }}" alt="National Highway NH-163">
                            <div class="gallery-showcase-overlay"></div>
                            <div class="gallery-showcase-content">
                                <h4 class="gallery-showcase-title">NH-163 Expressway</h4>
                                <div class="gallery-showcase-subtitle">6-Lane Highway Corridor, 5 Minutes Away</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="gallery-showcase-item">
                            <img src="{{ asset('venture/landmarks/MMTS BIBINAGAR.jpg') }}" alt="Bibinagar MMTS Suburban Railway">
                            <div class="gallery-showcase-overlay"></div>
                            <div class="gallery-showcase-content">
                                <h4 class="gallery-showcase-title">Bibinagar MMTS Railway</h4>
                                <div class="gallery-showcase-subtitle">Suburban Rail Station, 5 Minutes Away</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Official Highway Billboard & Connectivity Campaign -->
            <div class="mb-5">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <div>
                        <div class="subtitle text-brand-secondary font-copperplate mb-1">Active Outdoor Campaign</div>
                        <h2 class="fs-28 text-white font-copperplate mb-0">
                            Official Highway Corridor Billboards
                        </h2>
                    </div>
                    <div>
                        <span class="badge bg-brand-primary bg-opacity-30 border border-brand-primary border-opacity-40 text-brand-secondary font-copperplate fs-12 px-3 py-2 rounded-pill">
                            <i class="fa-solid fa-bullhorn me-1"></i> NH-163 Outdoor Campaign
                        </span>
                    </div>
                </div>
                <p class="text-white-50 fs-14 mb-4">
                    Active highway hoardings on the Hyderabad to Warangal growth corridor demonstrating verified proximity to AIIMS, Bibinagar MMTS, and NH-163. Click any billboard to inspect high-resolution details and official approval numbers.
                </p>

                <div class="row g-4">
                    <!-- Creative 3: AIIMS Bibinagar 5 Mins -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="creative-billboard-card" onclick="openCreativeModal('{{ asset('data/creatives/creative3.jpeg') }}', 'Reach AIIMS Bibinagar in 5 Minutes', 'Premier 750-Bed Central Medical Institute & Hospital Corridor')">
                            <div class="creative-img-wrap">
                                <img src="{{ asset('data/creatives/creative3.jpeg') }}" alt="Plots Near AIIMS Bibinagar — AIIMS Bibinagar Corridor Billboard" class="creative-img" loading="lazy">
                                <div class="creative-badge">05 MINS</div>
                                <div class="creative-zoom-overlay">
                                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                                    <span>Click to View Full Billboard</span>
                                </div>
                            </div>
                            <div class="creative-caption">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <h4 class="fs-16 text-white font-copperplate mb-0">AIIMS Bibinagar</h4>
                                    <span class="badge bg-dark text-brand-secondary font-copperplate fs-10 px-2 py-0.5 rounded border border-white-10">5 Mins Away</span>
                                </div>
                                <div class="text-white-50 fs-12">
                                    750-bed premier super-specialty medical institute with fast accessibility from RRR Prekshitha Enclave.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Creative 2: Bibinagar MMTS 5 Mins -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="creative-billboard-card" onclick="openCreativeModal('{{ asset('data/creatives/creative2.jpeg') }}', 'Reach Bibinagar MMTS in 5 Minutes', 'Rapid Suburban Rail Transit to Secunderabad & Hyderabad Central')">
                            <div class="creative-img-wrap">
                                <img src="{{ asset('data/creatives/creative2.jpeg') }}" alt="Investment Plots in Bibinagar — Bibinagar MMTS Station Billboard" class="creative-img" loading="lazy">
                                <div class="creative-badge">05 MINS</div>
                                <div class="creative-zoom-overlay">
                                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                                    <span>Click to View Full Billboard</span>
                                </div>
                            </div>
                            <div class="creative-caption">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <h4 class="fs-16 text-white font-copperplate mb-0">Bibinagar MMTS Station</h4>
                                    <span class="badge bg-dark text-brand-secondary font-copperplate fs-10 px-2 py-0.5 rounded border border-white-10">5 Mins Away</span>
                                </div>
                                <div class="text-white-50 fs-12">
                                    Direct suburban commuter railway line connecting daily passengers seamlessly to Secunderabad junction.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Creative 1: National Highway NH-163 5 Mins -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="creative-billboard-card" onclick="openCreativeModal('{{ asset('data/creatives/creative1.jpeg') }}', 'Reach National Highway NH-163 in 5 Minutes', 'HMDA Approved Layout LP No: 000085/LO/Plg/HMDA/2024 & TG RERA: P02200008537')">
                            <div class="creative-img-wrap">
                                <img src="{{ asset('data/creatives/creative1.jpeg') }}" alt="Villa Plots Near AIIMS Bibinagar — NH-163 National Highway Billboard" class="creative-img" loading="lazy">
                                <div class="creative-badge">05 MINS</div>
                                <div class="creative-zoom-overlay">
                                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                                    <span>Click to View Full Billboard</span>
                                </div>
                            </div>
                            <div class="creative-caption">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <h4 class="fs-16 text-white font-copperplate mb-0">NH-163 Growth Corridor</h4>
                                    <span class="badge bg-dark text-brand-secondary font-copperplate fs-10 px-2 py-0.5 rounded border border-white-10">5 Mins Away</span>
                                </div>
                                <div class="text-white-50 fs-12">
                                    6-lane industrial highway corridor facing proposed 100-ft road with spot registration and bank loan approvals.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Categorized Location Grid -->
            @foreach($locationHighlights as $categoryTitle => $places)
                <div class="mb-5">
                    <div class="subtitle text-brand-secondary font-copperplate mb-1">Connectivity Belt</div>
                    <h2 class="fs-26 text-white font-copperplate mb-4 pb-2 border-bottom border-white-10">
                        {{ $categoryTitle }}
                    </h2>

                    <div class="row g-4">
                        @foreach($places as $place)
                            <div class="col-lg-6 col-12">
                                <div class="location-highlight-card p-4">
                                    <div class="rounded-circle bg-brand-primary p-3 d-flex align-items-center justify-content-center text-brand-secondary" style="width: 52px; height: 52px; flex-shrink: 0; border: 1px solid rgba(113, 182, 68, 0.3);">
                                        <i class="fa-solid {{ $place['icon'] }} fs-22"></i>
                                    </div>
                                    <div class="flex-grow-1 min-w-0">
                                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-1">
                                            <h4 class="fs-18 text-white font-copperplate mb-0">{{ $place['name'] }}</h4>
                                            <span class="status-available fs-11">
                                                <i class="fa-regular fa-clock me-1"></i> {{ $place['time'] }} ({{ $place['distance'] }})
                                            </span>
                                        </div>
                                        <p class="text-white-50 fs-13 mb-0 mt-1">
                                            {{ $place['desc'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <!-- Google Map Embed & Directions -->
            <div class="mt-80">
                <div class="p-4 p-md-5 rounded-4 bg-brand-card border border-white-10">
                    <div class="row g-4 align-items-center justify-content-between mb-4">
                        <div class="col-md-8">
                            <div class="subtitle text-brand-secondary mb-1">Live Map Navigation</div>
                            <h3 class="fs-28 text-white font-copperplate mb-0">Navigate to Venture on Google Maps</h3>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <a href="https://maps.app.goo.gl/jTyRs8yxpdLZE6pd7" target="_blank" class="btn-main">
                                <i class="fa-solid fa-diamond-turn-right me-1"></i> Open GPS Directions &rarr;
                            </a>
                        </div>
                    </div>

                    <div class="rounded-4 overflow-hidden border border-white-10">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3805.8576404179354!2d78.7844005!3d17.4665427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb76371dfa5b47%3A0x6b441fdfdf2d94cf!2sAIIMS%20Bibinagar!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" width="100%" height="420" style="border:0; display: block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
