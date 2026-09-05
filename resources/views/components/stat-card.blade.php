@props([
    'title',
    'value',
    'subtitle' => null,
    'icon' => 'fa-solid fa-chart-line',
    'color' => 'brand', // brand, amber, rose, blue, purple, slate
    'trend' => null,
    'trendType' => 'up', // up, down, neutral
])

@php
    $colorClasses = match($color) {
        'brand' => [
            'bg_icon' => 'bg-emerald-50 text-emerald-600 border-emerald-100/80',
            'border_card' => 'hover:border-emerald-300 hover:shadow-emerald-500/5',
            'accent' => 'text-emerald-700',
        ],
        'amber' => [
            'bg_icon' => 'bg-amber-50 text-amber-600 border-amber-100/80',
            'border_card' => 'hover:border-amber-300 hover:shadow-amber-500/5',
            'accent' => 'text-amber-700',
        ],
        'rose' => [
            'bg_icon' => 'bg-rose-50 text-rose-600 border-rose-100/80',
            'border_card' => 'hover:border-rose-300 hover:shadow-rose-500/5',
            'accent' => 'text-rose-700',
        ],
        'blue' => [
            'bg_icon' => 'bg-blue-50 text-blue-600 border-blue-100/80',
            'border_card' => 'hover:border-blue-300 hover:shadow-blue-500/5',
            'accent' => 'text-blue-700',
        ],
        'purple' => [
            'bg_icon' => 'bg-purple-50 text-purple-600 border-purple-100/80',
            'border_card' => 'hover:border-purple-300 hover:shadow-purple-500/5',
            'accent' => 'text-purple-700',
        ],
        default => [
            'bg_icon' => 'bg-slate-50 text-slate-600 border-slate-200/80',
            'border_card' => 'hover:border-slate-300 hover:shadow-slate-500/5',
            'accent' => 'text-slate-700',
        ],
    };
@endphp

<div class="relative p-5 bg-white border border-slate-200/80 rounded-2xl shadow-card transition-all duration-200 hover:shadow-card-hover {{ $colorClasses['border_card'] }} group flex flex-col justify-between">
    <div class="flex items-start justify-between gap-3 mb-3">
        <p class="text-[11px] font-extrabold tracking-wider uppercase text-slate-400">
            {{ $title }}
        </p>
        <div class="w-10 h-10 rounded-xl flex items-center justify-center text-base border shrink-0 {{ $colorClasses['bg_icon'] }} group-hover:scale-105 transition-transform duration-200">
            <i class="{{ $icon }}"></i>
        </div>
    </div>

    <div>
        <div class="flex items-baseline gap-2">
            <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                {{ $value }}
            </h3>
            @if($trend)
                <span class="inline-flex items-center gap-1 text-[11px] font-bold px-1.5 py-0.5 rounded-md {{ $trendType === 'up' ? 'bg-emerald-50 text-emerald-700' : ($trendType === 'down' ? 'bg-rose-50 text-rose-700' : 'bg-slate-100 text-slate-600') }}">
                    <i class="fa-solid {{ $trendType === 'up' ? 'fa-arrow-up' : ($trendType === 'down' ? 'fa-arrow-down' : 'fa-minus') }} text-[9px]"></i>
                    {{ $trend }}
                </span>
            @endif
        </div>
        @if($subtitle)
            <p class="text-[11px] text-slate-500 font-medium mt-1.5 flex items-center gap-1.5">
                {{ $subtitle }}
            </p>
        @endif
    </div>
</div>
