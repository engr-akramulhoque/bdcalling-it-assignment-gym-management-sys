<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\ClassTime;

class PlaceOrderController extends Controller
{
    public function checkout($id)
    {
        $session = ClassTime::find($id);

        return view('frontend.checkout', [
            'session' => $session,
        ]);
    }


    public function placeOrder(StoreBookingRequest $request, $id)
    {
        $selectedSession = ClassTime::find($id);

        // Check if the session is already booked
        $isAlreadyBooked = Booking::where('class_time_id', $selectedSession->id)->exists();

        if ($isAlreadyBooked) {
            // If the session is already booked, redirect with an error message
            return redirect()->back()->with('error', 'This session has already been booked. Please select another session.');
        }

        // Generate a unique booking ID
        $book_id = uniqid("ORD");

        // Create the booking
        $session = Booking::create($request->validated() + ['book_id' => $book_id]);

        return view('frontend.thank-you', [
            'session' => $session,
        ]);
    }
}
