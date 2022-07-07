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
    header('Content-Type:application/vdn.ms-excel; charset: iso8859-1');
    header('Content-Disposition: attachment; filename= Reporte_Recargos_Contrato.csv');

       // SALIDA DEL ARCHIVO

    $salida = fopen('php://output', 'w');
    //encabezados
    fputcsv($salida, array('Contrato', 'Profesión', 'Identificación',
     'Nombres', 'Apellidos', 'Mes', 'Año', 'Horas Ordinarias nocturnas', 'valor Ordinario nocturno', 
     'valor Sabado nocturno','Horas Dominicales diurnas','valor Dominical Diurno',
     'Horas Dominicales nocturnas','valor Dominical Nocturno','Horas Festivas diurnas',
     'valor Festivo Diurno','Horas Festivo nocturnas','valor Festivo Nocturno', 'Total Recargo',));
     
    $reporteCsv ="SELECT * FROM `reporterecargos` WHERE idContrato ='$contrato' AND idProfesion ='$profesion'
    AND mes ='$inicio' AND anio ='$fin'";
    


$consulta = mysqli_query($miConexion, $reporteCsv);    
    while ($fila = $consulta->fetch_assoc())

        fputcsv($salida, array(
            $fila['idContrato'],
            $fila['idProfesion'],
            
            $fila['idPersonalAsistencial'],
            $fila['nombres'],
            $fila['apellidos'],
            $fila['mes'],
            $fila['anio'],
            $fila['horasNoctOrd'],
            $fila['ordiNoct'],
            $fila['sabNoct'],
            $fila['horasDiurnDom'],
            $fila['domDiurno'],
            $fila['horasNoctDom'],
            $fila['domNoct'],
            $fila['horasDiurnFest'],
            $fila['festDiurno'],
            $fila['horasNoctFest'],
            $fila['festNoct'],
            $fila['totalRecargo']
        ));
} 


?>

