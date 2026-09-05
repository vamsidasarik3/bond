@extends('layouts.app')

@section('title', 'Investor Corner | RRR Prekshitha Enclave, Navagruha Infra Developers')
@section('meta_description', 'Explore the Investor Corner for RRR Prekshitha Enclave near AIIMS Bibinagar: verified HMDA approvals (LP No: 000022/LO/Plg/HMDA/2023), TSRERA registration, infrastructure standards, and transparent investment principles.')

@push('styles')
<style>
/* =========================================================
   INVESTOR CORNER — LUXURY EDITORIAL REAL ESTATE DESIGN SYSTEM
   ========================================================= */

:root {
    --ng-gold:     #c9a84c;
    --ng-gold-rgb: 201, 168, 76;
    --ng-gold-lt:  #f0e4c8;
    --ng-green:    #71b644;
    --ng-navy:     #0d1f2d;
    --ng-navy2:    #152a3a;
    --ng-navy3:    #1c3548;
    --ng-offwhite: #f5f2ec;
    --ng-warm-bg:  #f8f7f4;
    --ng-muted:    rgba(255, 255, 255, 0.65);
    --ng-border:   rgba(255, 255, 255, 0.10);
    --ng-shadow-sm: 0 4px 20px rgba(0, 0, 0, 0.06);
    --ng-shadow-md: 0 12px 36px rgba(0, 0, 0, 0.09);
    --ng-shadow-lg: 0 20px 50px rgba(0, 0, 0, 0.14);
}

/* ── Global Headings & Text Color Fixes for Light Sections ─── */
/* Overrides body.dark-scheme so all titles on light backgrounds are bold, crisp, and 100% readable */
.ng-section-title {
    font-family: var(--font-heading);
    font-size: clamp(28px, 3.8vw, 44px);
    font-weight: 800;
    line-height: 1.18;
    letter-spacing: -0.01em;
    margin-bottom: 16px;
    color: #0d1f2d !important; /* Deep luxury navy: maximum readability on light backgrounds */
}
.ng-section-title--light {
    color: #ffffff !important; /* For dark sections */
}

.text-navy {
    color: #0d1f2d !important;
}
.text-navy-muted {
    color: #475569 !important;
}

.ng-section-sub {
    font-family: var(--font-sans);
    font-size: clamp(14px, 1.3vw, 16.5px);
    line-height: 1.75;
    max-width: 680px;
    margin-bottom: 0;
    color: #4b5563 !important; /* Crisp slate grey for high contrast on light canvas */
}
.ng-section-sub--light {
    color: rgba(255, 255, 255, 0.75) !important;
}

/* ── Shared Eyebrows ─────────────────────────────────────── */
.ng-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    font-family: var(--font-heading);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.26em;
    text-transform: uppercase;
    color: var(--ng-gold);
    margin-bottom: 18px;
}
.ng-eyebrow::before {
    content: '';
    display: block;
    width: 28px;
    height: 1.5px;
    background: var(--ng-gold);
    flex-shrink: 0;
}
.ng-eyebrow--green {
    color: var(--ng-green);
}
.ng-eyebrow--green::before {
    background: var(--ng-green);
}

/* ── Reveal Animations ─────────────────────────────────── */
.ng-reveal {
    opacity: 0;
    transform: translateY(28px);
    transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    will-change: opacity, transform;
}
.ng-reveal-left {
    opacity: 0;
    transform: translateX(-30px);
    transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    will-change: opacity, transform;
}
.ng-reveal-right {
    opacity: 0;
    transform: translateX(30px);
    transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    will-change: opacity, transform;
}
.ng-visible {
    opacity: 1 !important;
    transform: translate(0, 0) !important;
}

/* =========================================================
   1 · CINEMATIC HERO
   ========================================================= */
.ng-hero {
    position: relative;
    width: 100%;
    min-height: 88vh;
    overflow: hidden;
    display: flex;
    align-items: center;
    padding-top: 100px;
    padding-bottom: 80px;
    background: var(--ng-navy);
}
.ng-hero__bg {
    position: absolute;
    inset: -6%;
    background: url('{{ asset("images/projects/rrr-prekshitha/aerial-drone-banner.webp") }}') center/cover no-repeat;
    transform: translateY(0);
    will-change: transform;
}
.ng-hero__overlay {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(to right, rgba(13,31,45,0.95) 0%, rgba(13,31,45,0.82) 50%, rgba(13,31,45,0.48) 100%),
        linear-gradient(to top, rgba(13,31,45,0.98) 0%, rgba(13,31,45,0.2) 60%);
}
.ng-hero__content {
    position: relative;
    z-index: 3;
    width: 100%;
    animation: ng-hero-fade 0.9s cubic-bezier(0.16, 1, 0.3, 1) both;
}
@keyframes ng-hero-fade {
    from { opacity: 0; transform: translateY(24px); }
    to   { opacity: 1; transform: translateY(0); }
}

.ng-hero__h1 {
    font-family: var(--font-heading);
    font-size: clamp(32px, 4.6vw, 62px);
    font-weight: 800;
    line-height: 1.08;
    letter-spacing: -0.015em;
    color: #fff !important;
    margin-bottom: 20px;
}
.ng-hero__h1 em {
    font-style: normal;
    color: var(--ng-gold);
}
.ng-hero__sub {
    font-family: var(--font-sans);
    font-size: clamp(14px, 1.35vw, 16px);
    line-height: 1.75;
    color: rgba(255, 255, 255, 0.82) !important;
    max-width: 620px;
    margin-bottom: 32px;
}
.ng-hero__btn-group {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 16px;
}

/* Hero Custom Buttons */
.ng-btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 13px 26px;
    background: var(--ng-gold);
    color: var(--ng-navy) !important;
    font-family: var(--font-heading);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    text-decoration: none;
    border-radius: 4px;
    box-shadow: 0 8px 24px rgba(201, 168, 76, 0.28);
    transition: transform 0.25s ease, box-shadow 0.25s ease, background-color 0.25s ease;
}
.ng-btn-primary:hover {
    background: #d4b55c;
    color: var(--ng-navy) !important;
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(201, 168, 76, 0.38);
}
.ng-btn-outline {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 12px 24px;
    background: rgba(255, 255, 255, 0.05);
    border: 1.5px solid rgba(255, 255, 255, 0.35);
    color: #fff !important;
    font-family: var(--font-heading);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    text-decoration: none;
    border-radius: 4px;
    backdrop-filter: blur(10px);
    transition: all 0.25s ease;
}
.ng-btn-outline:hover {
    border-color: var(--ng-gold);
    color: var(--ng-gold) !important;
    background: rgba(201, 168, 76, 0.12);
    transform: translateY(-2px);
}

/* Hero Credential Strip */
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
    padding: 20px 28px;
    border-right: 1px solid var(--ng-border);
    text-align: left;
    backdrop-filter: blur(16px);
    background: rgba(13, 31, 45, 0.82);
}
.ng-hero__stat-val {
    font-family: var(--font-heading);
    font-size: 13.5px;
    font-weight: 800;
    color: #fff !important;
    line-height: 1.2;
    margin-bottom: 4px;
    letter-spacing: 0.04em;
}
.ng-hero__stat-lbl {
    font-family: var(--font-heading);
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--ng-gold);
}

/* Scroll progress indicator */
.ng-hero__progress {
    position: absolute;
    left: 36px;
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
    height: 70px;
    background: linear-gradient(to bottom, var(--ng-gold), transparent);
    animation: ng-scroll-pulse 2.2s ease-in-out infinite;
}
@keyframes ng-scroll-pulse {
    0%, 100% { opacity: 0.35; transform: scaleY(0.85); }
    50%      { opacity: 1;    transform: scaleY(1.0); }
}
.ng-hero__progress-label {
    writing-mode: vertical-rl;
    font-family: var(--font-heading);
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.45);
}

@media (max-width: 991px) {
    .ng-hero__stats { position: static; width: 100%; margin-top: 36px; }
    .ng-hero__stat { flex: 1; padding: 14px 12px; }
    .ng-hero__stat-val { font-size: 12px; }
    .ng-hero__progress { display: none; }
}

/* =========================================================
   2 · WHY INVEST WITH NAVAGRUHA (LIGHT SECTION)
   ========================================================= */
.ng-why-invest {
    background: #ffffff;
    padding: 100px 0;
}
.ng-pillar-card {
    position: relative;
    background: #ffffff;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 34px 28px;
    height: 100%;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.ng-pillar-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--ng-shadow-md);
    border-color: rgba(201, 168, 76, 0.45);
}
.ng-pillar-card__top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
}
.ng-pillar-card__icon {
    width: 54px;
    height: 54px;
    border-radius: 8px;
    background: #fdfbf7;
    border: 1.5px solid rgba(201, 168, 76, 0.3);
    color: var(--ng-gold);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    transition: background 0.3s ease, color 0.3s ease;
}
.ng-pillar-card:hover .ng-pillar-card__icon {
    background: var(--ng-navy);
    color: var(--ng-gold);
    border-color: var(--ng-navy);
}
.ng-pillar-card__num {
    font-family: var(--font-heading);
    font-size: 20px;
    font-weight: 800;
    color: #cbd5e1;
    letter-spacing: 0.05em;
}
.ng-pillar-card__title {
    font-family: var(--font-heading);
    font-size: 19px;
    font-weight: 700;
    color: #0d1f2d !important;
    margin-bottom: 12px;
    line-height: 1.3;
}
.ng-pillar-card__desc {
    font-family: var(--font-sans);
    font-size: 14px;
    line-height: 1.7;
    color: #4b5563 !important;
    margin-bottom: 0;
}
.ng-pillar-card__border-bar {
    position: absolute;
    bottom: 0;
    left: 28px;
    right: 28px;
    height: 2px;
    background: transparent;
    transition: background 0.3s ease;
}
.ng-pillar-card:hover .ng-pillar-card__border-bar {
    background: var(--ng-gold);
}

/* =========================================================
   3 · HYDERABAD REAL ESTATE & LOCATION STORY (WARM NEUTRAL)
   ========================================================= */
.ng-location {
    background: var(--ng-warm-bg);
    padding: 110px 0;
    border-top: 1px solid #e8e5dc;
    border-bottom: 1px solid #e8e5dc;
}
.ng-story-lead {
    font-family: var(--font-heading);
    font-size: 17px;
    line-height: 1.65;
    color: #0d1f2d !important;
    font-weight: 600;
    margin-bottom: 20px;
    padding-left: 18px;
    border-left: 3px solid var(--ng-gold);
}
.ng-story-p {
    font-family: var(--font-sans);
    font-size: 15px;
    line-height: 1.8;
    color: #374151 !important;
    margin-bottom: 18px;
}
.ng-location-hub-card {
    background: #ffffff;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}
.ng-location-hub-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--ng-shadow-sm);
    border-color: #cbd5e1;
}
.ng-location-hub-card__img {
    height: 130px;
    width: 100%;
    object-fit: cover;
    background: #edf2f7;
}
.ng-location-hub-card__body {
    padding: 18px 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.ng-location-hub-card__title {
    font-family: var(--font-heading);
    font-size: 15px;
    font-weight: 700;
    color: #0d1f2d !important;
    line-height: 1.35;
    margin-bottom: 6px;
}
.ng-location-hub-card__desc {
    font-family: var(--font-sans);
    font-size: 12.5px;
    line-height: 1.55;
    color: #4b5563 !important;
    margin-bottom: 14px;
}
.ng-location-hub-card__meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 10px;
    border-top: 1px solid #f1f5f9;
}
.ng-pill-distance {
    font-family: var(--font-heading);
    font-size: 12px;
    font-weight: 700;
    color: #0d1f2d !important;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.ng-pill-time {
    background: rgba(113, 182, 68, 0.12);
    color: #3b6c1e !important;
    font-family: var(--font-heading);
    font-size: 10.5px;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 100px;
    letter-spacing: 0.06em;
}

/* =========================================================
   4 · THE FOUR PILLARS (BUYER'S GUIDE - LUXURY NAVY)
   ========================================================= */
.ng-buyers-guide {
    background: var(--ng-navy2);
    color: #ffffff;
    padding: 110px 0;
    position: relative;
    overflow: hidden;
}
.ng-buyers-guide::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(201, 168, 76, 0.06) 0%, transparent 70%);
    pointer-events: none;
}
.ng-pillar-box {
    background: rgba(13, 31, 45, 0.65);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 8px;
    padding: 36px 30px;
    height: 100%;
    backdrop-filter: blur(12px);
    transition: transform 0.3s ease, border-color 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.ng-pillar-box:hover {
    transform: translateY(-5px);
    border-color: rgba(201, 168, 76, 0.4);
}
.ng-pillar-box__head {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 20px;
}
.ng-pillar-box__num {
    font-family: var(--font-heading);
    font-size: 32px;
    font-weight: 800;
    color: rgba(255, 255, 255, 0.22);
    line-height: 1;
}
.ng-pillar-box__tag {
    font-family: var(--font-heading);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: var(--ng-gold);
    background: rgba(201, 168, 76, 0.12);
    padding: 4px 12px;
    border-radius: 100px;
    border: 1px solid rgba(201, 168, 76, 0.25);
}
.ng-pillar-box__title {
    font-family: var(--font-heading);
    font-size: 21px;
    font-weight: 700;
    color: #ffffff !important;
    margin-bottom: 14px;
}
.ng-pillar-box__desc {
    font-family: var(--font-sans);
    font-size: 14px;
    line-height: 1.75;
    color: rgba(255, 255, 255, 0.72) !important;
    margin-bottom: 24px;
}
.ng-pillar-box__takeaway {
    background: rgba(255, 255, 255, 0.04);
    border-left: 2.5px solid var(--ng-green);
    padding: 10px 14px;
    border-radius: 0 4px 4px 0;
    font-family: var(--font-sans);
    font-size: 12.5px;
    color: rgba(255, 255, 255, 0.90) !important;
    line-height: 1.5;
}

/* =========================================================
   5 · FREQUENTLY ASKED QUESTIONS (SOFT NEUTRAL)
   ========================================================= */
.ng-faq {
    background: #f8f9fa;
    padding: 110px 0;
    border-top: 1px solid #e9ecef;
}
.ng-faq .ng-section-title {
    color: #0d1f2d !important;
}
.ng-faq .ng-section-sub {
    color: #4b5563 !important;
}

.ng-faq-accordion {
    margin-top: 10px;
}
.ng-faq-item {
    background: #ffffff;
    border: 1.5px solid #e2e8f0;
    border-radius: 8px;
    margin-bottom: 16px;
    overflow: hidden;
    transition: border-color 0.25s ease, box-shadow 0.25s ease;
}
.ng-faq-item.active {
    border-color: var(--ng-gold);
    box-shadow: 0 4px 20px rgba(201, 168, 76, 0.14);
}
.ng-faq-question {
    padding: 22px 26px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    user-select: none;
    font-family: var(--font-heading);
    font-size: 16.5px;
    font-weight: 700;
    color: #0d1f2d !important; /* Deep navy: high contrast and crystal clear */
    transition: color 0.2s ease;
}
.ng-faq-item.active .ng-faq-question {
    color: #b38b29 !important;
}
.ng-faq-icon {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    color: #0d1f2d !important;
    transition: transform 0.3s ease, background 0.2s ease, color 0.2s ease;
    flex-shrink: 0;
}
.ng-faq-item.active .ng-faq-icon {
    transform: rotate(45deg);
    background: var(--ng-gold);
    color: var(--ng-navy) !important;
}
.ng-faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s cubic-bezier(0.16, 1, 0.3, 1), padding 0.3s ease;
    padding: 0 26px;
    font-family: var(--font-sans);
    font-size: 14.5px;
    line-height: 1.75;
    color: #374151 !important; /* Rich dark grey text: easily readable */
}
.ng-faq-item.active .ng-faq-answer {
    padding: 0 26px 22px 26px;
}

/* =========================================================
   6 · EXPERIENCE IT IN PERSON (CTA & SITE VISIT FORM)
   ========================================================= */
.ng-cta {
    background: var(--ng-navy);
    color: #ffffff;
    padding: 120px 0;
    position: relative;
    overflow: hidden;
}
.ng-cta::after {
    content: '';
    position: absolute;
    bottom: -150px;
    left: -150px;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(113, 182, 68, 0.08) 0%, transparent 70%);
    pointer-events: none;
}
.ng-cta-form-card {
    background: rgba(21, 42, 58, 0.85);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 12px;
    padding: 38px 34px;
    backdrop-filter: blur(16px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
}
.ng-cta-form-card__title {
    font-family: var(--font-heading);
    font-size: 20px;
    font-weight: 800;
    color: #ffffff !important;
    margin-bottom: 6px;
}
.ng-cta-form-card__sub {
    font-family: var(--font-sans);
    font-size: 13px;
    color: rgba(255, 255, 255, 0.65) !important;
    margin-bottom: 24px;
}
.ng-form-group {
    margin-bottom: 18px;
}
.ng-form-label {
    display: block;
    font-family: var(--font-heading);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.85) !important;
    margin-bottom: 6px;
}
.ng-form-control {
    width: 100%;
    padding: 12px 14px;
    background: rgba(13, 31, 45, 0.8);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 6px;
    color: #ffffff !important;
    font-family: var(--font-sans);
    font-size: 14px;
    transition: border-color 0.2s ease;
}
.ng-form-control:focus {
    outline: none;
    border-color: var(--ng-gold);
    background: rgba(13, 31, 45, 0.95);
    box-shadow: 0 0 0 3px rgba(201, 168, 76, 0.15);
}
.ng-form-select {
    width: 100%;
    padding: 12px 14px;
    background: rgba(13, 31, 45, 0.8);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 6px;
    color: #ffffff !important;
    font-family: var(--font-sans);
    font-size: 14px;
    transition: border-color 0.2s ease;
}
.ng-form-select:focus {
    outline: none;
    border-color: var(--ng-gold);
    box-shadow: 0 0 0 3px rgba(201, 168, 76, 0.15);
}
.ng-form-select option {
    background: var(--ng-navy);
    color: #ffffff;
}

.ng-contact-badge {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 16px 20px;
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 8px;
    margin-bottom: 12px;
    text-decoration: none;
    color: #ffffff !important;
    transition: background 0.25s, border-color 0.25s;
}
.ng-contact-badge:hover {
    background: rgba(201, 168, 76, 0.08);
    border-color: rgba(201, 168, 76, 0.35);
    color: var(--ng-gold) !important;
}
.ng-contact-badge__icon {
    width: 44px;
    height: 44px;
    border-radius: 6px;
    background: rgba(201, 168, 76, 0.15);
    color: var(--ng-gold);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}
.ng-contact-badge__lbl {
    font-family: var(--font-heading);
    font-size: 9.5px;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.55);
    margin-bottom: 2px;
}
.ng-contact-badge__val {
    font-family: var(--font-heading);
    font-size: 15px;
    font-weight: 700;
}

/* ── Mobile Polish ─────────────────────────────────────── */
@media (max-width: 768px) {
    .ng-hero { padding-top: 85px; min-height: auto; }
    .ng-hero__h1 { font-size: 34px; }
    .ng-hero__btn-group { flex-direction: column; align-items: stretch; }
    .ng-btn-primary, .ng-btn-outline { justify-content: center; width: 100%; }
    .ng-why-invest, .ng-location, .ng-buyers-guide, .ng-faq, .ng-cta {
        padding: 70px 0;
    }
    .ng-cta-form-card { padding: 26px 20px; }
}
</style>
@endpush

@section('content')

    <!-- ==============================================================
         1 · CINEMATIC HERO
         ============================================================== -->
    <section class="ng-hero" id="hero">
        <div class="ng-hero__bg" id="ng-parallax-bg"></div>
        <div class="ng-hero__overlay"></div>

        <!-- Vertical scroll line -->
        <div class="ng-hero__progress">
            <div class="ng-hero__progress-line"></div>
            <span class="ng-hero__progress-label">Scroll to Explore</span>
        </div>

        <div class="container relative z-2">
            <div class="row align-items-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="ng-hero__content">
                        <div class="ng-eyebrow">INVESTOR CORNER</div>
                        <h1 class="ng-hero__h1">
                            Invest With Clarity.<br><em>Build With Confidence</em>
                        </h1>
                        <p class="ng-hero__sub">
                            A strategically planned plotted residential development near AIIMS Bibinagar on the NH-163 Warangal corridor, backed by final HMDA layout approvals, TSRERA registration, clear marketable titles, and immediate spot registration.
                        </p>
                        <div class="ng-hero__btn-group">
                            <a href="#why-invest" class="ng-btn-primary">
                                <span><i class="fa-solid fa-shield-halved me-2"></i> Why Invest with Navagruha</span>
                            </a>
                            <a href="#site-visit-form" class="ng-btn-outline">
                                <span><i class="fa-solid fa-calendar-check me-2"></i> Schedule a Site Visit</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating credential badges -->
        <div class="ng-hero__stats">
            <div class="ng-hero__stat">
                <div class="ng-hero__stat-val">HMDA Sanctioned</div>
                <div class="ng-hero__stat-lbl">LP No: 000022/2023</div>
            </div>
            <div class="ng-hero__stat">
                <div class="ng-hero__stat-val">TSRERA Form C</div>
                <div class="ng-hero__stat-lbl">Certified Venture</div>
            </div>
            <div class="ng-hero__stat d-none d-sm-block">
                <div class="ng-hero__stat-val">Spot Registration</div>
                <div class="ng-hero__stat-lbl">Bibinagar SRO</div>
            </div>
        </div>
    </section>

    <!-- ==============================================================
         2 · WHY INVEST WITH NAVAGRUHA (LIGHT SECTION)
         ============================================================== -->
    <section class="ng-why-invest" id="why-invest">
        <div class="container">
            <div class="text-center max-w-700 mx-auto mb-5">
                <div class="ng-eyebrow ng-eyebrow--green ng-reveal justify-content-center">WHAT SETS US APART</div>
                <h2 class="ng-section-title ng-reveal">Why Invest with Navagruha</h2>
                <p class="ng-section-sub mx-auto ng-reveal">
                    Our developments focus on strategic location selection, HMDA town planning standards, verified documentation, and long-term asset value.
                </p>
            </div>

            <div class="row g-4">
                @foreach($whyInvest as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="ng-pillar-card ng-reveal">
                            <div>
                                <div class="ng-pillar-card__top">
                                    <div class="ng-pillar-card__icon">
                                        <i class="fa-solid {{ $item['icon'] }}"></i>
                                    </div>
                                    <span class="ng-pillar-card__num">{{ $item['number'] }}</span>
                                </div>
                                <h3 class="ng-pillar-card__title">{{ $item['title'] }}</h3>
                                <p class="ng-pillar-card__desc">{{ $item['desc'] }}</p>
                            </div>
                            <div class="ng-pillar-card__border-bar"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==============================================================
         3 · HYDERABAD REAL ESTATE & LOCATION STORY (WARM NEUTRAL)
         ============================================================== -->
    <section class="ng-location" id="location">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Left Editorial Column -->
                <div class="col-lg-5">
                    <div class="ng-reveal-left">
                        <div class="ng-eyebrow">{{ $hyderabadStory['eyebrow'] }}</div>
                        <h2 class="ng-section-title">{{ $hyderabadStory['headline'] }}</h2>
                        <div class="ng-story-lead">
                            "{{ $hyderabadStory['lead'] }}"
                        </div>
                        @foreach($hyderabadStory['paragraphs'] as $para)
                            <p class="ng-story-p">{{ $para }}</p>
                        @endforeach
                        <div class="mt-4">
                            <a href="{{ route('location') }}" class="ng-btn-primary" style="background: var(--ng-navy); color: #fff !important;">
                                <span><i class="fa-solid fa-map-location-dot me-2"></i> Explore Location &amp; Growth Map</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Proximity Cards Grid -->
                <div class="col-lg-7">
                    <div class="row g-3 ng-reveal-right">
                        @foreach($locationHighlights as $loc)
                            <div class="col-md-6 col-12">
                                <div class="ng-location-hub-card">
                                    @if(!empty($loc['image']))
                                        <img src="{{ $loc['image'] }}" alt="{{ $loc['name'] }}" class="ng-location-hub-card__img" loading="lazy">
                                    @else
                                        <div class="ng-location-hub-card__img d-flex align-items-center justify-content-center bg-light">
                                            <i class="fa-solid {{ $loc['icon'] }} fs-2 text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="ng-location-hub-card__body">
                                        <div>
                                            <h4 class="ng-location-hub-card__title">{{ $loc['name'] }}</h4>
                                            <p class="ng-location-hub-card__desc">{{ $loc['desc'] }}</p>
                                        </div>
                                        <div class="ng-location-hub-card__meta">
                                            <span class="ng-pill-distance">
                                                <i class="fa-solid fa-location-arrow text-gold"></i> {{ $loc['distance'] }}
                                            </span>
                                            <span class="ng-pill-time">
                                                <i class="fa-regular fa-clock me-1"></i> {{ $loc['time'] }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================================
         4 · THE FOUR PILLARS (BUYER'S GUIDE - LUXURY NAVY)
         ============================================================== -->
    <section class="ng-buyers-guide" id="buyers-guide">
        <div class="container relative z-2">
            <div class="text-center max-w-700 mx-auto mb-5">
                <div class="ng-eyebrow ng-reveal justify-content-center">BUYER'S GUIDE &amp; PRINCIPLES</div>
                <h2 class="ng-section-title ng-section-title--light ng-reveal">The Four Pillars of Confident Investing</h2>
                <p class="ng-section-sub ng-section-sub--light mx-auto ng-reveal">
                    Clear principles that protect your capital, guarantee on-ground quality, and ensure seamless, transparent land ownership.
                </p>
            </div>

            <div class="row g-4">
                @foreach($buyersGuide as $pillar)
                    <div class="col-lg-6 col-12">
                        <div class="ng-pillar-box ng-reveal">
                            <div>
                                <div class="ng-pillar-box__head">
                                    <span class="ng-pillar-box__tag">{{ $pillar['tagline'] }}</span>
                                    <span class="ng-pillar-box__num">{{ $pillar['number'] }}</span>
                                </div>
                                <h3 class="ng-pillar-box__title">{{ $pillar['title'] }}</h3>
                                <p class="ng-pillar-box__desc">{{ $pillar['desc'] }}</p>
                            </div>
                            <div class="ng-pillar-box__takeaway">
                                <i class="fa-solid fa-circle-check text-green me-2"></i> {{ $pillar['takeaway'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==============================================================
         5 · FREQUENTLY ASKED QUESTIONS (SOFT NEUTRAL)
         ============================================================== -->
    <section class="ng-faq" id="faq">
        <div class="container">
            <div class="text-center max-w-700 mx-auto mb-5">
                <div class="ng-eyebrow ng-reveal justify-content-center">CLARITY &amp; DILIGENCE</div>
                <h2 class="ng-section-title ng-reveal">Frequently Asked Questions</h2>
                <p class="ng-section-sub mx-auto ng-reveal">
                    Essential answers regarding approvals, documentation, site visits, plot ownership, and spot registration.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="ng-faq-accordion ng-reveal">
                        @foreach($faqs as $index => $faq)
                            <div class="ng-faq-item {{ $index === 0 ? 'active' : '' }}" id="faq-item-{{ $index }}">
                                <div class="ng-faq-question" onclick="toggleFaq({{ $index }})">
                                    <span>{{ $faq['question'] }}</span>
                                    <div class="ng-faq-icon"><i class="fa-solid fa-plus"></i></div>
                                </div>
                                <div class="ng-faq-answer" style="{{ $index === 0 ? 'max-height: 300px;' : '' }}">
                                    <p class="mb-0">{{ $faq['answer'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Direct Support Strip -->
                    <div class="text-center mt-5 ng-reveal">
                        <p class="text-navy-muted fs-14 mb-2">Have a specific legal or project question that isn't answered here?</p>
                        <a href="tel:+919617699699" class="font-heading fs-15 text-navy text-decoration-none fw-bold">
                            <i class="fa-solid fa-phone text-gold me-2"></i> Speak with our Venture Coordinator: +91 9617 699 699
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================================
         6 · EXPERIENCE IT IN PERSON (CTA & SITE VISIT FORM)
         ============================================================== -->
    <section class="ng-cta" id="site-visit-form">
        <div class="container relative z-2">
            <div class="row g-5 align-items-center">
                <!-- Left Details Column -->
                <div class="col-lg-6">
                    <div class="ng-reveal-left">
                        <div class="ng-eyebrow">EXPERIENCE IT IN PERSON</div>
                        <h2 class="ng-section-title ng-section-title--light">Explore the Opportunity in Person</h2>
                        <p class="ng-hero__sub">
                            Visit the project, understand the location, review the details and make an informed decision. Walk through the layout, inspect individual plot boundaries, and examine original documentation.
                        </p>

                        <!-- Key Benefits List -->
                        <div class="mb-4">
                            <div class="d-flex align-items-start gap-3 mb-3 text-white-50 fs-14">
                                <i class="fa-solid fa-circle-check text-green mt-1"></i>
                                <span>Complimentary cab pickup available from Uppal Metro Station and Ghatkesar ORR Exit 9.</span>
                            </div>
                            <div class="d-flex align-items-start gap-3 mb-3 text-white-50 fs-14">
                                <i class="fa-solid fa-circle-check text-green mt-1"></i>
                                <span>Dedicated layout orientation with physical boundary pegs and facing verification.</span>
                            </div>
                            <div class="d-flex align-items-start gap-3 mb-3 text-white-50 fs-14">
                                <i class="fa-solid fa-circle-check text-green mt-1"></i>
                                <span>Original government sanction orders and link title documents available for on-site inspection.</span>
                            </div>
                        </div>

                        <!-- Direct Contact Badges -->
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <a href="tel:+919617699699" class="ng-contact-badge">
                                    <div class="ng-contact-badge__icon"><i class="fa-solid fa-phone"></i></div>
                                    <div>
                                        <div class="ng-contact-badge__lbl">Direct Assistance</div>
                                        <div class="ng-contact-badge__val">+91 9617 699 699</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="https://wa.me/919617699699?text=Hello%20Navagruha%20Team%2C%20I%20would%20like%20to%20schedule%20a%20site%20visit%20for%20RRR%20Prekshitha%20Enclave." target="_blank" class="ng-contact-badge">
                                    <div class="ng-contact-badge__icon" style="background: rgba(37, 211, 102, 0.15); color: #25d366;">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </div>
                                    <div>
                                        <div class="ng-contact-badge__lbl">Instant Message</div>
                                        <div class="ng-contact-badge__val">Chat on WhatsApp</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('plots.index') }}" class="ng-btn-outline">
                                <span><i class="fa-solid fa-layer-group me-2"></i> View Interactive Plot Inventory</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Form Column -->
                <div class="col-lg-6">
                    <div class="ng-cta-form-card ng-reveal-right">
                        <div class="ng-cta-form-card__title">Schedule a Guided Site Visit</div>
                        <p class="ng-cta-form-card__sub">
                            Fill in your details below and our venture coordinator will confirm your visit and complimentary transit.
                        </p>

                        @if(session('success'))
                            <div class="alert alert-success bg-success bg-opacity-25 text-white border-success border-opacity-50 mb-4 p-3 rounded-2 fs-13">
                                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="message" value="Site visit request submitted from Investor Corner page.">

                            <div class="row g-3">
                                <div class="col-md-6 col-12 ng-form-group">
                                    <label class="ng-form-label" for="visit_name">Full Name *</label>
                                    <input type="text" id="visit_name" name="name" class="ng-form-control" placeholder="Your name" required value="{{ old('name') }}">
                                </div>
                                <div class="col-md-6 col-12 ng-form-group">
                                    <label class="ng-form-label" for="visit_phone">Phone Number *</label>
                                    <input type="tel" id="visit_phone" name="phone" class="ng-form-control" placeholder="+91 98765 43210" required value="{{ old('phone') }}">
                                </div>

                                <div class="col-12 ng-form-group">
                                    <label class="ng-form-label" for="visit_email">Email Address (Optional)</label>
                                    <input type="email" id="visit_email" name="email" class="ng-form-control" placeholder="you@example.com" value="{{ old('email') }}">
                                </div>

                                <div class="col-md-6 col-12 ng-form-group">
                                    <label class="ng-form-label" for="preferred_visit_date">Preferred Date</label>
                                    <input type="date" id="preferred_visit_date" name="preferred_visit_date" class="ng-form-control" min="{{ date('Y-m-d') }}" value="{{ old('preferred_visit_date', date('Y-m-d', strtotime('+1 day'))) }}">
                                </div>
                                <div class="col-md-6 col-12 ng-form-group">
                                    <label class="ng-form-label" for="time_slot">Preferred Time</label>
                                    <select id="time_slot" name="time_slot" class="ng-form-select">
                                        <option value="Morning (10:00 AM)">Morning (10:00 AM)</option>
                                        <option value="Afternoon (02:00 PM)">Afternoon (02:00 PM)</option>
                                        <option value="Evening (04:30 PM)">Evening (04:30 PM)</option>
                                    </select>
                                </div>

                                <div class="col-12 ng-form-group">
                                    <label class="ng-form-label" for="pickup_location">Complimentary Transit / Pickup</label>
                                    <select id="pickup_location" name="pickup_location" class="ng-form-select">
                                        <option value="Uppal Metro Station (Pickup)">Pickup from Uppal Metro Station</option>
                                        <option value="Ghatkesar ORR Exit 9 (Pickup)">Pickup from Ghatkesar ORR Exit 9</option>
                                        <option value="Self Drive / Direct to Site">Self Drive (Meet at Venture Site)</option>
                                    </select>
                                </div>

                                <div class="col-12 mt-3">
                                    <button type="submit" class="ng-btn-primary w-100 justify-content-center py-3">
                                        <span><i class="fa-solid fa-calendar-check me-2"></i> Confirm Guided Site Visit</span>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="d-flex align-items-center justify-content-center gap-2 mt-3 text-white-50 fs-11 text-center">
                            <i class="fa-solid fa-shield-halved text-gold"></i>
                            <span>Zero obligation &bull; Free site visit consultation &bull; Your details are strictly confidential</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
(function () {
    'use strict';

    /* ── 1. Parallax Hero Background on Scroll ─────────────── */
    var heroBg = document.getElementById('ng-parallax-bg');
    if (heroBg) {
        window.addEventListener('scroll', function () {
            var y = window.scrollY;
            heroBg.style.transform = 'translateY(' + (y * 0.25) + 'px)';
        }, { passive: true });
    }

    /* ── 2. Intersection Observer for Scroll Reveals ───────── */
    var revealSelectors = [
        '.ng-reveal',
        '.ng-reveal-left',
        '.ng-reveal-right'
    ];
    var revealEls = document.querySelectorAll(revealSelectors.join(','));

    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('ng-visible');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.05, rootMargin: '0px 0px 50px 0px' });

        revealEls.forEach(function (el) { io.observe(el); });
    } else {
        revealEls.forEach(function (el) { el.classList.add('ng-visible'); });
    }

    /* ── 3. Smooth Anchor Scrolling ────────────────────────── */
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            var targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                var target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    var offset = 80;
                    var top = target.getBoundingClientRect().top + window.scrollY - offset;
                    window.scrollTo({ top: top, behavior: 'smooth' });
                }
            }
        });
    });

})();

/* ── 4. Interactive FAQ Accordion Function ──────────────────── */
function toggleFaq(index) {
    var items = document.querySelectorAll('.ng-faq-item');
    items.forEach(function (item, idx) {
        var ans = item.querySelector('.ng-faq-answer');
        if (idx === index) {
            if (item.classList.contains('active')) {
                item.classList.remove('active');
                if (ans) ans.style.maxHeight = '0px';
            } else {
                item.classList.add('active');
                if (ans) ans.style.maxHeight = ans.scrollHeight + 40 + 'px';
            }
        } else {
            item.classList.remove('active');
            if (ans) ans.style.maxHeight = '0px';
        }
    });
}
</script>
@endpush
