<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvailableBookingController extends Controller
{

public function index(Request $request)
{
    $hotel = Auth::user()->hotels;

    $roomIds = Rooms::where('hotel_id', $hotel->id)->pluck('id');

    $status = $request->query('status');

    $bookings = RoomBooking::whereIn('room_id', $roomIds)
        ->when($status, function ($query) use ($status) {
            $query->where('status', $status); // or booking_status
        })
        ->latest()
        ->get();

    $pageTitle = $status
        ? ucfirst(str_replace('_', ' ', $status)) . ' Bookings'
        : 'All Bookings';

    return view('pages.admin.bookings.index', compact(
        'bookings',
        'status',
        'pageTitle'
    ));
}

    public function delete($id)
    {
        $booking = RoomBooking::findorfail($id);
        $booking->delete();
        return redirect()->route('booking.available')->with('success', 'Booking deleted successfully');
    }
}
