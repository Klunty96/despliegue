<?php
    include "../modelo/conexion.php";
    include "../modelo/sesion.php";
    include "saludo.php";
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $nombre = $_POST['nombre'];
        $texto = $_POST['texto'];
        $categoria = $_POST['categoria'];
        $fecha =date("Y-m-d");

        $buscarCategoria = "SELECT nombre FROM categoria WHERE id=$categoria";
        $resultado = mysqli_query($conexion,$buscarCategoria);
        while($fila = mysqli_fetch_row($resultado)){
            $nombreCategoria = $fila[0];
        }
        

    }
    if($nombre ==""||$texto==""||$categoria==""){
        header("Location: inserta_error.php");
    }
    include "../modelo/funcionesInsert.php";

    if(insertarNoticia($conexion,$nombre,$texto,$categoria,$fecha,"no hay")==false){
        header("Location: inserta_error.php");
    }
    $fecha =date("d-m-Y");
?>
<h1>Gestión de noticias</h1>
<h2>Resultado de la inserción de la nueva noticia</h2>
<p>La noticia ha sido recibida correctamente</p>
<ul>
    <li>Título: <?=$nombre?></li>
    <li>Texto: <?=$texto?></li>
    <li>Categoría: <?=$nombreCategoria?></li>
    <li>Fecha: <?=$fecha?></li>
    <li>Imagen: </li>
</ul>

<a href="../index.php">[Volver]</a>