<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\RoomBooking;
use App\Models\RoomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $guests = Guest::all();

        $roomBookings = RoomBooking::with('guest')->where('status', 'confirmed')->get();

        $totalRevenue = RoomBooking::where('status', 'confirmed')->sum('total_price');

        return view('pages.dashboard', compact('roomBookings', 'totalRevenue', 'guests'));
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
