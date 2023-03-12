<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name.required' => 'Поле обязательно для заполнения',
            'name.string' => 'Поле обязательно должно быть строкой',
            'email.required' => 'Поле обязательно для заполнения',
            'email.string' => 'Поле обязательно должно быть строкой',
            'email.email' => 'Введите корректный email',
            'email.unique' => 'Пользователь с данным email уже существует'
        ];
    }
}
