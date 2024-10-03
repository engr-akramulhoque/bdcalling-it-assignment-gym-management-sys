<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ViewTraineeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $users = User::where('status', true)->where('is_trainee', true)->latest()->get();
        return view('app.trainee.index', compact('users'));
    }
}
