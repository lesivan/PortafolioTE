<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Portafolio TE</title>
        
        <?php echo Html::style('css/bootstrap.min.css'); ?>

		<?php echo Html::style('css/style.css'); ?>

		<?php echo Html::style('css/font-awesome.min.css'); ?>

  </head>


  	<body>

    <div class="login-form">
     <h1>Portafolio TE</h1>
 		<?php echo Form::open(['route'=>'log.store', 'method'=>'POST']); ?>

				<div class="form-group has-feedback">
					<?php echo Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Correo electrónico']); ?>

					<i class="fa fa-envelope form-control-feedback" aria-hidden="true"></i>
				</div>
				<div class="form-group has-feedback">
					<?php echo Form::password('password', ['class'=>'form-control', 'placeholder'=>'Contraseña']); ?>

					<i class="fa fa-unlock-alt form-control-feedback" aria-hidden="true"></i>
				</div>
				<div class="row">
					<div class="col-xs-8"><p></p></div>
					<div class="col-xs-4"><?php echo Form::submit('Iniciar', ['class'=>'btn btn-primary btn-block btn-flat', 'id'=>'logbutton']); ?></div>
				</div>
			<?php echo Form::close(); ?>

			<div id="divider"></div>
			<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     </div>
    
   </div>
  </body>
  
  	<?php echo Html::script('js/jquery.min.js'); ?>

	<?php echo Html::script('js/bootstrap.min.js'); ?>

</html>

