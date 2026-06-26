<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Support\Facades\Auth;

class AvailableRoomsController extends Controller
{
    public function index($status = null)
    {
        $hotel = Auth::user()->hotels;
        $rooms = Rooms::where('hotel_id', $hotel->id)->with('roomCategory');
        $query = $rooms;

    if ($status) {
        $query->where('room_status', $status);
    }

    $rooms = $query->get();
        return view('pages.availableBooking', compact('rooms', 'status'));
    }
}
