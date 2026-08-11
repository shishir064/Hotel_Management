<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\RoomBooking;
use App\Models\RoomCategory;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {

        $user = Auth::user();
        $hotel = $user->hotels;
        // Count rooms
        $totalRooms = $hotel->rooms()->count();
        // Confirmed bookings for this hotel
      $roomBookings = RoomBooking::with(['user', 'room'])
    ->whereIn('status', [
        'pending',
        'confirmed',
        'checked_in',
        'checked_out',
        'cancelled',
    ])
    ->whereHas('room', function ($query) use ($hotel) {
        $query->where('hotel_id', $hotel->id);
    })
    ->latest()
    ->get();

        // Dashboard statistics
        $roomIds = Rooms::where('hotel_id', $hotel->id)->pluck('id');

        $totalBookings = RoomBooking::whereIn('room_id', $roomIds)->count();

        $totalGuests = RoomBooking::whereIn('room_id', $roomIds)
            ->distinct('user_id')
            ->count('user_id');

        $totalRevenue = Bill::whereHas('room', function ($query) use ($hotel) {
            $query->where('hotel_id', $hotel->id);
        })->sum('total');

            

        return view('pages.adminDashboard', compact(
            'totalRooms',
            'totalBookings',
            'totalGuests',
            'totalRevenue',
            'roomBookings'
        ));
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
