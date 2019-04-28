@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Venta</h3>
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
			{!! Form::open(array('url'=>'gestion_venta/venta','method'=>'POST','autocomplete'=>'off')) !!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12"> 
			<div class="form-group">
				<label for="cliente">Cliente</label>
					<select name="ve_id_cliente" id="ve_id_cliente" class="form-control	selectpicker" data-live-search="true">
						<option value=""></option>
						@foreach($clientes as $cliente)
							<option value="{{$cliente->cl_id_cliente}}_{{$cliente->cl_n_cuenta}}">{{$cliente->cl_nombre}}</option>
						@endforeach
					</select>
					<input type="hidden" name="pidcliente" id="pidcliente">
					<label for="cliente">Cuenta</label>
					<input type="number" disabled name="ve_id_cuenta" id="ve_id_cuenta" class="form-control" placeholder="Cuenta">
				</div>
			</div>
		</div>
			
				<div class="panel panel-primary">
					<div class="panel-body">
						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="form-group">
								<div><label>Articulos</label></div>
								<div><select name="pidarticulo" class="form-group selectpicker" id="pidarticulo" data-live-search="true">
									<option value=""></option>
									@foreach($articulos as $articulo)
									<option value="{{$articulo->ar_id_articulo}}_{{$articulo->ar_stock}}_{{$articulo->ar_precio}}">{{$articulo->articulo}}
									</option>
									@endforeach
								</select></div>
							</div>
						</div>
						<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
							<div class="form-group">
								<label for="cantidad">Cantidad</label>
								<input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="cantidad">
							</div>
						</div>
						<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
							<div class="form-group">
								<label for="ar_stock">Stock</label>
								<input type="number" disabled name="pstock" id="pstock" class="form-control" placeholder="Stock">
							</div>
						</div>
						<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
							<div class="form-group">
								<label for="precio_venta">Precio Venta</label>
								<input type="number" name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="precio venta">
							</div>
						</div>
						<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
							<div class="form-group">
								<button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
							</div>
						</div>
						

						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
							<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
								<thead style="background-color: #A9D0F5">
									<th>Opciones</th>
									<th>Articulo</th>
									<th>Cantidad</th>
									<th>Precio Venta</th>
									<th>Subtotal</th>
								</thead>
								<tfoot>
									<th>TOTAL</th>
									<th></th>
									<th></th>
									<th></th>
									<th><h4 id="total">$0.00</h4> <input type="hidden" name="total_venta" id="total_venta"></th>
								</tfoot>
								<tbody>
									
								</tbody>
							</table>
						</div>
					</div>
			</div>

		 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar"> 
		 	<div class="form-group">
		 		<input name="_token" value="{{csrf_token() }}" type="hidden"></input>
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" onclick="location.href='http://localhost:8000/gestion_venta/venta'" type="reset">Cancelar</button>
			</div>
		</div>
	</div>

	{!!Form::close()!!}
@push ('scripts')
<script>
	$(document).ready(function(){
		$('#bt_add').click(function(){
			agregar();
		});
	});

	var cont=0;
	total=0;
	subtotal=[];
	$("#guardar").hide();                          //$("#guardar").prop('disabled', true);
	$("#pidarticulo").change(mostrarValores);
	$("#ve_id_cliente").change(mostrarCuenta);

	function mostrarCuenta()
	{
		datosCuenta=document.getElementById('ve_id_cliente').value.split('_');
		$("#ve_id_cuenta").val(datosCuenta[1]);
		$("#pidcliente").val(datosCuenta[0]);
	}

	function mostrarValores()
	{
		datosArticulos=document.getElementById('pidarticulo').value.split('_');
		$("#pprecio_venta").val(datosArticulos[2]);
		$("#pstock").val(datosArticulos[1]);
	}

	function agregar()
	{
		datosArticulos=document.getElementById('pidarticulo').value.split('_');
		
		idarticulo   = datosArticulos[0];
		articulo     = $("#pidarticulo option:selected").text();
		cantidad     = $("#pcantidad").val();
		precio_venta = $("#pprecio_venta").val();
		stock        = $("#pstock").val();

		if(idarticulo!="" && cantidad!="" && cantidad>0 && precio_venta!="")
		{
			if(stock <= cantidad)
			{

				subtotal[cont]=(cantidad*precio_venta);
				total=total+subtotal[cont];

				var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td><td><input type="hidden" name="precio_venta[]" value="'+precio_venta+'">'+precio_venta+'</td><td>'+subtotal[cont]+'</td></tr>';
				cont++;
				limpiar();
				$("#total").html("$ " + total);
				$("#total_venta").val(total);
				evaluar();
				$('#detalles').append(fila);
			}
			else
			{
				alert('La cantidad a vender supera el stock');
			}
		}
		else
		{
			alert("Error al ingresar el detalle de la venta, revise los datos del articulo")
		}
	
	}

	function limpiar(){
		$("#pcantidad").val("");
		$("#pprecio_venta").val("");
		$("#pidarticulo").val("").change();
		$("#pstock").val("");
	}
	function evaluar(){
		if(total>0)
		{
			$("#guardar").show();
		}
		else
		{
			$("#guardar").hide();
		}
	}

	function eliminar(index){
		total=total-subtotal[index];
		$("#total").html("$ " + total);
		$("#total_venta").val(total);
		$("#fila" + index).remove();
		evaluar();
	}

</script>
@endpush
@endsection