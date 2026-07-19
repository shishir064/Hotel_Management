<?php

namespace App\Http\Controllers;

use App\Models\FeaturedDestinations;
use App\Models\TrendingDestinations;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
{
    $destinations = FeaturedDestinations::withCount('hotels')
        ->where('is_feature', true)
        ->where('status', true)
        ->get();

    $trendingDestinations = TrendingDestinations::latest()->limit(3)->get();

    // $trendingDestinations = TrendingDestinations::where('status', 1)
    //     ->latest()
    //     ->take(3)
    //     ->get();

    return view('welcome', compact('destinations', 'trendingDestinations'));
}
}
