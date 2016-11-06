<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Portafolio TE</title>
        
        {!!Html::style('css/bootstrap.min.css')!!}
		{!!Html::style('css/style.css')!!}
		{!!Html::style('css/font-awesome.min.css')!!}
		{!!Html::style('css/login.css')!!}
		{!!Html::style('css/custom.min.css')!!}

  </head>


  	<body>

    <div class="login-form">
     <h1 style="color: #2a3f54"	>Portafolio TE</h1>
     <div style="text-align:center;">
				<img src="/images/TE.jpg" class="img-circle" style="width:100xp; height:100xp; border:3px solid; border-color:#2a3f54; ">
			</div>

			<div id="divider"></div>
			<p class="login-box-msg" style="color: #2a3f54;text-shadow: 0.5px 0.4px #000">Ingresa tus datos para iniciar sesión</p>
 		{!!Form::open(['route'=>'log.store', 'method'=>'POST'])!!}
				<div class="form-group has-feedback">
					{!!Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Correo electrónico'])!!}
					<span class="fa fa-envelope form-control-feedback"  style="color: #fff" ></span>
					
				
				</div>
				<div class="form-group has-feedback">
					{!!Form::password('password', ['class'=>'form-control', 'placeholder'=>'Contraseña'])!!}
					<i class="fa fa-lock form-control-feedback" style="color: #fff"></i>
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

