<form class="form-horizontal form-label-left input_mask">
  <section class="col-lg-12 ">
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon" style="color:black;">{!!Form::label('Carnet: ', null, ['style'=>'width:65px;'])!!}</span>
        {!!Form::select('carnet', ['placeholder'=>'Selecciona'], null, ['id'=>'carnet', 'class'=>'form-control select2', 'style'=>'width:100%;'])!!}
      </div>
    </div>
  </section>

    <div class="col-md-8 col-sm-6 col-xs-12 form-group has-feedback">
        {!!link_to('#', $title='Agregar', $attributes=['id'=>'agregar', 'class'=>'btn btn-primary'], $secure = null)!!}
    </div>
</form>