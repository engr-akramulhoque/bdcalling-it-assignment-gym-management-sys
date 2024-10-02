@extends('layouts.app')
@section('title')
    Roles
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Roles</h4>
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
                                    <th>permissions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td class="text-center pt-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input" id="checkbox-1">
                                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>{{ $role->name }}</td>
                                        @php
                                            $permissions = $role->permissions->pluck('name');
                                        @endphp
                                        <td>
                                            @foreach ($permissions as $perm)
                                                <div class="badge badge-info m-1">{{ $perm }}</div>
                                            @endforeach
                                        </td>
                                        <td class="d-flex justify-center" style="width: 10%;">
                                            @can('edit role')
                                                <a href="{{ route('roles.edit', ['role' => $role]) }}"
                                                    class="btn btn-sm btn-primary p-2 m-1"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('delete role')
                                                <form action="{{ route('roles.destroy', ['role' => $role]) }}" method="POST">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
