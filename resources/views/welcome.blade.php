@extends('layouts.app')
@section('title') Welcome
@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 65vh;">
        <div class="content text-center">
            <p style="font-weight: 700; font-size:20px">{{ trans('messages.welcome', ['version' => \Phaseolies\Application::VERSION]) }}</p>
            <div class="buttons">
                <a href="https://github.com/techmahedy/doppar" class="btn btn-light" style="background: #D3D4D5">Github</a>
                <a href="https://github.com/techmahedy/doppar" class="btn btn-light"
                    style="background: #D3D4D5">Documentation</a>
            </div>
        </div>
    </div>
@endsection