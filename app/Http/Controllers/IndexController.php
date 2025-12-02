<?php

namespace App\Http\Controllers;

use App\Events\Visit;
use App\Models\Guest;

use function PHPUnit\Framework\isEmpty;

class IndexController
{
    /**
     * Повертає початкову сторінку. Returns Welcome page with Event
     */
    public function index()
    {
        $attr = ['session_id' => request()->session()->getId()];
        $guest = Guest::where('session_id', $attr['session_id'])->first();

        if (!$guest) {
            $guest = Guest::create($attr);
        }

        // Створення події <Візит>. Create an Event
        event(new Visit($guest));

        // Початкова сторінка. Return Welcome page view
        return view('index');
    }
}
