
<?php

require "lib/conexion.php";


//ingresar los valores a la tabla

    //recibir variables
    $id = ($_POST['id']);
   
    $cargo = ($_POST['cargos']);
   


    // crear una consulata para insertar las variables en la tabla

   
    $sql = "UPDATE cargos SET  
   cargo='$cargo'
    WHERE idCargo=$id";

    $consulta = mysqli_query($miConexion, $sql);
    if (!$consulta) {
        echo '
            <script>
                alert("Error \n Verifica e inenta nuevamente");
                window.location = "./cargos.php";
            </script>
        ';
        die(mysqli_error($miConexion));
    } else {
        echo '
            <script>
                alert("¡Actualización Exitosa!");
                window.location = "./cargos.php";
            </script>
        ';
    }

?>