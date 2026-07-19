<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\TrendingDestinations;
use Illuminate\Http\Request;

class TrendingController extends Controller
{
    public function index($id){
        $trendingDestination = TrendingDestinations::findOrFail($id);
        $city = $trendingDestination->city;
        $hotels = Hotel::where('city', $city)->paginate(6);

        return view('pages.showTrendingDestination', compact('trendingDestination', 'hotels'));
    }

}
