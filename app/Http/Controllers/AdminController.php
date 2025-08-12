<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin');
    }
}
