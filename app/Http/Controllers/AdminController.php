<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $users = User::all();
        return view('admin', compact('users'));
    }
}
