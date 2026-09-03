@extends('layouts.admin')

@section('title', 'Enquiry Details — ' . $enquiry->name)
@section('page-title', 'Enquiry Details')
@section('breadcrumb', 'Enquiry #' . $enquiry->id)

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <!-- Top Action Bar -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.enquiries.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-brand-600 transition-colors">
            <i class="fa-solid fa-arrow-left text-[11px]"></i>
            <span>Back to Contact Enquiries</span>
        </a>

        <div class="flex items-center gap-2">
            <button type="button" 
                onclick="openConfirmModal('{{ route('admin.enquiries.destroy', $enquiry) }}', 'Delete Enquiry from {{ $enquiry->name }}?', 'Are you sure you want to permanently delete this customer enquiry record? This action cannot be undone.', 'Yes, Delete Enquiry')"
                class="px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-600 text-xs font-bold rounded-xl transition-colors inline-flex items-center gap-1.5">
                <i class="fa-regular fa-trash-can text-xs"></i>
                <span>Delete Enquiry</span>
            </button>
        </div>
    </div>

    <!-- Main Content Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left 2 Cols: Customer Message & Detailed Contact Info -->
        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 sm:p-8 shadow-xs">
                
                <!-- Lead Header -->
                <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4 pb-6 border-b border-slate-100">
                    <div>
                        <div class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Website Submission #{{ $enquiry->id }}
                        </div>
                        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight mt-1">
                            {{ $enquiry->name }}
                        </h2>
                        
                        <!-- Submission Date & Time -->
                        <div class="flex items-center gap-2 text-xs text-slate-500 mt-1 flex-wrap">
                            <span><i class="fa-regular fa-calendar text-slate-400 mr-1"></i> Date: <strong class="text-slate-800">{{ $enquiry->created_at->format('d M, Y') }}</strong></span>
                            <span>•</span>
                            <span><i class="fa-regular fa-clock text-slate-400 mr-1"></i> Time: <strong class="text-slate-800">{{ $enquiry->created_at->format('h:i A') }}</strong></span>
                            <span>({{ $enquiry->created_at->diffForHumans() }})</span>
                        </div>
                    </div>

                    <div class="self-start">
                        <x-badge :status="$enquiry->status" type="enquiry" />
                    </div>
                </div>

                <!-- Complete Message Section -->
                <div class="py-6 border-b border-slate-100">
                    <div class="text-xs font-bold text-slate-700 uppercase tracking-wider mb-2.5">
                        Complete Message
                    </div>
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100">
                        @if($enquiry->subject)
                            <div class="text-xs font-bold text-slate-900 pb-2 mb-3 border-b border-slate-200/60">
                                Subject: {{ $enquiry->subject }}
                            </div>
                        @endif
                        <p class="text-xs text-slate-800 leading-relaxed whitespace-pre-line">
                            {{ $enquiry->message ?: 'No additional message was submitted with this enquiry.' }}
                        </p>
                    </div>
                </div>

                <!-- Actionable Contact Channels Grid -->
                <div class="pt-6">
                    <div class="text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">
                        Contact & Interest Details
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        
                        <!-- Actionable Phone with Call & WhatsApp -->
                        <div class="p-4 rounded-xl border border-slate-100 bg-slate-50/70">
                            <span class="text-slate-400 block mb-1 font-semibold">Phone Number</span>
                            <div class="flex items-center justify-between gap-2">
                                <span class="font-bold text-slate-900 text-sm">{{ $enquiry->phone }}</span>
                                <div class="flex items-center gap-1.5 shrink-0">
                                    <a href="tel:{{ $enquiry->phone }}" class="px-2.5 py-1 bg-brand-50 text-brand-700 font-bold rounded-lg hover:bg-brand-100 transition-colors inline-flex items-center gap-1">
                                        <i class="fa-solid fa-phone text-[10px]"></i>
                                        <span>Call</span>
                                    </a>
                                    @php $clean = preg_replace('/[^0-9]/', '', $enquiry->phone); @endphp
                                    <a href="https://wa.me/{{ $clean }}" target="_blank" class="px-2.5 py-1 bg-emerald-50 text-emerald-700 font-bold rounded-lg hover:bg-emerald-100 transition-colors inline-flex items-center gap-1">
                                        <i class="fa-brands fa-whatsapp text-xs"></i>
                                        <span>WhatsApp</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Actionable Email Address -->
                        <div class="p-4 rounded-xl border border-slate-100 bg-slate-50/70">
                            <span class="text-slate-400 block mb-1 font-semibold">Email Address</span>
                            <div class="flex items-center justify-between gap-2">
                                <span class="font-bold text-slate-900 text-sm truncate">
                                    {{ $enquiry->email ?: 'Not provided' }}
                                </span>
                                @if($enquiry->email)
                                    <a href="mailto:{{ $enquiry->email }}" class="px-2.5 py-1 bg-blue-50 text-blue-700 font-bold rounded-lg hover:bg-blue-100 transition-colors inline-flex items-center gap-1 shrink-0">
                                        <i class="fa-regular fa-envelope text-[10px]"></i>
                                        <span>Email</span>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Preferred Visit Date -->
                        <div class="p-4 rounded-xl border border-slate-100 bg-slate-50/70">
                            <span class="text-slate-400 block mb-1 font-semibold">Preferred Site Visit Date</span>
                            <div class="font-bold text-slate-900 text-sm">
                                @if($enquiry->preferred_visit_date)
                                    <div class="flex items-center gap-1.5 text-brand-700 font-bold">
                                        <i class="fa-regular fa-calendar-check text-xs"></i>
                                        <span>{{ $enquiry->preferred_visit_date->format('d F, Y (l)') }}</span>
                                    </div>
                                @else
                                    <span class="text-slate-400 font-normal">Not requested</span>
                                @endif
                            </div>
                        </div>

                        <!-- Interested Plot -->
                        <div class="p-4 rounded-xl border border-slate-100 bg-slate-50/70">
                            <span class="text-slate-400 block mb-1 font-semibold">Interested Venture Plot</span>
                            <div class="font-bold text-slate-900 text-sm">
                                @if($enquiry->plot)
                                    <a href="{{ route('admin.plots.show', $enquiry->plot) }}" class="text-brand-600 hover:text-brand-700 inline-flex items-center gap-1">
                                        <i class="fa-solid fa-map-pin text-[10px]"></i>
                                        <span>{{ $enquiry->plot->plot_number }} ({{ $enquiry->plot->size_sq_yards }} Sq. Yds)</span>
                                    </a>
                                @else
                                    <span class="text-slate-500 font-normal">General Layout Enquiry</span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <!-- Right Col: Lead Status & Internal Notes -->
        <div>
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-6">
                <div class="border-b border-slate-100 pb-4">
                    <h3 class="text-base font-extrabold text-slate-900">Lead Status & Notes</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Manage customer followup and internal records</p>
                </div>

                <form action="{{ route('admin.enquiries.update', $enquiry) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <!-- Status Dropdown -->
                    <div>
                        <label for="status" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Update Status <span class="text-rose-500">*</span>
                        </label>
                        <select id="status" name="status" required
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-900 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
                            <option value="new" {{ old('status', $enquiry->status) === 'new' ? 'selected' : '' }}>New (Needs Action)</option>
                            <option value="contacted" {{ old('status', $enquiry->status) === 'contacted' ? 'selected' : '' }}>Contacted (Phone/WhatsApp)</option>
                            <option value="in_progress" {{ old('status', $enquiry->status) === 'in_progress' ? 'selected' : '' }}>In Progress (Visit/Loan/Docs)</option>
                            <option value="closed" {{ old('status', $enquiry->status) === 'closed' ? 'selected' : '' }}>Closed (Booked / Resolved)</option>
                        </select>
                        @error('status') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Associated Plot -->
                    <div>
                        <label for="plot_id" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Associated Plot
                        </label>
                        <select id="plot_id" name="plot_id"
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-900 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
                            <option value="">None / General Inquiry</option>
                            @foreach($plots as $p)
                                <option value="{{ $p->id }}" {{ old('plot_id', $enquiry->plot_id) == $p->id ? 'selected' : '' }}>
                                    {{ $p->plot_number }} ({{ $p->size_sq_yards }} Yds - {{ ucfirst($p->status) }})
                                </option>
                            @endforeach
                        </select>
                        @error('plot_id') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Internal Admin Notes -->
                    <div>
                        <label for="admin_notes" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Internal Admin Notes
                        </label>
                        <textarea id="admin_notes" name="admin_notes" rows="5" placeholder="Record customer requirements, site visit timing, salesperson assigned, or token advance details..."
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500">{{ old('admin_notes', $enquiry->admin_notes) }}</textarea>
                        @error('admin_notes') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full py-3 bg-brand-600 hover:bg-brand-500 text-white text-xs font-bold rounded-xl shadow-md shadow-brand-600/25 transition-all flex items-center justify-center gap-2">
                        <i class="fa-solid fa-check text-xs"></i>
                        <span>Save Status & Notes</span>
                    </button>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection
