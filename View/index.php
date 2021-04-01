<?php
session_start();
if (!isset($_SESSION['S_iduser'])) {
  header('location: ../login/index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gestion Agricola del Patia</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../plantilla/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plantilla/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../plantilla/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../plantilla/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../plantilla/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../plantilla/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plantilla/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plantilla/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plantilla/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plantilla/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- bootstrap 4 cdn -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <!-- chart js graficos -->
  <link rel="stylessheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">

  <link rel="stylessheet" href="../plantilla/plugins/DataTables/datatables.min.css">


  <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->


  <link rel="stylesheet" type="text/css" href="../plantilla/plugins/DataTables/datatables.min.css" />
  <link rel="stylesheet" type="text/css" href="../plantilla/plugins/DataTables/Responsive-2.2.7/css/responsive.bootstrap.min.css" />
  <!-- <link rel="stylesheet" href="DataTables/datatables.min.css"> -->

  <link rel="stylesheet" href="../plantilla/plugins/DataTables/DataTables-1.10.22/css/dataTables.bootstrap4.min.css">


  <!--font awesome con CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


  <!--ruta del select2 css -->
  <link rel="stylesheet" href="../plantilla/plugins/select2/select2.min.css">

  <!-- chart js -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">



  <!-- stilos para imprimir -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/PrintArea.min.css">






  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a class="logo" href="index.php">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>G</b>TDP</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Gesti&oacute;n del Patia</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- Notifications: style can be found in dropdown.less -->

            <!-- Tasks: style can be found in dropdown.less -->

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../plantilla/dist/img/user.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['S_user'];    ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="../plantilla/dist/img/user.png" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION['S_user'];    ?>

                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <!-- <a href="#">Followers</a> -->
                    </div>
                    <div class="col-xs-4 text-center">
                      <!-- <a href="#">Sales</a> -->
                    </div>
                    <div class="col-xs-4 text-center">
                      <!-- <a href="#">Friends</a> -->
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                  </div>
                  <div class="pull-right">
                    <a href="../Controller/usuario/controlador_cerrar_session.php" class="btn btn-default btn-flat">Salir</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
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
            <img src="../plantilla/dist/img/user.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['S_user'];    ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form 0000000000000000000000000000000000000000000000000-->
        <form action="#" method="get" class="sidebar-form">
          <!-- <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div> -->
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

          <li class="header"><b>Menu</b></li>

          <?php
          echo var_dump($_SESSION['S_rol']);

          if ($_SESSION['S_rol'] == 1) {
          ?>
            <li class="active treeview">
              <a onclick="cargar_contenido('contenido_principal','usuarios/vista_usuario_listar.php')">
                <i class="fa fa-users"></i> <span>Usuarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>


            <li class="treeview" style="height: auto;">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Datos Personales</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a onclick="cargar_contenido('contenido_principal','personas/vista_personas_administrativos.php')"><i class="fa fa-circle-o"></i> Administrativos</a></li>
                <li><a onclick="cargar_contenido('contenido_principal','personas/vista_persona_listar.php')"><i class="fa fa-circle-o"></i> Agricultores</a></li>
              </ul>
            </li>

          <?php
          } else {
          ?>
            <li class="active treeview">
              <a onclick="cargar_contenido('contenido_principal','personas/vista_persona_listar.php')">
                <i class="fa fa-user"></i> <span>Datos De Agricultores</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
            <?php
          }
            ?>

            <li class="active treeview">
              <a onclick="cargar_contenido('contenido_principal','fincas/vista_finca.php')">
                <i class="fa fa-leaf"></i> <span>Fincas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>


            <li class="active treeview">
              <a onclick="cargar_contenido('contenido_principal','fincas/vista_visitar_finca.php')">
                <i class="fa  fa-edit"></i> <span>Visitar Fincas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>


        </ul>
        <!-- ============ -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->


      <!-- Main content  en esta parte es la contenedor principal-->
      <section class="content">
        <div class="row" id="contenido_principal">
          <div class="col-md-12">
            <div class="box box-primary box-solid">
              <div class="box-header with-border">
                <h3 class="box-title"></h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">

              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1
      </div>
      <strong>Gestion Agricola del Patia.</strong>
    </footer>

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
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-user bg-yellow"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Other sets of options are available
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>
            <!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="../plantilla/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../plantilla/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

  <script>
    var idioma_espanol = {
      select: {
        rows: "%d fila seleccionada"
      },
      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ning&uacute;n dato disponible en esta tabla",
      "sInfo": "Registros del (_START_ al _END_) total de _TOTAL_ registros",
      "sInfoEmpty": "Registros del (0 al 0) total de 0 registros",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "<b>No se encontraron datos</b>",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      },
      "buttons": {
        "copyTitle": 'Informacion copiada',
        "copyKeys": 'Use your keyboard or menu to select the copy command',
        "copySuccess": {
          "_": '%d filas copiadas al portapapeles',
          "1": '1 fila copiada al portapapeles'
        },

        "pageLength": {
          "_": "Mostrar %d filas",
          "-1": "Mostrar Todo"
        }
      }

    }



    function cargar_contenido(contenedor, contenido) {
      $("#" + contenedor).load(contenido);
    }
    $.widget.bridge('uibutton', $.ui.button);


    cargar_contenido("contenido_principal", "graficas/vista_graficas.php");
  </script>

  <!-- datatable -->


  <!--  -->

  <!-- Bootstrap 3.3.7 -->
  <script src="../plantilla/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="../plantilla/bower_components/raphael/raphael.min.js"></script>

  <!-- Sparkline -->
  <script src="../plantilla/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="../plantilla/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="../plantilla/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../plantilla/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../plantilla/bower_components/moment/min/moment.min.js"></script>
  <script src="../plantilla/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="../plantilla/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="../plantilla/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="../plantilla/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../plantilla/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="../plantilla/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

  <!-- AdminLTE for demo purposes -->
  <script src="../plantilla/dist/js/demo.js"></script>
  <!-- google maps -->
  <!-- <script src="https://maps.google.com/maps/api/js"></script> -->

  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCKiIqCdZGrVxx06LSbe7uG3zXOq1Cz5k&callback=initMap" async defer></script> -->

  <!-- chart js graficos-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>


  <!--ruta del dataTable js -->


  <script src="../plantilla/plugins/DataTables/datatables.min.js"></script>
  <script src="../plantilla/plugins/DataTables/Responsive-2.2.7/js/dataTables.responsive.min.js"> </script>
  <script src="../plantilla/plugins/DataTables/Buttons-1.6.5/js/dataTables.buttons.min.js"></script>
  <script src="../plantilla/plugins/DataTables/Buttons-1.7.0/js/dataTables.buttons.min.js"></script>

  <!--  -->

  <!-- data1 -->
  <!-- <script type="text/javascript" src="../plantilla/plugins/DataTables/datatables.min.js"></script>
  <script src="../plantilla/plugins/DataTables/Responsive-2.2.6/js/dataTables.responsive.min.js"> </script>
  <script src="../plantilla/plugins/DataTables/Buttons-1.6.4/js/dataTables.buttons.min.js"></script>
  <script src="../plantilla/plugins/DataTables/JSZip-2.5.0/jszip.min.js"></script>
  <script src="../plantilla/plugins/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="../plantilla/plugins/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="../plantilla/plugins/DataTables/Buttons-1.6.4/js/buttons.html5.js"></script> -->
  <!-- cierre -->

  <!-- plugin para imprimir y generar pdf -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/jquery.PrintArea.min.js" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js" />

  <!--ruta del select2 js -->
  <script src="../plantilla/plugins/select2/select2.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script> -->
  <!--ruta del sweetalert2 -->
  <script src="../plantilla/plugins/sweetalert2/sweetalert2.js"></script>

</body>

</html>