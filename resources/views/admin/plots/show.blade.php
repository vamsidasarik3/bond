@extends('layouts.admin')

@section('title', $plot->plot_number . ' Specification')
@section('page-title', $plot->plot_number . ' Details')
@section('breadcrumb', 'Plot Details')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <!-- Top Action Bar -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.plots.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-brand-600 transition-colors">
            <i class="fa-solid fa-arrow-left text-[11px]"></i>
            <span>Back to Plot Inventory</span>
        </a>

        <div class="flex items-center gap-2">
            <a href="{{ route('admin.plots.edit', $plot) }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-brand-600 hover:bg-brand-500 text-white text-xs font-bold rounded-xl shadow-xs shadow-brand-600/25 transition-all">
                <i class="fa-regular fa-pen-to-square text-xs"></i>
                <span>Edit Plot</span>
            </a>
            <button type="button" 
                onclick="openConfirmModal('{{ route('admin.plots.destroy', $plot) }}', 'Delete Plot {{ $plot->plot_number }}?', 'Are you sure you want to permanently delete this plot?', 'Yes, Delete Plot')"
                class="p-2 bg-rose-50 hover:bg-rose-100 text-rose-600 text-xs font-bold rounded-xl transition-colors">
                <i class="fa-regular fa-trash-can text-xs"></i>
            </button>
        </div>
    </div>

    <!-- Main Plot Details Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left 2 Cols: Main Specifications -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-card">
                
                <div class="flex items-start justify-between gap-4 mb-6">
                    <div>
                        <div class="flex items-center gap-2 mb-1.5">
                            <span class="px-2.5 py-0.5 text-[10px] font-extrabold uppercase rounded-full bg-brand-50 text-brand-700 border border-brand-200">
                                HMDA & TG RERA Approved
                            </span>
                            @if($plot->plot_type !== 'regular')
                                <span class="px-2.5 py-0.5 text-[10px] font-extrabold uppercase rounded-full bg-amber-50 text-amber-700 border border-amber-200">
                                    {{ $plot->plot_type }}
                                </span>
                            @endif
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">{{ $plot->plot_number }}</h2>
                        <p class="text-xs text-slate-400 mt-0.5">{{ $plot->title ?: 'AIIMS Bibinagar Plotted Residence' }}</p>
                    </div>
                    <x-badge :status="$plot->status" type="plot" />
                </div>

                <!-- Spec Grid Table -->
                <div class="border border-slate-100 rounded-2xl overflow-hidden divide-y divide-slate-100 text-xs">
                    <div class="grid grid-cols-2 p-3.5 bg-slate-50/50">
                        <span class="text-slate-500 font-medium">Plot Area / Size</span>
                        <span class="font-extrabold text-slate-900">{{ $plot->size_sq_yards }} Sq. Yards</span>
                    </div>
                    <div class="grid grid-cols-2 p-3.5">
                        <span class="text-slate-500 font-medium">Orientation / Facing</span>
                        <span class="font-bold text-slate-900 flex items-center gap-1.5">
                            <i class="fa-regular fa-compass text-brand-600 text-xs"></i>
                            <span>{{ $plot->facing }} Facing</span>
                        </span>
                    </div>
                    <div class="grid grid-cols-2 p-3.5 bg-slate-50/50">
                        <span class="text-slate-500 font-medium">Approach Road Width</span>
                        <span class="font-bold text-slate-900">{{ $plot->road_width_ft }} Feet Wide Concrete Road</span>
                    </div>
                    <div class="grid grid-cols-2 p-3.5">
                        <span class="text-slate-500 font-medium">Boundary Dimensions</span>
                        <span class="font-bold text-slate-900">{{ $plot->boundary_dimensions ?: 'Standard Plot Dimensions' }}</span>
                    </div>
                    <div class="grid grid-cols-2 p-3.5 bg-slate-50/50">
                        <span class="text-slate-500 font-medium">Vaastu Compliance</span>
                        <span class="font-bold text-emerald-600 flex items-center gap-1">
                            @if($plot->is_vaastu_compliant)
                                <i class="fa-solid fa-circle-check text-xs"></i>
                                <span>100% Vaastu Compliance</span>
                            @else
                                <span class="text-slate-400">Standard</span>
                            @endif
                        </span>
                    </div>
                    <div class="grid grid-cols-2 p-3.5">
                        <span class="text-slate-500 font-medium">Project Location</span>
                        <span class="font-semibold text-slate-700">AIIMS - Bibinagar, Telangana (Warangal Highway)</span>
                    </div>
                </div>

                <!-- Notes / Remarks -->
                @if($plot->notes)
                    <div class="mt-6 p-4 rounded-2xl bg-slate-50 border border-slate-100 text-xs">
                        <div class="font-extrabold text-slate-700 uppercase text-[10px] tracking-wider mb-1">Administrative Notes:</div>
                        <p class="text-slate-600 leading-relaxed">{{ $plot->notes }}</p>
                    </div>
                @endif
            </div>

            <!-- Associated Inquiries -->
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-card">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-base font-extrabold text-slate-900 tracking-tight">Leads Interested in this Plot</h3>
                    <span class="text-xs font-bold text-slate-400 bg-slate-100 px-2.5 py-0.5 rounded-full">{{ $plot->enquiries->count() }} Leads</span>
                </div>

                @if($plot->enquiries->count() > 0)
                    <div class="divide-y divide-slate-100">
                        @foreach($plot->enquiries as $enquiry)
                            <div class="py-3 flex items-center justify-between gap-3 text-xs">
                                <div>
                                    <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="font-extrabold text-slate-900 hover:text-brand-600 transition-colors">
                                        {{ $enquiry->name }}
                                    </a>
                                    <div class="text-[11px] text-slate-400 mt-0.5">
                                        <span>{{ $enquiry->phone }}</span> • <span>{{ $enquiry->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <x-badge :status="$enquiry->status" type="enquiry" />
                                    <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="p-1.5 text-slate-400 hover:text-brand-600 hover:bg-slate-50 rounded-lg transition-colors">
                                        <i class="fa-regular fa-eye text-xs"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-xs text-slate-400 text-center py-6">No customer enquiries linked directly to this plot number yet.</p>
                @endif
            </div>
        </div>

        <!-- Right Col: Financial Breakdown -->
        <div class="space-y-6">
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-card">
                <h3 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider mb-4">Pricing Breakdown</h3>

                <div class="space-y-3 text-xs">
                    <div class="flex justify-between py-2 border-b border-slate-100">
                        <span class="text-slate-500">Rate per Sq. Yard</span>
                        <span class="font-bold text-slate-800">₹{{ number_format($plot->price_per_sq_yard) }}</span>
                    </div>

                    <div class="flex justify-between py-2 border-b border-slate-100">
                        <span class="text-slate-500">Calculated Area</span>
                        <span class="font-bold text-slate-800">{{ $plot->size_sq_yards }} Sq. Yds</span>
                    </div>

                    <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-100 mt-4">
                        <div class="text-xs font-bold text-emerald-800">Total Price</div>
                        <div class="text-2xl font-extrabold text-emerald-700 mt-1">
                            {{ $plot->formatted_exact_price }}
                        </div>
                        <div class="text-xs font-semibold text-emerald-600 mt-0.5">
                            Approx {{ $plot->formatted_price }}
                        </div>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-slate-100 space-y-2 text-[11px] text-slate-400">
                    <p class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-500 text-[10px]"></i> Immediate spot registration</p>
                    <p class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-500 text-[10px]"></i> Bank loan facility from SBI & leading banks</p>
                    <p class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-500 text-[10px]"></i> 100% Clear Title with HMDA approval</p>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
