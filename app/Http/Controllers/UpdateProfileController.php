<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    public function edit()
    {
        return view('home.edit');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['string', 'min:3', 'max:191', 'required'],
            'email' => ['email','string', 'min:3', 'max:191', 'required'],
            'phone' => ['string', 'min:8', 'max:20', 'required']
        ]);

        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        

        return back()->with('message', 'Your Profile Has Been Updated');
    }
}
