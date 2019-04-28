<?php

namespace ProyectoFinal\Http\Controllers;

include 'Funciones/funciones.php'; 
use Illuminate\Http\Request;
use ProyectoFinal\Http\Requests;
use ProyectoFinal\Cliente;
use Illuminate\Support\Facades\Redirect;
use ProyectoFinal\Http\Requests\ClienteFormRequest;
use DB;


class ClienteController extends Controller
{
    public function __construct()
	{

	}   

	public function index(Request $request)
	{
		if($request)
		{
			$query = trim($request->get('searchText'));
			
			$clientes = DB::table('cliente')
			->where('cl_nombre','LIKE','%'.$query.'%')
			//->where ('cl_tipo_cliente','=','Titular')
			//->where ('cl_tipo_cliente','=','Adherente')
			->orwhere('cl_num_documento','LIKE','%'.$query.'%')
			//->where ('cl_tipo_cliente','=','Titular')
			//->where ('cl_tipo_cliente','=','Adherente')
			->orderBy('cl_id_cliente')
			->paginate(7);

			$cuenta_corrientes = DB::table('cuenta_corriente')->get();
			
			return view('gestion_cliente.cliente.index',["clientes"=>$clientes,"searchText"=>$query,"cuenta_corrientes"=>$cuenta_corrientes]);
		}
	}

	public function create()
	{	
		$clientes=DB::table('cliente')->get();
		
		$titulares=DB::table('cliente')
		->select('cl_nombre','cl_n_cuenta')
		->where('cl_tipo_cliente','=','1')
		->get();

		$adherentes=DB::table('cliente')
		->select('cl_nombre','cl_n_cuenta')
		->orderBy('cl_id_cliente','desc')
		->first();

		return view("gestion_cliente.cliente.create",["clientes"=>$clientes,"titulares"=>$titulares,"adherentes"=>$adherentes]);
	}
	
	public function store (ClienteFormRequest $request)
	{
		$sexo = $request->get('cl_sexo');

		$cliente = new Cliente;

		$cliente->cl_tipo_cliente   = $request->get('cl_tipo_cliente');
		$cliente->cl_nombre         = $request->get('cl_nombre');
		$cliente->cl_tipo_documento = $request->get('cl_tipo_documento');
		$cliente->cl_num_documento  = $request->get('cl_num_documento');
		$cliente->cl_direccion      = $request->get('cl_direccion');
		$cliente->cl_telefono       = $request->get('cl_telefono');
		$cliente->cl_email          = $request->get('cl_email');
		$cliente->cl_n_cuenta       = GeneraCuenta($sexo, $request->get('cl_num_documento'));

		if($cliente->cl_tipo_cliente == 1){
			DB::select('call dbventaslaravel.sp_genera_cuenta(?,?)', array($cliente->cl_num_documento, $sexo));
		}
		else{
			$cliente->cl_n_cuenta = $request->get('cl_n_cuenta');
		}

		$cliente->save();
		
		return Redirect::to('gestion_cliente/cliente');
	}
	
	public function show($id)
	{
		return view("gestion_cliente.cliente.show",["cliente"=>CLiente::findOrFail($id)]);
	}
	
	public function edit($id)
	{
		return view("gestion_cliente.cliente.edit",["cliente"=>Cliente::findOrFail($id)]);
	}
	
	public function update(ClienteFormRequest $request,$id)
	{
		$cliente = Cliente::findOrFail($id);
		$cliente->cl_nombre         = $request->get('cl_nombre');
		$cliente->cl_tipo_documento = $request->get('cl_tipo_documento');
		$cliente->cl_num_documento  = $request->get('cl_num_documento');
		$cliente->cl_direccion      = $request->get('cl_direccion');
		$cliente->cl_telefono       = $request->get('cl_telefono');
		$cliente->cl_email          = $request->get('cl_email');
		$cliente->update();
		
		return Redirect::to('gestion_cliente/cliente');
	}
	
	public function destroy($id)
	{
		$cliente = Cliente::findOrFail($id);
		$cliente->cl_tipo_cliente = 0;
		$cliente->update();
		
		return Redirect::to('gestion_cliente/cliente');
	}
}
