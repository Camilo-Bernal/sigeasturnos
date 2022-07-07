<?php


require "lib/conexion.php";
//ingresar los valores a la tabla
    //recibir variables
    $identificacion = $_POST['identificacionAgregar'];
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];
    $observacion = $_POST['observacion'];


    // crear una consulata para insertar las variables en la tabla
    $sql = "INSERT INTO novedades(idPersonalAsistencial, fechaInicioNovedad, fechaFinNovedad, obervacion)
            VALUES ( $identificacion, '$inicio', '$fin', '$observacion')";
    $consulta = mysqli_query($miConexion, $sql);
    if (!$consulta) {
        echo '
            <script>
                alert("Error \n Verifica e inenta nuevamente");
                window.location = "./novedades.php";
            </script>
        ';
        die(mysqli_error($miConexion));
    } else {
        echo '
            <script>
                alert("Se agregó la novedad correctamente");
                window.location = "./novedades.php";
            </script>
        ';
    }
?>