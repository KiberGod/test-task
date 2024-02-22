<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'title' => 'required|max:100',
            'genre_0' => 'required',
            'poster' => 'nullable|max:2048|mimes:jpg,bmp,png|dimensions:min_width=720,min_height=1280,max_width=720,max_height=1280',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Название не может быть пустым',
            'title.max' => 'Название не должно превышать 100 символов',
            'genre_0' => 'Фильм должен иметь минимум 1 жанр',
            'poster.max' => 'Максимальный размер файла - 2 МБ',
            'poster.mimes' => 'Файл должен иметь формат PNG, JPG или BMP',
            'poster.dimensions' => 'Файл должен иметь размер 720x1280 пикселей',
        ];
    }
}
