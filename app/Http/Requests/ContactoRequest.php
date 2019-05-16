<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoRequest extends FormRequest
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
            'mensaje' => 'min:10|required',
            'nombre' => 'min:4|required',
            'empresa' => 'min:2|required',
            'apellido' => 'min:3|required',
            'email' => 'email|required',
            'check' => 'required'
        ];
    }
}
