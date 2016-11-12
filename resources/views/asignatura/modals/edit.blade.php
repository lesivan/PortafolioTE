<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Actualizar Registro</h4>
            </div>
            <div class="modal-body">
                <div id="msjuserA" class="alert alert-success alert-dismissible" role="alert" style="display:none">
                    <strong id="msjuserA-text"></strong>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <input type="hidden" id="idn">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-university" style="color:black;width:15px;"></i></span>
                        {!!Form::text('codigoAsignaturaA', null, ['id'=>'codigoAsignaturaA', 'class'=>'form-control', 'placeholder'=>'Codigo de la Asignatura'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-university" style="color:black;width:15px;"></i></span>
                        {!!Form::text('nombreAsignaturaA', null, ['id'=>'nombreAsignaturaA', 'class'=>'form-control', 'placeholder'=>'Nombre de la Asignatura'])!!}
                    </div>
                </div>
            
            </div>
            <div class="modal-footer">
                 {!!link_to('#', $title='Actualizar', $attributes=['id'=>'actualizar', 'class'=>'btn btn-primary'], $secure = null)!!}
            </div>
        </div>
    </div>
</div>