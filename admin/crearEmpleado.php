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
                    <a href="" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                <a href="./Manual de usuario sistema unificado de turnos.pdf" class="nav-link">Manual</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
          

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
                            <h1></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
                                <li class="breadcrumb-item active">Registrar empleado</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content center">
                <div class="container-fluid">
                    <!-- desde aquí lo nuevo -->
                    <div class="row justify-content-center" style="width: 100%;">
                        <div class="col-sm-11">
                            <div class="card card-top-line">
                                <div class="card-body">
                                    <h2 class="card-header text-center"><b>Registrar Empleado</b></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <form action="" method="post">
                            <div class="row justify-content-center" style="width: 100%;">
                                <div class="col-sm-11 mb-3">
                                    <div class="card card-top-line">
                                        <h5 class="card-header-new card-header"><b>Datos nuevo empleado</b></h5>
                                        <div class="card-body">

                                            <div class="row mx-auto">
                                                <div class="col-sm-2 mb-3">
                                                    <label for="tipoDocumento" style="margin-left:70px;">Tipo ID</label>
                                                </div>
                                                <div class="col-sm-2 mb-3">
                                                    <select class="form-select form-select-sm form-select-padding-y-sm:0" name="tipoIdentificacion" style="width: 130px;" aria-label="Default select example" id="tipoDocumento" required>
                                                        <option>Seleccionar</option>
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

                                                <div class="col-sm-1 mb-3" style="margin-left:40px;">
                                                    <label for="docIdentificacion">Identificación</label>
                                                </div>
                                                <div class="col-sm-1 mb-3" style="margin-left:30px;">

                                                    <input type="number" class="form-control form-control-sm" style="width: 130px;" id="docIdentificacion" name="identificacion" required>

                                                </div>
                                            </div>
                                            <!--###########################################################################################################################-->
                                            <div class="row mx-auto">
                                                <div class="col-sm-2 mb-3">
                                                    <label for="nombre" style="margin-left:70px;">Nombres</label>
                                                </div>
                                                <div class="col-sm-2 mb-3">
                                                    <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" required>
                                                </div>

                                                <div class="col-sm-1 mb-3" style="margin-left:40px;">
                                                    <label for="apellido">Apellidos</label>
                                                </div>
                                                <div class="col-sm-2 mb-3">
                                                    <input type="text" class="form-control form-control-sm" style="margin-left:30px;" id="apellido" name="apellido" required>
                                                </div>

                                                <div class="col-sm-1 mb-3">
                                                    <label for="genero" style="margin-left:50px;">Género </label>
                                                </div>
                                                <div class="col-sm-1 mb-3" style="margin-left:50px;">
                                                    <select class="form-select form-select-sm" style="width: 150px;" aria-label="Default select example" id="genero" name="genero" required>



                                                        <option>Seleccionar</option>
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


                                            </div>

                                            <div class="row mx-auto">

                                                <div class="col-sm-2 mb-3">
                                                    <label for="profesion" style="margin-left:70px;">Profesión</label>
                                                </div>
                                                <div class="col-sm-2 mb-3">
                                                    <select class="form-select form-select-sm" style=" width: 130px" aria-label="Default select example" id="profesion" name="profesion" required>
                                                        <option>seleccionar</option>
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

                                                <div class="col-sm-1 mb-3" style="margin-left:40px;">
                                                    <label for="cargo">Cargo</label>
                                                </div>
                                                <div class="col-sm-2 mb-3 " style="margin-left:30px;">
                                                    <select class="form-select form-select-sm" style="width: 130px;" aria-label="Default select example" id="cargo" name="cargo" required>
                                                        <option>seleccionar</option>
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

                                                <div class="col-sm-1 mb-3">
                                                    <label for="contrato" style="margin-left:20px;">Contrato </label>
                                                </div>
                                                <div class="col-sm-1 mb-3" style="margin-left:20px;">
                                                    <select class="form-select form-select-sm" style="width: 150px;" aria-label="Default select example" id="contrato" name="contrato" required>
                                                        <option>seleccionar</option>
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

                                            </div>
                                            <div class="row mx-auto">
                                                <div class="col-sm-2 mb-3 ">
                                                    <label for="ocupacion" style="margin-left:70px;">Email</label>
                                                </div>

                                                <div class="col-sm-2 mb-3">
                                                    <input type="text" class="form-control form-control-sm" id="email" name="correo" required>
                                                </div>

                                                <div class="col-sm-1 mb-3" style="margin-left:40px;">
                                                    <label for="telefonoPersonal">Teléfono</label>
                                                </div>
                                                <div class="col-sm-2 mb-3">
                                                    <input type="text" class="form-control form-control-sm" style="margin-left:30px;" id="telefono" name="telefono" required>
                                                </div>
                                                <div class="col-sm-1 mb-3">
                                                    <label for="genero" style="margin-left:50px;">Nómina</label>
                                                </div>
                                                <div class="col-sm-1 mb-3" style="margin-left:50px;">
                                                    <input type="number" class="form-control form-control-sm" style="width: 150px;" id="nomina" name="nomina" placeholder="$" required>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="row mx-auto">
                                    <div class="col-sm-5 mb-3 btn-lg-8">

                                    </div>
                                    <div class="col-sm-2 mb-3 btn-lg-8" style="align-items: center;">
                                        <input type="submit" value="Registrar" class="btn button-18 css-button-arrow--sky" name="agregar" style="margin-left: 0px;">
                                    </div>
                                    <div class="col-sm-5 mb-3 btn-lg-8"></div>

                                </div>
                            </div>
                        </form>
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
if (isset($_POST['agregar'])) {
    //recibir variables
    $tipoId = $_POST['tipoIdentificacion'];
    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contrato = $_POST['contrato'];
    $nomina = $_POST['nomina'];
    $genero = $_POST['genero'];
    $profesion = $_POST['profesion'];
    $cargo = $_POST['cargo'];

    // crear una consulata para insertar las variables en la tabla
    $sql1 = "SELECT idPersonalAsistencial FROM personalasistencial WHERE idPersonalAsistencial = '$identificacion' ";
    $sql2 = "SELECT correoElectronico FROM personalasistencial WHERE correoElectronico ='$correo' ";
    $sql3 = "SELECT telefono FROM personalasistencial WHERE telefono ='$telefono' ";
  
    $consulta1 = mysqli_query($miConexion, $sql1);
    $consulta2 = mysqli_query($miConexion, $sql2);
    $consulta3 = mysqli_query($miConexion, $sql3);
  
    if (mysqli_num_rows($consulta1) > 0) {

        echo ' 
        <script>
            alert("¡Error! \n La identificación ya se encuentra regitrada \n Intenta de nuevo");
            window.location = "./crearEmpleado.php";
        </script>';
    } 
    else if (mysqli_num_rows($consulta2) > 0) {

        echo ' 
        <script>
            alert("¡Error! \n El correo electrónico ya exsite\n Intenta de nuevo");
            window.location = "./crearEmpleado.php";
        </script>';
    } 
    
    else if (mysqli_num_rows($consulta3) > 0) {

        echo ' 
        <script>
            alert("¡Error! \n El teléfono ya exsite\n Intenta de nuevo");
            window.location = "./crearEmpleado.php";
        </script>';
    }
    else {
        $sql = "INSERT INTO personalasistencial (idTipoId, idPersonalAsistencial, nombres, apellidos, telefono, correoElectronico, idContrato, idNomina, idGenero, idProfesion, idCargo)
            VALUES ($tipoId, $identificacion, '$nombre', '$apellido', $telefono, '$correo', $contrato, $nomina, $genero, $profesion, $cargo)";
        $consulta = mysqli_query($miConexion, $sql);
        if (!$consulta) {
            echo '
            <script>
                alert("¡Error! \n Verifica e inenta nuevamente");
                window.location = "./empleados.php";
            </script>
        ';
            die(mysqli_error($miConexion));
        } else {
            echo '
            <script>
                alert("¡Se agregó al empleado correctamente!");
                window.location = "./empleados.php";
            </script>
        ';
        }
    }
}
?>