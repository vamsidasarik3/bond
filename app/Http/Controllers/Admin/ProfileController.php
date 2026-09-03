<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        return view('admin.profile.index', compact('user'));
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

        // 2. Prepare payload
        $updateData = [
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
        ];

        // 3. Handle Avatar Upload & Replacement
        if ($request->hasFile('avatar')) {
            // Remove previous avatar file from storage if it exists
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Store new avatar securely
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $updateData['avatar'] = $avatarPath;
        }

        // 4. Handle Password Update (Only if provided)
        if (!empty($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
        }

        // 5. Save updates to the authenticated admin record
        $user->update($updateData);

        return redirect()->route('admin.profile.index')
            ->with('success', 'Your profile information has been updated successfully.');
    }
}
