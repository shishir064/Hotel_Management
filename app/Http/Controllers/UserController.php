<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

public function showUserList(Request $request)
{
    $users = User::with(['roles', 'hotels']);

    // Filter by role
    if ($request->filled('role')) {
        $users->role($request->role);
    }

    // Search
    if ($request->filled('search')) {
        $users->where(function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        });
    }

    $users = $users->paginate(10)->withQueryString();

    return view('pages.usersList', compact('users'));
}
    public function edit($id){
        dd($id);
    }
}
