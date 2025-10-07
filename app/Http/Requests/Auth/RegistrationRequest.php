<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Якщо реєстрація відкрита для всіх — true
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'password' => ['required', 'string', 'min:8']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Ім’я" обов’язкове.',
            'name.max' => 'Ім’я не може перевищувати 255 символів.',

            'username.required' => 'Поле "Логін" обов’язкове.',
            'username.max' => 'Логін не може перевищувати 255 символів.',
            'username.unique' => 'Користувач з таким логін-імʼям вже зареєстрований.',

            'email.required' => 'Вкажіть вашу електронну пошту.',
            'email.email' => 'Введіть коректну email-адресу.',
            'email.unique' => 'Ця адреса вже зареєстрована.',

            'password.required' => 'Вкажіть пароль.',
            'password.min' => 'Пароль має містити щонайменше 8 символів.'
        ];
    }
}