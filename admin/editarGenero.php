
<?php

require "lib/conexion.php";


//ingresar los valores a la tabla

    //recibir variables
    $id = ($_POST['id']);
   
    $genero = ($_POST['genero']);
   


    // crear una consulata para insertar las variables en la tabla

   
    $sql = "UPDATE genero SET  
   genero='$genero'
    WHERE idGenero=$id";

    $consulta = mysqli_query($miConexion, $sql);
    if (!$consulta) {
        echo '
            <script>
                alert("Error \n Verifica e inenta nuevamente");
                window.location = "./generos.php";
            </script>
        ';
        die(mysqli_error($miConexion));
    } else {
        echo '
            <script>
            alert("¡Actualización Exitosa!");
                window.location = "./generos.php";
            </script>
        ';
    }

?>