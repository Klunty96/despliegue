<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar noticias</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
</head>
<body>
<?php
    include "../modelo/conexion.php";
    include "../modelo/sesion.php";
    include "saludo.php";
$consulta = "SELECT n.id,n.titulo,n.texto,c.nombre,n.fecha,n.imagen FROM noticias n JOIN categoria c ON n.categoria = c.id";
$resultado = mysqli_query($conexion,$consulta);
?>
<h2 style="color:blue;">Eliminar noticias</h2>
<table border="2">
    <tr>
        <th>Titulo</th><th>Texto</th><th>Categoría</th><th>Fecha</th><th>Imagen</th><th>Borrar</th>
    </tr>
    <form action="../modelo/funcionesDelete.php" method="post">
    <?php
        while($fila = mysqli_fetch_assoc($resultado)){
            echo"<tr>";
            echo"<td>$fila[titulo]</td>"."<td>$fila[texto]</td>"."<td>$fila[nombre]</td>"."<td>$fila[fecha]</td>"."<td>$fila[imagen]</td>";
            echo"<td><input type='checkbox' value='$fila[id]' name='borrar[]'></td>";
            echo "</tr>";
        }
    ?>
    
</table>
<br><br>
<input type="submit" value ="Eliminar noticias marcadas">
</form>
<br><br>
<a href="../index.php">Volver al index</a>
</body>
</html>