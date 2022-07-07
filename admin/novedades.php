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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    .card-header {
        line-height: normal;
    }

    #oculto {
        display: none;
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
        background-color: #d3d3d4;
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
        color: rgb(244, 247, 247);
        background-color: #157e70;
        width: auto;
        height: 30px;
        border-top: none;
        border-left: none;
        border-right: none;
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
        background-color: #d3d3d4;
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

                    <!--#######################################  REGISTRO DE NOVEDADES   ##############################################-->

                    <div class="form-group">
                        <form action="" method="post">
                            <div class="row justify-content-center">
                                <div class="col-sm-11 mb-3">
                                    <div class="card card-top-line">
                                        <div class="card-body">
                                            <h3 class="card-header text-center mb-4"><b>Registro de Novedades</b> </h3>

                                            <div class="row justify-content-md-center">
                                                <div class="col-sm-3 mb-3 mt-3">
                                                    <label for="" style="margin-left:20px;">Número de identificación</label>
                                                </div>
                                                <div class="col-sm-4 mb-3 mt-3">
                                                    <div class="input-group" style="margin-right: 100px;">
                                                        <input type="number" style=" height: 40px; width: 100px;" class="form-control form-control-sm" id="" name="identificacion" required />
                                                        <input type="submit" value="Buscar" name="buscarEmpleado" class="btn button-18 css-button-arrow--sky btn-sm" style="height: 5px; " id="botton">

                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-sm-11 ">

                                                    <table class="table bdr">

                                                        <thead class="thead-init">
                                                            <tr class="thead-init thead-titulo">
                                                                <th scope="col" colspan="10" class="text-center ">Datos empleado
                                                                </th>
                                                            </tr>
                                                            <tr class="thead-subtitulo text-center">
                                                                <th scope="col" colspan="1">Identificación</th>
                                                                <th scope="col" colspan="1">Nombres</th>
                                                                <th scope="col" colspan="1">Apellidos</th>
                                                                <th scope="col" colspan="1">Profesión</th>
                                                                <th scope="col" colspan="1">Contrato</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $id = '';

                                                            if (isset($_POST['buscarEmpleado'])) {
                                                                $id = $_POST['identificacion'];
                                                            }
                                                            $sql = "SELECT * FROM empleados WHERE  idPersonalAsistencial='$id'";
                                                            $consulta = mysqli_query($miConexion, $sql);
                                                            while ($datos = mysqli_fetch_array($consulta)) { ?>
                                                                <tr>
                                                                    <td><?= $datos['idPersonalAsistencial']; ?></td>
                                                                    <td><?= $datos['nombres']; ?></td>
                                                                    <td><?= $datos['apellidos']; ?></td>
                                                                    <td><?= $datos['idProfesion']; ?></td>
                                                                    <td><?= $datos['idCargo']; ?></td>
                                                                </tr>
                                                                <input type="hidden" form="agregarFormulario" name="identificacionAgregar" class="identificacionAgregar" value="<?= $datos['idPersonalAsistencial']; ?>">
                                                            <?php }
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

                    <div id="oculto-new">

                        <form action="./agregarNovedad.php" method="post" id="agregarFormulario">

                            <div class="row justify-content-center">
                                <div class="col-sm-11 mb-3">

                                    <div class="card card-top-line ">
                                        <h6 class="card-header">Aquí puede registrar la novedad</h6>
                                        <div class="card-body">


                                            <div class="row mx-auto">
                                                <div class="col-sm-3 mb-3 ">
                                                    <label for="" style="margin-left:100px;"> Inicio Novedad</label>
                                                </div>
                                                <div class="col-sm-2 mb-3">

                                                    <input type=Date name="inicio" style="margin-right:50px;  width: 120px" class="form-control form-control-sm" id="" required>
                                                </div>

                                                <div class="col-sm-3 mb-4">
                                                    <label for="" style="margin-left:120px;">Fin Novedad</label>
                                                </div>
                                                <div class="col-sm-2 mb-3">
                                                    <input type=Date name="fin" class="form-control form-control-sm" style="margin-left:50px;" style="width: 120px" id="" required>
                                                </div>
                                                <div class="col-sm-3 mb-3"></div>
                                                <div class="col-sm-3 mb-3"></div>
                                            </div>


                                            <div class="row justify-content-center">
                                                <div class="col-sm-4 mb-3 mt-2">
                                                    <label for="" class="text-center" style="margin-left: 70px;">Descripción novedad</label>
                                                </div>

                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-sm-7 mb-3" style="align-items: center;">
                                                    <textarea name="observacion" rows="7" cols="80" id="" require></textarea>
                                                </div>
                                                <div class="col-sm-7 mb-3"></div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-sm-2  mb-3 btn-lg-8">
                                                    <input type="submit" name="" value="Agregar" id="ocultar" class="btn button-18 css-button-arrow--sky btn-sm  desactivarBoton">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

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

    
</body>

</html>