@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Categoría:{{ $categoria->ca_nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		
			{!!Form::model($categoria,['method'=>'PATCH','route'=>['almacen.categoria.update',$categoria->ca_id_categoria]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="ca_nombre" class="form-control" value="{{$categoria->ca_nombre}}" placeholder="Nombre...">
			</div>
			<div class="form-group">
				<label for="subcategoria">Sub Categoria</label>
				<input type="text" name="ca_subcategoria" class="form-control" value="{{$categoria->ca_subcategoria}}" placeholder="subcategoria...">
			</div>
			<div class="form-group">
			
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" onclick="location.href='http://localhost:8000/gestion_cliente/cuenta'" type="reset">Cancelar</button>
			
			</div>
			{!!Form::close()!!}

		</div>
	</div>
@endsection