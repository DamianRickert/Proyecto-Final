@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Categorías <a href="categoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('gestion_producto.categoria.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				<th>Id</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Tipo</th>
				<th>Opciones</th>
				</thead>
			@foreach ($categorias as $cat)
			<tr>
			<td>{{ $cat->ca_id_categoria}}</td>
			<td>{{ $cat->ca_nombre}}</td>
			<td>{{ $cat->ca_descripcion}}</td>
			<td>
				@if($cat->ca_tipo == 1)
					Categoría
				@else
					Subcategoría
				@endif
				</td>
			<td>
				<a href="{{URL::action('CategoriaController@edit',$cat->ca_id_categoria)}}"><button class="btn btn-info">Editar</button></a>
				<a href="" data-target="#modal-delete-{{$cat->ca_id_categoria}}" data-toggle="modal" class="btn btn-danger">Eliminar</button></a>
			</td>	
			</tr>
			@include('gestion_producto.categoria.modal')
			@endforeach
		</table>
		</div>
		{{$categorias->render()}}
	</div>
</div>	
@endsection