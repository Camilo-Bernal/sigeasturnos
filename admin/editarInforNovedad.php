

<?php

require "lib/conexion.php";


//ingresar los valores a la tabla

    //recibir variables
    $id = ($_POST['id']);
   
    $inicio = ($_POST['inicio']);
    $fin = ($_POST['fin']);
    $observacion = ($_POST['observacion']);


    // crear una consulata para insertar las variables en la tabla

   
    $sql = "UPDATE novedades SET  
    fechaInicioNovedad='$inicio', fechaFinNovedad='$fin', obervacion = '$observacion' 
    WHERE idNovedad=$id";

    $consulta = mysqli_query($miConexion, $sql);
    if (!$consulta) {
        echo '
            <script>
                alert("Error \n Verifica e inenta nuevamente");
                window.location = "./editarNovedades.php";
            </script>
        ';
        die(mysqli_error($miConexion));
    } else {
        echo '
            <script>
            alert("¡Actualización Exitosa!");
                window.location = "./editarNovedades.php";
            </script>
        ';
    }

?>