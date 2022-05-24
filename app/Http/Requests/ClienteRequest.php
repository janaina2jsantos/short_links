<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
        $id = $this->route()->parameter('id');

        return [
            'name'  => 'required|min:5',
            'email' => 'required|email|unique:users,email,'.$id.',id',
            'city'  => 'required|min:3',
            'uf'    => 'required|max:2',
            'phone' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo Nome é obrigatório.',
            'name.min' => 'Nome deve conter no mínimo 5 caracteres.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.unique' => 'Esse e-mail já está cadastrado. Por favor, informe um valor diferente.',
            'city.required' => 'O campo Cidade é obrigatório.',
            'city.min' => 'O campo Cidade deve conter no mínimo 3 caracteres.',
            'uf.required' => 'O campo Estado é obrigatório.',
            'phone.required' => 'O campo Telefone é obrigatório.'
        ];
    }
}
