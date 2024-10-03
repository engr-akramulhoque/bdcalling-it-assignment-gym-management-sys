<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Models\ClassTime;
use App\Models\Trainer;
use App\Models\User;

class HandleClassTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = ClassTime::query()->latest()->get();
        return view('app.session.index', [
            'sessions' => $sessions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trainers = User::role('trainer')->get(['id', 'firstname', 'lastname']);

        return view('app.session.create', [
            'trainers' => $trainers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSessionRequest $request)
    {
        ClassTime::create($request->validated());

        notify()->success('Session has been created successfully.', 'topRight');
        return to_route('class.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassTime $classTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $session = ClassTime::find($id);
        $trainers = User::role('trainer')->get();

        return view('app.session.edit', [
            'session' => $session,
            'trainers' => $trainers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSessionRequest $request, $id)
    {
        $classTime = ClassTime::find($id)->update($request->validated());

        if ($classTime) {
            notify()->success('Session has been updated successfully.', 'topRight');
            return to_route('class.index');
        }
        notify()->error('Unable to update this record', 'topRight');
        return to_route('class.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $classTime = ClassTime::find($id)->delete();
        if ($classTime) {
            notify()->success('Session has been deleted successfully.', 'topRight');
            return to_route('class.index');
        }
        notify()->error('Unable to delete', 'topRight');
        return to_route('class.index');
    }
}
