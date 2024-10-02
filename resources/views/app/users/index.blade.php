@extends('layouts.app')
@section('title')
    Users
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Users</h4>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>image</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="p-0 text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input" id="checkbox-2">
                                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <img alt="image" src="{{ asset('static/assets/img/users/user-1.png') }}"
                                                class="rounded-circle" width="35" data-toggle="tooltip"
                                                title="Nur Alpiana">
                                        </td>
                                        @php
                                            $roles = $user->getRoleNames();
                                        @endphp
                                        <td>
                                            @foreach ($roles as $role)
                                                <div class="badge badge-info m-1">{{ $role }}</div>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if ($user->status == true)
                                                <div class="badge badge-success">Active</div>
                                            @else
                                                <div class="badge badge-danger">Inactive</div>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-center" style="width: 10%;">
                                            @can('edit user')
                                                <a href="{{ route('users.edit', ['user' => $user]) }}"
                                                    class="btn btn-sm btn-primary p-2 m-1"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('delete user')
                                                <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST">
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
