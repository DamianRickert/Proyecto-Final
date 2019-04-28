<?php

namespace ProyectoFinal\Http\Requests;

use ProyectoFinal\Http\Requests\Request;

class ArticuloFormRequest extends Request
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
           
           'ar_id_categoria'   =>'numeric',
           'ar_nombre'         =>'required|max:100',
           'ar_sexo'           =>'max:1',
           'ar_color'          =>'max:25',
           'ar_estacion'       =>'max:20',
           'ar_marca'          =>'max:30',
           'ar_talle'          =>'max:5',
           'ar_stock'          =>'numeric',
           'ar_descripcion'    =>'max:45',
           'ar_precio'         =>'numeric',
           'ar_id_subcategoria'=>'numeric'
        ];
    }
}
