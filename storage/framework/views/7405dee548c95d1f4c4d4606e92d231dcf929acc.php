<form class="form-horizontal form-label-left input_mask">

    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
       <?php echo Form::text('codcarrera', null, ['id'=>'codigoCarrrera', 'class'=>'form-control', 'placeholder'=>'Codigo de la Carrera']); ?>

        <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
        <?php echo Form::text('Carrera', null, ['id'=>'nombreCarrrera', 'class'=>'form-control', 'placeholder'=>'Nombre de la Carrera']); ?>

        <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-1">
             <?php echo link_to('#', $title='Agregar', $attributes=['id'=>'agregar', 'class'=>'btn btn-primary'], $secure = null); ?>

        </div>
    </div>
</form>