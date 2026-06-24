<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPrfileController extends Controller
{
    public function index(){
        return view('user.userProfile');
    }

    public function edit(){
        return view('user.editProfile');
    }

    public function showSetting(){
        return view('pages.userSecurity');
    }
}
