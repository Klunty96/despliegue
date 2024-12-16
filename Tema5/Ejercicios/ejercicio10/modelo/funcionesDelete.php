<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrada</title>
</head>
<body>

    <?php
    include "conexion.php";
    include "./vista/saludo.php";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id = "";
        $borrarId = $_POST['borrar'];
        

       

        foreach($borrarId as $entrada){
            $id = $entrada;
            $consulta = "SELECT n.titulo,n.texto,c.nombre,n.fecha,n.imagen FROM noticias n JOIN categoria c ON n.categoria = c.id WHERE n.id = $id";
            $resultado = mysqli_query($conexion,$consulta);
            while($fila = mysqli_fetch_assoc($resultado)){
                echo"<p>Noticia Eliminada:</p>";
                echo"<ul>";
                echo "<li>Titulo: $fila[titulo]</li>";
                echo "<li>Texto: $fila[texto]</li>";
                echo "<li>Categoria: $fila[nombre]</li>";
                echo "<li>Fecha: $fila[fecha]</li>";
                echo "<li>Imagen: $fila[imagen]</li>";
                echo "</ul>";
            }
            $borrarConsulta = "DELETE FROM noticias WHERE id = $id";
            $resultadoBorrar = mysqli_query($conexion,$borrarConsulta);
            
        }
        
    }
?>
    <p>Numero total de noticias eliminadas: <?=count($borrarId)?></p>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
