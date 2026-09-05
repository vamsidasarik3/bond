@props(['plot'])

@php
    $status = $plot['status'] ?? 'available';
    $statusClass = match($status) {
        'sold' => 'status-sold',
        'reserved' => 'status-reserved',
        default => 'status-available',
    };
    $statusLabel = match($status) {
        'sold' => 'Sold',
        'reserved' => 'Reserved',
        default => 'Available',
    };
    $statusIcon = match($status) {
        'sold' => 'fa-circle-xmark',
        'reserved' => 'fa-clock',
        default => 'fa-circle-check',
    };
    $isUnlocked = $plot['is_price_unlocked'] ?? session('prices_unlocked', false);
@endphp

<div class="plot-card">
    <div>
        <!-- Top Status & Facing -->
        <div class="plot-card-header">
            <span class="{{ $statusClass }}">
                <i class="fa-solid {{ $statusIcon }}" style="font-size: 8px;"></i> {{ $statusLabel }}
            </span>
            <span class="text-white-50 fs-12">
                <i class="fa-solid fa-compass me-1 text-brand-secondary"></i> {{ $plot['facing'] ?? 'East' }} Facing
            </span>
        </div>

        <!-- Plot Title & Number -->
        <h3 class="plot-card-title">
            {{ $plot['number'] ?? 'Plot #' . $plot['id'] }}
        </h3>
        <p class="plot-card-meta">
            {{ $plot['area'] ?? ($plot['size_sq_yards'] . ' Sq. Yards') }}, {{ $plot['dimensions'] ?? 'Standard Layout' }}
        </p>

        <!-- Price Details Box (Secure Server-Side Locked / Unlocked Container) -->
        <div class="plot-price-box" id="plot-price-container-{{ $plot['id'] }}">
            @if($isUnlocked && !empty($plot['price']))
                <div class="plot-price-label">Calculated Total Price</div>
                <div class="plot-price-amount text-brand-secondary">
                    {{ $plot['price'] }}
                </div>
                <div class="plot-price-unit text-brand-secondary font-copperplate fw-bold">
                    <i class="fa-solid fa-tag me-1"></i> {{ $plot['price_per_sq_yard_formatted'] ?? ('₹ ' . number_format($plot['price_per_sq_yard'] ?? 14999) . ' / Sq. Yard') }}
                </div>
                @if(!empty($plot['exact_price']))
                    <div class="fs-11 text-white-50 mt-0.5">Exact: {{ $plot['exact_price'] }}</div>
                @endif
            @else
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="fs-12 text-white-50 font-copperplate">
                        <i class="fa-solid fa-lock text-brand-secondary me-1"></i> Price Locked
                    </span>
                    <span class="badge bg-dark bg-opacity-75 text-brand-secondary border border-white-10 fs-10 font-copperplate">
                        Direct Developer
                    </span>
                </div>
                <button type="button" class="btn btn-secondary-brand w-100 py-2 fs-12 font-copperplate mt-1" onclick="openUnlockPriceModal('{{ $plot['id'] }}', '{{ $plot['number'] ?? 'Plot' }} ({{ $plot['area'] ?? '' }})')">
                    <i class="fa-solid fa-lock-open me-1"></i> Unlock Price &rarr;
                </button>
            @endif
        </div>
    </div>

    <!-- Action Link -->
    <a href="{{ route('plots.show', $plot['id']) }}" class="btn btn-outline-light plot-card-btn hover-scale-btn">
        <span>View Plot Details &rarr;</span>
    </a>
</div>
