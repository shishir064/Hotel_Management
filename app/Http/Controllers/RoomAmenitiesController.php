<?php

namespace App\Http\Controllers;

use App\Models\RoomAmenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomAmenitiesController extends Controller
{
    public function index()
    {
        $amenities = RoomAmenity::all();
        return view('pages.addRoomAmenities', compact('amenities'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amenity_name' => 'required',
        ]);
        $validated['user_id'] = Auth::id();
        RoomAmenity::create($validated);
        return redirect()->route('add_room_amenities')->with('success', 'Amenity added successfully');
    }

    public function delete($id){
        $amenity = RoomAmenity::find($id);
        $amenity->delete();
        return redirect()->route('add_room_amenities')->with('success', 'Amenity deleted successfully');
    }
}
