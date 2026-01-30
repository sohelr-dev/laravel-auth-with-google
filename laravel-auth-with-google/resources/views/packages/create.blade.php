@extends('layouts.auth')
@extends('layouts.nav')
@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">Create Tour Package</div>
        <div class="card-body">
            <form action="{{ route('packages.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Submit for Approval</button>
            </form>
        </div>
    </div>
</div>
@endsection
