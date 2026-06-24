<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $user = User::all()->count();
        $room = Rooms::all()->count();
        $totalUser = $room + 500;
        $totalRoom = $user + 500;
        return view('pages.aboutUs', compact('totalUser', 'totalRoom'));
    }
}
