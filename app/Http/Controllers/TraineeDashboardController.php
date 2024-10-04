<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TraineeDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $data = Booking::where('user_id', $request->user()->id)
            ->select(
                DB::raw("COUNT(CASE WHEN status = 'pending' THEN 1 END) as totalUpcomingBookings"),
                DB::raw("COUNT(CASE WHEN status = 'complete' THEN 1 END) as totalCompleteBookings"),
                DB::raw("COUNT(CASE WHEN status = 'expired' THEN 1 END) as totalExpireBookings")
            )
            ->first();

        return view('frontend.dashboard', [
            'data' => $data,
        ]);
    }
}
