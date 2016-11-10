@extends('layouts.admin')

@section('content')
	@include('lineaasignatura.modals.danger')
	@include('lineaasignatura.modals.edit')
		<div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Agregar Linea a Asignatura</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                	@include('lineaasignatura.forms.lia')
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lineas Asiganaturas</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                		<div class="box-body table-responsive no-padding">
						<br>
						<div id="msjuser" class="alert alert-success alert-dismissible" role="alert" style="display:none">
							<strong id="msjuser-text"></strong>
						</div>
						<table class="table table-hover">
							<thead><th>#</th><th>Asignatura</th><th>Linea de Investigacion</th><th>Opciones</th></thead>
							<tbody id="datos">

							</tbody>
						</table>
					</div>	
                  </div>
                </div>

                </div>

                </div>
                </div>
	
@endsection

@section('scripts')
	{!!Html::script('js/lineaasignatura.js')!!}
	{!!Html::script('js/select2.full.min.js')!!}
@endsection