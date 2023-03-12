<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file|mimes:png,jpg,jpeg|max:2000',
            'main_image' => 'nullable|file|mimes:png,jpg,jpeg|max:2000',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'title.string' => 'Данное поле должно иметь строчный тип',
            'content.required' => 'Это поле обязательно для заполнения',
            'content.string' => 'Данное поле должно иметь строчный тип',
            'preview_image.required' => 'Это поле обязательно для заполнения',
            'preview_image.file' => 'Данное поле должно быть файлом',
            'preview_image.mimes' => 'Файл должен иметь PNG, JPG или JPEG формат',
            'preview_image.max' => 'Размер файла не должен быть больше 2МБ',
            'main_image.required' => 'Это поле обязательно для заполнения',
            'main_image.file' => 'Данное поле должно быть файлом',
            'main_image.mimes' => 'Файл должен иметь PNG, JPG или JPEG формат',
            'main_image.max' => 'Размер файла не должен быть больше 2МБ',
            'category_id.required' => 'Это поле обязательно для заполнения',
            'category_id.integer' => 'ID категории должно быть числом',
            'category_id.exists' => 'Данная категория должна быть в базе данных',
            'tag_ids.exists' => 'Данный тэг должен быть в базе данных'
        ];
    }
}
