<form class="form-horizontal form-label-left input_mask">

    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
       {!!Form::text('nombreli', null, ['id'=>'nombreli', 'class'=>'form-control', 'placeholder'=>'Linea de Investigacion'])!!}
        <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
        {!!link_to('#', $title='Agregar', $attributes=['id'=>'agregar', 'class'=>'btn btn-primary'], $secure = null)!!}
    </div>
</form>