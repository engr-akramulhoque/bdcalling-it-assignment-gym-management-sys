<?php

namespace App\Http\Controllers;

use App\Models\ClassTime;
use Illuminate\Http\Request;

class CheckAvailableSessionTimeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'trainer_id' => 'required|exists:trainers,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        // Check for overlapping session in ClassTime
        $overlappingSession = ClassTime::where('trainer_id', $request->trainer_id)
            ->where('date', $request->date)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('start_time', '<=', $request->start_time)
                            ->where('end_time', '>=', $request->end_time);
                    });
            })
            ->exists();

        return response()->json(['available' => !$overlappingSession]);
    }
}
