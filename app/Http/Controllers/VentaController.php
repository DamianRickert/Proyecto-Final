<?php

namespace ProyectoFinal\Http\Controllers;

use Illuminate\Http\Request;

use ProyectoFinal\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ProyectoFinal\Http\Requests\VentaFormRequest;
use ProyectoFinal\Venta;
use ProyectoFinal\DetalleVenta;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class VentaController extends Controller
{
    public function __construct()
	{

	}   

	public function index(Request $request)
	{
		if($request)
		{
			$query=trim($request->get('searchText'));
			$ventas=DB::table('venta')
			->join('cliente', 've_id_cliente','=','cl_id_cliente')
			->join('detalle_venta','ve_id_venta','=','dv_id_venta')
			->select('ve_id_venta','ve_id_cliente','ve_fecha','ve_total','cl_nombre as cliente')
			->where('ve_id_cliente','LIKE','%'.$query.'%')
			->orderBy('ve_id_cliente','desc')
			->paginate(7);

			$clien=DB::table('cliente')->get();
			return view('gestion_venta.venta.index',["ventas"=>$ventas,"searchText"=>$query,"clien"=>$clien]);

		}	


	}
	public function create()
	{
		$clientes=DB::table('cliente')->get();
		$articulos=DB::table('articulo')
		->select('ar_id_articulo','ar_nombre as articulo','ar_stock','ar_precio')
		->where('ar_stock','>','0')
		->orderby('ar_id_articulo')
		->get();
		return view("gestion_venta.venta.create",["clientes"=>$clientes,"articulos"=>$articulos]);
	}
	public function store (VentaFormRequest $request)
	{
		try{
			DB::beginTransaction();
			$venta=new Venta;
			$venta->ve_id_cliente          = $request->get('pidcliente');
			$venta->ve_total               = $request->get('total_venta');
			$venta->ve_id_cuenta           = $request->get('ve_id_cuenta');
			
			$mytime = Carbon::now('America/Argentina/Buenos_Aires');
			$venta->ve_fecha=$mytime->toDateTimeString();
			$venta->save();

			$dv_id_articulo        = $request->get('idarticulo');
			$dv_cantidad           = $request->get('cantidad');
			$dv_unitario           = $request->get('precio_venta');
			
			$cont = 0;
			while($cont < count($dv_id_articulo)){
				$detalle = new DetalleVenta();
				$detalle->dv_id_venta    = $venta->ve_id_venta;
				$detalle->dv_id_articulo = $dv_id_articulo[$cont];
				$detalle->dv_cantidad    = $dv_cantidad[$cont];
				$detalle->dv_unitario    = $dv_unitario[$cont];
				$detalle->dv_total       = $dv_cantidad[$cont]*$dv_unitario[$cont];
				$detalle->save();
				$cont=$cont+1;
			}
			DB::commit();
	
		}catch(\Exception $e)
		{
			DB::rollback();
		}
		 
		return Redirect::to('gestion_venta/venta');
}


	
	public function show($id)
	{
		$venta=DB::table ('venta')
		->join('cliente', 've_id_cliente','=','cl_id_cliente')
		->join('detalle_venta','ve_id_venta','=','dv_id_venta')
		->select('ve_id_venta','ve_id_cliente','cl_nombre','ve_fecha','ve_detalle','ve_total')
		->where('ve_id_venta','=',$id)
		->first();

		$detalles=DB::table('detalle_venta')
		->join('articulo', 'dv_id_articulo','=','ar_id_articulo')
		->select('ar_nombre','dv_cantidad','dv_unitario')
		->where('dv_id_venta','=',$id)
		->get();
		return view("gestion_venta.venta.show",["venta"=>$venta,"detalles"=>$detalles]);
	}
	
	public function destroy($id)
	{
		$venta=Venta::findOrFail($id);
		$venta->delete();
		return Redirect::to('gestion_venta/venta');
	}
}
