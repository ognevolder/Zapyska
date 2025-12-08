<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
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
            'email' => ['required','email', 'string'],
            'password' => ['required','string']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Вкажіть вашу електронну пошту.',
            'email.email' => 'Введіть коректну email-адресу.',
            'email.string' => 'Електронна адреса не може містити сторонніх символів.',

            'password.required' => 'Вкажіть пароль.'
        ];
    }

    public function authenticate(): void
    {
        $credentials = $this->only('email', 'password');

        if (!Auth::guard('admin')->attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => __('Невірні дані для входу.'),
            ]);
        }
    }
}
