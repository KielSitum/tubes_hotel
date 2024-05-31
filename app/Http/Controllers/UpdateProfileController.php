<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateProfileController extends Controller
{
    public function edit()
    {
        return view('home.edit');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => ['string', 'min:3', 'max:191', 'required'],
            'email' => [
                'email',
                'string',
                'min:3',
                'max:191',
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone' => [
                'string',
                'min:8',
                'max:20',
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return back()->with('message', 'Your Profile Has Been Updated');
    }
}
