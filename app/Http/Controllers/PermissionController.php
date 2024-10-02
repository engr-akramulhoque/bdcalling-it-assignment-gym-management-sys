<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    // all permissions
    public function index()
    {
        $permissions = Permission::orderBy('id', 'asc')->pluck('name');
        return view('app.permissions.index', compact('permissions'));
    }
}
