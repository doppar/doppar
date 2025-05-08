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
})->middleware('throttle:60,1', 'auth-api');
