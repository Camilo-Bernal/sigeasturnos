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
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

    .bdr {
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        border-top: none;
        border-left: none;
        border-right: none;
        overflow: hidden;
    }

    .modal-header {
        color: #09223b;
        font-size: 20px;
        background-color: #d5d5d5;
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
        background-color: #157e70;
        border: 0;
        border-radius: 10px;
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
        min-width: 70px;
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
        background-color: #0c5f54;
        border: 0;
        border-radius: 10px;
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
        min-width: 160px;
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
                        <form action="" method="post">
                            <div class="row justify-content-center">
                                <div class="col-sm-11 mb-3">
                                    <div class="card card-top-line">
                                        <div class="card-body">
                                            <h3 class="card-header text-center mb-4"><b>Consulta de Novedades</b> </h3>

                                            <div class="row justify-content-md-center">
                                                <div class="col-sm-3 mb-3 mt-3">
                                                    <label for="" style="margin-left:20px;">Número de identificación</label>
                                                </div>
                                                <div class="col-sm-4 mb-3 mt-3">
                                                    <div class="input-group" style="margin-right: 100px;">
                                                        <input type="number" style=" height: 40px; width: 100px;" class="form-control form-control-sm" id="" name="identificacion" required />
                                                        <input type="submit" value="Buscar" name="buscarEmpleado" class="btn button-18 css-button-arrow--sky btn-sm" style="height: 5px; " id="button-addon2">
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-sm-11 ">

                                                    <table id="example" class="table table-bordered table-striped bdr ">

                                                        <thead class="thead-init">
                                                            <tr class="thead-init thead-titulo">
                                                                <th scope="col" colspan="10" class="text-center "> Novedades <br>
                                                                    <h1></h1>
                                                                </th>
                                                            </tr>
                                                            <tr class="thead-subtitulo text-center">
                                                                <th scope="col" colspan="1">No.</th>
                                                                <th scope="col" colspan="1">Inicio</th>
                                                                <th scope="col" colspan="1">Fin</th>
                                                                <th scope="col" colspan="1">Descripción</th>
                                                                <th scope="col" colspan="1">Acción</th>

                                                            </tr>

                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $id = '';

                                                            if (isset($_POST['buscarEmpleado'])) {
                                                                $id = $_POST['identificacion'];
                                                            }
                                                            $sql = "SELECT * FROM novedades WHERE  idPersonalAsistencial='$id' 
                                                            ORDER BY idNovedad ASC";
                                                            $consulta = mysqli_query($miConexion, $sql);
                                                            if (mysqli_num_rows($consulta) > 0) {
                                                                while ($datos = mysqli_fetch_array($consulta)) { ?>
                                                                    <tr>
                                                                        <td class="text-center"><?= $datos['idNovedad']; ?></td>
                                                                        <td class="text-center"><?= $datos['fechaInicioNovedad']; ?></td>
                                                                        <td class="text-center"><?= $datos['fechaFinNovedad']; ?></td>
                                                                        <td><?= $datos['obervacion']; ?></td>
                                                                        <td class="text-center">
                                                                            <!-- <button type="submit" name="editarNovedad" value="Editar" style="height: 20px; width: 5px;" id="editar" class="btn button-18-new editarNovedad ">Editar </button> -->

                                                                            <button type="button" name="editarNovedad" class="btn button-18-new editarNovedad" style="height: 20px; width: 5px;" data-bs-toggle="modal" data-bs-target="#editar">
                                                                                Editar
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <!--  <input type="hidden" form="editarFormulario" name="identificacionAgregar" class="identificacionAgregar"  id="identificacionDesactivar" value="<?= $datos['idPersonalAsistencial']; ?>"> -->
                                                            <?php }
                                                            }/*  else {
                                                                die("Error: No hay datos en la tabla seleccionada");
                                                            } */
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>


                                        </div>
                                    </div>

                                </div>
                        </form>
                    </div>

                    <!-- EDITAR -->

                    <!-- Button trigger modal -->


                    <!-- Modal -->
                    <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Editar Novedad</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="./editarInforNovedad.php" method="post" id="editarFormulario">

                                        <div class="row justify-content-center">
                                            <div class="col-sm-11 mb-3">
                                                <div class="card card-top-line">
                                                    <!--     <h6 class="card-header">Aquí puede editar la novedad</h6> -->
                                                    <div class="card-body">


                                                        <div class="row mx-auto">
                                                            <input type="hidden" name="id" id="update_id" class="">
                                                            <div class="col-sm-3 mb-3 ">
                                                                <label for="" style="margin-left:20px;"> Inicio Novedad</label>
                                                            </div>
                                                            <div class="col-sm-3 mb-3">

                                                                <input type=Date name="inicio" id="inicio" style="margin-right:50px;  width: 120px" class="form-control form-control-sm" id="" required>
                                                            </div>

                                                            <div class="col-sm-3 mb-3">
                                                                <label for="" style="margin-left:40px;">Fin Novedad</label>
                                                            </div>
                                                            <div class="col-sm-3 mb-3">
                                                                <input type=Date name="fin" id="fin" style="margin-right:100px;  width: 120px" class="form-control form-control-sm" id="" required>

                                                            </div>

                                                        </div>


                                                        <div class="row justify-content-center">
                                                            <div class="col-sm-4 mb-3 mt-2">
                                                                <br>
                                                                <label for="" class="text-center" style="margin-left: 20px;">Descripción novedad</label>
                                                            </div>

                                                        </div>
                                                        <div class="row justify-content-center">
                                                            <div class="col-sm-11 mb-3" style="align-items: center;">
                                                                <textarea name="observacion" id="observacion" rows="6" cols="80" id="" require></textarea>
                                                            </div>

                                                        </div>

                                                        <div class="row justify-content-center">
                                                            <!-- <div class="col-sm-3  mb-3 btn-lg-8">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            </div> -->
                                                            <div class="col-sm-2  mb-3 btn-lg-8">

                                                                <input type="submit" name="" value="Actualizar" id="" class="btn button-18-new  btn-sm  desactivarBoton">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>











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
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>


    <!-- Traer los datos al formulario para editar -->
    <script>
        $(".editarNovedad").click(function() {
            $tr = $(this).closest('tr');
            var datos = $tr.children("td").map(function() {
                return $(this).text();
            });

            $('#update_id').val(datos[0]);
            $('#inicio').val(datos[1]);
            $('#fin').val(datos[2]);
            $('#observacion').val(datos[3]);

        });
    </script>
</body>

</html>