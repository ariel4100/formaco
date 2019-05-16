<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContenidoRequest extends FormRequest
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
            'titulo' => 'min:4|max:600|required',
            'contenido' => 'min:5|max:2000|required',
            'imagen' => 'required'
        ];
    }
}
