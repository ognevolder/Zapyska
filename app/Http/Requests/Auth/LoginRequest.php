<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
      return [
        'email.required' => 'Вкажіть вашу електронну пошту.',
        'email.email' => 'Введіть коректну email-адресу.',

        'password.required' => 'Вкажіть пароль.'
      ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate($guard = 'web'): void
    {
        $this->ensureIsNotRateLimited($guard);

        if (! Auth::guard($guard)->attempt(
            $this->only('email', 'password')
        )) {
            RateLimiter::hit($this->throttleKey($guard), 480);

            throw ValidationException::withMessages([
                'login' => 'Вказані дані не співпадають.' . '<br>' . 'Залишилося спроб: ' . RateLimiter::remaining($this->throttleKey($guard), 5)
            ]);
        }

        RateLimiter::clear($this->throttleKey($guard));
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(string $guard): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey($guard), 5)) {
            return;
        }

        event(new Lockout($this));

        throw ValidationException::withMessages([
            'block' => 'Тимчасово заблоковано. Спробуйте ще раз через ' . RateLimiter::availableIn($this->throttleKey($guard)) . ' секунд.'
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey($guard): string
    {
        return Str::lower($guard. '|' . $this->string('email').'|'.$this->ip());
    }
}
