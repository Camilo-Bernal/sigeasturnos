<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="../../plugins/assets/css/sesionStyle.css" rel="stylesheet">
</head>

<body>
    <br><br><br>
    <!-- Recuperar contraseña -->
    <form action="./restablecer.php" method="post" class="formulario__login">
        <h2>Recuperar contraseña</h2>
        <input type="text" placeholder="Correo Electronico" name="correo" pattern="[A-Za-z0-9-_@.]{1,30}" autofocus required>
        <input type="submit" Value="Recuperar">
    </form>
</body>

</html>