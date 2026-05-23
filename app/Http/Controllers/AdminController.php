<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotel;
use App\Models\addHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admindashboard');
    }
    public function addHotel(StoreHotel $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        addHotel::create($validated);
        return redirect()->route('dashboard')->with('success', 'Hotel added successfully');
    }

    public function showRoomsForm()
    {
        return view('pages.addroom');
    }

    
}
