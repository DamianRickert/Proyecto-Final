@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cliente:{{ $cliente->cl_cliente}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		
			{!!Form::model($cliente,['method'=>'PATCH','route'=>['gestion_cliente.cliente.update',$cliente->cl_id_cliente]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="cl_nombre" class="form-control" value="{{$cliente->cl_nombre}}" placeholder="Nombre...">
			</div>

			<div class="form-group">
				<label>Tipo de Documento</label>
				<select name="cl_tipo_documento" class="form-control">
					<option value="DNI">DNI</option>
					<option value="CI">Cédula de Identidad</option>
					<option value="LC">Libreta Cívica</option>
					<option value="LE">Libreta de Enrolamiento</option>
				</select>
			</div>
			
			<div class="form-group">
				<label for="num_documento">Numero Documento</label>
				<input type="text" name="cl_num_documento" class="form-control" value="{{$cliente->cl_num_documento}}" placeholder="Numero Documento...">
			</div>
			
			<div class="form-group">
				<label for="direccion">Direccion</label>
				<input type="text" name="cl_direccion" class="form-control" value="{{$cliente->cl_direccion}}" placeholder="Direccion...">
			</div>
			
			<div class="form-group">
				<label for="telefono">Telefono</label>
				<input type="text" name="cl_telefono" class="form-control" value="{{$cliente->cl_telefono}}" placeholder="Telefono...">
			</div>
			
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="cl_email" class="form-control" value="{{$cliente->cl_email}}" placeholder="Email...">
			</div>
			
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection

