<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotel;
use App\Models\Hotel;
use App\Models\HotelFacility;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
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

        Hotel::create($validated);


        return redirect()->route('add_hotel')->with('success', 'Hotel Added successfully');
    }


    public function edit($id)
    {
        $hotel = Hotel::find($id);
        return view('pages.editHotel', compact('hotel'));
    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::find($id);
        $hotel->update($request->all());
        return redirect()->route('add_hotel')->with('success', 'Hotel updated successfully');
    }

    public function delete($id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();
        return redirect()->route('add_hotel')->with('success', 'Hotel deleted successfully');
    }
    public function showHotelList()
    {
        $hotels = Hotel::latest()->get();
        // dd($hotels);
        return view('pages.list_Hotel', compact('hotels'));
    }

    public function showHotel()
    {
        $hotels = Hotel::latest()->paginate(6);
        return view('pages.hotelview', compact('hotels'));
    }

    public function showHotelProflie($id)
    {
        $facilities = HotelFacility::all();
        $hotel = Hotel::with('facilities')->findOrFail($id);
        $hotel = Hotel::findorfail($id);
        return view('pages.hotelProfile', compact('hotel', 'facilities'));
    }

    public function hotelImage($id)
    {
        $hotel = Hotel::findorfail($id);
        return view('pages.hotelImageCreate', compact('hotel'));
    }

    public function hotelImageStore(Request $request, $id)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $hotel = Hotel::findOrFail($id);
        // dd($request->all(), $request->file('images'));

        foreach ($request->file('images') as $image) {

            $path = $image->store('hotel_images', 'public');

            $hotel->images()->create([
                'image' => $path,
            ]);
        }

        return back()->with('success', 'Images uploaded successfully.');
    }

    public function hotelAvailability($id)
    {
        $facilities = HotelFacility::all();
        $hotel = Hotel::with('facilities')->findOrFail($id);
        // dd($facilities);
        // $hotel = Hotel::findorfail($id);
        return view('pages.hotelAvailability', compact('hotel', 'facilities'));
    }

    public function searchHotel(Request $request)
    {
        $query = Hotel::query();

        if ($request->city) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        if ($request->star) {
            $query->where('star_rating', 'like', '%' . $request->star . '%');
        }
        $hotels = $query->paginate(6);
        // $hotels = Hotel::where('hotel_name', 'like', '%' . $request->search . '%')->get();
        return view('pages.hotelview', compact('hotels'));
    }

   
}


