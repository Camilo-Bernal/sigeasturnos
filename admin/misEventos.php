<?php
header('Content-Type: application/json');

require("./lib/conexion.php");


switch ($_GET['accion']) {
    case 'agregar':
        $respuesta = mysqli_query($miConexion, "INSERT INTO programacion(idTurno, fechaInicio, fechaFin, idPersonalAsistencial, idServicio, esDomingo, esFestivo, numFestivo, numDomingos)
        VALUES ($_POST[title],'$_POST[fechaInicio]','$_POST[fechaFin]',$_POST[idEmpleado],$_POST[nombreServicio],$_POST[dom],$_POST[fest],$_POST[fest],$_POST[dom])");
        echo json_encode($respuesta);
        break;

    case 'modificar':
        $respuesta = mysqli_query($miConexion, "UPDATE programacion
        SET idTurno=$_POST[title], fechaInicio='$_POST[fechaInicio]', fechaFin='$_POST[fechaFin]', idServicio=$_POST[nombreServicio], esFestivo=$_POST[fest], esDomingo=$_POST[dom]
        WHERE idProgramacion=$_POST[idPrograma]");
        echo json_encode($respuesta);
        break;

    case 'borrar':
        $respuesta = mysqli_query($miConexion, "delete from programacion where idProgramacion=$_POST[idPrograma]");
        echo json_encode($respuesta);
        break;
}
