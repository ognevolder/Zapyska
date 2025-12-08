<?php

namespace App\Http\Requests\Admin;

use App\Models\Key;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class RegistrationRequest extends FormRequest
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
            'name' => ['required','string','max:255'],
            'email' => ['required','email','string','unique:admins,email'],
            'password' => ['required','string','min:8'],
            'key' => ['required', 'string', function ($attribute, $value, $fail) {
                $key = Key::where('key', $value->first());

                if (!$key) {
                    return $fail('Такого ключа не існує.');
                }

                if ($key->used) {
                    return $fail('Ключ вже використаний.');
                }

                if ($key->expires_at && Carbon::parse($key->expires_at)->isPast()) {
                    return $fail('Ключ недійсний.');
                }
            }]
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Вкажіть імʼя.',
            'email.required' => 'Вкажіть електронну пошту.',
            'email.email' => 'Введіть коректну електронну пошту.',
            'email.unique' => 'Електронна пошта вже зареєстрована.',
            'password.required' => 'Вкажіть пароль.',
            'password.min' => 'Мінімальна довжина пароля 8 символів.',
            'admin_key.required' => 'Вкажіть ключ доступу.',
        ];
    }
}
