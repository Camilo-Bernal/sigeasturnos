<?php
date_default_timezone_set('America/Bogota');
session_start();
if (isset($_SESSION['usuario'])) {
    header("location: ");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SuTurno</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="plugins/assets/css/sesionStyle.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <h2>Recuperar contraseña</h2>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Recuperar contraseña -->
                    <form action="./admin/pass/restablecer.php" method="post" class="formulario__login">
                        <input type="text" placeholder="Correo Electronico" name="correo" pattern="[A-Za-z0-9-_@.]{1,30}" autofocus required style="width: 100%; height: 40px;">
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" Value="Recuperar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para ingresar</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="admin/login.php" method="post" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Correo Electronico" name="correo" pattern="[A-Za-z0-9-_@.]{1,30}" autofocus required>
                    <input type="password" placeholder="Contraseña" name="contrasenia" pattern="[A-Za-z0-9-_]{1,30}" required>
                    <button>Ingresar</button> <br><br>
                    <!-- Button trigger modal -->
                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">¿Olvidaste tu contraseña?</a>
                </form>
                <!--Registro-->
                <form action="admin/singup.php" method="POST" class="formulario__register">
                    <h2>Regístrarse</h2>
                    <input type="text" placeholder="Nombre completo" name="nombre_completo" autofocus required>
                    <input type="text" placeholder="Usuario" name="usuario" required>
                    <input type="text" placeholder="Correo Electronico" name="correo" required>
                    <input type="password" placeholder="Contraseña" name="contrasenia" required>
                    <button>Regístrarse</button>
                </form>
            </div>
        </div>
    </main>

    <script src="plugins/assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html