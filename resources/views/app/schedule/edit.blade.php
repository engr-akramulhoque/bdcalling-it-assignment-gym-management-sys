@extends('layouts.app')

@section('title')
    Edit Schedule
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Schedule</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('schedule.update', $schedule->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Title -->
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title', $schedule->title) }}" readonly>
                        </div>

                        <!-- Date -->
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date"
                                value="{{ old('date', $schedule->date) }}" readonly>
                        </div>

                        <!-- Start Time -->
                        <div class="form-group">
                            <label for="start_time">Start Time</label>
                            <input type="time" class="form-control" id="start_time" name="start_time"
                                value="{{ old('start_time', $schedule->start_time) }}" readonly>
                        </div>

                        <!-- End Time -->
                        <div class="form-group">
                            <label for="end_time">End Time</label>
                            <input type="time" class="form-control" id="end_time" name="end_time"
                                value="{{ old('end_time', $schedule->end_time) }}" readonly>
                        </div>

                        <!-- Capacity -->
                        <div class="form-group">
                            <label for="capacity">Capacity</label>
                            <input type="number" class="form-control" id="capacity" name="capacity"
                                value="{{ old('capacity', $schedule->capacity) }}" readonly>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Active" {{ old('status', $schedule->status) == 'Active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="Inactive"
                                    {{ old('status', $schedule->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="Completed"
                                    {{ old('status', $schedule->status) == 'Completed' ? 'selected' : '' }}>Completed
                                </option>
                            </select>
                        </div>

                        <!-- Save Button -->
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="{{ route('schedule.index') }}" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
