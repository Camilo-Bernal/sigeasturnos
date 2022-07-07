<?php
require "lib/conexion.php";
$user = $_SESSION['email'];

if (!isset($user)) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

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
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../plugins/assets/css/style.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>


<style>
    .margin {
        margin-left: 100px;
    }

    .card {
        margin-top: 10px;
    }

    .card-top-line {
        border-top: 3px solid #0c5f54;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .card-header-new {
        color: rgb(255, 255, 255);
        font-size: 20px;
        background-color: #157e70;
        width: auto;
        height: 45px;
        margin: none;
        border-top: none;
    }
    div.dataTables_length select {
        width: 40% !important;

    }

    .bdr {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        border-top: none;
        border-left: none;
        border-right: none;
        overflow: hidden;
    }

    .modal-header {
        color: #ffffff;
        font-size: 20px;
        background-color: #065969;
        width: auto;
        height: 45px;
        margin: none;
        border-top: none;
    }



    .card-header {
        line-height: normal;
    }

    .thead-titulo {
        color: azure;
        background-color: #157e70;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-top: none;
        border-left: none;
        border-right: none;
    }

    .thead-subtitulo {
        background-color: #d5d5d5;
        color: #09223b;
    }

    th,
    td {
        border: 1px solid rgb(173, 172, 172);
    }

    .thead-init {
        border-top-width: 0px;
    }

    .css-button-arrow--sky {
        min-width: 160px;
        height: 50px;
        color: #fff;
        padding: 5px 10px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        outline: none;
        overflow: hidden;
        border-radius: 5px;
        border: none;
        background-color: #0c5f54
    }

    .css-button-arrow--sky:hover {
        border-radius: 10px;
        padding-right: 24px;
        padding-left: 8px;
    }

    .css-button-arrow--sky:hover:after {
        opacity: 1;
        right: 10px;
    }

    .css-button-arrow--sky:after {
        content: "\00BB";
        position: absolute;
        opacity: 0;
        font-size: 20px;
        line-height: 40px;
        top: 0;
        right: -20px;
        transition: 0.4s;
    }

    .button-18-new {
        align-items: center;
        background-color: #065969;
        border: 0;
        border-radius: 100px;
        box-sizing: border-box;
        color: #ffffff;
        cursor: pointer;
        display: inline-flex;
        font-family: -apple-system, system-ui, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Fira Sans", Ubuntu, Oxygen, "Oxygen Sans", Cantarell, "Droid Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Lucida Grande", Helvetica, Arial, sans-serif;
        font-size: 16px;
        font-weight: 600;
        justify-content: center;
        line-height: 20px;
        max-width: 480px;
        min-height: 40px;
        min-width: 50px;
        height: 50px;
        overflow: hidden;
        padding: 0px;
        padding-left: 20px;
        padding-right: 20px;
        text-align: center;
        touch-action: manipulation;
        transition: background-color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, box-shadow 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s;
        user-select: none;
        -webkit-user-select: none;
        vertical-align: middle;
    }

    .button-18-new:hover,
    .button-18-new:focus {
        background-color: #065968;
        color: #ffffff;
    }

    .button-18-new:active {
        background: #09223b;
        color: rgb(255, 255, 255, .7);
    }

    .button-18-new:disabled {
        cursor: not-allowed;
        background: rgba(0, 0, 0, .08);
        color: rgba(0, 0, 0, .3);
    }

    /* CSS */
    .button-18 {
        align-items: center;
        background-color: #065969;
        border: 0;
        border-radius: 5px;
        box-sizing: border-box;
        color: #ffffff;
        cursor: pointer;
        display: inline-flex;
        font-family: -apple-system, system-ui, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Fira Sans", Ubuntu, Oxygen, "Oxygen Sans", Cantarell, "Droid Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Lucida Grande", Helvetica, Arial, sans-serif;
        font-size: 16px;
        font-weight: 600;
        justify-content: center;
        line-height: 20px;
        max-width: 480px;
        min-height: 40px;
        min-width: 45px;
        height: 40px;
        overflow: hidden;
        padding: 0px;
        padding-left: 20px;
        padding-right: 20px;
        text-align: center;
        touch-action: manipulation;
        transition: background-color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, box-shadow 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s;
        user-select: none;
        -webkit-user-select: none;
        vertical-align: middle;
    }
    .btn-secondary
    

    .button-18:hover,
    .button-18:focus {
        background-color: #065968;
        color: #ffffff;
    }

    .button-18:active {
        background: #09223b;
        color: rgb(255, 255, 255, .7);
    }

    .button-18:disabled {
        cursor: not-allowed;
        background: rgba(0, 0, 0, .08);
        color: rgba(0, 0, 0, .3);
    }

    .sidebar-dark-blue {
        background: #157e70 !important;
        text-decoration-color: rgb(255, 255, 255);
    }

    .sidebar-blue2 {
        background: #108b7b;
        text-decoration-color: rgb(255, 255, 255);
    }
</style>
<!-- cuerpo principal de la página -->
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
                    <a href="inicio.php" class="nav-link">Home</a>
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
                           
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
                                <li class="breadcrumb-item active">Cargos</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content center">
                <div class="container-fluid">

                    <!--#######################################  CONSULTA Y EDICIÓN DE NOVEDADES   ##############################################-->

                    <div class="form-group">

                        <div class="row justify-content-center">
                            <div class="col-sm-11 mb-3">
                                <div class="card card-top-line">
                                    <div class="card-body">
                                        <h3 class="card-header text-center mb-4"><b>Activar Registro de Empleados</b> </h3>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-11 ">
                                                <table id="example" class="table table-bordered table-striped bdr ">
                                                    <thead class="thead-init">
                                                        <tr class="thead-init thead-titulo">
                                                            <th scope="col" colspan="10" class="text-center "><b>Empleados desactivados</b> <br>
                                                                <h1></h1>
                                                            </th>
                                                        </tr>
                                                        <tr class="thead-subtitulo text-center">
                                                            <th scope="col" class="col-sm-1 " colspan="1">Identificación</th>
                                                            <th scope="col" class="col-sm-3" colspan="1">Nombres Completos</th>
                                                            <th scope="col" class="col-sm-2">Profesión</th>
                                                            <th scope="col" class="col-sm-2" colspan="1">Contrato</th>
                                                            <th scope="col" class="col-sm-1" colspan="1">Estado</th>
                                                            <th scope="col" class="col-sm-1">Activar</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM empleados_inactivos ORDER BY idPersonalAsistencial ASC";
                                                        $consulta = mysqli_query($miConexion, $sql);
                                                        if (mysqli_num_rows($consulta) > 0) {
                                                            while ($datos = mysqli_fetch_array($consulta)) { ?>
                                                                <tr>
                                                                    <td class="text-center"><?= $datos['idPersonalAsistencial']; ?></td>
                                                                    <td class="text-center"><?= $datos['nombres'], " ", $datos['apellidos']; ?></td>
                                                                    <td class="text-center"><?= $datos['idProfesion']; ?></td>
                                                                    <td class="text-center"><?= $datos['idContrato']; ?></td>
                                                                    <td class="text-center"><?= $datos['estado']; ?></td>
                                                                    <td class="text-center">
                                                                        <button type="button" name="activarEmpleado" class="btn button-18-new activarEmpleado" style="height: 20px; width: 5px;" data-bs-toggle="modal" data-bs-target="#activar">
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                        <?php }
                                                        } else {
                                                            die("Error: No hay datos en la tabla seleccionada");
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>

                                                <!-- Modal -->
                                                <div class="modal fade" id="activar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content ">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"> Activar Empleado <i class="fa-solid fa-circle-check"></i></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="activarEmpleadosMySQL.php" method="POST" id="editarFormulario">
                                                                    <div class=" row justify-content-center">
                                                                        <h6><b>¿Está seguro de activar el registro?</b></h6>
                                                                    </div>
                                                                    <input type="hidden" name="id" id="delete_id" class="">
                                                            </div>
                                                            <div class=" modal-footer ">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                <input type="submit" name="" value="Activar" id="" class="btn button-18  desactivarBoton">
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>

                        </div>
                        </form>
                    </div>

                    <!-- EDITAR -->
                </div>

                <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>


    <!-- modal script -->
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": true,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <!-- Traer los datos al formulario para editar -->
    <script>
        $(".activarEmpleado").click(function() {
            $tr = $(this).closest('tr');
            var datos = $tr.children("td").map(function() {
                return $(this).text();
            });
            $('#delete_id').val(datos[0]);
        });
    </script>
</body>

</html>