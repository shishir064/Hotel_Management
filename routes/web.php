<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelFacilitiesController;
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
Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/add-rooms', 'showRoomsForm')->name('add_rooms');
    Route::get('/add-category', 'showCategoryForm')->name('add_category');
    Route::delete('/delete/{id}', 'delete')->name('delete');
    Route::post('/category', 'Category')->name('category');
});

//Room Amenities
Route::controller(RoomAmenitiesController::class)->group(function () {
    Route::get('/add-room-amenities', 'index')->name('add_room_amenities');
    Route::post('/add-room-amenities', 'store')->name('store_room_amenities');
    Route::delete('/delete/{id}', 'delete')->name('delete');
});

//Hotel
Route::controller(HotelController::class)->group(function () {
    Route::get('/add_hotel', 'index')->name('add_hotel');
    Route::post('/add_hotel', 'store')->name('store_hotel');
    Route::get('/hotel/edit/{id}', 'edit')->name('edit_hotel');
    Route::put('/hotel/update/{id}', 'update')->name('update.hotel');
    Route::delete('/hotel/delete/{id}', 'delete')->name('hotel.delete');
    Route::get('/list/hotel', 'showHotelList')->name('show.hotel.list');
    Route::get('/hotel', 'showHotel')->name('show.hotel');
    Route::get('/hotel/profile/{id}', 'showHotelProflie')->name('show.hotel.profile');
    Route::get('/hotel/image/{id}', 'hotelImage')->name('hotel.images.create');
    Route::post('/hotel/image/{id}', 'hotelImageStore')->name('hotel.images.store');
    Route::get('/hotel/availability/{id}', 'hotelAvailability')->name('hotel.availability');
    Route::post('/hotel', 'searchHotel')->name('search.hotel');
});

Route::get('/hotel/facilities', [HotelFacilitiesController::class, 'index'])->name('show.hotel.facilities');
Route::post('/hotel/facilities', [HotelFacilitiesController::class, 'store'])->name('store.hotel.facilities');
Route::delete('/hotel/facilities/delete/{id}', [HotelFacilitiesController::class, 'delete'])->name('delete.hotel.facilities');
Route::get('/hotel/facilities/select/show/{id}', [HotelFacilitiesController::class, 'selectFacilities'])->name('show.hotel.facilities.select');

