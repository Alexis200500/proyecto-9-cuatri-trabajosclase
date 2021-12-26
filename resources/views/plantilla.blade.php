
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>My-dentis</title>
    
    @yield('css')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"/>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{URL::asset('./vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::asset('./vendors/font-awesome/css/font-awesome.min.css')}}">
    <!-- NProgress -->
    <link rel="stylesheet" href="{{URL::asset('./vendors/nprogress/nprogress.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{URL::asset('./vendors/iCheck/skins/flat/green.css')}}">
	
    <!-- bootstrap-progressbar -->
    <link rel="stylesheet" href="{{URL::asset('./vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{URL::asset('./vendors/jqvmap/dist/jqvmap.min.css')}}"/>
    <!-- bootstrap-daterangepicker -->
    <link rel="stylesheet" href="{{URL::asset('./vendors/bootstrap-daterangepicker/daterangepicker.css')}}">

    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{URL::asset('./build/css/custom.min.css')}}">
    <!--<link href="https://bootswatch.com/4/darkly/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{URL::asset('./build/css/custom.css')}}" >
    <!--estilos-->
  <link rel="stylesheet" href="{{URL::asset('./build/css/estilos.css')}}">

    {{-- ESCaneer --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>


    {{-- Carrito --}}
{{--     @yield('carrito')
    <meta http-equip="Content-Type" content="text/html; charset=utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <style>
        .card {
            margin: 10px 5px 20px 5px;
        }
        nav {
            background-color: #eee;
        }
    </style>
 --}}
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index" class="site_title"><i class="fa fa-space-shuttle"></i> <span>MY-DENTIS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{URL::asset('./production/images/alex.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>Alexis Morales</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                 
                  <li><a href="{{route('sinfoto')}}"><i class="fa fa-user"></i>Modal sin File  <!--<span class="fa fa-chevron-down"></span>--></a>
                    <!-- <ul class="nav child_menu">                
                      <li><a href="./production/formulario.html">Alta usuarios</a></li>
                      <li><a href="./production/formulario.html">Reporte usuarios</a></li>
                      <li><a href="./production/formulario.html">Eliminación usuarios</a></li>
                      <li><a href="./production/formulario.html">Modificación usuarios</a></li>
                    </ul> -->
                  </li>
                  <li><a href="{{route('odontologos')}}"><i class="fa fa-user"></i>Modal con File  <!--<span class="fa fa-chevron-down"></span>--></a>
                    <!-- <ul class="nav child_menu">                      
                      <li><a href="./production/formulario.html">Alta pacientes</a></li>
                      <li><a href="./production/formulario.html">Reporte pacientes</a></li>
                      <li><a href="./production/formulario.html">Eliminación pacientes</a></li>
                      <li><a href="./production/formulario.html">Modificación pacientes</a></li>
                    </ul> -->
                  </li>
                  <li><a href="{{route('pdfodontologos')}}"><i class="fa fa-user"></i>Impresion PDF <!--<span class="fa fa-chevron-down"></span>--></a>
                    <!-- <ul class="nav child_menu">                      
                      <li><a href="./production/formulario.html">Alta odontologos</a></li>
                      <li><a href="./production/formulario.html">Reporte odontologos</a></li>
                      <li><a href="./production/formulario.html">Eliminación odontologos</a></li>
                      <li><a href="./production/formulario.html">Modificación odontologos</a></li>
                    </ul> -->
                  </li>
                  <li><a href="{{ route ('export') }}"><i class="fa fa-calendar"></i>Impresion Excel  <!--<span class="fa fa-chevron-down"></span>--></a>
                    <!-- <ul class="nav child_menu">            
                      <li><a href="./production/formulario.html">Alta consultas</a></li>
                      <li><a href="./production/formulario.html">Reporte consultas</a></li>
                      <li><a href="./production/formulario.html">Eliminación consultas</a></li>
                      <li><a href="./production/formulario.html">Modificación consultas</a></li>
                    </ul> -->
                  </li>
                  <li><a href="{{route('productos')}}"><i class="fa fa-navicon"></i>Carrito <!--<span class="fa fa-chevron-down"></span>--></a>
                    <!-- <ul class="nav child_menu">                      
                      <li><a href="./production/formulario.html">Alta municipios</a></li>
                      <li><a href="./production/formulario.html">Reporte municipios</a></li>
                      <li><a href="./production/formulario.html">Eliminación municipios</a></li>
                      <li><a href="./production/formulario.html">Modificación municipios</a></li>
                    </ul> -->
                  </li>
                  <li><a href="{{route('qrcode')}}"><i class="fa fa-navicon"></i>Codigo QR <!--<span class="fa fa-chevron-down"></span>--></a>
                    <!-- <ul class="nav child_menu">                      
                      <li><a href="./production/formulario.html">Alta especialidades</a></li>
                      <li><a href="./production/formulario.html">Reporte especialidades</a></li>
                      <li><a href="./production/formulario.html">Eliminación especialidades</a></li>
                      <li><a href="./production/formulario.html">Modificación especialidades</a></li>
                    </ul> -->
                  </li>
                  <li><a href="{{ route ('escanerqr') }}"><i class="fa fa-navicon"></i>Codigo QR con cámara <!--<span class="fa fa-chevron-down"></span>--></a>
                    <!-- <ul class="nav child_menu">                      
                      <li><a href="./production/formulario.html">Alta Status</a></li>
                      <li><a href="./production/formulario.html">Reporte Status</a></li>
                      <li><a href="./production/formulario.html">Eliminación Status</a></li>
                      <li><a href="./production/formulario.html">Modificación Status</a></li>
                    </ul> -->
                  </li>
                  
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{URL::asset('./production/images/alex.jpg')}}" alt="">Alexis Morales
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="{{route('login')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/alex.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Alexis Gómez</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/alex.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Alexis Gómez</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/alex.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Alexis Gómez</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/alex.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Alexis Gómez</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content aqui va su codigo  -->
        <div id="contenido">
          @yield('contenido')
        </div>
        <!-- /page content termina su codigo -->
        @yield('odontologos')
        <div class="modal fade" id="ajaxModel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              
              <div class="modal-header"><h4 class="modal-title" id="modelHeading"></h4></div>
              
              <div class="modal-body">
                <img src="" id="img_logo" alt="" style="width: 50px">
                <form id="CustomerForm" name="CustomerForm" class="form-horizontal">
                  <input type="text" name="Customer_id" id="Customer_id">
                  
                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                      <div class="col-sm-12">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Indica su nombre" value="" maslenght="30" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="appaterno" class="col-sm-2 control-label">Apellido Paterno</label>
                      <div class="col-sm-12">
                        <input type="text" name="appaterno" id="appaterno" class="form-control" placeholder="Indica su Apellido" value="" maslenght="30" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="apmaterno" class="col-sm-2 control-label">Apellido Materno</label>
                      <div class="col-sm-12">
                        <input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Indica su Apellido" value="" maslenght="30" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Genero</label>
                      <div class="col-sm-12">
                        <div class="form-check">
                          <input type="radio" name="sexo" id="sexo" class="form-check-input" value="F" checked>
                          <label class="form-check-label" for="sexo">Femenino</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" name="sexo" id="sexo" class="form-check-input" value="M">
                          <label class="form-check-label" for="sexo">Masculino</label>
                        </div>
                      </div>
                  </div>


                    
                  
                  <div class="form-group">
                    <label for="edad" class="col-sm-2 control-label">Edad</label>
                      <div class="col-sm-12">
                        <input type="text" name="edad" id="edad" class="form-control" placeholder="Indique su edad" value="" maslenght="30" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="telefono" class="col-sm-2 control-label">Telefono</label>
                      <div class="col-sm-12">
                        <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Indique su telefono" value="" maslenght="30" required="">
                      </div>
                  </div>

                  
                {{-- -------------------------------IMAGEN------------------------------- --}}
                <div class="form-group">
                  <label for="img" class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-12">
                      <input type="file" name="img1" id="img1" class="form-control" required="">
                      <input type="text" name="img2" id="img2" class="form-control">
                    </div>
                </div>
                {{-- -------------------------------IMAGEN------------------------------- --}}
  
                  <div class="form-group">
                    <label for="correo" class="col-sm-2 control-label">E-mail</label>
                      <div class="col-sm-12">
                        <input type="text" name="correo" id="correo" class="form-control" placeholder="Intoduce un correo valido" value="" required="">
                      </div>
                  </div>
  
                  <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Contraseña</label>
                      <div class="col-sm-12">
                        <input type="text" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña" value="" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="calle" class="col-sm-2 control-label">Calle</label>
                      <div class="col-sm-12">
                        <input type="text" name="calle" id="calle" class="form-control"  value="" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="numext" class="col-sm-2 control-label">Numero Exterior</label>
                      <div class="col-sm-12">
                        <input type="text" name="numext" id="numext" class="form-control"  value="" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="numint" class="col-sm-2 control-label">Numero Interior</label>
                      <div class="col-sm-12">
                        <input type="text" name="numint" id="numint" class="form-control"  value="" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="idmun" class="col-sm-2 control-label">Municipio</label>
                      <div class="col-sm-12">
                        <input type="text" name="idmun" id="idmun" class="form-control"  placeholder="Toluca" value="1" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="colonia" class="col-sm-2 control-label">Colonia</label>
                      <div class="col-sm-12">
                        <input type="text" name="colonia" id="colonia" class="form-control"   required="">
                      </div>
                  </div>

{{--                   <div class="form-group">
                    <label for="img" class="col-sm-2 control-label">Foto</label>
                      <div class="col-sm-12">
                        <input type="file" name="img" id="img" class="form-control"   required="">
                      </div>
                  </div> --}}

                  <div class="form-group">
                    <label for="idesp" class="col-sm-2 control-label">Especialidad</label>
                      <div class="col-sm-12">
                        <input type="text" name="idesp" id="idesp" class="form-control"  placeholder="" value="1" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="hora_entrada" class="col-sm-2 control-label">Hora entrada</label>
                      <div class="col-sm-12">
                        <input type="time" name="hora_entrada" id="hora_entrada" class="form-control"  required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="hora_salida" class="col-sm-2 control-label">Hora Salida</label>
                      <div class="col-sm-12">
                        <input type="time" name="hora_salida" id="hora_salida" class="form-control"  required="">
                      </div>
                  </div>



  

                  
  
                  
  
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar Cambios</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>



        @yield('odontologosin')
        <div class="modal fade" id="ajaxModel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              
              <div class="modal-header"><h4 class="modal-title" id="modelHeading"></h4></div>
              
              <div class="modal-body">
                <img src="" id="img_logo" alt="" style="width: 50px">
                <form id="CustomerForm" name="CustomerForm" class="form-horizontal">
                  <input type="text" name="Customer_id" id="Customer_id">
                  
                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                      <div class="col-sm-12">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Indica su nombre" value="" maslenght="30" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="appaterno" class="col-sm-2 control-label">Apellido Paterno</label>
                      <div class="col-sm-12">
                        <input type="text" name="appaterno" id="appaterno" class="form-control" placeholder="Indica su Apellido" value="" maslenght="30" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="apmaterno" class="col-sm-2 control-label">Apellido Materno</label>
                      <div class="col-sm-12">
                        <input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Indica su Apellido" value="" maslenght="30" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Genero</label>
                      <div class="col-sm-12">
                        <div class="form-check">
                          <input type="radio" name="sexo" id="sexo" class="form-check-input" value="F" checked>
                          <label class="form-check-label" for="sexo">Femenino</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" name="sexo" id="sexo" class="form-check-input" value="M">
                          <label class="form-check-label" for="sexo">Masculino</label>
                        </div>
                      </div>
                  </div>


                    
                  
                  <div class="form-group">
                    <label for="edad" class="col-sm-2 control-label">Edad</label>
                      <div class="col-sm-12">
                        <input type="text" name="edad" id="edad" class="form-control" placeholder="Indique su edad" value="" maslenght="30" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="telefono" class="col-sm-2 control-label">Telefono</label>
                      <div class="col-sm-12">
                        <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Indique su telefono" value="" maslenght="30" required="">
                      </div>
                  </div>

                  
                {{-- -------------------------------IMAGEN------------------------------- --}}
                <div class="form-group">
                  <label for="img" class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-12">
                      <input type="file" name="img1" id="img1" class="form-control" required="">
                      <input type="text" name="img2" id="img2" class="form-control">
                    </div>
                </div>
                {{-- -------------------------------IMAGEN------------------------------- --}}
  
                  <div class="form-group">
                    <label for="correo" class="col-sm-2 control-label">E-mail</label>
                      <div class="col-sm-12">
                        <input type="text" name="correo" id="correo" class="form-control" placeholder="Intoduce un correo valido" value="" required="">
                      </div>
                  </div>
  
                  <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Contraseña</label>
                      <div class="col-sm-12">
                        <input type="text" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña" value="" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="calle" class="col-sm-2 control-label">Calle</label>
                      <div class="col-sm-12">
                        <input type="text" name="calle" id="calle" class="form-control"  value="" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="numext" class="col-sm-2 control-label">Numero Exterior</label>
                      <div class="col-sm-12">
                        <input type="text" name="numext" id="numext" class="form-control"  value="" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="numint" class="col-sm-2 control-label">Numero Interior</label>
                      <div class="col-sm-12">
                        <input type="text" name="numint" id="numint" class="form-control"  value="" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="idmun" class="col-sm-2 control-label">Municipio</label>
                      <div class="col-sm-12">
                        <input type="text" name="idmun" id="idmun" class="form-control"  placeholder="Toluca" value="1" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="colonia" class="col-sm-2 control-label">Colonia</label>
                      <div class="col-sm-12">
                        <input type="text" name="colonia" id="colonia" class="form-control"   required="">
                      </div>
                  </div>

{{--                   <div class="form-group">
                    <label for="img" class="col-sm-2 control-label">Foto</label>
                      <div class="col-sm-12">
                        <input type="file" name="img" id="img" class="form-control"   required="">
                      </div>
                  </div> --}}

                  <div class="form-group">
                    <label for="idesp" class="col-sm-2 control-label">Especialidad</label>
                      <div class="col-sm-12">
                        <input type="text" name="idesp" id="idesp" class="form-control"  placeholder="" value="1" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="hora_entrada" class="col-sm-2 control-label">Hora entrada</label>
                      <div class="col-sm-12">
                        <input type="time" name="hora_entrada" id="hora_entrada" class="form-control"  required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="hora_salida" class="col-sm-2 control-label">Hora Salida</label>
                      <div class="col-sm-12">
                        <input type="time" name="hora_salida" id="hora_salida" class="form-control"  required="">
                      </div>
                  </div>

                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar Cambios</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>


        @yield('pacientesinimg')
        <div class="modal fade" id="ajaxModel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              
              <div class="modal-header"><h4 class="modal-title" id="modelHeading"></h4></div>
              
              <div class="modal-body2">
                <form id="CustomerForm" name="CustomerForm" class="form-horizontal">
                  <input type="text" name="Customer_id" id="Customer_id">
                  
                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                      <div class="col-sm-12">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Indica su nombre" value="" maslenght="30" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="apellidop" class="col-sm-2 control-label">Apellido Paterno</label>
                      <div class="col-sm-12">
                        <input type="text" name="apellidop" id="apellidop" class="form-control" placeholder="Indica su Apellido" value="" maslenght="30" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="apellidom" class="col-sm-2 control-label">Apellido Materno</label>
                      <div class="col-sm-12">
                        <input type="text" name="apellidom" id="apellidom" class="form-control" placeholder="Indica su Apellido" value="" maslenght="30" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Genero</label>
                      <div class="col-sm-12">
                        <div class="form-check">
                          <input type="radio" name="sexo" id="sexo" class="form-check-input" value="F" checked>
                          <label class="form-check-label" for="sexo">Femenino</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" name="sexo" id="sexo" class="form-check-input" value="M">
                          <label class="form-check-label" for="sexo">Masculino</label>
                        </div>
                      </div>
                  </div>


                    
                  
                  <div class="form-group">
                    <label for="edad" class="col-sm-2 control-label">Edad</label>
                      <div class="col-sm-12">
                        <input type="text" name="edad" id="edad" class="form-control" placeholder="Indique su edad" value="" maslenght="30" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="idtipossan" class="col-sm-2 control-label">Tipo de sangre</label>
                      <div class="col-sm-12">
                        <input type="text" name="idtipossan" id="idtipossan" class="form-control"  placeholder="O+" value="1" required="">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="telefono" class="col-sm-2 control-label">Telefono</label>
                      <div class="col-sm-12">
                        <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Indique su telefono" value="" maslenght="30" required="">
                      </div>
                  </div>
  
                  <div class="form-group">
                    <label for="correo" class="col-sm-2 control-label">E-mail</label>
                      <div class="col-sm-12">
                        <input type="text" name="correo" id="correo" class="form-control" placeholder="Intoduce un correo valido" value="" required="">
                      </div>
                  </div>
                  

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tiene alergias</label>
                      <div class="col-sm-12">
                        <div class="form-check">
                          <input type="radio" name="preguntaale" id="preguntaale" class="form-check-input" value="No" checked>
                          <label class="form-check-label" for="preguntaale">No</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" name="preguntaale" id="preguntaale" class="form-check-input" value="Si">
                          <label class="form-check-label" for="preguntaale">Si</label>
                        </div>
                      </div>
                  </div>
                  



                  <div class="form-group">
                    <label for="alergias" class="col-sm-2 control-label">Alergias</label>
                      <div class="col-sm-12">
                        <input type="text" name="alergias" id="alergias" class="form-control"  value="" required="">
                      </div>
                  </div>

                  </div>
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar Cambios</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>



        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="./vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="./vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="./vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="./vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="./vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="./vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="./vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="./vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="./vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="./vendors/Flot/jquery.flot.js"></script>
    <script src="./vendors/Flot/jquery.flot.pie.js"></script>
    <script src="./vendors/Flot/jquery.flot.time.js"></script>
    <script src="./vendors/Flot/jquery.flot.stack.js"></script>
    <script src="./vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="./vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="./vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="./vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="./vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="./vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="./vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="./vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="./vendors/moment/min/moment.min.js"></script>
    <script src="./vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="./build/js/custom.min.js"></script>
	
  </body>

  @yield('js')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(function(){
            $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
          });
 
            var table =$('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', },
                    // { data: 'img', name: 'img',  },
                    { data: 'nombre', name: 'nombre' },
                    { data: 'appaterno', name:'appaterno' },
                    { data: 'telefono', name: 'telefono' },
                    { data: 'correo', name: 'correo' },
                    { data: 'calle' , name: 'calle' },
                    {
                        data: 'otros',
                        name: 'otros',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            // -------------------------------NUEVO-------------------------------
            $('#createNewCustomer').click(function(){
              $('#saveBtn').val("create-Customer");
              $('#Customer_id').val("");
              $('#img_logo').attr("src","");
              $('#CustomerForm').trigger("reset");
              $('#modelHeading').html("Crear Nuevo Registro");
              $('#ajaxModel').modal("show");
            });
      
            // ---------------- Salvar --------------
                       // $('#saveBtn').click(function(e){
                        $('form').submit(function(e){
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                  data: formData,
                  url: "{{ route('store') }}",
                  type: "POST",
                  contentType: false,
                  processData: false,
                  dataType: "json",
                  success: function(data){
                    $('#CustomerForm').trigger('reset');
                    $(this).html('Enviando ...');
                    $('#ajaxModel').modal('hide');
                    table.draw();
                  },
                  error: function(data){
                    console.log('Error: ', data);
                    $('#saveBtn').html('Guardar cambio');
                  }
                });
              });
              
              // MODIFICAR
              $('body').on('click', '.editCustomer', function(){
                var id = $(this).data('id');
                // console.log(id);
                $.get("editar/" + id, function (data){
                    $('#modelHeading').html("Editar Customer");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal("show");
                    $('#Customer_id').val(data.idodo);
                    $('#nombre').val(data.nombre);
                    $('#appaterno').val(data.appaterno);
                    $('#apmaterno').val(data.apmaterno);
                    $('#sexo').val(data.sexo);
                    $('#edad').val(data.edad);
                    $('#telefono').val(data.telefono);
                    $('#correo').val(data.correo);
                    $('#password').val(data.password);
                    $('#calle').val(data.calle);
                    $('#numint').val(data.numint);
                    $('#numext').val(data.numext);
                    $('#idmun').val(data.idmun);
                    $('#colonia').val(data.colonia);
                    $('#idesp').val(data.idesp);
                    $('#idesp').val(data.idesp);
                    $('#hora_entrada').val(data.hora_entrada);
                    $('#hora_salida').val(data.hora_salida);

                    $('#img2').val(data.img);
                    var datimg = $('#img2').val();
                    datimg = "http://localhost/proyecto_mydentis/public/archivos/"+datimg;
                    $('#img_logo').attr("src",datimg);

                })
            });


              // ----------------- Delete -------------
          $('body').on('click', '.deleteCustomer', function(){
              var id = $(this).data("id");
              if (confirm("Esta seguro de querer borrar el registro...?")) {
                $.ajax({
                  type: "DELETE",
                  url: "{{ url('destroy') }}"+"/"+id,
                  success: function(data){
                    table.draw();
                  },
                  error: function(data){
                    console.log("Error: ", data);
                  }
                });
              }
              else{}
            });

          });

    </script>

    @yield('pacientes')
    <script type="text/javascript">
      $(function(){
          $.ajaxSetup({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

          var table =$('.yajra-datatable2').DataTable({
              processing: true,
              serverSide: true,
              ajax: "",
              columns: [
                  { data: 'DT_RowIndex', name: 'DT_RowIndex', },
                  // { data: 'img', name: 'img',  },
                  { data: 'nombre', name: 'nombre' },
                  { data: 'apellidop', name:'apellidop' },
                  { data: 'telefono', name: 'telefono' },
                  { data: 'correo', name: 'correo' },
                  { data: 'edad' , name: 'edad' },
                  {
                      data: 'otros',
                      name: 'otros',
                      orderable: false,
                      searchable: false
                  },
              ]
          });

          // -------------------------------NUEVO-------------------------------
          $('#createNewCustomer').click(function(){
            $('#saveBtn').val("create-Customer");
            $('#Customer_id').val("");
            $('#img_logo').attr("src","");
            $('#CustomerForm').trigger("reset");
            $('#modelHeading').html("Crear Nuevo Registro");
            $('#ajaxModel').modal("show");
          });
    
          // ---------------- Salvar --------------
                     // $('#saveBtn').click(function(e){
                      $('form').submit(function(e){
              e.preventDefault();
              var formData = new FormData($(this)[0]);
              $.ajax({
                data: formData,
                url: "{{ route('store') }}",
                type: "POST",
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(data){
                  $('#CustomerForm').trigger('reset');
                  $(this).html('Enviando ...');
                  $('#ajaxModel').modal('hide');
                  table.draw();
                },
                error: function(data){
                  console.log('Error: ', data);
                  $('#saveBtn').html('Guardar cambio');
                }
              });
            });
            
            // MODIFICAR
            $('body').on('click', '.editCustomer', function(){
              var id = $(this).data('id');
              // console.log(id);
              $.get("editar/" + id, function (data){
                  $('#modelHeading').html("Editar Customer");
                  $('#saveBtn').val("edit-user");
                  $('#ajaxModel').modal("show");
                  $('#Customer_id').val(data.idodo);
                  $('#nombre').val(data.nombre);
                  $('#appaterno').val(data.appaterno);
                  $('#apmaterno').val(data.apmaterno);
                  $('#sexo').val(data.sexo);
                  $('#edad').val(data.edad);
                  $('#telefono').val(data.telefono);
                  $('#correo').val(data.correo);
                  $('#password').val(data.password);
                  $('#calle').val(data.calle);
                  $('#numint').val(data.numint);
                  $('#numext').val(data.numext);
                  $('#idmun').val(data.idmun);
                  $('#colonia').val(data.colonia);
                  $('#idesp').val(data.idesp);
                  $('#idesp').val(data.idesp);
                  $('#hora_entrada').val(data.hora_entrada);
                  $('#hora_salida').val(data.hora_salida);

                  $('#img2').val(data.img);
                  var datimg = $('#img2').val();
                  datimg = "http://localhost/proyecto_mydentis/public/archivos/"+datimg;
                  $('#img_logo').attr("src",datimg);

              })
          });


            // ----------------- Delete -------------
        $('body').on('click', '.deleteCustomer', function(){
            var id = $(this).data("id");
            if (confirm("Esta seguro de querer borrar el registro...?")) {
              $.ajax({
                type: "DELETE",
                url: "{{ url('destroy') }}"+"/"+id,
                success: function(data){
                  table.draw();
                },
                error: function(data){
                  console.log("Error: ", data);
                }
              });
            }
            else{}
          });

        });

  </script>
 

</html>