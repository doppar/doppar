<?php

/*
|--------------------------------------------------------------------------
| Loading application web routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\TestController;
use Phaseolies\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', fn() => view('welcome'))->name('home');

Route::get('test', [TestController::class, 'index']);

Route::get('home', [HomeController::class, 'home'])->name('dashboard')->middleware('auth');
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});
