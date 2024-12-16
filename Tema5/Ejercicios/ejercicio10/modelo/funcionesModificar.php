<?php
    include "conexion.php";

    if($_SERVER['REQUEST_METHOD']=="POST"){
        if($_POST['titulo']==""||$_POST['texto']==""){
            header("Location:../vista/formulario_modificar.php");
        }
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $categoria = $_POST['categoria'];
        $id = $_POST['idcambio'];
        

        $update = "UPDATE noticias SET titulo = '$titulo',
        texto = '$texto',
        categoria = '$categoria'
        WHERE id = '$id'";

        $resultado = mysqli_query($conexion,$update);
        if($resultado){
            setcookie("noticia",$id,time()+3600,"/");
            header("Location:../vista/noticia_actualizada.php");
            exit();
        }
        else{
            echo"Error al establecer la cookie";
        }
    }
?>