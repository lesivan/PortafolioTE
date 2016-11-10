<form class="form-horizontal form-label-left input_mask">

    <section class="col-lg-6 ">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon" style="color:black;">{!!Form::label('Asignatura: ', null, ['style'=>'width:50px;'])!!}</span>
                {!!Form::select('asignaturas', ['placeholder'=>'Selecciona'], null, ['id'=>'asignaturas', 'class'=>'form-control select2', 'style'=>'width:100%;'])!!}
            </div>
        </div>
    </section>  

     <section class="col-lg-6 ">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon" style="color:black;">{!!Form::label('Linea: ', null, ['style'=>'width:50px;'])!!}</span>
                {!!Form::select('lineas', ['placeholder'=>'Selecciona'], null, ['id'=>'lineas', 'class'=>'form-control select2', 'style'=>'width:100%;'])!!}
            </div>
        </div>
    </section>  

    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-1">
             {!!link_to('#', $title='Agregar', $attributes=['id'=>'agregar', 'class'=>'btn btn-primary'], $secure = null)!!}
        </div>
    </div>
</form>