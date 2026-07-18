<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Assign;

class RoomReserveController extends Controller
{
    public function index($id)
    {
        $userEmail =  Auth::user()->email;
        $userName =  Auth::user()->name;
        $userPhone =  Auth::user()->phone;
        $userCitizenId =  Auth::user()->citizen_id;
        $userAddress =  Auth::user()->address;
        $room = Rooms::findorfail($id);
        return view('pages.hotelbook', compact('room', 'userEmail', 'userName', 'userPhone', 'userCitizenId', 'userAddress'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_name' => 'required|string|max:255',
            'room_id' => 'required|exists:rooms,id',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'citizen_id' => 'required|string|max:6',
            'booked_date' => 'required',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
        ]);


        // Check room availability
        $exists = RoomBooking::where('room_id', $validated['room_id'])
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

        $days = Carbon::parse($validated['check_in'])
            ->diffInDays(Carbon::parse($validated['check_out']));
        $room = Rooms::findorfail($validated['room_id']);
        $roomPrice = $room->room_price;
        $discountPercent = $room->discount;

        $discountAmount = ($roomPrice * $discountPercent) / 100;
        $discountedPrice = $roomPrice - $discountAmount;

        $totalPrice = $days * $discountedPrice;


        $user = Auth::user();
        $user->update(
            [
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'citizen_id' => $validated['citizen_id'],
            ]
        );


        $user->assignRole('guest');

        RoomBooking::create([
            'room_id' => $validated['room_id'],
            'user_id' => $user->id,
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'adults' => $validated['adults'],
            'children' => $validated['children'] ?? 0,
            'total_price' => $totalPrice,
            'status' => 'pending',
            'payment_status' => 'Pending',
        ]);

        return redirect()->route('booking.my')->with('success', 'Room reserved successfully');
    }
}
