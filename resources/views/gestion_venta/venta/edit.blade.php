@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Articulos:{{ $articulo->ar_nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		
	{!!Form::model($articulo,['method'=>'PATCH','route'=>['gestion_producto.articulo.update',$articulo->ar_id_articulo]])!!}
			{{Form::token()}}
			
			<div class="form-group">
				<label>Categoría</label>
				<select name="ar_id_categoria" class="form-control">
					@foreach ($categorias as $cat)
					@if ($cat->ca_tipo==1)
					<option value="{{$cat->ca_id_categoria}}">{{$cat->ca_nombre}}</option>
					@endif
					@endforeach
				</select>
			</div>		 
			
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="ar_nombre" class="form-control" value="{{$articulo->ar_nombre}}" placeholder="Nombre...">
			</div>

			<div class="form-group">
				<label for="nombre">Color</label>
				<input type="text" name="ar_color" class="form-control" value="{{$articulo->ar_color}}" placeholder="color...">
			</div>
			<div class="form-group">
				<label for="nombre">Sexo</label>
				<input type="text" name="ar_sexo" class="form-control" value="{{$articulo->ar_sexo}}" placeholder="Sexo...">
			</div>
			<div class="form-group">
				<label for="nombre">Estacion</label>
				<input type="text" name="ar_estacion" class="form-control" value="{{$articulo->ar_estacion}}" placeholder="Estacion...">
			</div>
			<div class="form-group">
				<label for="marca">Marca</label>
				<input type="text" name="ar_marca" class="form-control" value="{{$articulo->ar_marca}}" placeholder="marca...">
			</div>
			<div class="form-group">
				<label for="nombre">Talle</label>
				<input type="text" name="ar_talle" class="form-control" value="{{$articulo->ar_talle}}" placeholder="Talle...">
			</div>
			<div class="form-group">
				<label for="nombre">Stock</label>
				<input type="text" name="ar_stock" class="form-control" value="{{$articulo->ar_stock}}" placeholder="Stock...">
			</div>
			<div class="form-group">
				<label for="nombre">Descripcion</label>
				<input type="text" name="ar_descripcion" class="form-control" value="{{$articulo->ar_descripcion}}" placeholder="Descripcion...">
			</div>
			<div class="form-group">
				<label for="nombre">Precio</label>
				<input type="text" name="ar_precio" class="form-control" value="{{$articulo->ar_precio}}" placeholder="Precio...">
			</div>
			<div class="form-group">
				<label>Subcategorias</label>
				<select name="ar_id_subcategoria" class="form-control">
					@foreach ($categorias as $cat)
					@if ($cat->ca_tipo==2)
					<option value="{{$cat->ca_id_categoria}}">{{$cat->ca_nombre}}</option>
					@endif
					@endforeach
				</select>
			</div>		 
			<div class="form-group">
			
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			
			</div>
			{!!Form::close()!!}

		</div>
	</div>
@endsection