@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Artículos <a href="articulo/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('gestion_producto.articulo.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				<th>Id</th>
				<th>Categoria</th>
				<th>Nombre</th>
				<th>Color</th>
				<th>Sexo</th>
				<th>Estacion</th>
				<th>Marca</th>
				<th>Talle</th>
				<th>Stock</th>
				<th>Descripcion</th>
				<th>Precio</th>
				<th>Subcategoria</th>
				<th>Opciones</th>
				</thead>
				
			@foreach ($articulos as $art)
			<tr>
			<td>{{ $art->ar_id_articulo}}</td>
			<td>{{ $art->categoria}}</td>
			<td>{{ $art->ar_nombre}}</td>
			<td>{{ $art->ar_color}}</td>
			<td>{{ $art->ar_sexo}}</td>
			<td>{{ $art->ar_estacion}}</td>
			<td>{{ $art->ar_marca}}</td>
			<td>{{ $art->ar_talle}}</td>
			<td>{{ $art->ar_stock}}</td>
			<td>{{ $art->ar_descripcion}}</td>
			<td>{{ $art->ar_precio}}</td>
			<td>
			@foreach ($categoria as $cat)
			@if ($cat->ca_id_categoria==$art->ar_id_subcategoria)
				{{ $cat->ca_nombre}}
			@endif
			@endforeach
			</td>
			<td>
				<a href="{{URL::action('ArticuloController@edit',$art->ar_id_articulo)}}"><button class="btn btn-info">Editar</button></a>
				<a href="" data-target="#modal-delete-{{$art->ar_id_articulo}}" data-toggle="modal" class="btn btn-danger">Eliminar</button></a>
			</td>	
			</tr>
			@include('gestion_producto.articulo.modal')
			@endforeach
		</table>
		</div>
		{{$articulos->render()}}
	</div>
</div>	
@endsection