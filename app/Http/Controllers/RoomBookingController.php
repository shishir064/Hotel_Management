<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class RoomBookingController extends Controller
{
    public function index($id)
    {
        $room = Rooms::findorfail($id);
        return view('pages.roomBooking', compact('room'));
    }





    public function store(Request $request)
    {
        // dd(auth()->id());
        // dd($request->all());
        $room = Rooms::findorfail($request->room_id);
        $validated = $request->validate([
            'guest_name' => 'required|string|max:255',
            'room_id' => 'required|exists:rooms,id',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'citizen_id' => 'required|string|max:6',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
        ]);
        // dd($validated);
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
        $roomPrice = $room->room_price;
        // dd($roomPrice);
        $roomDiscount = $room->discount;
        $roomDiscountAmount = $roomDiscount / 100 * $roomPrice;
        $totalPrice = $days * $roomPrice - $roomDiscountAmount;

        $user = User::firstOrCreate(
            ['email' => $validated['email']],
            [
                'name' => $validated['guest_name'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'citizen_id' => $validated['citizen_id'],
                'password' => Hash::make($validated['email']),
            ]
        );
        $check = $validated['user_id'] = $user->id;
        $user->assignRole('guest');
        // dd($totalPrice);
       $booking = RoomBooking::create([
            'room_id' => $validated['room_id'],
            'user_id' => $check,
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'adults' => $validated['adults'],
            'children' => $validated['children'] ?? 0,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);
        Rooms::where('id', $request->room_id)
            ->update([
                'room_status' => 'pending',
            ]);



        return redirect()->route('show_rooms')->with('success', 'Room booked successfully.');
    }
}
