<?php
// Varios destinatarios
$para  = $email . ', '; // atención a la coma
//$para .= 'wez@example.com';

$cabeceras  = 'From: cabe0320@gmail.com' . "\r\n";
//$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// título
$asunto = 'Restablecer contraseña suTurno';
$codigo = rand(100000, 999999);

// mensaje
$mensaje = '
<html>
<head>
  <title>Restablecer contraseña</title>
</head>
<body>
    <h1>Nombre de la empresa</h1>
    <div style="text-align:center; background-color:#ccc">
        <p>Restablecer contraseña</p>
        <h3>' . $codigo . '</h3>
        <p> 
            <a 
                href="http://localhost/sisaturnos/admin/pass/reset.php?email=' . $email . '&token=' . $token . '"> 
                para restablecer da click aqui 
            </a> 
        </p>
        <p> <small>Sí usted no envió este codigo favor de omitir</small> </p>
    </div>
</body>
</html>
';
// Enviarlo
$enviado = false;
if (mail($para, $asunto, $mensaje, $cabeceras)) {
    $enviado = true;
}
?>