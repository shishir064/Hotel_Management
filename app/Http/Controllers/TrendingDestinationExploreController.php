<?php

namespace App\Http\Controllers;

use App\Models\TrendingDestinations;
use Illuminate\Http\Request;

class TrendingDestinationExploreController extends Controller
{
    public function index()
{
    
    $trendingDestinations = TrendingDestinations::where('status', 1)
        ->latest()
        ->paginate(9); // or ->get()

    return view('pages.trendingDestinationExplore', compact('trendingDestinations'));
}
}
