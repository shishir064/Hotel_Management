<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvailableBookingController extends Controller
{
    public function index()
{
    $hotel = Auth::user()->hotels;

    $roomIds = Rooms::where('hotel_id', $hotel->id)->pluck('id');
    $bookings = RoomBooking::whereIn('room_id', $roomIds)->get();

    // dd($bookings);

    return view('pages.booking', compact('bookings'));
}
}
