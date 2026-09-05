@extends('layouts.admin')

@section('title', 'Add New Plot Specification')
@section('page-title', 'Create Plot')
@section('breadcrumb', 'Add Plot')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Top Action Bar -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.plots.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-brand-600 transition-colors">
            <i class="fa-solid fa-arrow-left text-[11px]"></i>
            <span>Back to Plot Inventory</span>
        </a>
    </div>

    <!-- Main Form Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-10 shadow-card">
        <div class="border-b border-slate-100 pb-5 mb-8">
            <div class="inline-flex items-center gap-2 px-2.5 py-0.5 rounded-full bg-brand-50 text-brand-700 text-[11px] font-bold mb-2">
                <i class="fa-solid fa-layer-group text-[10px]"></i>
                <span>AIIMS Bibinagar Venture (Phase 2)</span>
            </div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">New Plot Specification</h2>
            <p class="text-xs text-slate-400 mt-1">Register a new residential or commercial plot in the layout inventory.</p>
        </div>

        <form action="{{ route('admin.plots.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Section 1: Basic Identifiers -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div>
                    <label for="plot_number" class="block text-[11px] font-extrabold text-slate-600 uppercase tracking-wider mb-2">
                        Plot Number <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" id="plot_number" name="plot_number" value="{{ old('plot_number') }}" required placeholder="e.g. Plot #160"
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 font-semibold focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                    @error('plot_number') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="title" class="block text-[11px] font-extrabold text-slate-600 uppercase tracking-wider mb-2">
                        Title / Short Tagline
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="e.g. East Facing Park View Villa Plot"
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                    @error('title') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="plot_type" class="block text-[11px] font-extrabold text-slate-600 uppercase tracking-wider mb-2">
                        Plot Type
                    </label>
                    <select id="plot_type" name="plot_type"
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                        <option value="regular" {{ old('plot_type', 'regular') === 'regular' ? 'selected' : '' }}>Regular Plot</option>
                        <option value="corner" {{ old('plot_type') === 'corner' ? 'selected' : '' }}>Corner Plot</option>
                        <option value="commercial" {{ old('plot_type') === 'commercial' ? 'selected' : '' }}>Commercial Frontage</option>
                    </select>
                    @error('plot_type') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Section 2: Area, Rate & Total Price Auto-Computation -->
            <div class="p-5 sm:p-6 bg-emerald-50/40 border border-emerald-100 rounded-3xl space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-extrabold uppercase tracking-wider text-emerald-900">Area & Pricing Calculation</span>
                    <span class="text-[11px] text-emerald-700 font-medium">Standard rate: ₹14,999 / Sq. Yd</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <div>
                        <label for="size_sq_yards" class="block text-[11px] font-extrabold text-slate-700 uppercase tracking-wider mb-2">
                            Area (Sq. Yards) <span class="text-rose-500">*</span>
                        </label>
                        <input type="number" step="0.01" min="1" id="size_sq_yards" name="size_sq_yards" value="{{ old('size_sq_yards', 167) }}" required oninput="calculateTotal()"
                            class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-900 font-extrabold focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                        <p class="text-[10px] text-slate-400 mt-1">Sizes: 167, 200, 220, 267, 500</p>
                        @error('size_sq_yards') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="price_per_sq_yard" class="block text-[11px] font-extrabold text-slate-700 uppercase tracking-wider mb-2">
                            Rate (₹ / Sq. Yard) <span class="text-rose-500">*</span>
                        </label>
                        <input type="number" step="1" min="1" id="price_per_sq_yard" name="price_per_sq_yard" value="{{ old('price_per_sq_yard', 14999) }}" required oninput="calculateTotal()"
                            class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-900 font-extrabold focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                        <p class="text-[10px] text-slate-400 mt-1">AIIMS Corridor rate</p>
                        @error('price_per_sq_yard') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[11px] font-extrabold text-emerald-900 uppercase tracking-wider mb-2">
                            Computed Total Price (₹)
                        </label>
                        <div class="px-4 py-2.5 bg-emerald-600 text-white rounded-xl font-extrabold text-sm flex items-center justify-between shadow-xs">
                            <span id="displayTotalPrice">₹25,04,833</span>
                            <span id="displayPriceWords" class="text-[11px] font-normal text-emerald-100">~25.05 L</span>
                        </div>
                        <p class="text-[10px] text-emerald-700 mt-1 font-semibold">Auto-computed dynamically</p>
                    </div>
                </div>
            </div>

            <!-- Section 3: Physical Dimensions & Orientation -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div>
                    <label for="facing" class="block text-[11px] font-extrabold text-slate-600 uppercase tracking-wider mb-2">
                        Facing Orientation <span class="text-rose-500">*</span>
                    </label>
                    <select id="facing" name="facing" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                        @foreach(['East', 'West', 'North', 'South', 'North-East', 'South-East', 'North-West', 'South-West'] as $facing)
                            <option value="{{ $facing }}" {{ old('facing') === $facing ? 'selected' : '' }}>{{ $facing }} Facing</option>
                        @endforeach
                    </select>
                    @error('facing') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="road_width_ft" class="block text-[11px] font-extrabold text-slate-600 uppercase tracking-wider mb-2">
                        Road Width (Feet)
                    </label>
                    <input type="number" id="road_width_ft" name="road_width_ft" value="{{ old('road_width_ft', 40) }}" placeholder="e.g. 40"
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                    <p class="text-[10px] text-slate-400 mt-1">Standard: 33, 40, or 60 Feet</p>
                    @error('road_width_ft') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="boundary_dimensions" class="block text-[11px] font-extrabold text-slate-600 uppercase tracking-wider mb-2">
                        Boundary Dimensions
                    </label>
                    <input type="text" id="boundary_dimensions" name="boundary_dimensions" value="{{ old('boundary_dimensions') }}" placeholder="e.g. 36'0'' x 41'9''"
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                    <p class="text-[10px] text-slate-400 mt-1">Front x Depth layout feet</p>
                    @error('boundary_dimensions') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Section 4: Status & Vaastu -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                <div>
                    <label for="status" class="block text-[11px] font-extrabold text-slate-700 uppercase tracking-wider mb-2">
                        Inventory Status <span class="text-rose-500">*</span>
                    </label>
                    <select id="status" name="status" required
                        class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-800 focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                        <option value="available" {{ old('status', 'available') === 'available' ? 'selected' : '' }}>Available (Open for sale)</option>
                        <option value="reserved" {{ old('status') === 'reserved' ? 'selected' : '' }}>Reserved (Token advance received)</option>
                        <option value="sold" {{ old('status') === 'sold' ? 'selected' : '' }}>Sold (Registration completed)</option>
                    </select>
                    @error('status') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center pt-5 sm:pt-6">
                    <label class="relative flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_vaastu_compliant" value="1" {{ old('is_vaastu_compliant', true) ? 'checked' : '' }}
                            class="w-4 h-4 text-brand-600 rounded border-slate-300 focus:ring-brand-500">
                        <div>
                            <span class="text-xs font-bold text-slate-800">100% Vaastu Compliance</span>
                            <span class="text-[11px] text-slate-500 block">Verified layout alignment</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Section 5: Administrative Notes -->
            <div>
                <label for="notes" class="block text-[11px] font-extrabold text-slate-600 uppercase tracking-wider mb-2">
                    Internal Plot Notes / Key Selling Points
                </label>
                <textarea id="notes" name="notes" rows="3" placeholder="e.g. Near 40ft road junction, immediate spot registration available..."
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">{{ old('notes') }}</textarea>
                @error('notes') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Action Buttons -->
            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.plots.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 bg-brand-600 hover:bg-brand-500 text-white text-xs font-bold rounded-xl shadow-xs shadow-brand-600/25 transition-all inline-flex items-center gap-2">
                    <i class="fa-solid fa-check text-xs"></i>
                    <span>Save & Register Plot</span>
                </button>
            </div>

        </form>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function calculateTotal() {
        const size = parseFloat(document.getElementById('size_sq_yards').value) || 0;
        const rate = parseFloat(document.getElementById('price_per_sq_yard').value) || 0;
        const total = Math.round(size * rate);

        const totalFormatted = '₹' + new Intl.NumberFormat('en-IN').format(total);
        document.getElementById('displayTotalPrice').textContent = totalFormatted;

        let words = '';
        if (total >= 10000000) {
            words = '~' + (total / 10000000).toFixed(2) + ' Cr';
        } else if (total >= 100000) {
            words = '~' + (total / 100000).toFixed(2) + ' Lakhs';
        } else {
            words = totalFormatted;
        }
        document.getElementById('displayPriceWords').textContent = words;
    }

    document.addEventListener('DOMContentLoaded', calculateTotal);
</script>
@endpush
