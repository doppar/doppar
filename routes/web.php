<?php

/*
|--------------------------------------------------------------------------
| Loading application web routes
|--------------------------------------------------------------------------
*/

use Phaseolies\Support\Facades\Route;

Route::get("/", fn() => view('welcome'))->name("home");
