<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;
use App\Events\NewRegistration;
use App\Events\UserLogin;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /**
     * Виклик сторінки з формою реєстрації. Display the registration view.
     */
    public function create(): View
    {
        return view('registration');
    }

    /**
     * Збереження введених даних користувача. Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegistrationRequest $request)
    {
        // Верифікація та перевірка введених даних. Verifying given attributes
        $attributes = $request->validated();

        // Збереження. Store userdata to DB
        $user = User::create($attributes);

        // Запуск події реєстрації. Create an event
        event(new NewRegistration($user));

        // Вхід у систему. Auth a user
        Auth::login($user);

        // Запуск події авторизації. Create an event
        event(new UserLogin(Auth::user()));

        // Перенаправлення. Redirection
        return redirect()->route('profile')->with('success', 'Реєстрація успішна!');
    }
}
