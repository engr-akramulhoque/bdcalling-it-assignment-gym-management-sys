@extends('layouts.app')

@section('title')
    Edit Booking
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Booking</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('booking.update', ['booking' => $booking->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Booking ID (Read-only) -->
                        <div class="form-group">
                            <label for="book_id">Booking ID</label>
                            <input type="text" class="form-control" id="book_id" name="book_id"
                                value="{{ $booking->book_id }}" readonly>
                        </div>

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $booking->name) }}" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $booking->email) }}" required>
                        </div>

                        <!-- Phone -->
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                value="{{ old('phone_number', $booking->phone_number) }}" required>
                        </div>

                        <!-- Trainer -->
                        <div class="form-group">
                            <label for="trainer">Trainer</label>
                            <select class="form-control" id="trainer" name="trainer">
                                <option value="" selected disabled>Select Trainer</option>
                                @foreach ($trainers as $trainer)
                                    <option value="{{ $trainer->trainer->id }}"
                                        {{ $booking->trainer_id == $trainer->trainer->id ? 'selected' : '' }}>
                                        {{ $trainer->firstname . ' ' . $trainer->lastname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="Completed" {{ $booking->status == 'Completed' ? 'selected' : '' }}>Completed
                                </option>
                                <option value="Expired" {{ $booking->status == 'Expired' ? 'selected' : '' }}>Expired
                                </option>
                            </select>
                        </div>

                        <!-- Save Button -->
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="{{ route('booking.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
