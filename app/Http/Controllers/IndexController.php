<?php

// Основний контролер вхідної точки веб-сторінки. Відповідає за реєстрацію в системі гостя та події візиту.

namespace App\Http\Controllers;

use App\Events\Visit;
use App\Models\Guest;

class IndexController
{
    /**
     * Повертає початкову сторінку. Returns Welcome page with Event
     */
    public function index()
    {
        $attr = [
            'session_id' => request()->session()->getId(),
            'guest_name' => 'Гість' . rand(0,8585)
        ];
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
