<?php

/*
|--------------------------------------------------------------------------
| Loading application api routes
|--------------------------------------------------------------------------
*/

use Phaseolies\Support\Facades\Route;
use Phaseolies\Http\Request;

Route::get('user', function (Request $request) {
    return $request->user();
})->middleware('auth-api');
