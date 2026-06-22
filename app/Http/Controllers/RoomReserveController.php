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
        $room = Rooms::findorfail($id);
        return view('pages.hotelbook', compact('room', 'userEmail', 'userName'));
    }

    public function store(Request $request , Rooms $room)
    {
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

        $user = Auth::user();
        $user -> updated(
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
            'status' => 'confirmed',
        ]);

        return redirect()->route('show.hotel');
    }
}
