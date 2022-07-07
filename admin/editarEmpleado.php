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
</head>
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
                    <a href="" class="nav-link">Home</a>
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
        include('./sidebar.php');
        ?>

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
                                <li class="breadcrumb-item active">Actualizar empleado</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <!-- /.card -->
                            <div class="card">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="text-center">
                                            <h1 class="text-center">Actualizar Empleado</h1>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <form action="" method="get">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="tipoId">N° de identificación</label><br>
                                                    <input type="number" name="identificacion" placeholder="empleado a actualizar" required>
                                                    <input type="submit" name="buscar" class="btn btn-info" value="buscar">
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                        <?php
                                        //ingresar los valores a la tabla
                                        $ide = '';
                                        
                                        if (isset($_GET['buscar'])) {
                                            $ide = $_GET['identificacion'];
                                            $sql = "SELECT * FROM personalasistencial WHERE idPersonalAsistencial = $ide";
                                            $consulta = mysqli_query($miConexion, $sql);
                                            $datos = mysqli_fetch_array($consulta);

                                            $sql2 = "SELECT * FROM empleados WHERE idPersonalAsistencial = $ide";
                                            $consulta2 = mysqli_query($miConexion, $sql2);
                                            $datos2 = mysqli_fetch_array($consulta2);
                                        }
                                        ?>
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="tipoId">Tipo</label><br>
                                                    <select name="tipo" id="">
                                                        <option><?php echo $datos2['idTipoId']; ?></option>
                                                        <?php
                                                        $sql = "SELECT * FROM tipoid";
                                                        $consulta = mysqli_query($miConexion, $sql);
                                                        while ($campos = mysqli_fetch_array($consulta)) {
                                                            $id = $campos['idTipoId'];
                                                            $tipo = $campos['tipoId'];
                                                        ?>
                                                            <option value="<?php echo $id; ?>"><?php echo $tipo; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="nombre">Nombre</label><br>
                                                    <input type="text" name="name" value="<?php echo $datos['nombres']; ?>" required>
                                                </div>
                                                <div class="col-3">
                                                    <label for="apellido">Apellido</label><br>
                                                    <input type="text" name="lastname" value="<?php echo $datos['apellidos']; ?>" required>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="telefono">Teléfono</label><br>
                                                    <input type="number" name="phone" value="<?php echo $datos['telefono']; ?>" required>
                                                </div>
                                                <div class="col-3">
                                                    <label for="correo">Correo (opcional)</label>
                                                    <input type="text" name="email" value="<?php echo $datos['correoElectronico']; ?>">
                                                </div>
                                                <div class="col-3">
                                                    <label for="contrato">Tipo de contrato</label><br>
                                                    <select name="cont">
                                                        <option><?php echo $datos2['idContrato']; ?></option>
                                                        <?php
                                                        $sql = "SELECT * FROM contrato";
                                                        $consulta = mysqli_query($miConexion, $sql);
                                                        while ($campos = mysqli_fetch_array($consulta)) {
                                                            $id = $campos['idContrato'];
                                                            $contrato = $campos['tipoContrato'];
                                                        ?>
                                                            <option value="<?php echo $id; ?>"><?php echo $contrato; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="nomina">Valor nómina</label><br>
                                                    <input type="text" name="nomin" id="nomin" value="<?php echo $datos2['idNomina']; ?>">
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="genero">Género</label><br>
                                                    <select name="sexo" id="">
                                                        <option><?php echo $datos2['idGenero']; ?></option>
                                                        <?php
                                                        $sql = "SELECT * FROM genero";
                                                        $consulta = mysqli_query($miConexion, $sql);
                                                        while ($campos = mysqli_fetch_array($consulta)) {
                                                            $id = $campos['idGenero'];
                                                            $genero = $campos['genero'];
                                                        ?>
                                                            <option value="<?php echo $id; ?>"><?php echo $genero; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="profesion">Profesión</label><br>
                                                    <select name="profession" id="">
                                                        <option><?php echo $datos2['idProfesion']; ?></option>
                                                        <?php
                                                        $sql = "SELECT * FROM profesion";
                                                        $consulta = mysqli_query($miConexion, $sql);
                                                        while ($campos = mysqli_fetch_array($consulta)) {
                                                            $id = $campos['idProfesion'];
                                                            $profesion = $campos['profesion'];
                                                        ?>
                                                            <option value="<?php echo $id; ?>"><?php echo $profesion; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="cargo">Cargo</label><br>
                                                    <select name="rol" id="">
                                                        <option><?php echo $datos2['idCargo']; ?></option>
                                                        <?php
                                                        $sql = "SELECT * FROM cargos";
                                                        $consulta = mysqli_query($miConexion, $sql);
                                                        while ($campos = mysqli_fetch_array($consulta)) {
                                                            $id = $campos['idCargo'];
                                                            $cargo = $campos['cargo'];
                                                        ?>
                                                            <option value="<?php echo $id; ?>"><?php echo $cargo; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <input type="submit" name="actualizar" class="btn btn-primary" value="Actualizar">
                                        </form>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
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
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
</body>

</html>
<?php
//ingresar los valores a la tabla
if (isset($_POST['actualizar'])) {
    //recibir variables
    $tipoId = $_POST['tipo'];
    $nombre = $_POST['name'];
    $apellido = $_POST['lastname'];
    $telefono = $_POST['phone'];
    $correo = $_POST['email'];
    $contrato = $_POST['cont'];
    $nomina = $_POST['nomin'];
    $genero = $_POST['sexo'];
    $profesion = $_POST['profession'];
    $cargo = $_POST['rol'];

    // crear una consulta para insertar las variables en la tabla
    $sql = "UPDATE personalasistencial 
            SET idTipoId=$tipoId, nombres='$nombre', apellidos='$apellido', telefono ='$telefono',
                correoElectronico='$correo', idContrato='$contrato', idNomina='$nomina', idGenero='$genero',
                idProfesion='$profesion',idCargo='$cargo'
            WHERE idPersonalAsistencial = '$ide'";
    $consulta = mysqli_query($miConexion, $sql);
    if (!$consulta) {
        echo '
            <script>
                alert("Error\nVerifica e inenta nuevamente");
            </script>
        ';
        die(mysqli_error($miConexion));
        /*  echo $ide; */
    } else {
        echo '
            <script>
            alert("¡Actualización Exitosa!");
                window.location = "./empleados.php";
            </script>
        ';
    }
}
?>