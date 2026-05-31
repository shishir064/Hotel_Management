<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotel;
use App\Models\AddHotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        return view('pages.listhotel');
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

        return view('pages.listhotel')->with('success', 'Hotel added successfully');
    }
}
