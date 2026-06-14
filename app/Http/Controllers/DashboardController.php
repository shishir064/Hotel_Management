<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\RoomBooking;
use App\Models\RoomCategory;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        // $rooms = Auth::user()->hotels?->Rooms::count();
        $hotels = Auth::user()->hotels;
        $rooms = $hotels ? $hotels->rooms()->count() : 0;
        $hotel_name = Auth::user()->hotels?->hotel_name;
        $roomBookings = RoomBooking::with('guest')->where('status', 'confirmed')->get();

        $totalRevenue = RoomBooking::where('status', 'confirmed')->sum('total_price');

        return view('pages.dashboard', compact('roomBookings', 'totalRevenue', 'guests', 'hotel_name', 'rooms'));
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
