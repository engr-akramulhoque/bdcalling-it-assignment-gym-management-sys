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
            <div class="card-header">
                <h4>Forgot Password</h4>
            </div>
            <div class="card-body">
                <p class="text-muted">We will send a link to reset your password</p>
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" tabindex="1"
                            value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Forgot Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-5 text-muted text-center">
            Remember password? <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
@endsection
