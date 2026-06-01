<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotel;
use App\Models\AddHotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = AddHotel::all();
        return view('pages.addhotel', compact('hotels'));
    }


    public function store(StoreHotel $request)
    {
        // dd($request);
        $validated = $request->validated();

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('images', 'public');

            $validated['cover_image'] = $path;
        }

        AddHotel::create($validated);

        return view('pages.addhotel')->with('success', 'Hotel added successfully');
    }

    public function edit($id){
        $hotel = AddHotel::find($id);
        return view('pages.editHotel', compact('hotel'));
       
    }

    public function update(Request $request, $id){
        $hotel = AddHotel::find($id);
        $hotel->update($request->all());
        return redirect()->route('add_hotel')->with('success', 'Hotel updated successfully');
    }

    public function delete($id){
        $hotel = AddHotel::find($id);
        $hotel->delete();
        return redirect()->route('add_hotel')->with('success', 'Hotel deleted successfully');
    }
}
