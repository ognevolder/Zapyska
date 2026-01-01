<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRegistrationRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:admins,email'],
            'password' => ['required', 'min:8'],
            'key'      => ['required',
                Rule::exists('keys', 'key')->where('used', false)->where(function ($q) {
                    $q->whereNull('expires_at')->orWhere('expires_at', '>', now());
                })]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле обов’язкове.',
            'name.max' => 'Ім’я не може перевищувати 255 символів.',

            'email.required' => 'Вкажіть вашу електронну пошту.',
            'email.email' => 'Введіть коректну email-адресу.',
            'email.unique' => 'Ця адреса вже зареєстрована.',

            'password.required' => 'Вкажіть пароль.',
            'password.min' => 'Пароль має містити щонайменше 8 символів.',

            'key.required' => 'Вкажіть ключ доступу.',
            'key.exists' => 'Ключ не доступний.'
        ];
    }
}
