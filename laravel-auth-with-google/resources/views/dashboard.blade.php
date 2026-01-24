@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-end">
                <a class="btn btn-primary" href="{{ route('profile') }}">
                    My Profile
                </a>
            </div>
        </div>
        <div class="row justify-content-center align-items-center" style="min-height: 70vh;">
            <div class="col-md-8 text-center">

                @if (session('status'))
                    <div class="alert alert-success mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <h1 class="text-primary fw-bold">
                    Welcome to the Dashboard
                </h1>

                <p class="text-muted fs-5">
                    You have successfully logged in using OAuth 2.0!
                </p>

            </div>
        </div>
    </div>

@endsection
