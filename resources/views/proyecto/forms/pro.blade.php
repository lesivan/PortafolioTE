<form class="form-horizontal form-label-left">
<section class="col-lg-6">
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user" style="color:black;width:15px;"></i></span>
        {!!Form::text('nombre', null, ['id'=>'nombrep', 'class'=>'form-control', 'placeholder'=>'Nombre del Proyecto'])!!}
      </div>
    </div>
  </section>
  <section class="col-lg-6">
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user" style="color:black;width:15px;"></i></span>
        {!!Form::text('anor', null, ['id'=>'anor', 'class'=>'form-control', 'placeholder'=>'Año Realizado'])!!}
      </div>
    </div>
  </section>

  <section class="col-lg-6">
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user" style="color:black;width:15px;"></i></span>
        {!!Form::text('semestre', null, ['id'=>'semestre', 'class'=>'form-control', 'placeholder'=>'Semestre'])!!}
      </div>
    </div>
  </section>
  

<section class="col-lg-6 ">
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon" style="color:black;">{!!Form::label('Asignatura: ', null, ['style'=>'width:100px;'])!!}</span>
        {!!Form::select('asignatura', ['placeholder'=>'Selecciona'], null, ['id'=>'asignatura', 'class'=>'form-control select2', 'style'=>'width:100%;'])!!}
      </div>
    </div>
  </section>

  <section class="col-lg-6 ">
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon" style="color:black;">{!!Form::label('Linea Investigacion: ', null, ['style'=>'width:100px;'])!!}</span>
        {!!Form::select('linea', ['placeholder'=>'Selecciona'], null, ['id'=>'linea', 'class'=>'form-control select2', 'style'=>'width:100%;'])!!}
      </div>
    </div>
  </section>
  <section class="col-lg-6">
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon"><i style="color:black;width:20x;"></i>{!!Form::label('Documento: ', null, ['style'=>'width:100px;'])!!}</span>
        {!!Form::file('apellido', null, ['id'=>'doc', 'class'=>'form-control', 'placeholder'=>'Apellido del Estudiante'])!!}
      </div>
    </div>
  </section>

</form>