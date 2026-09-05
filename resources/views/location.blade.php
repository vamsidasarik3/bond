@extends('layouts.app')

@section('title', 'Location and Connectivity, Navagruha Prekshitha Enclave near AIIMS Bibinagar')
@section('meta_description', 'Explore location advantages of Navagruha Prekshitha Enclave near 750-Bed AIIMS Bibinagar, NH-163 Warangal highway, Ghatkesar ORR Exit 9, and Infosys Pocharam SEZ.')

@section('content')

    <!-- Hero / Breadcrumb Banner with Real Venture Background -->
    <section class="section-dark text-light relative overflow-hidden py-5 border-bottom border-white-10 bg-brand-pattern" style="background: linear-gradient(135deg, rgba(14, 26, 36, 0.93) 0%, rgba(20, 37, 51, 0.85) 50%, rgba(35, 65, 89, 0.90) 100%), url('{{ asset('venture/landmarks/Aiims Bibinagar.jpg') }}') center/cover no-repeat;">
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
                            <div class="stat-metric-title fs-16">15 Mins</div>
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
