<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class UserBookingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $bookings = Booking::where('user_id', $request->user()->id)->paginate();

        return view('frontend.user_booking', [
            'bookings' => $bookings,
        ]);
    }
}
