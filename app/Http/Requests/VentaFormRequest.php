<?php

namespace ProyectoFinal\Http\Requests;

use ProyectoFinal\Http\Requests\Request;

class VentaFormRequest extends Request
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
            've_id_cliente'=>'required',
            've_id_cuenta'=>'required',
            'dv_id_articulo'=>'required',
            'dv_cantidad'=>'required'
        ];
    }
}
