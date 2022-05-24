<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
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
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route()->parameter('id');

        return [
            'url' => 'required|url',
            'url_short' => 'required|min:5|unique:links,url_short,'.$id.',id'
        ];
    }

    public function messages()
    {
        return [
            'url.required' => 'O campo URL é obrigatório.',
            'url.url' => 'Informe uma URL válida.',
            'url_short.required' => 'O campo URL Encurtada é obrigatório.',
            'url_short.min' => 'A URL Encurtada deve ter 5 caracteres podendo conter letras e números.',
            'url_short.unique' => 'Essa URL já está cadastrada. Por favor, informe um valor diferente.'
        ];
    }
}
