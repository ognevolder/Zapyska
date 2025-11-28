<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WritingController
{
    public function index()
    {
        return view('writings/index');
    }

    public function create()
    {
        return view('writings/create');
    }
}
