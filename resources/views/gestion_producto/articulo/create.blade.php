@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Articulo</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>		
			{!! Form::open(array('url'=>'gestion_producto/articulo','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 <div class="form-group">
				<label for="nombre">Nombre</label>
					<input type="text" name="ar_nombre" required value="{{old('ar_nombre')}}" class="form-control" placeholder="Nombre...">
				</div>
		 </div>
		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
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
		 </div>
		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 <div class="form-group">
				<label for="sexo">Sexo</label>
					<input type="text" name="ar_sexo"  class="form-control" placeholder="Sexo...">
				</div>
		 </div>
		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 <div class="form-group">
				<label for="color">Color</label>
					<input type="text" name="ar_color"  class="form-control" placeholder="Color...">
				</div>
		 </div>
		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 <div class="form-group">
				<label for="estacion">Estacion</label>
					<input type="text" name="ar_estacion"  class="form-control" placeholder="Estacion...">
				</div>
		 </div>
		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 <div class="form-group">
				<label for="marca">Marca</label>
					<input type="text" name="ar_marca"  class="form-control" placeholder="Marca...">
				</div>
		 </div>
		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 <div class="form-group">
				<label for="talle">Talle</label>
					<input type="text" name="ar_talle"  class="form-control" placeholder="Talle...">
				</div>
		 </div>
		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 <div class="form-group">
				<label for="stock">Stock</label>
					<input type="text" name="ar_stock" required value="{{old('ar_stock')}}" class="form-control" placeholder="Stock...">
				</div>
		 </div>
		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 <div class="form-group">
				<label for="descripcion">Descripcion</label>
					<input type="text" name="ar_descripcion"  class="form-control" placeholder="Estado...">
				</div>
		 </div>
		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 <div class="form-group">
				<label for="estado">Estado</label>
					<input type="text" name="ar_estado"  class="form-control" placeholder="Estado...">
				</div>
		 </div>
		  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 <div class="form-group">
				<label for="precio">Precio</label>
					<input type="text" name="ar_precio"  class="form-control" placeholder="Precio...">
				</div>
		 </div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
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
		 </div>	

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 	<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" onclick="location.href='http://localhost:8000/gestion_producto/articulo'" type="reset">Cancelar</button>
			</div>
		</div>
	</div>

	{!!Form::close()!!}

@endsection
