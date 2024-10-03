<?php

use App\Http\Controllers\CheckAvailableSessionTimeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware(['auth', 'trainee'])->group(function () {
    // customer dashboard route
    Route::get('user/dashboard', function () {
        return view('frontend.dashboard');
    })->name('trainee.dashboard');
});

Route::post('/class/check-availability', CheckAvailableSessionTimeController::class)->name('class.check_availability');
