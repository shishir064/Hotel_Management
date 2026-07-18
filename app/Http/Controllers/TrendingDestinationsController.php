<?php

namespace App\Http\Controllers;

use App\Models\TrendingDestinations;
use Illuminate\Http\Request;

class TrendingDestinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $trendingDestinations = TrendingDestinations::latest()->get();
        return view('pages.trendingDestinations', compact('trendingDestinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.addTrendingDestinations');
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

         $path = $request->file('cover_image')->store('images', 'public');
        $validated['cover_image'] = $path;

        TrendingDestinations::create([
            'name' => $validated['name'],
            'city' => $validated['city'],
            'cover_image' => $path,
            'description' => $validated['description'],
        ]);
        return back()->with('success', 'Trending Destination Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(TrendingDestinations $trendingDestinations)
    {
         
        $trendingDestinations = TrendingDestinations::latest()->get();
        return view('pages.trendingDestinations', compact('trendingDestinations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrendingDestinations $trendingDestinations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrendingDestinations $trendingDestinations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrendingDestinations $trendingDestinations)
    {
        $trendingDestinations->delete();
        return back()->with('success', 'Trending Destination Deleted Successfully');
    }
}
