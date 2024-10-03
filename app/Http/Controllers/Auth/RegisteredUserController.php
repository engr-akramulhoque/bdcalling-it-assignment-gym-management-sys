<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterNewUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles = Role::where('guard_name', 'web')->get();
        return view('auth.register', [
            'roles' => $roles,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterNewUserRequest $request): RedirectResponse
    {

        // Initialize user variable outside of transaction for scope
        $user = null;

        // Use database transaction to ensure atomic operation
        DB::transaction(function () use ($request, &$user) {
            // Create user
            $user = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'terms_conditions' => $request->terms_conditions,
                'is_trainee' => $request->role === 'trainee' ? true : false,
                'is_superadmin' => false,
            ]);

            // Assign role if not a trainee
            if ($request->role !== 'trainee') {
                $user->assignRole($request->role);
            }

            // Create associated trainer profile (adjust if applicable)
            $user->trainer()->create([
                'dob' => $request->dob
            ]);
        });

        // Fire Registered event and log the user in
        event(new Registered($user));
        Auth::login($user);

        if (!$request->user()->is_trainee) {
            return redirect()->intended(route('dashboard', absolute: false));
        }
        return redirect()->intended(route('trainee.dashboard', absolute: false));
    }
}
