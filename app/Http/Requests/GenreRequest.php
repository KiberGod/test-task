<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
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
            'name' => 'required|max:100|unique:genres,name',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Название не может быть пустым',
            'name.max' => 'Название не должно превышать 100 символов',
            'name.unique' => 'Такое название уже существует',
        ];
    }
}
