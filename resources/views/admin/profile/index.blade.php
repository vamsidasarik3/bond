@extends('layouts.admin')

@section('title', 'My Profile — Administrator Settings')
@section('page-title', 'My Profile Settings')
@section('breadcrumb', 'Profile')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Profile Header Card with Avatar Preview -->
    <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-card">
        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">
            
            <!-- Avatar Display with Hover Overlay -->
            <div class="relative group shrink-0">
                <img id="avatarPreview" src="{{ $user->avatar_url }}" alt="{{ $user->name }}" 
                     class="w-24 h-24 sm:w-28 sm:h-28 rounded-3xl object-cover ring-4 ring-brand-500/20 shadow-md">
                
                <label for="avatarInput" title="Click to change photo"
                       class="absolute inset-0 bg-slate-950/60 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center text-white cursor-pointer text-xs font-semibold">
                    <i class="fa-solid fa-camera text-base mb-1"></i>
                    <span>Change</span>
                </label>
            </div>

            <!-- Profile Overview Info -->
            <div class="text-center sm:text-left flex-1 min-w-0">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <div>
                        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">{{ $user->name }}</h2>
                        <div class="flex items-center justify-center sm:justify-start gap-2 mt-1 text-xs text-slate-500">
                            <span class="font-mono text-slate-700 bg-slate-100 px-2 py-0.5 rounded-md font-semibold">@<span>{{ $user->username ?: 'admin' }}</span></span>
                            <span>•</span>
                            <span class="truncate">{{ $user->email }}</span>
                        </div>
                    </div>

                    <span class="inline-flex items-center px-3 py-1 text-xs font-bold rounded-full bg-brand-50 text-brand-700 border border-brand-200 uppercase tracking-wider self-center sm:self-auto">
                        <i class="fa-solid fa-shield-halved mr-1.5 text-brand-600"></i> Super Admin
                    </span>
                </div>

                <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-center sm:justify-start gap-6 text-xs text-slate-500 flex-wrap">
                    <div><i class="fa-regular fa-calendar text-slate-400 mr-1.5"></i> Admin since {{ $user->created_at->format('M Y') }}</div>
                    <div class="text-emerald-600 font-semibold"><i class="fa-solid fa-circle-check mr-1 text-[10px]"></i> Active Verified Account</div>
                </div>
            </div>

        </div>
    </div>

    <!-- Main Profile Edit Form -->
    <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-card">
        <div class="border-b border-slate-100 pb-4 mb-6">
            <h3 class="text-base font-extrabold text-slate-900 tracking-tight">Account Credentials & Profile</h3>
            <p class="text-xs text-slate-400 mt-0.5">
                Update your administrative credentials, display name, contact email, and profile photo.
            </p>
        </div>

        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Hidden File Input linked with Avatar Preview Button -->
            <input type="file" id="avatarInput" name="avatar" accept="image/png,image/jpeg,image/jpg,image/webp" 
                   onchange="handleAvatarChange(this)" class="hidden">

            <!-- 1. Profile Photo Upload Section -->
            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-1">
                        Profile Photo
                    </label>
                    <p class="text-xs text-slate-500">
                        Upload a new photo (JPEG, PNG, JPG, or WEBP up to 2MB).
                    </p>
                    @error('avatar')
                        <p class="text-xs text-rose-600 font-medium mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-2 shrink-0">
                    <label for="avatarInput" class="px-4 py-2 bg-white hover:bg-slate-100 border border-slate-200 rounded-xl text-xs font-bold text-slate-700 cursor-pointer transition-colors shadow-xs">
                        <i class="fa-solid fa-upload mr-1.5 text-slate-400"></i> Choose Photo
                    </label>
                </div>
            </div>

            <!-- 2. Personal & Account Details Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-[11px] font-extrabold text-slate-600 uppercase tracking-wider mb-2">
                        Full Name <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-user text-xs"></i>
                        </div>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                            placeholder="e.g. Navagruha Admin"
                            class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 font-semibold focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                    </div>
                    @error('name') 
                        <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Admin Username Field -->
                <div>
                    <label for="username" class="block text-[11px] font-extrabold text-slate-600 uppercase tracking-wider mb-2">
                        Admin Username <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-at text-xs"></i>
                        </div>
                        <input type="text" id="username" name="username" value="{{ old('username', $user->username ?: 'admin') }}" required
                            placeholder="e.g. admin"
                            class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 font-semibold focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                    </div>
                    <p class="text-[10px] text-slate-400 mt-1">Unique login handle</p>
                    @error('username') 
                        <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Admin Email Field -->
                <div class="sm:col-span-2">
                    <label for="email" class="block text-[11px] font-extrabold text-slate-600 uppercase tracking-wider mb-2">
                        Admin Email Address <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-envelope text-xs"></i>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                            placeholder="admin@navagruha.com"
                            class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 font-semibold focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                    </div>
                    @error('email') 
                        <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p> 
                    @enderror
                </div>

            </div>

            <!-- 3. Password Change Section (Optional) -->
            <div class="pt-6 border-t border-slate-100">
                <div class="mb-4">
                    <h4 class="text-sm font-extrabold text-slate-900">Change Password</h4>
                    <p class="text-xs text-slate-400 mt-0.5">
                        Leave blank if you do not wish to update your password.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 p-5 bg-slate-50/70 border border-slate-100 rounded-2xl">
                    
                    <!-- New Password -->
                    <div>
                        <label for="password" class="block text-[11px] font-extrabold text-slate-600 uppercase tracking-wider mb-2">
                            New Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-solid fa-lock text-xs"></i>
                            </div>
                            <input type="password" id="password" name="password" autocomplete="new-password"
                                placeholder="Minimum 8 characters"
                                class="w-full pl-9 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                        </div>
                        @error('password') 
                            <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Confirm New Password -->
                    <div>
                        <label for="password_confirmation" class="block text-[11px] font-extrabold text-slate-600 uppercase tracking-wider mb-2">
                            Confirm New Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-solid fa-lock-open text-xs"></i>
                            </div>
                            <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password"
                                placeholder="Re-type new password"
                                class="w-full pl-9 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Submit Button Bar -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="{{ route('admin.dashboard') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 bg-brand-600 hover:bg-brand-500 text-white text-xs font-bold rounded-xl shadow-xs shadow-brand-600/25 transition-all flex items-center gap-2">
                    <i class="fa-solid fa-check text-xs"></i>
                    <span>Save Profile Changes</span>
                </button>
            </div>

        </form>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function handleAvatarChange(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            
            // Check size (2MB limit)
            if (file.size > 2097152) {
                showGlobalToast('The selected image exceeds 2MB limit. Please choose a smaller photo.', 'error');
                input.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatarPreview').src = e.target.result;
                showGlobalToast('Photo selected! Click "Save Profile Changes" to update.', 'success');
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush
