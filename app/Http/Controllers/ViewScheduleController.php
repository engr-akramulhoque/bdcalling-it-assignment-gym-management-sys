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
}
