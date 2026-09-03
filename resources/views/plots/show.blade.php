@extends('layouts.app')

@php
    $status = strtolower($plot['status'] ?? 'available');
    $statusNorm = in_array($status, ['reserved', 'booked']) ? 'reserved' : $status;
    $statusClass = match($statusNorm) {
        'sold' => 'status-sold',
        'reserved' => 'status-reserved',
        default => 'status-available',
    };
    $statusLabel = match($statusNorm) {
        'sold' => 'Sold Out',
        'reserved' => 'Reserved / Booking in Progress',
        default => 'Available for Immediate Spot Registration',
    };
    $statusIcon = match($statusNorm) {
        'sold' => 'fa-circle-xmark',
        'reserved' => 'fa-clock',
        default => 'fa-circle-check',
    };
    $isUnlocked = $plot['is_price_unlocked'] ?? session('prices_unlocked', false);
    $galleryPhotos = !empty($plot['gallery']) ? $plot['gallery'] : [
        asset('venture/photos/01.jpg'),
        asset('venture/photos/02.jpg'),
        asset('venture/photos/03.jpg'),
        asset('venture/photos/04.jpg'),
    ];
    $venturePhotos = !empty($plot['all_venture_photos']) ? $plot['all_venture_photos'] : [];
@endphp

@section('title', ($plot['number'] ?? 'Plot Details') . ' (' . ($plot['area'] ?? '167 Sq. Yds') . ') — Photos, Video Tour & Specifications | NAVAGRUHA')
@section('meta_description', 'Watch 4K drone video walkthrough, inspect on-ground photographs, and view technical dimensional layout for ' . ($plot['number'] ?? 'Plot') . ' at Navagruha Prekshitha Enclave, AIIMS Bibinagar.')

@push('styles')
<style>
    .plot-main-gallery-wrap {
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.12);
        box-shadow: 0 12px 36px rgba(0, 0, 0, 0.35);
        background: #0d1721;
    }
    .gallery-main-img {
        width: 100%;
        height: clamp(280px, 48vw, 480px);
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease, opacity 0.25s ease;
    }
    .gallery-thumb-item {
        height: clamp(65px, 12vw, 90px);
        width: 100%;
        object-fit: cover;
        border-radius: 10px;
        cursor: pointer;
        border: 2px solid transparent;
        opacity: 0.65;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        background: #0d1721;
    }
    .gallery-thumb-item:hover, .gallery-thumb-item.active {
        opacity: 1;
        border-color: var(--secondary-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 14px rgba(113, 182, 68, 0.35);
    }
    .plot-video-wrap {
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.12);
        background: #09121a;
        aspect-ratio: 16 / 9;
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.45);
    }
    .plot-video-wrap iframe {
        width: 100%;
        height: 100%;
        border: 0;
        display: block;
    }
    .photo-showcase-card {
        position: relative;
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        background: #0d1721;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .photo-showcase-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .photo-showcase-card:hover {
        transform: translateY(-4px);
        border-color: rgba(113, 182, 68, 0.4);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.35);
    }
    .photo-showcase-card:hover img {
        transform: scale(1.05);
    }
    .photo-showcase-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, transparent 40%, rgba(13, 23, 33, 0.95) 100%);
        display: flex;
        align-items: flex-end;
        padding: 14px;
    }
    .photo-showcase-caption {
        font-family: var(--font-heading) !important;
        font-size: 11px;
        color: #ffffff;
        font-weight: 700;
        line-height: 1.25;
    }
    .video-chapter-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.12);
        color: rgba(255, 255, 255, 0.85);
        border-radius: 20px;
        padding: 6px 14px;
        font-size: 12px;
        font-family: var(--font-heading) !important;
    }
</style>
@endpush

@section('content')

    {{-- Top Plot Heading & Breadcrumb Banner --}}
    <section class="section-dark text-light relative overflow-hidden py-5 border-bottom border-white-10 bg-brand-pattern"
        style="background: linear-gradient(135deg, rgba(14, 26, 36, 0.93) 0%, rgba(20, 37, 51, 0.85) 50%, rgba(35, 65, 89, 0.90) 100%), url('{{ $galleryPhotos[0] ?? asset('venture/photos/02.jpg') }}') center/cover no-repeat;">
        <div class="wm-hero-watermark" style="opacity: 0.06;">{{ $plot['number'] ?? 'NAVAGRUHA' }}</div>
        <div class="container relative z-2">
            <div class="row align-items-center justify-content-between g-3">
                <div class="col-md-8">
                    <ul class="crumb text-light font-copperplate fs-12 mb-2 list-inline">
                        <li class="list-inline-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a> &nbsp;/</li>
                        <li class="list-inline-item"><a href="{{ route('plots.index') }}" class="text-white-50 text-decoration-none">Plots Availability Board</a> &nbsp;/</li>
                        <li class="list-inline-item active text-brand-secondary">{{ $plot['number'] ?? 'Plot Details' }}</li>
                    </ul>
                    <div class="d-flex align-items-center flex-wrap gap-2 mb-1">
                        <span class="text-white-50 font-copperplate fs-12">NAVAGRUHA PREKSHITHA ENCLAVE</span>
                        <span class="text-white-50">&bull;</span>
                        <span class="brand-tagline fs-10 mb-0">AIIMS BIBINAGAR</span>
                    </div>
                    <h1 class="fs-36 text-white font-copperplate lh-1-1 mb-1">
                        {{ $plot['number'] ?? 'Plot Details' }} &mdash; {{ $plot['area'] ?? '167 Sq. Yards' }}
                    </h1>
                    <p class="text-white-50 fs-14 mb-0">
                        {{ $plot['facing'] ?? 'East' }} Facing &bull; {{ $plot['road_width'] ?? '40 Ft Road' }} &bull; HMDA LP No. 000085/LO/Plg/HMDA/2024 &bull; RERA Approved
                    </p>
                </div>
                <div class="col-md-4 text-md-end d-flex flex-column align-items-md-end gap-2">
                    <span class="{{ $statusClass }} fs-13 py-2 px-3">
                        <i class="fa-solid {{ $statusIcon }} me-1"></i> {{ $statusLabel }}
                    </span>
                    <a href="{{ asset('venture/docs/RRR PREKSHITHA ENCLAVE LAYOUT.pdf') }}" target="_blank" rel="noopener"
                       class="btn btn-outline-light font-copperplate fs-11 px-3 py-1.5 rounded-pill d-inline-flex align-items-center gap-1">
                        <i class="fa-solid fa-file-pdf text-danger"></i> Official Master Plan PDF
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Plot Details Body --}}
    <section class="bg-brand-dark text-light py-60">
        <div class="container">
            <div class="row g-4 g-lg-5">
                
                {{-- Left 8-Col: Photos, Video, Overview, Specs, Amenities, Location --}}
                <div class="col-lg-8">
                    
                    {{-- 1. Interactive Multi-Photo Gallery --}}
                    <div class="mb-5">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <div class="subtitle text-brand-secondary font-copperplate mb-0">
                                    <i class="fa-solid fa-camera me-1"></i> On-Ground Photos
                                </div>
                                <h2 class="fs-24 text-white font-copperplate mb-0">Plot &amp; Venture Photo Gallery</h2>
                            </div>
                            <span class="fs-12 text-white-50 font-copperplate">
                                <i class="fa-solid fa-images text-brand-secondary me-1"></i> {{ count($galleryPhotos) }} Photos
                            </span>
                        </div>

                        <div class="plot-main-gallery-wrap mb-3">
                            <img id="mainGalleryImg" src="{{ $galleryPhotos[0] ?? asset('venture/photos/01.jpg') }}" alt="{{ $plot['number'] }}" class="gallery-main-img">
                            <div class="position-absolute bottom-0 start-0 m-3 px-3 py-1.5 rounded-pill bg-brand-dark bg-opacity-75 backdrop-blur border border-white-10 fs-12 font-copperplate text-white">
                                <i class="fa-solid fa-camera me-1 text-brand-secondary"></i> On-Ground Actual Site Photo
                            </div>
                        </div>

                        @if(!empty($galleryPhotos))
                            <div class="row g-2">
                                @foreach($galleryPhotos as $index => $imgUrl)
                                    <div class="col-3 col-md-2 col-lg-2">
                                        <img src="{{ $imgUrl }}" class="gallery-thumb-item {{ $index === 0 ? 'active' : '' }}"
                                             onclick="switchPlotImage('{{ $imgUrl }}', this)" alt="Thumbnail {{ $index + 1 }}">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- 2. Video Tour Section --}}
                    <div class="mb-5" id="video-tour">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <h2 class="fs-24 text-white font-copperplate mb-0">
                                    <i class="fa-solid fa-circle-play text-brand-secondary me-2"></i>Video Tour
                                </h2>
                            </div>
                        </div>

                        <div class="plot-video-wrap mb-3" style="aspect-ratio: 16/9; position: relative; border-radius: 18px; overflow: hidden; background: #000; box-shadow: 0 16px 40px rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.12);">
                            <video id="plotDetailVideo" class="w-100 h-100 object-fit-cover" controls playsinline preload="metadata" poster="{{ asset('venture/renders/Web Banner 05.jpg') }}">
                                <source src="{{ asset('venture/videos/venture-walkthrough.mp4') }}" type="video/mp4">
                                Your browser does not support HTML5 video.
                            </video>
                        </div>

                        {{-- Video Highlights --}}
                        <div class="d-flex flex-wrap gap-2 pt-1">
                            <span class="video-chapter-pill">
                                <i class="fa-solid fa-archway text-brand-secondary"></i> Grand Entrance Arch
                            </span>
                            <span class="video-chapter-pill">
                                <i class="fa-solid fa-road text-brand-secondary"></i> 40' Concrete Avenue
                            </span>
                            <span class="video-chapter-pill">
                                <i class="fa-solid fa-faucet-drip text-brand-secondary"></i> Underground Drainage
                            </span>
                            <span class="video-chapter-pill">
                                <i class="fa-solid fa-tree text-brand-secondary"></i> Landscaped Thematic Parks
                            </span>
                            <span class="video-chapter-pill">
                                <i class="fa-solid fa-hospital text-brand-secondary"></i> 05 Mins to AIIMS Bibinagar
                            </span>
                        </div>
                    </div>

                    {{-- 3. Property Overview & Description --}}
                    <div class="mb-5">
                        <div class="subtitle text-brand-secondary font-copperplate mb-1">Layout Overview</div>
                        <h2 class="fs-24 text-white font-copperplate mb-3">Property Overview</h2>
                        <p class="fs-15 text-white-50 leading-relaxed mb-0">
                            {{ $plot['description'] ?? 'Auspicious residential plot located along the 40-foot main venture concrete avenue. 100% Vaastu compliant with underground utility connections, ready for immediate spot registration.' }}
                        </p>
                    </div>

                    {{-- 4. Technical Specifications Grid --}}
                    <div class="mb-5">
                        <div class="subtitle text-brand-secondary font-copperplate mb-1">Dimensions &amp; Approvals</div>
                        <h3 class="fs-24 text-white font-copperplate mb-3">
                            <i class="fa-solid fa-list-check text-brand-secondary me-2"></i> Technical Specifications
                        </h3>
                        <div class="row g-3">
                            <div class="col-sm-6 col-12">
                                <div class="spec-card">
                                    <div class="text-white-50 fs-11 text-uppercase font-copperplate">Plot Area</div>
                                    <div class="fs-18 fw-700 text-white font-copperplate mt-1">{{ $plot['area'] ?? '167 Sq. Yards' }}</div>
                                    <div class="text-white-50 fs-11">{{ $plot['sqft'] ?? '1,503 Sq. Ft' }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="spec-card">
                                    <div class="text-white-50 fs-11 text-uppercase font-copperplate">Boundary Dimensions</div>
                                    <div class="fs-18 fw-700 text-white font-copperplate mt-1">{{ $plot['dimensions'] ?? "33'0\" × 45'6\"" }}</div>
                                    <div class="text-white-50 fs-11">Clear demarcated boundary stones</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="spec-card">
                                    <div class="text-white-50 fs-11 text-uppercase font-copperplate">Facing Direction</div>
                                    <div class="fs-18 fw-700 text-white font-copperplate mt-1">{{ $plot['facing'] ?? 'East' }} Facing</div>
                                    <div class="text-brand-secondary fs-11"><i class="fa-solid fa-compass me-1"></i> 100% Vaastu Compliant</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="spec-card">
                                    <div class="text-white-50 fs-11 text-uppercase font-copperplate">Road Frontage Width</div>
                                    <div class="fs-18 fw-700 text-white font-copperplate mt-1">{{ $plot['road_width'] ?? '40 Ft Road' }}</div>
                                    <div class="text-white-50 fs-11">M-25 grade heavy-duty CC road</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="spec-card">
                                    <div class="text-white-50 fs-11 text-uppercase font-copperplate">Legal Approvals</div>
                                    <div class="fs-18 fw-700 text-white font-copperplate mt-1">HMDA &amp; RERA Approved</div>
                                    <div class="text-white-50 fs-11">Final LP sanction approved</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="spec-card">
                                    <div class="text-white-50 fs-11 text-uppercase font-copperplate">Title &amp; Bank Loans</div>
                                    <div class="fs-18 fw-700 text-white font-copperplate mt-1">Spot Registration Ready</div>
                                    <div class="text-white-50 fs-11">Up to 80% loan from SBI, HDFC &amp; ICICI</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 5. On-Ground Photo Showcase Grid --}}
                    @if(!empty($venturePhotos))
                    <div class="mb-5">
                        <div class="subtitle text-brand-secondary font-copperplate mb-1">Site Progress &amp; Reality</div>
                        <h3 class="fs-24 text-white font-copperplate mb-3">
                            <i class="fa-solid fa-camera-retro text-brand-secondary me-2"></i> On-Ground Venture Infrastructure Showcase
                        </h3>
                        <div class="row g-3">
                            @foreach($venturePhotos as $item)
                                <div class="col-sm-6 col-md-4">
                                    <div class="photo-showcase-card" onclick="switchPlotImage('{{ $item['url'] }}', null); window.scrollTo({top: 250, behavior: 'smooth'});">
                                        <img src="{{ $item['url'] }}" alt="{{ $item['caption'] }}" loading="lazy">
                                        <div class="photo-showcase-overlay">
                                            <div class="photo-showcase-caption">{{ $item['caption'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- 6. Venture Amenities & Infrastructure --}}
                    <div class="mb-5">
                        <div class="subtitle text-brand-secondary font-copperplate mb-1">Infrastructure Standards</div>
                        <h3 class="fs-24 text-white font-copperplate mb-3">
                            <i class="fa-solid fa-cubes-stacked text-brand-secondary me-2"></i> Venture Amenities &amp; Features
                        </h3>
                        <div class="row g-2">
                            <div class="col-md-6 col-12"><div class="amenity-chip"><i class="fa-solid fa-archway"></i> Grand Entrance Arch &amp; Boom Barrier</div></div>
                            <div class="col-md-6 col-12"><div class="amenity-chip"><i class="fa-solid fa-road"></i> 40' &amp; 30' M-25 Grade CC Roads</div></div>
                            <div class="col-md-6 col-12"><div class="amenity-chip"><i class="fa-solid fa-faucet-drip"></i> Underground Drainage &amp; Sewage</div></div>
                            <div class="col-md-6 col-12"><div class="amenity-chip"><i class="fa-solid fa-tower-broadcast"></i> Underground Electricity &amp; Cables</div></div>
                            <div class="col-md-6 col-12"><div class="amenity-chip"><i class="fa-solid fa-water"></i> Overhead Water Tank &amp; Tap Lines</div></div>
                            <div class="col-md-6 col-12"><div class="amenity-chip"><i class="fa-solid fa-tree"></i> 3 Landscaped Thematic Parks</div></div>
                            <div class="col-md-6 col-12"><div class="amenity-chip"><i class="fa-solid fa-child-reaching"></i> Children Play Area &amp; Walking Track</div></div>
                            <div class="col-md-6 col-12"><div class="amenity-chip"><i class="fa-solid fa-shield-halved"></i> 24/7 Security Cabin with CCTV</div></div>
                        </div>
                    </div>

                    {{-- 7. Strategic Connectivity --}}
                    <div>
                        <div class="subtitle text-brand-secondary font-copperplate mb-1">Strategic Location</div>
                        <h3 class="fs-24 text-white font-copperplate mb-3">
                            <i class="fa-solid fa-location-crosshairs text-brand-secondary me-2"></i> Commute Highlights
                        </h3>
                        <div class="p-4 rounded-4 bg-brand-card border border-white-10">
                            <div class="row g-3 fs-14 text-white-50">
                                <div class="col-md-6 col-12 d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-hospital text-brand-secondary flex-shrink-0"></i>
                                    <span><strong>05 Mins:</strong> AIIMS Bibinagar Medical Hub</span>
                                </div>
                                <div class="col-md-6 col-12 d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-road text-brand-secondary flex-shrink-0"></i>
                                    <span><strong>05 Mins:</strong> NH-163 Warangal Growth Corridor</span>
                                </div>
                                <div class="col-md-6 col-12 d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-train text-brand-secondary flex-shrink-0"></i>
                                    <span><strong>05 Mins:</strong> Bibinagar MMTS Railway Station</span>
                                </div>
                                <div class="col-md-6 col-12 d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-route text-brand-secondary flex-shrink-0"></i>
                                    <span><strong>15 Mins:</strong> Outer Ring Road (ORR) Exit 9</span>
                                </div>
                                <div class="col-md-6 col-12 d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-building text-brand-secondary flex-shrink-0"></i>
                                    <span><strong>20 Mins:</strong> Infosys Pocharam SEZ IT Corridor</span>
                                </div>
                                <div class="col-md-6 col-12 d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-train-subway text-brand-secondary flex-shrink-0"></i>
                                    <span><strong>30 Mins:</strong> Uppal Metro Station, Hyderabad</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Right 4-Col: Sticky Booking Card & Other Sizes --}}
                <div class="col-lg-4">
                    <div class="sticky-top" style="top: 85px; z-index: 10;">
                        
                        {{-- Price & Guided Visit Booking Card --}}
                        <div class="p-4 rounded-4 bg-brand-card border border-white-10 mb-4 shadow-lg">
                            
                            {{-- Locked State Notice with Big Lock Icon --}}
                            <div id="sidebarPriceLockedBox" class="{{ $isUnlocked ? 'd-none' : '' }}">
                                <div class="text-center p-4 rounded-4 bg-dark bg-opacity-75 border border-white-10 mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-brand-primary mb-3" style="width: 76px; height: 76px; border: 2px solid rgba(113, 182, 68, 0.45); box-shadow: 0 0 25px rgba(113, 182, 68, 0.25);">
                                        <i class="fa-solid fa-lock text-brand-secondary" style="font-size: 34px;"></i>
                                    </div>
                                    <div class="d-block mb-1">
                                        <span class="status-available fs-11 font-copperplate">
                                            <i class="fa-solid fa-shield-halved me-1"></i> DIRECT DEVELOPER PRICE
                                        </span>
                                    </div>
                                    <h3 class="fs-20 text-white font-copperplate mt-2 mb-1">
                                        Price Protected &bull; Locked
                                    </h3>
                                    <p class="text-white-50 fs-12 mb-0">
                                        Submit your contact details below to instantly reveal the official plot price &amp; payment breakdown.
                                    </p>
                                </div>
                            </div>

                            {{-- Unlocked State Display --}}
                            <div id="sidebarPriceUnlockedBox" class="{{ $isUnlocked ? '' : 'd-none' }}">
                                <div class="text-white-50 fs-11 font-copperplate text-uppercase">Direct Developer Total Price</div>
                                <div class="fs-36 fw-800 text-brand-secondary font-copperplate mt-1" id="sidebarPlotPrice">
                                    {{ $plot['price'] ?? 'Price Available' }}
                                </div>
                                <div class="text-white-50 fs-12 mb-3">
                                    <span id="sidebarPlotExact">{{ $plot['exact_price'] ?? 'Verified Title' }}</span> &bull; Spot Registration Ready
                                </div>
                            </div>

                            <hr class="border-white-10 my-3">

                            {{-- Guided Visit / Unlock Booking Form --}}
                            <form id="sidebarUnlockForm" action="{{ route('plots.unlock-price') }}" method="POST" onsubmit="handleSidebarPriceUnlock(event)">
                                @csrf
                                <input type="hidden" name="plot_id" value="{{ $plot['id'] }}">
                                <input type="hidden" name="plot_size" value="{{ $plot['area'] ?? '200 Sq. Yards' }} ({{ $plot['number'] ?? 'Plot' }})">
                                
                                <div id="sidebarUnlockAlert" class="alert alert-danger d-none py-2 px-3 fs-13" role="alert"></div>
                                <div id="sidebarUnlockSuccessAlert" class="alert alert-success d-none py-2 px-3 fs-13" role="alert">
                                    <i class="fa-solid fa-check me-1"></i> Price unlocked successfully! Our team will contact you shortly.
                                </div>

                                <div class="mb-3">
                                    <label class="fs-12 text-white-50 font-copperplate mb-1">Your Full Name <span class="text-brand-secondary">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="e.g. Ramesh Reddy" value="{{ session('visitor_name', '') }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="fs-12 text-white-50 font-copperplate mb-1">Mobile Phone Number <span class="text-brand-secondary">*</span></label>
                                    <input type="tel" name="phone" class="form-control" placeholder="10-digit mobile number" pattern="[0-9]{10,15}" value="{{ session('visitor_phone', '') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="fs-12 text-white-50 font-copperplate mb-1">Email Address <span class="text-brand-secondary">*</span></label>
                                    <input type="email" name="email" class="form-control" placeholder="name@example.com" value="{{ session('visitor_email', '') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="fs-12 text-white-50 font-copperplate mb-1">Preferred Visit Date (Optional)</label>
                                    <input type="date" name="preferred_visit_date" class="form-control" value="{{ date('Y-m-d', strtotime('+1 day')) }}" min="{{ date('Y-m-d') }}">
                                </div>

                                <button type="submit" id="sidebarSubmitBtn" class="btn-secondary-brand w-100 py-3 font-copperplate">
                                    <span id="sidebarBtnText">
                                        <i class="fa-solid {{ $isUnlocked ? 'fa-calendar-check' : 'fa-lock-open' }} me-1"></i> 
                                        {{ $isUnlocked ? 'Schedule Free Site Visit' : 'Unlock Price & Schedule Tour' }} &rarr;
                                    </span>
                                    <span id="sidebarBtnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                </button>
                            </form>

                            <div class="mt-3 text-center fs-11 text-white-50">
                                <i class="fa-solid fa-phone text-brand-secondary me-1"></i> Call Desk: <a href="tel:+919617699699" class="text-white text-decoration-none fw-bold">+91 9617 699 699</a>
                            </div>
                        </div>

                        {{-- Other Available Sizes Quick Switcher --}}
                        @if(!empty($otherPlots))
                            <div class="p-4 rounded-4 bg-brand-card border border-white-10 shadow-lg">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h4 class="fs-16 text-white font-copperplate mb-0">
                                        <i class="fa-solid fa-arrows-split-up-and-left text-brand-secondary me-2"></i> Other Plot Sizes
                                    </h4>
                                    <a href="{{ route('plots.index') }}" class="text-brand-secondary fs-11 font-copperplate text-decoration-none">
                                        View Board &rarr;
                                    </a>
                                </div>
                                <div class="d-flex flex-column gap-2">
                                    @foreach($otherPlots as $other)
                                        @php
                                            $otherStatus = $other['status'] ?? 'available';
                                            $otherStatusNorm = in_array($otherStatus, ['reserved', 'booked']) ? 'reserved' : $otherStatus;
                                            $otherBadgeClass = match($otherStatusNorm) {
                                                'sold' => 'status-sold',
                                                'reserved' => 'status-reserved',
                                                default => 'status-available',
                                            };
                                            $otherBadgeText = match($otherStatusNorm) {
                                                'sold' => 'Sold',
                                                'reserved' => 'Filling up Fast',
                                                default => 'Available',
                                            };
                                            $otherBadgeIcon = match($otherStatusNorm) {
                                                'sold' => 'fa-circle-xmark',
                                                'reserved' => 'fa-fire-flame-curved',
                                                default => 'fa-circle-check',
                                            };
                                        @endphp
                                        <a href="{{ route('plots.show', $other['id']) }}" class="d-flex justify-content-between align-items-center p-3 rounded-3 bg-brand-dark border border-white-10 text-decoration-none hover-scale-btn {{ $otherStatusNorm === 'sold' ? 'opacity-85' : '' }}" style="transition: all 0.25s ease;">
                                            <div>
                                                <div class="text-white fs-14 font-copperplate fw-bold mb-0.5">
                                                    {{ $other['number'] }} &bull; {{ $other['area'] }}
                                                </div>
                                                <div class="text-white-50 fs-11">
                                                    <i class="fa-solid fa-compass me-1 text-brand-secondary"></i> {{ $other['facing'] }} Facing &bull; {{ $other['road_width'] ?? '40 Ft Road' }}
                                                </div>
                                            </div>
                                            <div class="text-end ps-2">
                                                <span class="{{ $otherBadgeClass }} fs-11 py-1 px-2.5">
                                                    <i class="fa-solid {{ $otherBadgeIcon }} me-1" style="font-size: 8px;"></i> {{ $otherBadgeText }}
                                                </span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    function switchPlotImage(src, element) {
        const main = document.getElementById('mainGalleryImg');
        if (main) {
            main.style.opacity = '0.4';
            setTimeout(() => {
                main.src = src;
                main.style.opacity = '1';
            }, 120);
        }
        document.querySelectorAll('.gallery-thumb-item').forEach(t => t.classList.remove('active'));
        if (element) element.classList.add('active');
    }

    async function handleSidebarPriceUnlock(event) {
        event.preventDefault();
        const form = event.target;
        const alertBox = document.getElementById('sidebarUnlockAlert');
        const successBox = document.getElementById('sidebarUnlockSuccessAlert');
        const submitBtn = document.getElementById('sidebarSubmitBtn');
        const btnText = document.getElementById('sidebarBtnText');
        const btnSpinner = document.getElementById('sidebarBtnSpinner');

        alertBox.classList.add('d-none');
        successBox.classList.add('d-none');
        submitBtn.disabled = true;
        btnText.classList.add('d-none');
        btnSpinner.classList.remove('d-none');

        const formData = new FormData(form);

        try {
            const response = await fetch('{{ route('plots.unlock-price') }}', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                },
                body: formData,
            });

            const data = await response.json();

            if (response.ok && data.success) {
                const sidebarPriceEl = document.getElementById('sidebarPlotPrice');
                const sidebarExactEl = document.getElementById('sidebarPlotExact');
                const sidebarLockedBox = document.getElementById('sidebarPriceLockedBox');
                const sidebarUnlockedBox = document.getElementById('sidebarPriceUnlockedBox');

                if (sidebarPriceEl && data.price) {
                    sidebarPriceEl.textContent = data.price;
                    if (sidebarExactEl && data.exact_price) sidebarExactEl.textContent = data.exact_price;
                    if (sidebarLockedBox) sidebarLockedBox.classList.add('d-none');
                    if (sidebarUnlockedBox) sidebarUnlockedBox.classList.remove('d-none');
                }

                successBox.classList.remove('d-none');
                btnText.innerHTML = '<i class="fa-solid fa-calendar-check me-1"></i> Site Tour Confirmed &rarr;';
            } else {
                let errorMsg = data.message || 'Please verify your details and try again.';
                if (data.errors) {
                    errorMsg = Object.values(data.errors).flat().join('<br>');
                }
                alertBox.innerHTML = errorMsg;
                alertBox.classList.remove('d-none');
            }
        } catch (err) {
            alertBox.textContent = 'Connection error. Please try again.';
            alertBox.classList.remove('d-none');
        } finally {
            submitBtn.disabled = false;
            btnText.classList.remove('d-none');
            btnSpinner.classList.add('d-none');
        }
    }
</script>
@endpush