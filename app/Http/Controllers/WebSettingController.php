<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class WebSettingController extends Controller
{

  
    public function edit()
    {
        $userId = auth()->user()->id;
        $settings = Setting::find($userId);

        return view('settings.index', compact('settings', 'userId'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'userId' => 'required',
            'hotel_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
        ]);

        $settings = Setting::first();

        if (!$settings) {
            $settings = new Setting();
        }

        $settings->user_id = $request->userId;
        $settings->hotel_name = $request->hotel_name;
        $settings->phone = $request->phone;
        $settings->email = $request->email;
        $settings->address = $request->address;

        $settings->save();

        return back()->with('success', 'Settings updated successfully!');
    }
}
