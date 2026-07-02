<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use Illuminate\Support\Facades\Auth;


class ReservationController extends Controller
{
    public function myBookings()
{
    $bookings = RoomBooking::with([
        'room.hotel',
        'room.roomCategory'
    ])
    ->where('user_id', Auth::id())
    ->latest()
    ->paginate(10);

    return view('pages.usersBooking', compact('bookings'));
}

public function show(RoomBooking $booking)
{
    if ($booking->user_id != Auth::id()) {
        abort(403);
    }

    $booking->load([
        'room.hotel',
        'room.roomCategory'
    ]);

    return view('booking.show', compact('booking'));
}

public function delete(RoomBooking $booking)
{
    $booking->delete();
    return redirect()->route('booking.my')->with('message', 'Booking Cancelled Successfully');
}
}