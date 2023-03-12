<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле обязательно для заполнения',
            'name.string' => 'Поле обязательно должно быть строкой',
            'email.required' => 'Поле обязательно для заполнения',
            'email.string' => 'Поле обязательно должно быть строкой',
            'email.email' => 'Введите корректный email',
            'email.unique' => 'Пользователь с данным email уже существует',
            'password.required' => 'Поле обязательно для заполнения',
            'password.string' => 'Поле обязательно должно быть строкой',
            'password.min' => 'Пароль должен содержать минимум 8 символов',
        ];
    }
}
