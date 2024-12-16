<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de noticias</title>
</head>
<body>
    <?php
    include "../modelo/conexion.php";
        if($_COOKIE['noticia']){
            $id = $_COOKIE['noticia'];
            $select = "SELECT n.titulo,n.texto,c.nombre,n.imagen FROM noticias n JOIN categoria c ON n.categoria = c.id WHERE n.id = $id";
            $resultado = mysqli_query($conexion,$select);

            while($fila = mysqli_fetch_assoc($resultado)){
                $titulo = $fila["titulo"];
                $texto = $fila["texto"];
                $categoria = $fila["nombre"];
            }
            
        }
        else{
            $titulo=$texto=$categoria="";
            
        }
        $fecha = date("d-m-Y");
    ?>
    <h1>Gestion de noticias</h1>
    <h2>Resultado de la actualizacion de la notica</h2>
    <p>La noticia ha sido actualizada correctamente:</p>
    <ul>
        <li>Titulo: <?=$titulo?></li>
        <li>Texto: <?=$texto?></li>
        <li>Categoria: <?=$categoria?></li>
        <li>Fecha: <?=$fecha?></li>
        <li>Imagen: imagen</li>
    </ul>
    <br><br><br>
    <a href="../index.php">[Volver]</a>
</body>
</html>