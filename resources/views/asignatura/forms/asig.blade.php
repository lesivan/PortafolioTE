<form class="form-horizontal form-label-left input_mask">

    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
       {!!Form::text('codasignatura', null, ['id'=>'codigoAsignatura', 'class'=>'form-control', 'placeholder'=>'Codigo de la Asignatura'])!!}
        <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
        {!!Form::text('Asignatura', null, ['id'=>'nombreAsignatura', 'class'=>'form-control', 'placeholder'=>'Nombre de la Asignatura'])!!}
        <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-1">
             {!!link_to('#', $title='Agregar', $attributes=['id'=>'agregar', 'class'=>'btn btn-primary'], $secure = null)!!}
        </div>
    </div>
</form>