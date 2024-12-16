<?php
        include "conexion.php";
    // include "modelo/sesion.php";

    
    $SELECT="SELECT tipo_usuario FROM usuario WHERE tipo_usuario = 'sinRol'";
    $query = mysqli_query($conexion,$SELECT);
    $numeroPendientes=mysqli_num_rows($query);
    echo"<h3>$numeroPendientes usuarios pendientes de asignar rol <a href='vista/muestraUsuariosSinRol.php'>Asignar Roles</a></h3>";
?>
