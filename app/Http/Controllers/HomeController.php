<?php

namespace App\Http\Controllers;

use App\Events\UserView;
use Illuminate\Http\Request;

class HomeController
{
    /**
     * Повертає початкову сторінку. Returns Welcome page with Event
     */
    public function index()
    {
        // Створення події Перегляд сторінки. Create an Event(View)
        event(new UserView(request()));
        // Початкова сторінка. Return Welcome page view

    }
}
