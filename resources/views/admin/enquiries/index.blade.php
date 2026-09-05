@extends('layouts.admin')

@section('title', 'Leads & Enquiries CRM Management')
@section('page-title', 'Contact Leads CRM')
@section('breadcrumb', 'Enquiries')

@section('content')
<div class="space-y-6">

    <!-- Top Status Filter Tabs -->
    <div class="flex items-center gap-1.5 p-1 bg-white border border-slate-200/80 rounded-2xl shadow-card overflow-x-auto scrollbar-none w-full sm:w-auto">
        <a href="{{ route('admin.enquiries.index') }}" 
           class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all shrink-0 {{ !request('status') ? 'bg-brand-600 text-white shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
            All Leads ({{ $counts['all'] }})
        </a>
        <a href="{{ route('admin.enquiries.index', array_merge(request()->query(), ['status' => 'new'])) }}" 
           class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all shrink-0 {{ request('status') === 'new' ? 'bg-blue-600 text-white shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
            New ({{ $counts['new'] }})
        </a>
        <a href="{{ route('admin.enquiries.index', array_merge(request()->query(), ['status' => 'contacted'])) }}" 
           class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all shrink-0 {{ request('status') === 'contacted' ? 'bg-purple-600 text-white shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
            Contacted ({{ $counts['contacted'] }})
        </a>
        <a href="{{ route('admin.enquiries.index', array_merge(request()->query(), ['status' => 'in_progress'])) }}" 
           class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all shrink-0 {{ request('status') === 'in_progress' ? 'bg-amber-600 text-white shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
            In Progress ({{ $counts['in_progress'] }})
        </a>
        <a href="{{ route('admin.enquiries.index', array_merge(request()->query(), ['status' => 'closed'])) }}" 
           class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all shrink-0 {{ request('status') === 'closed' ? 'bg-emerald-600 text-white shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
            Closed ({{ $counts['closed'] }})
        </a>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-card">
        <form action="{{ route('admin.enquiries.index') }}" method="GET" class="flex flex-col md:flex-row gap-3">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif

            <!-- Search Input -->
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" 
                    placeholder="Search by customer name, email, phone number, or message..."
                    class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-all">
            </div>

            <!-- Date-based Quick Filter -->
            <div class="w-full md:w-48 shrink-0">
                <select name="date_filter" onchange="this.form.submit()"
                    class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
                    <option value="">All Time Submissions</option>
                    <option value="today" {{ request('date_filter') === 'today' ? 'selected' : '' }}>Today</option>
                    <option value="yesterday" {{ request('date_filter') === 'yesterday' ? 'selected' : '' }}>Yesterday</option>
                    <option value="last_7_days" {{ request('date_filter') === 'last_7_days' ? 'selected' : '' }}>Last 7 Days</option>
                    <option value="last_30_days" {{ request('date_filter') === 'last_30_days' ? 'selected' : '' }}>Last 30 Days</option>
                </select>
            </div>

            <!-- Filter Action Buttons -->
            <div class="flex items-center gap-2 shrink-0">
                <button type="submit" class="flex-1 md:flex-initial px-5 py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold rounded-xl transition-colors">
                    Filter
                </button>

                @if(request()->hasAny(['search', 'status', 'date_filter', 'date_from', 'date_to']))
                    <a href="{{ route('admin.enquiries.index') }}" title="Reset all filters" 
                       class="px-3.5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-xs font-bold flex items-center justify-center transition-colors">
                        <i class="fa-solid fa-rotate-left mr-1"></i> Reset
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
                        <th class="py-3.5 px-6">Customer / Lead</th>
                        <th class="py-3.5 px-4">Contact</th>
                        <th class="py-3.5 px-4">Interest & Site Visit</th>
                        <th class="py-3.5 px-4">Message Preview</th>
                        <th class="py-3.5 px-4">Submission Date</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                    @forelse($enquiries as $enquiry)
                        <tr class="hover:bg-slate-50/70 transition-colors group">
                            
                            <!-- Customer Name & Plot Chip -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="font-extrabold text-sm text-slate-900 group-hover:text-brand-600 transition-colors block">
                                    {{ $enquiry->name }}
                                </a>
                                @if($enquiry->plot)
                                    <a href="{{ route('admin.plots.show', $enquiry->plot) }}" class="inline-flex items-center gap-1 text-[10px] text-brand-700 bg-brand-50 border border-brand-200 px-2 py-0.5 rounded-md font-bold mt-1 hover:bg-brand-100 transition-colors">
                                        <i class="fa-solid fa-layer-group text-[9px]"></i>
                                        <span>{{ $enquiry->plot->plot_number }}</span>
                                    </a>
                                @endif
                            </td>

                            <!-- Phone & 1-Click WhatsApp -->
                            <td class="py-4 px-4 whitespace-nowrap">
                                <div class="font-bold text-slate-800 flex items-center gap-2">
                                    <a href="tel:{{ $enquiry->phone }}" class="hover:text-brand-600 flex items-center gap-1.5 transition-colors">
                                        <i class="fa-solid fa-phone text-[10px] text-slate-400"></i>
                                        <span>{{ $enquiry->phone }}</span>
                                    </a>
                                    @php $cleanPhone = preg_replace('/[^0-9]/', '', $enquiry->phone); @endphp
                                    <a href="https://wa.me/{{ $cleanPhone }}" target="_blank" title="Chat on WhatsApp" class="text-emerald-500 hover:text-emerald-600 text-sm">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                </div>
                                <div class="text-[11px] text-slate-400 mt-0.5 truncate max-w-[140px]">
                                    {{ $enquiry->email ?: '—' }}
                                </div>
                            </td>

                            <!-- Subject & Site Visit Date -->
                            <td class="py-4 px-4 max-w-xs">
                                <div class="font-semibold text-slate-800 truncate" title="{{ $enquiry->subject }}">
                                    {{ $enquiry->subject ?: 'General Enquiry' }}
                                </div>
                                @if($enquiry->preferred_visit_date)
                                    <div class="inline-flex items-center gap-1 text-[10px] text-purple-700 bg-purple-50 border border-purple-200 px-2 py-0.5 rounded-md font-bold mt-1">
                                        <i class="fa-regular fa-calendar-check text-[9px]"></i>
                                        <span>Visit: {{ $enquiry->preferred_visit_date->format('d M Y') }}</span>
                                    </div>
                                @endif
                            </td>

                            <!-- Message Preview -->
                            <td class="py-4 px-4 max-w-xs">
                                <p class="text-slate-600 line-clamp-2" title="{{ $enquiry->message }}">
                                    {{ Str::limit($enquiry->message ?: 'No additional message submitted.', 75) }}
                                </p>
                            </td>

                            <!-- Date & Time -->
                            <td class="py-4 px-4 whitespace-nowrap">
                                <div class="font-semibold text-slate-800">{{ $enquiry->created_at->format('d M Y') }}</div>
                                <div class="text-[11px] text-slate-400">{{ $enquiry->created_at->format('h:i A') }} ({{ $enquiry->created_at->diffForHumans() }})</div>
                            </td>

                            <!-- Status Badge -->
                            <td class="py-4 px-4 whitespace-nowrap">
                                <x-badge :status="$enquiry->status" type="enquiry" />
                            </td>

                            <!-- Actions -->
                            <td class="py-4 px-6 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5">
                                    <a href="{{ route('admin.enquiries.show', $enquiry) }}" title="View Lead CRM Record" 
                                       class="px-3 py-1.5 text-xs font-bold text-brand-700 bg-brand-50 hover:bg-brand-100 rounded-lg transition-colors inline-flex items-center gap-1">
                                        <i class="fa-regular fa-eye text-xs"></i>
                                        <span>Details</span>
                                    </a>
                                    <button type="button" title="Delete Lead" 
                                        onclick="openConfirmModal('{{ route('admin.enquiries.destroy', $enquiry) }}', 'Delete Enquiry from {{ $enquiry->name }}?', 'Are you sure you want to permanently delete this customer enquiry?', 'Yes, Delete Enquiry')"
                                        class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors">
                                        <i class="fa-regular fa-trash-can text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-14 text-center text-slate-400">
                                <div class="w-14 h-14 mx-auto mb-3.5 rounded-2xl bg-slate-100 text-slate-400 text-2xl flex items-center justify-center">
                                    <i class="fa-regular fa-envelope-open"></i>
                                </div>
                                <p class="font-extrabold text-slate-800 text-sm">No contact enquiries found</p>
                                <p class="text-xs text-slate-400 mt-1 max-w-sm mx-auto">
                                    There are currently no customer inquiries matching your filter criteria.
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
        @forelse($enquiries as $enquiry)
            <div class="bg-white rounded-3xl border border-slate-200/80 p-4 shadow-card space-y-3">
                
                <!-- Header: Customer Name & Status Badge -->
                <div class="flex items-start justify-between gap-3 pb-3 border-b border-slate-100">
                    <div>
                        <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="font-extrabold text-base text-slate-900 hover:text-brand-600 transition-colors">
                            {{ $enquiry->name }}
                        </a>
                        <div class="text-[11px] text-slate-400 mt-0.5">
                            {{ $enquiry->created_at->format('d M Y, h:i A') }} ({{ $enquiry->created_at->diffForHumans() }})
                        </div>
                    </div>
                    <div class="shrink-0">
                        <x-badge :status="$enquiry->status" type="enquiry" />
                    </div>
                </div>

                <!-- Interest / Site Visit Pill -->
                @if($enquiry->preferred_visit_date || $enquiry->plot)
                    <div class="flex items-center gap-2 flex-wrap">
                        @if($enquiry->plot)
                            <span class="inline-flex items-center gap-1 text-[10px] text-brand-700 bg-brand-50 border border-brand-200 px-2 py-0.5 rounded-md font-bold">
                                <i class="fa-solid fa-layer-group text-[9px]"></i> {{ $enquiry->plot->plot_number }}
                            </span>
                        @endif
                        @if($enquiry->preferred_visit_date)
                            <span class="inline-flex items-center gap-1 text-[10px] text-purple-700 bg-purple-50 border border-purple-200 px-2 py-0.5 rounded-md font-bold">
                                <i class="fa-regular fa-calendar-check text-[9px]"></i> Visit: {{ $enquiry->preferred_visit_date->format('d M') }}
                            </span>
                        @endif
                    </div>
                @endif

                <!-- Message Preview -->
                <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100 text-xs text-slate-700">
                    @if($enquiry->subject)
                        <div class="font-bold text-slate-900 mb-1 text-[11px]">Subject: {{ $enquiry->subject }}</div>
                    @endif
                    <p class="line-clamp-2 text-slate-600">{{ $enquiry->message ?: 'No additional message provided.' }}</p>
                </div>

                <!-- Contact & Actions Bar -->
                <div class="pt-1 flex items-center justify-between gap-2 flex-wrap text-xs">
                    <div class="flex items-center gap-2">
                        <a href="tel:{{ $enquiry->phone }}" class="px-2.5 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold rounded-xl inline-flex items-center gap-1.5">
                            <i class="fa-solid fa-phone text-[10px] text-slate-500"></i>
                            <span>{{ $enquiry->phone }}</span>
                        </a>
                        @php $cleanPhone = preg_replace('/[^0-9]/', '', $enquiry->phone); @endphp
                        <a href="https://wa.me/{{ $cleanPhone }}" target="_blank" class="p-1.5 text-emerald-600 hover:bg-emerald-50 rounded-xl text-base">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>

                    <div class="flex items-center gap-1.5 ml-auto">
                        <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="px-3 py-1.5 bg-brand-50 hover:bg-brand-100 text-brand-700 font-bold rounded-xl inline-flex items-center gap-1 transition-colors">
                            <i class="fa-regular fa-eye text-xs"></i>
                            <span>Details</span>
                        </a>
                        <button type="button" 
                            onclick="openConfirmModal('{{ route('admin.enquiries.destroy', $enquiry) }}', 'Delete Enquiry from {{ $enquiry->name }}?', 'Are you sure you want to delete this enquiry?', 'Yes, Delete Enquiry')"
                            class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-colors">
                            <i class="fa-regular fa-trash-can text-xs"></i>
                        </button>
                    </div>
                </div>

            </div>
        @empty
            <div class="bg-white rounded-3xl border border-slate-200/80 p-8 text-center text-slate-400">
                <div class="w-12 h-12 mx-auto mb-3 rounded-2xl bg-slate-100 text-slate-400 text-xl flex items-center justify-center">
                    <i class="fa-regular fa-envelope-open"></i>
                </div>
                <p class="font-extrabold text-slate-800 text-sm">No contact enquiries found</p>
                <p class="text-xs text-slate-400 mt-1">There are no enquiries matching your filter criteria.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination for both Desktop and Mobile -->
    @if($enquiries->hasPages())
        <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-card">
            {{ $enquiries->links() }}
        </div>
    @endif

</div>
@endsection
