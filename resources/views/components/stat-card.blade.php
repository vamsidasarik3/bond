@props([
    'title',
    'value',
    'subtitle' => null,
    'icon' => 'fa-solid fa-chart-line',
    'color' => 'brand', // brand, amber, rose, blue, purple
])

@php
    $colorClasses = match($color) {
        'brand' => [
            'bg_icon' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
            'border_card' => 'hover:border-emerald-300',
        ],
        'amber' => [
            'bg_icon' => 'bg-amber-50 text-amber-600 border-amber-100',
            'border_card' => 'hover:border-amber-300',
        ],
        'rose' => [
            'bg_icon' => 'bg-rose-50 text-rose-600 border-rose-100',
            'border_card' => 'hover:border-rose-300',
        ],
        'blue' => [
            'bg_icon' => 'bg-blue-50 text-blue-600 border-blue-100',
            'border_card' => 'hover:border-blue-300',
        ],
        'purple' => [
            'bg_icon' => 'bg-purple-50 text-purple-600 border-purple-100',
            'border_card' => 'hover:border-purple-300',
        ],
        default => [
            'bg_icon' => 'bg-slate-50 text-slate-600 border-slate-100',
            'border_card' => 'hover:border-slate-300',
        ],
    };
@endphp

<div class="p-6 bg-white border border-slate-200/80 rounded-2xl shadow-xs transition-all duration-200 hover:shadow-md {{ $colorClasses['border_card'] }}">
    <div class="flex items-center justify-between gap-4">
        <div>
            <p class="text-xs font-bold tracking-wider uppercase text-slate-400 mb-1">
                {{ $title }}
            </p>
            <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                {{ $value }}
            </h3>
            @if($subtitle)
                <p class="text-xs text-slate-500 font-medium mt-1.5 flex items-center gap-1.5">
                    {{ $subtitle }}
                </p>
            @endif
        </div>
        <div class="w-13 h-13 rounded-2xl flex items-center justify-center text-xl border shrink-0 {{ $colorClasses['bg_icon'] }}">
            <i class="{{ $icon }}"></i>
        </div>
    </div>
</div>
