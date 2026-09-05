@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard Overview')
@section('breadcrumb', 'Overview')

@php
    function formatCr($amount) {
        if ($amount >= 10000000) {
            return '₹' . number_format($amount / 10000000, 2) . ' Cr';
        } elseif ($amount >= 100000) {
            return '₹' . number_format($amount / 100000, 2) . ' L';
        }
        return '₹' . number_format($amount);
    }
@endphp

@section('content')
<div class="space-y-6">

    <!-- Top Welcome & Status Banner -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 p-5 sm:p-6 bg-white border border-slate-200/80 rounded-3xl shadow-card">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-xs font-bold mb-2 border border-brand-200/80">
                <span class="w-1.5 h-1.5 rounded-full bg-brand-500 animate-pulse"></span>
                <span>AIIMS Bibinagar — 17-Acre Plotted Community</span>
            </div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">
                Welcome back, {{ Auth::user()->name }}
            </h2>
            <p class="text-xs text-slate-500 mt-1">
                Real-estate inventory status, lead conversion pipeline, and valuation metrics updated in real-time.
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-2.5">
            <a href="{{ route('admin.plots.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-brand-600 hover:bg-brand-500 text-white text-xs font-bold rounded-xl shadow-xs shadow-brand-600/25 transition-all">
                <i class="fa-solid fa-plus text-xs"></i>
                <span>Add Plot</span>
            </a>
            <a href="{{ route('admin.enquiries.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-white hover:bg-slate-50 text-slate-700 text-xs font-bold rounded-xl border border-slate-200 shadow-xs transition-colors">
                <i class="fa-solid fa-envelope-open-text text-xs text-slate-400"></i>
                <span>Review Enquiries</span>
                @if($newEnquiries > 0)
                    <span class="px-1.5 py-0.5 rounded-full bg-amber-500 text-slate-950 text-[10px] font-extrabold">{{ $newEnquiries }}</span>
                @endif
            </a>
            <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold rounded-xl transition-colors">
                <i class="fa-solid fa-city text-xs"></i>
                <span>Projects ({{ $totalProjects }})</span>
            </a>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- 1. KEY PERFORMANCE METRICS GRID (SaaS Stat Cards)              -->
    <!-- ============================================================== -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- 1. Total Plots -->
        <x-stat-card 
            title="Total Plots"
            :value="$totalPlots"
            subtitle="Registered across layout"
            icon="fa-solid fa-map-location-dot"
            color="slate"
        />

        <!-- 2. Available Plots -->
        <x-stat-card 
            title="Available Plots"
            :value="$availablePlots"
            :subtitle="$totalPlots > 0 ? round(($availablePlots / $totalPlots) * 100) . '% ready for booking' : '0%'"
            icon="fa-solid fa-circle-check"
            color="brand"
            trend="{{ $availablePlots }} units"
            trendType="up"
        />

        <!-- 3. Reserved / Booked Plots -->
        <x-stat-card 
            title="Reserved Plots"
            :value="$reservedPlots"
            :subtitle="$totalPlots > 0 ? round(($reservedPlots / $totalPlots) * 100) . '% token received' : '0%'"
            icon="fa-solid fa-bookmark"
            color="amber"
            trend="Under token"
            trendType="neutral"
        />

        <!-- 4. Sold / Registered Plots -->
        <x-stat-card 
            title="Sold Plots"
            :value="$soldPlots"
            :subtitle="$totalPlots > 0 ? round(($soldPlots / $totalPlots) * 100) . '% deed registered' : '0%'"
            icon="fa-solid fa-handshake"
            color="rose"
            trend="Closed sales"
            trendType="neutral"
        />

        <!-- 5. Total Enquiries / Leads -->
        <x-stat-card 
            title="Customer Leads"
            :value="$totalEnquiries"
            :subtitle="$newEnquiries . ' new pending review'"
            icon="fa-solid fa-comments"
            color="blue"
            trend="+{{ $newEnquiries }} New"
            trendType="up"
        />

        <!-- 6. Site Visits Scheduled -->
        <x-stat-card 
            title="Site Visits"
            :value="$siteVisits"
            subtitle="Customer walkthrough bookings"
            icon="fa-regular fa-calendar-check"
            color="purple"
            trend="Scheduled"
            trendType="up"
        />

        <!-- 7. Active Inventory Value -->
        <x-stat-card 
            title="Available Pipeline Value"
            :value="formatCr($availableInventoryValue)"
            subtitle="Open inventory valuation"
            icon="fa-solid fa-coins"
            color="brand"
        />

        <!-- 8. Realized Sales Revenue -->
        <x-stat-card 
            title="Realized Sold Value"
            :value="formatCr($soldInventoryValue)"
            subtitle="Deed registered revenue"
            icon="fa-solid fa-vault"
            color="slate"
        />

    </div>

    <!-- ============================================================== -->
    <!-- 2. INTERACTIVE CHARTS & INVENTORY VISUALIZATIONS               -->
    <!-- ============================================================== -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Chart 1: Plot Availability Donut Chart -->
        <div class="bg-white rounded-3xl border border-slate-200/80 p-5 sm:p-6 shadow-card flex flex-col justify-between">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div>
                    <h3 class="text-base font-extrabold text-slate-900 tracking-tight">Inventory Distribution</h3>
                    <p class="text-xs text-slate-400">Current layout status breakdown</p>
                </div>
                <span class="text-xs font-extrabold text-slate-700 bg-slate-100 px-2.5 py-1 rounded-full">
                    {{ $totalPlots }} Units
                </span>
            </div>

            <div class="relative py-4 flex items-center justify-center min-h-[220px]">
                <canvas id="plotStatusDonut" width="220" height="220"></canvas>
            </div>

            <div class="grid grid-cols-3 gap-2 pt-4 border-t border-slate-100 text-center">
                <div class="p-2 rounded-xl bg-emerald-50 border border-emerald-100">
                    <span class="text-[10px] font-bold text-emerald-800 uppercase block">Available</span>
                    <span class="text-sm font-extrabold text-emerald-900">{{ $availablePlots }}</span>
                </div>
                <div class="p-2 rounded-xl bg-amber-50 border border-amber-100">
                    <span class="text-[10px] font-bold text-amber-800 uppercase block">Reserved</span>
                    <span class="text-sm font-extrabold text-amber-900">{{ $reservedPlots }}</span>
                </div>
                <div class="p-2 rounded-xl bg-rose-50 border border-rose-100">
                    <span class="text-[10px] font-bold text-rose-800 uppercase block">Sold</span>
                    <span class="text-sm font-extrabold text-rose-900">{{ $soldPlots }}</span>
                </div>
            </div>
        </div>

        <!-- Chart 2: Facing Direction Distribution Bar Chart -->
        <div class="bg-white rounded-3xl border border-slate-200/80 p-5 sm:p-6 shadow-card flex flex-col justify-between">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div>
                    <h3 class="text-base font-extrabold text-slate-900 tracking-tight">Plots by Orientation</h3>
                    <p class="text-xs text-slate-400">Inventory breakdown by facing direction</p>
                </div>
                <a href="{{ route('admin.plots.index') }}" class="text-xs font-bold text-brand-600 hover:text-brand-700 flex items-center gap-1">
                    <span>Manage</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="py-4 relative min-h-[220px] flex items-center">
                <canvas id="facingBarChart" class="w-full h-full"></canvas>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                <span>100% Vaastu Compliance Layout</span>
                <span class="font-bold text-slate-800">{{ count($plotsByFacing) }} Orientations</span>
            </div>
        </div>

        <!-- Chart 3: CRM Leads Pipeline Funnel -->
        <div class="bg-white rounded-3xl border border-slate-200/80 p-5 sm:p-6 shadow-card flex flex-col justify-between">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div>
                    <h3 class="text-base font-extrabold text-slate-900 tracking-tight">Lead Conversion Funnel</h3>
                    <p class="text-xs text-slate-400">Customer pipeline by stage</p>
                </div>
                <a href="{{ route('admin.enquiries.index') }}" class="text-xs font-bold text-brand-600 hover:text-brand-700 flex items-center gap-1">
                    <span>View CRM</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="py-4 space-y-3">
                @php
                    $maxLead = max(1, $totalEnquiries);
                    $newPct = round(($enquiryStatusCounts['new'] / $maxLead) * 100);
                    $contPct = round(($enquiryStatusCounts['contacted'] / $maxLead) * 100);
                    $progPct = round(($enquiryStatusCounts['in_progress'] / $maxLead) * 100);
                    $closePct = round(($enquiryStatusCounts['closed'] / $maxLead) * 100);
                @endphp

                <!-- Stage 1: New Leads -->
                <div>
                    <div class="flex items-center justify-between text-xs font-bold mb-1">
                        <span class="flex items-center gap-2 text-blue-700">
                            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                            <span>New Leads</span>
                        </span>
                        <span class="text-slate-800">{{ $enquiryStatusCounts['new'] }} ({{ $newPct }}%)</span>
                    </div>
                    <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                        <div style="width: {{ $newPct }}%" class="h-full bg-blue-500 rounded-full transition-all duration-500"></div>
                    </div>
                </div>

                <!-- Stage 2: Contacted -->
                <div>
                    <div class="flex items-center justify-between text-xs font-bold mb-1">
                        <span class="flex items-center gap-2 text-purple-700">
                            <span class="w-2 h-2 rounded-full bg-purple-500"></span>
                            <span>Contacted</span>
                        </span>
                        <span class="text-slate-800">{{ $enquiryStatusCounts['contacted'] }} ({{ $contPct }}%)</span>
                    </div>
                    <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                        <div style="width: {{ $contPct }}%" class="h-full bg-purple-500 rounded-full transition-all duration-500"></div>
                    </div>
                </div>

                <!-- Stage 3: In Progress -->
                <div>
                    <div class="flex items-center justify-between text-xs font-bold mb-1">
                        <span class="flex items-center gap-2 text-amber-700">
                            <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                            <span>In Negotiation / Visit</span>
                        </span>
                        <span class="text-slate-800">{{ $enquiryStatusCounts['in_progress'] }} ({{ $progPct }}%)</span>
                    </div>
                    <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                        <div style="width: {{ $progPct }}%" class="h-full bg-amber-500 rounded-full transition-all duration-500"></div>
                    </div>
                </div>

                <!-- Stage 4: Closed -->
                <div>
                    <div class="flex items-center justify-between text-xs font-bold mb-1">
                        <span class="flex items-center gap-2 text-emerald-700">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            <span>Closed / Converted</span>
                        </span>
                        <span class="text-slate-800">{{ $enquiryStatusCounts['closed'] }} ({{ $closePct }}%)</span>
                    </div>
                    <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                        <div style="width: {{ $closePct }}%" class="h-full bg-emerald-500 rounded-full transition-all duration-500"></div>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                <span>Total Active Leads</span>
                <span class="font-bold text-slate-800">{{ $totalEnquiries }} Submissions</span>
            </div>
        </div>

    </div>

    <!-- ============================================================== -->
    <!-- 3. VENTURES PORTFOLIO SNAPSHOT                                 -->
    <!-- ============================================================== -->
    <div class="bg-white rounded-3xl border border-slate-200/80 p-5 sm:p-6 shadow-card space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
            <div>
                <h3 class="text-base font-extrabold text-slate-900 tracking-tight">Active Ventures Portfolio</h3>
                <p class="text-xs text-slate-400">Current layout developments under Navagruha Infra</p>
            </div>
            <a href="{{ route('admin.projects.index') }}" class="text-xs font-bold text-brand-600 hover:text-brand-700 flex items-center gap-1">
                <span>View Full Portfolio</span>
                <i class="fa-solid fa-arrow-right text-[10px]"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($projectsSummary as $proj)
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:border-slate-300 transition-all flex flex-col justify-between">
                    <div>
                        <div class="flex items-start justify-between gap-2 mb-2">
                            <span class="text-[10px] font-extrabold px-2 py-0.5 rounded-full border {{ $proj['status_class'] }}">
                                {{ $proj['status'] }}
                            </span>
                            <span class="text-[11px] font-bold text-slate-500">
                                {{ $proj['extent'] }}
                            </span>
                        </div>
                        <h4 class="font-extrabold text-sm text-slate-900 tracking-tight">
                            {{ $proj['name'] }}
                        </h4>
                        <p class="text-[11px] text-slate-400 mt-0.5">{{ $proj['category'] }}</p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-200/60 flex items-center justify-between text-xs">
                        <span class="text-slate-500">Total Units: <strong class="text-slate-800">{{ $proj['total_units'] }}</strong></span>
                        <span class="text-emerald-700 font-bold">{{ $proj['available'] }} Available</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- 4. TWO-COLUMN LAYOUT: Recent Enquiries & Recent Plot Updates    -->
    <!-- ============================================================== -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- ============================================================== -->
        <!-- Recent Enquiries Section                                       -->
        <!-- ============================================================== -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-card flex flex-col justify-between overflow-hidden">
            <div class="p-5 sm:p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-base font-extrabold text-slate-900 tracking-tight">Recent CRM Leads</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Latest customer inquiries</p>
                </div>
                <a href="{{ route('admin.enquiries.index') }}" class="text-xs font-bold text-brand-600 hover:text-brand-700 flex items-center gap-1">
                    <span>View All</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <!-- Enquiries Table / List -->
            <div class="overflow-x-auto flex-1">
                <table class="w-full min-w-[500px] text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/75 border-b border-slate-100 text-[10px] font-extrabold uppercase tracking-wider text-slate-400">
                            <th class="py-3 px-5">Lead</th>
                            <th class="py-3 px-4">Contact</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                        @forelse($recentEnquiries as $enquiry)
                            <tr class="hover:bg-slate-50/70 transition-colors group">
                                <!-- Name -->
                                <td class="py-3.5 px-5 whitespace-nowrap">
                                    <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="font-extrabold text-slate-900 group-hover:text-brand-600 transition-colors block">
                                        {{ $enquiry->name }}
                                    </a>
                                    <span class="text-[10px] text-slate-400">
                                        {{ $enquiry->created_at->diffForHumans() }}
                                    </span>
                                </td>

                                <!-- Phone & WhatsApp -->
                                <td class="py-3.5 px-4 whitespace-nowrap">
                                    <div class="font-semibold text-slate-800 flex items-center gap-2">
                                        <a href="tel:{{ $enquiry->phone }}" class="hover:text-brand-600">
                                            {{ $enquiry->phone }}
                                        </a>
                                        @php $clean = preg_replace('/[^0-9]/', '', $enquiry->phone); @endphp
                                        <a href="https://wa.me/{{ $clean }}" target="_blank" title="WhatsApp" class="text-emerald-500 hover:text-emerald-600">
                                            <i class="fa-brands fa-whatsapp text-sm"></i>
                                        </a>
                                    </div>
                                    <div class="text-[11px] text-slate-400 truncate max-w-[140px]">
                                        {{ $enquiry->email ?: '—' }}
                                    </div>
                                </td>

                                <!-- Status Badge -->
                                <td class="py-3.5 px-4 whitespace-nowrap">
                                    <x-badge :status="$enquiry->status" type="enquiry" />
                                </td>

                                <!-- Action -->
                                <td class="py-3.5 px-5 text-right whitespace-nowrap">
                                    <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="px-3 py-1.5 bg-brand-50 hover:bg-brand-100 text-brand-700 font-bold rounded-lg text-xs transition-colors inline-flex items-center gap-1">
                                        <i class="fa-regular fa-eye text-xs"></i>
                                        <span>Details</span>
                                    </a>
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

            <div class="p-3.5 border-t border-slate-100 bg-slate-50/50 text-center">
                <a href="{{ route('admin.enquiries.index') }}" class="text-xs font-bold text-slate-600 hover:text-brand-600 transition-colors">
                    Go to Lead & Contact Management →
                </a>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- Recent Plot Updates Section                                    -->
        <!-- ============================================================== -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-card flex flex-col justify-between overflow-hidden">
            <div class="p-5 sm:p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-base font-extrabold text-slate-900 tracking-tight">Recent Plot Updates</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Recently modified plot specs</p>
                </div>
                <a href="{{ route('admin.plots.index') }}" class="text-xs font-bold text-brand-600 hover:text-brand-700 flex items-center gap-1">
                    <span>View All</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <!-- Plots Table / List -->
            <div class="overflow-x-auto flex-1">
                <table class="w-full min-w-[500px] text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/75 border-b border-slate-100 text-[10px] font-extrabold uppercase tracking-wider text-slate-400">
                            <th class="py-3 px-5">Plot #</th>
                            <th class="py-3 px-4">Area & Facing</th>
                            <th class="py-3 px-4">Price</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-5 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                        @forelse($recentPlots as $plot)
                            <tr class="hover:bg-slate-50/70 transition-colors group">
                                <!-- Plot Number -->
                                <td class="py-3.5 px-5 whitespace-nowrap font-extrabold text-slate-900">
                                    <a href="{{ route('admin.plots.edit', $plot) }}" class="group-hover:text-brand-600 transition-colors">
                                        {{ $plot->plot_number }}
                                    </a>
                                    <div class="text-[10px] text-slate-400 font-normal">
                                        {{ $plot->updated_at->diffForHumans() }}
                                    </div>
                                </td>

                                <!-- Area & Facing -->
                                <td class="py-3.5 px-4 whitespace-nowrap font-semibold text-slate-800">
                                    <div>{{ $plot->size_sq_yards }} Sq. Yds</div>
                                    <div class="text-[11px] text-slate-400">{{ $plot->facing }} Facing</div>
                                </td>

                                <!-- Price -->
                                <td class="py-3.5 px-4 whitespace-nowrap font-extrabold text-slate-900">
                                    {{ $plot->formatted_price }}
                                </td>

                                <!-- Status -->
                                <td class="py-3.5 px-4 whitespace-nowrap">
                                    <x-badge :status="$plot->status" type="plot" />
                                </td>

                                <!-- Action -->
                                <td class="py-3.5 px-5 text-right whitespace-nowrap">
                                    <a href="{{ route('admin.plots.edit', $plot) }}" class="p-1.5 text-slate-500 hover:text-brand-600 hover:bg-slate-100 rounded-lg transition-colors inline-block">
                                        <i class="fa-regular fa-pen-to-square text-sm"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-10 text-center text-slate-400 text-xs">
                                    No plot records found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-3.5 border-t border-slate-100 bg-slate-50/50 text-center">
                <a href="{{ route('admin.plots.index') }}" class="text-xs font-bold text-slate-600 hover:text-brand-600 transition-colors">
                    Go to Full Inventory Management →
                </a>
            </div>
        </div>

    </div>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 1. Plot Status Donut Chart
        const donutCtx = document.getElementById('plotStatusDonut')?.getContext('2d');
        if (donutCtx) {
            new Chart(donutCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Available', 'Reserved', 'Sold'],
                    datasets: [{
                        data: [{{ $availablePlots }}, {{ $reservedPlots }}, {{ $soldPlots }}],
                        backgroundColor: [
                            '#10b981', // Emerald 500
                            '#f59e0b', // Amber 500
                            '#f43f5e'  // Rose 500
                        ],
                        borderWidth: 3,
                        borderColor: '#ffffff',
                        hoverOffset: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '72%',
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const total = {{ $totalPlots }};
                                    const value = context.parsed;
                                    const pct = total > 0 ? Math.round((value / total) * 100) : 0;
                                    return ` ${context.label}: ${value} plots (${pct}%)`;
                                }
                            }
                        }
                    }
                }
            });
        }

        // 2. Facing Distribution Bar Chart
        const facingCtx = document.getElementById('facingBarChart')?.getContext('2d');
        if (facingCtx) {
            const facingData = @json($plotsByFacing);
            const labels = Object.keys(facingData);
            const values = Object.values(facingData);

            new Chart(facingCtx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Plots Count',
                        data: values,
                        backgroundColor: '#16a34a',
                        borderRadius: 8,
                        borderSkipped: false,
                        maxBarThickness: 32
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#f1f5f9'
                            },
                            ticks: {
                                stepSize: 10,
                                font: {
                                    family: "'Plus Jakarta Sans', sans-serif",
                                    size: 11
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    family: "'Plus Jakarta Sans', sans-serif",
                                    size: 11,
                                    weight: 600
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        }
    });
</script>
@endpush
