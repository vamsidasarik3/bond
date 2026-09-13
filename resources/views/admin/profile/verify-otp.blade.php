@extends('layouts.admin')

@section('title', 'Verify Password Change — Administrator Security')
@section('page-title', 'Security Verification')
@section('breadcrumb', 'Verify OTP')

@section('content')
<div class="max-w-xl mx-auto py-6">

    <!-- Main OTP Verification Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 p-8 sm:p-10 shadow-card text-center relative overflow-hidden">
        
        <!-- Subtle Top Accent Band -->
        <div class="absolute top-0 inset-x-0 h-1.5 bg-gradient-to-r from-amber-500 via-brand-500 to-emerald-500"></div>

        <!-- Security Shield Icon -->
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-amber-500/10 border border-amber-500/20 text-amber-500 mb-6 shadow-inner">
            <i class="fa-solid fa-shield-halved text-3xl"></i>
        </div>

        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight mb-2">
            Verify Password Change
        </h2>
        <p class="text-xs text-slate-500 max-w-md mx-auto leading-relaxed mb-6">
            A 4-digit One-Time Password (OTP) has been dispatched to your authorized security email:
            <span class="d-block mt-1 font-mono font-bold text-slate-800 bg-slate-100 px-2.5 py-1 rounded-md inline-block">{{ $recipient }}</span>
        </p>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="mb-6 p-3.5 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 text-xs font-semibold flex items-center justify-center gap-2">
                <i class="fa-solid fa-circle-check text-sm"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('info'))
            <div class="mb-6 p-3.5 rounded-xl bg-sky-500/10 border border-sky-500/20 text-sky-700 text-xs font-semibold flex items-center justify-center gap-2">
                <i class="fa-solid fa-circle-info text-sm"></i>
                <span>{{ session('info') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-600 text-xs font-semibold flex items-center justify-center gap-2">
                <i class="fa-solid fa-triangle-exclamation text-sm"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-600 text-xs font-semibold flex items-center justify-center gap-2">
                <i class="fa-solid fa-triangle-exclamation text-sm"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <!-- OTP Input Form -->
        <form action="{{ route('admin.profile.otp.verify') }}" method="POST" id="otpVerificationForm" class="space-y-6">
            @csrf
            
            <input type="hidden" name="otp" id="fullOtpInput">

            <!-- 4-Digit Segmented Inputs -->
            <div>
                <label class="block text-[11px] font-extrabold text-slate-600 uppercase tracking-wider mb-3">
                    Enter 4-Digit Verification Code
                </label>
                
                <div class="flex items-center justify-center gap-3 sm:gap-4 max-w-xs mx-auto" id="otpBoxContainer">
                    <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" autofocus
                           class="otp-digit w-14 h-16 sm:w-16 sm:h-18 text-2xl sm:text-3xl font-mono font-extrabold text-center text-slate-900 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/15 focus:outline-none transition-all shadow-inner" 
                           data-index="0" autocomplete="one-time-code">
                    <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]"
                           class="otp-digit w-14 h-16 sm:w-16 sm:h-18 text-2xl sm:text-3xl font-mono font-extrabold text-center text-slate-900 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/15 focus:outline-none transition-all shadow-inner" 
                           data-index="1">
                    <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]"
                           class="otp-digit w-14 h-16 sm:w-16 sm:h-18 text-2xl sm:text-3xl font-mono font-extrabold text-center text-slate-900 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/15 focus:outline-none transition-all shadow-inner" 
                           data-index="2">
                    <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]"
                           class="otp-digit w-14 h-16 sm:w-16 sm:h-18 text-2xl sm:text-3xl font-mono font-extrabold text-center text-slate-900 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/15 focus:outline-none transition-all shadow-inner" 
                           data-index="3">
                </div>
            </div>

            <!-- Expiry Countdown -->
            <div class="text-xs text-slate-500 flex items-center justify-center gap-1.5 font-medium">
                <i class="fa-regular fa-clock text-slate-400"></i>
                <span>Code expires in: <strong id="expiryTimerText" class="font-mono text-slate-800">10:00</strong></span>
            </div>

            <!-- Submit Button -->
            <button type="submit" id="verifySubmitBtn"
                    class="w-full py-3.5 px-6 bg-brand-600 hover:bg-brand-500 text-white text-sm font-bold rounded-xl shadow-lg shadow-brand-600/25 transition-all flex items-center justify-center gap-2">
                <i class="fa-solid fa-lock text-xs"></i>
                <span>Verify &amp; Save New Password</span>
            </button>
        </form>

        <!-- Secondary Actions (Resend & Cancel) -->
        <div class="mt-8 pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs">
            
            <!-- Resend Form -->
            <form action="{{ route('admin.profile.otp.resend') }}" method="POST" id="resendOtpForm">
                @csrf
                <button type="submit" id="resendBtn" class="font-bold text-brand-600 hover:text-brand-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors flex items-center gap-1.5">
                    <i class="fa-solid fa-rotate-right text-[11px]"></i>
                    <span id="resendBtnText">Resend 4-Digit Code</span>
                </button>
            </form>

            <!-- Cancel Form -->
            <form action="{{ route('admin.profile.otp.cancel') }}" method="POST">
                @csrf
                <button type="submit" class="text-slate-400 hover:text-rose-600 transition-colors font-medium">
                    Cancel &amp; Discard Password Change
                </button>
            </form>

        </div>

    </div>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const digits = document.querySelectorAll('.otp-digit');
    const fullOtpInput = document.getElementById('fullOtpInput');
    const form = document.getElementById('otpVerificationForm');
    const expiryTimestamp = {{ $expiresAt ?? (time() + 600) }};
    const resendAvailableTimestamp = {{ $resendAvailableAt ?? (time() + 60) }};

    // Auto-focus first input
    if (digits[0]) digits[0].focus();

    // 1. Handle Digit Input Navigation
    digits.forEach((input, index) => {
        input.addEventListener('input', function(e) {
            const val = this.value.replace(/[^0-9]/g, '');
            this.value = val ? val[0] : '';

            if (this.value && index < digits.length - 1) {
                digits[index + 1].focus();
            }

            syncFullOtp();

            // If all 4 digits entered, highlight submit
            if (fullOtpInput.value.length === 4) {
                document.getElementById('verifySubmitBtn').classList.add('ring-4', 'ring-brand-500/25');
            }
        });

        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && !this.value && index > 0) {
                digits[index - 1].focus();
            }
        });

        // Handle Paste across the 4 inputs
        input.addEventListener('paste', function(e) {
            e.preventDefault();
            const pasted = (e.clipboardData || window.clipboardData).getData('text').replace(/[^0-9]/g, '');
            if (pasted.length >= 4) {
                for (let i = 0; i < 4; i++) {
                    if (digits[i]) digits[i].value = pasted[i];
                }
                syncFullOtp();
                digits[3].focus();
            }
        });
    });

    function syncFullOtp() {
        let code = '';
        digits.forEach(d => code += d.value);
        fullOtpInput.value = code;
    }

    form.addEventListener('submit', function(e) {
        syncFullOtp();
        if (fullOtpInput.value.length !== 4) {
            e.preventDefault();
            alert('Please enter all 4 digits of the verification code.');
            // Focus first empty
            for (let d of digits) {
                if (!d.value) { d.focus(); break; }
            }
        }
    });

    // 2. Expiry Countdown Timer
    function updateExpiryTimer() {
        const now = Math.floor(Date.now() / 1000);
        const remaining = Math.max(0, expiryTimestamp - now);
        const mins = Math.floor(remaining / 60);
        const secs = remaining % 60;
        const textElem = document.getElementById('expiryTimerText');
        if (textElem) {
            textElem.textContent = `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
            if (remaining <= 0) {
                textElem.textContent = 'Expired';
                textElem.classList.add('text-rose-600');
            }
        }
    }
    setInterval(updateExpiryTimer, 1000);
    updateExpiryTimer();

    // 3. Resend Cooldown Timer
    const resendBtn = document.getElementById('resendBtn');
    const resendBtnText = document.getElementById('resendBtnText');

    function updateResendCooldown() {
        const now = Math.floor(Date.now() / 1000);
        const remaining = Math.max(0, resendAvailableTimestamp - now);
        if (remaining > 0) {
            resendBtn.disabled = true;
            resendBtnText.textContent = `Resend Code (${remaining}s)`;
        } else {
            resendBtn.disabled = false;
            resendBtnText.textContent = 'Resend 4-Digit Code';
        }
    }
    setInterval(updateResendCooldown, 1000);
    updateResendCooldown();
});
</script>
@endpush
