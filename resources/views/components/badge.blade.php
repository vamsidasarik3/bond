@props([
    'status' => 'available',
    'type' => 'plot' // 'plot' or 'enquiry'
])

@php
    if ($type === 'plot') {
        $styles = match(strtolower($status)) {
            'available' => 'bg-emerald-50 text-emerald-700 border-emerald-200/80',
            'reserved', 'booked' => 'bg-amber-50 text-amber-700 border-amber-200/80',
            'sold' => 'bg-rose-50 text-rose-700 border-rose-200/80',
            default => 'bg-slate-50 text-slate-700 border-slate-200/80',
        };
        $dotColor = match(strtolower($status)) {
            'available' => 'bg-emerald-500',
            'reserved', 'booked' => 'bg-amber-500',
            'sold' => 'bg-rose-500',
            default => 'bg-slate-400',
        };
    } else {
        $styles = match(strtolower($status)) {
            'new' => 'bg-blue-50 text-blue-700 border-blue-200/80',
            'contacted' => 'bg-purple-50 text-purple-700 border-purple-200/80',
            'in_progress' => 'bg-amber-50 text-amber-700 border-amber-200/80',
            'closed' => 'bg-emerald-50 text-emerald-700 border-emerald-200/80',
            default => 'bg-slate-50 text-slate-700 border-slate-200/80',
        };
        $dotColor = match(strtolower($status)) {
            'new' => 'bg-blue-500',
            'contacted' => 'bg-purple-500',
            'in_progress' => 'bg-amber-500',
            'closed' => 'bg-emerald-500',
            default => 'bg-slate-400',
        };
    }
    $label = ucfirst(str_replace('_', ' ', $status));
@endphp

<span class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-bold rounded-full border shadow-2xs {{ $styles }}">
    <span class="w-1.5 h-1.5 rounded-full {{ $dotColor }}"></span>
    <span>{{ $label }}</span>
</span>
