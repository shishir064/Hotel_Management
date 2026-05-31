<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomAmenitiesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/hotel/feed', function () {
    return view('pages.index');
})->name('hotel.check');
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


    Route::get('/dashboard', 'dashboard')
        ->name('dashboard');

    Route::post('/login/user', 'login')
        ->name('login');

    Route::get('/register/user', 'create')
        ->name('register.form');

    Route::post('/register/user', 'store')
        ->name('register');

    Route::post('/logout', 'logout')
        ->name('logout');
});


//dashboard routes

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/add-rooms', [DashboardController::class, 'showRoomsForm'])->name('add_rooms');
Route::get('/add-category', [DashboardController::class, 'showCategoryForm'])->name('add_category');
Route::delete('/delete/{id}', [DashboardController::class, 'delete'])->name('delete');
Route::post('/category', [DashboardController::class, 'Category'])->name('category');


Route::get('/add-room-amenities', [RoomAmenitiesController::class, 'index'])->name('add_room_amenities');
Route::post('/add-room-amenities', [RoomAmenitiesController::class, 'store'])->name('store_room_amenities');
Route::delete('/delete/{id}', [RoomAmenitiesController::class, 'delete'])->name('delete');

Route::get('/add_hotel', [HotelController::class, 'index'])->name('add_hotel');
Route::post('/add_hotel', [HotelController::class, 'store'])->name('store_hotel');
