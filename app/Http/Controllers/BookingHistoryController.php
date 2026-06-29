<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\RoomBooking;
use Illuminate\Http\Request;

class BookingHistoryController extends Controller
{
    public function index()
    {

        $bookings = RoomBooking::latest()->get();
        return view('pages.bookingHistory', compact('bookings'));
    }

    public function show($id)
    {
        $bill_id = $id;
        $bill = Bill::where('room_booking_id', $bill_id)->first();
        
        return view('pages.billsec', compact('bill'));
    }
}
