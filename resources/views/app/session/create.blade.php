@extends('layouts.app')
@section('title')
    Create Session
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('class.store') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4>Create Session</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Class Title</label>
                            <input type="text" class="form-control" name="title">
                            @error('title')
                                <span class="feedback text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Trainer</label>
                            <select name="trainer_id" id="trainer_id" class="form-control">
                                @foreach ($trainers as $trainer)
                                    <option value="{{ $trainer->trainer->id }}">
                                        {{ $trainer->firstname . ' ' . $trainer->lastname }}
                                    </option>
                                @endforeach
                            </select>
                            @error('trainer_id')
                                <span class="feedback text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date" min="{{ date('Y-m-d') }}">
                            @error('date')
                                <span class="feedback text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Time</label>
                                    <input type="time" class="form-control" name="start_time" id="start_time">
                                    <span class="feedback text-danger" id="start_time_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Time</label>
                                    <input type="time" class="form-control" name="end_time" id="end_time">
                                    <span class="feedback text-danger" id="end_time_error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tranee Capacity</label>
                            <input type="number" class="form-control" name="capacity">
                            @error('capacity')
                                <span class="feedback text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById('end_time').addEventListener('change', function() {
            const startTime = document.getElementById('start_time').value;
            const endTime = this.value;
            const startTimeError = document.getElementById('start_time_error');
            const endTimeError = document.getElementById('end_time_error');
            const trainerId = document.getElementById('trainer_id').value;
            const date = document.querySelector('input[name="date"]').value;

            // Reset error messages
            startTimeError.textContent = '';
            endTimeError.textContent = '';

            // Validate the times
            if (startTime && endTime && startTime >= endTime) {
                startTimeError.textContent = 'Start time cannot be after or equal to the end time';
                endTimeError.textContent = 'End time must be after the start time';
            } else {
                // Perform an AJAX request to check if this time range is available
                $.ajax({
                    url: "{{ route('class.check_availability') }}", // Define a route for checking availability
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        trainer_id: trainerId,
                        date: date,
                        start_time: startTime,
                        end_time: endTime
                    },
                    success: function(response) {
                        if (!response.available) {
                            endTimeError.textContent =
                                'This time slot is already taken. Please choose a different time.';
                        }
                    }
                });
            }
        });
    </script>
@endsection
