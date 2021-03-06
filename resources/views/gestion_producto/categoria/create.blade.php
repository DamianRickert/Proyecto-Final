@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Categoría</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		
			
			{!! Form::open(array('url'=>'gestion_producto/categoria','method'=>'POST','autocomplete'=>'off')) !!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombre">Nombre</label>
					<input type="text" name="ca_nombre" class="form-control" placeholder="Nombre...">
				</div>
				<div class="form-group">
					<label for="descripcion">Descripcion</label>
					<input type="text" name="ca_descripcion" class="form-control" placeholder="descripcion...">
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
			<div class="form-group">
				<label>Tipo</label>
				<select name="ca_tipo" class="form-control">
					
					<option value="1">categoria</option>
					<option value="2">subcategoria</option>
				
				</select>
			</div>		 
		 </div>
				<div class="form-group">
				
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" onclick="location.href='http://localhost:8000/gestion_producto/categoria'" type="reset">Cancelar</button>
				
				</div>

				{!!Form::close()!!}

		</div>
	</div>
@endsection
