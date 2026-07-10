<?php

namespace App\Http\Controllers;

use App\Models\FeaturedDestinations;
use App\Models\Hotel;
use Illuminate\Http\Request;

class DestinationExploreController extends Controller
{
    public function index($id)
    {
        $destination = FeaturedDestinations::findOrFail($id);
        $hotels = $destination->hotels()
            ->where('is_active', true)
            ->paginate(9);

        return view('pages.showDestination', compact('destination', 'hotels'));
    }
}
