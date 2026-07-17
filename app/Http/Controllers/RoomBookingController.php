<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use App\Models\RoomCategory;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class RoomBookingController extends Controller
{
    public function index()
    {

        $categories = RoomCategory::all();
        return view('pages.roomBooking', compact('categories'));
    }





    public function store(Request $request)
    {

        $validated = $request->validate([
            'guest_name'   => 'required|string|max:255',
            'room_id'      => 'required|exists:rooms,id',
            'email'        => 'required|email|unique:users,email',
            'phone'        => 'required',
            'address'      => 'required',
            'citizen_id'   => 'required|string|max:6',
            'booked_date'  => 'required|date',
            'check_in'     => 'required|date|after_or_equal:today',
            'check_out'    => 'required|date|after:check_in',
            'adults'       => 'required|integer|min:1',
            'children'     => 'nullable|integer|min:0',
        ]);
        $room = Rooms::findOrFail($validated['room_id']);

        $isBooked = RoomBooking::where('room_id', $room->id)
            ->whereNotIn('status', ['cancelled', 'checked_out']) // Ignore cancelled and completed bookings
            ->where(function ($query) use ($validated) {
                $query->where('check_in', '<', $validated['check_out'])
                    ->where('check_out', '>', $validated['check_in']);
            })
            ->exists();
        if ($isBooked) {
            return back()
                ->withInput()
                ->withErrors([
                    'room_id' => 'This room is already booked for the selected dates.'
                ]);
        }

        // Calculate total price
        $days = Carbon::parse($validated['check_in'])
            ->diffInDays(Carbon::parse($validated['check_out']));

        $pricePerDay = $room->room_price - (($room->room_price * $room->discount) / 100);
        $totalPrice = $days * $pricePerDay;

        // Create guest if not exists
        $user = User::firstOrCreate(
            ['email' => $validated['email']],
            [
                'name'        => $validated['guest_name'],
                'phone'       => $validated['phone'],
                'address'     => $validated['address'],
                'citizen_id'  => $validated['citizen_id'],
                'password'    => Hash::make($validated['email']),
            ]
        );

        // Assign guest role only if not already assigned
        if (!$user->hasRole('guest')) {
            $user->assignRole('guest');
        }

        // Create booking
        $booking = RoomBooking::create([
            'room_id'        => $room->id,
            'user_id'        => $user->id,
            'booked_date'    => $validated['booked_date'],
            'check_in'       => $validated['check_in'],
            'check_out'      => $validated['check_out'],
            'adults'         => $validated['adults'],
            'children'       => $validated['children'] ?? 0,
            'total_price'    => $totalPrice,
            'status'         => 'confirmed',
            'payment_status' => 'Pending',
        ]);

        // Update room status
        $room->update([
            'room_status' => 'reserved',
        ]);
        return redirect()
            ->route('rooms.booking')
            ->with('success', 'Room booked successfully.');
    }
}
