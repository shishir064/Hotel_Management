<?php

namespace App\Http\Controllers;

use App\Models\RoomServices;
use Illuminate\Http\Request;

class RoomServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = RoomServices::all();
        return view('pages.addRoomServices', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $roomServices = new RoomServices();
        $roomServices->name = $request->name;
        $roomServices->price = $request->price;
        $roomServices->save();

        return redirect()->route('add_room_services')->with('success', 'Room Services added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomServices $roomServices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomServices $roomServices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomServices $roomServices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomServices $roomServices)
    {
        $roomServices->delete();
        return redirect()->route('add_room_services')->with('success', 'Room Services deleted successfully');
    }
}
