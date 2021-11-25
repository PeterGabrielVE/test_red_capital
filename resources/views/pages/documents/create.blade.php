<!-- Modal Create-->
{!! Form::open(['route'=>"documents.store",'method'=>'POST','files'=>'true','id'=>'form_document']) !!}
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class="icon-person"></i> Agregar Nuevo {{ $title ?? 'Documento' }}</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
                
                    <div class="col-md-6">
						<div class="form-group m-0 has-feedback">
							{!! Form::label('lbl_user', 'Usuario', ['class'=>'col-form-label s-12']) !!}
                            {!! Form::select('id_user', $users,null, ['class'=>'form-control r-0 light s-12', 'id'=>'id_user','required']) !!}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group m-0">
							{!! Form::label('lbl_file', 'Documento', ['class'=>'col-form-label s-12']) !!}
							<input type="file" name="files" id="form-file" required />
						</div>
					</div>
            
				</div>

			</div>
			<br>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-uft" onclick="cerrarModal()"><i class="icon-save mr-2"></i>Guardar Datos</button>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}




