<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed', 'min:8'],
        ]);

        $currentPassword = $request->user()->password;
        $newPassword = $validated['password'];

        if (Hash::check($newPassword, $currentPassword)) {
            notify()->error("Your enter the same password.", "Error", "topRight");
            return back();
        }


        $request->user()->update([
            'password' => Hash::make($newPassword),
        ]);

        notify()->success("Password has been updated", "Success", "topRight");
        return back()->with('status', 'password-updated');
    }
}
