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
                <h4>Login</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST" novalidate="">
                    @csrf
                    <!-- email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" tabindex="1"
                            value="{{ old('email') }}" autofocus>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Password</label>
                            @if (Route::has('password.request'))
                                <div class="float-right">
                                    <a href="{{ route('password.request') }}" class="text-small">
                                        Forgot Password?
                                    </a>
                                </div>
                            @endif
                        </div>
                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>

                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                id="remember-me">
                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Login
                        </button>
                    </div>
                </form>
                <div class="text-muted text-center">
                    Don't have an account? <a href="{{ route('register') }}">Create One</a>
                </div>
            </div>
        </div>
    </div>
@endsection
