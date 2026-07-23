<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\RoomBooking;
use App\Models\RoomServices;
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



    public function show($id)
    {
        $booking = RoomBooking::findOrFail($id);
        
        if ($booking->user_id != Auth::id()) {
            abort(403);
        }
        
        $bill = Bill::with([
            'user',
            'room.hotel',
        ])->findOrFail($id);

        $services = RoomServices::whereIn('id', json_decode($bill->items, true) ?: [])->get();


        return view('pages.billsec', compact('bill', 'services'));
    }


    public function delete(RoomBooking $booking)
    {
        $booking->delete();
        return redirect()->route('booking.my')->with('message', 'Booking Cancelled Successfully');
    }
}
