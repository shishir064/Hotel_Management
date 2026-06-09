<?php

namespace App\Http\Controllers;

use App\Models\RoomMainFacility;
use Illuminate\Http\Request;

class RoomMainFacilitiesController extends Controller
{
    public function index()
    {
        $main_facilities = RoomMainFacility::latest()->paginate(6);
        return view('pages.RoomMainFacilities', compact('main_facilities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);
        RoomMainFacility::create($validated);
        return redirect()->route('add_room_main_facilities')->with('success', 'Facility added successfully');
    }

    public function destroy($id)
    {
        $facility = RoomMainFacility::find($id);
        $facility->delete();
        return redirect()->back()->with('success', 'Facility deleted successfully');
    }
}
