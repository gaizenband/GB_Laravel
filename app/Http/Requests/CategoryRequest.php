<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required','between:5,25'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute является обязательным',
            'title.between' => 'Длина поля :attribute должна быть от 5 до 25 символов',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Название',
        ];
    }
}
