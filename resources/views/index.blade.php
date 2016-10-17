<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Portafolio TE</title>
        
        {!!Html::style('css/bootstrap.min.css')!!}
		{!!Html::style('css/style.css')!!}
		{!!Html::style('css/font-awesome.min.css')!!}
  </head>


  	<body>

    <div class="login-form">
     <h1>Portafolio TE</h1>
 		{!!Form::open(['route'=>'log.store', 'method'=>'POST'])!!}
				<div class="form-group has-feedback">
					{!!Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Correo electrónico'])!!}
					<i class="fa fa-envelope form-control-feedback" aria-hidden="true"></i>
				</div>
				<div class="form-group has-feedback">
					{!!Form::password('password', ['class'=>'form-control', 'placeholder'=>'Contraseña'])!!}
					<i class="fa fa-unlock-alt form-control-feedback" aria-hidden="true"></i>
				</div>
				<div class="row">
					<div class="col-xs-8"><p></p></div>
					<div class="col-xs-4">{!!Form::submit('Iniciar', ['class'=>'btn btn-primary btn-block btn-flat', 'id'=>'logbutton'])!!}</div>
				</div>
			{!!Form::close()!!}
			<div id="divider"></div>
			@include('alerts.errors')
			@include('alerts.request')
     </div>
    
   </div>
  </body>
  
  	{!!Html::script('js/jquery.min.js')!!}
	{!!Html::script('js/bootstrap.min.js')!!}
</html>

