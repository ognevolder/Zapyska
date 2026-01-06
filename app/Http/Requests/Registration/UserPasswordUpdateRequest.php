<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserPasswordUpdateRequest extends FormRequest
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
            'current_password' => ['required', 'current_password:web'],
            'password' => ['required', 'min:8']
        ];
    }


    public function messages(): array
    {
      return [
        'current_password.required' => 'Вкажіть поточний пароль.',
        'current_password.current_password' => 'Поточний пароль не відповідає вказаному.',

        'password.required' => 'Вкажіть новий пароль.',
        'password.min' => 'Мінімальна довжина 8 символів'
      ];
    }
}
