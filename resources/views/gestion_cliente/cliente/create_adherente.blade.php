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
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12"> 
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="cl_nombre" required value="{{old('cl_nombre')}}" class="form-control" placeholder="Nombre">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12"> 
			<div class="form-group">
				<label>Tipo de Documento</label>
				<select name="cl_tipo_documento" class="form-control">
					<option value="DNI">DNI</option>
					<option value="CI">Cédula de Identidad</option>
					<option value="LC">Libreta Cívica</option>
					<option value="LE">Libreta de Enrolamiento</option>
				</select>
			</div>
		</div>
	</div>
		
	<div class="row">
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12"> 
			<div class="form-group">
				<label for="num documento">Número de Documento</label>
				<input type="text" name="cl_num_documento" required value="{{old('cl_num_documento')}}" class="form-control" placeholder="Número de Documento">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12"> 
			<div class="form-group">
				<label>Sexo</label>
				<select name="cl_sexo" class="form-control">
					<option value="1">M</option>
					<option value="2">F</option>
				</select>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12"> 
			<div class="form-group">
				</select>!-->
				<input id="titular" type="radio" name="cl_tipo_cliente" value="1" disabled="true">
					Titular
				</input>
				<input id="adherente" type="radio" name="cl_tipo_cliente" value="2" checked="true" disabled="true">
					Adherente
				</input>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12"> 
			<div class="form-group">
				<label for="num documento">Número de cuenta</label>
				<select name="cl_n_cuenta" id="cl_n_cuenta" class="form-control selectpicker" data-live-search="true" disabled="true">
					<option value="{{$ad->cl_n_cuenta}}">{{$ad->cl_nombre}} - {{$ad->cl_n_cuenta}}</option>
				</select>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12"> 
			<div class="form-group">
				<label for="direccion">Dirección</label>
				<input type="text" name="cl_direccion" required value="{{old('cl_direccion')}}" class="form-control" placeholder="Dirección">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12"> 
			<div class="form-group">
				<label for="telefono">Teléfono</label>
				<input type="text" name="cl_telefono" required value="{{old('cl_telefono')}}" class="form-control" placeholder="Teléfono">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
		 	<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="cl_email" required value="{{old('cl_email')}}" class="form-control" placeholder="Email">
			</div>
		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
	 	<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a href=""><button class="btn btn-warning" onclick="location.href='http://localhost:8000/gestion_cliente/cliente/create_adherente'" type="submit">Agregar Adherente</button></a>
			<button class="btn btn-danger" onclick="location.href='http://localhost:8000/gestion_cliente/cliente'" type="reset">Cancelar</button>
		</div>
	</div>
	{!!Form::close()!!}
@endsection