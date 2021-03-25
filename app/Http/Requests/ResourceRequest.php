<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourceRequest extends FormRequest
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
            'title' => ['required','between:3,25'],
            'link' => ['required','between:10,100','url']
        ];
    }

    public function messages(){
        return [
            'required' => 'Поле :attribute является обязательным',
            'title.between' => 'Длина поля :attribute должна быть от 5 до 25 символов',
            'text.between' => 'Длина поля :attribute должна быть от 10 до 300 символов',
            'url' => 'Невалидное значение поля :attribute',
        ];
    }
}
