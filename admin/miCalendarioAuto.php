<?php
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, "es_ES");
//$hora = date("g:i:A");
require "./lib/conexion.php";
$user = $_SESSION['email'];

if (!isset($user)) {
  header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Su turno</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- fullCalendar -->
  <link href="./turnosconf/clockpicker/bootstrap-clockpicker.css" rel="stylesheet">
  <link href="./turnosconf/fullcalendar-4.3.1/packages/core/main.css" rel="stylesheet">
  <link href="./turnosconf/fullcalendar-4.3.1/packages/daygrid/main.css" rel="stylesheet">
  <link href="./turnosconf/fullcalendar-4.3.1/packages/timegrid/main.css" rel="stylesheet">
  <link href="./turnosconf/fullcalendar-4.3.1/packages/list/main.css" rel="stylesheet">
  <link href="./turnosconf/fullcalendar-4.3.1/packages/bootstrap/main.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/main.min.css">
</head>

<!-- Estilos personalizados -->
<style>
  html,
  body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 1100px;
    margin: 40px auto;
  }

  .fc th {
    padding: 5px 0px;
    vertical-align: middle;
    background: #108b7b;
  }

  .color-palette {
    height: 35px;
    line-height: 35px;
    text-align: right;
    padding-right: .75rem;
  }

  .color-palette.disabled {
    text-align: center;
    padding-right: 0;
    display: block;
  }

  .color-palette-set {
    margin-bottom: 15px;
  }

  .color-palette span {
    display: none;
    font-size: 12px;
  }

  .color-palette:hover span {
    display: block;
  }

  .color-palette.disabled span {
    display: block;
    text-align: left;
    padding-left: .75rem;
  }

  .color-palette-box h4 {
    position: absolute;
    left: 1.25rem;
    margin-top: .75rem;
    color: rgba(255, 255, 255, 0.8);
    font-size: 12px;
    display: block;
    z-index: 7;
  }

  .sidebar-dark-blue {
    background: #157e70 !important;
    text-decoration-color: rgb(255, 255, 255);
  }

  .sidebar-blue2 {
    background: #108b7b;
    text-decoration-color: rgb(255, 255, 255);
  }

  .modal-header {
    color: #ffffff;
    font-size: 20px;
    background-color: #157e70;
    width: auto;
    height: 45px;
    margin: none;
    border-top: none;
  }
</style>
<!--  -->

<!-- SQL -->
<?php
$ide = $_REQUEST['id'];
$sql = ("SELECT * FROM personalasistencial WHERE idPersonalAsistencial = $ide");
$consulta = mysqli_query($miConexion, $sql);
while ($campos = mysqli_fetch_array($consulta)) {
  $id = $campos['idPersonalAsistencial'];
  $nombre = $campos['nombres'];
  $apellido = $campos['apellidos'];
?>
<?php } ?>

<!-- Cuerpo de la clase -->

<body class="hold-transition sidebar-mini layout-fixed sidebar-open oss-dragging">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="./inicio.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="./Manual de usuario sistema unificado de turnos.pdf" class="nav-link">Manual</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php
    require('./sidebar.php')
    ?>
    <!-- /.Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">



            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./inicio.php">Inicio</a></li>
                <li class="breadcrumb-item active">Calendario</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- col for calendar-->
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-body p-0">
                  <!-- THE CALENDAR -->
                  <div id="calendarioTurnos"></div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Versión</b> 1
      </div>
      <strong>Copyright 2022-2025 <a href="http://www.umariana.edu.co">Univerdasidad Mariana</a>.</strong>

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
  <!-- Scripts -->
  <script src="./turnosconf/js/jquery-3.4.1.js"></script>
  <script src="./turnosconf/js/popper.min.js"></script>
  <script src="./turnosconf/bootstrap-4.3.1/js/bootstrap.min.js"></script>
  <script src="./turnosconf/datatables/datatables.min.js"></script>
  <script src="./turnosconf/clockpicker/bootstrap-clockpicker.js"></script>
  <script src='./turnosconf/js/moment-with-locales.js'></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/locales-all.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/locales-all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/main.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>

  <!-- traer los datos de los turnos desde la DB  -->
  <!-- Consultamos la base de datos -->
  <?php
  require './lib/conexion.php';
  $sql = ("SELECT * FROM asignacionauto");
  $resul = mysqli_query($miConexion, $sql);
  ?>

  <?php
  $sql = ("SELECT * FROM asignacionauto");
  $resulta = mysqli_query($miConexion, $sql);
  ?>

  <!-- Page specific script -->
  <!-- crear calendario -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendarioTurnos');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
        initialView: 'resourceTimelineMonth',
        aspectRatio: 2.29,
        theme: true,
        droppable: true,
        locale: 'es',
        editable: false,
        headerToolbar: {
          left: 'prev,next',
          center: 'title',
          right: 'resourceTimelineDay,resourceTimelineWeek,resourceTimelineMonth'
        },
        resourceAreaHeaderContent: 'Personal Asistencial',
        resources: [
          <?php
          while ($rows = mysqli_fetch_array($resul)) { ?> {
              id: <?php echo $rows['idPersonalAsistencial']; ?>,
              title: '<?php echo $rows['nombres']; ?> <?php echo $rows['apellidos']; ?> ',
            },
          <?php } ?>
        ],
        events: [
          <?php
          while ($filas = mysqli_fetch_array($resulta)) { ?> {
              id: <?php echo $filas['idProgramacion']; ?>,
              title: '<?php echo $filas['title']; ?>',
              start: '<?php echo $filas['fechaInicio']; ?>',
              end: '<?php echo $filas['fechaFin']; ?>',
              color: '<?php echo $filas['color']; ?>',
              textColor: '<?php echo $filas['textColor']; ?>',
              resourceId: <?php echo $filas['idPersonalAsistencial']; ?>
            },
          <?php } ?>
        ]
      });
      calendar.render();
    });
  </script>
</body>

</html>