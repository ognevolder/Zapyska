<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController
{
    /**
     * Profile-page View
     */
    public function profile()
    {
        return view('profile');
    }

    /**
     * User information
     *
     * @return void
     */
    public function info()
    {
        $user = Auth::user();

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'registered' => $user->created_at->format('d.m.Y')
        ]);
    }
}
