<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Actualizar Registro</h4>
			</div>
			<div class="modal-body">
				<div id="msjuserA" class="alert alert-success alert-dismissible" role="alert" style="display:none">
					<strong id="msjuserA-text"></strong>
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
				<input type="hidden" id="idn">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user" style="color:black;width:15px;"></i></span>
						{!!Form::text('nombreA', null, ['id'=>'nombreA', 'class'=>'form-control', 'placeholder'=>'Nombre del Estudiante'])!!}
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user" style="color:black;width:15px;"></i></span>
						{!!Form::text('apellidoA', null, ['id'=>'apellidoA', 'class'=>'form-control', 'placeholder'=>'Apellido del Estudiante'])!!}
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user" style="color:black;width:15px;"></i></span>
						{!!Form::text('carnetA', null, ['id'=>'carnetA', 'class'=>'form-control', 'placeholder'=>'Carnet del Estudiante'])!!}
					</div>
				</div>

				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope" style="color:black;width:15px;"></i></span>
						{!!Form::email('correo', null, ['id'=>'correoA', 'class'=>'form-control', 'placeholder'=>'Correo del Estudiante'])!!}
					</div>
				</div>

				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-university" style="color:black;width:15px;"></i>{!!Form::label('Carrera: ', null, ['style'=>'width:50px;'])!!}</span>
						 {!!Form::select('carreraA', ['placeholder'=>'Selecciona'], null, ['id'=>'carreraA', 'class'=>'form-control select2', 'style'=>'width:100%;'])!!}
					</div>
				</div>

				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-university" style="color:black;width:15px;"></i>{!!Form::label('Turno: ', null, ['style'=>'width:50px;'])!!}</span>
						 {!!Form::select('turnoA', ['placeholder'=>'Selecciona'], null, ['id'=>'turnoA', 'class'=>'form-control select2', 'style'=>'width:100%;'])!!}
					</div>
				</div>
			
			</div>
			<div class="modal-footer">
				 {!!link_to('#', $title='Actualizar', $attributes=['id'=>'actualizar', 'class'=>'btn btn-primary'], $secure = null)!!}
			</div>
		</div>
	</div>
</div>