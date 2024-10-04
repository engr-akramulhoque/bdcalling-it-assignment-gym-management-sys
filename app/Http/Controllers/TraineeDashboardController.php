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
                DB::raw("COUNT(CASE WHEN status = 'Pending' THEN 1 END) as totalUpcomingBookings"),
                DB::raw("COUNT(CASE WHEN status = 'Completed' THEN 1 END) as totalCompleteBookings"),
                DB::raw("COUNT(CASE WHEN status = 'Expired' THEN 1 END) as totalExpireBookings")
            )
            ->first();

        return view('frontend.dashboard', [
            'data' => $data,
        ]);
    }
}
