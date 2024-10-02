<form action="{{ route('password.update') }}" method="post" class="needs-validation mt-3">
    @csrf
    @method('PUT')
    <div class="card-header">
        <h4>Update Password</h4>
    </div>
    <div class="card-body">
        <p class="mt-1 text-sm">
            Ensure your account is using a long, random password to stay secure.
        </p>
        <div class="form-group">
            <label>Current Password</label>
            <input type="password" class="form-control" name="current_password">
            @error('current_password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation">
            @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="card-footer text-right">
        <button class="btn btn-primary">Save Changes</button>
    </div>
</form>
