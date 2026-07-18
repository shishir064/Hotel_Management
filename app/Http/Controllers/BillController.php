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
        $room_booking = RoomBooking::all();
        return view('pages.bill', compact('bill', 'services', 'room_booking'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bill_id' => 'required',
            'user_id' => 'required',
            'room_id' => 'required',
            'total' => 'required',
            'vat' => 'required',
            'payment_method' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
        ]);
        Bill::create(
            [
                'booking_id' => $request->bill_id,
                'user_id' => $request->user_id,
                'room_id' => $request->room_id,
                'total' => $request->total,
                'status' => $request->status,
                'sub_total' => $request->subtotal,
                'vat' => $request->vat,
                'items' => json_encode($request->items),
                'payment_method' => $request->payment_method,
                'check_in_date' => $request->check_in,
                'check_out_date' => $request->check_out
            ]
        );

        Bill::where('id', $request->bill_id)
            ->update([
                'status' => 'Paid',
            ]);
        Rooms::where('id', $request->room_id)
            ->update([
                'room_status' => 'available',
            ]);

        RoomBooking::where('room_id', $request->room_id)
            ->latest('id')
            ->first()
            ?->update([
                'payment_status' => 'Paid',
            ]);

        return redirect()->route('bookings.index')->with('success', 'Bill updated successfully');
    }

    public function userstore(Request $request)
    {
    $validated = $request->validate([
            'bill_id' => 'required',
            'user_id' => 'required',
            'room_id' => 'required',
            'total' => 'required',
            'vat' => 'required',
            'payment_method' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'status' => 'required',
        ]);

        Bill::create(
        [
            'booking_id' => $request->bill_id,
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'total' => $request->total,
            'status' => 'Paid',
            'vat' => $request->vat,
            'payment_method' => $request->payment_method,
            'check_in_date' => $request->check_in,
            'check_out_date' => $request->check_out
            
        ]);
        Rooms::where('id', $request->room_id)
            ->update([
                'room_status' => 'available',
            ]);

        RoomBooking::where('room_id', $request->room_id)
            ->latest('id')
            ->first()
            ?->update([
                'status' => 'Checked_out',
                'payment_status' => 'Paid',
            ]);

        return redirect()->route('booking.my')->with('success', 'Payment done successfully');

    }



    public function cancle($id){
        $bill = roomBooking::findorfail($id);
        $bill->delete();
        return redirect()->route('booking.my')->with('success', 'Bill deleted successfully');
    }
}
