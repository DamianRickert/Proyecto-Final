<?php

namespace ProyectoFinal\Http\Controllers;

use Illuminate\Http\Request;

use ProyectoFinal\Http\Requests;
use ProyectoFinal\Categoria;
use Illuminate\Support\Facades\Redirect;
use ProyectoFinal\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
{
    public function __construct()
	{

	}   

	public function index(Request $request)
	{
		if($request)
		{
			$query=trim($request->get('searchText'));
			$categorias=DB::table('categoria')->where('ca_nombre','LIKE','%'.$query.'%')
			->where ('ca_condicion','=','1')
			->orderBy('ca_id_categoria','desc')
			->paginate(7);
			return view('gestion_producto.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);

		}	


	}
	public function create()
	{
		return view("gestion_producto.categoria.create");
	}
	public function store (CategoriaFormRequest $request)
	{
		$categoria=new Categoria;
		$categoria->ca_nombre=$request->get('ca_nombre');
		$categoria->ca_descripcion=$request->get('ca_descripcion');
		$categoria->ca_tipo=$request->get('ca_tipo');
		$categoria->ca_condicion='1';
		$categoria->save();
		return Redirect::to('gestion_producto/categoria');

	}
	public function show($id)
	{
		return view("gestion_producto.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
	}
	public function edit($id)
	{
		return view("gestion_producto.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
	}
	public function update(CategoriaFormRequest $request,$id)
	{
		$categoria=Categoria::findOrFail($id);
		$categoria->ca_nombre=$request->get('ca_nombre');
		$categoria->ca_descripcion=$request->get('ca_descripcion');
		$categoria->update();
		return Redirect('gestion_producto/categoria');
	}
	public function destroy($id)
	{
		$categoria=Categoria::findOrFail($id);
		$categoria->ca_condicion='0';
		$categoria->update();
		return Redirect::to('gestion_producto/categoria');
	}
}
