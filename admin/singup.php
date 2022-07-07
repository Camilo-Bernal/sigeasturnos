<?php
    include 'lib/conexion.php';

   $nombre_completo = $_POST['nombre_completo']; 
   $usuario = $_POST['usuario'];
   $correo = $_POST['correo'];
   $contrasenia = md5($_POST['contrasenia']);
   
   $query = "INSERT INTO usuarios(name, user, email, password)
             VALUES('$nombre_completo', '$usuario', '$correo', '$contrasenia')";

   //verificar que el corro no se repita en la base de datos
   $verificar_correo = mysqli_query($miConexion, "SELECT * FROM usuarios WHERE email='$correo'");

   if(mysqli_num_rows($verificar_correo) > 0){
       echo'
       <script>
           alert("Este correo ya se encuentra registrado");
           window.location = "../index.php";
       </script>
       ';
       exit();
   }

   //verificar que el nombre no se repita en la base de datos
   $verificar_usuario = mysqli_query($miConexion, "SELECT * FROM usuarios WHERE user='$usuario'");

   if(mysqli_num_rows($verificar_usuario) > 0){
       echo'
       <script>
           alert("Este usuario ya se encuentra registrado");
           window.location = "../index.php";
       </script>
       ';
       exit();
   }

   $ejecutar = mysqli_query($miConexion, $query);

   if($ejecutar){
       echo '
            <script>
                 alert("Usuario Registrado Exitosamente");
                 window.location = "../index.php";
            </script>
       ';
   }else
   echo '
        <script>
             alert("Intentalo de nuevo, usuario no registrado");
             window.location = "../index.php";
        </script>
   ';
   mysqli_close($conexion);
