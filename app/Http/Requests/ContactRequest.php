<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        if ($this->method() == 'PUT') {
            $id = $this->route()->parameter('id');

            $email_rules   = 'required|email|unique:contacts,email,'.$id.',id';
            $contact_rules = 'required|min:9|max:9|unique:contacts,contact,'.$id.',id';
        }
        else {
            $email_rules   = 'required|email|unique:contacts,email';
            $contact_rules = 'required|min:9|max:9|unique:contacts,contact';
        }

        return [
            'name'    => 'required|min:5',
            'email'   => $email_rules,
            'contact' => $contact_rules
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo Nome é obrigatório.',
            'name.min' => 'O Nome deve conter no mínimo 5 caracteres.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.unique' => 'Esse E-mail já está cadastrado. Por favor, informe um valor diferente.',
            'contact.required' => 'O campo Contato é obrigatório.',
            'contact.min' => 'Contato deve conter no mínimo 9 dígitos.',
            'contact.max' => 'Contato deve conter no máximo 9 dígitos.',
            'contact.unique' => 'Esse Contato já está cadastrado. Por favor, informe um número diferente.'
        ];
    }
}
