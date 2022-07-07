<?php
    session_start();
    // Variables de conexión
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $database = "suturno";

    // crear la variable que maneja la conexión
    $miConexion = new mysqli($servername, $username, $password, $database)
    or die("Conexión falló: ". $miConexion->connect_error);
