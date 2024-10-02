@extends('layouts.guest')

@section('content')
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="card card-primary">
            <!-- Session Status -->
            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success m-2">
                    <div>A new verification link has been sent to the email address you provided during
                        registration.</div>
                </div>
            @endif
            <div class="card-header">
                <h4>Verify your email</h4>
            </div>
            <div class="card-body">

                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    <p>
                        Thanks for signing up! Before getting started, could you verify your email address by clicking on
                        the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.
                    </p>
                </div>

                <div class="mt-4 d-flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <button type="submit" class="btn btn-primary">
                                Resend Verification Email
                            </button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="btn btn-danger mx-2">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
