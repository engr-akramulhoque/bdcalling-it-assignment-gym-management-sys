@extends('layouts.app')
@section('title')
    Edit role
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('roles.update', ['role' => $role]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Edit Role</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                            @error('name')
                                <span class="feedback text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <label>Permisions</label>
                            <div class="col-md-12">
                                @php
                                    $permissions = $permissions->chunk(5);
                                @endphp

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="list-group">
                                            <label>
                                                <input type="checkbox" class="check" id="checkAll"> Check All
                                            </label>
                                        </div>
                                    </div>
                                    @foreach ($permissions as $permission)
                                        <div class="col-md-4">
                                            @foreach ($permission as $perm)
                                                <div class="list-group">
                                                    <label class="list-group-item">
                                                        <input class="form-check-input me-1 check" type="checkbox"
                                                            name="permissions[]" value="{{ $perm }}"
                                                            @if ($role->hasPermissionTo($perm)) @checked(true) @endif>
                                                        {{ $perm }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                                @error('permissions')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- jquery Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Check All functionality
            $("#checkAll").click(function() {
                $(".check").prop('checked', $(this).prop('checked'));
            });
        });
    </script>
@endsection
