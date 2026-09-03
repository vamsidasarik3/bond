@extends('layouts.admin')

@section('title', 'Edit Plot ' . $plot->plot_number)
@section('page-title', 'Edit Plot')
@section('breadcrumb', 'Edit ' . $plot->plot_number)

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Back Button -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.plots.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-brand-600 transition-colors">
            <i class="fa-solid fa-arrow-left text-[11px]"></i>
            <span>Back to Plot Inventory</span>
        </a>

        <div class="flex items-center gap-2">
            <a href="{{ route('admin.plots.show', $plot) }}" class="px-3.5 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-colors">
                <i class="fa-regular fa-eye mr-1"></i> View Details
            </a>
            <button type="button" 
                onclick="openConfirmModal('{{ route('admin.plots.destroy', $plot) }}', 'Delete Plot {{ $plot->plot_number }}?', 'Are you sure you want to permanently delete this plot? All related enquiry associations will be cleared.', 'Yes, Delete Plot')"
                class="px-3.5 py-2 bg-rose-50 hover:bg-rose-100 text-rose-600 text-xs font-bold rounded-xl transition-colors">
                <i class="fa-regular fa-trash-can mr-1"></i> Delete
            </button>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-10 shadow-xs">
        <div class="flex items-start justify-between gap-4 border-b border-slate-100 pb-5 mb-8">
            <div>
                <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Edit Plot {{ $plot->plot_number }}</h2>
                <p class="text-xs text-slate-400 mt-1">Modify dimensions, pricing, facing, image, or availability status.</p>
            </div>
            <x-badge :status="$plot->status" type="plot" />
        </div>

        <form action="{{ route('admin.plots.update', $plot) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Row 1: Plot Number, Title, Type -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div>
                    <label for="plot_number" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Plot Number <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" id="plot_number" name="plot_number" value="{{ old('plot_number', $plot->plot_number) }}" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 font-semibold focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
                    @error('plot_number') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="title" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Title / Short Description
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title', $plot->title) }}"
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
                    @error('title') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="plot_type" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Plot Type
                    </label>
                    <select id="plot_type" name="plot_type"
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
                        <option value="regular" {{ old('plot_type', $plot->plot_type) === 'regular' ? 'selected' : '' }}>Regular Plot</option>
                        <option value="corner" {{ old('plot_type', $plot->plot_type) === 'corner' ? 'selected' : '' }}>Corner Plot</option>
                        <option value="commercial" {{ old('plot_type', $plot->plot_type) === 'commercial' ? 'selected' : '' }}>Commercial Plot</option>
                    </select>
                    @error('plot_type') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Row 2: Pricing & Size with Auto-Calculation -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 p-5 bg-emerald-50/40 border border-emerald-100 rounded-2xl">
                <div>
                    <label for="size_sq_yards" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Area (Sq. Yards) <span class="text-rose-500">*</span>
                    </label>
                    <input type="number" step="0.01" min="1" id="size_sq_yards" name="size_sq_yards" value="{{ old('size_sq_yards', $plot->size_sq_yards) }}" required oninput="calculateTotal()"
                        class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-900 font-extrabold focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
                    <p class="text-[11px] text-slate-400 mt-1">Area: {{ $plot->size_sq_yards }} Sq. Yds</p>
                    @error('size_sq_yards') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="price_per_sq_yard" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Rate (₹ / Sq. Yard) <span class="text-rose-500">*</span>
                    </label>
                    <input type="number" step="1" min="1" id="price_per_sq_yard" name="price_per_sq_yard" value="{{ old('price_per_sq_yard', $plot->price_per_sq_yard) }}" required oninput="calculateTotal()"
                        class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-900 font-extrabold focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
                    <p class="text-[11px] text-slate-400 mt-1">Current: ₹{{ number_format($plot->price_per_sq_yard) }}</p>
                    @error('price_per_sq_yard') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-emerald-800 uppercase tracking-wider mb-2">
                        Updated Total Price (₹)
                    </label>
                    <div class="px-4 py-2.5 bg-emerald-600 text-white rounded-xl font-extrabold text-sm flex items-center justify-between shadow-xs">
                        <span id="displayTotalPrice">{{ $plot->formatted_exact_price }}</span>
                        <span id="displayPriceWords" class="text-[11px] font-normal text-emerald-100">{{ $plot->formatted_price }}</span>
                    </div>
                    <p class="text-[11px] text-emerald-700 mt-1 font-medium">Auto-computed dynamically</p>
                </div>
            </div>

            <!-- Row 3: Dimensions, Facing, Road Width -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div>
                    <label for="facing" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Facing Orientation <span class="text-rose-500">*</span>
                    </label>
                    <select id="facing" name="facing" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 font-semibold focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
                        @foreach(['East', 'West', 'North', 'South', 'North-East', 'South-East', 'North-West', 'South-West'] as $facing)
                            <option value="{{ $facing }}" {{ old('facing', $plot->facing) === $facing ? 'selected' : '' }}>{{ $facing }} Facing</option>
                        @endforeach
                    </select>
                    @error('facing') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="boundary_dimensions" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Boundary Dimensions
                    </label>
                    <input type="text" id="boundary_dimensions" name="boundary_dimensions" value="{{ old('boundary_dimensions', $plot->boundary_dimensions) }}"
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
                    @error('boundary_dimensions') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="road_width_ft" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Road Width (Feet)
                    </label>
                    <input type="number" min="20" max="200" id="road_width_ft" name="road_width_ft" value="{{ old('road_width_ft', $plot->road_width_ft) }}"
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
                    <p class="text-[11px] text-slate-400 mt-1">Current: {{ $plot->road_width_ft }}ft Road</p>
                    @error('road_width_ft') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Row 4: Status & Plot Image Upload -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-2">
                <div>
                    <label for="status" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Status <span class="text-rose-500">*</span>
                    </label>
                    <select id="status" name="status" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-900 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
                        <option value="available" {{ old('status', $plot->status) === 'available' ? 'selected' : '' }}>Available for Sale</option>
                        <option value="reserved" {{ in_array(old('status', $plot->status), ['reserved', 'booked']) ? 'selected' : '' }}>Reserved (Advance Received)</option>
                        <option value="sold" {{ old('status', $plot->status) === 'sold' ? 'selected' : '' }}>Sold & Registered</option>
                    </select>
                    @error('status') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="image" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Plot Image / Layout Plan (Optional)
                    </label>
                    @if($plot->image_url)
                        <div class="mb-2 flex items-center gap-3">
                            <img src="{{ $plot->image_url }}" alt="{{ $plot->plot_number }}" class="w-12 h-12 rounded-lg object-cover border">
                            <span class="text-[11px] text-slate-500">Current layout image uploaded</span>
                        </div>
                    @endif
                    <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/webp"
                        class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-700 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100">
                    <p class="text-[11px] text-slate-400 mt-1">Choose a new file to replace the existing image</p>
                    @error('image') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Row 5: Notes / Description -->
            <div>
                <label for="notes" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                    Plot Description / Notes
                </label>
                <textarea id="notes" name="notes" rows="3" placeholder="Add specific features, reservation details, landmarks, or special layout notes..."
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-1 focus:ring-brand-500">{{ old('notes', $plot->notes) }}</textarea>
                @error('notes') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Submit Button Bar -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="{{ route('admin.plots.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-7 py-2.5 bg-brand-600 hover:bg-brand-500 text-white text-xs font-bold rounded-xl shadow-md shadow-brand-600/25 transition-all">
                    Update Plot Information
                </button>
            </div>
        </form>
    </div>

</div>

@push('scripts')
<script>
    function calculateTotal() {
        const size = parseFloat(document.getElementById('size_sq_yards').value) || 0;
        const rate = parseFloat(document.getElementById('price_per_sq_yard').value) || 0;
        const total = Math.round(size * rate);

        document.getElementById('displayTotalPrice').textContent = '₹' + total.toLocaleString('en-IN');
        
        let words = '';
        if (total >= 10000000) {
            words = '~' + (total / 10000000).toFixed(2) + ' Cr';
        } else if (total >= 100000) {
            words = '~' + (total / 100000).toFixed(2) + ' Lakhs';
        }
        document.getElementById('displayPriceWords').textContent = words;
    }
</script>
@endpush
@endsection
