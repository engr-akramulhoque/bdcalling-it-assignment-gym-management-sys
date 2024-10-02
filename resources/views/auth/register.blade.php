@extends('layouts.guest')

@section('content')
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="text-center">
            <div class="card pt-3">
                <a href="{{ route('home') }}" class="card-title btn"><img src="{{ asset('static/assets/img/logo.png') }}"
                        alt="">
                    <Span class="font-24 p-3 mt-4 text-center">AREIA STORE</Span></a>
            </div>
        </div>

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
                {{-- <div class="text-center mt-4 mb-3">
                <div class="text-job text-muted">Login With Social</div>
            </div>
            <div class="row sm-gutters">
                <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                        <span class="fab fa-facebook"></span> Facebook
                    </a>
                </div>
                <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                        <span class="fab fa-twitter"></span> Twitter
                    </a>
                </div>
            </div> --}}
            </div>
        </div>
        <div class="mt-5 text-muted text-center">
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
@endsection
