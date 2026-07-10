<?php

namespace App\Http\Controllers;


use App\Models\Hotel;
use App\Models\HotelFacility;
use Illuminate\Http\Request;

class HotelFacilitiesController extends Controller
{

    public function index()
    {
        $facilities = HotelFacility::latest()->get();
        return view('pages.hotelFacilities', compact('facilities'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        HotelFacility::create([
            'name' => $request->name,
        ]);
        return redirect()->route('show.hotel.facilities')->with('success', 'Facility added successfully');
        // $request->validate([
        //     'hotel_id' => 'required|exists:hotels,id',
        //     'facilities' => 'required|array'
        // ]);

        // $hotel = Hotel::findOrFail($request->hotel_id);
        // //  dd($request->all());
        // $hotel->facilities()->sync($request->facilities);

        // return redirect()->route('show.hotel.profile', $hotel->id)->with('success', 'Facilities saved successfully');
    }


    public function store(Request $request)
    {
       $validated = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'facilities' => 'required|array'
        ]);
        $hotel = Hotel::findOrFail($request->hotel_id);
        //  dd($request->all());
        $hotel->facilities()->sync($request->facilities);
        return redirect()->back()->with('success', 'Facility added successfully');
    }
    public function delete($id)
    {
        $facility = HotelFacility::find($id);
        $facility->delete();
        return redirect()->back()->with('success', 'Facility deleted successfully');
    }

    public function selectFacilities($id)
    {
        $hotel = Hotel::findOrFail($id);
        $facilities = HotelFacility::latest()->get();
        return view('pages.hotelFacilitiesSelect', compact('facilities', 'hotel'));
    }
}
