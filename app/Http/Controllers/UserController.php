<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // get users
    public function index()
    {
        $users = User::where('status', true)->latest()->get();
        return view('app.users.index', compact('users'));
    }

    // create a new user
    public function create()
    {
        $roles = Role::orderBy('name', 'asc')->pluck('name');
        return view('app.users.create', compact('roles'));
    }

    // store a new user
    public function store(UserRegisterRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                // create user
                $user = User::create(array_merge($request->validated(), ['status' => true]));

                // assing userinfo instance
                UserInfo::create([
                    "user_id" => $user->id,
                    "dob" => $request->dob,
                ]);
                // assign role
                $user->assignRole($request->role);
            });
            notify()->success("User created successfully", "Success", "topRight");
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            notify()->error("Something went wrong", "Error", "topRight");
            return back();
        }
    }

    // edit user
    public function edit(User $user)
    {
        $roles = Role::orderBy('name', 'asc')->pluck('name');
        return view('app.users.edit', compact('user', 'roles'));
    }

    // update user
    public function update(UserUpdateRequest $request, User $user)
    {
        if ($user->is_superadmin == true) {
            notify()->warning("Sorry, this user cannot be edited", "Warning", "topRight");
            return redirect()->route('users.index');
        }
        try {
            DB::transaction(function () use ($request, $user) {
                // update user
                $user->update($request->validated());
                // remove previous role and assign new role
                $user->syncRoles($request->role);
            });
            notify()->success("User updated successfully", "Success", "topRight");
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            notify()->error("Something went wrong", "Error", "topRight");
            return back();
        }
    }

    // delete user
    public function destroy(User $user)
    {
        if ($user->is_superadmin == true) {
            notify()->error("You can't delete this user", "Error", "topRight");
            return back();
        }

        try {
            $user->delete();
            notify()->success("User deleted successfully", "Success", "topRight");
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            notify()->error("Something went wrong", "Error", "topRight");
            return back();
        }
    }
}
