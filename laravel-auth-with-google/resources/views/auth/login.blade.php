@extends('layouts.auth')

@section('content')
    <div class="auth-card">
        <h3 class="text-center fw-bold mb-4">Sign In</h3>

        <a href="{{ url('auth/google') }}" class="btn btn-google w-100 py-2 mb-3">
            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" width="20" class="me-2">
            Continue with Google
        </a>

        <div class="divider text-muted small">OR</div>

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Login</button>
        </form>

        <p class="text-center mt-4 mb-0">Don't have an account? <a href="{{ url('/register') }}"
                class="text-decoration-none">Create Account</a></p>
    </div>
@endsection
