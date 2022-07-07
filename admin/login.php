<?php
    include 'lib/conexion.php';
    session_start();

    $correo = $_POST['correo'];
    $contrasenia = md5($_POST['contrasenia']);
    

    $validar_login = mysqli_query($miConexion, "SELECT * FROM usuarios 
    WHERE email='$correo' and password='$contrasenia'");
    $filas = mysqli_fetch_array($validar_login);

    if(mysqli_num_rows($validar_login) == 1){
        if($filas['rol'] == 1){ //administrador
            $_SESSION['email'] = $correo;
            header("location: inicio.php");
            echo "HOLA ADMIN";
            exit;
        }
        else if($filas['rol'] == 2){
            $_SESSION['email'] = $correo;
            header("location: novedades.php");
            echo "HOLA Cordi";
            exit;
        }
        
    }else{
        echo '
            <script>
                alert("Datos de acceso incorrectos \n Verifica e intenta nuevamente");
                window.location = "../index.php";
            </script>
        ';
        exit;
    }
?>