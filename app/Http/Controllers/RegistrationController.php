<?php

// Контроллер модуля реєстрації. Відповідає за реєстрацію користувача в системі та запис в журналі активності.

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;
use App\Events\UserLogin;
use App\Events\UserNotification;
use App\Events\UserRegistration;
use App\Http\Requests\RegistrationRequest;
use App\Models\Message;
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
        event(new UserRegistration($user));

        // Вхід у систему. Auth a user
        Auth::login($user);

        // Запуск події авторизації. Create an event
        event(new UserLogin(Auth::user()));

        // Створення події Сповіщення. Create Notification event
        $message = Message::create([
            'type' => 'welcome',
            'text' => "Вітаємо! Ви успішно зареєструвалися в системі Записька. Тепер Ви можете надсилати свої публікації на розгляд нашій команді редакторів. Залишилося лише верифікувати вашу електронну адресу за посиланням: <a href='/verify-email'>Верифікація</a>"
        ]);
        event(new UserNotification($message));

        // Перенаправлення. Redirection
        return redirect()->route('profile')->with('success', 'Реєстрація успішна!');
    }
}
