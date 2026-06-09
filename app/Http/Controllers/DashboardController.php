<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotel;
use App\Models\addHotel;
use App\Models\Hotel;
use App\Models\RoomAmenity;
use App\Models\RoomCategory;
use App\Models\RoomMainFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }
    

    public function showRoomsForm()
    {
        $categories = RoomCategory::all();
        $amenities = RoomAmenity::all();
        $main_facilities = RoomMainFacility::all();
        $hotels = Hotel::all();

        return view('pages.addroom', compact('categories', 'amenities', 'main_facilities'));
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

    public function delete($id){
        $category = RoomCategory::find($id);
        $category->delete();
        return redirect()->route('add_category')->with('success', 'Category deleted successfully');
    }

    
}
