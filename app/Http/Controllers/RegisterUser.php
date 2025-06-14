<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUser extends Controller
{
    //
    public function store(Request $request)
    {
        
        // Redirect with success message
       
        $validated = $request->validate([
            'username' => 'required|string|min:3|max:30|unique:users,username',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
      
        // Save user to DB
        $user = User::create([
            'username' => '@' . ltrim($validated['username'], '@'),
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Hash password
        ]);

        // Auto-login after registration
        Auth::login($user);
        return redirect()->route('home-page')->with('success', 'Welcome! You are now logged in.');
        
    }
}
