<?php

namespace ProyectoFinal\Http\Controllers;

use Illuminate\Http\Request;

use ProyectoFinal\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ProyectoFinal\Http\Requests\CuentaFormRequest;
use ProyectoFinal\Cuenta;
use DB;

class CuentaController extends Controller
{
    public function __construct()
	{

	}   

	public function index(Request $request)
	{
		if($request)
		{
			$query = trim($request->get('searchText'));
			$cuentas = DB::table('cuenta_corriente')
			->join('cliente', 'cc_id_cuenta','=','cl_n_cuenta')
			->select('cc_id_cuenta','cc_saldo','cl_id_cliente','cl_nombre','cl_tipo_cliente', 'cl_num_documento')
			->where('cc_id_cuenta','LIKE','%'.$query.'%')
			->orwhere('cl_nombre','LIKE','%'.$query.'%')
			->orwhere('cl_num_documento','LIKE','%'.$query.'%')
			->orderBy('cc_id_cuenta')
			->paginate(7);

			return view('gestion_cliente.cuenta.index',["cuentas"=>$cuentas,"searchText"=>$query]);
		}	

	}

	public function create()
	{
		$ctacte = DB::table('cuenta_corriente')->get();
		return view("gestion_cliente.cuenta.create",["ctacte"=>$ctacte]);
	}

	public function store (CuentaFormRequest $request)
	{
		$cuenta = new Cuenta;
		$cuenta->cc_id_cuenta  = $request->get('cc_id_cuenta');
		$cuenta->cc_saldo      = $request->get('cc_saldo');
		$cuenta->save();
		return Redirect::to('gestion_cliente/cuenta');
	}

	public function show($id)
	{
		return view("gestion_cliente.cuenta.show",["cuenta"=>Cuenta::findOrFail($id)]);
	}

	public function edit($id)
	{
		$cuenta=Cuenta::findOrFail($id);
		return view("gestion_cliente.cuenta.edit",["cuenta"=>$cuenta]);
	}

	public function update(CuentaFormRequest $request,$id)
	{
		$cuenta = Cuenta::findOrFail($id);
		$cuenta->cc_saldo = $request->get('cc_saldo');
		$cuenta->update();
		return Redirect::to('gestion_cliente/cuenta');
	}

	public function destroy($id)
	{
		$cuenta = Cuenta::findOrFail($id);
		$cuenta->update();
		return Redirect::to('almacen/articulo');
	}

}
