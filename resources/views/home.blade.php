@extends('layouts.app')

@section('title', 'Navagruha Infra Developers — Luxury Living at Affordable Prices | AIIMS Bibinagar')
@section('meta_description', '17-Acre Master Planned HMDA & RERA Approved Residential Plotted Community at AIIMS Bibinagar, Telangana. Spot Registration & Bank Loans Available.')

@section('content')

    {{-- 1. Hero Section (Demo 1 Luxury Swiper Slider with Authentic 3D Renders & NAVAGRUHA Branding) --}}
    <section id="section-hero" class="section-dark p-0 text-light no-top no-bottom position-relative overflow-hidden">
        
        <div class="wm-hero-watermark">HMDA APPROVED</div>

        <div class="swiper swiper-home-auto">
            <div class="swiper-wrapper">
                
                {{-- Slide 1: Grand Entrance Arch 3D Render --}}
                <div class="swiper-slide position-relative">
                    <div class="swiper-inner position-relative d-flex align-items-center"
                         style="background-image: url('{{ asset('venture/renders/Arch_Image_.png') }}'); background-size: cover; background-position: center; min-height: 85vh;">
                        <div class="hero-navagruha-overlay"></div>
                        
                        <div class="container position-relative z-3">
                            <div class="row align-items-center">
                                <div class="col-lg-9 col-xl-8">
                                    <div class="hero-brand-pill mb-3">
                                        <span class="text-white font-copperplate fs-11">NAVAGRUHA INFRA DEVELOPERS</span>
                                        <span class="text-white-50">&bull;</span>
                                        <span class="brand-tagline fs-10 mb-0">REDEFINING REALITY</span>
                                    </div>
                                    
                                    <h1 class="hero-title mb-2">
                                        Luxury Living at Affordable Prices
                                    </h1>

                                    <h4 class="hero-subtitle-location mb-3">
                                        <i class="fa-solid fa-location-dot me-2 text-brand-secondary"></i>AIIMS - Bibinagar, Telangana
                                    </h4>
                                    
                                    <p class="hero-lead mb-4">
                                        17-Acre Master Planned Residential Plotted Community along the booming Hyderabad&ndash;Warangal NH-163 growth corridor.
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
                         style="background-image: url('{{ asset('venture/renders/RRR ROAD.jpg') }}'); background-size: cover; background-position: center; min-height: 85vh;">
                        <div class="hero-navagruha-overlay"></div>
                        
                        <div class="container position-relative z-3">
                            <div class="row align-items-center">
                                <div class="col-lg-9 col-xl-8">
                                    <div class="hero-brand-pill mb-3">
                                        <span class="text-white font-copperplate fs-11">100% VAASTU &bull; HMDA APPROVED</span>
                                        <span class="text-white-50">&bull;</span>
                                        <span class="brand-tagline fs-10 mb-0">SPOT REGISTRATION</span>
                                    </div>
                                    
                                    <h1 class="hero-title mb-2">
                                        Your Dream Home on Solid Ground
                                    </h1>

                                    <h4 class="hero-subtitle-location mb-3">
                                        <i class="fa-solid fa-road me-2 text-brand-secondary"></i>40' &amp; 30' M-25 Grade Concrete Roads
                                    </h4>
                                    
                                    <p class="hero-lead mb-4">
                                        Heavy-duty concrete avenues, underground drainage, 3 landscaped parks, and up to 80% bank loan approvals from SBI &amp; HDFC.
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
                         style="background-image: url('{{ asset('venture/renders/WALK.png') }}'); background-size: cover; background-position: center; min-height: 85vh;">
                        <div class="hero-navagruha-overlay"></div>
                        
                        <div class="container position-relative z-3">
                            <div class="row align-items-center">
                                <div class="col-lg-9 col-xl-8">
                                    <div class="hero-brand-pill mb-3">
                                        <span class="text-white font-copperplate fs-11">3 THEMATIC PARKS &bull; GREENERY</span>
                                        <span class="text-white-50">&bull;</span>
                                        <span class="brand-tagline fs-10 mb-0">05 MINS TO AIIMS</span>
                                    </div>
                                    
                                    <h1 class="hero-title mb-2">
                                        Harmonious Living Amidst Nature
                                    </h1>

                                    <h4 class="hero-subtitle-location mb-3">
                                        <i class="fa-solid fa-tree me-2 text-brand-secondary"></i>Landscaped Walking Tracks &amp; Children Play Area
                                    </h4>
                                    
                                    <p class="hero-lead mb-4">
                                        Pristine green environment with avenue plantations, modern street lighting, and immediate spot registration at Sub-Registrar Office.
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
                    <div class="subtitle text-brand-secondary font-copperplate mb-1">Architectural Excellence</div>
                    <h2 class="fs-32 text-white font-copperplate mb-0">Venture 3D Renders &amp; Visual Showcase</h2>
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
                        <img src="{{ asset('venture/renders/Arch_Image_.png') }}" alt="Grand Entrance Arch 3D Render">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h4 class="gallery-showcase-title">Grand Entrance Arch</h4>
                            <div class="gallery-showcase-subtitle">24/7 Security Cabin &amp; Boom Barrier</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View 3D Render</span>
                        </div>
                    </div>
                </div>

                {{-- Item 2: 40ft CC Roads --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(1)">
                        <img src="{{ asset('venture/renders/RRR ROAD.jpg') }}" alt="40ft CC Concrete Roads 3D Render">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h4 class="gallery-showcase-title">40' &amp; 30' CC Roads</h4>
                            <div class="gallery-showcase-subtitle">Heavy-Duty Concrete Avenues</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View 3D Render</span>
                        </div>
                    </div>
                </div>

                {{-- Item 3: 3 Landscaped Parks --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(2)">
                        <img src="{{ asset('venture/renders/WALK.png') }}" alt="3 Landscaped Parks 3D Render">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h4 class="gallery-showcase-title">3 Landscaped Theme Parks</h4>
                            <div class="gallery-showcase-subtitle">Walking Track &amp; Gazebo</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View 3D Render</span>
                        </div>
                    </div>
                </div>

                {{-- Item 4: Overhead Water Tank --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(3)">
                        <img src="{{ asset('venture/renders/tank.png') }}" alt="Overhead Water Tank Render">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h4 class="gallery-showcase-title">Overhead Water Storage</h4>
                            <div class="gallery-showcase-subtitle">Pressurized Water Supply to Each Plot</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View 3D Render</span>
                        </div>
                    </div>
                </div>

                {{-- Item 5: Pedestrian Walkways & Greenery --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(4)">
                        <img src="{{ asset('venture/renders/WAY.png') }}" alt="Pedestrian Walkway & Greenery">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h4 class="gallery-showcase-title">Avenue Plantations &amp; Walkways</h4>
                            <div class="gallery-showcase-subtitle">Curb Stones &amp; Modern Street Lighting</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View 3D Render</span>
                        </div>
                    </div>
                </div>

                {{-- Item 6: Aerial Master View (Updated to Web Banner 05.jpg) --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(5)">
                        <img src="{{ asset('venture/renders/Web Banner 05.jpg') }}" alt="17-Acre Master Layout Aerial View">
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

    {{-- 3. Dynamic Plotted Venture Inventory Section --}}
    <section id="plots" class="bg-brand-primary text-light py-80 border-top border-bottom border-white-10">
        <div class="container">
            <div class="row g-4 align-items-end justify-content-between mb-5">
                <div class="col-lg-8">
                    <div class="subtitle text-brand-secondary mb-1">Live Venture Inventory</div>
                    <h2 class="fs-36 text-white font-copperplate mb-0">Featured Available Plots &amp; Sizes</h2>
                    <p class="text-white-50 fs-14 mt-2 mb-0">
                        Select a plot specification below to explore dimensional layouts, price calculations, and amenities.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="{{ route('plots.index') }}" class="btn-main">
                        <span><i class="fa-solid fa-border-all me-1"></i> View Full Availability Board</span>
                    </a>
                </div>
            </div>

            {{-- Plot Cards Grid --}}
            <div class="row g-4">
                @foreach($plots as $plot)
                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                        <x-plot-card :plot="$plot" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 4. Venture Amenities & Facilities --}}
    <section id="amenities" class="bg-brand-dark text-light py-80">
        <div class="container">
            <div class="row g-4 align-items-end justify-content-between mb-5">
                <div class="col-lg-8">
                    <div class="subtitle text-brand-secondary mb-1">Venture Infrastructure</div>
                    <h2 class="fs-36 text-white font-copperplate mb-0">World-Class Planned Amenities</h2>
                    <p class="text-white-50 fs-14 mt-2 mb-0">Engineered with high quality standards to ensure long-term appreciation and comfortable living.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="amenity-feature-card">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-3 overflow-hidden" style="height: 140px; background: #0c1620;">
                            <img src="{{ asset('venture/renders/Arch_Image_.png') }}" alt="Grand Entrance Arch" class="w-100 h-100 object-fit-cover">
                        </div>
                        <h4 class="fs-18 text-white font-copperplate mb-2">Grand Entrance Arch</h4>
                        <p class="text-white-50 fs-13 mb-0">Imposing designer entrance gateway with 24/7 security cabin and boom barrier access.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="amenity-feature-card">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-3 overflow-hidden" style="height: 140px; background: #0c1620;">
                            <img src="{{ asset('venture/renders/RRR ROAD.jpg') }}" alt="40ft CC Roads" class="w-100 h-100 object-fit-cover">
                        </div>
                        <h4 class="fs-18 text-white font-copperplate mb-2">40' &amp; 30' CC Roads</h4>
                        <p class="text-white-50 fs-13 mb-0">Heavy-duty M-25 grade concrete roads built with kerbing and pedestrian pathways.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="amenity-feature-card">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-3 overflow-hidden" style="height: 140px; background: #0c1620;">
                            <img src="{{ asset('venture/renders/WALK.png') }}" alt="3 Landscaped Parks" class="w-100 h-100 object-fit-cover">
                        </div>
                        <h4 class="fs-18 text-white font-copperplate mb-2">3 Landscaped Parks</h4>
                        <p class="text-white-50 fs-13 mb-0">Central theme park with jogging track, children play apparatus, and avenue plantation.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="amenity-feature-card">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-3 overflow-hidden" style="height: 140px; background: #0c1620;">
                            <img src="{{ asset('venture/renders/tank.png') }}" alt="Overhead Water Tank" class="w-100 h-100 object-fit-cover">
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
                        <video id="mainVentureVideo" class="w-100 h-100 object-fit-cover" controls playsinline preload="metadata" poster="{{ asset('venture/renders/Web Banner 05.jpg') }}">
                            <source src="{{ asset('venture/videos/venture-walkthrough.mp4') }}" type="video/mp4">
                            Your browser does not support HTML5 video.
                        </video>
                    </div>
                    
                    <div class="d-flex flex-wrap gap-2">
                        <span class="video-chapter-pill">
                            <i class="fa-solid fa-archway text-brand-secondary"></i> Grand Entrance Arch
                        </span>
                        <span class="video-chapter-pill">
                            <i class="fa-solid fa-road text-brand-secondary"></i> 40' CC Concrete Avenues
                        </span>
                        <span class="video-chapter-pill">
                            <i class="fa-solid fa-faucet-drip text-brand-secondary"></i> Underground Utilities
                        </span>
                        <span class="video-chapter-pill">
                            <i class="fa-solid fa-hospital text-brand-secondary"></i> 05 Mins to AIIMS
                        </span>
                    </div>
                </div>

                {{-- Right 6-Col: 6 Videos (2 Rows × 3 Videos per Row) --}}
                <div class="col-lg-6 col-12">
                    <div class="row g-2 g-md-3">
                        
                        {{-- Row 1 - Video 1 --}}
                        <div class="col-4">
                            <div class="reel-card" onclick="openReelModal('{{ asset('venture/videos/REEL1.mp4') }}', 'Grand Entrance & 40ft Main Avenue')">
                                <img src="{{ asset('venture/renders/Arch_Image_.png') }}" alt="Reel 1 Poster" class="reel-card-poster">
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
                                <img src="{{ asset('venture/renders/RRR ROAD.jpg') }}" alt="Reel 2 Poster" class="reel-card-poster">
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
                            <div class="reel-card" onclick="openReelModal('{{ asset('venture/videos/REEL3.mp4') }}', 'Strategic AIIMS Bibinagar Corridor')">
                                <img src="{{ asset('venture/renders/WALK.png') }}" alt="Reel 3 Poster" class="reel-card-poster">
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
                                <img src="{{ asset('venture/renders/tank.png') }}" alt="Reel 4 Poster" class="reel-card-poster">
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
                                <img src="{{ asset('venture/renders/Web Banner 05.jpg') }}" alt="Reel 5 Poster" class="reel-card-poster">
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
                                <img src="{{ asset('venture/photos/02.jpg') }}" alt="Reel 6 Poster" class="reel-card-poster">
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
                    <h2 class="fs-36 text-white font-copperplate">Everything You Need, All Around You</h2>
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
                                        <p class="text-white-50 fs-12 mb-0">World-Class Spiritual &amp; Tourism Landmark</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 7. Master Plan & Official Documentation Download Center --}}
    <section class="bg-brand-primary text-light py-80 border-top border-bottom border-white-10">
        <div class="container">
            <div class="row mb-5 align-items-end justify-content-between">
                <div class="col-lg-8">
                    <div class="subtitle text-brand-secondary font-copperplate mb-1">Official Project Documents</div>
                    <h2 class="fs-32 text-white font-copperplate mb-0">Brochures &amp; Master Layout Downloads</h2>
                    <p class="text-white-50 fs-14 mt-2 mb-0">
                        Download official HMDA approved blueprints, statutory TSRERA certificates, and the full project brochure.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                
                {{-- Document Card 1: Master Layout PDF --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="p-4 rounded-4 bg-brand-dark border border-white-10 h-100 d-flex flex-column justify-content-between shadow-lg">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge bg-danger text-white font-copperplate px-2.5 py-1 fs-10">HMDA BLUEPRINT</span>
                                <i class="fa-solid fa-file-pdf text-danger fs-28"></i>
                            </div>
                            <h4 class="fs-18 text-white font-copperplate mb-2">Master Layout Plan</h4>
                            <p class="text-white-50 fs-13 mb-3">
                                Complete 224-plot layout sheet with plot dimensions, road widths (40' &amp; 30'), and park boundaries.
                            </p>
                        </div>
                        <a href="{{ asset('venture/docs/RRR PREKSHITHA ENCLAVE LAYOUT.pdf') }}" target="_blank" rel="noopener"
                           class="btn-secondary-brand w-100 py-2.5 text-center font-copperplate fs-12">
                            <span><i class="fa-solid fa-download me-1"></i> Download Layout PDF (9.3 MB)</span>
                        </a>
                    </div>
                </div>

                {{-- Document Card 2: Full Project Brochure --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="p-4 rounded-4 bg-brand-dark border border-white-10 h-100 d-flex flex-column justify-content-between shadow-lg">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge bg-brand-primary text-white font-copperplate px-2.5 py-1 fs-10">OFFICIAL BROCHURE</span>
                                <i class="fa-solid fa-book-open text-brand-secondary fs-28"></i>
                            </div>
                            <h4 class="fs-18 text-white font-copperplate mb-2">Full Project Brochure</h4>
                            <p class="text-white-50 fs-13 mb-3">
                                Comprehensive presentation detailing 17-acre development, specifications, bank loans, and future appreciation.
                            </p>
                        </div>
                        <a href="{{ asset('venture/docs/RRR PREKSHITHA ENCLAVE BROCHURE.pdf') }}" target="_blank" rel="noopener"
                           class="btn-secondary-brand w-100 py-2.5 text-center font-copperplate fs-12">
                            <span><i class="fa-solid fa-download me-1"></i> Download Brochure (156 MB)</span>
                        </a>
                    </div>
                </div>

                {{-- Document Card 3: Statutory Approvals --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="p-4 rounded-4 bg-brand-dark border border-white-10 h-100 d-flex flex-column justify-content-between shadow-lg">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge bg-success text-white font-copperplate px-2.5 py-1 fs-10">VERIFIED LEGAL</span>
                                <i class="fa-solid fa-certificate text-brand-secondary fs-28"></i>
                            </div>
                            <h4 class="fs-18 text-white font-copperplate mb-2">HMDA &amp; RERA Sanctions</h4>
                            <p class="text-white-50 fs-13 mb-3">
                                Final LP sanction approval (LP No. 000085/LO/Plg/HMDA/2024) and TS RERA registration certificates.
                            </p>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ asset('venture/docs/HMDA FINAL APPROVAL PHASE2.pdf') }}" target="_blank" rel="noopener"
                               class="btn btn-outline-light font-copperplate fs-11 py-2 rounded-3 flex-fill text-center">
                                HMDA Sanction
                            </a>
                            <a href="{{ asset('venture/docs/RERA APPROVAL PHASE1.pdf') }}" target="_blank" rel="noopener"
                               class="btn btn-outline-light font-copperplate fs-11 py-2 rounded-3 flex-fill text-center">
                                RERA Certificate
                            </a>
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
                        <div class="subtitle text-brand-secondary mb-1">Clear Marketable Title Guaranteed</div>
                        <h3 class="fs-32 text-white font-copperplate mb-2">Schedule Your Guided Site Visit Today</h3>
                        <p class="text-white-50 fs-15 mb-0">
                            Our executive site transport is available from Uppal Metro Station and Ghatkesar. Spot registration assistance provided.
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
            src: "{{ asset('venture/renders/Arch_Image_.png') }}",
            title: "Grand Entrance Arch",
            subtitle: "24/7 Security Cabin & Boom Barrier Access"
        },
        {
            src: "{{ asset('venture/renders/RRR ROAD.jpg') }}",
            title: "40' & 30' CC Roads",
            subtitle: "Heavy-Duty M-25 Grade Concrete Avenues"
        },
        {
            src: "{{ asset('venture/renders/WALK.png') }}",
            title: "3 Landscaped Theme Parks",
            subtitle: "Walking Track & Gazebo Recreation Zones"
        },
        {
            src: "{{ asset('venture/renders/tank.png') }}",
            title: "Overhead Water Storage",
            subtitle: "Pressurized 24/7 Water Supply Network"
        },
        {
            src: "{{ asset('venture/renders/WAY.png') }}",
            title: "Avenue Plantations & Walkways",
            subtitle: "Curb Stones & Modern LED Street Lighting"
        },
        {
            src: "{{ asset('venture/renders/Web Banner 05.jpg') }}",
            title: "17-Acre Master Layout",
            subtitle: "HMDA Final Sanction &bull; LP No. 000085/LO/Plg/HMDA/2024"
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