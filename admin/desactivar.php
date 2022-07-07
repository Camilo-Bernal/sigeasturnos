<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

require "lib/conexion.php";


//ingresar los valores a la tabla

//recibir variables
$ide = ($_POST['identificacionDesactivar']);

// crear una consulata para insertar las variables en la tabla
$sql = "UPDATE personalasistencial SET estado = 'inactivo'
            WHERE idPersonalAsistencial = $ide";
$consulta = mysqli_query($miConexion, $sql);
if (!$consulta) {
    echo '
            <script>
                alert("Error \n Verifica e inenta nuevamente");
                window.location = "./empleados.php";
            </script>
        ';
    die(mysqli_error($miConexion));
} else {
    echo '
            <script>
                alert("Se desactivó el empleado correctamente");
                window.location = "./empleados.php";
            </script>
        ';
}

?>