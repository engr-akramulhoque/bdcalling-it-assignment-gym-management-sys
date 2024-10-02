<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware(['auth', 'verified'])->group(function () {
    // customer dashboard route
    Route::get('user/dashboard', function () {
        return view('frontend.dashboard');
    })->name('user.dashboard')->middleware('customer');
});
