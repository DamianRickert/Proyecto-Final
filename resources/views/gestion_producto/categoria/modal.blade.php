<div class="modal fade modal.slide-in-right" aria-hidden="true"
	role="dialog" tabindex="-1" id="modal-delete-{{$cat->ca_id_categoria}}">
	{{Form::Open(array('action'=>array('CategoriaController@destroy',$cat->ca_id_categoria),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close" >
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar Categoria</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Eliminar la categoria</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn tbn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
		
	</div>
	{{Form::Close()}}
</div>