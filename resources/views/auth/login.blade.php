@extends('layouts.auth')

@section('title', 'Admin Sign In')

@section('content')
<div class="bg-corporate-900 border border-slate-800 rounded-3xl p-8 sm:p-10 shadow-2xl backdrop-blur-md">
    
    <!-- Brand Header -->
    <div class="text-center mb-8">
        <div class="inline-flex p-3 rounded-2xl bg-corporate-950/80 border border-slate-800/80 shadow-inner mb-4">
            <img src="{{ asset('images/navagruha-logo-white.png') }}" alt="Navagruha" class="h-10 w-auto" onerror="this.onerror=null; this.src='{{ asset('images/navagruha-logo.png') }}';">
        </div>
        <h2 class="text-2xl font-extrabold text-white tracking-tight">Admin Portal</h2>
        <p class="text-xs text-slate-400 mt-1 font-medium">Navagruha Infra Developers, AIIMS Bibinagar</p>
    </div>

    <!-- Flash Alerts -->
    @if(session('success'))
        <div class="mb-5 p-3.5 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-semibold flex items-center gap-2.5">
            <i class="fa-solid fa-circle-check text-sm"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="mb-5 p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs font-semibold flex items-center gap-2.5">
            <i class="fa-solid fa-circle-exclamation text-sm"></i>
            <span>{{ $errors->first() }}</span>
        </div>
    @endif

    <!-- Login Form -->
    <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
        @csrf

        <!-- Username or Email Field -->
        <div>
            <label for="email" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                Admin Username or Email <span class="text-rose-500">*</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                    <i class="fa-solid fa-user-shield text-sm"></i>
                </div>
                <input type="text" id="email" name="email" value="{{ old('email', 'admin@navagruha.com') }}" required autofocus
                    placeholder="admin or admin@navagruha.com"
                    class="w-full pl-10 pr-4 py-3 bg-corporate-950 border border-slate-700/80 rounded-xl text-white text-sm placeholder-slate-500 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-all">
            </div>
        </div>

        <!-- Password Field -->
        <div>
            <div class="flex items-center justify-between mb-2">
                <label for="password" class="block text-xs font-bold text-slate-300 uppercase tracking-wider">
                    Password <span class="text-rose-500">*</span>
                </label>
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                    <i class="fa-solid fa-lock text-sm"></i>
                </div>
                <input type="password" id="password" name="password" required value="Admin@12345"
                    placeholder="••••••••"
                    class="w-full pl-10 pr-4 py-3 bg-corporate-950 border border-slate-700/80 rounded-xl text-white text-sm placeholder-slate-500 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-all">
            </div>
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between pt-1">
            <label class="flex items-center gap-2 cursor-pointer text-xs text-slate-400 select-none">
                <input type="checkbox" name="remember" class="w-4 h-4 rounded bg-corporate-950 border-slate-700 text-brand-600 focus:ring-brand-500">
                <span>Remember this browser</span>
            </label>
            <span class="text-xs text-brand-400 font-medium">Secured Session</span>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full py-3.5 px-4 bg-brand-600 hover:bg-brand-500 text-white font-bold text-sm rounded-xl shadow-lg shadow-brand-600/30 transition-all transform hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2">
            <span>Sign In to Dashboard</span>
            <i class="fa-solid fa-arrow-right text-xs"></i>
        </button>
    </form>

    <!-- Seeded Credentials Hint Card -->
    <div class="mt-8 pt-6 border-t border-slate-800 text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-800/80 border border-slate-700/60 text-[11px] text-slate-300">
            <i class="fa-solid fa-key text-brand-400 text-xs"></i>
            <span>Login: <strong>admin</strong> or <strong>admin@navagruha.com</strong> | Pass: <strong>Admin@12345</strong></span>
        </div>
        <div class="mt-3">
            <a href="{{ route('home') }}" class="text-xs text-slate-500 hover:text-slate-300 transition-colors">
                &larr; Back to Main Website
            </a>
        </div>
    </div>

</div>
@endsection
