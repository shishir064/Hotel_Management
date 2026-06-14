<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('pages.addRole', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);
        Role::create([
            'name' => $validated['name'],
            'guard_name' => 'web',
        ]);
        return redirect()->route('add_role')->with('success', 'Role added successfully');
    }

    public function delete($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('add_role')->with('success', 'Role deleted successfully');
    }
}
