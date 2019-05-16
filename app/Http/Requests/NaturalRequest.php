<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NaturalRequest extends FormRequest
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
            'nombre' => 'required',
            'imagen' => 'required',
            'orden' => 'max:10|required',
            'contenido' => 'required',
            'codigo' => 'max:10|required'
        ];
    }
}
