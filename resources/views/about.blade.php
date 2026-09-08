@extends('layouts.app')

@section('title', 'Real Estate Developers in Hyderabad: Navagruha Infra Developers')
@section('meta_description', 'Navagruha Infra Developers is one of the trusted real estate developers in Hyderabad. As a leading real estate company in Hyderabad and plot developers in Hyderabad, we build HMDA and TSRERA approved communities.')
@section('meta_keywords', 'Real Estate Developers in Hyderabad, Property Developers in Hyderabad, Real Estate Company in Hyderabad, Plot Developers in Hyderabad')
@section('canonical_url', route('about'))

@section('structured_data')
<script type="application/ld+json">
{
  "{{ '@' }}context": "https://schema.org",
  "{{ '@' }}type": "AboutPage",
  "name": "About Us: Real Estate Developers in Hyderabad",
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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Dancing+Script:wght@600;700&display=swap" rel="stylesheet">
<style>
/* =========================================================
   NAVAGRUHA ABOUT US — PREMIUM CORPORATE SYSTEM
   ========================================================= */
:root {
    --about-navy-deep: #08121a;
    --about-navy-card: #11202c;
    --about-navy-light:#182e3f;
    --about-green:     #71b644;
    --about-green-light:#86efac;
    --about-border:    rgba(255, 255, 255, 0.09);
    --about-text-mute: rgba(255, 255, 255, 0.68);
}

/* ── 1. Hero Section (Balanced 2-Column Corporate Grid) ── */
.ng-about-hero {
    position: relative;
    background-color: var(--about-navy-deep);
    min-height: 88vh;
    display: flex;
    align-items: center;
    padding-top: 140px;
    padding-bottom: 90px;
    overflow: hidden;
    border-bottom: 1px solid var(--about-border);
}
.ng-about-hero__bg-glow {
    position: absolute;
    width: 600px;
    height: 600px;
    top: -100px;
    left: -150px;
    background: radial-gradient(circle, rgba(113, 182, 68, 0.08) 0%, transparent 70%);
    pointer-events: none;
    z-index: 1;
}
.ng-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    font-family: var(--font-heading);
    font-size: 11.5px;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--about-green);
    margin-bottom: 18px;
}
.ng-eyebrow::before {
    content: '';
    display: inline-block;
    width: 28px;
    height: 1.5px;
    background: var(--about-green);
}
.ng-about-hero__h1 {
    font-family: var(--font-heading);
    font-size: clamp(34px, 4.4vw, 56px);
    font-weight: 800;
    line-height: 1.14;
    color: #ffffff;
    letter-spacing: -0.01em;
    text-transform: uppercase;
    margin-bottom: 22px;
}
.ng-about-hero__h1 span {
    color: var(--about-green);
}
.ng-about-hero__lead {
    font-size: 15.5px;
    line-height: 1.76;
    color: var(--about-text-mute);
    max-width: 560px;
    margin-bottom: 36px;
}
.ng-btn-video {
    display: inline-flex;
    align-items: center;
    gap: 14px;
    background: transparent;
    border: none;
    padding: 6px 12px;
    color: #ffffff;
    cursor: pointer;
    text-align: left;
    transition: all 0.3s ease;
}
.ng-btn-video:hover .ng-btn-video-icon {
    background: var(--about-green);
    border-color: var(--about-green);
    color: #08121a;
    transform: scale(1.08);
}
.ng-btn-video-icon {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    border: 1.5px solid rgba(255, 255, 255, 0.28);
    background: rgba(255, 255, 255, 0.04);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-size: 13px;
    transition: all 0.3s ease;
    flex-shrink: 0;
}
.ng-btn-video-text {
    display: flex;
    flex-direction: column;
}
.ng-btn-video-title {
    font-family: var(--font-heading);
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: #ffffff;
    line-height: 1.3;
}
.ng-btn-video-sub {
    font-size: 11px;
    color: rgba(255, 255, 255, 0.5);
}
.ng-about-hero__visual-wrap {
    position: relative;
    border-radius: 22px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.12);
    box-shadow: 0 24px 60px rgba(0, 0, 0, 0.55);
    background: #0d1a24;
}
.ng-about-hero__visual-img {
    width: 100%;
    height: 460px;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: transform 0.6s ease;
}
.ng-about-hero__visual-wrap:hover .ng-about-hero__visual-img {
    transform: scale(1.03);
}
.ng-about-hero__visual-gradient {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(8, 18, 26, 0.4) 0%, transparent 60%);
    pointer-events: none;
}

/* ── 2. Who We Are Section ── */
.ng-identity-section {
    background: var(--about-navy-deep);
    padding: 100px 0;
    border-bottom: 1px solid var(--about-border);
    position: relative;
}
.ng-identity-card {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid var(--about-border);
    box-shadow: 0 18px 45px rgba(0, 0, 0, 0.5);
    background: #09131a;
    height: 100%;
    min-height: 440px;
}
.ng-identity-card-img {
    width: 100%;
    height: 100%;
    min-height: 440px;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: transform 0.6s ease;
}
.ng-identity-card:hover .ng-identity-card-img {
    transform: scale(1.04);
}
.ng-identity-card-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 34px 28px;
    background: linear-gradient(to top, rgba(8, 18, 26, 0.96) 0%, rgba(8, 18, 26, 0.78) 60%, transparent 100%);
    z-index: 2;
}
.ng-identity-quote-mark {
    line-height: 1;
}
.ng-identity-quote-text {
    font-family: var(--font-heading);
    font-size: 19px;
    font-weight: 700;
    color: #ffffff;
    line-height: 1.35;
    margin-bottom: 14px;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.8);
    letter-spacing: 0.02em;
    text-transform: uppercase;
}
.ng-identity-quote-bar {
    width: 46px;
    height: 2.5px;
    background: var(--about-green);
    border-radius: 2px;
}

/* ── 3. Leadership Section (Equal Height, True Photo Framing) ── */
.ng-leadership-section {
    background: #060e15;
    padding: 110px 0;
    border-bottom: 1px solid var(--about-border);
}
.ng-leader-card {
    background: var(--about-navy-card);
    border: 1px solid var(--about-border);
    border-radius: 20px;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 18px 45px rgba(0, 0, 0, 0.4);
    transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
}
.ng-leader-card:hover {
    transform: translateY(-5px);
    border-color: rgba(113, 182, 68, 0.35);
    box-shadow: 0 24px 55px rgba(0, 0, 0, 0.55);
}
.ng-leader-grid {
    display: grid;
    grid-template-columns: 44% 56%;
    height: 100%;
}
.ng-leader-photo-col {
    position: relative;
    height: 100%;
    min-height: 410px;
    background: #0a151e;
    overflow: hidden;
}
.ng-leader-photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    display: block;
    transition: transform 0.6s ease;
}
.ng-leader-card:hover .ng-leader-photo {
    transform: scale(1.03);
}
.ng-leader-info-col {
    padding: 34px 30px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
}
.ng-leader-name {
    font-family: var(--font-heading);
    font-size: 20px;
    font-weight: 800;
    color: #ffffff;
    letter-spacing: 0.02em;
    margin-bottom: 6px;
    line-height: 1.25;
    text-transform: uppercase;
}
.ng-leader-role {
    font-family: var(--font-heading);
    font-size: 11px;
    font-weight: 700;
    color: var(--about-green);
    text-transform: uppercase;
    letter-spacing: 0.12em;
    margin-bottom: 18px;
    line-height: 1.3;
}
.ng-leader-bio-wrap {
    flex-grow: 1;
}
.ng-leader-bio {
    font-size: 13.2px;
    line-height: 1.72;
    color: var(--about-text-mute);
    margin-bottom: 12px;
}
.ng-leader-quote-box {
    margin-top: 18px;
    padding: 14px 16px;
    background: rgba(255, 255, 255, 0.03);
    border-left: 2px solid var(--about-green);
    border-radius: 0 10px 10px 0;
    display: flex;
    gap: 8px;
}
.ng-leader-quote-mark {
    font-family: var(--font-heading);
    font-size: 22px;
    color: var(--about-green);
    line-height: 1;
    flex-shrink: 0;
}
.ng-leader-quote-text {
    font-size: 12.5px;
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.88);
    font-style: italic;
    margin-bottom: 0;
}

/* ── 4. The Principles That Define Us ── */
.ng-values-section {
    background: var(--about-navy-deep);
    padding: 105px 0;
    border-bottom: 1px solid var(--about-border);
}
.ng-value-card {
    background: var(--about-navy-card);
    border: 1px solid var(--about-border);
    border-radius: 18px;
    padding: 38px 30px;
    height: 100%;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    box-shadow: 0 14px 36px rgba(0, 0, 0, 0.35);
    transition: all 0.3s ease;
}
.ng-value-card:hover {
    transform: translateY(-5px);
    border-color: rgba(113, 182, 68, 0.4);
    box-shadow: 0 20px 48px rgba(0, 0, 0, 0.5);
}
.ng-value-card__num {
    position: absolute;
    top: 24px;
    right: 28px;
    font-family: var(--font-heading);
    font-size: 32px;
    font-weight: 800;
    color: rgba(113, 182, 68, 0.18);
    letter-spacing: 0.02em;
    user-select: none;
}
.ng-value-card__icon {
    width: 58px;
    height: 58px;
    border-radius: 16px;
    background: rgba(113, 182, 68, 0.14);
    border: 1.5px solid rgba(113, 182, 68, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 24px;
    box-shadow: 0 6px 18px rgba(113, 182, 68, 0.18);
}
.ng-value-card__icon i {
    color: var(--about-green-light);
    font-size: 24px;
}
.ng-value-card__title {
    font-family: var(--font-heading);
    font-size: 18px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 14px;
    text-transform: uppercase;
    letter-spacing: 0.04em;
}
.ng-value-card__desc {
    font-size: 13.5px;
    line-height: 1.72;
    color: var(--about-text-mute);
    margin-bottom: 0;
}

/* ── 5. Schedule a Guided Site Visit Section ── */
.ng-about-cta-section {
    position: relative;
    padding: 110px 0;
    background: linear-gradient(135deg, rgba(6, 14, 21, 0.94) 0%, rgba(11, 23, 33, 0.92) 100%),
                url("{{ asset('images/projects/rrr-prekshitha/sunset-horizon-landscape.webp') }}") center 40% / cover no-repeat;
    border-bottom: 1px solid var(--about-border);
    overflow: hidden;
}
.ng-about-cta-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 50% 50%, rgba(113, 182, 68, 0.12) 0%, transparent 68%);
    pointer-events: none;
}
.ng-cta-script-signature {
    position: absolute;
    right: 3%;
    bottom: -6px;
    font-family: 'Caveat', 'Dancing Script', 'Brush Script MT', cursive;
    font-size: clamp(32px, 2.7vw, 44px);
    font-weight: 700;
    line-height: 1.18;
    color: #ffffff;
    text-shadow: 0 3px 12px rgba(0, 0, 0, 0.9);
    transform: rotate(-6deg);
    user-select: none;
    pointer-events: none;
    z-index: 5;
    text-align: right;
    white-space: nowrap;
}
.ng-cta-script-signature .ng-cta-script-line1 {
    display: block;
    color: #f1f5f9;
}
.ng-cta-script-signature .ng-cta-script-line2 {
    display: block;
    color: var(--about-green-light);
    font-style: italic;
    text-shadow: 0 0 16px rgba(113, 182, 68, 0.45);
}

/* ── 6. Interactive Video Modal ── */
.about-video-modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.88);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    z-index: 99999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 20px;
}
.about-video-modal-overlay.is-open {
    display: flex;
}
.about-video-modal-dialog {
    position: relative;
    width: 100%;
    max-width: 900px;
    background: #000000;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.8);
}
.about-video-modal-close {
    position: absolute;
    top: 12px;
    right: 12px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: rgba(0, 0, 0, 0.65);
    border: 1px solid rgba(255, 255, 255, 0.25);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    transition: all 0.2s ease;
}
.about-video-modal-close:hover {
    background: var(--about-green);
    color: #08121a;
    transform: scale(1.1);
}
.about-video-modal-video {
    width: 100%;
    aspect-ratio: 16 / 9;
    display: block;
    background: #000000;
}

/* ── Responsive Rules ── */
@media (max-width: 1199px) {
    .ng-leader-grid {
        grid-template-columns: 42% 58%;
    }
    .ng-leader-info-col {
        padding: 26px 22px;
    }
    .ng-cta-script-signature {
        position: relative;
        right: auto;
        bottom: auto;
        margin-top: 36px;
        text-align: center;
        transform: rotate(-3deg);
        display: block;
    }
}
@media (max-width: 991px) {
    .ng-about-hero {
        padding-top: 120px;
        padding-bottom: 70px;
    }
    .ng-about-hero__visual-img {
        height: 380px;
    }
    .ng-leader-grid {
        grid-template-columns: 1fr;
    }
    .ng-leader-photo-col {
        height: 360px;
        min-height: auto;
    }
}
@media (max-width: 575px) {
    .ng-about-hero__visual-img {
        height: 280px;
    }
    .ng-identity-card,
    .ng-identity-card-img {
        min-height: 320px;
    }
    .ng-leader-photo-col {
        height: 300px;
    }
    .ng-leader-info-col {
        padding: 22px 18px;
    }
}
</style>
@endpush

@section('content')

{{-- ============================================================
     1. HERO SECTION (Redesigned 2-Column Balanced Presentation)
     ============================================================ --}}
<section class="ng-about-hero" id="about-top" aria-label="About Navagruha">
    <div class="ng-about-hero__bg-glow"></div>

    <div class="container position-relative z-2">
        <div class="row align-items-center g-5">
            
            <!-- Left Column: Typography & CTAs -->
            <div class="col-lg-6">
                <div class="ng-eyebrow">
                    ABOUT NAVAGRUHA
                </div>
                <h1 class="ng-about-hero__h1">
                    BUILDING TRUST<br>
                    <span>CREATING VALUES</span>
                </h1>
                <p class="ng-about-hero__lead">
                    At Navagruha, we believe land is more than an investment, it is the foundation of future opportunities. As a Hyderabad based real estate developer, we craft thoughtfully planned residential plotted communities in strategically selected growth corridors. Backed by clear legal approvals, transparent processes, and a vision for sustainable development, we empower families and investors with secure, high potential real estate opportunities that stand the test of time.
                </p>
                <div class="d-flex flex-wrap align-items-center gap-3">
                    <a href="#identity" class="btn-main px-4 py-3 font-copperplate fs-12 text-decoration-none rounded-pill shadow-lg">
                        <span>EXPLORE OUR APPROACH</span>
                    </a>
                    <button type="button" class="ng-btn-video" onclick="openAboutVideoModal()" aria-label="Watch Navagruha project video walkthrough">
                        <span class="ng-btn-video-icon">
                            <i class="fa-solid fa-play"></i>
                        </span>
                        <span class="ng-btn-video-text">
                            <span class="ng-btn-video-title">OUR STORY</span>
                            <span class="ng-btn-video-sub">Watch Video</span>
                        </span>
                    </button>
                </div>
            </div>

            <!-- Right Column: Architectural Hero Visual -->
            <div class="col-lg-6">
                <div class="ng-about-hero__visual-wrap">
                    <img
                        src="{{ asset('images/projects/rrr-prekshitha/entrance-arch-grand.webp') }}"
                        alt="Navagruha Luxury Residential Community Grand Entrance Arch"
                        class="ng-about-hero__visual-img"
                        loading="eager"
                    >
                    <div class="ng-about-hero__visual-gradient"></div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ============================================================
     2. WHO WE ARE SECTION
     ============================================================ --}}
<section class="ng-identity-section" id="identity" aria-label="Who We Are">
    <div class="container">
        <div class="row g-5 align-items-center">

            <!-- Text Column (Left) -->
            <div class="col-lg-7">
                <div class="ng-eyebrow">
                    WHO WE ARE
                </div>
                <h2 class="fs-36 text-white font-copperplate mb-4 lh-1-2">
                    EVERY INVESTMENT BEGINS WITH<br>CONFIDENCE
                </h2>

                <p class="text-white-50 fs-15 leading-relaxed mb-3">
                    At Navagruha Infra Developers, we believe that a residential plot is more than just a piece of land, it is the foundation for your future, your family’s aspirations, and long term financial growth. As a trusted real estate developer in Hyderabad, we are committed to creating premium plotted developments and well planned gated communities in high potential growth corridors with strong infrastructure, connectivity, and investment prospects.
                </p>
                <p class="text-white-50 fs-15 leading-relaxed mb-3">
                    Our projects are developed in strategically selected locations that offer excellent accessibility, future appreciation potential, and a balanced lifestyle. Guided by HMDA planning standards and TSRERA compliance, we ensure every development meets the highest standards of quality, transparency, and legal integrity.
                </p>
                <p class="text-white-50 fs-15 leading-relaxed mb-0">
                    With clear land titles, transparent documentation, customer centric service, and dedicated support at every stage, we provide homebuyers and investors with a secure, hassle free, and rewarding real estate investment experience. At Navagruha, we don't just develop plots, we create opportunities for sustainable growth, lasting value, and a brighter future.
                </p>
            </div>

            <!-- Image Column (Right) -->
            <div class="col-lg-5">
                <div class="ng-identity-card">
                    <img
                        src="{{ asset('images/projects/rrr-prekshitha/sunset-horizon-landscape.webp') }}"
                        alt="Planned Residential Communities for a Brighter Tomorrow"
                        class="ng-identity-card-img"
                        loading="lazy"
                    >
                    <div class="ng-identity-card-overlay">
                        <div class="ng-identity-quote-mark mb-2">
                            <i class="fa-solid fa-quote-left text-brand-primary fs-20"></i>
                        </div>
                        <div class="ng-identity-quote-text">
                            Planned Communities<br>for a Brighter Tomorrow
                        </div>
                        <div class="ng-identity-quote-bar"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ============================================================
     3. LEADERSHIP SECTION (Equal Height Cards, True Photo Framing)
     ============================================================ --}}
<section class="ng-leadership-section" id="leadership" aria-label="Our Leadership">
    <div class="container">
        
        <!-- Centered Section Header -->
        <div class="text-center max-w-700 mx-auto mb-5 pb-2">
            <div class="ng-eyebrow justify-content-center mb-2">
                OUR LEADERSHIP
            </div>
            <h2 class="fs-36 text-white font-copperplate mb-2">
                LEADERSHIP THAT DRIVES VISION
            </h2>
            <div class="text-brand-secondary font-copperplate fs-14">
                Guided by Experience. Committed to Your Future.
            </div>
        </div>

        <!-- Two Equal-Height Leadership Profile Cards -->
        <div class="row g-4 justify-content-center align-items-stretch">
            
            @foreach($leadership as $person)
                <div class="col-xl-6 col-12 d-flex">
                    <div class="ng-leader-card w-100">
                        <div class="ng-leader-grid">
                            
                            <!-- Left: Dedicated Photo Column (Original Photographs Kept Intact) -->
                            <div class="ng-leader-photo-col">
                                <img
                                    src="{{ asset($person['photo']) }}"
                                    alt="{{ $person['name'] }}, {{ $person['title'] }}"
                                    class="ng-leader-photo"
                                    loading="lazy"
                                >
                            </div>

                            <!-- Right: Professional Information -->
                            <div class="ng-leader-info-col">
                                <div>
                                    <div class="ng-leader-name">{{ $person['name'] }}</div>
                                    <div class="ng-leader-role">{{ $person['title'] }}</div>

                                    <div class="ng-leader-bio-wrap">
                                        @foreach($person['paragraphs'] as $p)
                                            <p class="ng-leader-bio">
                                                {{ $p }}
                                            </p>
                                        @endforeach
                                    </div>
                                </div>

                                @if(!empty($person['quote']))
                                    <div class="ng-leader-quote-box">
                                        <span class="ng-leader-quote-mark">“</span>
                                        <p class="ng-leader-quote-text">
                                            {{ $person['quote'] }}
                                        </p>
                                    </div>
                                @endif
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

        <!-- Centered Header -->
        <div class="text-center max-w-700 mx-auto mb-5">
            <h2 class="fs-36 text-white font-copperplate mb-3">
                THE PRINCIPLES THAT DEFINE US
            </h2>
            <p class="text-white-50 fs-15 mb-0 leading-relaxed">
                At Navagruha Infra Developers, our values are more than guiding ideals, they are the foundation of every decision we make. From project planning and execution to customer engagement and post sale support, these principles shape the way we operate and deliver lasting value.
            </p>
        </div>

        <!-- 3 Cards Grid -->
        <div class="row g-4">
            @php
                $icons = ['fa-scale-balanced', 'fa-award', 'fa-handshake-angle'];
            @endphp
            @foreach($coreValues as $vi => $value)
                <div class="col-lg-4 col-md-6 col-12 d-flex">
                    <div class="ng-value-card w-100">
                        <div class="ng-value-card__num">{{ $value['number'] }}</div>
                        <div class="ng-value-card__icon">
                            <i class="fa-solid {{ $icons[$vi % count($icons)] }}"></i>
                        </div>
                        <h3 class="ng-value-card__title">{{ $value['title'] }}</h3>
                        <p class="ng-value-card__desc">{{ $value['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>


{{-- ============================================================
     5. SCHEDULE A GUIDED SITE VISIT (Impactful Horizontal Section)
     ============================================================ --}}
<section class="ng-about-cta-section" id="about-cta" aria-label="Schedule a Guided Site Visit">
    <div class="container position-relative z-2">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-8 col-lg-9 col-12 text-center">
                <h2 class="fs-36 text-white font-copperplate mb-3">
                    SCHEDULE A GUIDED SITE VISIT
                </h2>
                <p class="text-white-50 fs-15 leading-relaxed mb-4 mx-auto" style="max-width: 680px;">
                    A site visit is the best way to understand the true value of a real estate investment. We invite you to experience the project firsthand, explore the surrounding growth corridor, inspect individual plot locations, and review all project details before making your decision.
                </p>

                <div class="d-flex flex-wrap justify-content-center align-items-center gap-3">
                    <a href="{{ route('contact') }}" class="btn-main px-4 py-3 font-copperplate fs-12 text-decoration-none rounded-pill shadow-lg">
                        <span><i class="fa-regular fa-calendar-check me-2"></i> SCHEDULE A SITE VISIT</span>
                    </a>
                    <a href="{{ route('projects') }}" class="btn-outline-brand px-4 py-3 font-copperplate fs-12 text-decoration-none rounded-pill">
                        <span><i class="fa-solid fa-layer-group me-2"></i> VIEW RESIDENTIAL PROJECTS</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="ng-cta-script-signature">
            <span class="ng-cta-script-line1">Let's Build</span>
            <span class="ng-cta-script-line2">a Brighter Tomorrow</span>
        </div>
    </div>
</section>

{{-- ============================================================
     6. INTERACTIVE ABOUT VIDEO MODAL
     ============================================================ --}}
<div class="about-video-modal-overlay" id="aboutVideoModal" onclick="closeAboutVideoModal(event)">
    <div class="about-video-modal-dialog" onclick="event.stopPropagation()">
        <button class="about-video-modal-close" onclick="closeAboutVideoModal(event)" aria-label="Close video player">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <video id="aboutModalVideo" class="about-video-modal-video" controls playsinline preload="metadata" poster="{{ asset('images/projects/rrr-prekshitha/aerial-drone-banner.webp') }}">
            <source src="{{ asset('data/Site Developments/Site Developments/NAVAGRUHA PREKSHITHA ENCLAVE.mp4') }}" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </div>
</div>

@endsection

@push('scripts')
<script>
function openAboutVideoModal() {
    const modal = document.getElementById('aboutVideoModal');
    const video = document.getElementById('aboutModalVideo');
    if (modal && video) {
        modal.classList.add('is-open');
        document.body.style.overflow = 'hidden';
        video.play().catch(function() { console.log('Autoplay handled'); });
    }
}

function closeAboutVideoModal(e) {
    if (e && e.stopPropagation) e.stopPropagation();
    const modal = document.getElementById('aboutVideoModal');
    const video = document.getElementById('aboutModalVideo');
    if (modal && video) {
        video.pause();
        video.currentTime = 0;
        modal.classList.remove('is-open');
        document.body.style.overflow = '';
    }
}

document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeAboutVideoModal();
    }
});
</script>
@endpush
