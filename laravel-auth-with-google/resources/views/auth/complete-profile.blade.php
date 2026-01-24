@extends('layouts.auth')

@section('content')
<div class="auth-card text-center">
    <div class="mb-3">
        <span class="badge bg-primary-subtle text-primary p-2">Almost There!</span>
    </div>
    <h4 class="fw-bold">Finish Setting Up</h4>
    <p class="text-muted">Please provide your phone number to continue.</p>

    <form action="{{ url('complete-profile') }}" method="POST" class="text-start">
        @csrf
        <div class="mb-4">
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-control form-control-lg" required autofocus>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Save and Continue</button>
    </form>
</div>
@endsection