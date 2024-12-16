<?php
include "conexion.php";
    function insertarNoticia($conexion,$nombre,$texto,$categoria,$fecha,$imagen){
        $insercion = "INSERT INTO noticias(titulo,texto,categoria,fecha,imagen)
        VALUES('$nombre','$texto','$categoria','$fecha','$imagen')";
        $resultado = mysqli_query($conexion,$insercion);
        return $resultado;
        
    }
?>