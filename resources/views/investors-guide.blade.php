@extends('layouts.app')

@section('title', 'Investor\'s Growth Guide & ROI Analysis — Navagruha Prekshitha Enclave | AIIMS Bibinagar')
@section('meta_description', 'Official investor analysis for Navagruha Prekshitha Enclave near AIIMS Bibinagar. HMDA Final Sanction (LP No. 062715/2024), RERA Certified, 100% Spot Registration, and 25%+ YoY Capital Appreciation.')

@section('content')

    <!-- Hero / Breadcrumb Banner with Real Landmark Background -->
    <section class="section-dark text-light relative overflow-hidden py-5 border-bottom border-white-10 bg-brand-pattern" style="background: linear-gradient(135deg, rgba(14, 26, 36, 0.93) 0%, rgba(20, 37, 51, 0.85) 50%, rgba(35, 65, 89, 0.90) 100%), url('{{ asset('venture/landmarks/Aiims Bibinagar.jpg') }}') center/cover no-repeat;">
        <div class="wm-hero-watermark" style="opacity: 0.05;">INVESTMENT</div>
        <div class="container relative z-2">
            <div class="row g-4 justify-content-between align-items-center">
                <div class="col-md-8">
                    <div class="subtitle text-brand-secondary font-copperplate mb-2">
                        <i class="fa-solid fa-chart-line me-1"></i> Strategic Real Estate Wealth Building
                    </div>
                    <h1 class="fs-48 text-white font-copperplate lh-1-1 mb-2">
                        Investor's Growth Guide
                    </h1>
                    <p class="text-white-50 fs-16 mb-0">
                        Why the AIIMS Bibinagar &amp; NH-163 Eastern Growth Corridor offers unprecedented legal security, rental yields, and compounding capital appreciation.
                    </p>
                </div>
                <div class="col-md-4 text-md-end">
                    <ul class="crumb text-light font-copperplate fs-12 list-inline mb-0">
                        <li class="list-inline-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a> &nbsp;/</li>
                        <li class="list-inline-item active text-brand-secondary">Investor's Guide</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Investor Section -->
    <section class="bg-brand-dark text-light py-80">
        <div class="container">

            <!-- Official Legal & Sanction Summary Card -->
            <div class="p-4 p-md-5 rounded-4 bg-brand-card border border-white-10 mb-5 shadow-xl">
                <div class="row g-4 align-items-center justify-content-between">
                    <div class="col-lg-8">
                        <span class="status-available mb-2">
                            <i class="fa-solid fa-shield-halved me-1"></i> Verified Legal Dossier
                        </span>
                        <h2 class="fs-28 text-white font-copperplate mt-2 mb-2">
                            {{ $ventureLegal['project_name'] }}
                        </h2>
                        <p class="text-white-50 fs-14 mb-3">
                            Developed by <strong>{{ $ventureLegal['developer'] }}</strong> in strict compliance with Telangana Town &amp; Country Planning regulations.
                        </p>

                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="p-3 rounded-3 bg-brand-primary border border-white-10">
                                    <div class="text-white-50 fs-11 font-copperplate">HMDA FINAL LP FILE NO.</div>
                                    <div class="text-white fs-13 fw-bold mt-1 font-monospace">{{ $ventureLegal['hmda_file_no'] }}</div>
                                    <div class="text-brand-secondary fs-11 mt-0.5">Approved: {{ $ventureLegal['hmda_approval_date'] }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-3 rounded-3 bg-brand-primary border border-white-10">
                                    <div class="text-white-50 fs-11 font-copperplate">SURVEY NUMBERS &amp; MANDAL</div>
                                    <div class="text-white fs-13 fw-bold mt-1">{{ $ventureLegal['survey_numbers'] }}</div>
                                    <div class="text-brand-secondary fs-11 mt-0.5">{{ $ventureLegal['location'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="p-4 rounded-4 bg-dark bg-opacity-75 border border-white-10 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-brand-primary p-3 mb-3" style="width: 60px; height: 60px; border: 1.5px solid rgba(113, 182, 68, 0.4);">
                                <i class="fa-solid fa-stamp text-brand-secondary fs-24"></i>
                            </div>
                            <div class="fs-16 font-copperplate text-white fw-bold mb-1">
                                100% Spot Registration
                            </div>
                            <p class="text-white-50 fs-12 mb-0">
                                Direct registered deed execution at the Bibinagar Sub-Registrar Office with immediate revenue mutation.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- 6 Key ROI Growth Drivers -->
            <div class="mb-5">
                <div class="subtitle text-brand-secondary font-copperplate mb-1">High Appreciation Fundamentals</div>
                <h2 class="fs-32 text-white font-copperplate mb-4">
                    6 Strategic Growth Catalysts Driving Demand
                </h2>

                <div class="row g-4">
                    @foreach($roiFactors as $factor)
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="p-4 rounded-4 bg-brand-card border border-white-10 h-100 d-flex flex-column justify-content-between hover-scale-btn">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="rounded-circle bg-brand-primary p-3 d-flex align-items-center justify-content-center text-brand-secondary" style="width: 52px; height: 52px; border: 1px solid rgba(113, 182, 68, 0.3);">
                                            <i class="fa-solid {{ $factor['icon'] }} fs-22"></i>
                                        </div>
                                        <span class="status-available fs-11 font-copperplate">
                                            {{ $factor['metric'] }}
                                        </span>
                                    </div>
                                    <h3 class="fs-18 text-white font-copperplate mb-2">{{ $factor['title'] }}</h3>
                                    <p class="text-white-50 fs-13 mb-0 leading-relaxed">
                                        {{ $factor['desc'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Surrounding Infrastructure Landmark Photo Gallery -->
            <div class="mb-5">
                <div class="subtitle text-brand-secondary font-copperplate mb-1">Visual Due Diligence</div>
                <h3 class="fs-28 text-white font-copperplate mb-4">Corridor Infrastructure Milestones</h3>

                <div class="row g-4">
                    <div class="col-md-4 col-12">
                        <div class="gallery-showcase-item">
                            <img src="{{ asset('venture/landmarks/Aiims Bibinagar.jpg') }}" alt="AIIMS Bibinagar Hospital">
                            <div class="gallery-showcase-overlay"></div>
                            <div class="gallery-showcase-content">
                                <h4 class="gallery-showcase-title">AIIMS Bibinagar</h4>
                                <div class="gallery-showcase-subtitle">750-Bed National Institute &bull; 05 Mins</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="gallery-showcase-item">
                            <img src="{{ asset('venture/landmarks/National Highway NH - 163.jpg') }}" alt="NH-163 6-Lane Expressway">
                            <div class="gallery-showcase-overlay"></div>
                            <div class="gallery-showcase-content">
                                <h4 class="gallery-showcase-title">NH-163 6-Lane Corridor</h4>
                                <div class="gallery-showcase-subtitle">Hyderabad &ndash; Warangal Industrial Belt</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="gallery-showcase-item">
                            <img src="{{ asset('venture/landmarks/MMTS BIBINAGAR.jpg') }}" alt="Bibinagar MMTS Railway Station">
                            <div class="gallery-showcase-overlay"></div>
                            <div class="gallery-showcase-content">
                                <h4 class="gallery-showcase-title">MMTS Suburban Hub</h4>
                                <div class="gallery-showcase-subtitle">Rapid Train Link to City Centers &bull; 05 Mins</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Historical Price Appreciation Benchmark Table -->
            <div class="mt-80 p-4 p-md-5 rounded-4 bg-brand-card border border-white-10">
                <div class="row g-4 justify-content-between align-items-center mb-4">
                    <div class="col-lg-8">
                        <div class="subtitle text-brand-secondary mb-1">Proven Track Record</div>
                        <h3 class="fs-32 text-white font-copperplate mb-2">Historical Land Appreciation in AIIMS Corridor</h3>
                        <p class="text-white-50 fs-14 mb-0">
                            Plotted land values in the Bibinagar belt have delivered over 180% cumulative capital appreciation over the past 8 years.
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <span class="status-available fs-13 py-2 px-3">
                            <i class="fa-solid fa-arrow-trend-up me-1"></i> Compounding ROI Belt
                        </span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-dark table-borderless fs-14 align-middle mb-0">
                        <thead>
                            <tr class="border-bottom border-white-10 text-brand-secondary font-copperplate fs-12">
                                <th class="py-3">DEVELOPMENT PHASE</th>
                                <th class="py-3">MARKET RATE RANGE</th>
                                <th class="py-3">INFRASTRUCTURE CATALYST</th>
                                <th class="py-3 text-end">GROWTH STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($historicalAppreciation as $appreciation)
                                <tr class="border-bottom border-white-10">
                                    <td class="py-3 text-white fw-bold font-copperplate">{{ $appreciation['period'] }}</td>
                                    <td class="py-3 text-white font-copperplate">{{ $appreciation['rate_range'] }}</td>
                                    <td class="py-3 text-white-50">{{ $appreciation['catalyst'] }}</td>
                                    <td class="py-3 text-end">
                                        <span class="{{ str_contains($appreciation['growth'], 'Projected') || str_contains($appreciation['growth'], 'Cumulative') || str_contains($appreciation['growth'], 'Appreciation') ? 'status-available' : 'status-reserved' }} fs-11">
                                            {{ $appreciation['growth'] }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Download Official Due Diligence Dossier -->
            <div class="mt-80 p-4 p-md-5 rounded-4 bg-brand-primary border border-white-10">
                <div class="row g-4 align-items-center justify-content-between mb-4">
                    <div class="col-md-8">
                        <div class="subtitle text-brand-secondary font-copperplate mb-1">Verified Documentation</div>
                        <h3 class="fs-28 text-white font-copperplate mb-1">Download Verified Legal Dossier &amp; Master Layout</h3>
                        <p class="text-white-50 fs-14 mb-0">
                            Download the official HMDA Final Sanction LP Order, Telangana RERA Certificate, and high-resolution layout blueprint.
                        </p>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="{{ $ventureDocs['master_layout'] }}" target="_blank" class="p-3 rounded-3 bg-brand-dark border border-white-10 d-flex align-items-center gap-3 text-decoration-none hover-scale-btn">
                            <div class="rounded-circle bg-brand-primary p-2.5 text-brand-secondary d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; border: 1px solid rgba(113, 182, 68, 0.3);">
                                <i class="fa-solid fa-map fs-18"></i>
                            </div>
                            <div>
                                <div class="text-white fs-13 font-copperplate fw-bold">Master Layout Blueprint</div>
                                <div class="text-brand-secondary fs-11">PDF &bull; 9.7 MB Download &rarr;</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="{{ $ventureDocs['hmda_approval'] }}" target="_blank" class="p-3 rounded-3 bg-brand-dark border border-white-10 d-flex align-items-center gap-3 text-decoration-none hover-scale-btn">
                            <div class="rounded-circle bg-brand-primary p-2.5 text-brand-secondary d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; border: 1px solid rgba(113, 182, 68, 0.3);">
                                <i class="fa-solid fa-certificate fs-18"></i>
                            </div>
                            <div>
                                <div class="text-white fs-13 font-copperplate fw-bold">HMDA Final Approval</div>
                                <div class="text-brand-secondary fs-11">LP Sanction Order &rarr;</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="{{ $ventureDocs['rera_approval'] }}" target="_blank" class="p-3 rounded-3 bg-brand-dark border border-white-10 d-flex align-items-center gap-3 text-decoration-none hover-scale-btn">
                            <div class="rounded-circle bg-brand-primary p-2.5 text-brand-secondary d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; border: 1px solid rgba(113, 182, 68, 0.3);">
                                <i class="fa-solid fa-shield-halved fs-18"></i>
                            </div>
                            <div>
                                <div class="text-white fs-13 font-copperplate fw-bold">TSRERA Certificate</div>
                                <div class="text-brand-secondary fs-11">Verified Registration &rarr;</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="{{ $ventureDocs['pamphlet'] }}" target="_blank" class="p-3 rounded-3 bg-brand-dark border border-white-10 d-flex align-items-center gap-3 text-decoration-none hover-scale-btn">
                            <div class="rounded-circle bg-brand-primary p-2.5 text-brand-secondary d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; border: 1px solid rgba(113, 182, 68, 0.3);">
                                <i class="fa-solid fa-file-lines fs-18"></i>
                            </div>
                            <div>
                                <div class="text-white fs-13 font-copperplate fw-bold">Project Pamphlet</div>
                                <div class="text-brand-secondary fs-11">Quick Summary PDF &rarr;</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Step-by-Step Purchase Roadmap -->
            <div class="mt-80">
                <div class="subtitle text-brand-secondary font-copperplate mb-1">Seamless Transaction</div>
                <h3 class="fs-32 text-white font-copperplate mb-4">5-Step Investment Roadmap</h3>

                <div class="row g-4">
                    @foreach($investmentSteps as $step)
                        <div class="col-lg col-md-6 col-12">
                            <div class="p-4 rounded-4 bg-brand-card border border-white-10 h-100">
                                <div class="fs-28 fw-900 font-copperplate text-brand-secondary mb-2">
                                    {{ $step['step'] }}
                                </div>
                                <h4 class="fs-16 font-copperplate text-white mb-2">{{ $step['title'] }}</h4>
                                <p class="text-white-50 fs-12 mb-0 leading-relaxed">{{ $step['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Investment Advisory CTA -->
            <div class="mt-80 p-4 p-md-5 rounded-4 bg-brand-primary border border-white-10 text-center">
                <div class="subtitle text-brand-secondary mb-1">Expert Real Estate Advisory</div>
                <h3 class="fs-32 text-white font-copperplate mb-3">Speak With Our Venture Portfolio Manager</h3>
                <p class="text-white-50 fs-15 max-w-700 mx-auto mb-4">
                    Get customized plot selection, clear legal documentation dossiers, and hassle-free bank loan approvals directly from the developer.
                </p>
                <div class="d-flex justify-content-center flex-wrap gap-3">
                    <a href="{{ route('contact') }}" class="btn-main">
                        <span>Schedule Private Site Inspection &rarr;</span>
                    </a>
                    <a href="{{ route('plots.index') }}" class="btn-secondary-brand">
                        <span>Explore Plot Inventory</span>
                    </a>
                </div>
            </div>

        </div>
    </section>

@endsection
