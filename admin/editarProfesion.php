
<?php

require "lib/conexion.php";


//ingresar los valores a la tabla

    //recibir variables
    $id = ($_POST['id']);
   
    $profesion = ($_POST['profesion']);
   


    // crear una consulata para insertar las variables en la tabla

   
    $sql = "UPDATE profesion SET  
  profesion='$profesion'
    WHERE idProfesion=$id";

    $consulta = mysqli_query($miConexion, $sql);
    if (!$consulta) {
        echo '
            <script>
            alert("¡Actualización Exitosa!");
                window.location = "./profesiones.php";
            </script>
        ';
        die(mysqli_error($miConexion));
    } else {
        echo '
            <script>
                alert("Se desactivó al empleado correctamente");
                window.location = "./profesiones.php";
            </script>
        ';
    }

?>