@extends('layouts.app')
@section('title') Login
@section('content')
    <div class="card-header bg-white border-bottom-0 text-center mt-5">
        <h5 class="fw-bold fs-5">Login</h5>
    </div>
    <div class="card mx-auto mt-5" style="max-width: 400px;">
        <div class="card-body">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" value="">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-secondary w-100">Sign in</button>
            </form>
            <div class="text-center mt-3">
                Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Register.</a>
            </div>
        </div>
    </div>
@endsection