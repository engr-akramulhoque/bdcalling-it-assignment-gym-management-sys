@extends('layouts.app')

@section('title')
    My Schedules
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>My Schedules</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                    <th scope="col">Capacity</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($schedules as $index => $schedule)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $schedule->title }}</td>
                                        <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d M, Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}</td>
                                        <td>{{ $schedule->capacity }}</td>
                                        <td class="text-warning">{{ $schedule->status }}</td>
                                        <td>
                                            <!-- Button to trigger modal -->
                                            <a href="{{ route('schedule.edit', $schedule->id) }}"
                                                class="btn btn-sm btn-info">
                                                Edit Status
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No schedules available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
