@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Cuentas <a href="cuenta/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('gestion_cliente.cuenta.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				<th>Número de cuenta</th>
				<th>Nombre</th>
				<th>Saldo</th>
				<th>Opciones</th>
				</thead>
			@foreach ($cuentas as $cue)
			<tr>
				<td>{{ $cue->cc_id_cuenta}}</td>
				<td>{{ $cue->cl_nombre}}</td>
				<td>{{ $cue->cc_saldo}}</td>
				<td>
					<a href="{{URL::action('CuentaController@edit',$cue->cc_id_cuenta)}}"><button class="btn btn-info">Editar</button></a>
					<a href="" data-target="#modal-delete-{{$cue->cc_id_cuenta}}" data-toggle="modal" class="btn btn-danger">Eliminar</button></a>
				</td>	
			</tr>
			@include('gestion_cliente.cuenta.modal')
			@endforeach
		</table>
		</div>
		{{$cuentas->render()}}
	</div>
</div>	
@endsection