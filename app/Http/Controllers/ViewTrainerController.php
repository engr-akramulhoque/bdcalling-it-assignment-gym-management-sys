<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ViewTrainerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $users = User::role('trainer')->where('is_trainee', false)->latest()->get();
        return view('app.trainer.index', compact('users'));
    }
}
