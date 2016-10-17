<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('estudiante.modals.danger', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('estudiante.modals.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<section class="content">
		<div class="row">
			<section class="col-md-12 col-sm-12 col-xs-12"></section>
			<section class="col-md-12 col-sm-12 col-xs-12">
				<div class="x-panel">
					<div class="box-header">
						<h3 class="box-title"><span class="fa fa-edit"></span> Agregar Estudiante</h3>
					</div>
					<div class="box-body table-responsive no-padding">
						<form class="form-personas">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="token">
							<?php echo $__env->make('estudiante.forms.usr', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						</form>
					</div>
				</div>
				<div class="x-panel">
					<div class="box-header">
						<h3 class="box-title"><span class="fa fa-users"></span> Estudiante</h3>

						<div class="box-tools">
							<div class="input-group input-group-sm" style="width: 200px;">
								<input type="text" name="table_search" id="toSearch" class="form-control pull-right" placeholder="Search">
								<div class="input-group-btn">
									<button type="submit" id="search" class="btn btn-default"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</div>

					</div>
					<div class="box-body table-responsive no-padding">
						<br>
						<div id="msjuser" class="alert alert-success alert-dismissible" role="alert" style="display:none">
							<strong id="msjuser-text"></strong>
						</div>
						<table class="table table-hover">
							<thead><th>#</th><th>Nombre</th><th>Apellido</th><th>Carnet</th><th>Carrera</th><th>Opciones</th></thead>
							<tbody id="datos">

							</tbody>
						</table>
					</div>
				</div>
			</section>
		</div>
	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<?php echo Html::script('js/estudiantes.js'); ?>

	<?php echo Html::script('js/select2.full.min.js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>