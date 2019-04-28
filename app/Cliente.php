<?php

namespace ProyectoFinal;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table= 'cliente';

    protected $primaryKey= 'cl_id_cliente';

    public $timestamps=false;

    protected $fillable =[
    	'cl_nombre',
    	'cl_tipo_documento',
    	'cl_num_documento',
    	'cl_direccion',
    	'cl_telefono',
    	'cl_email',
    	'cl_n_cuenta',
    	'cl_tipo_cliente'

    ];
    protected $guarded =[

    ];




}
