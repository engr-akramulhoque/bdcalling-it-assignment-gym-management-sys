@extends('layouts.app')
@section('title')
    Bookings
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Bookings</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-2">
                            <thead>
                                <tr>
                                    <th class="text-center pt-3">
                                        <div class="custom-checkbox custom-checkbox-table custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                                class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Booking ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Trainer</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bookings as $booking)
                                    <tr>
                                        <td class="p-0 text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input" id="checkbox-2">
                                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>{{ $booking->book_id }}</td>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->phone_number }}</td>
                                        <td>{{ $booking->trainer?->user?->firstname . ' ' . $booking->trainer?->user?->lastname }}
                                        </td>
                                        <td>
                                            @if ($booking->status === 'Pending')
                                                <div class="badge badge-info">Pending</div>
                                            @elseif ($booking->status === 'Completed')
                                                <div class="badge badge-success">Completed</div>
                                            @else
                                                <div class="badge badge-danger">Expired</div>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-center" style="width: 10%;">
                                            @can('edit booking')
                                                <a href="{{ route('booking.edit', ['booking' => $booking]) }}"
                                                    class="btn btn-sm btn-primary p-2 m-1"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('delete booking')
                                                <form action="{{ route('booking.destroy', ['booking' => $booking]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger p-2 m-1"
                                                        onclick="return confirm('Are you sure to delete this role?')"><i
                                                            class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <div class="text-center text-danger">
                                        <h4>No data found</h4>
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
