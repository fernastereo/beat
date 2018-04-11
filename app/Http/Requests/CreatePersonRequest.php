<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePersonRequest extends FormRequest
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
            'id_person'             => 'required|unique:persons,id_person|digits_between:6,12',
            'verification_digit'    => 'digits:1',
            'name'                  => 'required|max:255',
            'address'               => 'string|max:255',
            'city_name'             => 'string|max:255',
            'email'                 => 'string|unique:persons,email|email|max:255',
            'phone_number_1'        => 'string|max:50',
            'phone_number_2'        => 'string|max:50',
            'cellphone_number_1'    => 'string|max:50',
            'credit_limit'          => 'numeric|min:0',
            'credit_used'           => 'numeric|min:0',
        ];
    }

    public function messages(){
        return [
            'id_person.required'        => 'La identificación no puede ser vacía',
            'id_person.unique'          => 'La identificación suministrada ya está siendo usada por otro usuario',
            'id_person.digits_between'  => 'La identificación no es válida',
            'verification_digit.digits' => 'El degito de verificación no es válido',
            'name.required'             => 'Nombre No puede ser vacío',
            'name.max'                  => 'Nombre tiene mas de 255 caracteres',
            'address.max'               => 'Dirección tiene mas de 255 caracteres',
            'email.unique'              => 'La dirección de e-mail ya está siendo usada por otro usuario',
            'email.email'               => 'La dirección de e-mail no es válida',
            'email.max'                 => 'La dirección de e-mail supera la longitud permitida',
            'phone_number_1.max'        => 'El número de teléfono 1 supera la longitud permitida',
            'phone_number_2.max'        => 'El número de teléfono 2 supera la longitud permitida',
            'cellphone_number_1.max'    => 'El número de celular supera la longitud permitida',
            'credit_limit.numeric'      => 'El valor de cupo de crédito no es válido',
            'credit_limit.min'          => 'El valor de cupo de crédito no es válido',
            'credit_used.numeric'       => 'El valor de crédito usado no es válido',
            'credit_used.min'           => 'El valor de crédito usado no es válido',
        ];
    }
}
