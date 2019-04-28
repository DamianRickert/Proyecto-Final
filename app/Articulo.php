<?php

namespace ProyectoFinal;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
 protected $table= 'articulo';

    protected $primaryKey= 'ar_id_articulo';

    public $timestamps=false;

    protected $fillable =[
    	'ar_id_articulo',
    	'ar_nombre',
    	'ar_sexo',
    	'ar_color',
    	'ar_estacion',
    	'ar_marca',
    	'ar_talle',
    	'ar_stock',
    	'ar_descripcion',
        'ar_precio',
        'ar_id_subcategoria'
];

protected $guarded =[

    ];

}
