@extends('layouts.admin')

@section('title', 'Project Portfolio Management')
@section('page-title', 'Projects Portfolio')
@section('breadcrumb', 'Projects')

@section('content')
<div class="space-y-6">

    <!-- Top Controls: Status Tabs & Summary Info -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        
        <!-- Status Filter Tabs -->
        <div class="flex items-center gap-1.5 p-1 bg-white border border-slate-200/80 rounded-2xl shadow-xs overflow-x-auto scrollbar-none w-full sm:w-auto">
            <a href="{{ route('admin.projects.index') }}" 
               class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all shrink-0 {{ !request('status') ? 'bg-brand-600 text-white shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                All Projects ({{ $totalCount ?? count($projects) }})
            </a>
            <a href="{{ route('admin.projects.index', ['status' => 'ongoing']) }}" 
               class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all shrink-0 {{ request('status') === 'ongoing' ? 'bg-emerald-600 text-white shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                Active Layouts ({{ $ongoingCount ?? 2 }})
            </a>
        </div>

        <!-- Quick Venture Action -->
        <div class="flex items-center gap-2.5">
            <a href="{{ route('admin.plots.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white hover:bg-slate-50 text-slate-700 text-xs font-bold rounded-xl border border-slate-200 shadow-xs transition-colors">
                <i class="fa-solid fa-layer-group text-slate-400"></i>
                <span>Inventory Board</span>
            </a>
            <a href="{{ route('projects') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-brand-600 hover:bg-brand-500 text-white text-xs font-bold rounded-xl shadow-xs shadow-brand-600/25 transition-all">
                <i class="fa-solid fa-arrow-up-right-from-square text-[11px]"></i>
                <span>View Public Showcase</span>
            </a>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-card">
        <form action="{{ route('admin.projects.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search projects by venture name, location, or layout category..."
                       class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-all">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="px-5 py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold rounded-xl transition-colors">
                    Filter
                </button>
                @if(request()->hasAny(['search', 'status']))
                    <a href="{{ route('admin.projects.index') }}" class="px-3.5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-xs font-bold flex items-center justify-center transition-colors">
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Project Cards Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @forelse($projects as $project)
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-card hover:shadow-card-hover transition-all duration-200 overflow-hidden flex flex-col justify-between group">
                
                <!-- Card Header Image & Overlay -->
                <div>
                    <div class="relative h-48 w-full overflow-hidden bg-slate-100">
                        <img src="{{ asset($project['image']) }}" alt="{{ $project['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
                        
                        <!-- Status Badge -->
                        <div class="absolute top-3 left-3">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-extrabold border shadow-xs {{ $project['status_class'] }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $project['status_dot'] }}"></span>
                                <span>{{ $project['status'] }}</span>
                            </span>
                        </div>

                        <!-- Extent Badge -->
                        <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-white">
                            <span class="text-xs font-bold px-2 py-0.5 rounded-lg bg-black/40 backdrop-blur-xs border border-white/20">
                                <i class="fa-solid fa-ruler-combined text-[10px] mr-1"></i> {{ $project['extent'] }}
                            </span>
                            <span class="text-xs font-bold text-brand-300">
                                {{ $project['category'] }}
                            </span>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-5 sm:p-6 space-y-4">
                        <div>
                            <h3 class="text-lg font-extrabold text-slate-900 tracking-tight leading-snug group-hover:text-brand-600 transition-colors">
                                {{ $project['name'] }}
                            </h3>
                            <p class="text-xs text-slate-500 mt-1 flex items-center gap-1.5">
                                <i class="fa-solid fa-location-dot text-slate-400 text-[11px]"></i>
                                <span>{{ $project['location'] }}</span>
                            </p>
                        </div>

                        <!-- Layout Specifications Grid -->
                        <div class="grid grid-cols-2 gap-2.5 p-3 rounded-2xl bg-slate-50 border border-slate-100 text-xs">
                            <div>
                                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider block">Total Units</span>
                                <span class="font-bold text-slate-900 text-xs">{{ $project['units'] }}</span>
                            </div>
                            <div>
                                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider block">Available</span>
                                <span class="font-bold text-emerald-700 text-xs">{{ $project['available_units'] }} Plots</span>
                            </div>
                            <div>
                                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider block">Road Widths</span>
                                <span class="font-semibold text-slate-800 text-[11px] truncate block">{{ $project['road_widths'] }}</span>
                            </div>
                            <div>
                                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider block">Approvals</span>
                                <span class="font-semibold text-brand-700 text-[11px] truncate block">{{ $project['approvals'] }}</span>
                            </div>
                        </div>

                        <!-- Key Highlights -->
                        <div class="space-y-1.5">
                            <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 block">Highlights</span>
                            <ul class="space-y-1 text-xs text-slate-600">
                                @foreach(array_slice($project['highlights'], 0, 3) as $point)
                                    <li class="flex items-start gap-2">
                                        <i class="fa-solid fa-circle-check text-[11px] text-emerald-500 mt-0.5 shrink-0"></i>
                                        <span class="line-clamp-1">{{ $point }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Card Footer Actions -->
                <div class="p-5 sm:p-6 pt-0 border-t border-slate-100 mt-4 flex items-center gap-2">
                    @if($project['is_active'])
                        <a href="{{ route('admin.plots.index') }}" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-brand-600 hover:bg-brand-500 text-white text-xs font-bold rounded-xl shadow-xs shadow-brand-600/20 transition-all">
                            <i class="fa-solid fa-layer-group text-[11px]"></i>
                            <span>Manage Plots</span>
                        </a>
                    @else
                        <a href="{{ route('admin.enquiries.index') }}" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold rounded-xl transition-all">
                            <i class="fa-regular fa-envelope text-[11px]"></i>
                            <span>View Enquiries</span>
                        </a>
                    @endif
                    <a href="{{ route('projects') }}" target="_blank" title="Preview Public Page" class="p-2.5 text-slate-500 hover:text-slate-800 hover:bg-slate-100 rounded-xl border border-slate-200 transition-colors">
                        <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                    </a>
                </div>

            </div>
        @empty
            <div class="lg:col-span-3 bg-white rounded-3xl border border-slate-200/80 p-12 text-center text-slate-400">
                <div class="w-14 h-14 mx-auto mb-3.5 rounded-2xl bg-slate-100 text-slate-400 text-2xl flex items-center justify-center">
                    <i class="fa-solid fa-city"></i>
                </div>
                <h4 class="font-extrabold text-slate-800 text-sm">No Projects Found</h4>
                <p class="text-xs text-slate-400 mt-1">There are no ventures matching your active filter criteria.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection
