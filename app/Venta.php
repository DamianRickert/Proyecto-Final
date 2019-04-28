<?php

namespace ProyectoFinal;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table= 'venta';

    protected $primaryKey= 've_id_venta';

    public $timestamps=false;

    protected $fillable =[
    	've_id_cliente',
    	've_fecha',
    	've_total',
    	've_id_cuenta'
    	
    ];
    protected $guarded =[

    ];
}
