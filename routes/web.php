<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/rooms', function () {
    return view('pages.rooms');
})->name('rooms');

Route::get('/hotelview', function () {
    return view('pages.hotelview');
})->name('hotelview');

Route::get('/hotelbook', function () {
    return view('pages.hotelbook');
})->name('hotelbook');

//auth routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login.form');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login');

Route::get('/register', [AuthController::class, 'create'])
    ->name('register.form');
Route::post('/register', [AuthController::class, 'store'])
    ->name('register');