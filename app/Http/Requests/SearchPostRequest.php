<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SearchPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'query' => ['required', 'string', 'min:2', 'max:16']
        ];
    }

    public function messages(): array
    {
        return [
            'query.required' => 'Введіть ваш запит.',
            'query.string' => 'Пошук виконується лише за текстовим зразком.',
            'query.min' => 'Запит занадто короткий.',
            'query.max' => 'Запит занадто довгий.'
        ];
    }

    protected function prepareForValidation(): void
{
    $q = $this->input('query', ''); // ✅ отримає саме текст, а не об'єкт
    $q = strip_tags($q);
    $q = preg_replace('/[^a-zA-Zа-яА-Я0-9\s\-]/u', '', $q); // прибрати дивні символи
    $q = mb_substr(trim($q), 0, 16);

    $this->merge(['query' => $q]);
}

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'errors' => $validator->errors()
            ], 422)
        );
    }
}