@extends('layouts.admin')

@section('content')
    @include('proyecto.modals.danger')
    @include('proyecto.modals.edit')
              <div class="">
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Agregar Proyecto</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">


                        <!-- Smart Wizard -->
                    

                        <div id="wizard" class="form_wizard wizard_horizontal">
                          <ul class="wizard_steps">
                            <li>
                              <a href="#step-1">
                                <span class="step_no">1</span>
                                <span class="step_descr">
                                                  Agregar Proyecto<br />
                                                  <small>LLenar todos los campos</small>
                                              </span>
                              </a>
                            </li>
                            <li>
                              <a href="#step-2">
                                <span class="step_no">2</span>
                                <span class="step_descr">
                                                  Agregar estudiante<br />
                                                  <small>Llenar todos los campos</small>
                                              </span>
                              </a>
                            </li>
                          </ul>
                          <div id="step-1">
                          <h2 class="StepTitle">Datos del Proyecto</h2>
                           @include('proyecto.forms.pro')
                          </div>
                          <div id="step-2">  
                          <div class="col-md-4 col-xs-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Buscar estudiante</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              @include('proyecto.forms.bus')
                            </div>
                          </div>
                          </div>

                          <div class="col-md-8 col-xs-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Estudiantes</h2>
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
                                    <thead><th>#</th><th>Estudiante</th><th>Carnet</th><th>Carrera</th><th>Opciones</th></thead>
                                    <tbody id="datos">

                                    </tbody>
                                </table>
                            </div> 
                            </div>
                          </div>
                          </div>
                          </div>                
                        </div>
                        <!-- End SmartWizard Content -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
           
@endsection

@section('scripts')
    {!!Html::script('js/proyectos.js')!!}
    {!!Html::script('js/select2.full.min.js')!!}
    {!!Html::script('js/jquery.smartWizard.js') !!}
    <script>
      $(document).ready(function() {
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
          transitionEffect: 'slide'
        });

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
      });
    </script>

@endsection