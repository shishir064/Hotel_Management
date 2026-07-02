<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AvailableBookingController;
use App\Http\Controllers\AvailableRoomsController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\BookingHistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelFacilitiesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomAmenitiesController;
use App\Http\Controllers\RoomBookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomMainFacilitiesController;
use App\Http\Controllers\RoomReserveController;
use App\Http\Controllers\RoomServicesController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPrfileController;
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

    Route::post('/login/user', 'login')
        ->name('login');

    Route::get('/register/user', 'create')
        ->name('register.form');

    Route::post('/register/user', 'store')
        ->name('register');   

    Route::post('/logout', 'logout')
        ->name('logout');
});

//user list
Route::get('/user/list', [UserController::class, 'showUserList'])->name('user.list');
Route::get('/edit/user', [UserController::class, 'edit'])->name('edit.user.list');
// Route::get('/delete/user', [UserController::class, 'delete'])->name('delete.user.list');


//dashboard routes
Route::middleware('auth')->controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/add-category', 'showCategoryForm')->name('add_category');
    Route::delete('/delete/{id}/room_type', 'delete')->name('delete_room_type');
    Route::post('/category', 'Category')->name('category');
});

//rooms
Route::controller(RoomController::class)->group(function () {
    Route::get('/add-rooms', 'showRoomsForm')->name('show_rooms_form');
    Route::post('/add-rooms', 'storeRooms')->name('store_rooms');
    Route::get('/show/rooms/list', 'showRooms')->name('show_rooms');
    Route::get('/edit/room/{id}', 'edit')->name('rooms.edit');
    Route::put('/update/room/{id}', 'update')->name('update_rooms');
    Route::delete('/delete/room/{id}', 'delete')->name('delete_room');
    Route::get('/rooms', 'searchRooms')->name('search.rooms');
});

//Room Amenities
Route::controller(RoomAmenitiesController::class)->group(function () {
    Route::get('/add-room-amenities', 'index')->name('add_room_amenities');
    Route::post('/add-room-amenities', 'store')->name('store_room_amenities');
    Route::delete('/delete/amenities/{id}', 'delete')->name('delete');
});

//Room Main Facilities
Route::controller(RoomMainFacilitiesController::class)->group(function () {
    Route::get('/add-room-main-facilities', 'index')->name('add_room_main_facilities');
    Route::post('/add-room-main-facilities', 'store')->name('store_room_main_facilities');
    Route::delete('/delete/main-facilities/{id}', 'destroy')->name('delete_main_facilities');
});

//Room Bookings
Route::controller(RoomBookingController::class)->group(function () {
    Route::get('/rooms/booking/{id}', 'index')->name('rooms.booking');
    Route::post('/rooms/booking', 'store')->name('bookings.store');
    Route::delete('/delete/booking/{id}', 'delete')->name('delete');
});

// //users booking
// Route::get('/my-bookings/{booking}', [ReservationController::class, 'show'])
//     ->middleware('auth')
//     ->name('booking.show');

    // Route::get('/my-bookings', [ReservationController::class, 'myBookings'])
    //     ->name('booking.my');
Route::controller(ReservationController::class)->group(function () {
    Route::middleware('auth')->get('/my-bookings/{booking}', 'show')->name('booking.show');
    Route::get('/my-bookings', 'myBookings')->name('booking.my');
    Route::delete('/delete/booking/{id}', 'delete')->name('booking.cancel');
});

//Room Reserve
Route::controller(RoomReserveController::class)->group(function () {
    Route::get('/rooms/reserve/{id}', 'index')->name('rooms.reserve');
    Route::post('/rooms/reserve', 'store')->name('reserve.store');
    Route::delete('/delete/reserve/{id}', 'delete')->name('delete_reserve');
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
    Route::get('/hotel/profile', 'showHotelProflie')->name('show.hotel.profile');
    Route::get('/hotel/view/{id}', 'showHotelView')->name('hotel.view');
    Route::get('/hotel/image/{id}', 'hotelImage')->name('hotel.images.create');
    Route::post('/hotel/image/{id}', 'hotelImageStore')->name('hotel.images.store');
    Route::get('/hotel/availability/{id}', 'hotelAvailability')->name('hotel.availability');
    Route::post('/hotel', 'searchHotel')->name('search.hotel');
});

//Hotel Facilities
Route::get('/hotel/facilities', [HotelFacilitiesController::class, 'index'])->name('show.hotel.facilities');
Route::post('/hotel/facilities', [HotelFacilitiesController::class, 'store'])->name('store.hotel.facilities');
Route::delete('/hotel/facilities/delete/{id}', [HotelFacilitiesController::class, 'delete'])->name('delete.hotel.facilities');
Route::get('/hotel/facilities/select/show/{id}', [HotelFacilitiesController::class, 'selectFacilities'])->name('show.hotel.facilities.select');


//Role 
Route::controller(RoleController::class)->group(function () {
    Route::get('/add-role', 'index')->name('add_role');
    Route::post('/add-role', 'store')->name('store_role');
    Route::delete('/delete-role/{id}', 'delete')->name('delete_role');
});

//Profile
Route::middleware('auth')->controller(ProfileController::class)->group(function () {
    Route::get('/profile/{id}',  'index')->name('profile');
    Route::get('/profile/edit/{id}', 'edit')->name('edit.profile');
    Route::put('/profile/update/{id}', 'update')->name('profile.update');
});

//user profile
Route::middleware('auth')->controller(UserPrfileController::class)->group(function () {
    Route::get('/user/profile','index')->name('user.profile');
    Route::get('/user/profile/edit/{id}', 'edit')->name('edit.user.profile');
    Route::get('/user/profile/setting', 'showSetting')->name('user.security');
});
//setting 

Route::middleware('auth')->controller(SettingController::class)->group(function () {
    Route::get('/setting', 'edit')->name('edit.settings');
    Route::patch('/setting/profile', 'updateProfile')->name('settings.profile.update');
    Route::patch('/setting/password', 'updatePassword')->name('settings.password.update');
    Route::post('/logout', 'destory')->name('logout')->middleware('auth');
});

Route::controller(AvailableRoomsController::class)->group(function () {
    Route::get('/available/room', 'index')->name('room.available');
    Route::get('/available/room/{status?}', 'index')->name('room.available');
});

Route::controller(AvailableBookingController::class)->group(function () {
    Route::get('/available/booking', 'index')->name('booking.available');
});

Route::controller(BookingHistoryController::class)->group(function () {
    Route::get('/booking/history', 'index')->name('booking.history');
    Route::get('/booking/history/{id}', 'show')->name('show.invoice');

});

Route::controller(BillController::class)->group(function () {
    Route::get('/bill/{id}', 'index')->name('billing.show');
    Route::post('/bill', 'store')->name('bill.store');
});


// Room Services
Route::controller(RoomServicesController::class)->group(function () {
    Route::get('/add-room-services', 'index')->name('add_room_services');
    Route::post('/add-room-services', 'store')->name('store_room_services');
    Route::delete('/delete/room-services/{id}', 'destroy')->name('delete_service');
});



//About us
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about.us');