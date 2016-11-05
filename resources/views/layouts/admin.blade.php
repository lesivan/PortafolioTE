<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portafolio TE</title>

    {!!Html::style('css/select2.css')!!}
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    {!!Html::style('css/ionicons.min.css')!!}
    {!!Html::style('css/custom.min.css')!!}
    <!-- Date Picker -->
    {!!Html::style('css/datepicker3.css')!!}

   
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{!!URL::to('/admin')!!}" class="site_title"><i class="fa fa-pencil"></i> <span>Portafolio TE</span></a>
            </div>

            <div class="clearfix"></div>
            <div class="profile">
              <div class="profile_pic"><img src="images/TE.jpg" class="img-circle profile_img"></div>
              <div class="profile_info"><span>Binvenido,</span><h2>{!!Auth::user()->name!!}</h2></div>
            </div>
            <div class="clearfix"></div>

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <div class="clearfix"></div>
                <ul class="nav side-menu">
                  <li><a href="index.html"><i class="fa fa-home"></i>Buscar Proyecto</a> 
                  </li>
                  <li><a><i class="fa fa-edit"></i> Opciones <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                      <li><a href="AgregarProyecto.html">Agregar Proyecto</a></li>
                      <li><a href="{!!URL::to('/estudiante')!!}">Agregar Estudiante</a></li>
                    </ul>
                  </li>
                  @if (Auth::user()->id_type == 1)
                  <li><a><i class="fa fa-desktop"></i>Carrera <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{!!URL::to('/carrera')!!}">Agregar Carrera</a></li>
                      <li><a href="{!!URL::to('/turno')!!}">Agregar Turno</a></li>
                      <li><a href="{!!URL::to('/carreraturno')!!}">Turno de Carrera</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i>Asignatura <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{!!URL::to('/asignatura')!!}">Agregar Asignatura</a></li>
                      <li><a href="{!!URL::to('/lineainvestigacion')!!}">Agregar Linea de Investigacion</a></li>
                      <li><a href="{!!URL::to('/lineainvestigacion')!!}">Linea de Asignatura</a></li>
                    </ul>
                  </li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle"><a id="menu_toggle"><i class="fa fa-bars"></i></a></div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/TE.jpg" alt="">{!!Auth::user()->name!!}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a id="userPassButton"><i class="fa fa-user pull-right"></i>Cambiar Contraseña</a></li>
                    
                    <li><a href="{!!URL::to('/logout')!!}"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesión</a></li>
                  </ul>
                </li>@if (Auth::user()->id_type == 1)
                <li role='presentation'><a href="{!!URL::to('/usuario')!!}" class="info-number"><i class="fa fa-user"></i> Usuarios</a></li>
                @endif
              </ul> 
            </nav>
          </div>
        </div>

        <div class="right_col" role="main">
         
         @include('alerts.errors')
         @include('layouts.userPass')
         @yield('content')

        <div id="dashboard" style="display:none;">
        <section class="content-header">
          <h1>Portafolio TE</h1>
        </section>

                  <div class="row">
                      <div class="animated flipInY col-lg-4 col-md-3 col-sm- col-xs-6">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-caret-square-o-right"></i>
                          </div>
                          <div class="count">0</div>

                          <h3>IE</h3>
                          <p>Proyectos</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-comments-o"></i>
                          </div>
                          <div class="count">0</div>

                          <h3>DGM</h3>
                          <p>Proyectos</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-sort-amount-desc"></i>
                          </div>
                          <div class="count">0</div>

                          <h3>OVT</h3>
                          <p>Proyectos</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-check-square-o"></i>
                          </div>
                          <div class="count">0</div>

                          <h3>Mensual</h3>
                          <p>Proyectos Agregados</p>
                        </div>
                      </div>
                    </div>
                    </div>
                    
         
        </div>
        <footer>
          <div class="pull-right">Tecnologia Educativa</div>
          <div class="clearfix"></div>
        </footer>

      </div>
    </div>

    {!!Html::script('js/jquery.min.js')!!}
   
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/bootstrap-datepicker.js')!!}
    {!!Html::script('js/jquery.slimscroll.min.js')!!}
    {!!Html::script('js/fastclick.js')!!}
    {!!Html::script('js/userPass.js')!!}
    {!!Html::script('js/custom.min.js')!!}
    <script>
      $(function(){
        if ('{{Request::path()}}' == 'admin'){
          $('#dashboard').fadeIn();
        }
        //setDetails({!!Auth::user()->id!!});

        $('#userPassButton').on('click', function(){
          $('#modalUserPass').modal('toggle');
          mostrarUP({!!Auth::user()->id!!})
        });
        
      });
    </script>
    

    @section('scripts')
    @show
  
  </body>
</html>
