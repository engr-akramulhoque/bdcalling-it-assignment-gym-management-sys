<?php

namespace App\Http\Controllers;

use App\Models\ClassTime;
use Illuminate\Http\Request;

class ViewScheduleController extends Controller
{
    public function index(Request $request)
    {
        $schedules = ClassTime::where('trainer_id', $request->user()->trainer?->id)->latest()->get();
        return view('app.schedule.index', [
            'schedules' => $schedules
        ]);
    }

    public function edit(Request $request)
    {
        $schedules = ClassTime::where('trainer_id', $request->user()->trainer?->id)->latest()->get();
        return view('app.schedule.index', [
            'schedules' => $schedules
        ]);
    }

    public function updateStatus(Request $request)
    {
        $schedule = ClassTime::findOrFail($request->schedule_id);
        $schedule->status = $request->status;
        $schedule->save();

        return response()->json(['success' => true]);
    }
}
