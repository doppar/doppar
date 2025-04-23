@extends('layouts.app')
@section('title') Dashboard
@section('content')
    <div class="card shadow-lg mb-4">
        <div class="card-header bg-white text-black fw-bold">
            <h5 class="fw-bold fs-5">Dashboard</h5>
        </div>
        <div class="card-body">
            <p class="fw-bold fs-5">
                You are logged in as
                <span class="text-success fw-bold">{{ Phaseolies\Support\Facades\Auth::user()->email }}</span>
            </p>
        </div>
    </div>
@endsection