<?php

use App\Http\Controllers\CheckAvailableSessionTimeController;
use App\Http\Controllers\PlaceOrderController;
use App\Http\Controllers\TraineeDashboardController;
use App\Http\Controllers\UserBookingController;
use App\Models\ClassTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $now = Carbon::now();
    $classes = ClassTime::where(function ($query) use ($now) {
        // Compare for today: only get future times today
        $query->where('date', '=', $now->toDateString())
            ->where('start_time', '>', $now->toTimeString());
    })->orWhere(function ($query) use ($now) {
        $query->where('date', '>', $now->toDateString());
    })
        ->latest()
        ->get();

    return view('welcome', [
        'classes' => $classes,
    ]);
})->name('home');


Route::middleware(['auth', 'trainee'])->group(function () {
    // customer dashboard route
    Route::get('user/dashboard', TraineeDashboardController::class)->name('trainee.dashboard');

    Route::get('user/my-bookings', UserBookingController::class)->name('dashboard.bookings');

    Route::get('/user/checkout/{id}', [PlaceOrderController::class, 'checkout'])->name('session.checkout');
    Route::post('user/place-order/{id}', [PlaceOrderController::class, 'placeOrder'])->name('checkout.process');
});

Route::post('/class/check-availability', CheckAvailableSessionTimeController::class)->name('class.check_availability');
