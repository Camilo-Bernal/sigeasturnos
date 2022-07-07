<?php 
    include "../lib/conexion.php";
    $email =$_POST['email'];
    $p1 =$_POST['p1'];
    $p2 =$_POST['p2'];
    if($p1 == $p2){
        $p1=md5($p1);
        $miConexion->query("UPDATE usuarios SET password='$p1' WHERE email='$email' ")or die($miConexion->error);
        echo "todo bien";
        
    }else{
        echo "no coinciden";
    }
?>