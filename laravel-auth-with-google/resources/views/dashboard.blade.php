@extends('layouts.auth')
@extends('layouts.nav')

@section('content')

<div class="container">
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
            <h3>Role : {{ $user->role }}</h3>
    
            <p class="text-muted fs-5">
                You have successfully logged in using OAuth 2.0!
            </p>
    
        </div>
    </div>

</div>
    </div>
    </div>
@endsection
