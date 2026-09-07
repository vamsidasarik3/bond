@extends('layouts.app')

@section('title', 'Real Estate Developers in Hyderabad — Navagruha Infra Developers')
@section('meta_description', 'Navagruha Infra Developers is one of the trusted real estate developers in Hyderabad. As a leading real estate company in Hyderabad and plot developers in Hyderabad, we build HMDA and TSRERA approved communities.')
@section('meta_keywords', 'Real Estate Developers in Hyderabad, Property Developers in Hyderabad, Real Estate Company in Hyderabad, Plot Developers in Hyderabad')
@section('canonical_url', route('about'))

@section('structured_data')
<script type="application/ld+json">
{
  "{{ '@' }}context": "https://schema.org",
  "{{ '@' }}type": "AboutPage",
  "name": "About Us — Real Estate Developers in Hyderabad",
  "description": "Navagruha Infra Developers is one of the trusted real estate developers in Hyderabad. As a leading real estate company in Hyderabad and plot developers in Hyderabad, we build HMDA and TSRERA approved communities.",
  "url": "{{ route('about') }}",
  "mainEntity": {
    "{{ '@' }}type": "Organization",
    "name": "Navagruha Infra Developers",
    "url": "{{ route('home') }}",
    "logo": "{{ asset('images/navagruha-logo-white.png') }}"
  }
}
</script>
@endsection

@push('styles')
<style>
/* =========================================================
   ABOUT PAGE — BRAND DARK REAL ESTATE SYSTEM
   ========================================================= */
:root {
    --ng-gold:     #d6c08a;
    --ng-gold-dark:#b39352;
    --ng-green:    #71b644;
    --ng-green-glow:rgba(113, 182, 68, 0.25);
    --ng-navy-deep:#0d1721;
    --ng-navy:     #142533;
    --ng-navy-card:#1a3042;
    --ng-navy-light:#234159;
    --ng-border:   rgba(255, 255, 255, 0.08);
    --ng-border-gold: rgba(214, 192, 138, 0.3);
    --ng-text-white:#ffffff;
    --ng-text-muted:rgba(255, 255, 255, 0.65);
}

/* ── 1. Hero Section ── */
.ng-hero {
    position: relative;
    width: 100%;
    min-height: 80vh;
    overflow: hidden;
    display: flex;
    align-items: center;
    padding-top: 130px;
    padding-bottom: 90px;
    background-color: var(--ng-navy-deep);
}
.ng-hero__bg {
    position: absolute;
    inset: -5%;
    background: url('{{ asset("images/lay_Out_new.png") }}') center/cover no-repeat;
    transform: translateY(0);
    will-change: transform;
    opacity: 0.32;
    filter: brightness(0.85) contrast(1.1);
}
.ng-hero__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(13, 23, 33, 0.96) 0%, rgba(20, 37, 51, 0.90) 50%, rgba(35, 65, 89, 0.94) 100%);
}
.ng-hero__content {
    position: relative;
    z-index: 3;
    width: 100%;
}
.ng-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: var(--font-heading);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--ng-gold);
    margin-bottom: 18px;
}
.ng-eyebrow::before {
    content: '';
    display: inline-block;
    width: 24px;
    height: 1px;
    background: var(--ng-gold);
}
.ng-hero__h1 {
    font-family: var(--font-heading);
    font-size: clamp(34px, 5vw, 62px);
    font-weight: 800;
    line-height: 1.1;
    color: #ffffff;
    letter-spacing: -0.01em;
    margin-bottom: 22px;
}
.ng-hero__h1 em {
    font-style: normal;
    color: var(--ng-gold);
}
.ng-hero__sub {
    font-family: var(--font-sans);
    font-size: clamp(14px, 1.4vw, 16px);
    line-height: 1.75;
    color: var(--ng-text-muted);
    max-width: 680px;
    margin-bottom: 36px;
}
.ng-hero__cta-arrow {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 34px;
    height: 34px;
    border: 1px solid rgba(255, 255, 255, 0.25);
    border-radius: 50%;
    font-size: 11px;
    color: #ffffff;
    transition: all 0.3s ease;
}
.ng-hero__cta:hover .ng-hero__cta-arrow {
    border-color: var(--ng-gold);
    background: var(--ng-gold);
    color: var(--ng-navy-deep);
    transform: translateY(2px);
}

/* ── 2. Identity / Who We Are (Dark Theme) ── */
.ng-identity-section {
    background: var(--ng-navy-deep);
    padding: 100px 0;
    border-bottom: 1px solid var(--ng-border);
    position: relative;
}
.ng-identity__img-box {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid var(--ng-border);
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.5);
}
.ng-identity__img {
    width: 100%;
    height: 440px;
    object-fit: cover;
    display: block;
    transition: transform 0.6s ease;
}
.ng-identity__img-box:hover .ng-identity__img {
    transform: scale(1.04);
}
.ng-identity__img-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(13, 23, 33, 0.7) 0%, transparent 60%);
}

/* ── 3. Leadership & Founder Section ── */
.ng-leadership-section {
    background: var(--ng-navy);
    padding: 100px 0;
    border-bottom: 1px solid var(--ng-border);
}
.ng-leader-card {
    background: var(--ng-navy-card);
    border: 1px solid var(--ng-border);
    border-radius: 20px;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 14px 36px rgba(0, 0, 0, 0.35);
    transition: all 0.3s ease;
}
.ng-leader-card:hover {
    transform: translateY(-5px);
    border-color: rgba(214, 192, 138, 0.4);
    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.45);
}
.ng-leader-img-wrap {
    height: 320px;
    position: relative;
    overflow: hidden;
    background: #09131a;
}
.ng-leader-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
    transition: transform 0.5s ease;
}
.ng-leader-card:hover .ng-leader-img {
    transform: scale(1.05);
}
.ng-leader-body {
    padding: 28px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
.ng-leader-name {
    font-family: var(--font-heading);
    font-size: 22px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 4px;
}
.ng-leader-role {
    font-family: var(--font-heading);
    font-size: 13px;
    font-weight: 700;
    color: var(--ng-green);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    margin-bottom: 14px;
}
.ng-leader-bio {
    font-size: 13.5px;
    line-height: 1.7;
    color: var(--ng-text-muted);
    margin-bottom: 12px;
}

/* ── 4. What Guides Us (Enhanced Green Icons) ── */
.ng-values-section {
    background: var(--ng-navy-deep);
    padding: 100px 0;
    border-bottom: 1px solid var(--ng-border);
}
.ng-value-card {
    background: var(--ng-navy-card);
    border: 1px solid var(--ng-border);
    border-radius: 16px;
    padding: 36px 30px;
    height: 100%;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}
.ng-value-card:hover {
    transform: translateY(-4px);
    border-color: rgba(113, 182, 68, 0.4);
    box-shadow: 0 16px 36px rgba(0, 0, 0, 0.4);
}
.ng-value-card__icon {
    width: 58px;
    height: 58px;
    border-radius: 14px;
    background: rgba(113, 182, 68, 0.18);
    border: 1.5px solid rgba(113, 182, 68, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 16px var(--ng-green-glow);
    margin-bottom: 22px;
}
.ng-value-card__icon i {
    color: #86efac;
    font-size: 24px;
}
.ng-value-card__num {
    position: absolute;
    top: 24px;
    right: 28px;
    font-family: var(--font-heading);
    font-size: 32px;
    font-weight: 800;
    color: rgba(255, 255, 255, 0.12);
}
.ng-value-card__title {
    font-family: var(--font-heading);
    font-size: 18px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 12px;
}
.ng-value-card__desc {
    font-size: 13.5px;
    line-height: 1.7;
    color: var(--ng-text-muted);
    margin-bottom: 0;
}

/* ── 5. Final CTA ── */
.ng-cta-section {
    background: linear-gradient(135deg, #0d1721 0%, #142533 100%);
    padding: 100px 0;
    position: relative;
    overflow: hidden;
}
.ng-cta-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at center, rgba(113, 182, 68, 0.08) 0%, transparent 70%);
}
</style>
@endpush

@section('content')

{{-- ============================================================
     1. HERO SECTION (ABOUT US)
     ============================================================ --}}
<section class="ng-hero" id="about-top" aria-label="About us">
    <div class="ng-hero__bg" id="ng-parallax-bg"></div>
    <div class="ng-hero__overlay"></div>

    <div class="ng-hero__content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-xl-7">
                    <div class="ng-eyebrow">
                        About us
                    </div>
                    <h1 class="ng-hero__h1">
                        Building Trust<br>
                        <em>Creating Values</em>
                    </h1>
                    <p class="ng-hero__sub">
                        At Navagruha, we believe land is more than an investment - it is the foundation of future opportunities. As a Hyderabad-based real estate developer, we craft thoughtfully planned residential plotted communities in strategically selected growth corridors. Backed by clear legal approvals, transparent processes, and a vision for sustainable development, we empower families and investors with secure, high-potential real estate opportunities that stand the test of time.
                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <a href="#identity" class="btn-main px-4 py-2.5 font-copperplate fs-12 text-decoration-none">
                            <span>Explore Our Approach &rarr;</span>
                        </a>
                        <a href="#identity" class="ng-hero__cta-arrow" aria-label="Scroll down">
                            <i class="fa-solid fa-arrow-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ============================================================
     2. WHO WE ARE
     ============================================================ --}}
<section class="ng-identity-section" id="identity" aria-label="Who we are">
    <div class="container">
        <div class="row g-5 align-items-center">

            {{-- Image Right --}}
            <div class="col-lg-5 order-lg-2">
                <div class="ng-identity__img-box">
                    <img
                        src="{{ asset('images/Web_006.png') }}"
                        alt="Navagruha Infra Developers — residential development avenue"
                        class="ng-identity__img"
                        loading="lazy"
                    >
                    <div class="ng-identity__img-overlay"></div>
                </div>
            </div>

            {{-- Text Left --}}
            <div class="col-lg-7 order-lg-1">
                <div class="ng-eyebrow">
                    Who we are -
                </div>
                <h2 class="fs-36 text-white font-copperplate mb-3 lh-1-2">
                    Every Investment Begins with Confidence
                </h2>

                <p class="text-white-50 fs-15 leading-relaxed mb-3">
                    At Navagruha Infra Developers, we believe that a residential plot is more than just a piece of land - it is the foundation for your future, your family’s aspirations, and long-term financial growth. As a trusted real estate developer in Hyderabad, we are committed to creating premium plotted developments and well-planned gated communities in high-potential growth corridors with strong infrastructure, connectivity, and investment prospects.
                </p>
                <p class="text-white-50 fs-15 leading-relaxed mb-3">
                    Our projects are developed in strategically selected locations that offer excellent accessibility, future appreciation potential, and a balanced lifestyle. Guided by HMDA planning standards and TSRERA compliance, we ensure every development meets the highest standards of quality, transparency, and legal integrity.
                </p>
                <p class="text-white-50 fs-15 leading-relaxed mb-0">
                    With clear land titles, transparent documentation, customer-centric service, and dedicated support at every stage, we provide homebuyers and investors with a secure, hassle-free, and rewarding real estate investment experience. At Navagruha, we don't just develop plots - we create opportunities for sustainable growth, lasting value, and a brighter future.
                </p>
            </div>

        </div>
    </div>
</section>


{{-- ============================================================
     3. LEADERSHIP
     ============================================================ --}}
<section class="ng-leadership-section" id="leadership" aria-label="Leader Ship">
    <div class="container">
        
        <div class="text-center max-w-700 mx-auto mb-5 pb-3">
            <h2 class="fs-36 text-white font-copperplate mb-2">
                Leader Ship
            </h2>
            <div class="text-brand-secondary font-copperplate fs-14">
                --- Driven by Vision, Built on Trust ---
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            
            @foreach($leadership as $index => $person)
                <div class="col-lg-6 col-12">
                    <div class="ng-leader-card">
                        
                        <div class="row g-0 h-100">
                            
                            {{-- Photo Column --}}
                            <div class="col-md-5">
                                <div class="ng-leader-img-wrap h-100">
                                    <img
                                        src="{{ asset($person['photo']) }}"
                                        alt="{{ $person['name'] }} — {{ $person['title'] }}"
                                        class="ng-leader-img"
                                        loading="lazy"
                                        onerror="this.style.display='none';"
                                    >
                                </div>
                            </div>

                            {{-- Bio Column --}}
                            <div class="col-md-7">
                                <div class="ng-leader-body">
                                    <h3 class="ng-leader-name">{{ $person['name'] }}</h3>
                                    <div class="ng-leader-role">{{ $person['title'] }}</div>

                                    @foreach($person['paragraphs'] as $p)
                                        <p class="ng-leader-bio">
                                            {{ $p }}
                                        </p>
                                    @endforeach

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>


{{-- ============================================================
     4. THE PRINCIPLES THAT DEFINE US
     ============================================================ --}}
<section class="ng-values-section" id="values" aria-label="The Principles That Define Us">
    <div class="container">

        <div class="text-center max-w-700 mx-auto mb-5">
            <h2 class="fs-36 text-white font-copperplate mb-3">The Principles That Define Us</h2>
            <p class="text-white-50 fs-15 mb-0">
                At Navagruha Infra Developers, our values are more than guiding ideals—they are the foundation of every decision we make. From project planning and execution to customer engagement and post-sale support, these principles shape the way we operate and deliver lasting value.
            </p>
        </div>

        <div class="row g-4">
            @php
                $icons = ['fa-scale-balanced', 'fa-map-location-dot', 'fa-city'];
            @endphp
            @foreach($coreValues as $vi => $value)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="ng-value-card">
                        <div class="ng-value-card__num">{{ $value['number'] }}</div>
                        <div class="ng-value-card__icon">
                            <i class="fa-solid {{ $icons[$vi % count($icons)] }}"></i>
                        </div>
                        <h3 class="ng-value-card__title">{{ $value['number'] }} {{ $value['title'] }}</h3>
                        <p class="ng-value-card__desc">{{ $value['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>


{{-- ============================================================
     5. FINAL CTA
     ============================================================ --}}
<section class="ng-cta-section" id="about-cta" aria-label="Schedule a Site Visit">
    <div class="container position-relative z-2 text-center max-w-2xl mx-auto">
        <h2 class="fs-36 text-white font-copperplate mb-3">
            Schedule a Guided Site Visit
        </h2>
        <p class="text-white-50 fs-15 leading-relaxed mb-4">
            A site visit is the best way to understand the true value of a real estate investment. We invite you to experience the project firsthand, explore the surrounding growth corridor, inspect individual plot locations, and review all project details before making your decision.
        </p>

        <div class="d-flex flex-wrap justify-content-center align-items-center gap-3 mb-3">
            <a href="{{ route('contact') }}" class="btn-primary-brand text-decoration-none px-4 py-3 font-copperplate fs-13">
                <span><i class="fa-regular fa-calendar-check me-1"></i> Schedule a Site Visit &rarr;</span>
            </a>
            <a href="{{ route('projects') }}" class="btn-secondary-brand text-decoration-none px-4 py-3 font-copperplate fs-13">
                <span><i class="fa-solid fa-layer-group me-1"></i> View Residential Projects</span>
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
(function () {
    'use strict';
    const heroBg = document.getElementById('ng-parallax-bg');
    if (heroBg) {
        window.addEventListener('scroll', function () {
            const y = window.scrollY;
            heroBg.style.transform = 'translateY(' + (y * 0.22) + 'px)';
        }, { passive: true });
    }
})();
</script>
@endpush
