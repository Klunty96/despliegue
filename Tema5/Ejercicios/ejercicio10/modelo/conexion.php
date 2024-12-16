<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "lindavista";
    $puerto = 4306;

    $conexion = mysqli_connect($host,$user,$pass,$db,$puerto);

    if(!$conexion){
        echo"<h2>No se ha podido establecer conexion</h2>";
        echo"<a href='index.php'>Volver inicio</a>";
        exit;
    }
?>