<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    // all roles
    public function index()
    {
        $roles = Role::latest()->get(['id', 'name']);
        return view('app.roles.index', compact('roles'));
    }

    // create role
    public function create()
    {
        $permissions = Permission::orderBy('id', 'asc')->pluck('name');
        return view('app.roles.create', compact('permissions'));
    }

    // store role with permissions
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        try {
            // Create the role
            $role = Role::create([
                'name' => Str::lower($request->name),
            ]);

            // Sync permissions with the role
            $role->syncPermissions($request->permissions);

            // Redirect with success message
            notify()->success("Role created successfully", "Success", "topRight");
            return redirect()->route('roles.index');
        } catch (\Exception $e) {
            // Redirect back with error message
            notify()->error("Something went wrong", "Eror", "topRight");
            return back();
        }
    }

    // edit role
    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('id', 'asc')->pluck('name');
        return view('app.roles.edit', compact('role', 'permissions'));
    }

    // update role
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name' . $role->name,
        ]);

        try {
            $role->update([
                'name' => Str::lower($request->name),
            ]);
            $role->syncPermissions($request->permissions);

            notify()->success("Role updated successfully", "Success", "topRight");
            return redirect()->route('roles.index');
        } catch (\Exception $e) {
            notify()->error("Something went wrong", "Eror", "topRight");
            return back();
        }
    }

    // delete role
    public function destroy(Role $role)
    {
        if ($role->name == "administration") {
            notify()->warning("Administration role is protected", "Warning", "topRight");
            return redirect()->route('roles.index');
        }
        try {
            $role->delete();
            notify()->success("Role deleted successfully", "Success", "topRight");
            return redirect()->route('roles.index');
        } catch (\Exception $e) {
            notify()->error("Something went wrong", "Eror", "topRight");
            return back();
        }
    }
}
