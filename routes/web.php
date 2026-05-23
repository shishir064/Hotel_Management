<?php

use App\Http\Controllers\AdminController;
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
Route::controller(AuthController::class)->group(function () {
    
    Route::get('/login/user', 'showLoginForm')
    ->name('login.form');
    
    Route::post('/login/user','login')
    ->name('login');
    
    Route::get('/register/user','create')
    ->name('register.form');

    Route::post('/register/user','store')
    ->name('register');
    
    Route::post('/logout','logout')
    ->name('logout');
});


//dashboard routes

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::post('/list-hotel', [AdminController::class, 'addHotel'])->name('list_hotel')->middleware('auth');
Route::get('/add-rooms', [AdminController::class, 'showRoomsForm'])->name('add_rooms');


