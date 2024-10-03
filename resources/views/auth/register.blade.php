@extends('layouts.guest')

@section('content')
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="card card-primary">
            <!-- Session Status -->
            @if (session()->has('status'))
                <div class="alert alert-success m-2">
                    <div>{{ session()->get('status') }}</div>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger m-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-header">
                <h4>Registration</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- firstname -->
                        <div class="form-group col-6">
                            <label for="firstname">First Name</label>
                            <input id="firstname" type="text" class="form-control" name="firstname" tabindex="1"
                                value="{{ old('firstname') }}" autofocus>
                        </div>
                        <!-- lastname -->
                        <div class="form-group col-6">
                            <label for="lastname">Last Name</label>
                            <input id="lastname" type="text" class="form-control" name="lastname" tabindex="1"
                                value="{{ old('lastname') }}" autofocus>
                        </div>
                    </div>

                    <!-- email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" tabindex="1"
                            value="{{ old('email') }}" autofocus>
                    </div>

                    <!-- Role -->
                    <div class="form-group">
                        <label for="role">Choese Role</label>
                        <select id="role" class="form-control" name="role" tabindex="1">
                            <option value="">Select Role</option>
                            <option value="trainee">trainee</option>
                            @foreach ($roles as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- dob -->
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input id="dob" type="date" class="form-control" name="dob" tabindex="1"
                            value="{{ old('dob') }}" autofocus>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    </div>

                    <!-- Password comfirmation-->
                    <div class="form-group">
                        <label for="password_confirmation" class="control-label">Confirm Password</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                            tabindex="2" required>
                    </div>

                    <!-- Terms Conditions -->
                    <input id="acceptTerms-2" name="terms_conditions" type="checkbox">
                    <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                    @error('terms_conditions')
                        <span class="feedback text-danger">
                            {{ $message }}
                        </span>
                    @enderror

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Submit
                        </button>
                    </div>
                </form>
                <div class="text-muted text-center">
                    Already have an account? <a href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </div>
    </div>
@endsection
