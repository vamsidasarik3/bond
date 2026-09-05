@extends('layouts.app')

@section('title', 'Projects, Navagruha Infra Developers')
@section('meta_description', 'Explore our portfolio of HMDA-approved gated communities, delivered residential developments, and commercial properties by Navagruha Infra Developers.')

@push('styles')
<style>
    /* ── Standardized Status Badges ── */
    .project-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-family: var(--font-heading) !important;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        padding: 4px 12px;
        border-radius: 20px;
        line-height: 1.3;
    }
    .badge-blue {
        background: rgba(37, 99, 235, 0.18);
        color: #60a5fa;
        border: 1px solid rgba(96, 165, 250, 0.35);
    }
    .badge-amber {
        background: rgba(245, 158, 11, 0.18);
        color: #fbbf24;
        border: 1px solid rgba(245, 158, 11, 0.35);
    }
    .badge-green {
        background: rgba(113, 182, 68, 0.18);
        color: #86efac;
        border: 1px solid rgba(113, 182, 68, 0.35);
    }

    /* ── Overview Grid Cards (Change 1) ── */
    .overview-project-card {
        background: #0d1721;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 10px 24px rgba(0,0,0,0.3);
        height: 100%;
        display: flex;
        flex-direction: column;
        cursor: pointer;
    }
    .overview-project-card:hover {
        transform: translateY(-5px);
        border-color: rgba(113, 182, 68, 0.45);
        box-shadow: 0 16px 36px rgba(0,0,0,0.45), 0 0 0 1px rgba(113, 182, 68, 0.25);
    }
    .overview-thumb-wrap {
        position: relative;
        height: 135px;
        overflow: hidden;
        background: #09121a;
    }
    .overview-thumb-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .overview-project-card:hover .overview-thumb-img {
        transform: scale(1.06);
    }
    .overview-photo-count {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(13, 23, 33, 0.85);
        backdrop-filter: blur(6px);
        border: 1px solid rgba(255, 255, 255, 0.12);
        color: #ffffff;
        font-family: var(--font-heading) !important;
        font-size: 10px;
        padding: 3px 9px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }
    .overview-card-body {
        padding: 16px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .overview-card-title {
        font-family: var(--font-heading) !important;
        font-size: 15px;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 6px;
        line-height: 1.3;
    }
    .overview-card-stats {
        font-size: 11.5px;
        color: rgba(255, 255, 255, 0.55);
        line-height: 1.4;
    }

    /* ── Stat Tiles with Scannable Icons (Change 2) ── */
    .stat-tile {
        padding: 16px 10px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.08);
        text-align: center;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transition: all 0.25s ease;
    }
    .stat-tile:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(113, 182, 68, 0.3);
        transform: translateY(-2px);
    }
    .stat-tile-icon {
        font-size: 18px;
        color: var(--secondary-color, #71b644);
        margin-bottom: 8px;
    }
    .stat-tile-val {
        color: #ffffff;
        font-size: 16px;
        font-weight: 800;
        font-family: var(--font-heading) !important;
        line-height: 1.2;
    }
    .stat-tile-label {
        color: rgba(255, 255, 255, 0.9);
        font-size: 10.5px;
        font-family: var(--font-heading) !important;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-top: 4px;
    }
    .stat-tile-sub {
        color: rgba(255, 255, 255, 0.45);
        font-size: 9.5px;
        margin-top: 2px;
        line-height: 1.2;
    }

    /* ── Detail Card & Responsive Rules (Change 4 & 8) ── */
    .project-detail-card {
        scroll-margin-top: 100px;
        transition: border-color 0.3s ease;
    }
    .project-media-wrap {
        height: 380px;
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 12px 30px rgba(0,0,0,0.4);
    }
    .project-media-wrap img {
        height: 380px;
        object-fit: cover;
    }

    @media (max-width: 860px) {
        .project-media-wrap {
            height: 280px;
        }
        .project-media-wrap img {
            height: 280px;
        }
        /* Stacks image above text below 860px */
        .order-mobile-img {
            order: 1 !important;
        }
        .order-mobile-content {
            order: 2 !important;
        }
    }
</style>
@endpush

@section('content')

    <!-- Hero / Breadcrumb Banner with Real Venture Background (Unchanged) -->
    <section class="section-dark text-light relative overflow-hidden py-5 border-bottom border-white-10 bg-brand-pattern" style="background: linear-gradient(135deg, rgba(14, 26, 36, 0.93) 0%, rgba(20, 37, 51, 0.85) 50%, rgba(35, 65, 89, 0.90) 100%), url('{{ asset('venture/photos/01.jpg') }}') center/cover no-repeat;">
        <div class="wm-hero-watermark" style="opacity: 0.05;">PORTFOLIO</div>
        <div class="container relative z-2">
            <div class="row g-4 justify-content-between align-items-center">
                <div class="col-md-8">
                    <div class="subtitle text-brand-secondary font-copperplate mb-2">
                        <i class="fa-solid fa-city me-1"></i> PROJECT PORTFOLIO
                    </div>
                    <h1 class="fs-48 text-white font-copperplate lh-1-1 mb-2">
                        Residential and Commercial Projects
                    </h1>
                    <p class="text-white-50 fs-16 mb-0">
                        Explore our residential plotted communities and commercial developments in and around Hyderabad.
                    </p>
                </div>
                <div class="col-md-4 text-md-end">
                    <ul class="crumb text-light font-copperplate fs-12 list-inline mb-0">
                        <li class="list-inline-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a> &nbsp;/</li>
                        <li class="list-inline-item active text-brand-secondary">Projects</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Projects Portfolio Section -->
    <section class="bg-brand-dark text-light py-80">
        <div class="container">

            <!-- Filter Status Bar -->
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-5 pb-3 border-bottom border-white-10">
                <div>
                    <span class="text-white-50 fs-12 text-uppercase font-copperplate tracking-wider">
                        <i class="fa-solid fa-filter me-1 text-brand-secondary"></i> Filter by Status:
                    </span>
                </div>
                <div class="d-flex flex-wrap gap-2" id="projectFilterButtons">
                    <button type="button" class="btn btn-sm px-3 py-2 rounded-pill font-copperplate fs-12 active-filter-btn" onclick="filterProjects('all', this)" style="background: var(--secondary-color); color: #ffffff; border: none;">
                        All Projects ({{ count($projects) }})
                    </button>
                    <button type="button" class="btn btn-sm px-3 py-2 rounded-pill font-copperplate fs-12 filter-btn text-white-50" onclick="filterProjects('ongoing', this)" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1);">
                        Ongoing Ventures (1)
                    </button>
                    <button type="button" class="btn btn-sm px-3 py-2 rounded-pill font-copperplate fs-12 filter-btn text-white-50" onclick="filterProjects('completed', this)" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1);">
                        Delivered &amp; Handed Over (1)
                    </button>
                </div>
            </div>

            <!-- Detailed Venture Cards List -->
            <div>
                <div class="row g-5" id="projectsContainer">
                    @foreach($projects as $proj)
                        @php
                            $isEven = ($loop->iteration % 2 == 0);
                        @endphp
                        <div class="col-12 project-card-item" id="project-{{ $proj['id'] }}" data-category="{{ $proj['status_key'] }}">
                            <div class="p-4 p-lg-5 rounded-4 bg-brand-card border border-white-10 shadow-xl position-relative overflow-hidden project-detail-card">
                                <div class="row g-4 g-xl-5 align-items-center">

                                    <!-- Media Column (Carousel / Visuals with Real HTML Overlays) -->
                                    <div class="col-lg-5 {{ $isEven ? 'order-mobile-img order-lg-2' : 'order-mobile-img order-lg-1' }}">
                                        <div id="carouselProject{{ $loop->index }}" class="carousel slide carousel-fade position-relative project-media-wrap" data-bs-ride="carousel">
                                            
                                            <!-- Category Badge Overlay (Real HTML element, NOT baked into image - Change 6) -->
                                            <div class="position-absolute top-0 start-0 m-3 z-3">
                                                <span class="badge bg-dark bg-opacity-80 text-white font-copperplate fs-11 px-3 py-1.5 border border-white-10 rounded-pill backdrop-blur">
                                                    {{ $proj['category_overlay'] ?? $proj['category'] }}
                                                </span>
                                            </div>

                                            <!-- Multi-photo Count Pill (Real HTML overlay - Change 6) -->
                                            <div class="position-absolute bottom-0 end-0 m-3 z-3">
                                                <span class="badge bg-dark bg-opacity-85 text-brand-secondary font-copperplate fs-11 px-3 py-1.5 border border-white-10 rounded-pill shadow">
                                                    <i class="fa-solid fa-camera me-1"></i> {{ count($proj['gallery'] ?? [$proj['image']]) }} photos
                                                </span>
                                            </div>

                                            <!-- Indicators -->
                                            @if(!empty($proj['gallery']) && count($proj['gallery']) > 1)
                                                <div class="carousel-indicators mb-2 z-3">
                                                    @foreach($proj['gallery'] as $idx => $img)
                                                        <button type="button" data-bs-target="#carouselProject{{ $loop->parent->index }}" data-bs-slide-to="{{ $idx }}" class="{{ $idx === 0 ? 'active' : '' }}" aria-label="Slide {{ $idx + 1 }}"></button>
                                                    @endforeach
                                                </div>
                                            @endif

                                            <!-- Slides -->
                                            <div class="carousel-inner h-100">
                                                @foreach($proj['gallery'] ?? [$proj['image']] as $idx => $img)
                                                    <div class="carousel-item h-100 {{ $idx === 0 ? 'active' : '' }}" data-bs-interval="3500">
                                                        <img src="{{ $img }}" class="d-block w-100 h-100 object-fit-cover" alt="{{ $proj['name'] }} - Slide {{ $idx + 1 }}">
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Controls -->
                                            @if(!empty($proj['gallery']) && count($proj['gallery']) > 1)
                                                <button class="carousel-control-prev z-3" type="button" data-bs-target="#carouselProject{{ $loop->index }}" data-bs-slide="prev" style="width: 15%;">
                                                    <span class="carousel-control-prev-icon rounded-circle p-2 bg-dark bg-opacity-70" aria-hidden="true" style="width: 32px; height: 32px; background-size: 50%;"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next z-3" type="button" data-bs-target="#carouselProject{{ $loop->index }}" data-bs-slide="next" style="width: 15%;">
                                                    <span class="carousel-control-next-icon rounded-circle p-2 bg-dark bg-opacity-70" aria-hidden="true" style="width: 32px; height: 32px; background-size: 50%;"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            @endif

                                        </div>
                                    </div>

                                    <!-- Content Column -->
                                    <div class="col-lg-7 {{ $isEven ? 'order-mobile-content order-lg-1' : 'order-mobile-content order-lg-2' }}">
                                        
                                        <!-- Top Header Bar with Standardized Badge (Change 5) -->
                                        <div class="d-flex align-items-center flex-wrap gap-2 mb-2">
                                            <span class="text-white-50 fs-12 font-copperplate text-uppercase">Navagruha Infra Developers</span>
                                            <span class="project-badge badge-{{ $proj['badge_type'] }}">
                                                {{ $proj['status_badge'] }}
                                            </span>
                                        </div>

                                        <h2 class="fs-32 text-white font-copperplate mb-1">
                                            {{ $proj['name'] }}
                                        </h2>
                                        <p class="text-brand-secondary fs-14 font-copperplate mb-2">
                                            {{ $proj['tagline'] }}
                                        </p>

                                        <div class="d-flex align-items-center gap-2 text-white-50 fs-13 mb-4">
                                            <i class="fa-solid fa-location-dot text-brand-secondary"></i>
                                            <span>{{ $proj['location'] }}</span>
                                        </div>

                                        <!-- 4 Stat Tiles with Relevant Scannable Icons (Change 2 & 8) -->
                                        <div class="row g-2 g-md-3 mb-4">
                                            <div class="col-6 col-md-3">
                                                <div class="stat-tile">
                                                    <i class="fa-solid fa-ruler-combined stat-tile-icon"></i>
                                                    <div class="stat-tile-val">{{ $proj['total_extent'] }}</div>
                                                    <div class="stat-tile-label">Total Extent</div>
                                                    <div class="stat-tile-sub">{{ $proj['total_extent_sub'] }}</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <div class="stat-tile">
                                                    <i class="fa-solid fa-building-user stat-tile-icon"></i>
                                                    <div class="stat-tile-val">{{ $proj['total_units'] }}</div>
                                                    <div class="stat-tile-label">Plotted Units</div>
                                                    <div class="stat-tile-sub">{{ $proj['total_units_sub'] }}</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <div class="stat-tile">
                                                    <i class="fa-solid fa-road stat-tile-icon"></i>
                                                    <div class="stat-tile-val">{!! $proj['road_widths'] !!}</div>
                                                    <div class="stat-tile-label">CC Road Width</div>
                                                    <div class="stat-tile-sub">{{ $proj['road_widths_sub'] }}</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <div class="stat-tile">
                                                    <i class="fa-solid fa-compass stat-tile-icon"></i>
                                                    <div class="stat-tile-val">{{ $proj['vaastu'] }}</div>
                                                    <div class="stat-tile-label">Vaastu Compliance</div>
                                                    <div class="stat-tile-sub">{{ $proj['vaastu_sub'] }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Key Venture Highlights: 2-Column Checklist (Change 3) -->
                                        <div class="mb-4">
                                            <div class="text-white-50 fs-11 font-copperplate text-uppercase mb-2">Key Venture Highlights:</div>
                                            <ul class="list-unstyled mb-0 row g-2">
                                                @foreach($proj['highlights'] as $highlight)
                                                    <li class="col-12 col-md-6 d-flex align-items-start gap-2 fs-13 text-light">
                                                        <i class="fa-solid fa-circle-check text-brand-secondary mt-1 flex-shrink-0"></i>
                                                        <span>{{ $highlight }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <!-- Action Buttons & Document Links -->
                                        <div class="d-flex flex-wrap align-items-center gap-3 pt-3 border-top border-white-10">
                                            @if($proj['status_badge'] === 'Ongoing')
                                                <a href="{{ route('plots.index') }}" class="btn-main">
                                                    <span>View Available Plots &rarr;</span>
                                                </a>
                                                <a href="{{ route('contact') }}" class="btn-secondary-brand">
                                                    <span>Schedule Site Visit</span>
                                                </a>
                                                @if(!empty($proj['docs']['layout']))
                                                    <a href="{{ $proj['docs']['layout'] }}" target="_blank" class="btn btn-sm text-brand-secondary border border-white-10 px-3 py-2 rounded-3 text-decoration-none hover-scale-btn">
                                                        <i class="fa-solid fa-file-pdf me-1"></i> Layout Blueprint (PDF)
                                                    </a>
                                                @endif
                                            @elseif($proj['status_badge'] === 'Delivered')
                                                <span class="btn btn-sm btn-outline-light disabled px-3 py-2 rounded-3">
                                                    <i class="fa-solid fa-circle-check text-brand-secondary me-1"></i> Delivered &amp; Handed Over
                                                </span>
                                                <a href="{{ route('contact') }}" class="btn-secondary-brand">
                                                    <span>Enquire / Future Phases &rarr;</span>
                                                </a>
                                                @if(!empty($proj['docs']['brochure']))
                                                    <a href="{{ $proj['docs']['brochure'] }}" target="_blank" class="btn btn-sm text-brand-secondary border border-white-10 px-3 py-2 rounded-3 text-decoration-none hover-scale-btn">
                                                        <i class="fa-solid fa-file-pdf me-1"></i> Project Brochure
                                                    </a>
                                                @endif
                                            @else
                                                <a href="{{ route('contact') }}" class="btn-main">
                                                    <span>Register Pre-Launch Interest &rarr;</span>
                                                </a>
                                                <a href="{{ route('contact') }}" class="btn-secondary-brand">
                                                    <span>Request Brochure</span>
                                                </a>
                                            @endif
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    <!-- Client Filter JS & Smooth Anchor Scrolling -->
    @push('scripts')
    <script>
        function filterProjects(category, btnElement) {
            // Update button styles
            const buttons = document.querySelectorAll('#projectFilterButtons button');
            buttons.forEach(btn => {
                btn.style.background = 'rgba(255,255,255,0.06)';
                btn.style.color = 'rgba(255,255,255,0.6)';
                btn.style.border = '1px solid rgba(255,255,255,0.1)';
            });
            btnElement.style.background = 'var(--secondary-color)';
            btnElement.style.color = '#ffffff';
            btnElement.style.border = 'none';

            // Filter detailed project cards
            const detailItems = document.querySelectorAll('.project-card-item');
            detailItems.forEach(item => {
                const cats = item.getAttribute('data-category') || '';
                if (category === 'all' || cats.includes(category)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>
    @endpush

@endsection
