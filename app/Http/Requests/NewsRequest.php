<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'text' => ['required','between:10,300'],
            'category_id' => ['required','integer','exists:App\Models\Category,id'],
            'image' => ['image'],
            'isPrivate' =>['in:null,1']
        ];
    }

    public function messages(){
        return [
            'required' => 'Поле :attribute является обязательным',
            'title.between' => 'Длина поля :attribute должна быть от 5 до 25 символов',
            'text.between' => 'Длина поля :attribute должна быть от 10 до 300 символов',
            'category_id.exists' => 'Такого значения поля :attribute не существует',
            'isPrivate.in' => 'Некорректное значение поля :attribute'
        ];
    }

    public function attributes(){
        return [
            'title' => 'Название',
            'text' => 'Текст',
            'category_id' => 'Категория',
            'image' => 'Картинка',
            'isPrivate' => 'Private'
        ];
    }
}
