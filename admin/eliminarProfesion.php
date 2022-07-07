<?php
include("lib/conexion.php");

//Recibir la variable por el metodo Get
$id = $_POST['id_desactivar'];

//ingresar los valores a la tabla

//recibir variables

// crear una consulata para insertar las variables en la tabla
$sql = "UPDATE profesion SET estado = 'inactivo'
            WHERE idProfesion = $id";
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
               
                window.location = "./cargos.php";
            </script>
        ';
}
