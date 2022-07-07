<?php

require "lib/conexion.php";


//ingresar los valores a la tabla

//recibir variables
$contrato = ($_POST['contrato']);
$profesion = ($_POST['profesiones']);
$inicio = ($_POST['inicio']);
$fin = ($_POST['fin']);

// si presiona el botón
if (isset($_POST['generar_reporte'])) {
    header('Content-Type:application/vdn.ms-excel; charset: iso-8859-1');
    header('Content-Disposition: attachment; filename= Reporte_Novedades_Contrato.csv');

       // SALIDA DEL ARCHIVO

    $salida = fopen('php://output', 'w');
    //encabezados
    fputcsv($salida, array('Contrato', 'Profesión',  'Tipo ID', 'Identificación',
     'Nombres', 'Apellidos', 'ID Novedad', 'Fecha inicio', 'Fecha fin', 'Descripción'));
     
    $reporteCsv ="SELECT * FROM reportenovedades WHERE idContrato = '$contrato'
     AND idProfesion = '$profesion' AND fechaInicioNovedad BETWEEN '$inicio' AND '$fin' AND (fechaFinNovedad <= '$fin')";
    


$consulta = mysqli_query($miConexion, $reporteCsv);    
    while ($fila = $consulta->fetch_assoc())

        fputcsv($salida, array(
            $fila['idContrato'],
            $fila['idProfesion'],
            $fila['idTipoId'],
            $fila['idPersonalAsistencial'],
            $fila['nombres'],
            $fila['apellidos'],
            $fila['idNovedad'],
            $fila['fechaInicioNovedad'],
            $fila['fechaFinNovedad'],
            $fila['obervacion']
        ));
} 


?>

