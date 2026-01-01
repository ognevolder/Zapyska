<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController
{
    /**
     * Profile-page View
     */
    public function user()
    {
        return view('profile.profile');
    }

    /**
     * Profile-page View
     */
    public function admin()
    {
        return view('admin.dashboard');
    }

    /**
     * User information
     *
     */
    public function bio(Request $request)
    {
        $user = Auth::user();

        if ($request->ajax())
        {
            $html = view('components.profile-bio', ['user' => $user])->render();
            return response()->json(['html' => $html]);
        }

        return view('profile.profile-bio', ['user' => $user]);
    }

    /**
     * User posts
     *
     */
    public function posts(Request $request)
    {
        $posts = Post::with('author')->where('author_id', Auth::id())->latest()->get();

        if ($request->ajax())
        {
            $html = view('components.profile-posts', ['posts' => $posts])->render();
            return response()->json(['html' => $html]);
        }

        return view('profile.profile-posts', ['posts' => $posts]);
    }
}
