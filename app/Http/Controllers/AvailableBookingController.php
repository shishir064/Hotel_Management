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
        $bookings = RoomBooking::where('status', 'pending')
            ->whereIn('room_id', $roomIds)
            ->latest()
            ->get();

        // dd($bookings);

        return view('pages.booking', compact('bookings'));
    }

    public function delete($id)
    {
        $booking = RoomBooking::findorfail($id);
        $booking->delete();
        return redirect()->route('booking.available')->with('success', 'Booking deleted successfully');
    }
}
