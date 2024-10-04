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
                                        <td class="text-warning">{{ ucfirst($schedule->status) }}</td>
                                        <td>
                                            <!-- Button to trigger the modal -->
                                            <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                data-target="#statusModal" data-id="{{ $schedule->id }}"
                                                data-status="{{ $schedule->status }}">
                                                Change Status
                                            </button>
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

    <!-- Bootstrap Modal for Status Update -->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Update Schedule Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="statusForm">
                        @csrf
                        <input type="hidden" name="schedule_id" id="schedule_id">
                        <div class="form-group">
                            <label for="status">Select Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Capture the button click event to open the modal with schedule details
        $('#statusModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var scheduleId = button.data('id'); // Extract schedule ID from the button's data attribute
            var currentStatus = button.data('status'); // Extract the current status

            // Update the modal's form with the schedule data
            var modal = $(this);
            modal.find('#schedule_id').val(scheduleId);
            modal.find('#status').val(currentStatus);
        });

        // Handle form submission with AJAX
        $('#statusForm').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: "{{ route('schedules.updateStatus') }}", // Replace with your route for updating status
                method: 'POST',
                data: formData,
                success: function(response) {
                    // Hide the modal after a successful update
                    $('#statusModal').modal('hide');

                    // Optionally, reload the page or update the status in the table
                    location.reload(); // Reload the page to reflect the changes
                },
                error: function(xhr) {
                    alert('An error occurred. Please try again.');
                }
            });
        });
    </script>
@endsection
