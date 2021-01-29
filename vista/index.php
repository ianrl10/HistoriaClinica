

<?php
session_start();
if(!isset($_SESSION['S_IDUSUARIO'])){
	header('Location: ../login/index.php');
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Historias Clínicas</title>
<!-- apartado enfocado al apartado resposive de la página -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../Plantilla/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../Plantilla/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../Plantilla/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Plantilla/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../Plantilla/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../Plantilla/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../Plantilla/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../Plantilla/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../Plantilla/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../Plantilla/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="../Plantilla/plugins/DataTables/datatables.min.css">
  <link rel="stylesheet" href="../Plantilla/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/fonts/flat-icon/flaticon.css">
  <link rel="stylesheet" href="../css/style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style >
.swal2-popup{
  font-size:1.6rem !important;
}
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Historia</b>Clinica</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../Plantilla/dist/img/perfil usuario.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['S_IDUSUARIO']; ?></p>
          <p><?php echo $_SESSION['S_USER']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../Plantilla/dist/img/logout.png" class="user-image" alt="User Image" width="40" height="40" >
            </a>
            <ul class="dropdown-menu">
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../controlador/administrador/cerrar_session.php" class="btn btn-danger"><b>Cerrar Sesión</b></a>
                </div>
              </li>
            </ul>
          </li>

          
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">USUARIOS DEL SISTEMA</li>
        <li class="active treeview">
       

          <a onclick="cargar_contenido('contenido_principal','administrador/vista_administrador_listar.php')">
            <i class="fa fa-users"></i> <span>Administrador</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <a onclick="cargar_contenido('contenido_principal','medico/vista_medico_listar.php')">
            <i class="fa fa-user-md"></i> <span>Medico</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <a onclick="cargar_contenido('contenido_principal','paciente/vista_paciente_listar.php')">
            <i class="fa fa-wheelchair"></i> <span>Paciente</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
  <section class="content">
    <div class="row" id="contenido_principal">
        <div class="col-md-12">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">BIENVENIDO AL CONTENIDO PRINCIPAL</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              CONTENIDO PRINCIPAL
            </div>
            <!-- /.box-body --> 
          </div>
          <!-- /.box -->
          <body>
  <div id="content-wrapper">
    <section class="testimonial">
      <div class="container">
          <div class="text-center">
            <h2 class="page-section__title">CENTRO MÉDICO</h2>
            <div class="testimonial__title-style">
              <span class="first-line"></span>
              <span class="second-line"></span>
            </div>
            <p class="page-section__subtitle">TU SALUD ES MUY IMPORTANTE, TE AYUDAMOS A CUIDARTE</p>
          </div>
    </section>

    <section class="team team--bg">
      <div class="container">
          <div class="row gutters-80">
            <div class="col-md-6">
              <div class="thumbnail team__single">
                <div class="bio text-center">
                  <img src="../assets/images/1.jpg" alt="">
                  <h2>Dr. Francisco Arias</h2><br>
                  <p>Médico general</p>
                </div>
                <div class="caption">
                  <p> Conocimientos y destrezas necesarias para resolver la mayoría de los padecimientos en niños, jovenes y adultos.</p>
                  <div class="social-icons">
                    <li><a href="#"><i class="flaticon-facebook-letter-logo"></i></a></li>
                    <li><a href="#"><i class="flaticon-twitter-logo-silhouette"></i></a></li>
                    <li><a href="#"><i class="flaticon-google-plus"></i></a></li>
                    <li><a href="#"><i class="flaticon-pinterest-logo"></i></a></li>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="thumbnail team__single">
                <div class="bio text-center">
                  <img src="../assets/images/2.jpg" alt="">
                  <h2>Dra. Diana Lozada</h2>
                  <p>Médico general/Pediatra</p><br>
                </div>
                <div class="caption">
                  <p>Especialista en niños, enfocada al área de pediatria. Formación especial para prevenir, diagnosticar y tratar enfermedades o lesiones en infantes.</p>
                  <div class="social-icons">
                    <li><a href="#"><i class="flaticon-facebook-letter-logo"></i></a></li>
                    <li><a href="#"><i class="flaticon-twitter-logo-silhouette"></i></a></li>
                    <li><a href="#"><i class="flaticon-google-plus"></i></a></li>
                    <li><a href="#"><i class="flaticon-pinterest-logo"></i></a></li>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>  
  </div>


  <script>
    $(document).ready(function() {
      
      $('button').click( function(e) {
        $('.collapse').collapse('hide');
      });


      
    });
  </script>
</body>  
            
          
        </div>
    </div>
  </div>
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../Plantilla/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../Plantilla/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  var idioma_espanol ={
    select:{
      rows: "%d fila seleccionada" 
    },
    "sProcessing":       "Procesando...",
    "sLengthMeni":       "Mostrar_Menu_registros",
    "sZeroRecords":      "No se encontraron resultados",
    "sEmptyTable":       "Ning&uacute;m dato disponible en esta tabla",
    "sInfo":             "Registros del (_START_al_END_) total de _TOTAL_ registros",
    "sInfoEmpty":        "Resgistros del (0 al 0) total de 0 registros",
    "sInfoFiltered":     "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":      "",
    "sSearch":           "Buscar:",
    "sUrl":              "",
    "sInfoThousands":    ",",
    "sLoadingRecords":   "<b>No se encontraton datos</b>",
    "oPaginate": {
        "sFirst":     "Primero",
        "sLAST":      "Último",
        "sNext":      "Siguiente",
        "sPrevious":  "Anterior"
    },
    "oAria": {
        "sSortAscending":   ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending":  ": Activar para ordenar la columna de manera descendente"
    }
  }

  function cargar_contenido(contenedor,contenido){
      $("#"+contenedor).load(contenido);
  }
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../Plantilla/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../Plantilla/bower_components/raphael/raphael.min.js"></script>
<!-- Sparkline -->
<script src="../Plantilla/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../Plantilla/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../Plantilla/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../Plantilla/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../Plantilla/bower_components/moment/min/moment.min.js"></script>
<script src="../Plantilla/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../Plantilla/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../Plantilla/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../Plantilla/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../Plantilla/bower_components/fastclick/lib/fastclick.js"></script>

<script src="../Plantilla/dist/js/adminlte.min.js"></script>

<script src="../Plantilla/dist/js/demo.js"></script>
<script src="../Plantilla/plugins/DataTables/datatables.min.js"></script>
<script src="../Plantilla/plugins/select2/select2.min.js"></script>
<script src="../Plantilla/plugins/sweetalert2/sweetalert2.js"></script>
</body>
</html>
