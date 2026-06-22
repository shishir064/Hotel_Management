<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookingApiController;

Route::middleware(['auth','web'])->get('/bookings', [BookingApiController::class, 'index'])->name('booking.index');
Route::middleware(['auth','web'])->get('/store', [BookingApiController::class, 'show'])->name('api.booking.index');