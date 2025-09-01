<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegistrationController
{
    /**
     * Handle the register-form request.
     */
    public function show()
    {
        return view('auth/registration');
    }

    /**
     * Handle the registration process.
     */
    public function store()
    {
        // Verifying given attributes
        $attributes = request()->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', Password::min(8)],
            'name' => ['required'],
            'username' => ['required', 'unique:users,username']
        ]);

        // Store userdata to DB
        $user = User::create($attributes);

        // Auth a user
        Auth::login($user);

        // Redirection
        return redirect('/profile');
    }
}
