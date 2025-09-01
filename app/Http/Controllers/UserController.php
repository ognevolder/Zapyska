<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController
{
    public function profile()
    {
        $posts = User::with(['posts' => function ($query)
        {
            $query->latest()->limit(5);
        }])->find(Auth::id())->posts;

        return view('profile', compact('posts'));
    }
}
