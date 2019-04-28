@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Cliente <a href="cliente/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('ventas.cliente.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				<th>Id</th>
				<th>Nombre</th>
				<th>Tipo Doc</th>
				<th>Num Doc</th>
				<th>Direccion</th>
				<th>Telefono</th>
				<th>Email</th>
				<th>Tipo Cliente</th>
				<th>Id Cuenta</th>
				<th>Opciones</th>
				</thead>
				
			@foreach ($clientes as $cli)
			<tr>
			<td>{{ $cli->cl_id_cliente}}</td>
			<td>{{ $cli->cl_nombre}}</td>
			<td>{{ $cli->cl_tipo_documento}}</td>
			<td>{{ $cli->cl_num_documento}}</td>
			<td>{{ $cli->cl_direccion}}</td>
			<td>{{ $cli->cl_telefono}}</td>
			<td>{{ $cli->cl_email}}</td>
			<td>
				@if($cli->cl_tipo_cliente==1)
					Titular
				@else
					Adherente
				@endif
			</td>
			<td>
			@foreach ($cuenta_corrientes as $cue)
				@if($cue->cc_id_cliente==$cli->cl_id_cliente)
						{{$cue->cc_id_cuenta}}
						@endif
						@endforeach
			</td>
			<td>
				<a href="{{URL::action('ClienteController@edit',$cli->cl_id_cliente)}}"><button class="btn btn-info">Editar</button></a>
				<a href="" data-target="#modal-delete-{{$cli->cl_id_cliente}}" data-toggle="modal" class="btn btn-danger">Eliminar</button></a>
			</td>	
			</tr>
			@include('ventas.cliente.modal')
			@endforeach
		</table>
		</div>
		{{$clientes->render()}}
	</div>
</div>	
@endsection