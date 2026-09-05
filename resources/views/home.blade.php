@extends('layouts.app')

@section('title', 'Navagruha Infra Developers, Residential Plots near AIIMS Bibinagar')
@section('meta_description', '17-Acre HMDA and RERA approved residential plotted layout at AIIMS Bibinagar, Telangana. Spot registration and bank loan assistance available.')

@section('content')

    {{-- 1. Hero Section (Demo 1 Luxury Swiper Slider with Authentic 3D Renders & NAVAGRUHA Branding) --}}
    <section id="section-hero" class="section-dark p-0 text-light no-top no-bottom position-relative overflow-hidden">
        
        <div class="wm-hero-watermark">HMDA APPROVED</div>

        <div class="swiper swiper-home-auto">
            <div class="swiper-wrapper">
                
                {{-- Slide 1: Grand Entrance Arch 3D Render --}}
                <div class="swiper-slide position-relative">
                    <div class="swiper-inner position-relative d-flex align-items-center"
                         style="background-image: url('{{ asset('images/projects/rrr-prekshitha/entrance-arch-grand.webp') }}'); background-size: cover; background-position: center; min-height: 85vh;">
                        <div class="hero-navagruha-overlay"></div>
                        
                        <div class="container position-relative z-3">
                            <div class="row align-items-center">
                                <div class="col-lg-9 col-xl-8">
                                    <div class="hero-brand-pill mb-3">
                                        <span class="text-white font-copperplate fs-11">NAVAGRUHA INFRA DEVELOPERS</span>
                                    </div>
                                    
                                    <h1 class="hero-title mb-2">
                                        Residential Plots near AIIMS Bibinagar
                                    </h1>

                                    <h4 class="hero-subtitle-location mb-3">
                                        <i class="fa-solid fa-location-dot me-2 text-brand-secondary"></i>Bibinagar, Hyderabad to Warangal Highway (NH-163)
                                    </h4>
                                    
                                    <p class="hero-lead mb-4">
                                        A 17-acre gated community of HMDA-approved residential plots located on the Hyderabad to Warangal highway, five minutes from AIIMS Bibinagar.
                                    </p>
                                    
                                    <div class="d-flex flex-wrap gap-3">
                                        <a href="{{ route('plots.index') }}" class="btn-secondary-brand">
                                            <span><i class="fa-solid fa-border-all me-1"></i> Explore Available Plots</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="btn-primary-brand">
                                            <span>Book Site Visit &rarr;</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Slide 2: 40ft Heavy-Duty Concrete Avenue 3D Render --}}
                <div class="swiper-slide position-relative">
                    <div class="swiper-inner position-relative d-flex align-items-center"
                         style="background-image: url('{{ asset('images/projects/rrr-prekshitha/concrete-boulevard-40ft.webp') }}'); background-size: cover; background-position: center; min-height: 85vh;">
                        <div class="hero-navagruha-overlay"></div>
                        
                        <div class="container position-relative z-3">
                            <div class="row align-items-center">
                                <div class="col-lg-9 col-xl-8">
                                    <div class="hero-brand-pill mb-3">
                                        <span class="text-white font-copperplate fs-11">HMDA APPROVED LAYOUT WITH SPOT REGISTRATION</span>
                                    </div>
                                    
                                    <h1 class="hero-title mb-2">
                                        Built for Better Living
                                    </h1>

                                    <h4 class="hero-subtitle-location mb-3">
                                        <i class="fa-solid fa-road me-2 text-brand-secondary"></i>40' &amp; 30' M-25 Grade Concrete Roads
                                    </h4>
                                    
                                    <p class="hero-lead mb-4">
                                        Enjoy thoughtfully planned infrastructure with durable concrete roads, underground drainage, three landscaped parks and convenient bank loan options.
                                    </p>
                                    
                                    <div class="d-flex flex-wrap gap-3">
                                        <a href="{{ route('plots.index') }}" class="btn-secondary-brand">
                                            <span>View Availability Board</span>
                                        </a>
                                        <a href="#reels-section" class="btn-primary-brand">
                                            <span><i class="fa-solid fa-circle-play me-1"></i> Watch Video Tour &rarr;</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Slide 3: Landscaped Park & Walking Track 3D Render --}}
                <div class="swiper-slide position-relative">
                    <div class="swiper-inner position-relative d-flex align-items-center"
                         style="background-image: url('{{ asset('images/projects/rrr-prekshitha/avenue-plantation-walkway.webp') }}'); background-size: cover; background-position: center; min-height: 85vh;">
                        <div class="hero-navagruha-overlay"></div>
                        
                        <div class="container position-relative z-3">
                            <div class="row align-items-center">
                                <div class="col-lg-9 col-xl-8">
                                    <div class="hero-brand-pill mb-3">
                                        <span class="text-white font-copperplate fs-11">THREE LANDSCAPED PARKS AND GREEN SPACES</span>
                                    </div>
                                    
                                    <h1 class="hero-title mb-2">
                                        Parks, Walking Tracks and Green Open Spaces
                                    </h1>

                                    <h4 class="hero-subtitle-location mb-3">
                                        <i class="fa-solid fa-tree me-2 text-brand-secondary"></i>Walking Tracks and Children's Play Area
                                    </h4>
                                    
                                    <p class="hero-lead mb-4">
                                        Avenue plantations, street lighting, and open park spaces within the community, with immediate spot registration available.
                                    </p>
                                    
                                    <div class="d-flex flex-wrap gap-3">
                                        <a href="{{ asset('venture/docs/RRR PREKSHITHA ENCLAVE LAYOUT.pdf') }}" target="_blank" class="btn-secondary-brand">
                                            <span><i class="fa-solid fa-file-pdf me-1 text-danger"></i> Official Layout PDF</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="btn-primary-brand">
                                            <span>Schedule Site Tour &rarr;</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="gradient-edge-bottom"></div>
    </section>

    {{-- 2. 6-Card Visual Showcase Section (Authentic 3D Renders & Master Plan) --}}
    <section id="project" class="bg-brand-primary py-60 border-bottom border-white-10">
        <div class="container">
            <div class="row mb-4 align-items-end justify-content-between">
                <div class="col-lg-8">
                    <div class="subtitle text-brand-secondary font-copperplate mb-1">Project Renders</div>
                    <h2 class="fs-32 text-white font-copperplate mb-0">Community Infrastructure and Site Renders</h2>
                </div>
                <div class="col-lg-4 text-lg-end mt-2 mt-lg-0">
                    <a href="{{ route('amenities') }}" class="btn-outline-brand font-copperplate fs-12 px-3 py-2 rounded-pill">
                        <span>All Amenities &rarr;</span>
                    </a>
                </div>
            </div>

            <div class="row g-4">
                
                {{-- Item 1: Grand Entrance Arch --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(0)">
                        <img src="{{ asset('images/projects/rrr-prekshitha/entrance-arch-grand.webp') }}" alt="Grand Entrance Arch">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h4 class="gallery-showcase-title">Grand Entrance Arch</h4>
                            <div class="gallery-showcase-subtitle">24/7 Security Cabin &amp; Boom Barrier</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View Entrance</span>
                        </div>
                    </div>
                </div>

                {{-- Item 2: 40ft CC Roads --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(1)">
                        <img src="{{ asset('images/projects/rrr-prekshitha/concrete-boulevard-40ft.webp') }}" alt="40ft CC Concrete Roads">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h4 class="gallery-showcase-title">40' &amp; 30' CC Roads</h4>
                            <div class="gallery-showcase-subtitle">Heavy-Duty Concrete Avenues</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View Roads</span>
                        </div>
                    </div>
                </div>

                {{-- Item 3: 3 Landscaped Parks --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(2)">
                        <img src="{{ asset('images/projects/rrr-prekshitha/avenue-plantation-walkway.webp') }}" alt="3 Landscaped Parks & Avenue">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h4 class="gallery-showcase-title">3 Landscaped Theme Parks</h4>
                            <div class="gallery-showcase-subtitle">Walking Track &amp; Gazebo</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View Greenery</span>
                        </div>
                    </div>
                </div>

                {{-- Item 4: Overhead Water Tank --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(3)">
                        <img src="{{ asset('images/projects/rrr-prekshitha/overhead-water-tank.webp') }}" alt="Overhead Water Tank">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h4 class="gallery-showcase-title">Overhead Water Storage</h4>
                            <div class="gallery-showcase-subtitle">Pressurized Water Supply to Each Plot</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View Water Infra</span>
                        </div>
                    </div>
                </div>

                {{-- Item 5: Pedestrian Walkways & Greenery --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(4)">
                        <img src="{{ asset('images/projects/rrr-prekshitha/internal-curbstone-avenue.webp') }}" alt="Pedestrian Walkway & Greenery">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h4 class="gallery-showcase-title">Avenue Plantations &amp; Walkways</h4>
                            <div class="gallery-showcase-subtitle">Curb Stones &amp; Modern Street Lighting</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View Pathways</span>
                        </div>
                    </div>
                </div>

                {{-- Item 6: Aerial Master View --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(5)">
                        <img src="{{ asset('images/projects/rrr-prekshitha/master-layout-aerial.webp') }}" alt="17-Acre Master Layout Aerial View">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h4 class="gallery-showcase-title">17-Acre Master Layout</h4>
                            <div class="gallery-showcase-subtitle">HMDA LP No. 000085/LO/Plg/HMDA/2024</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View Master Plan</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- 4. Venture Amenities & Facilities --}}
    <section id="amenities" class="bg-brand-dark text-light py-80">
        <div class="container">
            <div class="row g-4 align-items-end justify-content-between mb-5">
                <div class="col-lg-8">
                    <div class="subtitle text-brand-secondary mb-1">Project Infrastructure</div>
                    <h2 class="fs-36 text-white font-copperplate mb-0">Infrastructure and Site Amenities</h2>
                    <p class="text-white-50 fs-14 mt-2 mb-0">Constructed to standard HMDA specifications for durable living and long-term value.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="amenity-feature-card">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-3 overflow-hidden" style="height: 140px; background: #0c1620;">
                            <img src="{{ asset('images/projects/rrr-prekshitha/entrance-arch-grand.webp') }}" alt="Grand Entrance Arch" class="w-100 h-100 object-fit-cover">
                        </div>
                        <h4 class="fs-18 text-white font-copperplate mb-2">Grand Entrance Arch</h4>
                        <p class="text-white-50 fs-13 mb-0">Imposing designer entrance gateway with 24/7 security cabin and boom barrier access.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="amenity-feature-card">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-3 overflow-hidden" style="height: 140px; background: #0c1620;">
                            <img src="{{ asset('images/projects/rrr-prekshitha/concrete-boulevard-40ft.webp') }}" alt="40ft CC Roads" class="w-100 h-100 object-fit-cover">
                        </div>
                        <h4 class="fs-18 text-white font-copperplate mb-2">40' &amp; 30' CC Roads</h4>
                        <p class="text-white-50 fs-13 mb-0">Heavy-duty M-25 grade concrete roads built with kerbing and pedestrian pathways.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="amenity-feature-card">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-3 overflow-hidden" style="height: 140px; background: #0c1620;">
                            <img src="{{ asset('images/projects/rrr-prekshitha/avenue-plantation-walkway.webp') }}" alt="3 Landscaped Parks" class="w-100 h-100 object-fit-cover">
                        </div>
                        <h4 class="fs-18 text-white font-copperplate mb-2">3 Landscaped Parks</h4>
                        <p class="text-white-50 fs-13 mb-0">Central theme park with jogging track, children play apparatus, and avenue plantation.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="amenity-feature-card">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-3 overflow-hidden" style="height: 140px; background: #0c1620;">
                            <img src="{{ asset('images/projects/rrr-prekshitha/overhead-water-tank.webp') }}" alt="Overhead Water Tank" class="w-100 h-100 object-fit-cover">
                        </div>
                        <h4 class="fs-18 text-white font-copperplate mb-2">Overhead Water Tank</h4>
                        <p class="text-white-50 fs-13 mb-0">Comprehensive water pipeline network connecting each individual plot with round-the-clock supply.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 5. Venture Reels Section --}}
    <section id="reels-section" class="bg-brand-primary text-light py-80 border-top border-bottom border-white-10">
        <div class="container">
            
            <div class="row g-4 align-items-end justify-content-between mb-4">
                <div class="col-lg-8">
                    <h2 class="fs-36 text-white font-copperplate mb-0">Venture Reels</h2>
                    <p class="text-white-50 fs-14 mt-2 mb-0">
                        Watch official high-definition venture walkthroughs and short video reels showing actual on-ground development at AIIMS Bibinagar.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end mt-2 mt-lg-0">
                    <span class="badge bg-danger text-white font-copperplate px-3 py-2 rounded-pill fs-12">
                        <i class="fa-solid fa-circle-dot me-1 text-white animate-pulse"></i> Official Venture Footage
                    </span>
                </div>
            </div>

            <div class="row g-4 align-items-start">
                
                {{-- Left 6-Col: One Main Venture Video --}}
                <div class="col-lg-6 col-12">
                    <div class="plot-video-wrap mb-3" style="aspect-ratio: 16/9; position: relative; border-radius: 18px; overflow: hidden; background: #000; box-shadow: 0 16px 40px rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.12);">
                        <video id="mainVentureVideo" class="w-100 h-100 object-fit-cover" controls playsinline preload="metadata" poster="{{ asset('images/projects/rrr-prekshitha/aerial-drone-banner.webp') }}">
                            <source src="{{ asset('venture/videos/venture-walkthrough.mp4') }}" type="video/mp4">
                            Your browser does not support HTML5 video.
                        </video>
                    </div>
                    
                    <div class="d-flex flex-wrap gap-2">
                        <span class="video-chapter-pill">
                            <i class="fa-solid fa-camera me-1 text-brand-secondary"></i> On-Ground 4K Tour
                        </span>
                        <span class="video-chapter-pill">
                            <i class="fa-solid fa-location-arrow me-1 text-brand-secondary"></i> AIIMS Bibinagar (5 Min)
                        </span>
                        <span class="video-chapter-pill">
                            <i class="fa-solid fa-certificate me-1 text-brand-secondary"></i> HMDA Final Approved
                        </span>
                    </div>
                </div>

                {{-- Right 6-Col: 6 Videos (2 Rows × 3 Videos per Row) --}}
                <div class="col-lg-6 col-12">
                    <div class="row g-2 g-md-3">
                        
                        {{-- Row 1 - Video 1 --}}
                        <div class="col-4">
                            <div class="reel-card" onclick="openReelModal('{{ asset('venture/videos/REEL1.mp4') }}', 'Grand Entrance & 40ft Main Avenue')">
                                <img src="{{ asset('images/projects/rrr-prekshitha/entrance-arch-grand.webp') }}" alt="Reel 1 Poster" class="reel-card-poster">
                                <div class="reel-card-gradient"></div>
                                <div class="reel-card-content text-center">
                                    <div class="reel-play-btn mx-auto">
                                        <i class="fa-solid fa-play"></i>
                                    </div>
                                    <span class="reel-tag">Reel 01</span>
                                    <div class="reel-title">Entrance &amp; Avenue</div>
                                </div>
                            </div>
                        </div>

                        {{-- Row 1 - Video 2 --}}
                        <div class="col-4">
                            <div class="reel-card" onclick="openReelModal('{{ asset('venture/videos/REEL2.mp4') }}', 'Underground Utilities & Concrete Roads')">
                                <img src="{{ asset('images/projects/rrr-prekshitha/concrete-boulevard-40ft.webp') }}" alt="Reel 2 Poster" class="reel-card-poster">
                                <div class="reel-card-gradient"></div>
                                <div class="reel-card-content text-center">
                                    <div class="reel-play-btn mx-auto">
                                        <i class="fa-solid fa-play"></i>
                                    </div>
                                    <span class="reel-tag">Reel 02</span>
                                    <div class="reel-title">Site Progress</div>
                                </div>
                            </div>
                        </div>

                        {{-- Row 1 - Video 3 --}}
                        <div class="col-4">
                            <div class="reel-card" onclick="openReelModal('{{ asset('venture/videos/REEL3.mp4') }}', 'AIIMS Bibinagar Location & Highway Connectivity')">
                                <img src="{{ asset('images/projects/rrr-prekshitha/avenue-plantation-walkway.webp') }}" alt="Reel 3 Poster" class="reel-card-poster">
                                <div class="reel-card-gradient"></div>
                                <div class="reel-card-content text-center">
                                    <div class="reel-play-btn mx-auto">
                                        <i class="fa-solid fa-play"></i>
                                    </div>
                                    <span class="reel-tag">Reel 03</span>
                                    <div class="reel-title">AIIMS Corridor</div>
                                </div>
                            </div>
                        </div>

                        {{-- Row 2 - Video 4 --}}
                        <div class="col-4">
                            <div class="reel-card" onclick="openReelModal('{{ asset('venture/videos/REEL4.mp4') }}', 'Water Infrastructure & Overhead Tank')">
                                <img src="{{ asset('images/projects/rrr-prekshitha/overhead-water-tank.webp') }}" alt="Reel 4 Poster" class="reel-card-poster">
                                <div class="reel-card-gradient"></div>
                                <div class="reel-card-content text-center">
                                    <div class="reel-play-btn mx-auto">
                                        <i class="fa-solid fa-play"></i>
                                    </div>
                                    <span class="reel-tag">Reel 04</span>
                                    <div class="reel-title">Water Infra</div>
                                </div>
                            </div>
                        </div>

                        {{-- Row 2 - Video 5 --}}
                        <div class="col-4">
                            <div class="reel-card" onclick="openReelModal('{{ asset('venture/videos/REEL5.mp4') }}', 'Aerial Drone Perspective & Site Layout')">
                                <img src="{{ asset('images/projects/rrr-prekshitha/aerial-drone-banner.webp') }}" alt="Reel 5 Poster" class="reel-card-poster">
                                <div class="reel-card-gradient"></div>
                                <div class="reel-card-content text-center">
                                    <div class="reel-play-btn mx-auto">
                                        <i class="fa-solid fa-play"></i>
                                    </div>
                                    <span class="reel-tag">Reel 05</span>
                                    <div class="reel-title">Aerial Drone</div>
                                </div>
                            </div>
                        </div>

                        {{-- Row 2 - Video 6 --}}
                        <div class="col-4">
                            <div class="reel-card" onclick="openReelModal('{{ asset('venture/videos/REEL6.mp4') }}', 'Avenue Plantation & Concrete Works')">
                                <img src="{{ asset('images/projects/rrr-prekshitha/ground-development-progress.webp') }}" alt="Reel 6 Poster" class="reel-card-poster">
                                <div class="reel-card-gradient"></div>
                                <div class="reel-card-content text-center">
                                    <div class="reel-play-btn mx-auto">
                                        <i class="fa-solid fa-play"></i>
                                    </div>
                                    <span class="reel-tag">Reel 06</span>
                                    <div class="reel-title">Road Works</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- 6. Location Highlights & Strategic Commute Matrix --}}
    <section id="location" class="bg-brand-dark text-light py-80">
        <div class="container">
            <div class="row mb-4 g-4 align-items-center justify-content-between">
                <div class="col-lg-8">
                    <div class="subtitle text-brand-secondary font-copperplate">Location Highlights</div>
                    <h2 class="fs-36 text-white font-copperplate">Location and Commute Times</h2>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-12">
                    <div class="de-tab">
                        <ul class="d-tab-nav mb-4 border-bottom pb-4 d-flex">
                            <li class="active-tab font-copperplate">All Key Locations</li>
                            <li class="font-copperplate">Transit &amp; Highways</li>
                            <li class="font-copperplate">Institutes &amp; IT</li>
                            <li class="font-copperplate">Heritage &amp; Spiritual</li>
                        </ul>

                        <div class="d-tab-content">
                            <div class="row g-3">
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="location-feature-card">
                                        <div class="location-time-badge">05 MINS</div>
                                        <h4 class="fs-16 text-white font-copperplate mb-1">AIIMS Bibinagar</h4>
                                        <p class="text-white-50 fs-12 mb-0">750-Bed Premier Central Medical Institute</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="location-feature-card">
                                        <div class="location-time-badge">05 MINS</div>
                                        <h4 class="fs-16 text-white font-copperplate mb-1">NH-163 Warangal Highway</h4>
                                        <p class="text-white-50 fs-12 mb-0">6-Lane Industrial Growth Corridor</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="location-feature-card">
                                        <div class="location-time-badge">05 MINS</div>
                                        <h4 class="fs-16 text-white font-copperplate mb-1">Bibinagar MMTS Station</h4>
                                        <p class="text-white-50 fs-12 mb-0">Direct Suburban Rail to Secunderabad</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="location-feature-card">
                                        <div class="location-time-badge">15 MINS</div>
                                        <h4 class="fs-16 text-white font-copperplate mb-1">ORR Exit 9 (Ghatkesar)</h4>
                                        <p class="text-white-50 fs-12 mb-0">Expressway Access to Hyderabad City</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="location-feature-card">
                                        <div class="location-time-badge">20 MINS</div>
                                        <h4 class="fs-16 text-white font-copperplate mb-1">Infosys Pocharam SEZ</h4>
                                        <p class="text-white-50 fs-12 mb-0">Major IT Hub with 25,000+ Engineers</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="location-feature-card">
                                        <div class="location-time-badge">20 MINS</div>
                                        <h4 class="fs-16 text-white font-copperplate mb-1">Yadadri Temple Shrine</h4>
                                        <p class="text-white-50 fs-12 mb-0">Historic Spiritual and Cultural Landmark</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 8. Guided Site Tour CTA Banner --}}
    <section class="bg-brand-dark text-light py-80">
        <div class="container">
            <div class="p-4 p-md-5 rounded-4 bg-brand-card border border-white-10 shadow-lg">
                <div class="row g-4 align-items-center justify-content-between">
                    <div class="col-lg-8">
                        <div class="subtitle text-brand-secondary mb-1">Clear Marketable Title</div>
                        <h3 class="fs-32 text-white font-copperplate mb-2">Schedule a Guided Site Visit</h3>
                        <p class="text-white-50 fs-15 mb-0">
                            Site transport is available from Uppal Metro Station and Ghatkesar. Spot registration assistance provided.
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="{{ route('contact') }}" class="btn-main py-3 px-4">
                            <span>Book Guided Site Tour &rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Reel Video Modal Overlay --}}
    <div class="reel-modal-overlay" id="reelModalOverlay" onclick="closeReelModal(event)">
        <div class="reel-modal-dialog" onclick="event.stopPropagation()">
            <button class="reel-modal-close" onclick="closeReelModal(event)" aria-label="Close video">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <video id="reelModalVideo" class="reel-modal-video" controls autoplay loop playsinline>
                <source id="reelVideoSource" src="" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
        </div>
    </div>

    {{-- Showcase 3D Render Lightbox Modal Overlay --}}
    <div class="showcase-modal-overlay" id="showcaseModalOverlay" onclick="closeShowcaseModal(event)">
        <div class="showcase-modal-dialog" onclick="event.stopPropagation()">
            <div class="showcase-modal-header">
                <div>
                    <h4 class="showcase-modal-title" id="showcaseModalTitle">Grand Entrance Arch</h4>
                    <div class="showcase-modal-subtitle" id="showcaseModalSubtitle">24/7 Security Cabin &amp; Boom Barrier</div>
                </div>
                <button class="showcase-modal-close" onclick="closeShowcaseModal(event)" aria-label="Close modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="showcase-modal-body">
                <button class="showcase-nav-btn showcase-nav-prev" onclick="navigateShowcase(-1)" aria-label="Previous render">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <img id="showcaseModalImg" src="" alt="Venture 3D Render" class="showcase-modal-img">
                <button class="showcase-nav-btn showcase-nav-next" onclick="navigateShowcase(1)" aria-label="Next render">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // ── 3D Render Showcase Lightbox Modal ──
    const showcaseGallery = [
        {
            src: "{{ asset('images/projects/rrr-prekshitha/entrance-arch-grand.webp') }}",
            title: "Grand Entrance Arch",
            subtitle: "24/7 Security Cabin & Boom Barrier Access"
        },
        {
            src: "{{ asset('images/projects/rrr-prekshitha/concrete-boulevard-40ft.webp') }}",
            title: "40' & 30' CC Roads",
            subtitle: "Heavy-Duty M-25 Grade Concrete Avenues"
        },
        {
            src: "{{ asset('images/projects/rrr-prekshitha/avenue-plantation-walkway.webp') }}",
            title: "3 Landscaped Theme Parks",
            subtitle: "Walking Track & Gazebo Recreation Zones"
        },
        {
            src: "{{ asset('images/projects/rrr-prekshitha/overhead-water-tank.webp') }}",
            title: "Overhead Water Storage",
            subtitle: "Pressurized 24/7 Water Supply Network"
        },
        {
            src: "{{ asset('images/projects/rrr-prekshitha/internal-curbstone-avenue.webp') }}",
            title: "Avenue Plantations & Walkways",
            subtitle: "Curb Stones & Modern LED Street Lighting"
        },
        {
            src: "{{ asset('images/projects/rrr-prekshitha/master-layout-aerial.webp') }}",
            title: "17-Acre Master Layout",
            subtitle: "HMDA Final Sanction, LP No. 000085/LO/Plg/HMDA/2024"
        }
    ];

    let currentShowcaseIndex = 0;

    function openShowcaseModal(index) {
        currentShowcaseIndex = (index >= 0 && index < showcaseGallery.length) ? index : 0;
        updateShowcaseModal();
        const overlay = document.getElementById('showcaseModalOverlay');
        if (overlay) {
            overlay.classList.add('open');
            document.body.style.overflow = 'hidden';
        }
    }

    function updateShowcaseModal() {
        const item = showcaseGallery[currentShowcaseIndex];
        const img = document.getElementById('showcaseModalImg');
        const title = document.getElementById('showcaseModalTitle');
        const subtitle = document.getElementById('showcaseModalSubtitle');

        if (img && item) {
            img.style.opacity = '0';
            setTimeout(() => {
                img.src = item.src;
                img.alt = item.title;
                img.onload = () => { img.style.opacity = '1'; };
            }, 100);
        }
        if (title && item) title.innerHTML = item.title;
        if (subtitle && item) subtitle.innerHTML = item.subtitle;
    }

    function navigateShowcase(direction) {
        currentShowcaseIndex = (currentShowcaseIndex + direction + showcaseGallery.length) % showcaseGallery.length;
        updateShowcaseModal();
    }

    function closeShowcaseModal(event) {
        const overlay = document.getElementById('showcaseModalOverlay');
        if (overlay) {
            overlay.classList.remove('open');
            document.body.style.overflow = '';
        }
    }

    // ── Video Reel Modal ──
    function openReelModal(videoUrl, title) {
        const overlay = document.getElementById('reelModalOverlay');
        const video = document.getElementById('reelModalVideo');
        const source = document.getElementById('reelVideoSource');
        const mainVid = document.getElementById('mainVentureVideo');
        if (mainVid && !mainVid.paused) {
            mainVid.pause();
        }
        
        if (overlay && video && source) {
            source.src = videoUrl;
            video.load();
            overlay.classList.add('open');
            document.body.style.overflow = 'hidden';
            video.play().catch(e => console.log('Autoplay handled'));
        }
    }

    function closeReelModal(event) {
        const overlay = document.getElementById('reelModalOverlay');
        const video = document.getElementById('reelModalVideo');
        
        if (overlay && video) {
            video.pause();
            video.currentTime = 0;
            overlay.classList.remove('open');
            document.body.style.overflow = '';
        }
    }

    // ── Keyboard Controls ──
    document.addEventListener('keydown', function(e) {
        const showcaseOverlay = document.getElementById('showcaseModalOverlay');
        const isShowcaseOpen = showcaseOverlay && showcaseOverlay.classList.contains('open');

        if (e.key === 'Escape') {
            closeShowcaseModal();
            closeReelModal();
        } else if (isShowcaseOpen && e.key === 'ArrowLeft') {
            navigateShowcase(-1);
        } else if (isShowcaseOpen && e.key === 'ArrowRight') {
            navigateShowcase(1);
        }
    });
</script>
@endpush