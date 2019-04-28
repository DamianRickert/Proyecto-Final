<?php

namespace ProyectoFinal;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
 protected $table= 'cuenta_corriente';

    protected $primaryKey= 'cc_id_cuenta';

    public $timestamps=false;

    protected $fillable =[
    	'cc_id_cuenta',
    	'cc_saldo',
    	'cc_id_cliente'
];

protected $guarded =[

    ];

}
