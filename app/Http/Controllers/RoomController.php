<?php

namespace App\Http\Controllers;


use App\Models\RoomAmenity;
use App\Models\RoomCategory;
use App\Models\RoomMainFacility;
use App\Models\Rooms;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function showRoomsForm()
    {
        $categories = RoomCategory::all();
        $amenities = RoomAmenity::all();
        $main_facilities = RoomMainFacility::all();
        // $hotel = Hotel::with('rooms')->findorfail();

        return view('pages.addroom', compact('categories', 'amenities', 'main_facilities'));
    }

    public function storeRooms(Request $request)
    {
        $hotel_id = auth()->user()->hotels->id;
        $validated = $request->validate([
            'room_no' => 'required',
            'room_type' => 'required',
            'room_price' => 'required',
            'capacity' => 'required',

        ]);
        // dd($validated);
        $room = Rooms::create([
            'hotel_id' => $hotel_id,
            'room_no' => $validated['room_no'],
            'room_type' => $validated['room_type'],
            'room_price' => $validated['room_price'],
            'capacity' => $validated['capacity'],
        ]);
        $room->mainFacilities()->sync($request->room_main_facility ?? []);

        $room->amenities()->sync($request->room_Amenity ?? []);
        return redirect()->route('show_rooms_form')->with('success', 'Room added successfully');
    }
    public function showRooms()
    {
        $rooms = Rooms::query();
        if (auth()->user()->hasRole('admin')) {
            $rooms = Rooms::where('hotel_id', auth()->user()->hotels?->id)->get();
        } else {
            $rooms = Rooms::all();
            
        }
        return view('pages.roomList', compact('rooms'));
    }

    public function edit($id)
    {
        $room = Rooms::findorfail($id);
        $categories = RoomCategory::all();
    //  dd($categories->toArray());
        return view('pages.editRoom', compact('room', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'room_no' => 'required',
            'room_type' => 'required',
            'room_price' => 'required',
            'discount' => 'required',
            'capacity' => 'required',
        ]);
        $room = Rooms::findorfail($id);
        $room->update([
            'room_no' => $validated['room_no'],
            'room_type' => $validated['room_type'],
            'room_price' => $validated['room_price'],
            'discount' => $validated['discount'],
            'capacity' => $validated['capacity'],
        ]);
        return redirect()->route('rooms.edit', $room->id)->with('success', 'Room updated successfully');
    }

    public function delete($id)
    {
        $room = Rooms::findorfail($id);
        $room->delete();
        return redirect()->route('show_rooms')->with('success', 'Room deleted successfully');
    }

    public function searchRooms(Request $request)
    {
        $search = $request->search;
        $rooms = Rooms::where('room_no', 'like', '%' . $search . '%')->get();
        return view('pages.roomList', compact('rooms'));
    }
}
