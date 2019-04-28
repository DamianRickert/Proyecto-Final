<?php

namespace ProyectoFinal\Http\Requests;

use ProyectoFinal\Http\Requests\Request;

class CuentaFormRequest extends Request
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
           
           'cc_id_cuenta'  =>'required|numeric',
           'cc_saldo'      =>'required|numeric|max:100',
           'cc_id_cliente' =>'required|numeric'
        ];
    }
}
