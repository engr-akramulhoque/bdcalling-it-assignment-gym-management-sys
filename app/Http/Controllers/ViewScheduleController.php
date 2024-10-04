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

    public function edit($id)
    {
        $schedule = ClassTime::find($id);

        return view('app.schedule.edit', [
            'schedule' => $schedule
        ]);
    }

    public function update(Request $request, $id)
    {
        $schedule = ClassTime::findOrFail($id);

        $schedule->status = $request->status;
        $schedule->save();

        notify()->success('Schedule updated successfully', '', 'topRight');
        return to_route('schedule.index');
    }
}
