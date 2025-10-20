<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
    public function bio()
    {
        $user = Auth::user();
        $html = view('components.profile-bio', compact('user'))->render();

        return response()->json(['html' => $html]);
    }

    /**
     * User posts
     *
     * @return void
     */
    public function posts()
    {
        $posts = Post::with('author')->where('author_id', Auth::id())->latest()->get();
        $html = view('components.profile-posts', compact('posts'))->render();

        return response()->json(['html' => $html]);
    }
}
