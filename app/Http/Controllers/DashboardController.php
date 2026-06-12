<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\RoomAmenity;
use App\Models\RoomCategory;
use App\Models\RoomMainFacility;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }


    public function showRoomsForm($id)
    {
        $categories = RoomCategory::all();
        $amenities = RoomAmenity::all();
        $main_facilities = RoomMainFacility::all();
        $hotel = Hotel::with('rooms')->findorfail($id);

        return view('pages.addroom', compact('categories', 'amenities', 'main_facilities', 'hotel'));
    }

    public function showRooms(){
        $rooms = Rooms::all();
        return view('pages.roomList', compact('rooms'));
    }
    public function storeRooms(Request $request)
    {
        $validated = $request->validate([
            'room_no' => 'required',
            'room_type' => 'required',
            'room_price' => 'required',
            'hotel_id' => 'required',

        ]);
        $validated['hotel_id'] = $request->hotel_id;
        // dd($validated);
        $room = Rooms::create($validated);
        $room->mainFacilities()->sync($request->room_main_facility ?? []);

        $room->amenities()->sync($request->room_Amenity ?? []);
        return redirect()->route('show_rooms_form', ['id' => $request->hotel_id])->with('success', 'Room added successfully');
    }

    public function showCategoryForm()
    {
        $categories = RoomCategory::all();
        return view('pages.addCategory', compact('categories'));
    }

    public function Category(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required',
        ]);
        $validated['user_id'] = Auth::id();
        RoomCategory::create($validated);
        return redirect()->route('add_category')->with('success', 'Category added successfully');
    }

    public function delete($id)
    {
        $category = RoomCategory::find($id);
        $category->delete();
        return redirect()->route('add_category')->with('success', 'Category deleted successfully');
    }
}
