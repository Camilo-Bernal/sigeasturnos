
<?php

require "lib/conexion.php";


//ingresar los valores a la tabla

//recibir variables
$id = ($_POST['id']);

$contrato = ($_POST['contrato']);



// crear una consulata para insertar las variables en la tabla


$sql = "UPDATE contrato SET  
   tipoContrato='$contrato'
    WHERE idContrato=$id";

$consulta = mysqli_query($miConexion, $sql);
if (!$consulta) {
    echo '
            <script>
                alert("Error \n Verifica e inenta nuevamente");
                window.location = "./contratos.php";
            </script>
        ';
    die(mysqli_error($miConexion));
} else {
    echo '
            <script>
            alert("¡Actualización Exitosa!");
                window.location = "./contratos.php";
            </script>
        ';
}

?>