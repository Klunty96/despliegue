<?php
     $directorioActual = getcwd();
     $ruta = explode("\\",$directorioActual);
     $ultimo = end($ruta);

    if($ultimo == "modelo"){
     $cerrar = "cerrarSesion.php";
    }
    else if($ultimo == "vista"){
          $cerrar = "../modelo/cerrarSesion.php";
    }
    else{
          $cerrar = "./modelo/cerrarSesion.php";
    }
    echo"<div style='display:flex;background-color:blue;color:white;justify-content:space-between; align-items: center;height:40px;font-size:40px;'>";
     echo"<span>Sistema de Gestion de Noticias </span><span>Bienvenid@ $usuario 😃 <a href='$cerrar'>🚪</a> </span>";
     echo"</div>";
    
?>