<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\RoomBooking;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RoomBookingController extends Controller
{
    public function index(Rooms $room)
    {
        return view('pages.roomBooking', compact('room'));
    }

    public function store(Request $request, Rooms $room)
    {
        $validated = $request->validate([
            'guest_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
        ]);

        // Check room availability
        $exists = RoomBooking::where('room_id', $room->id)
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($validated) {
                $query->whereBetween('check_in', [
                    $validated['check_in'],
                    $validated['check_out']
                ])->orWhereBetween('check_out', [
                    $validated['check_in'],
                    $validated['check_out']
                ]);
            })->exists();

        if ($exists) {
            return back()->with('error', 'Room is not available for selected dates.');
        }

        $days = Carbon::parse($validated['check_in'])->diffInDays(Carbon::parse($validated['check_out']));

        $totalPrice = $days * $room->room_price;
        
        $guest = Guest::create([
            'name' => $validated['guest_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ]);

        $validated['guest_id'] = $guest->id;

        RoomBooking::create([
            'room_id' => $room->id,
            'guest_id' => $guest->id,
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'adults' => $validated['adults'],
            'children' => $validated['children'] ?? 0,
            'total_price' => $totalPrice,
            'status' => 'confirmed',
        ]);



        return redirect()->route('rooms.booking')->with('success', 'Room booked successfully.');
    }
}
