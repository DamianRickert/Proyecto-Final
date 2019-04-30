<?php

namespace ProyectoFinal\Http\Controllers;

use Illuminate\Http\Request;

use ProyectoFinal\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ProyectoFinal\Http\Requests\ArticuloFormRequest;
use ProyectoFinal\Articulo;
use DB;

class ArticuloController extends Controller
{
    public function __construct()
	{

	}   

	public function index(Request $request)
	{
		if($request)
		{
			$query=trim($request->get('searchText'));
			$articulos=DB::table('articulo')
			->join('categoria', 'ar_id_categoria','=','ca_id_categoria')
			->select('ar_id_articulo','ca_nombre as categoria','ar_nombre','ar_sexo','ar_color','ar_estacion','ar_marca','ar_talle','ar_stock','ar_descripcion','ar_precio','ar_id_subcategoria')
			->where('ar_nombre','LIKE','%'.$query.'%')
			->orderBy('ar_id_articulo','desc')
			->paginate(7);

			$categoria=DB::table('categoria')->where('ca_condicion','=','1')->get();
			
			return view('gestion_producto.articulo.index',["articulos"=>$articulos,"searchText"=>$query,"categoria"=>$categoria]);

		}	


	}
	public function create()
	{
		$categorias=DB::table('categoria')->where('ca_condicion','=','1')->get();

		$talles=DB::table('talle')->get();

		return view("gestion_producto.articulo.create",["categorias"=>$categorias,"talles"=>$talles]);
	}
	public function store (ArticuloFormRequest $request)
	{
		$articulo=new Articulo;
		$articulo->ar_id_categoria    = $request->get('ar_id_categoria');
		$articulo->ar_nombre          = $request->get('ar_nombre');
		$articulo->ar_sexo            = $request->get('ar_sexo');
		$articulo->ar_color           = $request->get('ar_color');
		$articulo->ar_estacion        = $request->get('ar_estacion');
		$articulo->ar_marca           = $request->get('ar_marca');
		$articulo->ar_talle           = $request->get('ar_talle');
		$articulo->ar_stock           = $request->get('ar_stock');
		$articulo->ar_descripcion     = $request->get('ar_descripcion');
		$articulo->ar_precio          = $request->get('ar_precio');
		$articulo->ar_id_subcategoria = $request->get('ar_id_subcategoria');
		$articulo->save();
		return Redirect::to('gestion_producto/articulo');

	}
	public function show($id)
	{
		return view("gestion_producto.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
	}
	public function edit($id)
	{
		$articulo=Articulo::findOrFail($id);
		$categorias=DB::table('categoria')->where('ca_condicion','=','1')->get();
		return view("gestion_producto.articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias]);
	}
	public function update(ArticuloFormRequest $request,$id)
	{
		$articulo=Articulo::findOrFail($id);
		$articulo->ar_id_categoria = $request->get('ar_id_categoria');
		$articulo->ar_nombre       = $request->get('ar_nombre');
		$articulo->ar_color        = $request->get('ar_color');
		$articulo->ar_sexo         = $request->get('ar_sexo');
		$articulo->ar_estacion     = $request->get('ar_estacion');
		$articulo->ar_marca        = $request->get('ar_marca');
		$articulo->ar_talle        = $request->get('ar_talle');
		$articulo->ar_stock        = $request->get('ar_stock');
		$articulo->ar_descripcion  = $request->get('ar_descripcion');
		$articulo->ar_precio       = $request->get('ar_precio');
		$articulo->ar_id_subcategoria = $request->get('ar_id_subcategoria');
		$articulo->update();
		return Redirect('gestion_producto/articulo');
	}
	public function destroy($id)
	{
		$articulo=Articulo::findOrFail($id);
		$articulo->delete();
		return Redirect::to('gestion_producto/articulo');
	}
}
