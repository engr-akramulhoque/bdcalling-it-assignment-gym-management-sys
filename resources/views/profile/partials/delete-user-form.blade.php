<form action="{{ route('profile.destroy') }}" method="post" class="needs-validation mt-3">
    @csrf
    @method('DELETE')
    <div class="card-header">
        <h4 class="text-danger">Delete Account</h4>
    </div>
    <div class="card-body">
        <p class="mt-1 text-sm">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting
            your
            account, please download any data or information that you wish to retain.
        </p>


        <div class="form-group">
            <label>Enter your password</label>
            <input type="password" class="form-control" name="password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <p class="mt-1 text-danger">
            <Strong>Warning: </Strong> Once your account is deleted, all of its resources and data will be permanently
            deleted. Please enter your
            password to confirm you would like to permanently delete your account.
        </p>
    </div>
    <div class="card-footer text-right">
        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account?')">Delete
            account</button>
    </div>
</form>
