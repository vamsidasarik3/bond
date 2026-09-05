@extends('layouts.admin')

@section('title', 'Plot Inventory Management')
@section('page-title', 'Plot Inventory')
@section('breadcrumb', 'Plots')

@section('content')
<div class="space-y-6">

    <!-- Top Controls: Status Tabs & Action Button -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        
        <!-- Status Filter Tabs (All, Available, Reserved, Sold) -->
        <div class="flex items-center gap-1.5 p-1 bg-white border border-slate-200/80 rounded-2xl shadow-card overflow-x-auto scrollbar-none w-full sm:w-auto">
            <a href="{{ route('admin.plots.index') }}" 
               class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all shrink-0 {{ !request('status') ? 'bg-brand-600 text-white shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                All ({{ $counts['all'] }})
            </a>
            <a href="{{ route('admin.plots.index', array_merge(request()->query(), ['status' => 'available'])) }}" 
               class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all shrink-0 {{ request('status') === 'available' ? 'bg-emerald-600 text-white shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                Available ({{ $counts['available'] }})
            </a>
            <a href="{{ route('admin.plots.index', array_merge(request()->query(), ['status' => 'reserved'])) }}" 
               class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all shrink-0 {{ in_array(request('status'), ['reserved', 'booked']) ? 'bg-amber-600 text-white shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                Reserved ({{ $counts['reserved'] }})
            </a>
            <a href="{{ route('admin.plots.index', array_merge(request()->query(), ['status' => 'sold'])) }}" 
               class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all shrink-0 {{ request('status') === 'sold' ? 'bg-rose-600 text-white shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                Sold ({{ $counts['sold'] }})
            </a>
        </div>

        <!-- Add Plot CTA Button -->
        <a href="{{ route('admin.plots.create') }}" class="inline-flex items-center justify-center gap-2 px-4 sm:px-5 py-2.5 bg-brand-600 hover:bg-brand-500 text-white text-xs font-bold rounded-xl shadow-xs shadow-brand-600/25 transition-all shrink-0 w-full sm:w-auto">
            <i class="fa-solid fa-plus text-xs"></i>
            <span>Add New Plot</span>
        </a>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-card">
        <form action="{{ route('admin.plots.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-3">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif

            <!-- Search by Plot Number or Description -->
            <div class="sm:col-span-5 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by plot number, dimensions, or notes..."
                    class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-all">
            </div>

            <!-- Facing Dropdown -->
            <div class="sm:col-span-3">
                <select name="facing" onchange="this.form.submit()" class="w-full py-2.5 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
                    <option value="">All Facing Orientations</option>
                    @foreach(['East', 'West', 'North', 'South', 'North-East', 'South-East', 'North-West', 'South-West'] as $facing)
                        <option value="{{ $facing }}" {{ request('facing') === $facing ? 'selected' : '' }}>{{ $facing }} Facing</option>
                    @endforeach
                </select>
            </div>

            <!-- Sort By Dropdown -->
            <div class="sm:col-span-2">
                <select name="sort" onchange="this.form.submit()" class="w-full py-2.5 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
                    <option value="plot_number" {{ request('sort') === 'plot_number' ? 'selected' : '' }}>Plot Number</option>
                    <option value="total_price" {{ request('sort') === 'total_price' ? 'selected' : '' }}>Price</option>
                    <option value="size_sq_yards" {{ request('sort') === 'size_sq_yards' ? 'selected' : '' }}>Size / Area</option>
                    <option value="updated_at" {{ request('sort') === 'updated_at' ? 'selected' : '' }}>Recently Updated</option>
                </select>
            </div>

            <!-- Filter & Reset Buttons -->
            <div class="sm:col-span-2 flex gap-2">
                <button type="submit" class="flex-1 py-2.5 px-3 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold rounded-xl transition-colors">
                    Filter
                </button>

                @if(request()->hasAny(['search', 'facing', 'sort', 'status']))
                    <a href="{{ route('admin.plots.index') }}" title="Reset all filters" class="px-3.5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-xs font-bold flex items-center justify-center transition-colors">
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- ============================================================== -->
    <!-- 1. DESKTOP & TABLET TABLE VIEW (Hidden on Mobile < md)          -->
    <!-- ============================================================== -->
    <div class="hidden md:block bg-white rounded-3xl border border-slate-200/80 shadow-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px] text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-100 bg-slate-50/75 text-[10px] font-extrabold uppercase tracking-wider text-slate-400">
                        <th class="py-3.5 px-6">Plot Number</th>
                        <th class="py-3.5 px-4">Area</th>
                        <th class="py-3.5 px-4">Dimensions</th>
                        <th class="py-3.5 px-4">Facing</th>
                        <th class="py-3.5 px-4">Price</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4">Last Updated</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                    @forelse($plots as $plot)
                        <tr class="hover:bg-slate-50/70 transition-colors group">
                            
                            <!-- 1. Plot Number & Subtitle -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <a href="{{ route('admin.plots.show', $plot) }}" class="font-extrabold text-sm text-slate-900 group-hover:text-brand-600 transition-colors block">
                                    {{ $plot->plot_number }}
                                </a>
                                @if($plot->title)
                                    <div class="text-[11px] text-slate-400 mt-0.5 line-clamp-1 max-w-[200px]">
                                        {{ $plot->title }}
                                    </div>
                                @endif
                            </td>

                            <!-- 2. Area -->
                            <td class="py-4 px-4 whitespace-nowrap">
                                <div class="font-bold text-slate-900 text-sm">
                                    {{ $plot->size_sq_yards }} <span class="text-xs font-normal text-slate-400">Sq. Yds</span>
                                </div>
                            </td>

                            <!-- 3. Dimensions -->
                            <td class="py-4 px-4 whitespace-nowrap">
                                <div class="font-semibold text-slate-700">
                                    {{ $plot->boundary_dimensions ?: "Standard Layout" }}
                                </div>
                                @if($plot->road_width_ft)
                                    <span class="text-[10px] text-slate-400 block mt-0.5">{{ $plot->road_width_ft }}' Road Width</span>
                                @endif
                            </td>

                            <!-- 4. Facing -->
                            <td class="py-4 px-4 whitespace-nowrap">
                                <div class="font-semibold text-slate-800 flex items-center gap-1.5">
                                    <i class="fa-regular fa-compass text-brand-600 text-xs"></i>
                                    <span>{{ $plot->facing }}</span>
                                </div>
                            </td>

                            <!-- 5. Price -->
                            <td class="py-4 px-4 whitespace-nowrap">
                                <div class="font-extrabold text-sm text-slate-900">
                                    {{ $plot->formatted_price }}
                                </div>
                                <div class="text-[11px] text-slate-400 mt-0.5">
                                    ₹{{ number_format($plot->price_per_sq_yard) }} / Sq. Yd
                                </div>
                            </td>

                            <!-- 6. Inline Status Quick Selector -->
                            <td class="py-4 px-4 whitespace-nowrap">
                                <div class="relative inline-flex items-center status-dropdown-container" data-plot-id="{{ $plot->id }}">
                                    @php
                                        $currStatus = in_array($plot->status, ['reserved', 'booked']) ? 'reserved' : $plot->status;
                                        $colorClasses = match($currStatus) {
                                            'available' => 'bg-emerald-50 text-emerald-700 border-emerald-300 focus:ring-emerald-400',
                                            'reserved'  => 'bg-amber-50 text-amber-700 border-amber-300 focus:ring-amber-400',
                                            'sold'      => 'bg-rose-50 text-rose-700 border-rose-300 focus:ring-rose-400',
                                            default     => 'bg-slate-50 text-slate-700 border-slate-300'
                                        };
                                    @endphp
                                    <select onchange="quickUpdatePlotStatus({{ $plot->id }}, this.value, this)"
                                            aria-label="Change status for Plot {{ $plot->plot_number }}"
                                            title="Click to update status"
                                            class="quick-status-select text-[11px] font-extrabold uppercase tracking-wider rounded-xl pl-3 pr-7 py-1.5 border shadow-xs transition-all cursor-pointer focus:outline-none focus:ring-2 appearance-none {{ $colorClasses }}">
                                        <option value="available" {{ $currStatus === 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="reserved" {{ $currStatus === 'reserved' ? 'selected' : '' }}>Reserved</option>
                                        <option value="sold" {{ $currStatus === 'sold' ? 'selected' : '' }}>Sold</option>
                                    </select>
                                    <div class="pointer-events-none absolute right-2 text-current opacity-60">
                                        <i class="fa-solid fa-chevron-down text-[8px]"></i>
                                    </div>
                                    <span class="status-spinner hidden ml-1.5">
                                        <i class="fa-solid fa-circle-notch fa-spin text-xs text-brand-600"></i>
                                    </span>
                                </div>
                            </td>

                            <!-- 7. Last Updated -->
                            <td class="py-4 px-4 whitespace-nowrap text-slate-500 text-[11px]">
                                <div>{{ $plot->updated_at->format('d M Y') }}</div>
                                <div class="text-slate-400">{{ $plot->updated_at->diffForHumans() }}</div>
                            </td>

                            <!-- 8. Actions -->
                            <td class="py-4 px-6 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5">
                                    <a href="{{ route('admin.plots.show', $plot) }}" title="View Plot Specification"
                                       class="p-2 text-slate-400 hover:text-brand-600 hover:bg-brand-50 rounded-lg transition-colors">
                                        <i class="fa-regular fa-eye text-xs"></i>
                                    </a>
                                    <a href="{{ route('admin.plots.edit', $plot) }}" title="Edit Plot" 
                                       class="px-3 py-1.5 text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors inline-flex items-center gap-1">
                                        <i class="fa-regular fa-pen-to-square text-xs"></i>
                                        <span>Edit</span>
                                    </a>
                                    <button type="button" title="Delete Plot" 
                                        onclick="openConfirmModal('{{ route('admin.plots.destroy', $plot) }}', 'Delete Plot {{ $plot->plot_number }}?', 'Are you sure you want to permanently delete this plot from inventory? This action cannot be undone.', 'Yes, Delete Plot')"
                                        class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors">
                                        <i class="fa-regular fa-trash-can text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-14 text-center text-slate-400">
                                <div class="w-14 h-14 mx-auto mb-3.5 rounded-2xl bg-slate-100 text-slate-400 text-2xl flex items-center justify-center">
                                    <i class="fa-solid fa-map-location-dot"></i>
                                </div>
                                <p class="font-extrabold text-slate-800 text-sm">No plots found</p>
                                <p class="text-xs text-slate-400 mt-1 max-w-sm mx-auto">
                                    There are currently no plots matching your filter criteria.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- 2. MOBILE CARD VIEW (Displayed only on Mobile Screens < md)    -->
    <!-- ============================================================== -->
    <div class="block md:hidden space-y-3.5">
        @forelse($plots as $plot)
            <div class="bg-white rounded-3xl border border-slate-200/80 p-4 shadow-card space-y-3">
                
                <!-- Header: Plot Number, Facing & Status -->
                <div class="flex items-start justify-between gap-3 pb-3 border-b border-slate-100">
                    <div>
                        <a href="{{ route('admin.plots.show', $plot) }}" class="font-extrabold text-base text-slate-900 hover:text-brand-600 transition-colors">
                            {{ $plot->plot_number }}
                        </a>
                        @if($plot->title)
                            <p class="text-xs text-slate-500 mt-0.5">{{ $plot->title }}</p>
                        @endif
                    </div>
                    <div class="shrink-0 relative inline-flex items-center status-dropdown-container" data-plot-id="{{ $plot->id }}">
                        @php
                            $currStatus = in_array($plot->status, ['reserved', 'booked']) ? 'reserved' : $plot->status;
                            $colorClasses = match($currStatus) {
                                'available' => 'bg-emerald-50 text-emerald-700 border-emerald-300 focus:ring-emerald-400',
                                'reserved'  => 'bg-amber-50 text-amber-700 border-amber-300 focus:ring-amber-400',
                                'sold'      => 'bg-rose-50 text-rose-700 border-rose-300 focus:ring-rose-400',
                                default     => 'bg-slate-50 text-slate-700 border-slate-300'
                            };
                        @endphp
                        <select onchange="quickUpdatePlotStatus({{ $plot->id }}, this.value, this)"
                                aria-label="Change status for Plot {{ $plot->plot_number }}"
                                title="Click to change status"
                                class="quick-status-select text-[11px] font-extrabold uppercase tracking-wider rounded-xl pl-3 pr-7 py-1.5 border shadow-xs transition-all cursor-pointer focus:outline-none focus:ring-2 appearance-none {{ $colorClasses }}">
                            <option value="available" {{ $currStatus === 'available' ? 'selected' : '' }}>Available</option>
                            <option value="reserved" {{ $currStatus === 'reserved' ? 'selected' : '' }}>Reserved</option>
                            <option value="sold" {{ $currStatus === 'sold' ? 'selected' : '' }}>Sold</option>
                        </select>
                        <div class="pointer-events-none absolute right-2 text-current opacity-60">
                            <i class="fa-solid fa-chevron-down text-[8px]"></i>
                        </div>
                    </div>
                </div>

                <!-- Plot Specifications Grid -->
                <div class="grid grid-cols-2 gap-2.5 text-xs">
                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                        <span class="text-[10px] text-slate-400 font-bold uppercase block mb-0.5">Plot Area</span>
                        <span class="font-extrabold text-slate-900 text-sm">{{ $plot->size_sq_yards }} Sq. Yds</span>
                    </div>

                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                        <span class="text-[10px] text-slate-400 font-bold uppercase block mb-0.5">Total Price</span>
                        <span class="font-extrabold text-slate-900 text-sm">{{ $plot->formatted_price }}</span>
                    </div>

                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                        <span class="text-[10px] text-slate-400 font-bold uppercase block mb-0.5">Facing</span>
                        <span class="font-semibold text-slate-800">{{ $plot->facing }}</span>
                    </div>

                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                        <span class="text-[10px] text-slate-400 font-bold uppercase block mb-0.5">Dimensions</span>
                        <span class="font-semibold text-slate-800 truncate block">{{ $plot->boundary_dimensions ?: 'Standard' }}</span>
                    </div>
                </div>

                <!-- Card Footer Actions -->
                <div class="pt-2 flex items-center justify-between gap-3 text-xs text-slate-400">
                    <div class="text-[11px]">
                        {{ $plot->updated_at->diffForHumans() }}
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.plots.show', $plot) }}" class="p-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl">
                            <i class="fa-regular fa-eye text-xs"></i>
                        </a>
                        <a href="{{ route('admin.plots.edit', $plot) }}" class="px-3 py-1.5 bg-slate-100 hover:bg-brand-50 hover:text-brand-700 text-slate-700 rounded-xl font-bold inline-flex items-center gap-1 transition-colors">
                            <i class="fa-regular fa-pen-to-square text-xs"></i>
                            <span>Edit</span>
                        </a>
                        <button type="button" 
                            onclick="openConfirmModal('{{ route('admin.plots.destroy', $plot) }}', 'Delete Plot {{ $plot->plot_number }}?', 'Are you sure you want to delete this plot? This action cannot be undone.', 'Yes, Delete Plot')"
                            class="px-2.5 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-600 rounded-xl font-bold inline-flex items-center gap-1 transition-colors">
                            <i class="fa-regular fa-trash-can text-xs"></i>
                        </button>
                    </div>
                </div>

            </div>
        @empty
            <div class="bg-white rounded-3xl border border-slate-200/80 p-8 text-center text-slate-400">
                <div class="w-12 h-12 mx-auto mb-3 rounded-2xl bg-slate-100 text-slate-400 text-xl flex items-center justify-center">
                    <i class="fa-solid fa-map-location-dot"></i>
                </div>
                <p class="font-extrabold text-slate-800 text-sm">No plots found</p>
                <p class="text-xs text-slate-400 mt-1">There are no plots matching your active filter criteria.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination for both Desktop and Mobile -->
    @if($plots->hasPages())
        <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-card">
            {{ $plots->links() }}
        </div>
    @endif

</div>
@endsection

@push('scripts')
<script>
    const statusClasses = {
        'available': ['bg-emerald-50', 'text-emerald-700', 'border-emerald-300', 'focus:ring-emerald-400'],
        'reserved': ['bg-amber-50', 'text-amber-700', 'border-amber-300', 'focus:ring-amber-400'],
        'sold': ['bg-rose-50', 'text-rose-700', 'border-rose-300', 'focus:ring-rose-400']
    };
    const allClasses = [
        'bg-emerald-50', 'text-emerald-700', 'border-emerald-300', 'focus:ring-emerald-400',
        'bg-amber-50', 'text-amber-700', 'border-amber-300', 'focus:ring-amber-400',
        'bg-rose-50', 'text-rose-700', 'border-rose-300', 'focus:ring-rose-400'
    ];

    function applyStatusClasses(selectEl, status) {
        allClasses.forEach(cls => selectEl.classList.remove(cls));
        const toAdd = statusClasses[status] || statusClasses['available'];
        toAdd.forEach(cls => selectEl.classList.add(cls));
    }

    async function quickUpdatePlotStatus(plotId, newStatus, selectElement) {
        const previousValue = selectElement.getAttribute('data-prev') || selectElement.value;
        const container = selectElement.closest('.status-dropdown-container');
        const spinner = container ? container.querySelector('.status-spinner') : null;

        if (spinner) spinner.classList.remove('hidden');
        selectElement.disabled = true;

        try {
            const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            const res = await fetch(`/admin/plots/${plotId}/status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ status: newStatus })
            });

            const data = await res.json();

            if (res.ok && data.success) {
                // Synchronize all selectors for this plot (desktop + mobile)
                document.querySelectorAll(`.status-dropdown-container[data-plot-id="${plotId}"] select`).forEach(sel => {
                    sel.value = newStatus;
                    sel.setAttribute('data-prev', newStatus);
                    applyStatusClasses(sel, newStatus);
                });

                // Update status tab counters dynamically
                if (data.counts) {
                    const tabAll = document.querySelector('a[href="{{ route('admin.plots.index') }}"]');
                    const tabAvailable = document.querySelector('a[href*="status=available"]');
                    const tabReserved = document.querySelector('a[href*="status=reserved"]');
                    const tabSold = document.querySelector('a[href*="status=sold"]');
                    if (tabAll) tabAll.textContent = `All (${data.counts.all})`;
                    if (tabAvailable) tabAvailable.textContent = `Available (${data.counts.available})`;
                    if (tabReserved) tabReserved.textContent = `Reserved (${data.counts.reserved})`;
                    if (tabSold) tabSold.textContent = `Sold (${data.counts.sold})`;
                }

                showGlobalToast(data.message || 'Plot status updated successfully!', 'success');
            } else {
                throw new Error(data.message || 'Failed to update status');
            }
        } catch (err) {
            console.error(err);
            selectElement.value = previousValue;
            applyStatusClasses(selectElement, previousValue);
            showGlobalToast(err.message || 'Error updating plot status', 'error');
        } finally {
            selectElement.disabled = false;
            if (spinner) spinner.classList.add('hidden');
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.quick-status-select').forEach(sel => {
            sel.setAttribute('data-prev', sel.value);
        });
    });
</script>
@endpush
