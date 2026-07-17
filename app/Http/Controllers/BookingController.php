<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

  public function index(Request $request)
{

    
    $status = $request->status;
    $paymentStatus = $request->payment_status;

    $bookings = RoomBooking::query();

    if ($status) {
        $bookings->where('status', $status);
    }

    if ($paymentStatus) {
        $bookings->where('payment_status', $paymentStatus);
    }

    $bookings = $bookings->get();

    return view('booking.index', compact(
        'bookings',
        'status',
        'paymentStatus'
    ));
}

    public function confirm(RoomBooking $booking)
    {
        $booking->update([
            'status' => 'confirmed',
        ]);

        return back()->with('success', 'Booking confirmed successfully.');
    }
    public function checkIn(RoomBooking $booking)
    {
        $booking->update([
            'status' => 'checked_in',
            'payment_statues' => 'Pending',
        ]);

        $booking->room->update([
            'room_status' => 'occupied',
        ]);

        return back()->with('success', 'Guest checked in successfully.');
    }

    public function checkOut(RoomBooking $booking)
    {
        
        $booking->update([
            'status' => 'checked_out',
        ]);

        $booking->room->update([
            'room_status' => 'available',
        ]);

        return redirect()->route('bookings.index')->with('success', 'Guest checked out successfully.');
    }

    public function cancel(RoomBooking $booking)
    {
        $booking->update([
            'status' => 'cancelled',
        ]);

        return back()->with('success', 'Booking cancelled successfully.');
    }
}
