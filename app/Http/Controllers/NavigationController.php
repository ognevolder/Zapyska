<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController
{
    /**
     * Home page
     *
     * @return void
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Profile page
     *
     * @return void
     */
    public function profile()
    {
        // Auth
        return view('profile');
    }
}
