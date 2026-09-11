@extends('layouts.admin')

@section('title', 'Lead Details — ' . $enquiry->name . ' (' . ($enquiry->lead_number ?: '#' . $enquiry->id) . ')')
@section('page-title', 'Lead CRM Record')
@section('breadcrumb', $enquiry->lead_number ?: 'Lead #' . $enquiry->id)

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    <!-- Top Action Bar -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.enquiries.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-brand-600 transition-colors">
            <i class="fa-solid fa-arrow-left text-[11px]"></i>
            <span>Back to Leads CRM</span>
        </a>

        <div class="flex items-center gap-2">
            <button type="button" 
                onclick="openConfirmModal('{{ route('admin.enquiries.destroy', $enquiry) }}', 'Delete Lead from {{ $enquiry->name }}?', 'Are you sure you want to permanently delete this customer enquiry record? This action cannot be undone.', 'Yes, Delete Lead')"
                class="px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-600 text-xs font-bold rounded-xl transition-colors inline-flex items-center gap-1.5">
                <i class="fa-regular fa-trash-can text-xs"></i>
                <span>Delete Lead</span>
            </button>
        </div>
    </div>

    <!-- Main Content Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left 2 Cols: Customer Message, Attribution & Activity Logs -->
        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-card">
                
                <!-- Lead Header -->
                <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4 pb-6 border-b border-slate-100">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 border border-slate-200 text-slate-700 text-xs font-mono font-extrabold tracking-wider mb-2">
                            <span>{{ $enquiry->lead_number ?: 'LEAD-#' . $enquiry->id }}</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                            {{ $enquiry->name }}
                        </h2>
                        
                        <!-- Submission Date & Time -->
                        <div class="flex items-center gap-2 text-xs text-slate-500 mt-1 flex-wrap">
                            <span><i class="fa-regular fa-calendar text-slate-400 mr-1"></i> <strong class="text-slate-800">{{ $enquiry->created_at->format('d M, Y') }}</strong></span>
                            <span>•</span>
                            <span><i class="fa-regular fa-clock text-slate-400 mr-1"></i> {{ $enquiry->created_at->format('h:i A') }}</span>
                            <span class="text-slate-400">({{ $enquiry->created_at->diffForHumans() }})</span>
                        </div>
                    </div>

                    <div class="self-start">
                        <x-badge :status="$enquiry->status" type="enquiry" />
                    </div>
                </div>

                <!-- Complete Message Section -->
                <div class="py-6 border-b border-slate-100">
                    <div class="text-[11px] font-extrabold text-slate-400 uppercase tracking-wider mb-3">
                        Submitted Message & Remarks
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

                <!-- Contact Details & Site Visit Grid -->
                <div class="py-6 border-b border-slate-100">
                    <div class="text-[11px] font-extrabold text-slate-400 uppercase tracking-wider mb-3">
                        Contact Details & Site Visit
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        
                        <!-- Phone with Call & WhatsApp -->
                        <div class="p-4 rounded-2xl border border-slate-100 bg-slate-50/70">
                            <span class="text-slate-400 block mb-1 font-semibold text-[11px]">Mobile Number</span>
                            <div class="flex items-center justify-between gap-2">
                                <span class="font-extrabold text-slate-900 text-sm">{{ $enquiry->phone }}</span>
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

                        <!-- Email Address -->
                        <div class="p-4 rounded-2xl border border-slate-100 bg-slate-50/70">
                            <span class="text-slate-400 block mb-1 font-semibold text-[11px]">Email Address</span>
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
                        <div class="p-4 rounded-2xl border border-slate-100 bg-slate-50/70">
                            <span class="text-slate-400 block mb-1 font-semibold text-[11px]">Preferred Site Visit Date</span>
                            <div class="font-bold text-slate-900 text-sm">
                                @if($enquiry->preferred_visit_date)
                                    <div class="flex items-center gap-1.5 text-purple-700 font-bold">
                                        <i class="fa-regular fa-calendar-check text-xs"></i>
                                        <span>{{ $enquiry->preferred_visit_date->format('d F, Y (l)') }}</span>
                                    </div>
                                @else
                                    <span class="text-slate-400 font-normal">Not specified</span>
                                @endif
                            </div>
                        </div>

                        <!-- Project Association -->
                        <div class="p-4 rounded-2xl border border-slate-100 bg-slate-50/70">
                            <span class="text-slate-400 block mb-1 font-semibold text-[11px]">Project</span>
                            <div class="font-bold text-slate-900 text-sm">
                                {{ $enquiry->project ?: 'RRR Prekshitha Enclave' }}
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Attribution & Tracking Info -->
                <div class="pt-6">
                    <div class="text-[11px] font-extrabold text-slate-400 uppercase tracking-wider mb-3">
                        Lead Attribution & Source Details
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs">
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="text-slate-400 block text-[10px] uppercase font-bold">Source</span>
                            <span class="font-bold text-slate-800">{{ $enquiry->source ?: 'Website' }}</span>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="text-slate-400 block text-[10px] uppercase font-bold">Landing Page</span>
                            <span class="font-mono font-bold text-slate-800 text-[11px] truncate block">{{ $enquiry->landing_page ?: '/landing2/' }}</span>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="text-slate-400 block text-[10px] uppercase font-bold">UTM Source</span>
                            <span class="font-bold text-slate-800">{{ $enquiry->utm_source ?: 'Direct / None' }}</span>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="text-slate-400 block text-[10px] uppercase font-bold">UTM Campaign</span>
                            <span class="font-bold text-slate-800">{{ $enquiry->utm_campaign ?: 'None' }}</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Chronological Notes Thread -->
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-card space-y-6">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <div>
                        <h3 class="text-base font-extrabold text-slate-900 tracking-tight">Internal CRM Notes & Follow-up History</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Chronological record of calls, requirements, and progress</p>
                    </div>
                    <span class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-bold">
                        {{ $enquiry->notes->count() }} Notes
                    </span>
                </div>

                <!-- Add Note Form -->
                <form action="{{ route('admin.enquiries.notes.store', $enquiry) }}" method="POST" class="space-y-3">
                    @csrf
                    <div>
                        <label for="new_note" class="sr-only">Add an internal note</label>
                        <textarea id="new_note" name="note" rows="3" required placeholder="Write a note about phone call discussion, visit scheduling, budget, or customer requirements..."
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all"></textarea>
                        @error('note') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold rounded-xl transition-colors inline-flex items-center gap-1.5">
                            <i class="fa-solid fa-plus text-[10px]"></i>
                            <span>Post Internal Note</span>
                        </button>
                    </div>
                </form>

                <!-- Notes Timeline -->
                <div class="space-y-3 pt-2">
                    @forelse($enquiry->notes as $note)
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 text-xs space-y-1.5">
                            <div class="flex items-center justify-between text-[11px] text-slate-400">
                                <span class="font-bold text-slate-700"><i class="fa-regular fa-user mr-1 text-slate-400"></i>{{ $note->author_name }}</span>
                                <span>{{ $note->created_at->format('d M Y, h:i A') }} ({{ $note->created_at->diffForHumans() }})</span>
                            </div>
                            <p class="text-slate-800 whitespace-pre-line leading-relaxed">{{ $note->note }}</p>
                        </div>
                    @empty
                        <div class="text-center py-6 text-slate-400 text-xs">
                            <p>No internal notes added yet. Use the form above to record customer updates.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Email Activity Logs -->
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-card space-y-4">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <div>
                        <h3 class="text-base font-extrabold text-slate-900 tracking-tight">Email Notification Activity</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Automated confirmation & client notification delivery audit</p>
                    </div>
                    <span class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-bold">
                        {{ $enquiry->emailLogs->count() }} Attempts
                    </span>
                </div>

                <div class="space-y-3">
                    @forelse($enquiry->emailLogs as $log)
                        <div class="p-4 rounded-2xl border {{ $log->status === 'sent' ? 'border-emerald-100 bg-emerald-50/40' : 'border-rose-100 bg-rose-50/40' }} text-xs">
                            <div class="flex items-center justify-between gap-2 flex-wrap mb-1.5">
                                <div class="flex items-center gap-2">
                                    @if($log->mail_type === 'user_acknowledgement')
                                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-blue-100 text-blue-700 uppercase">Customer Email</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-purple-100 text-purple-700 uppercase">Client Alert</span>
                                    @endif
                                    <span class="font-bold text-slate-800">{{ $log->recipient_email }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-[11px] text-slate-400">{{ $log->created_at->format('d M Y, h:i A') }}</span>
                                    @if($log->status === 'sent')
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-emerald-100 text-emerald-700">Sent</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-rose-100 text-rose-700">Failed</span>
                                    @endif
                                </div>
                            </div>
                            <div class="text-slate-600 font-semibold mb-1">
                                Subject: {{ $log->subject }}
                            </div>
                            @if($log->error_message)
                                <div class="mt-2 p-2.5 rounded-xl bg-white border border-rose-200 text-rose-700 text-[11px] font-mono leading-tight">
                                    <i class="fa-solid fa-triangle-exclamation mr-1"></i> {{ $log->error_message }}
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="text-center py-6 text-slate-400 text-xs">
                            <p>No email attempts recorded for this lead.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- Right Col: Lead Status & Plot Association -->
        <div>
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-card space-y-6 sticky top-24">
                <div class="border-b border-slate-100 pb-4">
                    <h3 class="text-base font-extrabold text-slate-900 tracking-tight">Pipeline Status</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Update stage and project association</p>
                </div>

                <form action="{{ route('admin.enquiries.update', $enquiry) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <!-- Status Dropdown -->
                    <div>
                        <label for="status" class="block text-[11px] font-extrabold text-slate-700 uppercase tracking-wider mb-2">
                            Update Lead Status <span class="text-rose-500">*</span>
                        </label>
                        <select id="status" name="status" required
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-900 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                            @foreach($statuses as $value => $label)
                                <option value="{{ $value }}" {{ old('status', $enquiry->status) === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('status') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Associated Plot -->
                    <div>
                        <label for="plot_id" class="block text-[11px] font-extrabold text-slate-700 uppercase tracking-wider mb-2">
                            Associate with Plot
                        </label>
                        <select id="plot_id" name="plot_id"
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-900 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                            <option value="">None / General Layout Inquiry</option>
                            @foreach($plots as $p)
                                <option value="{{ $p->id }}" {{ old('plot_id', $enquiry->plot_id) == $p->id ? 'selected' : '' }}>
                                    {{ $p->plot_number }} ({{ $p->size_sq_yards }} Yds - {{ ucfirst($p->status) }})
                                </option>
                            @endforeach
                        </select>
                        @error('plot_id') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Project Name -->
                    <div>
                        <label for="project" class="block text-[11px] font-extrabold text-slate-700 uppercase tracking-wider mb-2">
                            Project Name
                        </label>
                        <input type="text" id="project" name="project" value="{{ old('project', $enquiry->project ?: 'RRR Prekshitha Enclave') }}"
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-900 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                        @error('project') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Quick Summary Note -->
                    <div>
                        <label for="admin_notes" class="block text-[11px] font-extrabold text-slate-700 uppercase tracking-wider mb-2">
                            Primary Summary Note
                        </label>
                        <textarea id="admin_notes" name="admin_notes" rows="4" placeholder="Summary of customer requirements, assigned agent, or key dates..."
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">{{ old('admin_notes', $enquiry->admin_notes) }}</textarea>
                        @error('admin_notes') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full py-3 bg-brand-600 hover:bg-brand-500 text-white text-xs font-bold rounded-xl shadow-xs shadow-brand-600/25 transition-all flex items-center justify-center gap-2">
                        <i class="fa-solid fa-check text-xs"></i>
                        <span>Save Status & Changes</span>
                    </button>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection
