@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Ventas <a href="venta/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('gestion_venta.venta.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				<th>Id_Venta</th>
				<th>Id_Cliente</th>
				<th>Fecha</th>
				<th>Total</th>
				<th>Nombre</th>
				<th>Opciones</th>
				</thead>
				
			@foreach ($ventas as $ven)
			<tr>
			<td>{{ $ven->ve_id_venta}}</td>
			<td>{{ $ven->ve_id_cliente}}</td>
			<td>{{ $ven->ve_fecha}}</td>
			<td>{{ $ven->ve_total}}</td>
			<td>{{ $ven->cliente}}</td>
			</td>
			
			
			<td>
			
				<a href="{{URL::action('VentaController@edit',$ven->ve_id_venta)}}"><button class="btn btn-info">Detalles</button></a>
				<a href="" data-target="#modal-delete-{{$ven->ve_id_venta}}" data-toggle="modal" class="btn btn-danger">Anular</button></a>
			</td>	
			</tr>
			@include('gestion_venta.venta.modal')
			@endforeach
		</table>
		</div>
		{{$ventas->render()}}
	</div>
</div>	
@endsection