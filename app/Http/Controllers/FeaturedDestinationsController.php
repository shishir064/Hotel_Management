<?php

namespace App\Http\Controllers;

use App\Models\FeaturedDestinations;
use Illuminate\Http\Request;

class FeaturedDestinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.addDestination');
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
        $validated = $request->validate([
            'name' => 'required',
            'city' => 'required',
            'cover_image' => 'required',
            'description' => 'required',
        ]);
        // dd($validated);

        $path = $request->file('cover_image')->store('images', 'public');
        $validated['cover_image'] = $path;

        FeaturedDestinations::create([
            'name' => $validated['name'],
            'city' => $validated['city'],
            'cover_image' => $path,
            'description' => $validated['description'],
        ]);

        return redirect()->route('add_featured_destinations')->with('success', 'Destination added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(FeaturedDestinations $featuredDestination)
    {
        
        $featuredDestinations = FeaturedDestinations::latest()->get();
        return view('pages.destinationList', compact('featuredDestinations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeaturedDestinations $featuredDestination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeaturedDestinations $featuredDestination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $destination = FeaturedDestinations::find($id);
        $destination->delete();
        return redirect()->route('show.featured.destinations')->with('success', 'Destination deleted successfully');
    }
}
