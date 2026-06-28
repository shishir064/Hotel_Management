<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\RoomBooking;
use App\Models\Rooms;
use App\Models\RoomServices;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index($id)
    {
        $bill = RoomBooking::findorfail($id);
        $services = RoomServices::all();
        return view('pages.bill', compact('bill', 'services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bill_id' => 'required',
            'user_id' => 'required',
            'room_id' => 'required',
            'total' => 'required',
            'status' => 'required',
            'payment_method' => 'required',
        ]);
        Bill::create(
            [
                'user_id' => $request->user_id,
                'room_id' => $request->room_id,
                'total' => $request->total,
                'status' => $request->status,
                'payment_method' => $request->payment_method,
            ]
        );
        $roomBooking = RoomBooking::findorfail($request->bill_id);
        $roomBooking->delete();
        Rooms::where('id', $request->room_id)
            ->update([
                'room_status' => 'available',
            ]);
        return redirect()->route('booking.available')->with('success', 'Bill updated successfully');
    }
}
