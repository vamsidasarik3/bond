@extends('layouts.app')

@section('title', 'Plots for Sale in Hyderabad | Navagruha Infra')
@section('meta_description', 'Explore HMDA-approved plots for sale in Hyderabad with Navagruha. Discover gated community, residential and villa plots in high-growth locations with transparent documentation.')
@section('og_title', 'Plots for Sale in Hyderabad | Navagruha Infra')
@section('og_description', 'Explore HMDA-approved plots for sale in Hyderabad with Navagruha. Discover gated community, residential and villa plots in high-growth locations with transparent documentation.')
@section('meta_keywords', 'Plots for Sale in Hyderabad, Open Plots in Hyderabad, Villa Plots in Hyderabad, Residential Plots in Hyderabad, Gated Community Plots in Hyderabad')
@section('canonical_url', route('home'))

@section('structured_data')
<script type="application/ld+json">
{
  "{{ '@' }}context": "https://schema.org",
  "{{ '@' }}type": "RealEstateAgent",
  "name": "Navagruha Infra Developers",
  "url": "{{ route('home') }}",
  "logo": "{{ asset('images/navagruha-logo-white.png') }}",
  "description": "Explore HMDA-approved plots for sale in Hyderabad with Navagruha. Discover gated community, residential and villa plots in high-growth locations with transparent documentation.",
  "telephone": "+919617699699",
  "address": {
    "{{ '@' }}type": "PostalAddress",
    "addressLocality": "Hyderabad",
    "addressRegion": "Telangana",
    "addressCountry": "IN"
  }
}
</script>
@endsection

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
                                    <h1 class="hero-title mb-2">
                                        Plots for Sale in Hyderabad
                                    </h1>

                                    <div class="hero-subtitle-location mb-3">
                                        <i class="fa-solid fa-location-dot me-2 text-brand-secondary"></i>Residential Plots near AIIMS Bibinagar, Hyderabad to Warangal Highway (NH-163)
                                    </div>
                                    
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
                                    <div class="d-flex align-items-center gap-2 mt-3 text-white-50 fs-13">
                                        <i class="fa-solid fa-circle-check text-brand-secondary"></i>
                                        <span>Spot Registration assistance provided &bull; Bank loan facility available</span>
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
                                    <div class="hero-title mb-2">
                                        Built for Better Living
                                    </div>

                                    <div class="hero-subtitle-location mb-3">
                                        <i class="fa-solid fa-road me-2 text-brand-secondary"></i>30' &amp; 40' M-25 Grade Concrete Roads
                                    </div>
                                    
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
                                    <div class="hero-title mb-2">
                                        Parks, Walking Tracks and Green Open Spaces
                                    </div>

                                    <div class="hero-subtitle-location mb-3">
                                        <i class="fa-solid fa-tree me-2 text-brand-secondary"></i>Walking Tracks and Children's Play Area
                                    </div>
                                    
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

    {{-- 2. Visual Showcase Gallery (Constructed On-Ground Development) --}}
    <section id="project" class="bg-brand-primary py-60 border-bottom border-white-10">
        <div class="container">
            <div class="row mb-4 align-items-end justify-content-between">
                <div class="col-lg-8">
                    <div class="subtitle text-brand-secondary font-copperplate mb-1">Project Gallery</div>
                    <h2 class="fs-32 text-white font-copperplate mb-0">Constructed On-Ground Development</h2>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="#layout" class="btn-secondary-brand px-3 py-2 fs-13">
                        <span>View Master Layout <i class="fa-solid fa-arrow-right ms-2"></i></span>
                    </a>
                </div>
            </div>

            <div class="row g-4">
                
                {{-- Card 1: Grand Entrance Arch using Web_03.png --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(0)">
                        <img src="{{ asset('landing2/images/Web_03.png') }}" alt="Grand Entrance Arch" loading="lazy">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h3 class="gallery-showcase-title">Grand Entrance Arch</h3>
                            <div class="gallery-showcase-subtitle">Architectural Gateway &amp; Security Post</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View Entrance</span>
                        </div>
                    </div>
                </div>

                {{-- Card 2: 30' & 40' CC Roads using rrr-road-1.jpg --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(1)">
                        <img src="{{ asset('landing2/images/rrr-road-1.jpg') }}" alt="30' and 40' Concrete Roads" loading="lazy">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h3 class="gallery-showcase-title">30' &amp; 40' CC Roads</h3>
                            <div class="gallery-showcase-subtitle">Durable All-Weather Concrete Avenues</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View Roads</span>
                        </div>
                    </div>
                </div>

                {{-- Card 3: Layout Demarcation & Underground Utilities Dual Showcase --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item utilities-dual-card" id="utilitiesDualCard" onclick="openUtilitiesModal(0)" title="Click to view full photos of Plot Demarcation Stone &amp; Underground Utilities" role="button" tabindex="0">
                        <div class="utilities-split-viewport">
                            <div class="utilities-pane utilities-pane-left">
                                <img src="{{ asset('landing2/images/utilities-stone.jpg?v=5') }}" alt="Plot Demarcation Yellow Stone" loading="lazy">
                                <span class="utilities-lens-badge"><i class="fa-solid fa-location-dot me-1"></i> Plot Demarcation</span>
                            </div>
                            <div class="utilities-split-divider">
                                <span class="divider-indicator"><i class="fa-solid fa-arrows-left-right"></i></span>
                            </div>
                            <div class="utilities-pane utilities-pane-right">
                                <img src="{{ asset('landing2/images/utilities-chamber.jpg?v=5') }}" alt="Concealed Underground Drainage Chamber Cover" loading="lazy">
                                <span class="utilities-lens-badge"><i class="fa-solid fa-circle-dot me-1"></i> Drainage Chamber</span>
                            </div>
                        </div>
                        <div class="gallery-showcase-overlay utilities-dual-overlay"></div>
                        <div class="gallery-showcase-content">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="gallery-showcase-title">Underground Utilities</h3>
                                    <div class="gallery-showcase-subtitle">Concealed Drainage Chambers &amp; Infrastructure</div>
                                </div>
                                <span class="utilities-zoom-btn" aria-label="Expand view"><i class="fa-solid fa-expand"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 4: Landscaped Theme Parks using layout-parks-12.jpg --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(3)">
                        <img src="{{ asset('landing2/images/layout-parks-12.jpg') }}" alt="3 Landscaped Theme Parks" loading="lazy">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h3 class="gallery-showcase-title">3 Landscaped Parks</h3>
                            <div class="gallery-showcase-subtitle">Green Open Reserves &amp; Avenue Palm Plantation</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View Greenery</span>
                        </div>
                    </div>
                </div>

                {{-- Card 5: Overhead Water Tank using water-tank.png --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(4)">
                        <img src="{{ asset('landing2/images/water-tank.png') }}" alt="Overhead Water Tank" loading="lazy">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h3 class="gallery-showcase-title">Overhead Water Tank</h3>
                            <div class="gallery-showcase-subtitle">Reliable Gravity-Fed Potable Water Supply</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View Water Tank</span>
                        </div>
                    </div>
                </div>

                {{-- Card 6: Premium Compound Wall using compound-wall.jpg --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(5)">
                        <img src="{{ asset('landing2/images/compound-wall.jpg') }}" alt="Premium Compound Wall" loading="lazy">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h3 class="gallery-showcase-title">Premium Compound Wall</h3>
                            <div class="gallery-showcase-subtitle">Continuous Boundary Enclosure &amp; Avenue Frontage</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View Compound Wall</span>
                        </div>
                    </div>
                </div>

                {{-- Card 7: Social Infrastructure using social-infra.jpg --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(6)">
                        <img src="{{ asset('landing2/images/social-infra.jpg') }}" alt="Social Infrastructure — On-Site Project Office, Visitor Parking &amp; Green Spaces" loading="lazy" style="object-position: center center;">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h3 class="gallery-showcase-title">Social Infrastructure</h3>
                            <div class="gallery-showcase-subtitle">On-Site Project Office, Visitor Parking &amp; Landscaped Greens</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View Social Infra</span>
                        </div>
                    </div>
                </div>

                {{-- Card 8: Electricity with LED Street Lights using electricity-led-combined.jpg --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(7)">
                        <img src="{{ asset('landing2/images/electricity-led-combined.jpg') }}" alt="Electricity with LED Street Lights" loading="lazy">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h3 class="gallery-showcase-title">Electricity with LED Street Lights</h3>
                            <div class="gallery-showcase-subtitle">Illuminated Concrete Avenues &amp; Dusk Grid</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View Lighting</span>
                        </div>
                    </div>
                </div>

                {{-- Card 9: 100 Feet Road & Connectivity using entrance-site-photo.jpg --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="gallery-showcase-item" role="button" tabindex="0" onclick="openShowcaseModal(8)">
                        <img src="{{ asset('landing2/images/entrance-site-photo.jpg') }}" alt="100 Feet Master Plan Road Connected to Entrance &amp; Warangal Highway" loading="lazy">
                        <div class="gallery-showcase-overlay"></div>
                        <div class="gallery-showcase-content">
                            <h3 class="gallery-showcase-title">100' Road &amp; Connectivity</h3>
                            <div class="gallery-showcase-subtitle">Direct 100 Feet Master Plan Road Connecting to Entrance &amp; Highway</div>
                        </div>
                        <div class="gallery-showcase-hover-btn">
                            <span><i class="fa-solid fa-expand me-1"></i> View 100' Road</span>
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
                            <img src="{{ asset('images/projects/rrr-prekshitha/entrance-arch-grand.webp') }}" alt="Gated community entrance archway with security boom barrier at Navagruha plots" class="w-100 h-100 object-fit-cover">
                        </div>
                        <h3 class="fs-18 text-white font-copperplate mb-2">Grand Entrance Arch</h3>
                        <p class="text-white-50 fs-13 mb-0">Imposing designer entrance gateway with 24/7 security cabin and boom barrier access.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="amenity-feature-card">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-3 overflow-hidden" style="height: 140px; background: #0c1620;">
                            <img src="{{ asset('images/projects/rrr-prekshitha/concrete-boulevard-40ft.webp') }}" alt="Wide 30-foot and 40-foot cement concrete avenues inside plotted development" class="w-100 h-100 object-fit-cover">
                        </div>
                        <h3 class="fs-18 text-white font-copperplate mb-2">30' &amp; 40' CC Roads</h3>
                        <p class="text-white-50 fs-13 mb-0">Heavy-duty M-25 grade concrete roads built with kerbing and pedestrian pathways.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="amenity-feature-card">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-3 overflow-hidden" style="height: 140px; background: #0c1620;">
                            <img src="{{ asset('images/projects/rrr-prekshitha/avenue-plantation-walkway.webp') }}" alt="Three landscaped community parks and recreational green open spaces" class="w-100 h-100 object-fit-cover">
                        </div>
                        <h3 class="fs-18 text-white font-copperplate mb-2">3 Landscaped Parks</h3>
                        <p class="text-white-50 fs-13 mb-0">Central theme park with jogging track, children play apparatus, and avenue plantation.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="amenity-feature-card">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-3 overflow-hidden" style="height: 140px; background: #0c1620;">
                            <img src="{{ asset('images/projects/rrr-prekshitha/overhead-water-tank.webp') }}" alt="Overhead water tank infrastructure for dedicated residential water lines" class="w-100 h-100 object-fit-cover">
                        </div>
                        <h3 class="fs-18 text-white font-copperplate mb-2">Overhead Water Tank</h3>
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
                        <video id="mainVentureVideo" class="w-100 h-100 object-fit-cover" controls playsinline preload="metadata" poster="{{ asset('images/Walk_22.png') }}">
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
                                <img src="{{ asset('images/projects/rrr-prekshitha/entrance-arch-portrait.webp') }}" alt="Entrance arch and 40-foot main avenue video walkthrough" class="reel-card-poster">
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
                                <img src="{{ asset('images/projects/rrr-prekshitha/concrete-boulevard-40ft.webp') }}" alt="Underground utilities and concrete road work on-ground video" class="reel-card-poster">
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
                                <img src="{{ asset('images/projects/rrr-prekshitha/avenue-plantation-walkway.webp') }}" alt="AIIMS Bibinagar growth corridor location highlights video" class="reel-card-poster">
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
                                <img src="{{ asset('images/projects/rrr-prekshitha/overhead-water-tank.webp') }}" alt="Water supply infrastructure and overhead storage tank video" class="reel-card-poster">
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
                                <img src="{{ asset('images/projects/rrr-prekshitha/aerial-drone-banner.webp') }}" alt="Aerial drone perspective of the 17-acre plotted development" class="reel-card-poster">
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
                                <img src="{{ asset('images/projects/rrr-prekshitha/ground-development-progress.webp') }}" alt="Internal roads and avenue plantation progress video" class="reel-card-poster">
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
                    <h2 class="fs-36 text-white font-copperplate">Where the Project Sits</h2>
                    <p class="text-white-50 fs-15 mt-2 mb-0">
                        Situated in Bibinagar near AIIMS Medical University Campus on the NH-163 Warangal Highway, offering direct arterial transit to Hyderabad city and key growth nodes.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('location') }}" class="btn-outline-brand font-copperplate fs-12 px-3 py-2 rounded-pill">
                        <span>Explore Full Corridor &rarr;</span>
                    </a>
                </div>
            </div>

            <div class="location-matrix-grid">
                <!-- Left: Area Visual Card with lay_Out_new.png -->
                <div class="location-visual-card">
                    <div class="location-photo-box">
                        <img src="{{ asset('landing2/images/lay_Out_new.png') }}" alt="Bibinagar AIIMS Medical University Campus Corridor Avenue View" loading="lazy">
                        <div class="location-badge-pill">
                            <i class="fa-solid fa-road me-1"></i> Growth Corridor · NH-163
                        </div>
                    </div>
                    <div class="location-meta-box">
                        <h4 class="text-white font-copperplate fs-20 mb-2">
                            Navagruha RRR Prekshitha Enclave
                        </h4>
                        <p class="text-white-50 fs-14 lh-base mb-3">
                            Near AIIMS Medical University Campus, Bibinagar, Yadadri Bhuvanagiri District, Hyderabad, Telangana 508126.
                        </p>
                        <a href="https://maps.google.com/?q=Bibinagar,+Near+AIIMS+Medical+University+Campus,+Telangana" target="_blank" rel="noopener noreferrer" class="btn-secondary-brand px-3 py-2 fs-13">
                            <i class="fa-solid fa-location-arrow me-2 text-brand-secondary"></i>
                            <span>Open in Google Maps</span>
                        </a>
                    </div>
                </div>

                <!-- Right: Verified Travel Schedule -->
                <div class="transit-schedule-card">
                    <div class="subtitle text-brand-secondary font-copperplate mb-1 fs-12">Verified Travel Times</div>
                    <h3 class="text-white font-copperplate fs-22 mb-3">
                        Key Distances &amp; Connectivity
                    </h3>

                    <div class="transit-item-row">
                        <div>
                            <div class="transit-destination-name">Bibinagar Sub Registrar Office</div>
                            <div class="transit-destination-meta">Government Registration &amp; Documentation</div>
                        </div>
                        <span class="transit-duration-badge">2 Mins</span>
                    </div>

                    <div class="transit-item-row">
                        <div>
                            <div class="transit-destination-name">AIIMS Medical University Campus</div>
                            <div class="transit-destination-meta">Premier National Medical University &amp; Hospital</div>
                        </div>
                        <span class="transit-duration-badge">5 Mins</span>
                    </div>

                    <div class="transit-item-row">
                        <div>
                            <div class="transit-destination-name">NH-163 (Warangal Highway)</div>
                            <div class="transit-destination-meta">Direct 4-Lane Arterial Highway Access</div>
                        </div>
                        <span class="transit-duration-badge">5 Mins</span>
                    </div>

                    <div class="transit-item-row">
                        <div>
                            <div class="transit-destination-name">Bibinagar MMTS Railway Station</div>
                            <div class="transit-destination-meta">Suburban Commuter Rail Transit to Secunderabad</div>
                        </div>
                        <span class="transit-duration-badge">3 Mins</span>
                    </div>

                    <div class="transit-item-row">
                        <div>
                            <div class="transit-destination-name">Rockwoods International School</div>
                            <div class="transit-destination-meta">Reputed International School &amp; Academy</div>
                        </div>
                        <span class="transit-duration-badge">5 Mins</span>
                    </div>

                    <div class="transit-item-row">
                        <div>
                            <div class="transit-destination-name">Birla Open Minds International School</div>
                            <div class="transit-destination-meta">Premier K-12 Progressive Education Campus</div>
                        </div>
                        <span class="transit-duration-badge">5 Mins</span>
                    </div>

                    <div class="transit-item-row">
                        <div>
                            <div class="transit-destination-name">Swarnagiri Temple</div>
                            <div class="transit-destination-meta">Major Cultural &amp; Spiritual Landmark</div>
                        </div>
                        <span class="transit-duration-badge">10 Mins</span>
                    </div>

                    <div class="transit-item-row">
                        <div>
                            <div class="transit-destination-name">Outer Ring Road (ORR Exit 9)</div>
                            <div class="transit-destination-meta">Express Corridor to HITEC City &amp; RGIA Airport</div>
                        </div>
                        <span class="transit-duration-badge">20 Mins</span>
                    </div>
                </div>
            </div>

                <!-- Highway Corridor Billboard Campaign -->
                <div class="mt-5 pt-4 border-top border-white-10">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
                        <div>
                            <div class="subtitle text-brand-secondary font-copperplate mb-1">Official Corridor Campaign</div>
                            <h3 class="fs-28 text-white font-copperplate mb-0">Highway Outdoor Billboards</h3>
                        </div>
                        <div>
                            <a href="{{ route('location') }}" class="btn-outline-brand font-copperplate fs-12 px-3 py-1.5 rounded-pill">
                                <span>Explore Full Corridor &rarr;</span>
                            </a>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Creative 3: AIIMS Bibinagar 5 Mins -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="creative-billboard-card" onclick="openCreativeModal('{{ asset('images/creatives/creative3.jpeg') }}', 'Reach AIIMS Bibinagar in 5 Minutes', '750-Bed Premier Medical Institute &amp; Hospital')">
                                <div class="creative-img-wrap">
                                    <img src="{{ asset('images/creatives/creative3.jpeg') }}" alt="Outdoor highway billboard showcasing 5-minute proximity to AIIMS Bibinagar medical institute" class="creative-img" loading="lazy">
                                    <div class="creative-badge">05 MINS</div>
                                    <div class="creative-zoom-overlay">
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                        <span>Click to Inspect Billboard</span>
                                    </div>
                                </div>
                                <div class="creative-caption">
                                    <h4 class="fs-16 text-white font-copperplate mb-1">AIIMS Bibinagar</h4>
                                    <p class="text-white-50 fs-12 mb-0">750-Bed Central Hospital &bull; 5 Mins Away</p>
                                </div>
                            </div>
                        </div>

                        <!-- Creative 2: Bibinagar MMTS 5 Mins -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="creative-billboard-card" onclick="openCreativeModal('{{ asset('images/creatives/creative2.jpeg') }}', 'Reach Bibinagar MMTS in 5 Minutes', 'Direct Suburban Railway to Secunderabad &amp; Hyderabad Central')">
                                <div class="creative-img-wrap">
                                    <img src="{{ asset('images/creatives/creative2.jpeg') }}" alt="Outdoor highway billboard highlighting 5-minute commute to Bibinagar MMTS suburban railway station" class="creative-img" loading="lazy">
                                    <div class="creative-badge">05 MINS</div>
                                    <div class="creative-zoom-overlay">
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                        <span>Click to Inspect Billboard</span>
                                    </div>
                                </div>
                                <div class="creative-caption">
                                    <h4 class="fs-16 text-white font-copperplate mb-1">Bibinagar MMTS Station</h4>
                                    <p class="text-white-50 fs-12 mb-0">Direct Suburban Rail Transit &bull; 5 Mins Away</p>
                                </div>
                            </div>
                        </div>

                        <!-- Creative 1: National Highway NH-163 5 Mins -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="creative-billboard-card" onclick="openCreativeModal('{{ asset('images/creatives/creative1.jpeg') }}', 'Reach National Highway NH-163 in 5 Minutes', 'HMDA Approved Layout LP No: 000085/LO/Plg/HMDA/2024 &amp; TG RERA: P02200008537')">
                                <div class="creative-img-wrap">
                                    <img src="{{ asset('images/creatives/creative1.jpeg') }}" alt="Outdoor highway billboard featuring HMDA approved residential plots near NH-163 Warangal highway" class="creative-img" loading="lazy">
                                    <div class="creative-badge">05 MINS</div>
                                    <div class="creative-zoom-overlay">
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                        <span>Click to Inspect Billboard</span>
                                    </div>
                                </div>
                                <div class="creative-caption">
                                    <h4 class="fs-16 text-white font-copperplate mb-1">NH-163 Growth Corridor</h4>
                                    <p class="text-white-50 fs-12 mb-0">6-Lane National Expressway &bull; 5 Mins Away</p>
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
                        <h2 class="fs-32 text-white font-copperplate mb-2">Schedule a Guided Site Visit</h2>
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
                    <div class="showcase-modal-title" id="showcaseModalTitle">Grand Entrance Arch</div>
                    <div class="showcase-modal-subtitle" id="showcaseModalSubtitle">Architectural Gateway &amp; Security Post</div>
                </div>
                <button class="showcase-modal-close" onclick="closeShowcaseModal(event)" aria-label="Close modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="showcase-modal-body">
                <button class="showcase-nav-btn showcase-nav-prev" onclick="navigateShowcase(-1)" aria-label="Previous render">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <img id="showcaseModalImg" src="" alt="Venture infrastructure showcase render" class="showcase-modal-img">
                <button class="showcase-nav-btn showcase-nav-next" onclick="navigateShowcase(1)" aria-label="Next render">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Underground Utilities Dual Lightbox Modal -->
    <div class="utilities-lightbox-modal" id="utilitiesModal" aria-hidden="true" role="dialog">
        <div class="utilities-modal-backdrop" id="utilitiesModalBackdrop" onclick="closeUtilitiesModal()"></div>
        <div class="utilities-modal-dialog">
            <div class="utilities-modal-header">
                <div class="d-flex align-items-center gap-2">
                    <span class="modal-gold-badge"><i class="fa-solid fa-shield-halved me-1"></i> Physical Verification</span>
                    <h4 class="utilities-modal-title">Underground Utilities &amp; Plot Demarcation</h4>
                </div>
                <button type="button" class="utilities-modal-close" onclick="closeUtilitiesModal()" aria-label="Close modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="utilities-modal-body">
                <div class="utilities-modal-grid">
                    <!-- Item 1: Yellow Boundary Marker -->
                    <div class="utilities-modal-item">
                        <div class="utilities-modal-img-wrap">
                            <img src="{{ asset('landing2/images/utilities-stone-full.jpg?v=5') }}" alt="Plot Demarcation Yellow Marker" id="modalStoneImg">
                            <span class="utilities-img-tag"><i class="fa-solid fa-location-pin me-1"></i> Plot Demarcation</span>
                        </div>
                        <div class="utilities-modal-info">
                            <h5>Plot Boundary Marker</h5>
                            <p>Every plot at RRR Prekshitha Enclave is clearly demarcated with bright yellow numbered boundary markers, manicured concrete avenue kerbing, and landscaped plantation.</p>
                        </div>
                    </div>

                    <!-- Item 2: Circled Chamber Cover -->
                    <div class="utilities-modal-item">
                        <div class="utilities-modal-img-wrap">
                            <img src="{{ asset('landing2/images/utilities-chamber-full.jpg?v=5') }}" alt="Concealed Underground Drainage Chamber Cover" id="modalChamberImg">
                            <span class="utilities-img-tag"><i class="fa-solid fa-circle-notch me-1"></i> Heavy-Duty Chamber (BALAJI MD40)</span>
                        </div>
                        <div class="utilities-modal-info">
                            <h5>Concealed Drainage Chamber · BALAJI MD40</h5>
                            <p>Heavy-duty circular concrete inspection chamber cover with anti-slip honeycomb pattern and dual lifting hooks, seamlessly integrated into the road paving for long-term durability.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="utilities-modal-footer">
                <span class="text-white-50 small"><i class="fa-solid fa-info-circle me-1"></i> Actual unedited photographs captured directly on site at Bibinagar.</span>
                <button type="button" class="btn-primary-brand" onclick="closeUtilitiesModal(); document.querySelector('#contact, #enquire, #schedule-visit')?.scrollIntoView({behavior:'smooth'});" style="padding: 8px 20px; font-size: 0.8rem; border: none; cursor: pointer;">
                    <span>Schedule Free Site Inspection</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                </button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // ── Infrastructure Gallery Lightbox Modal ──
    const showcaseGallery = [
        {
            src: "{{ asset('landing2/images/Web_03.png') }}",
            title: "Grand Entrance Arch",
            subtitle: "Architectural Gateway &amp; Security Post"
        },
        {
            src: "{{ asset('landing2/images/rrr-road-1.jpg') }}",
            title: "30' &amp; 40' CC Roads",
            subtitle: "Durable All-Weather Concrete Avenues"
        },
        {
            src: "{{ asset('landing2/images/utilities-chamber-full.jpg?v=5') }}",
            title: "Underground Utilities",
            subtitle: "Concealed Drainage Chambers &amp; Infrastructure"
        },
        {
            src: "{{ asset('landing2/images/layout-parks-12.jpg') }}",
            title: "3 Landscaped Parks",
            subtitle: "Green Open Reserves &amp; Avenue Palm Plantation"
        },
        {
            src: "{{ asset('landing2/images/water-tank.png') }}",
            title: "Overhead Water Tank",
            subtitle: "Reliable Gravity-Fed Potable Water Supply"
        },
        {
            src: "{{ asset('landing2/images/compound-wall.jpg') }}",
            title: "Premium Compound Wall",
            subtitle: "Continuous Boundary Enclosure &amp; Avenue Frontage"
        },
        {
            src: "{{ asset('landing2/images/social-infra.jpg') }}",
            title: "Social Infrastructure",
            subtitle: "On-Site Project Office, Visitor Parking &amp; Landscaped Greens"
        },
        {
            src: "{{ asset('landing2/images/electricity-led-combined.jpg') }}",
            title: "Electricity with LED Street Lights",
            subtitle: "Illuminated Concrete Avenues &amp; Dusk Grid"
        },
        {
            src: "{{ asset('landing2/images/entrance-site-photo.jpg') }}",
            title: "100' Road &amp; Connectivity",
            subtitle: "Direct 100 Feet Master Plan Road Connecting to Entrance &amp; Highway"
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

    // ── Utilities Modal ──
    function openUtilitiesModal(initialIndex) {
        var modal = document.getElementById('utilitiesModal');
        if (modal) {
            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeUtilitiesModal() {
        var modal = document.getElementById('utilitiesModal');
        if (modal) {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
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
            closeUtilitiesModal();
            closeReelModal();
        } else if (isShowcaseOpen && e.key === 'ArrowLeft') {
            navigateShowcase(-1);
        } else if (isShowcaseOpen && e.key === 'ArrowRight') {
            navigateShowcase(1);
        }
    });
</script>
@endpush