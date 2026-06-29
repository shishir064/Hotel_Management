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
            'subtotal' => 'required',
            'vat' => 'required',
            'payment_method' => 'required',
            'check_in' => 'required',
            'check_out' => 'required', 
        ]);
        // dd($validated);
        Bill::create(
            [
                'room_booking_id' => $request->bill_id,
                'user_id' => $request->user_id,
                'room_id' => $request->room_id,
                'total' => $request->total,
                'status' => $request->status,
                'sub_total' => $request->subtotal,
                'vat' => $request->vat,
                'payment_method' => $request->payment_method,
                'check_in_date' => $request->check_in,
                'check_out_date' => $request->check_out
            ]
        );
        Rooms::where('id', $request->room_id)
        ->update([
                'room_status' => 'available',
            ]);
        RoomBooking::where('id', $request->bill_id)
        ->update([
                'status' => 'confirmed',
        ]);
        return redirect()->route('booking.available')->with('success', 'Bill updated successfully');
    }
}
