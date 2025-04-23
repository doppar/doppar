@extends('layouts.app')
@section('title') Register
@section('content')
    <div class="card-header bg-white border-bottom-0 text-center mt-5">
        <h5 class="fw-bold fs-5">Register</h5>
    </div>
    <div class="card mx-auto mt-5" style="max-width: 400px;">
        <div class="card-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password">
                </div>
                <button type="submit" class="btn btn-secondary w-100">Register</button>
            </form>
            <div class="text-center mt-3">
                Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">Login.</a>
            </div>
        </div>
    </div>
@endsection