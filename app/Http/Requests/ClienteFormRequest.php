<?php

namespace ProyectoFinal\Http\Requests;

use ProyectoFinal\Http\Requests\Request;

class ClienteFormRequest extends Request
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
            'cl_nombre'         =>'required|max:100',
            'cl_tipo_documento' =>'required|max:20',
            'cl_num_documento'  =>'required|max:15',
            'cl_direccion'      =>'max:50',
            'cl_telefono'       =>'max:15',
            'cl_email'          =>'max:50',
            'cl_tipo_cliente'   =>'max:15',
            'cl_n_cuenta'       =>'max:15'
        ];
    }
}
