@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Cliente</h3>
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
	
	{!! Form::open(array('url'=>'gestion_cliente/cliente','method'=>'POST','autocomplete'=>'off')) !!}
	{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="cl_nombre" required value="{{old('cl_nombre')}}" class="form-control" placeholder="Nombre">
			</div>
		 </div>

		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
			<div class="form-group">
				<label>Tipo Cliente</label>
				<select name="cl_tipo_cliente" class="form-control">
					<option value="1">Titular</option>
					<option value="2">Adherente</option>
				</select>
			</div>		 
		 </div>

		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
			<div class="form-group">
				<label for="tipo documento">Tipo de Documento</label>
				<input type="text" name="cl_tipo_documento" required value="{{old('cl_tipo_documento')}}"  class="form-control" placeholder="Tipo Documento">
			</div>
		 </div>
		 
		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
			<div class="form-group">
				<label for="num documento">Número de Documento</label>
				<input type="text" name="cl_num_documento" required value="{{old('cl_num_documento')}}" class="form-control" placeholder="Número de Documento">
			</div>
		 </div>

		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
			<div class="form-group">
				<label for="direccion">Dirección</label>
				<input type="text" name="cl_direccion" required value="{{old('cl_direccion')}}" class="form-control" placeholder="Dirección">
			</div>
		 </div>
		
		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
			<div class="form-group">
				<label for="telefono">Teléfono</label>
				<input type="text" name="cl_telefono" required value="{{old('cl_telefono')}}" class="form-control" placeholder="Teléfono">
			</div>
		 </div>
		
		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 	<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="cl_email" required value="{{old('cl_email')}}" class="form-control" placeholder="Email">
			</div>
		 </div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 	<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" onclick="location.href='http://localhost:8000/gestion_cliente/cuenta'" type="reset">Cancelar</button>
			</div>
		</div>
	</div>
	{!!Form::close()!!}

@endsection