<?php

namespace ProyectoFinal;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table= 'categoria';

    protected $primaryKey= 'ca_id_categoria';

    public $timestamps=false;

    protected $fillable =[
    	'ca_nombre',
    	'ca_descripcion',
    	'ca_condicion',
        'ca_tipo'

    ];
    protected $guarded =[

    ];




}
