@extends('layouts.auth')

@section('content')
<div class="auth-card">
    <h3 class="text-center fw-bold mb-4">Create Account</h3>

    <form action="{{ url('/register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-control" placeholder="+123456789">
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Confirm</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success w-100 py-2 fw-bold text-white">Register</button>
    </form>

    <p class="text-center mt-4 mb-0">Already have an account? <a href="{{ url('/login') }}" class="text-decoration-none">Log In</a></p>
</div>
@endsection