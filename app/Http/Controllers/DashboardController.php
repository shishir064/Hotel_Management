<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Guest;
use App\Models\Hotel;
use App\Models\RoomBooking;
use App\Models\RoomCategory;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     // $guests = Guest::all();
    //     // // $rooms = Auth::user()->hotels?->Rooms::count();
    //     // $hotels = Auth::user()->hotels;
    //     // $rooms = $hotels ? $hotels->rooms()->count() : 0;
    //     // $hotel_name = Auth::user()->hotels?->hotel_name;
    //     // $roomBookings = RoomBooking::with('guest')->where('status', 'confirmed')->get();

    //     // $totalRevenue = RoomBooking::where('status', 'confirmed')->sum('total_price');

    //     // return view('pages.dashboard', compact('roomBookings', 'totalRevenue', 'guests', 'hotel_name', 'rooms'));
    // }
//     public function index()
// {

//     $user = Auth::user();


//     $hotel=Hotel::find(1);
//     // if (!$hotel) {
//     //     return view('pages.dashboard', [
//     //         'roomBookings' => collect(),
//     //         'totalRevenue' => 0,
//     //         'totalGuests' => 0,
//     //         'totalBookings' => 0,
//     //         'hotel_name' => null,
//     //         'rooms' => 0,
//     //     ]);
//     // }

//     return $hotel;
//     $rooms = $hotel->rooms()->count();
//     $hotel_name = $hotel->hotel_name;
//     $totalRevenue = Bill::whereHas('room', function ($query) use ($hotel) {
//     $query->where('hotel_id', $hotel->id);
//     })->sum('total');
//     // Bookings only for this hotel
//     $roomBookings = RoomBooking::with('user')->whereHas('room', function ($query) use ($hotel) {
//             $query->where('hotel_id', $hotel->id);
//         })->where('status', 'confirmed')->get();
//     // $roomBookings = RoomBooking::with('user')->get();

//     // Total bookings count
//     $totalBookings = $roomBookings->count();

//     // Total guests (unique guests)
//     $totalGuests = $roomBookings->pluck('user_id')->unique()->count();

    

//     return view( 'pages.dashboard', compact(
//             'roomBookings',
//             'totalRevenue',
//             'totalGuests',
//             'totalBookings',
//             'hotel_name',
//             'rooms'
//         )
//     );
// }

public function index()
{
    $user = Auth::user();
    $hotel = Hotel::find($user->hotel_id);

    if (!$hotel) {
        return view('pages.dashboard', [
            'roomBookings'  => collect(),
            'totalRevenue'  => 0,
            'totalGuests'   => 0,
            'totalBookings' => 0,
            'hotel_name'    => null,
            'rooms'         => 0,
        ]);
    }

    // Count rooms
    $rooms = $hotel->rooms()->count();

    // Confirmed bookings for this hotel
    $roomBookings = RoomBooking::with('user')
        ->where('status', 'confirmed')
        ->whereHas('room', function ($query) use ($hotel) {
            $query->where('hotel_id', $hotel->id);
        })
        ->get();

    // Dashboard statistics
    $totalBookings = $roomBookings->count();
    $totalGuests = $roomBookings->unique('user_id')->count();

    $totalRevenue = Bill::whereHas('room', function ($query) use ($hotel) {
            $query->where('hotel_id', $hotel->id);
        })
        ->sum('total');

    return view('pages.dashboard', [
        'roomBookings'  => $roomBookings,
        'totalRevenue'  => $totalRevenue,
        'totalGuests'   => $totalGuests,
        'totalBookings' => $totalBookings,
        'hotel_name'    => $hotel->hotel_name,
        'rooms'         => $rooms,
    ]);
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
