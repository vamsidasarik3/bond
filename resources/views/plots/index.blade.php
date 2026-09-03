@extends('layouts.app')

@section('title', 'Plot Availability — Interactive Master Layout | RRR Prekshitha Enclave | AIIMS Bibinagar')
@section('meta_description', 'Explore all 158 residential, commercial, and villa plots at RRR Prekshitha Enclave with our interactive master site plan. Live availability, exact dimensions, 100% Vaastu — HMDA Final Approved near AIIMS Bibinagar.')

@section('content')

{{-- ============================================================
     PHP LAYOUT COMPUTATION — 158 AUTHENTIC PLOTS
     ============================================================ --}}
@php
use Illuminate\Support\Str;

/* ── Key plots by integer plot number (1 to 158) ── */
$plotsByNum = $allPlots->keyBy(function($p) {
    return (int) preg_replace('/\D/', '', $p['number']);
});

/* ── Authentic Master Layout Coordinates (Plots 1 to 158) ── */
$plotBoxes = [
    // --- EAST HIGHWAY & COMMERCIAL BLOCK (Plots 1 - 15) ---
    // North of 40-Ft Spine Road (Facing East 100ft road & West 30ft road)
    8  => ['x' => 1240, 'y' => 170.0, 'w' => 110, 'h' => 100.0],
    7  => ['x' => 1350, 'y' => 170.0, 'w' => 110, 'h' => 100.0],
    9  => ['x' => 1240, 'y' => 270.0, 'w' => 110, 'h' => 100.0],
    6  => ['x' => 1350, 'y' => 270.0, 'w' => 110, 'h' => 100.0],
    10 => ['x' => 1240, 'y' => 370.0, 'w' => 110, 'h' => 110.0],
    5  => ['x' => 1350, 'y' => 370.0, 'w' => 110, 'h' => 110.0],
    // South of 40-Ft Spine Road
    11 => ['x' => 1240, 'y' => 528.0, 'w' => 110, 'h' => 85.0],
    4  => ['x' => 1350, 'y' => 528.0, 'w' => 110, 'h' => 85.0],
    12 => ['x' => 1240, 'y' => 613.0, 'w' => 110, 'h' => 85.0],
    3  => ['x' => 1350, 'y' => 613.0, 'w' => 110, 'h' => 85.0],
    13 => ['x' => 1240, 'y' => 698.0, 'w' => 110, 'h' => 85.0],
    2  => ['x' => 1350, 'y' => 698.0, 'w' => 110, 'h' => 85.0],
    14 => ['x' => 1240, 'y' => 783.0, 'w' => 110, 'h' => 72.0],
    15 => ['x' => 1240, 'y' => 855.0, 'w' => 110, 'h' => 73.0],
    1  => ['x' => 1350, 'y' => 783.0, 'w' => 110, 'h' => 145.0],

    // --- BLOCK 2 (Plots 16 - 51) ---
    // North sector (y=80 to 480)
    34 => ['x' => 1025, 'y' => 80.0,  'w' => 90, 'h' => 49.1],
    33 => ['x' => 1115, 'y' => 80.0,  'w' => 90, 'h' => 49.1],
    35 => ['x' => 1025, 'y' => 129.1, 'w' => 90, 'h' => 49.1],
    32 => ['x' => 1115, 'y' => 129.1, 'w' => 90, 'h' => 49.1],
    36 => ['x' => 1025, 'y' => 178.3, 'w' => 90, 'h' => 49.1],
    31 => ['x' => 1115, 'y' => 178.3, 'w' => 90, 'h' => 49.1],
    37 => ['x' => 1025, 'y' => 227.4, 'w' => 90, 'h' => 49.1],
    30 => ['x' => 1115, 'y' => 227.4, 'w' => 90, 'h' => 49.1],
    38 => ['x' => 1025, 'y' => 276.6, 'w' => 90, 'h' => 49.1],
    29 => ['x' => 1115, 'y' => 276.6, 'w' => 90, 'h' => 49.1],
    39 => ['x' => 1025, 'y' => 325.7, 'w' => 90, 'h' => 49.1],
    28 => ['x' => 1115, 'y' => 325.7, 'w' => 90, 'h' => 49.1],
    40 => ['x' => 1025, 'y' => 374.9, 'w' => 90, 'h' => 49.1],
    27 => ['x' => 1115, 'y' => 374.9, 'w' => 90, 'h' => 49.1],
    41 => ['x' => 1025, 'y' => 424.0, 'w' => 90, 'h' => 56.0],
    26 => ['x' => 1115, 'y' => 424.0, 'w' => 90, 'h' => 56.0],
    // South sector (y=528 to 928)
    42 => ['x' => 1025, 'y' => 528.0, 'w' => 90, 'h' => 56.0],
    25 => ['x' => 1115, 'y' => 528.0, 'w' => 90, 'h' => 56.0],
    43 => ['x' => 1025, 'y' => 584.0, 'w' => 90, 'h' => 38.2],
    24 => ['x' => 1115, 'y' => 584.0, 'w' => 90, 'h' => 38.2],
    44 => ['x' => 1025, 'y' => 622.2, 'w' => 90, 'h' => 38.2],
    23 => ['x' => 1115, 'y' => 622.2, 'w' => 90, 'h' => 38.2],
    45 => ['x' => 1025, 'y' => 660.4, 'w' => 90, 'h' => 38.2],
    22 => ['x' => 1115, 'y' => 660.4, 'w' => 90, 'h' => 38.2],
    46 => ['x' => 1025, 'y' => 698.7, 'w' => 90, 'h' => 38.2],
    21 => ['x' => 1115, 'y' => 698.7, 'w' => 90, 'h' => 38.2],
    47 => ['x' => 1025, 'y' => 736.9, 'w' => 90, 'h' => 38.2],
    20 => ['x' => 1115, 'y' => 736.9, 'w' => 90, 'h' => 38.2],
    48 => ['x' => 1025, 'y' => 775.1, 'w' => 90, 'h' => 38.2],
    19 => ['x' => 1115, 'y' => 775.1, 'w' => 90, 'h' => 38.2],
    49 => ['x' => 1025, 'y' => 813.3, 'w' => 90, 'h' => 38.2],
    18 => ['x' => 1115, 'y' => 813.3, 'w' => 90, 'h' => 38.2],
    50 => ['x' => 1025, 'y' => 851.6, 'w' => 90, 'h' => 38.2],
    17 => ['x' => 1115, 'y' => 851.6, 'w' => 90, 'h' => 38.2],
    51 => ['x' => 1025, 'y' => 889.8, 'w' => 90, 'h' => 38.2],
    16 => ['x' => 1115, 'y' => 889.8, 'w' => 90, 'h' => 38.2],

    // --- BLOCK 3 (Plots 52 - 87) ---
    // North sector (y=80 to 480)
    70 => ['x' => 810, 'y' => 80.0,  'w' => 90, 'h' => 49.1],
    69 => ['x' => 900, 'y' => 80.0,  'w' => 90, 'h' => 49.1],
    71 => ['x' => 810, 'y' => 129.1, 'w' => 90, 'h' => 49.1],
    68 => ['x' => 900, 'y' => 129.1, 'w' => 90, 'h' => 49.1],
    72 => ['x' => 810, 'y' => 178.3, 'w' => 90, 'h' => 49.1],
    67 => ['x' => 900, 'y' => 178.3, 'w' => 90, 'h' => 49.1],
    73 => ['x' => 810, 'y' => 227.4, 'w' => 90, 'h' => 49.1],
    66 => ['x' => 900, 'y' => 227.4, 'w' => 90, 'h' => 49.1],
    74 => ['x' => 810, 'y' => 276.6, 'w' => 90, 'h' => 49.1],
    65 => ['x' => 900, 'y' => 276.6, 'w' => 90, 'h' => 49.1],
    75 => ['x' => 810, 'y' => 325.7, 'w' => 90, 'h' => 49.1],
    64 => ['x' => 900, 'y' => 325.7, 'w' => 90, 'h' => 49.1],
    76 => ['x' => 810, 'y' => 374.9, 'w' => 90, 'h' => 49.1],
    63 => ['x' => 900, 'y' => 374.9, 'w' => 90, 'h' => 49.1],
    77 => ['x' => 810, 'y' => 424.0, 'w' => 90, 'h' => 56.0],
    62 => ['x' => 900, 'y' => 424.0, 'w' => 90, 'h' => 56.0],
    // South sector (y=528 to 860)
    78 => ['x' => 810, 'y' => 528.0, 'w' => 90, 'h' => 56.0],
    61 => ['x' => 900, 'y' => 528.0, 'w' => 90, 'h' => 56.0],
    79 => ['x' => 810, 'y' => 584.0, 'w' => 90, 'h' => 34.5],
    60 => ['x' => 900, 'y' => 584.0, 'w' => 90, 'h' => 34.5],
    80 => ['x' => 810, 'y' => 618.5, 'w' => 90, 'h' => 34.5],
    59 => ['x' => 900, 'y' => 618.5, 'w' => 90, 'h' => 34.5],
    81 => ['x' => 810, 'y' => 653.0, 'w' => 90, 'h' => 34.5],
    58 => ['x' => 900, 'y' => 653.0, 'w' => 90, 'h' => 34.5],
    82 => ['x' => 810, 'y' => 687.5, 'w' => 90, 'h' => 34.5],
    57 => ['x' => 900, 'y' => 687.5, 'w' => 90, 'h' => 34.5],
    83 => ['x' => 810, 'y' => 722.0, 'w' => 90, 'h' => 34.5],
    56 => ['x' => 900, 'y' => 722.0, 'w' => 90, 'h' => 34.5],
    84 => ['x' => 810, 'y' => 756.5, 'w' => 90, 'h' => 34.5],
    55 => ['x' => 900, 'y' => 756.5, 'w' => 90, 'h' => 34.5],
    85 => ['x' => 810, 'y' => 791.0, 'w' => 90, 'h' => 34.5],
    54 => ['x' => 900, 'y' => 791.0, 'w' => 90, 'h' => 34.5],
    86 => ['x' => 810, 'y' => 825.5, 'w' => 90, 'h' => 34.5],
    53 => ['x' => 900, 'y' => 825.5, 'w' => 90, 'h' => 34.5],
    52 => ['x' => 900, 'y' => 860.0, 'w' => 90, 'h' => 45.0],

    // --- BLOCK 4 (Plots 87 - 120) ---
    // North sector (y=80 to 480)
    104 => ['x' => 595, 'y' => 80.0,  'w' => 90, 'h' => 49.1],
    103 => ['x' => 685, 'y' => 80.0,  'w' => 90, 'h' => 49.1],
    105 => ['x' => 595, 'y' => 129.1, 'w' => 90, 'h' => 49.1],
    102 => ['x' => 685, 'y' => 129.1, 'w' => 90, 'h' => 49.1],
    106 => ['x' => 595, 'y' => 178.3, 'w' => 90, 'h' => 49.1],
    101 => ['x' => 685, 'y' => 178.3, 'w' => 90, 'h' => 49.1],
    107 => ['x' => 595, 'y' => 227.4, 'w' => 90, 'h' => 49.1],
    100 => ['x' => 685, 'y' => 227.4, 'w' => 90, 'h' => 49.1],
    108 => ['x' => 595, 'y' => 276.6, 'w' => 90, 'h' => 49.1],
    99  => ['x' => 685, 'y' => 276.6, 'w' => 90, 'h' => 49.1],
    109 => ['x' => 595, 'y' => 325.7, 'w' => 90, 'h' => 49.1],
    98  => ['x' => 685, 'y' => 325.7, 'w' => 90, 'h' => 49.1],
    110 => ['x' => 595, 'y' => 374.9, 'w' => 90, 'h' => 49.1],
    97  => ['x' => 685, 'y' => 374.9, 'w' => 90, 'h' => 49.1],
    111 => ['x' => 595, 'y' => 424.0, 'w' => 90, 'h' => 56.0],
    96  => ['x' => 685, 'y' => 424.0, 'w' => 90, 'h' => 56.0],
    // South sector (y=528 to 928)
    112 => ['x' => 595, 'y' => 528.0, 'w' => 90, 'h' => 56.0],
    95  => ['x' => 685, 'y' => 528.0, 'w' => 90, 'h' => 56.0],
    113 => ['x' => 595, 'y' => 584.0, 'w' => 90, 'h' => 43.0],
    94  => ['x' => 685, 'y' => 584.0, 'w' => 90, 'h' => 43.0],
    114 => ['x' => 595, 'y' => 627.0, 'w' => 90, 'h' => 43.0],
    93  => ['x' => 685, 'y' => 627.0, 'w' => 90, 'h' => 43.0],
    115 => ['x' => 595, 'y' => 670.0, 'w' => 90, 'h' => 43.0],
    92  => ['x' => 685, 'y' => 670.0, 'w' => 90, 'h' => 43.0],
    116 => ['x' => 595, 'y' => 713.0, 'w' => 90, 'h' => 43.0],
    91  => ['x' => 685, 'y' => 713.0, 'w' => 90, 'h' => 43.0],
    117 => ['x' => 595, 'y' => 756.0, 'w' => 90, 'h' => 43.0],
    90  => ['x' => 685, 'y' => 756.0, 'w' => 90, 'h' => 43.0],
    118 => ['x' => 595, 'y' => 799.0, 'w' => 90, 'h' => 43.0],
    89  => ['x' => 685, 'y' => 799.0, 'w' => 90, 'h' => 43.0],
    119 => ['x' => 595, 'y' => 842.0, 'w' => 90, 'h' => 43.0],
    88  => ['x' => 685, 'y' => 842.0, 'w' => 90, 'h' => 43.0],
    120 => ['x' => 595, 'y' => 885.0, 'w' => 90, 'h' => 43.0],
    87  => ['x' => 685, 'y' => 885.0, 'w' => 90, 'h' => 43.0],

    // --- BLOCK 5 (Plots 121 - 150) ---
    // North sector: Estate plots + Villa plots (y=80 to 480)
    135 => ['x' => 360, 'y' => 80.0,  'w' => 200, 'h' => 65.0],
    136 => ['x' => 360, 'y' => 145.0, 'w' => 200, 'h' => 75.0],
    137 => ['x' => 360, 'y' => 220.0, 'w' => 100, 'h' => 51.0],
    134 => ['x' => 460, 'y' => 220.0, 'w' => 100, 'h' => 51.0],
    138 => ['x' => 360, 'y' => 271.0, 'w' => 100, 'h' => 51.0],
    133 => ['x' => 460, 'y' => 271.0, 'w' => 100, 'h' => 51.0],
    139 => ['x' => 360, 'y' => 322.0, 'w' => 100, 'h' => 51.0],
    132 => ['x' => 460, 'y' => 322.0, 'w' => 100, 'h' => 51.0],
    140 => ['x' => 360, 'y' => 373.0, 'w' => 100, 'h' => 51.0],
    131 => ['x' => 460, 'y' => 373.0, 'w' => 100, 'h' => 51.0],
    141 => ['x' => 360, 'y' => 424.0, 'w' => 100, 'h' => 56.0],
    130 => ['x' => 460, 'y' => 424.0, 'w' => 100, 'h' => 56.0],
    // South sector (y=528 to 928)
    142 => ['x' => 360, 'y' => 528.0, 'w' => 100, 'h' => 56.0],
    129 => ['x' => 460, 'y' => 528.0, 'w' => 100, 'h' => 56.0],
    143 => ['x' => 360, 'y' => 584.0, 'w' => 100, 'h' => 43.0],
    128 => ['x' => 460, 'y' => 584.0, 'w' => 100, 'h' => 43.0],
    144 => ['x' => 360, 'y' => 627.0, 'w' => 100, 'h' => 43.0],
    127 => ['x' => 460, 'y' => 627.0, 'w' => 100, 'h' => 43.0],
    145 => ['x' => 360, 'y' => 670.0, 'w' => 100, 'h' => 43.0],
    126 => ['x' => 460, 'y' => 670.0, 'w' => 100, 'h' => 43.0],
    146 => ['x' => 360, 'y' => 713.0, 'w' => 100, 'h' => 43.0],
    125 => ['x' => 460, 'y' => 713.0, 'w' => 100, 'h' => 43.0],
    147 => ['x' => 360, 'y' => 756.0, 'w' => 100, 'h' => 43.0],
    124 => ['x' => 460, 'y' => 756.0, 'w' => 100, 'h' => 43.0],
    148 => ['x' => 360, 'y' => 799.0, 'w' => 100, 'h' => 43.0],
    123 => ['x' => 460, 'y' => 799.0, 'w' => 100, 'h' => 43.0],
    149 => ['x' => 360, 'y' => 842.0, 'w' => 100, 'h' => 43.0],
    122 => ['x' => 460, 'y' => 842.0, 'w' => 100, 'h' => 43.0],
    150 => ['x' => 360, 'y' => 885.0, 'w' => 100, 'h' => 43.0],
    121 => ['x' => 460, 'y' => 885.0, 'w' => 100, 'h' => 43.0],

    // --- BLOCK 6 (West Executive & Social Infrastructure, Plots 151 - 158) ---
    // North sector (y=150 to 480)
    157 => ['x' => 190, 'y' => 150.0, 'w' => 67, 'h' => 165.0],
    156 => ['x' => 257, 'y' => 150.0, 'w' => 68, 'h' => 165.0],
    158 => ['x' => 190, 'y' => 315.0, 'w' => 67, 'h' => 165.0],
    155 => ['x' => 257, 'y' => 315.0, 'w' => 68, 'h' => 165.0],
    // South sector (y=528 to 860)
    154 => ['x' => 230, 'y' => 528.0, 'w' => 95, 'h' => 110.0],
    153 => ['x' => 230, 'y' => 638.0, 'w' => 95, 'h' => 74.0],
    152 => ['x' => 230, 'y' => 712.0, 'w' => 95, 'h' => 74.0],
    151 => ['x' => 230, 'y' => 786.0, 'w' => 95, 'h' => 74.0],
];

/* ── Status helpers ── */
$stClass = [
    'available' => 'status-available',
    'reserved'  => 'status-reserved',
    'booked'    => 'status-reserved',
    'sold'      => 'status-sold',
];
@endphp

{{-- ============================================================
     HERO BREADCRUMB BANNER
     ============================================================ --}}
<section class="section-dark text-light relative overflow-hidden py-5 border-bottom border-white-10 bg-brand-pattern"
    style="background: linear-gradient(135deg, rgba(14,26,36,.93) 0%, rgba(20,37,51,.85) 50%, rgba(35,65,89,.90) 100%),
           url('{{ asset('venture/photos/02.jpg') }}') center/cover no-repeat;">
    <div class="wm-hero-watermark" style="opacity:.04;">PLOTS</div>
    <div class="container relative z-2">
        <div class="row g-3 align-items-center justify-content-between">
            <div class="col-md-8">
                <div class="subtitle text-brand-secondary font-copperplate mb-2">
                    <i class="fa-solid fa-map me-1"></i> Interactive Master Layout — Live Availability
                </div>
                <h1 class="fs-48 text-white font-copperplate lh-1-1 mb-2">Find Your Plot</h1>
                <p class="text-white-50 fs-15 mb-0">
                    <span class="animated-counter fw-700 text-white font-copperplate" data-counter-target="{{ $totalCount }}">0</span>
                    plotted units &bull; HMDA Final Approved (LP No: 000022/LO/Plg/HMDA/2023) &bull; RERA Certified &bull; 100% Vaastu Compliant
                </p>
            </div>
            <div class="col-md-4 text-md-end d-flex flex-column align-items-md-end gap-2">
                <ul class="crumb text-light font-copperplate fs-12 list-inline mb-0">
                    <li class="list-inline-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a> &nbsp;/</li>
                    <li class="list-inline-item active text-brand-secondary">Plots</li>
                </ul>
                <a href="{{ asset('venture/docs/RRR PREKSHITHA ENCLAVE LAYOUT.pdf') }}" target="_blank" rel="noopener"
                   class="btn btn-outline-light font-copperplate fs-11 px-3 py-2 rounded-pill d-inline-flex align-items-center gap-1">
                    <i class="fa-solid fa-file-pdf text-danger"></i> Official Layout Blueprint
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     MAIN AVAILABILITY SECTION
     ============================================================ --}}
<section class="bg-brand-dark text-light" style="padding:48px 0 80px;">
    <div class="container">

        {{-- ── INVENTORY SUMMARY STRIP ── --}}
        <div class="inventory-summary mb-4" id="inventorySummaryStrip">
            <div class="inventory-summary-item">
                <div class="inventory-summary-number text-white animated-counter" data-counter-target="{{ $totalCount }}" data-counter-delay="0">0</div>
                <div class="inventory-summary-label">Total Plots</div>
            </div>
            <div class="inventory-summary-item">
                <div class="inventory-summary-number animated-counter" style="color:#71b644;" data-counter-target="{{ $availableCount }}" data-counter-delay="80">0</div>
                <div class="inventory-summary-label" style="color:rgba(113,182,68,.65);">Available</div>
            </div>
            <div class="inventory-summary-item">
                <div class="inventory-summary-number animated-counter" style="color:#f59e0b;" data-counter-target="{{ $reservedCount }}" data-counter-delay="160">0</div>
                <div class="inventory-summary-label" style="color:rgba(245,158,11,.65);">Reserved</div>
            </div>
            <div class="inventory-summary-item">
                <div class="inventory-summary-number animated-counter" style="color:#dc3526;" data-counter-target="{{ $soldCount }}" data-counter-delay="240">0</div>
                <div class="inventory-summary-label" style="color:rgba(220,53,38,.65);">Sold</div>
            </div>
        </div>

        {{-- ── CONTROLS BAR: Legend + Available-Only + View Toggle ── --}}
        <div class="view-controls-bar mb-4">
            {{-- Legend --}}
            <div class="d-flex align-items-center flex-wrap gap-3" role="list" aria-label="Plot status legend">
                <div class="d-flex align-items-center gap-2" role="listitem">
                    <span class="legend-dot legend-dot-available" aria-hidden="true"></span>
                    <span class="font-copperplate fs-12 text-white-50">Available <strong class="text-white ms-1 animated-counter" data-counter-target="{{ $availableCount }}">0</strong></span>
                </div>
                <div class="d-flex align-items-center gap-2" role="listitem">
                    <span class="legend-dot legend-dot-reserved" aria-hidden="true"></span>
                    <span class="font-copperplate fs-12 text-white-50">Reserved <strong class="text-white ms-1 animated-counter" data-counter-target="{{ $reservedCount }}">0</strong></span>
                </div>
                <div class="d-flex align-items-center gap-2" role="listitem">
                    <span class="legend-dot legend-dot-sold" aria-hidden="true"></span>
                    <span class="font-copperplate fs-12 text-white-50">Sold <strong class="text-white ms-1 animated-counter" data-counter-target="{{ $soldCount }}">0</strong></span>
                </div>
            </div>
            {{-- Buttons --}}
            <div class="view-controls-group">
                <button id="btn-avail-only" class="layout-avail-btn" onclick="toggleAvailableOnly(this)"
                        aria-pressed="false" title="Show only available plots">
                    <i class="fa-solid fa-filter"></i>
                    <span>Available Only</span>
                </button>
                <div role="group" aria-label="View toggle" class="layout-toggle-group">
                    <button id="btn-layout-view" class="layout-toggle-btn active" onclick="switchView('layout')"
                            aria-pressed="true" title="Master Layout Interactive Plan">
                        <i class="fa-solid fa-map"></i>
                        <span>Master Layout</span>
                    </button>
                    <button id="btn-board-view" class="layout-toggle-btn" onclick="switchView('board')"
                            aria-pressed="false" title="Grid Card View">
                        <i class="fa-solid fa-grip"></i>
                        <span>Card Grid</span>
                    </button>
                    <button id="btn-list-view" class="layout-toggle-btn" onclick="switchView('list')"
                            aria-pressed="false" title="Table List View">
                        <i class="fa-solid fa-table-list"></i>
                        <span>List</span>
                    </button>
                </div>
            </div>
        </div>

        {{-- ── FILTER STRIP ── --}}
        <div class="filter-strip-card mb-4" id="filterStrip">
            <div class="filter-grid-layout">
                {{-- Plot Number Search --}}
                <div class="filter-item filter-item-search">
                    <label for="filterSearch" class="filter-label">
                        <i class="fa-solid fa-magnifying-glass"></i> Plot Number
                    </label>
                    <div class="filter-input-wrap">
                        <input type="text" id="filterSearch" class="filter-control ps-4" placeholder="e.g. 102, 121, 150..."
                               aria-label="Search by plot number" autocomplete="off"/>
                        <i class="fa-solid fa-magnifying-glass filter-input-icon"></i>
                    </div>
                </div>

                {{-- Status --}}
                <div class="filter-item">
                    <label for="filterStatus" class="filter-label">
                        <i class="fa-solid fa-circle-dot"></i> Status
                    </label>
                    <div class="filter-select-wrap">
                        <select id="filterStatus" class="filter-control filter-select" aria-label="Filter by plot status">
                            <option value="">All Statuses</option>
                            <option value="available">Available ({{ $availableCount }})</option>
                            <option value="reserved">Reserved ({{ $reservedCount }})</option>
                            <option value="sold">Sold ({{ $soldCount }})</option>
                        </select>
                    </div>
                </div>

                {{-- Type --}}
                <div class="filter-item">
                    <label for="filterType" class="filter-label">
                        <i class="fa-solid fa-shapes"></i> Type
                    </label>
                    <div class="filter-select-wrap">
                        <select id="filterType" class="filter-control filter-select" aria-label="Filter by plot type">
                            <option value="">All Types</option>
                            @foreach($distinctTypes as $type)
                                <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Size --}}
                <div class="filter-item">
                    <label for="filterSize" class="filter-label">
                        <i class="fa-solid fa-expand"></i> Size
                    </label>
                    <div class="filter-select-wrap">
                        <select id="filterSize" class="filter-control filter-select" aria-label="Filter by plot size">
                            <option value="">All Sizes</option>
                            @foreach($distinctSizes as $sz)
                                <option value="{{ (int)$sz }}">{{ (int)$sz }} Sq. Yds</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Facing --}}
                <div class="filter-item">
                    <label for="filterFacing" class="filter-label">
                        <i class="fa-solid fa-compass"></i> Facing
                    </label>
                    <div class="filter-select-wrap">
                        <select id="filterFacing" class="filter-control filter-select" aria-label="Filter by facing direction">
                            <option value="">All Facings</option>
                            @foreach($distinctFacings as $f)
                                <option value="{{ strtolower($f) }}">{{ $f }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Road --}}
                <div class="filter-item">
                    <label for="filterRoad" class="filter-label">
                        <i class="fa-solid fa-road"></i> Road
                    </label>
                    <div class="filter-select-wrap">
                        <select id="filterRoad" class="filter-control filter-select" aria-label="Filter by road width">
                            <option value="">All Roads</option>
                            @foreach($distinctRoads as $r)
                                <option value="{{ $r }}">{{ $r }} Ft Road</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Clear Button --}}
                <div class="filter-item filter-item-clear">
                    <button id="btnClearFilters" class="btn-filter-clear"
                            onclick="clearFilters()" aria-label="Clear all filters">
                        <i class="fa-solid fa-rotate-left"></i> <span>Clear</span>
                    </button>
                </div>
            </div>

            {{-- Footer bar --}}
            <div class="filter-footer-bar">
                <div class="filter-count-wrap">
                    <i class="fa-solid fa-layer-group text-brand-secondary"></i>
                    <span>Showing <strong class="text-white animated-counter" id="resultCount" data-counter-target="{{ $allPlots->count() }}">{{ $allPlots->count() }}</strong> plots matching criteria</span>
                </div>
                <div id="activeFilterBadges" class="d-flex flex-wrap gap-1"></div>
            </div>
        </div>

        {{-- ============================================================
             MASTER LAYOUT VIEW — SVG Interactive Site Plan
             ============================================================ --}}
        <div id="viewLayout">
            <div class="master-layout-wrap" id="masterLayoutWrap">

                {{-- Zoom controls --}}
                <div class="layout-zoom-controls">
                    <button class="layout-zoom-btn" onclick="layoutZoom(1.25)" title="Zoom In" aria-label="Zoom in"><i class="fa-solid fa-plus"></i></button>
                    <button class="layout-zoom-btn" onclick="layoutZoom(0.8)" title="Zoom Out" aria-label="Zoom out"><i class="fa-solid fa-minus"></i></button>
                    <button class="layout-zoom-btn" onclick="layoutZoomReset()" title="Reset view" aria-label="Reset zoom"><i class="fa-solid fa-maximize"></i></button>
                </div>

                {{-- SVG Stage --}}
                <div class="master-layout-stage" id="layoutStage">
                    <svg viewBox="0 0 1600 980"
                         xmlns="http://www.w3.org/2000/svg"
                         id="masterLayoutSvg"
                         class="master-layout-svg"
                         role="img"
                         aria-label="Official Master Layout site plan of RRR Prekshitha Enclave showing 158 plots with live availability status"
                         focusable="false">

                        {{-- ── DEFS ── --}}
                        <defs>
                            <pattern id="roadPattern" width="40" height="4" patternUnits="userSpaceOnUse">
                                <rect width="40" height="4" fill="none"/>
                                <line x1="0" y1="2" x2="24" y2="2" stroke="#2a445e" stroke-width="1.2"/>
                            </pattern>
                            <linearGradient id="parkGrad" x1="0" y1="0" x2="1" y2="1">
                                <stop offset="0%" stop-color="#0c381e"/>
                                <stop offset="100%" stop-color="#144d2b"/>
                            </linearGradient>
                            <linearGradient id="socialGrad" x1="0" y1="0" x2="1" y2="1">
                                <stop offset="0%" stop-color="#09223b"/>
                                <stop offset="100%" stop-color="#0d3257"/>
                            </linearGradient>
                        </defs>

                        {{-- ── BACKGROUND & COMPOUND WALL ── --}}
                        <rect width="1600" height="980" fill="#07111c"/>
                        <rect x="40" y="30" width="1520" height="910" fill="#091826" stroke="#1c3752" stroke-width="2" rx="4"
                              class="svg-anim" style="--anim-delay:100ms;"/>

                        {{-- ── PROPOSED 100 FT WIDE ROAD (Eastern Edge) ── --}}
                        <rect x="1465" y="30" width="95" height="910" fill="#11202e" class="svg-anim" style="--anim-delay:150ms;"/>
                        <line x1="1512.5" y1="35" x2="1512.5" y2="935" stroke="#375573" stroke-width="1.5" stroke-dasharray="10,6" class="svg-anim" style="--anim-delay:200ms;"/>
                        <text x="1512.5" y="490" class="road-label-svg" transform="rotate(90 1512.5 490)" style="font-size:11px;letter-spacing:.15em;fill:rgba(255,255,255,.75);" aria-hidden="true">
                            PROPOSED 100 FEET WIDE ROAD
                        </text>

                        {{-- ── 40 FT CENTRAL SPINE CC ROAD (East-West) ── --}}
                        <rect x="80" y="480" width="1385" height="48" fill="#102232" class="svg-anim" style="--anim-delay:250ms;"/>
                        <line x1="85" y1="504" x2="1460" y2="504" stroke="#375573" stroke-width="1.5" stroke-dasharray="10,6" class="svg-anim" style="--anim-delay:300ms;"/>
                        <text x="890" y="508" class="road-label-svg" style="font-size:10.5px;letter-spacing:.12em;fill:rgba(255,255,255,.75);" aria-hidden="true">
                            40 FEET WIDE CC ROAD — CENTRAL SPINE
                        </text>

                        {{-- ── FIVE 30 FT AVENUE ROADS ── --}}
                        <!-- Avenue 1 -->
                        <rect x="1205" y="170" width="35" height="758" fill="#0c1d2c" class="svg-anim" style="--anim-delay:350ms;"/>
                        <line x1="1222.5" y1="175" x2="1222.5" y2="925" stroke="#253a50" stroke-width="1" stroke-dasharray="6,4"/>
                        <text x="1222.5" y="325" class="road-label-svg" transform="rotate(-90 1222.5 325)" style="font-size:8px;fill:rgba(255,255,255,.45);" aria-hidden="true">30 FT WIDE ROAD</text>
                        <text x="1222.5" y="730" class="road-label-svg" transform="rotate(-90 1222.5 730)" style="font-size:8px;fill:rgba(255,255,255,.45);" aria-hidden="true">30 FT WIDE ROAD</text>

                        <!-- Avenue 2 -->
                        <rect x="990" y="80" width="35" height="848" fill="#0c1d2c" class="svg-anim" style="--anim-delay:380ms;"/>
                        <line x1="1007.5" y1="85" x2="1007.5" y2="925" stroke="#253a50" stroke-width="1" stroke-dasharray="6,4"/>
                        <text x="1007.5" y="280" class="road-label-svg" transform="rotate(-90 1007.5 280)" style="font-size:8px;fill:rgba(255,255,255,.45);" aria-hidden="true">30 FT WIDE ROAD</text>
                        <text x="1007.5" y="730" class="road-label-svg" transform="rotate(-90 1007.5 730)" style="font-size:8px;fill:rgba(255,255,255,.45);" aria-hidden="true">30 FT WIDE ROAD</text>

                        <!-- Avenue 3 -->
                        <rect x="775" y="80" width="35" height="848" fill="#0c1d2c" class="svg-anim" style="--anim-delay:410ms;"/>
                        <line x1="792.5" y1="85" x2="792.5" y2="925" stroke="#253a50" stroke-width="1" stroke-dasharray="6,4"/>
                        <text x="792.5" y="280" class="road-label-svg" transform="rotate(-90 792.5 280)" style="font-size:8px;fill:rgba(255,255,255,.45);" aria-hidden="true">30 FT WIDE ROAD</text>
                        <text x="792.5" y="730" class="road-label-svg" transform="rotate(-90 792.5 730)" style="font-size:8px;fill:rgba(255,255,255,.45);" aria-hidden="true">30 FT WIDE ROAD</text>

                        <!-- Avenue 4 -->
                        <rect x="560" y="80" width="35" height="848" fill="#0c1d2c" class="svg-anim" style="--anim-delay:440ms;"/>
                        <line x1="577.5" y1="85" x2="577.5" y2="925" stroke="#253a50" stroke-width="1" stroke-dasharray="6,4"/>
                        <text x="577.5" y="280" class="road-label-svg" transform="rotate(-90 577.5 280)" style="font-size:8px;fill:rgba(255,255,255,.45);" aria-hidden="true">30 FT WIDE ROAD</text>
                        <text x="577.5" y="730" class="road-label-svg" transform="rotate(-90 577.5 730)" style="font-size:8px;fill:rgba(255,255,255,.45);" aria-hidden="true">30 FT WIDE ROAD</text>

                        <!-- Avenue 5 -->
                        <rect x="325" y="80" width="35" height="848" fill="#0c1d2c" class="svg-anim" style="--anim-delay:470ms;"/>
                        <line x1="342.5" y1="85" x2="342.5" y2="925" stroke="#253a50" stroke-width="1" stroke-dasharray="6,4"/>
                        <text x="342.5" y="280" class="road-label-svg" transform="rotate(-90 342.5 280)" style="font-size:8px;fill:rgba(255,255,255,.45);" aria-hidden="true">30 FT WIDE ROAD</text>
                        <text x="342.5" y="730" class="road-label-svg" transform="rotate(-90 342.5 730)" style="font-size:8px;fill:rgba(255,255,255,.45);" aria-hidden="true">30 FT WIDE ROAD</text>

                        <!-- Avenue 6 (West Horizontal) -->
                        <rect x="80" y="480" width="245" height="48" fill="#0c1d2c" class="svg-anim" style="--anim-delay:500ms;"/>
                        <line x1="85" y1="504" x2="325" y2="504" stroke="#253a50" stroke-width="1" stroke-dasharray="6,4"/>
                        <text x="200" y="508" class="road-label-svg" style="font-size:8.5px;fill:rgba(255,255,255,.45);" aria-hidden="true">30 FEET WIDE ROAD</text>

                        {{-- ── SECTOR BLOCK LABELS (Headers) ── --}}
                        <text x="1350" y="60" class="block-label-svg" text-anchor="middle">COMMERCIAL &amp; HIGHWAY SECTOR</text>
                        <text x="1115" y="60" class="block-label-svg" text-anchor="middle">SECTOR 2</text>
                        <text x="900"  y="60" class="block-label-svg" text-anchor="middle">SECTOR 3</text>
                        <text x="685"  y="60" class="block-label-svg" text-anchor="middle">SECTOR 4</text>
                        <text x="460"  y="60" class="block-label-svg" text-anchor="middle">SECTOR 5 &amp; ESTATES</text>
                        <text x="205"  y="60" class="block-label-svg" text-anchor="middle">EXECUTIVE SECTOR</text>

                        {{-- ── PARK-1 (North-East / Top Right) ── --}}
                        <g class="svg-anim" style="--anim-delay:600ms;">
                            <rect x="1240" y="80" width="220" height="90" rx="6" fill="url(#parkGrad)" stroke="#22c55e" stroke-width="1.2" stroke-dasharray="4,2"/>
                            <circle cx="1350" cy="125" r="30" fill="#15532c" stroke="rgba(134,239,172,.25)" stroke-width="1"/>
                            <circle cx="1350" cy="125" r="16" fill="#1b6938" stroke="rgba(134,239,172,.45)" stroke-width="1"/>
                            <rect x="1310" y="113" width="80" height="24" rx="12" fill="#15803d" stroke="#86efac" stroke-width="1.2"/>
                            <text x="1350" y="129" fill="#ffffff" font-family="var(--font-heading)" font-size="11px" font-weight="700" text-anchor="middle" letter-spacing="0.08em">PARK-1</text>
                            <text x="1350" y="156" fill="#86efac" font-size="8px" font-family="sans-serif" text-anchor="middle">Landscaped Park &amp; Gazebo</text>
                        </g>

                        {{-- ── PARK-2 (South-Center) ── --}}
                        <g class="svg-anim" style="--anim-delay:650ms;">
                            <rect x="810" y="860" width="180" height="68" rx="6" fill="url(#parkGrad)" stroke="#22c55e" stroke-width="1.2" stroke-dasharray="4,2"/>
                            <circle cx="900" cy="894" r="22" fill="#15532c" stroke="rgba(134,239,172,.25)" stroke-width="1"/>
                            <rect x="860" y="882" width="80" height="24" rx="12" fill="#15803d" stroke="#86efac" stroke-width="1.2"/>
                            <text x="900" y="898" fill="#ffffff" font-family="var(--font-heading)" font-size="11px" font-weight="700" text-anchor="middle" letter-spacing="0.08em">PARK-2</text>
                            <text x="900" y="920" fill="#86efac" font-size="7.5px" font-family="sans-serif" text-anchor="middle">Children Play Area &amp; Lawn</text>
                        </g>

                        {{-- ── PARK-3 (South-West) ── --}}
                        <g class="svg-anim" style="--anim-delay:700ms;">
                            <rect x="80" y="860" width="245" height="68" rx="6" fill="url(#parkGrad)" stroke="#22c55e" stroke-width="1.2" stroke-dasharray="4,2"/>
                            <circle cx="202" cy="894" r="22" fill="#15532c" stroke="rgba(134,239,172,.25)" stroke-width="1"/>
                            <rect x="162" y="882" width="80" height="24" rx="12" fill="#15803d" stroke="#86efac" stroke-width="1.2"/>
                            <text x="202" y="898" fill="#ffffff" font-family="var(--font-heading)" font-size="11px" font-weight="700" text-anchor="middle" letter-spacing="0.08em">PARK-3</text>
                            <text x="202" y="920" fill="#86efac" font-size="7.5px" font-family="sans-serif" text-anchor="middle">Avenue Greenery &amp; Walking Track</text>
                        </g>

                        {{-- ── SOCIAL INFRASTRUCTURE (West Civic Parcel) ── --}}
                        <g class="svg-anim" style="--anim-delay:750ms;">
                            <rect x="80" y="528" width="145" height="332" rx="6" fill="url(#socialGrad)" stroke="#0284c7" stroke-width="1.5" stroke-dasharray="6,3"/>
                            <rect x="95" y="675" width="115" height="36" rx="6" fill="#0369a1" stroke="#bae6fd" stroke-width="1"/>
                            <text x="152" y="691" fill="#ffffff" font-family="var(--font-heading)" font-size="9.5px" font-weight="700" text-anchor="middle" letter-spacing="0.06em">SOCIAL</text>
                            <text x="152" y="704" fill="#bae6fd" font-family="var(--font-heading)" font-size="8px" font-weight="700" text-anchor="middle" letter-spacing="0.06em">INFRASTRUCTURE</text>
                            <text x="152" y="730" fill="#7dd3fc" font-size="7.5px" font-family="sans-serif" text-anchor="middle">Civic &amp; Community Parcel</text>
                        </g>

                        {{-- ── COMPASS ROSE & TITLE ── --}}
                        <g class="svg-anim" style="--anim-delay:800ms;" aria-hidden="true">
                            <!-- Compass -->
                            <g transform="translate(60, 42)">
                                <circle cx="16" cy="16" r="15" fill="rgba(7,17,28,.90)" stroke="rgba(42,74,106,.6)" stroke-width="1.2"/>
                                <polygon points="16,5 19,17 16,14 13,17" fill="#71b644"/>
                                <polygon points="16,14 19,17 16,27 13,17" fill="rgba(255,255,255,.15)"/>
                                <text x="16" y="4" text-anchor="middle" style="font-size:8px;font-weight:700;fill:#71b644;font-family:sans-serif;">N</text>
                            </g>
                        </g>

                        {{-- ============================================================
                             ALL 158 AUTHENTIC PLOT CELLS
                             ============================================================ --}}
                        @foreach($plotBoxes as $pNum => $b)
                        @php
                            $plot = $plotsByNum[$pNum] ?? null;
                            if (!$plot) continue;

                            $pst   = $plot['status'] === 'booked' ? 'reserved' : ($plot['status'] ?? 'available');
                            $isSold = $pst === 'sold';
                            $psqft = number_format(round((float)($plot['size_sq_yards'] ?? 0) * 9));
                            $pnotes = e(Str::limit($plot['description'] ?? '', 200));
                            $pdims = $plot['dimensions'] ?? '';
                            $psz = (int)($plot['size_sq_yards'] ?? 0);
                            $cx = $b['x'] + $b['w'] / 2;
                            $cy = $b['y'] + $b['h'] / 2;
                            $delay = 850 + ($pNum * 6);
                        @endphp
                        <rect
                            class="plot-cell {{ $stClass[$pst] ?? 'status-available' }}"
                            data-id="{{ $plot['id'] }}"
                            data-number="{{ $plot['number'] }}"
                            data-status="{{ $pst }}"
                            data-type="{{ $plot['plot_type'] ?? 'regular' }}"
                            data-size="{{ $psz }}"
                            data-sqft="{{ $psqft }}"
                            data-facing="{{ strtolower($plot['facing'] ?? 'east') }}"
                            data-facing-label="{{ $plot['facing'] ?? 'East' }}"
                            data-road="{{ $plot['road_width_ft'] ?? 30 }}"
                            data-dims="{{ $pdims }}"
                            data-notes="{{ $pnotes }}"
                            data-vaastu="{{ ($plot['is_vaastu_compliant'] ?? true) ? '1' : '0' }}"
                            @if($isUnlocked && !empty($plot['price'])) data-price="{{ $plot['price'] }}" data-exact="{{ $plot['exact_price'] ?? '' }}" @endif
                            x="{{ $b['x'] }}" y="{{ $b['y'] }}" width="{{ $b['w'] }}" height="{{ $b['h'] }}" rx="2"
                            style="--anim-delay:{{ $delay }}ms;"
                            @if(!$isSold) onclick="openPlotDrawer(this)"
                            onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();openPlotDrawer(this);}" @endif
                            role="{{ $isSold ? 'img' : 'button' }}"
                            tabindex="{{ $isSold ? -1 : 0 }}"
                            aria-label="{{ $plot['number'] }}, {{ ucfirst($pst) }}, {{ ucfirst($plot['plot_type'] ?? 'Plot') }}, {{ $psz }} Sq. Yds"/>
                        <text x="{{ $cx }}" y="{{ $cy - 5 }}" class="plot-cell-text"
                              style="--anim-delay:{{ $delay + 40 }}ms;" aria-hidden="true">{{ $pNum }}</text>
                        <text x="{{ $cx }}" y="{{ $cy + 7 }}" class="plot-cell-size-text"
                              style="--anim-delay:{{ $delay + 60 }}ms;" aria-hidden="true">{{ $psz }}</text>
                        @endforeach

                        {{-- ── SCALE / WATERMARK / OFFICIAL APPROVALS ── --}}
                        <text x="45" y="963" class="layout-footer-text-left" style="font-family:var(--font-heading);font-size:15px;font-weight:700;fill:#ffffff;letter-spacing:.05em;" pointer-events="none">
                            <tspan fill="#86efac" font-weight="800">RRR PREKSHITHA ENCLAVE</tspan> &bull; HMDA FINAL LP NO: <tspan fill="#f59e0b" font-weight="700">000022/LO/Plg/HMDA/2023</tspan> &bull; TSRERA: <tspan fill="#f59e0b" font-weight="700">P02000006695</tspan>
                        </text>
                        <text x="1555" y="963" text-anchor="end" class="layout-footer-text-right" style="font-family:var(--font-heading);font-size:14px;font-weight:700;fill:rgba(255,255,255,.92);letter-spacing:.04em;" pointer-events="none">
                            TOTAL EXTENT: <tspan fill="#38bdf8" font-weight="800">48,272.46 SQ. METERS</tspan> &bull; <tspan fill="#86efac" font-weight="700">158 HMDA APPROVED PLOTS</tspan> &bull; 100% VAASTU
                        </text>

                    </svg>
                </div>

                {{-- Hover tooltip (desktop only) --}}
                <div class="layout-tooltip" id="layoutTooltip" role="tooltip" aria-hidden="true">
                    <div class="layout-tooltip-header">
                        <span class="layout-tooltip-number" id="ttNum">—</span>
                        <span class="layout-tooltip-status" id="ttStatus">—</span>
                    </div>
                    <div class="layout-tooltip-body">
                        <div class="layout-tooltip-row">
                            <span class="layout-tooltip-label">Size</span>
                            <span class="layout-tooltip-val" id="ttSize">—</span>
                        </div>
                        <div class="layout-tooltip-row">
                            <span class="layout-tooltip-label">Facing</span>
                            <span class="layout-tooltip-val" id="ttFacing">—</span>
                        </div>
                        <div class="layout-tooltip-row">
                            <span class="layout-tooltip-label">Road</span>
                            <span class="layout-tooltip-val" id="ttRoad">—</span>
                        </div>
                        <div class="layout-tooltip-row">
                            <span class="layout-tooltip-label">Type</span>
                            <span class="layout-tooltip-val" id="ttType">—</span>
                        </div>
                    </div>
                    <div class="layout-tooltip-hint">Click plot to view specifications &rarr;</div>
                </div>

            </div>
        </div>

        {{-- ============================================================
             CARD BOARD VIEW (secondary)
             ============================================================ --}}
        <div id="viewBoard" class="d-none">
            <div class="plot-board-grid" id="plotBoardGrid">
                @foreach($allPlots as $plot)
                @php
                    $st        = $plot['status'] ?? 'available';
                    $stNorm    = in_array($st, ['reserved','booked']) ? 'reserved' : $st;
                    $stClass2  = match($stNorm) { 'sold'=>'sold','reserved'=>'reserved',default=>'available' };
                    $stLabel   = match($stNorm) { 'sold'=>'Sold','reserved'=>'Reserved',default=>'Available' };
                    $stIcon    = match($stNorm) { 'sold'=>'fa-circle-xmark','reserved'=>'fa-clock',default=>'fa-circle-check' };
                    $isSold    = $stNorm === 'sold';
                    $sqft      = number_format(round((float)($plot['size_sq_yards'] ?? 0) * 9));
                    $dims      = $plot['dimensions'] ?? '';
                    $notes     = $plot['description'] ?? '';
                    $priceTxt  = $isUnlocked && !empty($plot['price']) ? $plot['price'] : '';
                    $exactTxt  = $isUnlocked && !empty($plot['exact_price']) ? $plot['exact_price'] : '';
                @endphp
                <div class="plot-tile plot-tile-{{ $stClass2 }}"
                     role="{{ $isSold ? 'listitem' : 'button' }}"
                     {{ !$isSold ? 'tabindex="0"' : '' }}
                     aria-label="{{ $plot['number'] }}, {{ $plot['area'] ?? '' }}, {{ $stLabel }}"
                     data-id="{{ $plot['id'] }}"
                     data-number="{{ $plot['number'] }}"
                     data-status="{{ $stNorm }}"
                     data-type="{{ $plot['plot_type'] ?? 'regular' }}"
                     data-size="{{ (int)($plot['size_sq_yards'] ?? 0) }}"
                     data-sqft="{{ $sqft }}"
                     data-facing="{{ strtolower($plot['facing'] ?? '') }}"
                     data-facing-label="{{ $plot['facing'] ?? '' }}"
                     data-road="{{ $plot['road_width_ft'] ?? 30 }}"
                     data-dims="{{ htmlspecialchars($dims) }}"
                     data-notes="{{ htmlspecialchars(Str::limit($notes, 200)) }}"
                     data-vaastu="{{ $plot['is_vaastu_compliant'] ? '1' : '0' }}"
                     @if($isUnlocked && $priceTxt) data-price="{{ $priceTxt }}" data-exact="{{ $exactTxt }}" @endif
                     @if(!$isSold) onclick="openPlotDrawer(this)" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();openPlotDrawer(this);}" @endif>
                    <span class="plot-tile-strip plot-tile-strip-{{ $stClass2 }}" aria-hidden="true"></span>
                    <div class="plot-tile-number">{{ $plot['number'] }}</div>
                    <span class="plot-tile-type">{{ ucfirst($plot['plot_type'] ?? 'Regular') }}</span>
                    <div class="plot-tile-data">
                        <div class="plot-tile-row size">
                            <i class="fa-solid fa-expand" style="color:#71b644;" aria-hidden="true"></i>
                            <span>{{ $plot['area'] ?? (((int)($plot['size_sq_yards'] ?? 0)).' Sq. Yds') }}</span>
                        </div>
                        <div class="plot-tile-row">
                            <i class="fa-solid fa-compass" style="color:#71b644;" aria-hidden="true"></i>
                            <span>{{ $plot['facing'] ?? '' }}</span>
                        </div>
                        <div class="plot-tile-row">
                            <i class="fa-solid fa-road" style="color:rgba(255,255,255,.4);" aria-hidden="true"></i>
                            <span>{{ $plot['road_width_ft'] ?? 30 }} Ft Road</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-auto pt-2 border-top border-white-10">
                        <span class="plot-tile-status plot-tile-status-{{ $stClass2 }}" aria-hidden="true">
                            <i class="fa-solid {{ $stIcon }}" style="font-size:7px;"></i> {{ $stLabel }}
                        </span>
                        @if(!$isSold)
                            <a href="{{ route('plots.show', $plot['id']) }}" class="plot-tile-view-link"
                               onclick="event.stopPropagation()" title="View Photos &amp; Video for {{ $plot['number'] }}">
                                <i class="fa-solid fa-camera me-1"></i>Photos &amp; Video &rarr;
                            </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <div class="plot-board-empty d-none" id="boardEmpty">
                <i class="fa-solid fa-layer-group fs-36 text-white-50 mb-3"></i>
                <h3 class="fs-20 text-white font-copperplate mb-1">No Plots Match</h3>
                <p class="text-white-50 fs-14 mb-3">Try adjusting or clearing your filters.</p>
                <button class="btn-secondary-brand" onclick="clearFilters()"><span><i class="fa-solid fa-rotate me-1"></i>Reset Filters</span></button>
            </div>
        </div>

        {{-- ============================================================
             LIST VIEW (table — tertiary)
             ============================================================ --}}
        <div id="viewList" class="d-none">
            <div class="rounded-3 overflow-hidden border border-white-10">
                <div style="overflow-x:auto;">
                    <table class="plot-list-table" aria-label="Plot inventory list">
                        <thead>
                            <tr>
                                <th>Plot #</th><th>Status</th><th>Type</th>
                                <th>Size</th><th>Facing</th><th>Road</th><th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="plotListBody">
                            @foreach($allPlots as $plot)
                            @php
                                $st2   = $plot['status'] ?? 'available';
                                $stN2  = in_array($st2, ['reserved','booked']) ? 'reserved' : $st2;
                                $stC2  = match($stN2) { 'sold'=>'sold','reserved'=>'reserved',default=>'available' };
                                $stL2  = match($stN2) { 'sold'=>'Sold','reserved'=>'Reserved',default=>'Available' };
                                $stI2  = match($stN2) { 'sold'=>'fa-circle-xmark','reserved'=>'fa-clock',default=>'fa-circle-check' };
                                $sold2 = $stN2 === 'sold';
                            @endphp
                            <tr class="{{ $sold2 ? 'is-sold' : '' }}"
                                data-id="{{ $plot['id'] }}"
                                data-number="{{ $plot['number'] }}"
                                data-status="{{ $stN2 }}"
                                data-type="{{ $plot['plot_type'] ?? 'regular' }}"
                                data-size="{{ (int)($plot['size_sq_yards'] ?? 0) }}"
                                data-sqft="{{ number_format(round((float)($plot['size_sq_yards'] ?? 0) * 9)) }}"
                                data-facing="{{ strtolower($plot['facing'] ?? '') }}"
                                data-facing-label="{{ $plot['facing'] ?? '' }}"
                                data-road="{{ $plot['road_width_ft'] ?? 30 }}"
                                data-dims="{{ htmlspecialchars($plot['dimensions'] ?? '') }}"
                                data-notes="{{ htmlspecialchars(Str::limit($plot['description'] ?? '', 200)) }}"
                                data-vaastu="{{ ($plot['is_vaastu_compliant'] ?? true) ? '1' : '0' }}"
                                @if($isUnlocked && !empty($plot['price'])) data-price="{{ $plot['price'] }}" data-exact="{{ $plot['exact_price'] ?? '' }}" @endif
                                @if(!$sold2) onclick="openPlotDrawer(this)" aria-label="{{ $plot['number'] }}, {{ $stL2 }}" @endif
                                tabindex="{{ $sold2 ? '-1' : '0' }}"
                                @if(!$sold2) onkeydown="if(event.key==='Enter'){openPlotDrawer(this);}" @endif>
                                <td class="plot-number-cell">{{ $plot['number'] }}</td>
                                <td><span class="plot-tile-status plot-tile-status-{{ $stC2 }}" style="font-size:9px;"><i class="fa-solid {{ $stI2 }}" style="font-size:6px;"></i> {{ $stL2 }}</span></td>
                                <td>{{ ucfirst($plot['plot_type'] ?? 'Regular') }}</td>
                                <td>{{ $plot['area'] ?? '' }}</td>
                                <td>{{ $plot['facing'] ?? '' }}</td>
                                <td>{{ $plot['road_width_ft'] ?? 30 }} Ft</td>
                                <td>
                                    @if(!$sold2)
                                        <a href="{{ route('plots.show', $plot['id']) }}"
                                           class="btn btn-sm btn-outline-light font-copperplate fs-10 px-2 py-1 rounded-pill text-decoration-none d-inline-flex align-items-center gap-1"
                                           onclick="event.stopPropagation()">
                                            <i class="fa-solid fa-photo-film text-brand-secondary"></i> Photos &amp; Video &rarr;
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="plot-board-empty d-none" id="listEmpty">
                <i class="fa-solid fa-layer-group fs-36 text-white-50 mb-3"></i>
                <h3 class="fs-20 text-white font-copperplate mb-1">No Plots Match</h3>
                <p class="text-white-50 fs-14 mb-3">Try adjusting or clearing your filters.</p>
                <button class="btn-secondary-brand" onclick="clearFilters()"><span><i class="fa-solid fa-rotate me-1"></i>Reset Filters</span></button>
            </div>
        </div>

        {{-- ── CTA ASSURANCE BANNER ── --}}
        <div class="mt-5 p-4 p-md-5 rounded-4 bg-brand-card border border-white-10">
            <div class="row g-4 align-items-center justify-content-between">
                <div class="col-lg-8">
                    <div class="subtitle text-brand-secondary mb-1">Clear Marketable Title Guaranteed</div>
                    <h3 class="fs-26 text-white font-copperplate mb-2">100% Vaastu Compliant &bull; Pre-Approved Bank Loans</h3>
                    <p class="text-white-50 fs-14 mb-0">
                        HMDA Final LP No: <strong>000022/LO/Plg/HMDA/2023</strong> &bull; TSRERA Reg No: <strong>P02000006695</strong>.
                        Immediate spot registration at the Bibinagar Sub-Registrar Office.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('contact') }}" class="btn-main py-3 px-4">
                        <span>Schedule Guided Site Tour &rarr;</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- ============================================================
     PLOT SELECTION DRAWER
     ============================================================ --}}
<div class="plot-drawer-overlay" id="plotDrawerOverlay" aria-hidden="true" onclick="closeDrawer()"></div>

<aside class="plot-drawer" id="plotDrawer" role="dialog" aria-modal="true"
       aria-labelledby="drawerPlotNumber" aria-hidden="true" tabindex="-1">

    <div class="d-md-none text-center pt-3 pb-0" style="flex-shrink:0;">
        <div style="width:40px;height:4px;background:rgba(255,255,255,.18);border-radius:4px;margin:0 auto;"></div>
    </div>

    <div class="plot-drawer-header">
        <div>
            <div class="font-copperplate fs-10 text-white-50 text-uppercase mb-1" style="letter-spacing:.07em;">
                RRR Prekshitha Enclave
            </div>
            <h2 id="drawerPlotNumber" class="fs-22 text-white font-copperplate mb-0 lh-1-1">—</h2>
            <div id="drawerStatusBadge" class="mt-2"></div>
        </div>
        <button class="plot-drawer-close" onclick="closeDrawer()" aria-label="Close plot details panel">
            <i class="fa-solid fa-xmark fs-14"></i>
        </button>
    </div>

    <div class="plot-drawer-body">
        <div id="drawerSpecs">
            <div class="plot-drawer-spec">
                <div class="plot-drawer-spec-icon"><i class="fa-solid fa-expand"></i></div>
                <div><div class="plot-drawer-spec-label">Plot Area</div><div class="plot-drawer-spec-value" id="drawerArea">—</div></div>
            </div>
            <div class="plot-drawer-spec">
                <div class="plot-drawer-spec-icon"><i class="fa-solid fa-layer-group"></i></div>
                <div><div class="plot-drawer-spec-label">Plot Type</div><div class="plot-drawer-spec-value" id="drawerType">—</div></div>
            </div>
            <div class="plot-drawer-spec">
                <div class="plot-drawer-spec-icon"><i class="fa-solid fa-compass"></i></div>
                <div><div class="plot-drawer-spec-label">Facing</div><div class="plot-drawer-spec-value" id="drawerFacing">—</div></div>
            </div>
            <div class="plot-drawer-spec">
                <div class="plot-drawer-spec-icon"><i class="fa-solid fa-road"></i></div>
                <div><div class="plot-drawer-spec-label">Road Width</div><div class="plot-drawer-spec-value" id="drawerRoad">—</div></div>
            </div>
            <div class="plot-drawer-spec">
                <div class="plot-drawer-spec-icon"><i class="fa-solid fa-ruler-combined"></i></div>
                <div><div class="plot-drawer-spec-label">Dimensions</div><div class="plot-drawer-spec-value" id="drawerDimensions">—</div></div>
            </div>
            <div class="plot-drawer-spec">
                <div class="plot-drawer-spec-icon" style="color:#f59e0b;border-color:rgba(245,158,11,.2);background:rgba(245,158,11,.08);">
                    <i class="fa-solid fa-om"></i>
                </div>
                <div><div class="plot-drawer-spec-label">Vaastu</div><div class="plot-drawer-spec-value" id="drawerVaastu">100% Compliant</div></div>
            </div>
        </div>

        {{-- Price: LOCKED until server-side unlock success --}}
        <div class="mt-3" id="drawerPriceSection">
            @if($isUnlocked)
            <div class="p-3 rounded-3 text-center" style="background:rgba(113,182,68,.08);border:1px solid rgba(113,182,68,.25);">
                <div class="font-copperplate fs-10 text-white-50 text-uppercase mb-1" style="letter-spacing:.05em;">Total Price</div>
                <div class="fs-24 fw-800 font-copperplate" style="color:#71b644;" id="drawerPrice">—</div>
                <div class="fs-12 text-white-50 mt-1" id="drawerExactPrice"></div>
            </div>
            @else
            <div class="plot-drawer-price-locked">
                <div class="text-white-50 fs-12 mb-2 font-copperplate">
                    <i class="fa-solid fa-lock me-1 text-brand-secondary"></i>Official Developer Price
                </div>
                <button id="drawerUnlockBtn" class="btn-secondary-brand w-100 py-2 fs-13 font-copperplate"
                        onclick="triggerDrawerUnlock()">
                    <span><i class="fa-solid fa-lock-open me-1"></i>Unlock Price &rarr;</span>
                </button>
                <div class="text-white-50 fs-11 mt-2">
                    <i class="fa-solid fa-shield-halved me-1" style="color:#71b644;"></i>Privacy Protected &bull; Direct Developer
                </div>
            </div>
            @endif
        </div>

        <div class="mt-3 p-3 rounded-3" style="background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.06);">
            <div class="font-copperplate fs-10 text-white-50 mb-2 text-uppercase" style="letter-spacing:.05em;">
                <i class="fa-solid fa-info-circle me-1 text-brand-secondary"></i>Notes
            </div>
            <p class="text-white-50 fs-13 mb-0 lh-1-6" id="drawerNotes">—</p>
        </div>

        <div class="d-flex flex-column gap-2 mt-4">
            <a id="drawerViewBtn" href="#" class="btn-main py-3 text-center font-copperplate fs-13 d-flex align-items-center justify-content-center gap-2">
                <i class="fa-solid fa-photo-film text-brand-secondary"></i>
                <span>View Photos, Videos &amp; Full Details &rarr;</span>
            </a>
            <a href="{{ route('contact') }}" class="btn btn-outline-light font-copperplate fs-12 py-2 rounded-pill text-center">
                <i class="fa-solid fa-calendar-check me-1"></i>Schedule Site Visit
            </a>
        </div>

        <div class="d-flex gap-2 justify-content-center flex-wrap mt-4 pt-3 border-top border-white-10">
            <span class="font-copperplate fs-10 text-white-50 d-inline-flex align-items-center gap-1"><i class="fa-solid fa-file-shield text-brand-secondary"></i> HMDA Approved</span>
            <span class="font-copperplate fs-10 text-white-50 d-inline-flex align-items-center gap-1"><i class="fa-solid fa-file-shield text-brand-secondary"></i> RERA Certified</span>
            <span class="font-copperplate fs-10 text-white-50 d-inline-flex align-items-center gap-1"><i class="fa-solid fa-rotate-right text-brand-secondary"></i> Spot Registration</span>
        </div>
    </div>
</aside>

@endsection

@push('scripts')
<script>
/**
 * Navagruha Plot Availability — Master Layout Controller
 * Handles: SVG layout, filters (SVG+Board+List sync), tooltip,
 *          zoom/pan, drawer, counter animations.
 */
(function () {
    'use strict';

    var plotsBaseUrl = "{{ url('/plots') }}";

    /* ─────────────────────────────────────────────────────
       COUNTER ANIMATION
    ───────────────────────────────────────────────────── */
    function animateCounter(el, target, dur, delay) {
        if (!el) return;
        var finalVal = parseInt(target, 10) || 0;
        dur = dur || 1300; delay = delay || 0;
        setTimeout(function () {
            var t0 = null;
            (function step(ts) {
                if (!t0) t0 = ts;
                var p = Math.min((ts - t0) / dur, 1);
                var e = p === 1 ? 1 : 1 - Math.pow(2, -10 * p);
                el.textContent = Math.round(finalVal * e).toLocaleString('en-IN');
                if (p < 1) { requestAnimationFrame(step); }
                else {
                    el.textContent = finalVal.toLocaleString('en-IN');
                    el.classList.add('counter-pop');
                    setTimeout(function () { el.classList.remove('counter-pop'); }, 450);
                }
            })(performance.now());
        }, delay);
    }

    function initCounters() {
        var els = document.querySelectorAll('.animated-counter[data-counter-target]');
        if (!els.length) return;
        if ('IntersectionObserver' in window) {
            var io = new IntersectionObserver(function (entries, obs) {
                entries.forEach(function (en) {
                    if (en.isIntersecting) {
                        var el = en.target;
                        animateCounter(el, el.dataset.counterTarget, 1300, parseInt(el.dataset.counterDelay || '0', 10));
                        obs.unobserve(el);
                    }
                });
            }, { threshold: 0.15 });
            els.forEach(function (c) { io.observe(c); });
        } else {
            els.forEach(function (el) { animateCounter(el, el.dataset.counterTarget, 1300, parseInt(el.dataset.counterDelay || '0', 10)); });
        }
    }
    if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', initCounters); }
    else { initCounters(); }

    /* ─────────────────────────────────────────────────────
       DOM REFS
    ───────────────────────────────────────────────────── */
    var svgEl      = document.getElementById('masterLayoutSvg');
    var boardGrid  = document.getElementById('plotBoardGrid');
    var listBody   = document.getElementById('plotListBody');
    var boardEmpty = document.getElementById('boardEmpty');
    var listEmpty  = document.getElementById('listEmpty');
    var resultCnt  = document.getElementById('resultCount');
    var badgeWrap  = document.getElementById('activeFilterBadges');
    var fSearch    = document.getElementById('filterSearch');
    var fStatus    = document.getElementById('filterStatus');
    var fType      = document.getElementById('filterType');
    var fSize      = document.getElementById('filterSize');
    var fFacing    = document.getElementById('filterFacing');
    var fRoad      = document.getElementById('filterRoad');
    var drawerEl   = document.getElementById('plotDrawer');
    var overlayEl  = document.getElementById('plotDrawerOverlay');

    var searchTimer = null;
    var availOnly   = false;
    var selectedCell = null;

    /* ─────────────────────────────────────────────────────
       FILTER LOGIC
    ───────────────────────────────────────────────────── */
    function matchEl(el, f) {
        var num     = (el.dataset.number || '').toLowerCase().replace(/\s/g, '');
        var numDig  = num.replace(/\D/g, '');
        var srch    = f.search.replace(/\s/g, '');
        var srchDig = srch.replace(/\D/g, '');
        if (f.search && !num.includes(srch) && !(srchDig && numDig.includes(srchDig))) return false;
        var st = el.dataset.status || '';
        if (availOnly && st !== 'available') return false;
        if (f.status) {
            if (f.status === 'reserved' && st !== 'reserved' && st !== 'booked') return false;
            if (f.status !== 'reserved' && st !== f.status) return false;
        }
        if (f.type   && el.dataset.type   !== f.type)   return false;
        if (f.size   && el.dataset.size   !== f.size)   return false;
        if (f.facing && el.dataset.facing !== f.facing) return false;
        if (f.road   && el.dataset.road   !== f.road)   return false;
        return true;
    }

    function getFilters() {
        return {
            search : fSearch ? fSearch.value.trim().toLowerCase() : '',
            status : fStatus ? fStatus.value : '',
            type   : fType   ? fType.value   : '',
            size   : fSize   ? fSize.value   : '',
            facing : fFacing ? fFacing.value : '',
            road   : fRoad   ? fRoad.value   : '',
        };
    }

    function applyFilters() {
        var f = getFilters();
        var cnt = 0;

        /* SVG cells */
        if (svgEl) {
            svgEl.querySelectorAll('.plot-cell[data-id]').forEach(function (el) {
                var show = matchEl(el, f);
                el.classList.toggle('plot-cell-hidden', !show);
                if (show) cnt++;
            });
        }

        /* Board tiles */
        if (boardGrid) {
            boardGrid.querySelectorAll('.plot-tile[data-id]').forEach(function (el) {
                var show = matchEl(el, f);
                el.style.display = show ? '' : 'none';
            });
        }

        /* List rows */
        if (listBody) {
            listBody.querySelectorAll('tr[data-id]').forEach(function (el) {
                el.style.display = matchEl(el, f) ? '' : 'none';
            });
        }

        if (resultCnt) animateCounter(resultCnt, cnt, 350, 0);
        if (boardEmpty) boardEmpty.classList.toggle('d-none', cnt > 0);
        if (listEmpty)  listEmpty.classList.toggle('d-none', cnt > 0);
        renderBadges(f);
    }

    function renderBadges(f) {
        if (!badgeWrap) return;
        badgeWrap.innerHTML = '';
        var items = [
            { key:'status', val:f.status, label: fStatus && fStatus.options[fStatus.selectedIndex] ? fStatus.options[fStatus.selectedIndex].text : '' },
            { key:'type',   val:f.type,   label: fType   && fType.options[fType.selectedIndex]     ? fType.options[fType.selectedIndex].text     : '' },
            { key:'size',   val:f.size,   label: fSize   && fSize.options[fSize.selectedIndex]     ? fSize.options[fSize.selectedIndex].text     : '' },
            { key:'facing', val:f.facing, label: fFacing && fFacing.options[fFacing.selectedIndex] ? fFacing.options[fFacing.selectedIndex].text : '' },
            { key:'road',   val:f.road,   label: fRoad   && fRoad.options[fRoad.selectedIndex]     ? fRoad.options[fRoad.selectedIndex].text     : '' },
            { key:'search', val:f.search, label: f.search ? '"' + fSearch.value + '"' : '' },
        ];
        items.forEach(function (item) {
            if (!item.val || !item.label || item.label.startsWith('All')) return;
            var s = document.createElement('span');
            s.className = 'filter-active-badge';
            s.innerHTML = item.label + ' <i class="fa-solid fa-xmark" style="cursor:pointer;margin-left:4px;" onclick="clearOne(\'' + item.key + '\')"></i>';
            badgeWrap.appendChild(s);
        });
        if (availOnly) {
            var s = document.createElement('span');
            s.className = 'filter-active-badge';
            s.style.cssText = 'background:rgba(113,182,68,.15);border-color:rgba(113,182,68,.3);color:#71b644;';
            s.innerHTML = 'Available Only <i class="fa-solid fa-xmark" style="cursor:pointer;margin-left:4px;" onclick="clearOne(\'avail\')"></i>';
            badgeWrap.appendChild(s);
        }
    }

    [fStatus, fType, fSize, fFacing, fRoad].forEach(function (el) {
        if (el) el.addEventListener('change', applyFilters);
    });
    if (fSearch) fSearch.addEventListener('input', function () { clearTimeout(searchTimer); searchTimer = setTimeout(applyFilters, 220); });

    window.clearFilters = function () {
        if (fSearch) fSearch.value = '';
        [fStatus, fType, fSize, fFacing, fRoad].forEach(function (s) { if (s) { s.value = ''; s.selectedIndex = 0; } });
        availOnly = false;
        var ab = document.getElementById('btn-avail-only');
        if (ab) { ab.classList.remove('active'); ab.setAttribute('aria-pressed', 'false'); }
        applyFilters();
    };
    window.clearOne = function (key) {
        if (key === 'avail') { availOnly = false; var ab = document.getElementById('btn-avail-only'); if (ab) { ab.classList.remove('active'); ab.setAttribute('aria-pressed','false'); } applyFilters(); return; }
        var map = { status:fStatus, type:fType, size:fSize, facing:fFacing, road:fRoad, search:fSearch };
        var el = map[key]; if (!el) return;
        el.value = ''; if (el.selectedIndex !== undefined) el.selectedIndex = 0;
        applyFilters();
    };

    /* ─────────────────────────────────────────────────────
       AVAILABLE ONLY TOGGLE
    ───────────────────────────────────────────────────── */
    window.toggleAvailableOnly = function (btn) {
        availOnly = !availOnly;
        btn.classList.toggle('active', availOnly);
        btn.setAttribute('aria-pressed', availOnly ? 'true' : 'false');
        applyFilters();
    };

    /* ─────────────────────────────────────────────────────
       VIEW TOGGLE
    ───────────────────────────────────────────────────── */
    window.switchView = function (view) {
        ['layout','board','list'].forEach(function (v) {
            var panel = document.getElementById('view' + v.charAt(0).toUpperCase() + v.slice(1));
            var btn   = document.getElementById('btn-' + v + '-view');
            if (panel) panel.classList.toggle('d-none', v !== view);
            if (btn) { btn.classList.toggle('active', v === view); btn.setAttribute('aria-pressed', v === view ? 'true' : 'false'); }
        });
    };

    /* ─────────────────────────────────────────────────────
       SVG LAYOUT ANIMATION (IntersectionObserver)
    ───────────────────────────────────────────────────── */
    var layoutWrap = document.getElementById('masterLayoutWrap');
    if (layoutWrap && svgEl && 'IntersectionObserver' in window) {
        var animIO = new IntersectionObserver(function (entries, obs) {
            entries.forEach(function (en) {
                if (en.isIntersecting) {
                    svgEl.classList.add('layout-anim-go');
                    obs.unobserve(en.target);
                }
            });
        }, { threshold: 0.05 });
        animIO.observe(layoutWrap);
    } else if (svgEl) {
        svgEl.classList.add('layout-anim-go');
    }

    /* ─────────────────────────────────────────────────────
       TOOLTIP
    ───────────────────────────────────────────────────── */
    var tip      = document.getElementById('layoutTooltip');
    var tipNum   = document.getElementById('ttNum');
    var tipSize  = document.getElementById('ttSize');
    var tipFace  = document.getElementById('ttFacing');
    var tipRoad  = document.getElementById('ttRoad');
    var tipType  = document.getElementById('ttType');
    var tipSt    = document.getElementById('ttStatus');

    function showTip(cell, evt) {
        if (!tip || !cell.dataset.status) return;
        var stage = document.getElementById('layoutStage');
        var sr    = stage.getBoundingClientRect();
        var mx    = evt.clientX - sr.left + stage.scrollLeft;
        var my    = evt.clientY - sr.top  + stage.scrollTop;

        var st  = cell.dataset.status || '';
        var sz  = cell.dataset.size   || '';
        var sqf = cell.dataset.sqft   || '';
        if (tipNum)  tipNum.textContent  = cell.dataset.number || '—';
        if (tipSize) tipSize.textContent = sz ? sz + ' Sq. Yds' + (sqf ? ' (' + sqf + ' Sq.Ft)' : '') : '—';
        if (tipFace) tipFace.textContent = cell.dataset.facingLabel || cell.dataset.facing || '—';
        if (tipRoad) tipRoad.textContent = (cell.dataset.road || '30') + ' Ft Road';
        if (tipType) tipType.textContent = cell.dataset.type ? (cell.dataset.type.charAt(0).toUpperCase() + cell.dataset.type.slice(1) + ' Plot') : '—';
        if (tipSt) {
            tipSt.textContent = st.charAt(0).toUpperCase() + st.slice(1);
            tipSt.className   = 'layout-tooltip-status ' + st;
        }

        var tipW = 200;
        var tipX = mx + 16;
        var tipY = my - 12;
        if (tipX + tipW > sr.width - 10)  tipX = mx - tipW - 16;
        if (tipY < 4) tipY = my + 22;
        tip.style.left = tipX + 'px';
        tip.style.top  = tipY + 'px';
        tip.classList.add('visible');
        tip.setAttribute('aria-hidden', 'false');
    }
    function hideTip() {
        if (tip) { tip.classList.remove('visible'); tip.setAttribute('aria-hidden', 'true'); }
    }

    if (svgEl) {
        svgEl.addEventListener('mouseover', function (e) {
            var c = e.target.closest('.plot-cell');
            if (c && !c.classList.contains('plot-cell-hidden') && !c.classList.contains('status-sold')) { showTip(c, e); }
            else hideTip();
        });
        svgEl.addEventListener('mousemove', function (e) {
            var c = e.target.closest('.plot-cell');
            if (c && !c.classList.contains('plot-cell-hidden') && !c.classList.contains('status-sold')) showTip(c, e);
        });
        svgEl.addEventListener('mouseleave', hideTip);
        svgEl.addEventListener('touchstart', hideTip, { passive: true });
    }

    /* ─────────────────────────────────────────────────────
       ZOOM / PAN (desktop only; mobile uses CSS scroll)
    ───────────────────────────────────────────────────── */
    var scale    = 1;
    var panX     = 0;
    var panY     = 0;
    var panning  = false;
    var lastMX   = 0;
    var lastMY   = 0;
    var clickMoved = false;

    function applyXform() {
        if (svgEl) svgEl.style.transform = 'translate(' + panX + 'px,' + panY + 'px) scale(' + scale + ')';
    }

    window.layoutZoom = function (factor) {
        scale = Math.max(0.4, Math.min(5, scale * factor));
        applyXform();
    };
    window.layoutZoomReset = function () {
        scale = 1; panX = 0; panY = 0; applyXform();
    };

    var stage = document.getElementById('layoutStage');
    if (stage && window.innerWidth >= 768) {
        stage.addEventListener('wheel', function (e) {
            e.preventDefault();
            layoutZoom(e.deltaY < 0 ? 1.1 : 0.9);
        }, { passive: false });

        stage.addEventListener('mousedown', function (e) {
            if (e.button !== 0) return;
            panning = true; clickMoved = false;
            lastMX = e.clientX; lastMY = e.clientY;
            stage.style.cursor = 'grabbing';
        });
        document.addEventListener('mousemove', function (e) {
            if (!panning) return;
            var dx = e.clientX - lastMX;
            var dy = e.clientY - lastMY;
            if (Math.abs(dx) > 3 || Math.abs(dy) > 3) clickMoved = true;
            panX += dx; panY += dy;
            lastMX = e.clientX; lastMY = e.clientY;
            applyXform();
        });
        document.addEventListener('mouseup', function () {
            panning = false;
            if (stage) stage.style.cursor = 'grab';
        });
    }

    /* ─────────────────────────────────────────────────────
       DRAWER
    ───────────────────────────────────────────────────── */
    function cap(s) {
        return (s || '').split('-').map(function (w) { return w.charAt(0).toUpperCase() + w.slice(1); }).join('-');
    }

    window.openPlotDrawer = function (el) {
        if (clickMoved) { clickMoved = false; return; }
        var status = el.dataset.status || '';
        if (status === 'sold') return;

        /* Deselect previous SVG cell */
        if (selectedCell) selectedCell.classList.remove('plot-cell-selected');
        /* Select new if SVG rect */
        if (el.tagName && el.tagName.toLowerCase() === 'rect') {
            el.classList.add('plot-cell-selected');
            selectedCell = el;
        }

        var id   = el.dataset.id;
        var size = el.dataset.size || '';
        var sqft = el.dataset.sqft || '';

        document.getElementById('drawerPlotNumber').textContent = el.dataset.number || '—';

        var stCls   = status === 'reserved' ? 'reserved' : 'available';
        var stLabel = status === 'reserved' ? 'Reserved'  : 'Available';
        var stIcon  = status === 'reserved' ? 'fa-clock'  : 'fa-circle-check';
        document.getElementById('drawerStatusBadge').innerHTML =
            '<span class="plot-tile-status plot-tile-status-' + stCls + '"><i class="fa-solid ' + stIcon + '" style="font-size:7px;"></i> ' + stLabel + '</span>';

        document.getElementById('drawerArea').textContent       = size ? size + ' Sq. Yards' + (sqft ? ' (' + sqft + ' Sq. Ft)' : '') : '—';
        document.getElementById('drawerType').textContent       = cap(el.dataset.type || 'regular') + ' Plot';
        document.getElementById('drawerFacing').textContent     = cap(el.dataset.facingLabel || el.dataset.facing || '') + ' Facing';
        document.getElementById('drawerRoad').textContent       = (el.dataset.road || 30) + ' Ft Wide Road';
        document.getElementById('drawerDimensions').textContent = el.dataset.dims || 'See plot specifications';
        document.getElementById('drawerVaastu').textContent     = el.dataset.vaastu === '1' ? '100% Vaastu Compliant' : 'Standard';
        document.getElementById('drawerNotes').textContent      = el.dataset.notes || 'Contact us for further details.';

        var priceEl = document.getElementById('drawerPrice');
        var exactEl = document.getElementById('drawerExactPrice');
        if (priceEl) priceEl.textContent = el.dataset.price || '—';
        if (exactEl) exactEl.textContent = el.dataset.exact || '';

        var unlBtn = document.getElementById('drawerUnlockBtn');
        if (unlBtn) { unlBtn.dataset.plotId = id; unlBtn.dataset.plotNum = el.dataset.number + ' (' + size + ' Sq. Yds)'; }

        var viewBtn = document.getElementById('drawerViewBtn');
        if (viewBtn) viewBtn.href = plotsBaseUrl + '/' + id;

        drawerEl.classList.add('open');
        drawerEl.removeAttribute('aria-hidden');
        overlayEl.classList.add('open');
        overlayEl.removeAttribute('aria-hidden');
        document.body.style.overflow = 'hidden';
        drawerEl.focus();
        hideTip();
    };

    window.closeDrawer = function () {
        drawerEl.classList.remove('open');
        drawerEl.setAttribute('aria-hidden', 'true');
        overlayEl.classList.remove('open');
        overlayEl.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        if (selectedCell) { selectedCell.classList.remove('plot-cell-selected'); selectedCell = null; }
    };

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && drawerEl.classList.contains('open')) closeDrawer();
    });

    window.triggerDrawerUnlock = function () {
        var btn = document.getElementById('drawerUnlockBtn');
        if (btn && window.openUnlockPriceModal) openUnlockPriceModal(btn.dataset.plotId || '0', btn.dataset.plotNum || 'Plot');
    };

})();
</script>
@endpush
