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

    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('user.editProfile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'citizen_id' => 'required|string|max:6',
        ]);
        $user = User::findorfail($id);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'citizen_id' => $validated['citizen_id'],
        ]);
        
        return redirect()->route('user.profile', $user->id)->with('success', 'Profile updated successfully');
    }
}
