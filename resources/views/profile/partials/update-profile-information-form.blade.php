<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form action="{{ route('profile.update') }}" method="post" class="needs-validation">
    @csrf
    @method('PATCH')
    <div class="card-header">
        <h4>Edit Profile</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-6 col-12">
                <label>First Name</label>
                <input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}">
                @error('firstname')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-6 col-12">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
                @error('lastname')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-7 col-12">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            Your email address is unverified.

                            <button form="send-verification"
                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                Click here to re-send the verification email.
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                A new verification link has been sent to your email address.
                            </p>
                        @endif
                    </div>
                @endif
            </div>
            <div class="form-group col-md-5 col-12">
                <label>Phone</label>
                <input type="tel" class="form-control" name="phone" value="{{ $user->trainer?->phone }}">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label>Date of Birth</label>
                <input type="date" class="form-control" name="dob" value="{{ $user->trainer?->dob }}">
                @error('dob')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label>Bio</label>
                <textarea class="form-control summernote-simple" name="bio">{{ $user->trainer?->bio }}</textarea>
                @error('bio')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label>Expirtise</label>
                <textarea class="form-control summernote-simple" name="expertise">{{ $user->trainer?->expertise }}</textarea>
                @error('expertise')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button class="btn btn-primary">Save Changes</button>
    </div>
</form>
