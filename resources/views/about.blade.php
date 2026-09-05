@extends('layouts.app')

@section('title', 'About Us | Navagruha Infra Developers — Building Trust Since 2004')
@section('meta_description', 'Navagruha Infra Developers — a Hyderabad real estate developer with over 20 years of experience in HMDA-approved, RERA-certified residential plotted communities.')

@push('styles')
<style>
/* =========================================================
   ABOUT PAGE v3 — CINEMATIC PREMIUM REDESIGN
   ========================================================= */

/* ----- Reset & Tokens ----- */
:root {
    --ng-gold:    #c9a84c;
    --ng-green:   #71b644;
    --ng-navy:    #0d1f2d;
    --ng-navy2:   #152a3a;
    --ng-offwhite:#f5f2ec;
    --ng-muted:   rgba(255,255,255,0.52);
    --ng-border:  rgba(255,255,255,0.08);
}

/* =========================================================
   1 ·  CINEMATIC HERO
   ========================================================= */
.ng-hero {
    position: relative;
    width: 100%;
    min-height: 100vh;
    overflow: hidden;
    display: flex;
    align-items: center;
    padding-top: 100px;
    padding-bottom: 90px;
}

/* Parallax BG */
.ng-hero__bg {
    position: absolute;
    inset: -8%;
    background: url('{{ asset("venture/photos/09.jpg") }}') center/cover no-repeat;
    transform: translateY(0);
    will-change: transform;
}

/* Multi-layer overlay */
.ng-hero__overlay {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(to right,  rgba(13,31,45,0.90) 0%,  rgba(13,31,45,0.45) 55%, transparent 100%),
        linear-gradient(to top,    rgba(13,31,45,0.98) 0%,  rgba(13,31,45,0.00) 60%);
}

.ng-hero__content {
    position: relative;
    z-index: 3;
    width: 100%;
    padding: 0;
}

/* Eyebrow line */
.ng-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    font-family: var(--font-heading);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: var(--ng-gold);
    margin-bottom: 20px;
}
.ng-eyebrow::before {
    content: '';
    display: block;
    width: 32px;
    height: 1px;
    background: var(--ng-gold);
    flex-shrink: 0;
}

/* Giant display headline */
.ng-hero__h1 {
    font-family: var(--font-heading);
    font-size: clamp(38px, 5.5vw, 76px);
    font-weight: 800;
    line-height: 1.05;
    letter-spacing: -0.02em;
    color: #fff;
    margin-bottom: 24px;
}
.ng-hero__h1 em {
    font-style: normal;
    color: var(--ng-gold);
}

.ng-hero__sub {
    font-family: var(--font-sans);
    font-size: clamp(14px, 1.5vw, 16px);
    line-height: 1.72;
    color: rgba(255,255,255,0.62);
    max-width: 560px;
    margin-bottom: 40px;
}

.ng-hero__cta {
    display: inline-flex;
    align-items: center;
    gap: 14px;
    font-family: var(--font-heading);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: #fff;
    text-decoration: none;
    transition: gap 0.3s ease;
}
.ng-hero__cta:hover { gap: 20px; color: var(--ng-gold); }
.ng-hero__cta-arrow {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    border: 1px solid rgba(255,255,255,0.3);
    border-radius: 50%;
    font-size: 13px;
    transition: border-color 0.3s, background 0.3s;
}
.ng-hero__cta:hover .ng-hero__cta-arrow {
    border-color: var(--ng-gold);
    background: var(--ng-gold);
    color: var(--ng-navy);
}

/* Floating stat strip */
.ng-hero__stats {
    position: absolute;
    right: 0;
    bottom: 0;
    z-index: 4;
    display: flex;
    border-top: 1px solid var(--ng-border);
    border-left: 1px solid var(--ng-border);
}
.ng-hero__stat {
    padding: 24px 36px;
    border-right: 1px solid var(--ng-border);
    text-align: center;
    backdrop-filter: blur(16px);
    background: rgba(13,31,45,0.55);
}
.ng-hero__stat-val {
    font-family: var(--font-heading);
    font-size: 32px;
    font-weight: 800;
    color: #fff;
    line-height: 1;
    margin-bottom: 4px;
}
.ng-hero__stat-lbl {
    font-family: var(--font-heading);
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--ng-gold);
}

/* Scroll progress line */
.ng-hero__progress {
    position: absolute;
    left: 40px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 4;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}
.ng-hero__progress-line {
    width: 1px;
    height: 80px;
    background: linear-gradient(to bottom, var(--ng-gold), transparent);
    animation: ng-scroll-pulse 2s ease-in-out infinite;
}
@keyframes ng-scroll-pulse {
    0%, 100% { opacity: 0.3; transform: scaleY(0.8); }
    50%       { opacity: 1;   transform: scaleY(1.0); }
}
.ng-hero__progress-label {
    writing-mode: vertical-rl;
    font-family: var(--font-heading);
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: rgba(255,255,255,0.35);
}

/* Hero mobile */
@media (max-width: 768px) {
    .ng-hero__h1 { font-size: clamp(36px, 11vw, 60px); }
    .ng-hero__stats { position: static; width: 100%; margin-top: 40px; }
    .ng-hero__stat { flex: 1; padding: 16px 12px; }
    .ng-hero__stat-val { font-size: 22px; }
    .ng-hero__progress { display: none; }
    .ng-hero__overlay {
        background:
            linear-gradient(to top, rgba(13,31,45,0.97) 0%, rgba(13,31,45,0.5) 70%);
    }
}


/* =========================================================
   2 ·  IDENTITY — MANIFESTO SECTION
   ========================================================= */
.ng-identity {
    background: var(--ng-offwhite);
    padding: 120px 0;
    overflow: hidden;
}

.ng-identity__label {
    font-family: var(--font-heading);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: var(--ng-green);
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    gap: 12px;
}
.ng-identity__label::before {
    content: '';
    width: 28px;
    height: 1px;
    background: var(--ng-green);
    display: block;
    flex-shrink: 0;
}

.ng-identity__headline {
    font-family: var(--font-heading);
    font-size: clamp(32px, 5vw, 58px);
    font-weight: 800;
    line-height: 1.08;
    letter-spacing: -0.01em;
    color: var(--ng-navy);
    margin-bottom: 0;
}
.ng-identity__headline mark {
    background: none;
    color: var(--ng-green);
    -webkit-text-stroke: 0;
}

.ng-identity__divider {
    width: 1px;
    background: rgba(13,31,45,0.15);
    align-self: stretch;
    margin: 0 40px;
}

.ng-identity__body {
    font-family: var(--font-sans);
    font-size: 16px;
    line-height: 1.82;
    color: #4a5568;
    margin-bottom: 28px;
}

.ng-identity__tags {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 12px;
}
.ng-identity__tag {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 8px 16px;
    border: 1.5px solid rgba(13,31,45,0.14);
    border-radius: 100px;
    font-family: var(--font-heading);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--ng-navy);
    transition: border-color 0.25s, background 0.25s;
}
.ng-identity__tag:hover {
    border-color: var(--ng-green);
    background: rgba(113,182,68,0.06);
}
.ng-identity__tag i { color: var(--ng-green); font-size: 11px; }

/* Floating image accent */
.ng-identity__img-wrap {
    position: relative;
    border-radius: 4px;
    overflow: hidden;
    box-shadow: 0 40px 80px rgba(13,31,45,0.18);
}
.ng-identity__img-wrap::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(113,182,68,0.12), transparent);
    z-index: 1;
    pointer-events: none;
}
.ng-identity__img {
    width: 100%;
    height: 500px;
    object-fit: cover;
    display: block;
    transition: transform 0.7s ease;
}
.ng-identity__img-wrap:hover .ng-identity__img {
    transform: scale(1.03);
}
.ng-identity__img-badge {
    position: absolute;
    bottom: 24px;
    left: 24px;
    z-index: 2;
    background: var(--ng-navy);
    color: #fff;
    padding: 12px 20px;
    border-radius: 4px;
    font-family: var(--font-heading);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    backdrop-filter: blur(10px);
}
.ng-identity__img-badge span {
    color: var(--ng-gold);
}

@media (max-width: 991px) {
    .ng-identity { padding: 80px 0; }
    .ng-identity__divider { display: none; }
    .ng-identity__img { height: 340px; }
}


/* =========================================================
   3 ·  LEADERSHIP — EDITORIAL DARK SPLIT
   ========================================================= */
.ng-leadership {
    background: var(--ng-navy);
    overflow: hidden;
}

.ng-leadership__header {
    padding: 100px 0 70px;
    text-align: center;
}
.ng-leadership__header-eyebrow {
    font-family: var(--font-heading);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: var(--ng-gold);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
}
.ng-leadership__header-eyebrow::before,
.ng-leadership__header-eyebrow::after {
    content: '';
    width: 28px;
    height: 1px;
    background: var(--ng-gold);
}
.ng-leadership__header h2 {
    font-family: var(--font-heading);
    font-size: clamp(28px, 5vw, 52px);
    font-weight: 800;
    color: #fff;
    letter-spacing: -0.01em;
    line-height: 1.1;
    margin-bottom: 0;
}

/* Leader card — full-bleed split */
.ng-leader {
    display: grid;
    grid-template-columns: 1fr 1fr;
    min-height: 620px;
    border-top: 1px solid var(--ng-border);
}
.ng-leader--reverse {
    direction: rtl;
}
.ng-leader--reverse > * { direction: ltr; }

/* Photo side */
.ng-leader__photo-col {
    position: relative;
    overflow: hidden;
    min-height: 540px;
}
.ng-leader__photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
    display: block;
    transition: transform 0.9s cubic-bezier(0.25,0.46,0.45,0.94);
}
.ng-leader__photo-col:hover .ng-leader__photo {
    transform: scale(1.04);
}
.ng-leader__photo-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to right, transparent 60%, var(--ng-navy) 100%);
    pointer-events: none;
}
.ng-leader--reverse .ng-leader__photo-overlay {
    background: linear-gradient(to left, transparent 60%, var(--ng-navy) 100%);
}

/* Bio side */
.ng-leader__bio-col {
    display: flex;
    align-items: center;
    padding: 60px 70px;
}
.ng-leader__bio-inner { max-width: 460px; }

.ng-leader__num {
    font-family: var(--font-heading);
    font-size: 120px;
    font-weight: 800;
    line-height: 1;
    color: rgba(255,255,255,0.08);
    letter-spacing: -0.04em;
    margin-bottom: -30px;
    user-select: none;
}
.ng-leader__role {
    font-family: var(--font-heading);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.24em;
    text-transform: uppercase;
    color: var(--ng-gold);
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.ng-leader__role::before {
    content: '';
    width: 20px;
    height: 1px;
    background: var(--ng-gold);
}
.ng-leader__name {
    font-family: var(--font-heading);
    font-size: clamp(24px, 3.5vw, 38px);
    font-weight: 800;
    color: #fff;
    letter-spacing: -0.01em;
    line-height: 1.1;
    margin-bottom: 24px;
}
.ng-leader__rule {
    width: 40px;
    height: 2px;
    background: var(--ng-green);
    margin-bottom: 24px;
    border-radius: 2px;
}
.ng-leader__text {
    font-family: var(--font-sans);
    font-size: 15px;
    line-height: 1.82;
    color: rgba(255,255,255,0.58);
    margin-bottom: 0;
}
.ng-leader__photo-fallback {
    width: 100%;
    height: 100%;
    min-height: 540px;
    background: var(--ng-navy2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255,255,255,0.06);
    font-size: 100px;
}

@media (max-width: 991px) {
    .ng-leader, .ng-leader--reverse {
        grid-template-columns: 1fr;
        direction: ltr;
        min-height: unset;
    }
    .ng-leader__photo-col { min-height: 400px; }
    .ng-leader__photo-overlay,
    .ng-leader--reverse .ng-leader__photo-overlay {
        background: linear-gradient(to top, var(--ng-navy) 0%, transparent 50%);
    }
    .ng-leader__bio-col { padding: 40px 28px 60px; }
    .ng-leader__bio-inner { max-width: 100%; }
    .ng-leader__num { font-size: 80px; margin-bottom: -20px; }
    .ng-leadership__header { padding: 70px 0 48px; }
}
@media (max-width: 575px) {
    .ng-leader__photo-col { min-height: 320px; }
}


/* =========================================================
   4 ·  VALUES — MINIMAL LIGHT GRID
   ========================================================= */
.ng-values {
    background: #fff;
    padding: 120px 0;
    overflow: hidden;
}

.ng-values__header {
    margin-bottom: 72px;
}
.ng-values__eyebrow {
    font-family: var(--font-heading);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: var(--ng-green);
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.ng-values__eyebrow::before {
    content: '';
    width: 24px;
    height: 1px;
    background: var(--ng-green);
}
.ng-values__h2 {
    font-family: var(--font-heading);
    font-size: clamp(28px, 4vw, 48px);
    font-weight: 800;
    color: var(--ng-navy);
    letter-spacing: -0.01em;
    line-height: 1.1;
}

.ng-values__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    border-top: 1px solid rgba(13,31,45,0.1);
    border-left: 1px solid rgba(13,31,45,0.1);
}
.ng-value-card {
    padding: 48px 40px;
    border-right: 1px solid rgba(13,31,45,0.1);
    border-bottom: 1px solid rgba(13,31,45,0.1);
    position: relative;
    overflow: hidden;
    transition: background 0.35s;
    cursor: default;
}
.ng-value-card:hover {
    background: var(--ng-offwhite);
}
.ng-value-card__top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 22px;
}
.ng-value-card__num {
    font-family: var(--font-heading);
    font-size: 38px;
    font-weight: 800;
    line-height: 1;
    color: rgba(13,31,45,0.28);
    letter-spacing: -0.02em;
    transition: color 0.35s;
    user-select: none;
}
.ng-value-card:hover .ng-value-card__num {
    color: var(--ng-gold);
}
.ng-value-card__icon {
    width: 48px;
    height: 48px;
    background: rgba(113,182,68,0.1);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s;
}
.ng-value-card:hover .ng-value-card__icon {
    background: rgba(113,182,68,0.18);
}
.ng-value-card__icon i { color: var(--ng-green); font-size: 18px; }
.ng-value-card__title {
    font-family: var(--font-heading);
    font-size: 18px;
    font-weight: 700;
    color: var(--ng-navy);
    letter-spacing: 0.01em;
    margin-bottom: 12px;
}
.ng-value-card__desc {
    font-family: var(--font-sans);
    font-size: 14px;
    line-height: 1.78;
    color: #596573;
    margin-bottom: 0;
}
.ng-value-card__accent {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: var(--ng-green);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.4s ease;
}
.ng-value-card:hover .ng-value-card__accent { transform: scaleX(1); }

@media (max-width: 768px) {
    .ng-values { padding: 80px 0; }
    .ng-values__grid { grid-template-columns: 1fr; }
    .ng-value-card { padding: 36px 28px; }
}
@media (min-width: 769px) and (max-width: 1024px) {
    .ng-values__grid { grid-template-columns: repeat(2, 1fr); }
}


/* =========================================================
   5 ·  TIMELINE — DARK EDITORIAL HORIZONTAL
   ========================================================= */
.ng-timeline {
    background: var(--ng-navy2);
    padding: 120px 0;
    overflow: hidden;
}

.ng-timeline__header {
    text-align: center;
    margin-bottom: 80px;
}
.ng-timeline__eyebrow {
    font-family: var(--font-heading);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: var(--ng-gold);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
}
.ng-timeline__eyebrow::before,
.ng-timeline__eyebrow::after {
    content: '';
    width: 24px;
    height: 1px;
    background: var(--ng-gold);
}
.ng-timeline__h2 {
    font-family: var(--font-heading);
    font-size: clamp(28px, 4.5vw, 50px);
    font-weight: 800;
    color: #fff;
    letter-spacing: -0.01em;
    line-height: 1.1;
    margin-bottom: 12px;
}
.ng-timeline__sub {
    font-family: var(--font-sans);
    font-size: 15px;
    line-height: 1.7;
    color: rgba(255,255,255,0.48);
    max-width: 500px;
    margin: 0 auto;
}

/* Desktop horizontal track */
.ng-timeline__track {
    position: relative;
    display: flex;
    align-items: stretch;
    gap: 16px;
    padding-top: 4px;
}
.ng-timeline__track::before {
    content: '';
    position: absolute;
    top: 13px; /* Exactly bisects 26px dot */
    left: calc((100% - 64px) / 10);
    right: calc((100% - 64px) / 10);
    height: 2px;
    background: linear-gradient(90deg, 
        rgba(201,168,76,0.3) 0%, 
        var(--ng-gold) 20%, 
        var(--ng-gold) 80%, 
        rgba(201,168,76,0.3) 100%
    );
    box-shadow: 0 0 14px rgba(201,168,76,0.5);
    z-index: 1;
}
.ng-timeline__item {
    flex: 1;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    opacity: 0;
    transform: translateY(24px);
    transition: opacity 0.6s ease, transform 0.6s ease;
}
.ng-timeline__item.ng-visible {
    opacity: 1;
    transform: translateY(0);
}
.ng-timeline__dot {
    width: 26px;
    height: 26px;
    background: var(--ng-navy2);
    border: 2px solid var(--ng-gold);
    border-radius: 50%;
    margin-bottom: 24px;
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 0 10px rgba(201,168,76,0.3);
    transition: transform 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease;
    cursor: default;
}
.ng-timeline__dot-core {
    width: 8px;
    height: 8px;
    background: var(--ng-gold);
    border-radius: 50%;
    transition: transform 0.35s ease, background 0.35s ease;
}
.ng-timeline__item:hover .ng-timeline__dot {
    transform: scale(1.25);
    border-color: #fff;
    box-shadow: 0 0 22px rgba(201,168,76,0.85);
}
.ng-timeline__item:hover .ng-timeline__dot-core {
    background: #fff;
    transform: scale(1.2);
}

.ng-timeline__card {
    width: 100%;
    height: 100%;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 8px;
    padding: 24px 18px;
    text-align: center;
    position: relative;
    overflow: hidden;
    backdrop-filter: blur(8px);
    transition: transform 0.35s ease, background 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease;
}
.ng-timeline__card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--ng-gold), transparent);
    opacity: 0;
    transition: opacity 0.35s ease;
}
.ng-timeline__item:hover .ng-timeline__card {
    transform: translateY(-6px);
    background: rgba(255,255,255,0.06);
    border-color: rgba(201,168,76,0.4);
    box-shadow: 0 16px 36px rgba(0,0,0,0.35);
}
.ng-timeline__item:hover .ng-timeline__card::before {
    opacity: 1;
}

.ng-timeline__step {
    font-family: var(--font-heading);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: var(--ng-gold);
    margin-bottom: 8px;
    opacity: 0.85;
}
.ng-timeline__year {
    font-family: var(--font-heading);
    font-size: 28px;
    font-weight: 800;
    color: #fff;
    letter-spacing: -0.02em;
    margin-bottom: 10px;
    line-height: 1;
    transition: color 0.3s ease;
}
.ng-timeline__item:hover .ng-timeline__year {
    color: var(--ng-gold);
}
.ng-timeline__event {
    font-family: var(--font-sans);
    font-size: 13px;
    line-height: 1.65;
    color: rgba(255,255,255,0.65);
    margin-bottom: 0;
}

/* Mobile vertical track */
.ng-timeline__mobile {
    display: none;
}
.ng-timeline__m-item {
    display: flex;
    gap: 18px;
    margin-bottom: 20px;
    opacity: 0;
    transform: translateX(-16px);
    transition: opacity 0.5s ease, transform 0.5s ease;
}
.ng-timeline__m-item.ng-visible {
    opacity: 1;
    transform: translateX(0);
}
.ng-timeline__m-left {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0;
    flex-shrink: 0;
    padding-top: 14px;
}
.ng-timeline__m-dot {
    width: 16px;
    height: 16px;
    background: var(--ng-navy2);
    border: 2px solid var(--ng-gold);
    border-radius: 50%;
    flex-shrink: 0;
    box-shadow: 0 0 8px rgba(201,168,76,0.4);
}
.ng-timeline__m-line {
    width: 2px;
    flex: 1;
    background: linear-gradient(to bottom, var(--ng-gold), rgba(201,168,76,0.2));
    margin-top: 6px;
}
.ng-timeline__m-card {
    flex: 1;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 8px;
    padding: 18px 20px;
}
.ng-timeline__m-year {
    font-family: var(--font-heading);
    font-size: 22px;
    font-weight: 800;
    color: #fff;
    line-height: 1;
    margin-bottom: 6px;
}
.ng-timeline__m-event {
    font-family: var(--font-sans);
    font-size: 14px;
    line-height: 1.6;
    color: rgba(255,255,255,0.65);
    margin-bottom: 0;
}

@media (max-width: 768px) {
    .ng-timeline { padding: 80px 0; }
    .ng-timeline__track { display: none; }
    .ng-timeline__mobile { display: block; }
    .ng-timeline__header { margin-bottom: 56px; }
}


/* =========================================================
   6 ·  FINAL CTA — BOLD DARK
   ========================================================= */
.ng-cta {
    position: relative;
    overflow: hidden;
    padding: 140px 0;
    background: var(--ng-navy);
}
.ng-cta__bg {
    position: absolute;
    inset: 0;
    background: url('{{ asset("venture/photos/04.jpg") }}') center/cover no-repeat;
    opacity: 0.12;
    filter: grayscale(40%);
}
.ng-cta__grain {
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
    opacity: 0.4;
    pointer-events: none;
}
.ng-cta__content { position: relative; z-index: 2; text-align: center; }

.ng-cta__eyebrow {
    font-family: var(--font-heading);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: var(--ng-gold);
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
}
.ng-cta__eyebrow::before, .ng-cta__eyebrow::after {
    content: '';
    width: 24px;
    height: 1px;
    background: var(--ng-gold);
}
.ng-cta__h2 {
    font-family: var(--font-heading);
    font-size: clamp(36px, 6vw, 72px);
    font-weight: 800;
    color: #fff;
    line-height: 1.0;
    letter-spacing: -0.02em;
    margin-bottom: 20px;
}
.ng-cta__h2 em {
    font-style: normal;
    color: var(--ng-gold);
}
.ng-cta__sub {
    font-family: var(--font-sans);
    font-size: 15px;
    line-height: 1.72;
    color: rgba(255,255,255,0.52);
    max-width: 460px;
    margin: 0 auto 44px;
}
.ng-cta__btns {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
}
.ng-btn-gold {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--ng-gold);
    color: var(--ng-navy);
    font-family: var(--font-heading);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    padding: 16px 32px;
    border-radius: 2px;
    text-decoration: none;
    transition: background 0.3s, transform 0.2s;
    border: 2px solid var(--ng-gold);
}
.ng-btn-gold:hover {
    background: #b8922e;
    border-color: #b8922e;
    color: #fff;
    transform: translateY(-2px);
}
.ng-btn-outline {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: transparent;
    color: rgba(255,255,255,0.8);
    font-family: var(--font-heading);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    padding: 16px 32px;
    border-radius: 2px;
    text-decoration: none;
    border: 2px solid rgba(255,255,255,0.2);
    transition: border-color 0.3s, color 0.3s, transform 0.2s;
}
.ng-btn-outline:hover {
    border-color: rgba(255,255,255,0.6);
    color: #fff;
    transform: translateY(-2px);
}

/* =========================================================
   SCROLL REVEAL — JS-POWERED
   ========================================================= */
.ng-reveal {
    opacity: 0;
    transform: translateY(32px);
    transition: opacity 0.7s ease, transform 0.7s ease;
}
.ng-reveal.ng-visible {
    opacity: 1;
    transform: translateY(0);
}
.ng-reveal-left {
    opacity: 0;
    transform: translateX(-32px);
    transition: opacity 0.7s ease, transform 0.7s ease;
}
.ng-reveal-left.ng-visible {
    opacity: 1;
    transform: translateX(0);
}
.ng-reveal-right {
    opacity: 0;
    transform: translateX(32px);
    transition: opacity 0.7s ease, transform 0.7s ease;
}
.ng-reveal-right.ng-visible {
    opacity: 1;
    transform: translateX(0);
}
</style>
@endpush


@section('content')

{{-- ============================================================
     SECTION 1 — CINEMATIC HERO
     ============================================================ --}}
<section class="ng-hero" id="about-top" aria-label="About Navagruha hero">
    <div class="ng-hero__bg" id="ng-parallax-bg"></div>
    <div class="ng-hero__overlay"></div>

    {{-- Side progress indicator --}}
    <div class="ng-hero__progress" aria-hidden="true">
        <div class="ng-hero__progress-line"></div>
        <span class="ng-hero__progress-label">Scroll</span>
    </div>

    <div class="ng-hero__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-7">
                    <p class="ng-eyebrow">About Navagruha</p>
                    <h1 class="ng-hero__h1">
                        Building Trust<br>
                        <em>Creating Lasting Value</em>
                    </h1>
                    <p class="ng-hero__sub">
                        A Hyderabad-based real estate developer creating thoughtfully planned residential plotted communities in strategically located growth corridors, with a strong focus on verified approvals, transparent documentation, and long-term value.
                    </p>
                    <a href="#identity" class="ng-hero__cta">
                        <span>Explore Our Story</span>
                        <span class="ng-hero__cta-arrow"><i class="fa-solid fa-arrow-down"></i></span>
                    </a>
                </div>
            </div>
        </div>

        {{-- Floating stat strip --}}
        <div class="ng-hero__stats" aria-label="Key statistics">
            @foreach($stats as $stat)
            <div class="ng-hero__stat">
                <div class="ng-hero__stat-val ng-counter" data-target="{{ preg_replace('/[^0-9]/', '', $stat['value']) }}" data-suffix="{{ preg_replace('/[0-9]/', '', $stat['value']) }}">{{ $stat['value'] }}</div>
                <div class="ng-hero__stat-lbl">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 2 — IDENTITY / WHO WE ARE
     ============================================================ --}}
<section class="ng-identity" id="identity" aria-label="Who we are">
    <div class="container">
        <div class="row g-5 align-items-center">

            {{-- Left: Image --}}
            <div class="col-lg-5 order-lg-2 ng-reveal-right">
                <div class="ng-identity__img-wrap">
                    <img
                        src="{{ asset('venture/photos/10.jpg') }}"
                        alt="Navagruha — A site view of our residential development"
                        class="ng-identity__img"
                        loading="lazy"
                    >
                    <div class="ng-identity__img-badge">
                        Est. <span>2004</span> · Hyderabad
                    </div>
                </div>
            </div>

            {{-- Right: Text --}}
            <div class="col-lg-7 order-lg-1 ng-reveal-left">
                <p class="ng-identity__label">Who We Are</p>
                <h2 class="ng-identity__headline">
                    Every Investment Begins<br>
                    with <mark>Confidence</mark>
                </h2>

                <div class="ng-identity__divider d-none d-lg-block" style="height:1px;background:rgba(13,31,45,0.1);margin:32px 0;"></div>

                <p class="ng-identity__body">
                    At Navagruha Infra Developers, we believe that buying a residential plot is about more than owning land. It is about creating a foundation for the future, whether that means building a home, planning for your family, or making a considered investment.
                </p>
                <p class="ng-identity__body" style="margin-bottom:0;">
                    We focus on developing thoughtfully planned communities in locations with growing infrastructure and connectivity. With HMDA town planning standards, TSRERA registration, transparent documentation, and dedicated support throughout the process, we aim to give every customer the clarity and confidence to make the right decision.
                </p>

                <div class="ng-identity__tags mt-5">
                    <span class="ng-identity__tag"><i class="fa-solid fa-certificate"></i> HMDA Approved</span>
                    <span class="ng-identity__tag"><i class="fa-solid fa-shield-halved"></i> TSRERA Certified</span>
                    <span class="ng-identity__tag"><i class="fa-solid fa-landmark"></i> Bank Loan Eligible</span>
                    <span class="ng-identity__tag"><i class="fa-solid fa-file-circle-check"></i> Clear Title Deeds</span>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 3 — LEADERSHIP
     ============================================================ --}}
<section class="ng-leadership" id="leadership" aria-label="Leadership team">

    <div class="ng-leadership__header ng-reveal">
        <p class="ng-leadership__header-eyebrow">Leadership</p>
        <h2>The People Behind Navagruha</h2>
    </div>

    @foreach($leadership as $index => $person)
    <div class="ng-leader {{ $index % 2 !== 0 ? 'ng-leader--reverse' : '' }}">

        {{-- Portrait --}}
        <div class="ng-leader__photo-col">
            <img
                src="{{ asset($person['photo']) }}"
                alt="{{ $person['name'] }}, {{ $person['title'] }} — Navagruha Infra Developers"
                class="ng-leader__photo"
                loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"
            >
            <div class="ng-leader__photo-fallback" style="display:none;"><i class="fa-solid fa-user-tie"></i></div>
            <div class="ng-leader__photo-overlay"></div>
        </div>

        {{-- Bio --}}
        <div class="ng-leader__bio-col ng-reveal">
            <div class="ng-leader__bio-inner">
                <div class="ng-leader__num">0{{ $index + 1 }}</div>
                <p class="ng-leader__role">{{ $person['title'] }}</p>
                <h3 class="ng-leader__name">{{ $person['name'] }}</h3>
                <div class="ng-leader__rule"></div>
                <p class="ng-leader__text">{{ $person['bio'] }}</p>
            </div>
        </div>

    </div>
    @endforeach

</section>


{{-- ============================================================
     SECTION 4 — VALUES
     ============================================================ --}}
<section class="ng-values" id="values" aria-label="Our core values">
    <div class="container">

        <div class="row justify-content-between align-items-end ng-values__header">
            <div class="col-lg-6">
                <p class="ng-values__eyebrow">What Guides Us</p>
                <h2 class="ng-values__h2">Values at the<br>Core of Everything</h2>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <p style="font-family:var(--font-sans);font-size:15px;line-height:1.78;color:#596573;margin:0;">
                    These three principles aren't aspirational statements — they're the operational standard by which every project, document, and customer interaction is measured.
                </p>
            </div>
        </div>

        <div class="ng-values__grid">
            @php
            $icons = ['fa-magnifying-glass-chart', 'fa-award', 'fa-handshake'];
            @endphp
            @foreach($coreValues as $vi => $value)
            <div class="ng-value-card ng-reveal" style="transition-delay: {{ $vi * 0.12 }}s">
                <div class="ng-value-card__top">
                    <div class="ng-value-card__icon">
                        <i class="fa-solid {{ $icons[$vi % count($icons)] }}"></i>
                    </div>
                    <div class="ng-value-card__num">{{ $value['number'] }}</div>
                </div>
                <h3 class="ng-value-card__title">{{ $value['title'] }}</h3>
                <p class="ng-value-card__desc">{{ $value['desc'] }}</p>
                <div class="ng-value-card__accent"></div>
            </div>
            @endforeach
        </div>

    </div>
</section>


{{-- ============================================================
     SECTION 5 — TIMELINE
     ============================================================ --}}
<section class="ng-timeline" id="milestones" aria-label="Company milestones">
    <div class="container">

        <div class="ng-timeline__header ng-reveal">
            <p class="ng-timeline__eyebrow">Our Journey</p>
            <h2 class="ng-timeline__h2">Two Decades of Delivery</h2>
            <p class="ng-timeline__sub">A track record built on completion, not promises from our first HMDA approved layout to active registrations today.</p>
        </div>

        {{-- Desktop horizontal --}}
        <div class="ng-timeline__track d-none d-md-flex">
            @foreach($milestones as $mi => $milestone)
            <div class="ng-timeline__item" style="transition-delay: {{ $mi * 0.13 }}s">
                <div class="ng-timeline__dot">
                    <span class="ng-timeline__dot-core"></span>
                </div>
                <div class="ng-timeline__card">
                    <div class="ng-timeline__step">0{{ $mi + 1 }}</div>
                    <div class="ng-timeline__year">{{ $milestone['year'] }}</div>
                    <div class="ng-timeline__event">{{ $milestone['event'] }}</div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Mobile vertical --}}
        <div class="ng-timeline__mobile d-md-none">
            @foreach($milestones as $mi => $milestone)
            <div class="ng-timeline__m-item" style="transition-delay: {{ $mi * 0.1 }}s">
                <div class="ng-timeline__m-left">
                    <div class="ng-timeline__m-dot"></div>
                    @if(!$loop->last)<div class="ng-timeline__m-line"></div>@endif
                </div>
                <div class="ng-timeline__m-card">
                    <div class="ng-timeline__step">0{{ $mi + 1 }}</div>
                    <div class="ng-timeline__m-year">{{ $milestone['year'] }}</div>
                    <div class="ng-timeline__m-event">{{ $milestone['event'] }}</div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>


{{-- ============================================================
     SECTION 6 — FINAL CTA
     ============================================================ --}}
<section class="ng-cta" id="about-cta" aria-label="Contact and next steps">
    <div class="ng-cta__bg"></div>
    <div class="ng-cta__grain"></div>
    <div class="container ng-cta__content ng-reveal">
        <p class="ng-cta__eyebrow">Get In Touch</p>
        <h2 class="ng-cta__h2">Let's Build Something<br><em>Meaningful</em></h2>
        <p class="ng-cta__sub">
            Explore our active developments or connect with our team directly. We're available seven days a week, 9 AM – 6:30 PM.
        </p>
        <div class="ng-cta__btns">
            <a href="{{ route('projects') }}" class="ng-btn-gold" id="about-cta-projects">
                <i class="fa-solid fa-layer-group"></i> Explore Projects
            </a>
            <a href="{{ route('contact') }}#visit-form" class="ng-btn-outline" id="about-cta-visit">
                <i class="fa-solid fa-calendar-check"></i> Schedule a Site Visit
            </a>
        </div>
    </div>
</section>

@endsection


@push('scripts')
<script>
(function () {
    'use strict';

    /* ── 1. Parallax hero bg on scroll ─────────────────────── */
    const heroBg = document.getElementById('ng-parallax-bg');
    if (heroBg) {
        window.addEventListener('scroll', function () {
            const y = window.scrollY;
            heroBg.style.transform = 'translateY(' + (y * 0.28) + 'px)';
        }, { passive: true });
    }

    /* ── 2. Intersection Observer — reveal elements ─────────── */
    const revealSelectors = [
        '.ng-reveal',
        '.ng-reveal-left',
        '.ng-reveal-right',
        '.ng-timeline__item',
        '.ng-timeline__m-item'
    ];
    const revealEls = document.querySelectorAll(revealSelectors.join(','));

    if ('IntersectionObserver' in window) {
        const io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('ng-visible');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        revealEls.forEach(function (el) { io.observe(el); });
    } else {
        // Fallback — show all immediately
        revealEls.forEach(function (el) { el.classList.add('ng-visible'); });
    }

    /* ── 3. Smooth scroll for hero CTA ─────────────────────── */
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                const offset = 80;
                const top = target.getBoundingClientRect().top + window.scrollY - offset;
                window.scrollTo({ top: top, behavior: 'smooth' });
            }
        });
    });

})();
</script>
@endpush
