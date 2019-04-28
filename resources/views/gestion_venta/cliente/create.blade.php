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
			{!! Form::open(array('url'=>'ventas/cliente','method'=>'POST','autocomplete'=>'off')) !!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 <div class="form-group">
				<label for="nombre">Nombre</label>
					<input type="text" name="cl_nombre" required value="{{old('cl_nombre')}}" class="form-control" placeholder="Nombre...">
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
				<label for="tipo documento">Tipo Documento</label>
					<input type="text" name="cl_tipo_documento" required value="{{old('cl_tipo_documento')}}"  class="form-control" placeholder="Tipo...">
				</div>
		 </div>
		 
		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 <div class="form-group">
				<label for="num documento">Num Documento</label>
					<input type="text" name="cl_num_documento" required value="{{old('cl_num_documento')}}" class="form-control" placeholder="Dcoumento...">
				</div>
		 </div>
		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 <div class="form-group">
				<label for="direccion">Direccion</label>
					<input type="text" name="cl_direccion"  class="form-control" placeholder="Direccion...">
				</div>
		 </div>
		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 <div class="form-group">
				<label for="telefono">Telefono</label>
					<input type="text" name="cl_telefono"  class="form-control" placeholder="telefono...">
				</div>
		 </div>
		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 <div class="form-group">
				<label for="email">Email</label>
					<input type="text" name="cl_email"  class="form-control" placeholder="Email...">
				</div>
		 </div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
		 	<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>

	{!!Form::close()!!}

@endsection
