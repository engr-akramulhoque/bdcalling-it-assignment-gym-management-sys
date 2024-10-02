@extends('layouts.app')
@section('title')
    Edit user
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', ['user' => $user]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h5>Account Information</h5>
                        <fieldset>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Select Role*</label>
                                    <select class="form-control" name="role">
                                        <option value="">Select a Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}"
                                                @if ($user->hasRole($role)) selected @endif>{{ $role }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span class="feedback text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Email*</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="example@example.com" value="{{ $user->email }}">
                                    @error('email')
                                        <span class="feedback text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <h5>Profile Information</h5>
                        <fieldset>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">First Name*</label>
                                    <input type="text" name="firstname" class="form-control" placeholder="Jon"
                                        value="{{ $user->firstname }}">
                                    @error('firstname')
                                        <span class="feedback text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Last Name*</label>
                                    <input type="text" name="lastname" class="form-control" placeholder="Doe"
                                        value="{{ $user->lastname }}">
                                    @error('lastname')
                                        <span class="feedback text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Address*</label>
                                    <textarea name="address" cols="30" rows="3" class="form-control no-resize">{{ $user->address }}</textarea>
                                    @error('address')
                                        <span class="feedback text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Age*</label>
                                    <input type="number" name="age" class="form-control" value="{{ $user->age }}">
                                    @error('age')
                                        <span class="feedback text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="help-info">The warning step will show up if age is less than 18</div>
                            </div>
                        </fieldset>
                        <h5>Profile Image</h5>
                        <fieldset>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Profile Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <span class="feedback text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
