<div class="row">
	<br>
	<section class="col-lg-6">
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user" style="color:black;width:15px;"></i></span>
				<?php echo Form::text('nombre', null, ['id'=>'nombre', 'class'=>'form-control', 'placeholder'=>'Nombre del Estudiante']); ?>

			</div>
		</div>
	</section>
	<section class="col-lg-6">
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user" style="color:black;width:15px;"></i></span>
				<?php echo Form::text('apellido', null, ['id'=>'apellido', 'class'=>'form-control', 'placeholder'=>'Apellido del Estudiante']); ?>

			</div>
		</div>
	</section>
	<section class="col-lg-6">
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user" style="color:black;width:15px;"></i></span>
				<?php echo Form::text('carnet', null, ['id'=>'carnet', 'class'=>'form-control', 'placeholder'=>'Carnet del Estudiante']); ?>

			</div>
		</div>
	</section>
	<section class="col-lg-6">
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope" style="color:black;width:15px;"></i></span>
				<?php echo Form::email('correo', null, ['id'=>'correo', 'class'=>'form-control', 'placeholder'=>'Correo del usuario']); ?>

			</div>
		</div>
	</section>
	<section class="col-lg-6 ">
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon" style="color:black;"><?php echo Form::label('Carrera: ', null, ['style'=>'width:100px;']); ?></span>
				<?php echo Form::select('carreras', ['placeholder'=>'Selecciona'], null, ['id'=>'carrera', 'class'=>'form-control select2', 'style'=>'width:100%;']); ?>

			</div>
		</div>
	</section>

	<section class="col-lg-6 ">
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon" style="color:black;"><?php echo Form::label('Turno: ', null, ['style'=>'width:100px;']); ?></span>
				<?php echo Form::select('Turno', ['placeholder'=>'Selecciona'], null, ['id'=>'turno', 'class'=>'form-control select2', 'style'=>'width:100%;']); ?>

			</div>
		</div>
	</section>
	
	<div class="pull-left" style="padding-left:450px;">
		<?php echo link_to('#', $title='Agregar', $attributes=['id'=>'agregar', 'class'=>'btn btn-primary btn-flat'], $secure = null); ?>

	</div>
</div>
<br>