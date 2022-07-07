<?php 
    include("lib/conexion.php");

   //Recibir la variable por el metodo Get
   $id = $_POST['id_desactivar'];

   //ingresar los valores a la tabla

   //recibir variables

   // crear una consulata para insertar las variables en la tabla
   $sql = "UPDATE contrato SET estado = 'inactivo'
           WHERE idContrato = $id";
   $consulta = mysqli_query($miConexion, $sql);
   if (!$consulta) {
       echo '
           <script>
               alert("Error \n Verifica e inenta nuevamente");
               window.location = "./contratos.php";
           </script>
       ';
       die(mysqli_error($miConexion));
   } else {
       echo '
           <script>
              
               window.location = "./contratos.php";
           </script>
       ';
   }
