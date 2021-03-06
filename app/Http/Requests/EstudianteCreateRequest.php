<?php

namespace PortafolioTE\Http\Requests;

use PortafolioTE\Http\Requests\Request;

class EstudianteCreateRequest extends Request
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
            
            'Ncarnet' => 'required|unique:estudiante',
            'Nombre' => 'required',
            'Apellido' => 'required',
            'correo' => 'required|email|unique:estudiante',
        ];
    }
}
