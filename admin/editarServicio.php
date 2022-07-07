
<?php

require "lib/conexion.php";


//ingresar los valores a la tabla

    //recibir variables
    $id = ($_POST['id']);
   
    $servicio = ($_POST['servicio']);
   


    // crear una consulata para insertar las variables en la tabla

   
    $sql = "UPDATE servicios SET  
   nombreServicio='$servicio'
    WHERE idServicio=$id";

    $consulta = mysqli_query($miConexion, $sql);
    if (!$consulta) {
        echo '
            <script>
                alert("Error \n Verifica e inenta nuevamente");
                window.location = "./servicios.php";
            </script>
        ';
        die(mysqli_error($miConexion));
    } else {
        echo '
            <script>
            alert("¡Actualización Exitosa!");
                window.location = "./servicios.php";
            </script>
        ';
    }

?>