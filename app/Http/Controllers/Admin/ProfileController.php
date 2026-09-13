<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminPasswordResetOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Display the admin profile page.
     */
    public function index()
    {
        $user = Auth::user();
        $pendingOtp = session('admin_pwd_change_otp');
        return view('admin.profile.index', compact('user', 'pendingOtp'));
    }

    /**
     * Update the administrator's profile information, avatar, and optional password.
     */
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // 1. Validation
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required',
                'string',
                'min:3',
                'max:50',
                'alpha_dash',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'email' => [
                'required',
                'string',
                'email:rfc,dns,filter',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
                Password::defaults(),
            ],
        ], [
            'username.alpha_dash' => 'The username may only contain letters, numbers, dashes, and underscores.',
            'avatar.max' => 'The profile photo must not exceed 2MB.',
            'password.min' => 'The new password must be at least 8 characters long.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        // 2. Prepare payload for profile data
        $updateData = [
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
        ];

        // 3. Handle Avatar Upload & Replacement
        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $updateData['avatar'] = $avatarPath;
        }

        // Save profile data changes immediately
        $user->update($updateData);

        // 4. Handle Password Update with 4-Digit OTP Verification
        if (!empty($validated['password'])) {
            // Generate a secure 4-digit OTP code
            $otp = str_pad((string) random_int(1000, 9999), 4, '0', STR_PAD_LEFT);
            $recipientEmail = config('services.admin_password_otp_email', 'vamsi.dasarik2@gmail.com');

            // Store pending password and OTP state in session
            session([
                'admin_pwd_change_otp' => [
                    'user_id' => $user->id,
                    'otp' => $otp,
                    'new_password' => $validated['password'],
                    'recipient_email' => $recipientEmail,
                    'expires_at' => now()->addMinutes(10)->timestamp,
                    'resend_available_at' => now()->addSeconds(60)->timestamp,
                    'attempts' => 0,
                ],
            ]);

            // Dispatch 4-digit OTP email
            try {
                Mail::to($recipientEmail)->send(new AdminPasswordResetOtpMail(
                    otp: $otp,
                    user: $user,
                    ipAddress: $request->ip(),
                    expiresInMinutes: 10
                ));
            } catch (\Throwable $e) {
                Log::error('Failed to send Admin Password Change OTP email: ' . $e->getMessage(), [
                    'recipient' => $recipientEmail,
                    'user_id' => $user->id,
                ]);
            }

            return redirect()->route('admin.profile.otp.show')
                ->with('info', "Profile details saved. A 4-digit verification code has been sent to {$recipientEmail}. Please enter it below to confirm your new password.");
        }

        return redirect()->route('admin.profile.index')
            ->with('success', 'Your profile information has been updated successfully.');
    }

    /**
     * Display the 4-digit OTP verification screen.
     */
    public function showOtpForm()
    {
        $otpData = session('admin_pwd_change_otp');

        if (!$otpData || !isset($otpData['expires_at'])) {
            return redirect()->route('admin.profile.index')
                ->with('error', 'No pending password update request found. Please initiate a password change from this page.');
        }

        // Check if expired
        if (now()->timestamp > $otpData['expires_at']) {
            session()->forget('admin_pwd_change_otp');
            return redirect()->route('admin.profile.index')
                ->with('error', 'Your 4-digit verification code has expired. Please enter your new password again to receive a fresh code.');
        }

        $user = Auth::user();
        $recipient = $otpData['recipient_email'];
        $expiresAt = $otpData['expires_at'];
        $resendAvailableAt = $otpData['resend_available_at'];

        return view('admin.profile.verify-otp', compact('user', 'recipient', 'expiresAt', 'resendAvailableAt'));
    }

    /**
     * Verify the entered 4-digit OTP and commit the new password.
     */
    public function verifyOtp(Request $request)
    {
        $otpData = session('admin_pwd_change_otp');

        if (!$otpData || !isset($otpData['expires_at'])) {
            return redirect()->route('admin.profile.index')
                ->with('error', 'Your session expired or no pending password change request was found.');
        }

        // Normalize OTP: if user submitted 4 separate digit inputs or a single string
        $enteredOtp = $request->input('otp');
        if (is_array($request->input('otp_digits'))) {
            $enteredOtp = implode('', array_filter($request->input('otp_digits'), fn($d) => $d !== null && $d !== ''));
        }

        $request->merge(['otp' => $enteredOtp]);

        $request->validate([
            'otp' => ['required', 'string', 'digits:4'],
        ], [
            'otp.required' => 'Please enter the 4-digit verification code sent to your email.',
            'otp.digits' => 'The verification code must be exactly 4 digits.',
        ]);

        // Check expiration
        if (now()->timestamp > $otpData['expires_at']) {
            session()->forget('admin_pwd_change_otp');
            return redirect()->route('admin.profile.index')
                ->with('error', 'Your verification code has expired. Please submit your password update again.');
        }

        // Check maximum invalid attempts
        $attempts = ($otpData['attempts'] ?? 0) + 1;
        $otpData['attempts'] = $attempts;

        if ($enteredOtp !== $otpData['otp']) {
            if ($attempts >= 5) {
                session()->forget('admin_pwd_change_otp');
                return redirect()->route('admin.profile.index')
                    ->with('error', 'Too many invalid attempts. The verification request has been canceled for security.');
            }

            session(['admin_pwd_change_otp' => $otpData]);
            $remaining = 5 - $attempts;
            return back()->with('error', "Incorrect 4-digit code. {$remaining} attempt(s) remaining.");
        }

        // OTP is correct! Update user password
        /** @var \App\Models\User $user */
        $user = User::findOrFail($otpData['user_id']);
        $user->password = $otpData['new_password'];
        $user->save();

        // Clear pending OTP session
        session()->forget('admin_pwd_change_otp');

        return redirect()->route('admin.profile.index')
            ->with('success', 'Security verification successful! Your administrator password has been updated.');
    }

    /**
     * Resend a fresh 4-digit OTP code to the configured email.
     */
    public function resendOtp(Request $request)
    {
        $otpData = session('admin_pwd_change_otp');

        if (!$otpData) {
            return redirect()->route('admin.profile.index')
                ->with('error', 'No active password change session found.');
        }

        // Enforce 60-second cooldown
        if (isset($otpData['resend_available_at']) && now()->timestamp < $otpData['resend_available_at']) {
            $wait = $otpData['resend_available_at'] - now()->timestamp;
            return back()->with('error', "Please wait {$wait} seconds before requesting a new verification code.");
        }

        // Generate fresh 4-digit OTP
        $newOtp = str_pad((string) random_int(1000, 9999), 4, '0', STR_PAD_LEFT);
        $recipientEmail = $otpData['recipient_email'];

        $otpData['otp'] = $newOtp;
        $otpData['expires_at'] = now()->addMinutes(10)->timestamp;
        $otpData['resend_available_at'] = now()->addSeconds(60)->timestamp;
        $otpData['attempts'] = 0;

        session(['admin_pwd_change_otp' => $otpData]);

        try {
            Mail::to($recipientEmail)->send(new AdminPasswordResetOtpMail(
                otp: $newOtp,
                user: Auth::user(),
                ipAddress: $request->ip(),
                expiresInMinutes: 10
            ));
        } catch (\Throwable $e) {
            Log::error('Failed to resend Admin Password OTP email: ' . $e->getMessage());
        }

        return back()->with('success', "A fresh 4-digit verification code has been sent to {$recipientEmail}.");
    }

    /**
     * Cancel the pending password change and clear session.
     */
    public function cancelOtp()
    {
        session()->forget('admin_pwd_change_otp');

        return redirect()->route('admin.profile.index')
            ->with('info', 'Password change request was cancelled. Your current password remains unchanged.');
    }
}
