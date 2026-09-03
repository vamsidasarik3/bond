@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')
@section('breadcrumb', 'Overview')

@section('content')
<div class="space-y-6">

    <!-- Top Welcome Banner -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-5 sm:p-6 bg-white border border-slate-200/80 rounded-2xl shadow-xs">
        <div>
            <div class="inline-flex items-center gap-2 px-2.5 py-0.5 rounded-full bg-brand-50 text-brand-700 text-xs font-bold mb-1.5 border border-brand-200">
                <i class="fa-solid fa-location-dot text-[10px]"></i>
                <span>AIIMS - Bibinagar Plotted Venture</span>
            </div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">
                Welcome, {{ Auth::user()->name }}
            </h2>
            <p class="text-xs text-slate-500 mt-0.5">
                Here is a quick overview of your real-estate website and plot inventory status.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('admin.plots.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-brand-600 hover:bg-brand-500 text-white text-xs font-bold rounded-xl shadow-xs transition-all">
                <i class="fa-solid fa-plus text-xs"></i>
                <span>Add Plot</span>
            </a>
            <a href="{{ route('admin.enquiries.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-all">
                <i class="fa-regular fa-envelope text-xs"></i>
                <span>View Enquiries</span>
            </a>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- 1. DASHBOARD SUMMARY CARDS (5 Dynamic Cards)                   -->
    <!-- ============================================================== -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
        
        <!-- 1. Total Plots -->
        <x-stat-card 
            title="Total Plots"
            :value="$totalPlots"
            subtitle="Registered in inventory"
            icon="fa-solid fa-map-location-dot"
            color="brand"
        />

        <!-- 2. Available Plots -->
        <x-stat-card 
            title="Available Plots"
            :value="$availablePlots"
            :subtitle="$totalPlots > 0 ? round(($availablePlots / $totalPlots) * 100) . '% of inventory' : '0%'"
            icon="fa-solid fa-circle-check"
            color="brand"
        />

        <!-- 3. Reserved Plots -->
        <x-stat-card 
            title="Reserved Plots"
            :value="$reservedPlots"
            :subtitle="$totalPlots > 0 ? round(($reservedPlots / $totalPlots) * 100) . '% reserved' : '0%'"
            icon="fa-solid fa-bookmark"
            color="amber"
        />

        <!-- 4. Sold Plots -->
        <x-stat-card 
            title="Sold Plots"
            :value="$soldPlots"
            :subtitle="$totalPlots > 0 ? round(($soldPlots / $totalPlots) * 100) . '% registered' : '0%'"
            icon="fa-solid fa-handshake"
            color="rose"
        />

        <!-- 5. Total Contact Enquiries -->
        <x-stat-card 
            title="Total Enquiries"
            :value="$totalEnquiries"
            subtitle="Customer leads submitted"
            icon="fa-solid fa-comments"
            color="blue"
        />

    </div>

    <!-- ============================================================== -->
    <!-- 2. PLOT STATUS OVERVIEW (Visual Progress & Status Breakdown)   -->
    <!-- ============================================================== -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-5 sm:p-6 shadow-xs space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
            <div>
                <h3 class="text-base font-extrabold text-slate-900 tracking-tight">Plot Status Overview</h3>
                <p class="text-xs text-slate-500">Visual breakdown of current layout inventory by availability</p>
            </div>
            <a href="{{ route('admin.plots.index') }}" class="text-xs font-bold text-brand-600 hover:text-brand-700 flex items-center gap-1">
                <span>Manage Plots</span>
                <i class="fa-solid fa-arrow-right text-[10px]"></i>
            </a>
        </div>

        @php
            $availPct = $totalPlots > 0 ? round(($availablePlots / $totalPlots) * 100) : 0;
            $resPct = $totalPlots > 0 ? round(($reservedPlots / $totalPlots) * 100) : 0;
            $soldPct = $totalPlots > 0 ? round(($soldPlots / $totalPlots) * 100) : 0;
        @endphp

        <!-- Visual Multi-segment Distribution Bar -->
        <div class="w-full h-3.5 bg-slate-100 rounded-full overflow-hidden flex shadow-inner">
            <div style="width: {{ $availPct }}%" class="h-full bg-emerald-500 transition-all duration-500" title="Available: {{ $availablePlots }} plots ({{ $availPct }}%)"></div>
            <div style="width: {{ $resPct }}%" class="h-full bg-amber-500 transition-all duration-500" title="Reserved: {{ $reservedPlots }} plots ({{ $resPct }}%)"></div>
            <div style="width: {{ $soldPct }}%" class="h-full bg-rose-500 transition-all duration-500" title="Sold: {{ $soldPlots }} plots ({{ $soldPct }}%)"></div>
        </div>

        <!-- Status Summary Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-1">
            
            <!-- Available Segment -->
            <div class="flex items-center justify-between p-3.5 rounded-xl bg-emerald-50/70 border border-emerald-100">
                <div class="flex items-center gap-2.5">
                    <span class="w-3 h-3 rounded-full bg-emerald-500 shrink-0"></span>
                    <div>
                        <span class="text-xs font-bold text-emerald-950 block">Available</span>
                        <span class="text-[11px] text-emerald-700 font-medium">Ready for booking</span>
                    </div>
                </div>
                <div class="text-right">
                    <span class="text-lg font-extrabold text-emerald-950">{{ $availablePlots }}</span>
                    <span class="text-xs text-emerald-700 font-bold block">{{ $availPct }}%</span>
                </div>
            </div>

            <!-- Reserved Segment -->
            <div class="flex items-center justify-between p-3.5 rounded-xl bg-amber-50/70 border border-amber-100">
                <div class="flex items-center gap-2.5">
                    <span class="w-3 h-3 rounded-full bg-amber-500 shrink-0"></span>
                    <div>
                        <span class="text-xs font-bold text-amber-950 block">Reserved</span>
                        <span class="text-[11px] text-amber-700 font-medium">Token advance received</span>
                    </div>
                </div>
                <div class="text-right">
                    <span class="text-lg font-extrabold text-amber-950">{{ $reservedPlots }}</span>
                    <span class="text-xs text-amber-700 font-bold block">{{ $resPct }}%</span>
                </div>
            </div>

            <!-- Sold Segment -->
            <div class="flex items-center justify-between p-3.5 rounded-xl bg-rose-50/70 border border-rose-100">
                <div class="flex items-center gap-2.5">
                    <span class="w-3 h-3 rounded-full bg-rose-500 shrink-0"></span>
                    <div>
                        <span class="text-xs font-bold text-rose-950 block">Sold</span>
                        <span class="text-[11px] text-rose-700 font-medium">Deed registered</span>
                    </div>
                </div>
                <div class="text-right">
                    <span class="text-lg font-extrabold text-rose-950">{{ $soldPlots }}</span>
                    <span class="text-xs text-rose-700 font-bold block">{{ $soldPct }}%</span>
                </div>
            </div>

        </div>
    </div>

    <!-- ============================================================== -->
    <!-- 3. TWO-COLUMN LAYOUT: Recent Enquiries & Recent Plot Updates    -->
    <!-- ============================================================== -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- ============================================================== -->
        <!-- Recent Enquiries Section                                       -->
        <!-- ============================================================== -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs flex flex-col justify-between overflow-hidden">
            <div class="p-5 sm:p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-base font-extrabold text-slate-900 tracking-tight">Recent Enquiries</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Latest customer lead inquiries</p>
                </div>
                <a href="{{ route('admin.enquiries.index') }}" class="text-xs font-bold text-brand-600 hover:text-brand-700 flex items-center gap-1">
                    <span>View All</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <!-- Enquiries Table / List -->
            <div class="overflow-x-auto flex-1">
                <table class="w-full min-w-[520px] text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/75 border-b border-slate-100 text-[11px] font-extrabold uppercase tracking-wider text-slate-400">
                            <th class="py-3 px-5">Customer</th>
                            <th class="py-3 px-4">Contact</th>
                            <th class="py-3 px-4">Submitted</th>
                            <th class="py-3 px-4">Message Preview</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                        @forelse($recentEnquiries as $enquiry)
                            <tr class="hover:bg-slate-50/70 transition-colors group">
                                <!-- Name -->
                                <td class="py-3.5 px-5 font-bold text-slate-900 whitespace-nowrap">
                                    <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="hover:text-brand-600 transition-colors">
                                        {{ $enquiry->name }}
                                    </a>
                                </td>

                                <!-- Email & Phone -->
                                <td class="py-3.5 px-4 whitespace-nowrap">
                                    <div class="font-medium text-slate-800">
                                        <a href="tel:{{ $enquiry->phone }}" class="hover:text-brand-600">
                                            {{ $enquiry->phone }}
                                        </a>
                                    </div>
                                    <div class="text-[11px] text-slate-400 truncate max-w-[140px]">
                                        {{ $enquiry->email ?: '—' }}
                                    </div>
                                </td>

                                <!-- Submitted Date -->
                                <td class="py-3.5 px-4 whitespace-nowrap">
                                    <div class="font-medium text-slate-800">{{ $enquiry->created_at->format('d M Y') }}</div>
                                    <div class="text-[11px] text-slate-400">{{ $enquiry->created_at->diffForHumans() }}</div>
                                </td>

                                <!-- Short Message Preview -->
                                <td class="py-3.5 px-4 max-w-xs">
                                    <p class="text-xs text-slate-600 line-clamp-1" title="{{ $enquiry->message }}">
                                        {{ Str::limit($enquiry->message ?: 'General enquiry', 60) }}
                                    </p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-10 text-center text-slate-400 text-xs">
                                    No contact enquiries submitted yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Bottom Link Bar -->
            <div class="p-3.5 border-t border-slate-100 bg-slate-50/50 text-center">
                <a href="{{ route('admin.enquiries.index') }}" class="text-xs font-bold text-slate-600 hover:text-brand-600 transition-colors">
                    Go to Contact & Enquiry Management →
                </a>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- Recent Plot Updates Section                                    -->
        <!-- ============================================================== -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs flex flex-col justify-between overflow-hidden">
            <div class="p-5 sm:p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-base font-extrabold text-slate-900 tracking-tight">Recent Plot Updates</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Recently added or modified plots</p>
                </div>
                <a href="{{ route('admin.plots.index') }}" class="text-xs font-bold text-brand-600 hover:text-brand-700 flex items-center gap-1">
                    <span>View All</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <!-- Plots Table / List -->
            <div class="overflow-x-auto flex-1">
                <table class="w-full min-w-[560px] text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/75 border-b border-slate-100 text-[11px] font-extrabold uppercase tracking-wider text-slate-400">
                            <th class="py-3 px-5">Plot Number</th>
                            <th class="py-3 px-4">Area</th>
                            <th class="py-3 px-4">Price</th>
                            <th class="py-3 px-4">Facing</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-5 text-right">Last Updated</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                        @forelse($recentPlots as $plot)
                            <tr class="hover:bg-slate-50/70 transition-colors group">
                                <!-- Plot Number -->
                                <td class="py-3.5 px-5 font-bold text-slate-900 whitespace-nowrap">
                                    <a href="{{ route('admin.plots.edit', $plot) }}" class="hover:text-brand-600 transition-colors">
                                        {{ $plot->plot_number }}
                                    </a>
                                </td>

                                <!-- Area -->
                                <td class="py-3.5 px-4 font-semibold text-slate-800 whitespace-nowrap">
                                    {{ $plot->size_sq_yards }} Sq. Yds
                                </td>

                                <!-- Price -->
                                <td class="py-3.5 px-4 font-bold text-slate-900 whitespace-nowrap">
                                    {{ $plot->formatted_price }}
                                </td>

                                <!-- Facing -->
                                <td class="py-3.5 px-4 text-slate-600 whitespace-nowrap">
                                    {{ $plot->facing }}
                                </td>

                                <!-- Status -->
                                <td class="py-3.5 px-4 whitespace-nowrap">
                                    <x-badge :status="$plot->status" type="plot" />
                                </td>

                                <!-- Last Updated -->
                                <td class="py-3.5 px-5 text-right text-slate-400 text-[11px] whitespace-nowrap">
                                    {{ $plot->updated_at->diffForHumans() }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-10 text-center text-slate-400 text-xs">
                                    No plots found in inventory.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Bottom Link Bar -->
            <div class="p-3.5 border-t border-slate-100 bg-slate-50/50 text-center">
                <a href="{{ route('admin.plots.index') }}" class="text-xs font-bold text-slate-600 hover:text-brand-600 transition-colors">
                    Go to Full Plot Inventory Management →
                </a>
            </div>
        </div>

    </div>

</div>
@endsection
