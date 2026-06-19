<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingApiController extends Controller
{
    // public function index(Request $request)
    // {
    //     // $selectedRoom = null;

    //     // if ($request->filled('room_id')) {
    //     //     $selectedRoom = Rooms::findOrFail($request->room_id);
    //     // }

    //     // $rooms = Rooms::where('room_status', 'available')->get();

    //     return view('pages.roomBooking');
    // }
    public function index()
    {
        return view('pages.roomBooking');
    }

    public function show()
    {
        $hotel = Auth::user()->hotels;
        $rooms = Rooms::where('hotel_id', $hotel->id)->where('room_status', 'available')->with('roomCategory')->get();
        // $rooms = Rooms::where('room_status', 'available')
        //     ->with('roomCategory')
        //     ->get();

        return response()->json($rooms);
    }

    
}
