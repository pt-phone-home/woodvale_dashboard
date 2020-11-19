<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show() {
        $user = auth()->user();

        return view('profile.show', ['user' => $user]);
    }

    public function update(Request $request) {
        $user = auth()->user();

        if (!request('password') || !request('password_confirmation')) {
            return redirect()->back()->with('error', 'Please enter a new password and confirmation');
        }

        $validatedAttributes = request()->validate([
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $user['password'] = Hash::make($validatedAttributes['password']);
        $user->save();
        return redirect()->back()->with('success', 'Password updated');
    }
}
