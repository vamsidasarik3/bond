@extends('layouts.app')

@section('title', 'Amenities and Infrastructure, Navagruha Infra Developers, AIIMS Bibinagar')
@section('meta_description', 'Explore planned infrastructure at RRR Prekshitha Enclave near AIIMS Bibinagar, including concrete roads, landscaped parks, underground drainage, and round-the-clock security.')

@section('content')

    <!-- Hero / Breadcrumb Banner -->
    <section class="section-dark text-light relative overflow-hidden py-5 border-bottom border-white-10" style="background: #142533;">
        <div class="container relative z-2">
            <div class="row g-4 justify-content-between align-items-center">
                <div class="col-md-8">
                    <div class="subtitle text-brand-secondary font-copperplate mb-2">
                        <i class="fa-solid fa-tree me-1"></i> Infrastructure and Amenities
                    </div>
                    <h1 class="fs-48 text-white font-copperplate lh-1-1 mb-2">
                        Venture Amenities &amp; Facilities
                    </h1>
                    <p class="text-white-50 fs-16 mb-0">
                        Planned infrastructure designed for comfortable everyday living, green open spaces, and long-term convenience.
                    </p>
                </div>
                <div class="col-md-4 text-md-end">
                    <ul class="crumb text-light font-copperplate fs-12 list-inline mb-0">
                        <li class="list-inline-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a> &nbsp;/</li>
                        <li class="list-inline-item active text-brand-secondary">Amenities</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Amenities Grid Section -->
    <section class="bg-brand-dark text-light py-80">
        <div class="container">
            
            @foreach($amenityCategories as $categoryName => $amenities)
                <div class="mb-5">
                    <div class="subtitle text-brand-secondary font-copperplate mb-1">Infrastructure Focus</div>
                    <h2 class="fs-28 text-white font-copperplate mb-4 pb-2 border-bottom border-white-10">
                        {{ $categoryName }}
                    </h2>

                    <div class="row g-4">
                        @foreach($amenities as $amenity)
                            <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                <div class="amenity-feature-card">
                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <div class="rounded-circle bg-brand-primary p-3 d-flex align-items-center justify-content-center text-brand-secondary" style="width: 52px; height: 52px; flex-shrink: 0; border: 1px solid rgba(113, 182, 68, 0.3);">
                                            <i class="fa-solid {{ $amenity['icon'] }} fs-22"></i>
                                        </div>
                                        <h4 class="fs-18 text-white font-copperplate mb-0">{{ $amenity['title'] }}</h4>
                                    </div>
                                    <p class="text-white-50 fs-13 mb-0">
                                        {{ $amenity['desc'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <!-- Visual Showcase Gallery with 3D Renders -->
            <div class="mt-80">
                <div class="subtitle text-brand-secondary font-copperplate mb-1">Visual Preview</div>
                <h3 class="fs-32 text-white font-copperplate mb-4">Architectural Renders &amp; Infrastructure</h3>

                <div class="row g-4">
                    <div class="col-md-4 col-12">
                        <div class="gallery-showcase-item">
                            <img src="{{ asset('images/projects/rrr-prekshitha/entrance-arch-grand.webp') }}" alt="Grand Entrance Arch">
                            <div class="gallery-showcase-overlay"></div>
                            <div class="gallery-showcase-content">
                                <div class="gallery-showcase-subtitle">Venture Entrance</div>
                                <h4 class="gallery-showcase-title fs-18">Grand Entrance Arch &amp; Security</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="gallery-showcase-item">
                            <img src="{{ asset('images/projects/rrr-prekshitha/concrete-boulevard-40ft.webp') }}" alt="Heavy-Duty CC Roads">
                            <div class="gallery-showcase-overlay"></div>
                            <div class="gallery-showcase-content">
                                <div class="gallery-showcase-subtitle">Heavy-Duty Roads</div>
                                <h4 class="gallery-showcase-title fs-18">40' &amp; 30' M-25 Concrete Roads</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="gallery-showcase-item">
                            <img src="{{ asset('images/projects/rrr-prekshitha/avenue-plantation-walkway.webp') }}" alt="Thematic Parks">
                            <div class="gallery-showcase-overlay"></div>
                            <div class="gallery-showcase-content">
                                <div class="gallery-showcase-subtitle">Greenery &amp; Parks</div>
                                <h4 class="gallery-showcase-title fs-18">3 Landscaped Theme Parks</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="gallery-showcase-item">
                            <img src="{{ asset('images/projects/rrr-prekshitha/overhead-water-tank.webp') }}" alt="Overhead Water Tank">
                            <div class="gallery-showcase-overlay"></div>
                            <div class="gallery-showcase-content">
                                <div class="gallery-showcase-subtitle">Water Supply</div>
                                <h4 class="gallery-showcase-title fs-18">Overhead Water Storage Tank</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="gallery-showcase-item">
                            <img src="{{ asset('images/projects/rrr-prekshitha/internal-curbstone-avenue.webp') }}" alt="Pedestrian Walkways">
                            <div class="gallery-showcase-overlay"></div>
                            <div class="gallery-showcase-content">
                                <div class="gallery-showcase-subtitle">Avenue Plantation</div>
                                <h4 class="gallery-showcase-title fs-18">Pedestrian Walkways &amp; Greenery</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="gallery-showcase-item">
                            <img src="{{ asset('images/projects/rrr-prekshitha/master-layout-aerial.webp') }}" alt="Master Layout">
                            <div class="gallery-showcase-overlay"></div>
                            <div class="gallery-showcase-content">
                                <div class="gallery-showcase-subtitle">HMDA Final Sanction</div>
                                <h4 class="gallery-showcase-title fs-18">17-Acre Master Planned Layout</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Callout -->
            <div class="mt-80 p-4 p-md-5 rounded-4 bg-brand-card border border-white-10 text-center">
                <div class="subtitle text-brand-secondary mb-1">Ready for Site Inspection?</div>
                <h3 class="fs-32 text-white font-copperplate mb-3">Experience Our Amenities in Person</h3>
                <p class="text-white-50 fs-15 max-w-700 mx-auto mb-4">
                    Book a free guided venture visit with complimentary AC cab pick-up from Uppal Metro or Ghatkesar ORR Exit 9.
                </p>
                <div class="d-flex justify-content-center flex-wrap gap-3">
                    <a href="{{ route('contact') }}" class="btn-main">
                        <span>Schedule Free Site Tour &rarr;</span>
                    </a>
                    <a href="{{ route('plots.index') }}" class="btn-secondary-brand">
                        <span>View Available Plots</span>
                    </a>
                </div>
            </div>

        </div>
    </section>

@endsection
