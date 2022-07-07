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


    <link href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
    .content center {
        display: flex;
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

    div.dataTables_length select {
        width: 40% !important;

    }

    .bdr {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
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

    .thead-titulo-copy {
        color: rgb(8, 8, 8);
        background-color: #b2b4b4;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-top: none;
        border-left: none;
        border-right: none;
        font-size: 20px;
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
        min-width: 100px;
        height: 20px;
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

    .btn-primary {
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

    .button-18-row {
        align-items: center;
        background-color: #0c5f54;
        border: 0;
        border-radius: 10px;
        color: #ffffff;
        margin-left: 20px;
        margin-right: 20px;
    }

    .btn-primary-new {
        align-items: center;
        background-color: #0c5f54;
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
        max-width: 40px;
        min-height: 40px;
        min-width: 40px;
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
        max-width: 120px;
        min-height: 20px;
        min-width: 50px;
        height: 30px;
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

    .button-18-new {
        align-items: center;
        background-color: #540339;
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
        max-width: 40px;
        min-height: 40px;
        min-width: 40px;
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
                                <li class="breadcrumb-item active">Contratos</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-top-line">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-sm-12 mb-3">
                                        <div class="card card-top-line">
                                            <h5 class="card-header"><b>Crear Contrato</b></h5>
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <form action="" method="post">
                                                        <div class="row mx-auto">
                                                            <div class="col-sm-2 mb-3 ">
                                                                <label for="empresa" style="margin-left:20px;">Nombre</label>
                                                            </div>
                                                            <div class="col-sm-3 mb-3" style="margin-left:20px;">
                                                                <input type="text" style=" width: 180px;" class="form-control form-control-sm" id="empresa" name="contrato" autofocus required>

                                                            </div>

                                                            <br>
                                                            <div class="col-sm-3 mb-3" style="margin-left:80px;">
                                                                <input type="submit" name="agregar" class="btn button-18 css-button-arrow--sky" id="crear" value="Crear">
                                                            </div>
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

                    <!-- Modal Insertar -->
                    <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-top-line">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar Contrato</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-sm-12 mb-3">

                                        <div class="card card-top-line">
                                            <h5 class="card-header"><b>Contrato</b></h5>
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <form action="editarContrato.php" method="post" id="EditarFormulario">
                                                        <input type="hidden" name="id" id="update_id">
                                                        <div class="row mx-auto">
                                                            <div class="col-sm-2 mb-3 ">
                                                                <label for="empresa" style="margin-left:20px;">Nombre</label>
                                                            </div>
                                                            <div class="col-sm-3 mb-3" style="margin-left:20px;">
                                                                <input type="text" id="contrato" style=" width: 180px;" class="form-control form-control-sm" name="contrato" autofocus required>

                                                            </div>

                                                            <br>
                                                            <div class="col-sm-3 mb-3" style="margin-left:80px;">
                                                                <input type="submit" name="editarbtn" class="btn button-18 css-button-arrow--sky" id="crear" value="Actualizar">
                                                            </div>
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

                    <!-- /.col -->
                    <div class="row justify-content-center">
                        <div class="col-sm-8 mb-3">
                            <!-- /.card -->
                            <div class="card card-top-line">
                                <!-- /.card-header -->
                                <h3 class="card-header "><button type="button" class="btn button-18" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-plus"></i>
                                    </button><b style="margin-left: 150px;">Contratos Registrados</b>

                                </h3>

                                <div class="card-body ">


                                    <table id="example" class="table table-bordered table-striped bdr">
                                        <thead class="thead-init">

                                            <tr class="thead-subtitulo ">
                                                <th class="text-center"> Id</th>
                                                <th>Contrato</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //crear una variable con la sentencia SQL
                                            $sql = "SELECT * FROM contrato WHERE estado = 'activo'";
                                            
                                            // crear la variable para ejecutar la consulta
                                            $consulta = mysqli_query($miConexion, $sql);
                                            while ($campos = mysqli_fetch_array($consulta)) { ?>
                                                <tr class="table-secundary">
                                                    <td class="text-center"><?= $campos['idContrato']; ?></td>
                                                    <td><?= $campos['tipoContrato']; ?></td>
                                                    <th class="text-center">
                                                    <button type="button" class="btn btn-primary-new editbtn" data-bs-toggle="modal" data-bs-target="#editar"><i class="fa-solid fa-pen-to-square"></i></button>
                                                        <button type="button" name="desactivarCont" class="btn button-18-new desactivarCont" data-bs-toggle="modal" data-bs-target="#desactivar">
                                                            <i class="fa-solid fa-trash-alt"></i>
                                                        </button>
                                                    </th>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">Id</th>
                                                <th>Cargo</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.MODAL DESACTIVAR-->

                                <div class="modal fade" id="desactivar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"> Desactivar Contrato <i class="fa-solid fa-trash-alt"> </i></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="eliminarContrato.php" method="POST" id="editarFormulario">

                                                    <div class=" row justify-content-center">

                                                        <h6><b>¿Desactivar el registro?</b></h6>
                                                    </div>

                                                    <input type="hidden" name="id_desactivar" id="delete_id" class="">

                                            </div>

                                            <div class=" modal-footer text-center ">

                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                                                <input type="submit" name="" value="Desactivar" id="" class="btn button-18  desactivarBoton" style="height: 38px;">

                                            </div>
                                        </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>

                    <!-- /.col -->
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
            <b>Version</b> 3.0.5
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
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
                "autoWidth": false,
            });
            $('#example2').DataTable({
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

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": true,
                "responsive": true,
                "autoWidth": false,
                "lengthChange": true,
                "ordering": true,
            });
        });
    </script>
    <script>
        $(".editbtn").click(function() {
            $tr = $(this).closest('tr');
            var datos = $tr.children("td").map(function() {
                return $(this).text();
            });

            $('#update_id').val(datos[0]);
            $('#contrato').val(datos[1]);


        });
    </script>

     <!-- Traer los datos al formulario para desactvar -->
     <script>
        $(".desactivarCont").click(function() {
            $tr = $(this).closest('tr');
            var datos = $tr.children("td").map(function() {
                return $(this).text();
            });

            $('#delete_id').val(datos[0]);


        });
    </script>
</body>

</html>
<?php
//ingresar los valores a la tabla
if (isset($_POST['agregar'])) {
    //recibir variables
    $tContrato = $_POST['contrato'];

    // crear una consulata para insertar las variables en la tabla
    $sql = "INSERT INTO contrato(tipoContrato) VALUES ('$tContrato')";
    $consulta = mysqli_query($miConexion, $sql);
    if (!$consulta) {
        die("Consulta no realizada");
    } else {
        echo '
            <script>
                alert("Contrato creado correctamente ");
                window.location = "./contratos.php";
            </script>
        ';
    }
}
?>