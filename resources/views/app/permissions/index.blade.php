@extends('layouts.app')
@section('title')
    Permissions
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Permissions</h4>
                    <div class="card-header-form">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="row m-2">
                        @php
                            $permissions = $permissions->chunk(5);
                        @endphp

                        @foreach ($permissions as $permission)
                            <div class="col-md-4 p-2">
                                @foreach ($permission as $perm)
                                    <div class="list-group">
                                        <label class="list-group-item">
                                            {{ $perm }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
