<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($id)
    {
       $user = User::findorfail($id);
    //    dd($user->name);
        return view('user.profile', compact('user'));
    }
}
