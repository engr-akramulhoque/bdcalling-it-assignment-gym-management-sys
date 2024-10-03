<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\ClassTime;
use Illuminate\Http\Request;

class PlaceOrderController extends Controller
{
    public function checkout($id)
    {
        $session = ClassTime::find($id);

        return view('frontend.checkout', [
            'session' => $session,
        ]);
    }


    public function placeOrder(StoreBookingRequest $request)
    {
        return $request->all();
        Booking::create($request->validated());

        // Redirect to a success page
        return redirect()->route('thank-you');
    }
}
