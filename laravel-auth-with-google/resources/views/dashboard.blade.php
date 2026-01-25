@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-end d-flex justify-content-end gap-2 py-3">
                <a class="btn btn-primary" href="{{ route('profile') }}">
                    My Profile
                </a>
                <a class="btn btn-danger" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
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
                    Welcome  to {{$user->name }} Dashboard
                </h1>

                <p class="text-muted fs-5">
                    You have successfully logged in using OAuth 2.0!
                </p>

            </div>
        </div>
    </div>
@endsection
