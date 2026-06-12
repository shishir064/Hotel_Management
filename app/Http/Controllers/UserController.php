<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUserList(){
        $users = User::latest()->paginate(6);
        return view('pages.usersList', compact('users'));
    }

    public function edit($id){
        dd($id);
    }
}
