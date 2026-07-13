<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\RoomBooking;
use App\Models\RoomServices;
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
    $bill = Bill::with(['user', 'room.hotel'])->findOrFail($id);

    $serviceIds = json_decode($bill->items, true);

    $services = RoomServices::whereIn('id', $serviceIds)->get();

    return view('pages.billsec', compact('bill', 'services'));
}
}
