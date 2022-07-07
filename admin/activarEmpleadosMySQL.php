
<?php

require "lib/conexion.php";


//ingresar los valores a la tabla

    //recibir variables
    $id = ($_POST['id']);
    
   

    // crear una consulata para insertar las variables en la tabla

   
    $sql = "UPDATE personalasistencial SET  estado='activo' 
    WHERE idPersonalAsistencial = $id ";

    $consulta = mysqli_query($miConexion, $sql);
    if (!$consulta) {
        echo '
            <script>
                alert("Error \n Verifica e inenta nuevamente");
                window.location = "./activarEmpleados.php";
            </script>
        ';
        die(mysqli_error($miConexion));
    } else {
        echo '
            <script>
               
                window.location = "./activarEmpleados.php";
            </script>
        ';
    }

?>