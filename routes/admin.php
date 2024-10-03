<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HandleClassTimeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    // admin dashboard route
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // User Profile routes
    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('',  'edit')->name('edit');
        Route::patch('',  'update')->name('update');
        Route::delete('',  'destroy')->name('destroy');
    });

    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index')->middleware('permission:view permission');

    // Role management routes
    Route::middleware('permission:roles')->name('roles.')->group(function () {
        Route::resource('roles', RoleController::class)->only(['index'])
            ->names(['index' => 'index']);

        Route::middleware('permission:create role')->group(function () {
            Route::resource('roles', RoleController::class)->only(['create', 'store'])
                ->names(['create' => 'create', 'store' => 'store']);
        });

        Route::middleware('permission:edit role')->group(function () {
            Route::resource('roles', RoleController::class)->only(['edit', 'update'])
                ->names(['edit' => 'edit', 'update' => 'update']);
        });

        Route::middleware('permission:delete role')->group(function () {
            Route::resource('roles', RoleController::class)->only(['destroy'])
                ->names(['destroy' => 'destroy']);
        });
    });

    // user management routes
    Route::middleware('permission:users')->name('users.')->group(function () {
        Route::resource('users', UserController::class)->only(['index'])
            ->names(['index' => 'index']);

        Route::middleware('permission:create user')->group(function () {
            Route::resource('users', UserController::class)->only(['create', 'store'])
                ->names(['create' => 'create', 'store' => 'store']);
        });

        Route::middleware('permission:edit user')->group(function () {
            Route::resource('users', UserController::class)->only(['edit', 'update'])
                ->names(['edit' => 'edit', 'update' => 'update']);
        });

        Route::middleware('permission:delete user')->group(function () {
            Route::resource('users', UserController::class)->only(['destroy'])
                ->names(['destroy' => 'destroy']);
        });
    });

    // class management routes
    Route::middleware('permission:classes')->name('class.')->group(function () {
        Route::resource('classes', HandleClassTimeController::class)->only(['index'])
            ->names(['index' => 'index']);

        Route::middleware('permission:create user')->group(function () {
            Route::resource('classes', HandleClassTimeController::class)->only(['create', 'store'])
                ->names(['create' => 'create', 'store' => 'store']);
        });

        Route::middleware('permission:edit user')->group(function () {
            Route::resource('classes', HandleClassTimeController::class)->only(['edit', 'update'])
                ->names(['edit' => 'edit', 'update' => 'update']);
        });

        Route::middleware('permission:delete user')->group(function () {
            Route::resource('classes', HandleClassTimeController::class)->only(['destroy'])
                ->names(['destroy' => 'destroy']);
        });
    });
});
