<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificacion de notisias</title>
</head>
<body>
    <?php
        include "../modelo/conexion.php";
        include "../modelo/sesion.php";
        include "saludo.php";
        $error="";
        if($_SERVER['REQUEST_METHOD']=="GET"){
            $error = "El texto y el titulo no deben estar en blanco";
        }
            
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $idCat = $_POST['idcat'];
        }else{
            $idCat = "1";
        }
        $select = "SELECT n.titulo,n.texto,n.categoria,c.nombre,n.imagen,n.id FROM noticias n JOIN categoria c ON n.categoria = c.id WHERE n.id=$idCat";
        $resultado = mysqli_query($conexion,$select);
        while($fila = mysqli_fetch_array($resultado)){
            $titulo = $fila[0];
            $texto = $fila[1];
            $categoria = $fila[2];
            $categoriaNombre = $fila[3];
            $id = $fila[5];
        }
        $desplegable = "SELECT id, nombre FROM categoria";
        $resultadoDesplegable = mysqli_query($conexion,$desplegable);
        
    ?>
    <h1>Modificar noticia</h1>
    <h3 style="color:red"><?=$error?></h3><br><br>
    <form action="../modelo/funcionesModificar.php" method="POST">
        <label for="titulo">Título:* </label>
        <input type="text" value='<?=$titulo?>'size="40" name="titulo">
        <br><br>
        <label for="titulo">Texto:* </label>
        <textarea name="texto" id="texto" cols="30" rows="10"><?=$texto?></textarea>
        <!-- <input type="text" value='<?=$texto?>'size="100"> -->
        <br><br>
        <label for="categoria">Categoria:</label>
        <select name="categoria">
            <option value="<?php echo $categoria; ?>"><?php echo $categoriaNombre?></option>
            <?php
                while($fila = mysqli_fetch_assoc($resultadoDesplegable)){
                    if($fila['id']!=$categoria){
                        echo "<option value='$fila[id]'>$fila[nombre]</option>";
                    }
                    
                }
            ?>
        </select>
        <br><br>
        <label for="imagenActual">Imagen actual: </label>
        imagen <br><br>
        <label for="nuevaImagen">Nueva Imagen</label>
        <input type="file" name="imagenNueva">
        <br><br>
        <input type="hidden" name="idcambio" value="<?php echo $id?>">
        <input type="submit" value="Guardar Cambios">
    </form>
    <br><br>
    <p>NOTA: los datos marcados con (*) deben ser rellenados obligatoriamente</p>
    <br><br><br>

    <a href="mostrar_noticias.php">[Volver al listado de noticias]</a>
    <a href="../index.php">[Volver al listado index]</a>
    
</body>
</html>