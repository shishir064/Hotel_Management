<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotel;
use App\Models\FeaturedDestinations;
use App\Models\Hotel;
use App\Models\HotelFacility;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HotelController extends Controller
{
    public function index()
    {
        $destinations = FeaturedDestinations::all();
        return view('pages.addhotel', compact('destinations'));
    }


    public function store(StoreHotel $request)
    {
        $validated = $request->validated();
        // dd($validated);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('images', 'public');

            $validated['cover_image'] = $path;
        }
        $user = User::create([
            'name' => $request->hotel_name,
            'email' => $request->email,
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('admin');

        $validated['user_id'] = $user->id;

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
    $hotel = Hotel::findOrFail($id);

    // delete user first
    if ($hotel->user) {
        $hotel->user->delete();
    }

    // delete hotel
    $hotel->delete();

    return redirect()->route('show.hotel.list')
        ->with('success', 'Hotel and user deleted successfully');
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

    public function showHotelProflie()
    {
       
        $user = Auth::user();
        if($user->hasRole('admin')){ {
            $hotel_id = Auth::user()->hotels->id;
            $hotel = Hotel::with('facilities')->findOrFail($hotel_id);
        }
        }
        else{
            $hotel = Hotel::get();
        }
        $facilities = HotelFacility::all();
        $rooms = Rooms::all();
        return view('pages.hotelProfile', compact('hotel', 'facilities', 'rooms'));
    }

    public function showHotelView($id)
    {
        $hotel = Hotel::findorfail($id);
        $facilities = HotelFacility::all();
        $rooms = Rooms::all();
        return view('pages.hotelProfile', compact('hotel', 'facilities', 'rooms'));
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
        $hotel = Hotel::findorfail($id);
        $rooms = $hotel->rooms()->get();
        return view('pages.hotelAvailability', compact('hotel', 'facilities', 'rooms'));
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
