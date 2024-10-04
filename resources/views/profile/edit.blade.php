@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('content')
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-4">
            <div class="card author-box">
                <div class="card-body">
                    <div class="author-box-center">
                        <img alt="image" src="{{ asset('static/assets/img/users/user-1.png') }}"
                            class="rounded-circle author-box-picture">
                        <div class="clearfix"></div>
                        <div class="author-box-name">
                            <a href="{{ route('profile.edit') }}">{{ $user->firstname }}
                                {{ $user->lastname }}</a>
                        </div>
                        @php
                            $roles = $user->roles->pluck('name');
                        @endphp
                        <div class="author-box-job">
                            @foreach ($roles as $role)
                                {{ $role }}
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="author-box-description">
                            <p>
                                {{ $user->trainer?->bio }}
                            </p>
                        </div>
                        <div class="mb-2 mt-3">
                            <div class="text-small font-weight-bold">Follow Hasan On</div>
                        </div>
                        <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon mr-1 btn-github">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <div class="w-100 d-sm-none"></div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Personal Details</h4>
                </div>
                <div class="card-body">
                    <div class="py-4">
                        <p class="clearfix">
                            <span class="float-left">
                                Birthday
                            </span>
                            <span class="float-right text-muted">
                                {{ $user->trainer?->dob }}
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Phone
                            </span>
                            <span class="float-right text-muted">
                                {{ $user->trainer?->phone }}
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Mail
                            </span>
                            <span class="float-right text-muted">
                                {{ $user->email }}
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Facebook
                            </span>
                            <span class="float-right text-muted">
                                <a href="#">John Deo</a>
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Twitter
                            </span>
                            <span class="float-right text-muted">
                                <a href="#">@johndeo</a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-8">
            <div class="card">
                <!-- Session status -->
                <div class="card mb-2">
                    @if ($errors->any())
                        <div class="alert alert-danger m-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                                aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                                aria-selected="false">Setting</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                        <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="row">
                                <div class="col-md-3 col-6 b-r">
                                    <strong>Full Name</strong>
                                    <br>
                                    <p class="text-muted">{{ $user->firstname }} {{ $user->lastname }}
                                    </p>
                                </div>
                                <div class="col-md-3 col-6 b-r">
                                    <strong>Mobile</strong>
                                    <br>
                                    <p class="text-muted">{{ $user->trainer?->phone }}</p>
                                </div>
                                <div class="col-md-3 col-6 b-r">
                                    <strong>Email</strong>
                                    <br>
                                    <p class="text-muted">{{ $user->email }}</p>
                                </div>
                                <div class="col-md-3 col-6">
                                    <strong>Location</strong>
                                    <br>
                                    <p class="text-muted">{{ $user->address }}</p>
                                </div>
                            </div>

                            <div class="section-title">Education</div>
                            <ul>
                                <li>B.A.,Gujarat University, Ahmedabad,India.</li>
                                <li>M.A.,Gujarat University, Ahmedabad, India.</li>
                                <li>P.H.D., Shaurashtra University, Rajkot</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                            <!---- update-profile-information-form ------->
                            @include('profile.partials.update-profile-information-form')

                            <hr>

                            <!---- update-password ------->
                            @include('profile.partials.update-password-form')

                            <hr>

                            <!---- Delete account ------->
                            @if (auth()->user()->is_superadmin == false)
                                @include('profile.partials.delete-user-form')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
