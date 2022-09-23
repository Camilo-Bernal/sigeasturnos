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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<!-- Estilos personalizados -->
<style>
  html,
  body {
    /* don't do scrollbars */
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;

  }

  .fc-week {
    height: auto;
  }

  .fc th {
    padding: 5px 0px;
    vertical-align: middle;
    background: lightskyblue;
  }

  .fc td {
    background: snow;
  }

  .fc td.fc-today {
    background: lightgreen;
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
              <h1><?php echo "$nombre", ' ', "$apellido"; ?></h1>
              <h6>CC: <?php echo ($ide); ?></h6>
            </div>
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
  <script src='./turnosconf/fullcalendar-4.3.1/packages/core/main.js'></script>
  <script src='./turnosconf/fullcalendar-4.3.1/packages/daygrid/main.js'></script>
  <script src='./turnosconf/fullcalendar-4.3.1/packages/timegrid/main.js'></script>
  <script src='./turnosconf/fullcalendar-4.3.1/packages/interaction/main.js'></script>
  <script src='./turnosconf/fullcalendar-4.3.1/packages/list/main.js'></script>
  <script src='./turnosconf/fullcalendar-4.3.1/packages/core/locales/es.js'></script>
  <script src='./turnosconf/fullcalendar-4.3.1/packages/bootstrap/main.js'></script>
  <script src='./turnosconf/fullcalendar-4.3.1/packages/resource-timeline/main.js'></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>

  <!-- traer los datos desde la DB  -->
  <?php
  $sql   = ("SELECT * FROM asignacion WHERE idPersonalAsistencial = $ide");
  $resul = mysqli_query($miConexion, $sql);
  ?>

  <script>
    var domingo = 0;
    var festivo = 0;

    function verificar() {
      /* Verifica si el check de dominfo está seleccionado */
      if (document.getElementById('domingo').checked) {
        domingo = 1;
      } else {
        domingo;
      }
      $('#dom').val(domingo);
      /* Verifica si el check de festivo está seleccionado */
      if (document.getElementById('festivo').checked) {
        festivo = 1;
      } else {
        festivo;
      }
      $('#fest').val(festivo);
    }
  </script>

  <!-- Page specific script -->
  <!-- crear caenario -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      /*       $('.clockpicker').clockpicker(); */
      var calendarEl = document.getElementById('calendarioTurnos')
      var calendar = new FullCalendar.Calendar(calendarEl, {

        plugins: ['customView', 'dayGrid', 'timeGrid', 'interaction', 'resourceTimelinePlugin'],
        initialView: 'customView',
        
        height: 750,
        contentHeight: 750,
        aspectRatio: 3,
        theme: true,
        droppable: true,
        locale: 'es',
        editable: false,

        header: {
          left: 'prev,next today, refrescar',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        customButtons: {
          refrescar: {
            text: "refrescar calendario",
            click: function() {
              location.reload();
            }
          }
        },

        /* Muestra los eventos que se han guardado en la DB */
        events: [
          <?php
          while ($campos = mysqli_fetch_array($resul)) { ?> {
              id: '<?php echo $campos['idProgramacion']; ?>',
              title: '<?php echo $campos['title']; ?>',
              servicio: '<?php echo $campos['nombreServicio']; ?>',
              start: '<?php echo $campos['fechaInicio']; ?>T<?php echo $campos['timeStart']; ?>',
              end: '<?php echo $campos['fechaFin']; ?>T<?php echo $campos['timeEnd']; ?>',
              color: '<?php echo $campos['color']; ?>',
              textColor: '<?php echo $campos['textColor']; ?>'
            },
          <?php } ?>
        ],

        dateClick: function(info) {
          limpiarFormulario();
          $('#BotonAgregar').show();
          $('#BotonModificar').hide();
          $('#BotonBorrar').hide();
          if (info.allDay) {
            $('#FechaInicio').val(info.dateStr);
            $('#FechaFin').val(info.dateStr);
          } else {
            let fechaHora = info.date.split("T");
            $('#FechaInicio').val(fechaHora[0]);
            $('#FechaFin').val(fechaHora[0]);
            $('#HoraInicio').val(fechaHora[1].substring(0, 5));
            $('#HoraFin').val(fechaHora[1].substring(0, 5));
          }
          $("#FormularioEventos").modal();
        },

        eventClick: function(info) {
          $('#BotonModificar').show();
          $('#BotonBorrar').show();
          $('#BotonAgregar').hide();

          $('#Codigo').val(info.event.id);
          $('#Titulo').val(info.event.title);
          $('#Servicio').val(info.event.extendedProps.servicio);
          $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
          $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));

          $("#FormularioEventos").modal();
          console.log(info.event.title);
          console.log(info.event.extendedProps.servicio);
        },

        /* Mover o arrastrar eventos */
        eventDrop: function(info) {
          $('#Codigo').val(info.event.id);
          $('#Titulo').val(info.event.title);
          $('#Servicio').val(info.event.extendedProps.servicio);
          $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
          $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
          $('#Servicio').val(info.event.extendedProps.servicio);
          let registro = recuperarDatosFormulario();
          modificarRegistro(registro);
        },
      });

      //Eventos de botones de la aplicación
      $('#BotonAgregar').click(function() {
        let registro = recuperarDatosFormulario();
        agregarRegistro(registro);
        $("#FormularioEventos").modal('hide');
      });

      $('#BotonModificar').click(function() {
        let registro = recuperarDatosFormulario();
        modificarRegistro(registro);
        $("#FormularioEventos").modal('hide');
      });

      $('#BotonBorrar').click(function() {
        let registro = recuperarDatosFormulario();
        borrarRegistro(registro);
        $("#FormularioEventos").modal('hide');
      });

      // funciones para comunicarse con el servidor via ajax
      function agregarRegistro(registro) {
        $.ajax({
          type: 'POST',
          url: 'misEventos.php?accion=agregar',
          data: registro,
          success: function(msg) {
            if (msg) {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 10000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })
              Toast.fire({
                icon: 'success',
                title: 'Turno agregado satisfactoriamente'
              })
              location.reload();
            }
          },
          error: function(error) {
            Swal.fire('Aviso', '¡UPS! hubo un error... ', 'warning');
          }
        });
      }

      function modificarRegistro(registro) {
        $.ajax({
          type: 'POST',
          url: 'misEventos.php?accion=modificar',
          data: registro,
          success: function(msg) {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              delay: 10000,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
            })
            Toast.fire({
              icon: 'success',
              title: 'Turno modificado satisfactoriamente'
            })
            location.reload();
          },
          error: function(error) {
            Swal.fire('Aviso', '¡UPS! hubo un error... ', 'warning');
          }
        });
      }

      function borrarRegistro(registro) {
        Swal.fire({
          icon: 'warning',
          title: '¿Desea eliminar el turno?',
          confirmButtonText: 'Confirmar',
          showCancelButton: true,
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              type: 'POST',
              url: 'misEventos.php?accion=borrar',
              data: registro,
              success: function(msg) {
                if (msg) {
                  Swal.fire('¡Eliminado!', '', 'success');
                  location.reload();
                }
              },
              error: function(error) {
                Swal.fire('Aviso', '¡UPS! hubo un error... ', 'warning');
              }
            });
          }
        });
      }

      // funciones que interactuan con el formulario de entrada de datos
      function limpiarFormulario() {
        $('#Codigo').val('');
        $('#Titulo').val('');
        $('#Servicio').val('');
        $('#FechaInicio').val('');
        $('#FechaFin').val('');
        $('#HoraInicio').val('');
        $('#HoraFin').val('');
        $('#dom').val('');
        $('#fest').val('');
        $('#domingo').val('');
        $('#festivo').val('');
      }

      function recuperarDatosFormulario() {
        let registro = {
          idPrograma: $('#Codigo').val(),
          title: $('#Titulo').val(),
          fechaInicio: $('#FechaInicio').val(),
          fechaFin: $('#FechaFin').val(),
          idEmpleado: $('#Empleado').val(),
          nombreServicio: $('#Servicio').val(),
          dom: $('#dom').val(),
          fest: $('#fest').val(),
        };
        return registro;
      }

      /* mostrar el calnedario */
      calendar.render();
    });
  </script>

  <!-- FormularioEventos -->
  <div class="modal fade" id="FormularioEventos" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5><b>Administrar turnos</b></h5>
          <button type="button" class="close" style="color: #ffffff;" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- captura la id de un evento determinado -->
          <input type="hidden" id="Codigo">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Turno | Horario</label>
              <select class=" form-control" style="width: 90%;" aria-label="Default select example" name="Titulo" id="Titulo" required>
                <?php
                $sql = "SELECT * FROM eventos";
                $consulta = mysqli_query($miConexion, $sql);
                while ($campos = mysqli_fetch_array($consulta)) {
                  $idH = $campos['idTipo'];
                  $horario = $campos['title'];
                ?>
                  <option value="<?php echo $idH; ?>"><?php echo $horario; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Servicio</label>
              <select class=" form-control" style="width: 90%;" aria-label="Default select example" name="" id="Servicio" required>
                <?php
                $sql = "SELECT * FROM servicios";
                $consulta = mysqli_query($miConexion, $sql);
                while ($campos = mysqli_fetch_array($consulta)) {
                  $idS = $campos['idServicio'];
                  $servicio = $campos['nombreServicio'];
                ?>
                  <option value="<?php echo $idS; ?>"><?php echo $servicio; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Fecha de inicio:</label>
              <div class="input-group" data-autoclose="true" style="width: 90%;">
                <input type="date" id="FechaInicio" value="" class="form-control" />
              </div>
            </div>
            <div class="form-group col-md-6">
              <label>Fecha de fin:</label>
              <div class="input-group" data-autoclose="true" style="width: 90%;">
                <input type="date" id="FechaFin" value="" class="form-control" />
              </div>
            </div>
          </div>

          <!-- checkbox -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Es festivo? </label>
              <input type="checkbox" name="festivo" id="festivo">
            </div>
            <div class="form-group col-md-6">
              <label>Es domingo? </label>
              <input type="checkbox" name="domingo" id="domingo">
            </div>
          </div>
          <!-- captura la identificación del empleado que se le asigna los turnos -->
          <input type="hidden" name="Empleado" id="Empleado" value="<?php echo "$ide"; ?>">
          <!-- captura el valor del chck de domingo -->
          <input type="hidden" name="dom" id="dom">
          <!-- captura el valor del chck de festivo -->
          <input type="hidden" name="fest" id="fest">

        </div>

        <div class="modal-footer">
          <button type="button" id="BotonAgregar" class="btn btn-success" onclick="verificar()">Agregar</button>
          <button type=" button" id="BotonModificar" class="btn btn-warning" onclick="verificar()">Modificar</button>
          <button type=" button" id="BotonBorrar" class="btn btn-danger">Borrar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>