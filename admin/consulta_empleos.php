<?php

function imprime_registros($profesion, $miConexion)
{
    $total_registros = 0;
    $sql = "SELECT * FROM empleados WHERE idContrato ='Planta Permanente' AND idProfesion = '$profesion'";
    $consulta = mysqli_query($miConexion, $sql); 
    if (mysqli_num_rows($consulta) > 0) {
        $total_registros = mysqli_num_rows($consulta);
    }
    return $total_registros;
}


/**
 * Actualiza los recargos de la persona 
 * Busca todos los posibles casos que tenga en ese mes
 */
function actualizar($p_idPersonalAsistencial, $miConexion)
{ //function parameters, two variables.
    $totalHorasDomDiurnas=0;
    $totalHorasDomNoct=0;
    $totalHorasFestDiurnas=0;
    $totalHorasFestNoct=0;
    $totalHorasOrdNoct=0;
    $totalHorasSabNoct=0;
    $domDiurno=0;
    $domNoct=0;
    $festDiurno=0;
    $festNoct=0;
    $noctOrdi=0;
    $noctSabado=0;
    $totalRecargo=0;
    $mes="";
    $anio="";
    $sql2="SELECT MONTH(NOW()) AS mes, YEAR(NOW()) AS anio ";
    $consulta2 = mysqli_query($miConexion, $sql2);
    

    if(mysqli_num_rows($consulta2) > 0)
    {
        
        while ($datos = mysqli_fetch_array($consulta2)) 
        {            
            $mes=$datos['mes'];       
            $anio= $datos['anio'];           
        }
    }
        
    
    $sql = "SELECT p.idPersonalAsistencial as persona, CASE
    WHEN (dayname(p.fechaInicio) = 'Saturday' AND p.idTurno=3) THEN 'SabNoche' 
    WHEN (dayname(p.fechaInicio) = 'Sunday' AND (p.idTurno=1 OR p.idTurno=2)) THEN 'DomDiurno' 
    WHEN (dayname(p.fechaInicio) = 'Sunday' AND p.idTurno=3) THEN 'DomNoche' 
    WHEN (esFestivo = 1 AND p.idTurno=3 ) THEN 'FestNoche' 
    WHEN (esFestivo = 1 AND (p.idTurno=1 OR p.idTurno=2) ) THEN 'FestDiurno' 
    WHEN (dayname(p.fechaInicio) <> 'Saturday' AND dayname(p.fechaInicio) <> 'Sunday' AND esFestivo = 0 AND p.idTurno=3) THEN 'OrdinarioNoche' 
    ELSE '0' END AS recargo FROM programacion p WHERE p.idPersonalAsistencial=$p_idPersonalAsistencial;";
    $consulta = mysqli_query($miConexion, $sql);
    
    
    
    if (mysqli_num_rows($consulta) > 0) {



        while ($datos = mysqli_fetch_array($consulta)) 
        {
            
            if($datos['recargo']=='DomDiurno')
            {
                $domDiurno += 5*25000;
                $totalHorasDomDiurnas+=5;
            }
            if($datos['recargo']=='OrdinarioNoche')
            {
                $noctOrdi += 9*10000;
                $totalHorasOrdNoct+=9;
            }
            if($datos['recargo']=='SabNoche')
            {
                $noctSabado+=((3*10000) +(6*25000));
                $totalHorasSabNoct +=9;
            }
            if($datos['recargo']=='DomNoche')
            {
                $domNoct+=((6*10000) +(3*25000));
                $totalHorasDomNoct +=9;
            }
            if($datos['recargo']=='FestNoche')
            {
                $festNoct+=((6*10000) +(3*25000));
                $totalHorasFestNoct +=9;
            }
            if($datos['recargo']=='FestDiurno') 
            {
                $festDiurno+=5*25000;
                $totalHorasFestDiurnas+=5;
            }


           
        } 
        $totalRecargo+= $noctOrdi+ $domDiurno+  $domNoct+ $festNoct + $festDiurno + $noctSabado;

        //Realizar el UPDATE en la tabla recargos con el mes y los totales para cada persona
        $sql = "INSERT INTO `recargos`( `idPersonalAsistencial`, `mes`, `anio`, `ordiNoct`, `sabNoct`,
         `domDiurno`, `domNoct`, `festDiurno`, `festNoct`, `totalRecargo`, `horasNoctOrd`, `horasDiurnDom`, 
         `horasNoctDom`, `horasDiurnFest`, `horasNoctFest`) VALUES ($p_idPersonalAsistencial, $mes, $anio, $noctOrdi,$noctSabado,
         $domDiurno,$domNoct, $festDiurno, $festNoct,$totalRecargo,$totalHorasOrdNoct,$totalHorasDomDiurnas,
         $totalHorasDomNoct,$totalHorasFestDiurnas,$totalHorasFestNoct); ";
           
       
        $consulta = mysqli_query($miConexion, $sql);
        

        
        
    }
   
}
