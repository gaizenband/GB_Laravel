<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => ['required','between:3,25'],
            'email' => ['required','between:3,25'],
            'password' => ['between:3,25','nullable','confirmed'],
            'password_confirmation' => ['between:3,25','nullable'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute является обязательным',
            'between' => 'Длина поля :attribute должна быть от 3 до 25 символов',
            'confirmed' => 'Должны быть заполнены оба поля с паролем',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Name',
            'email' => 'email',
            'password' => 'password'
        ];
    }
}
