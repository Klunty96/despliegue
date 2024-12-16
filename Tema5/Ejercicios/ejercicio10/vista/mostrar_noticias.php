<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar noticias</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
</head>
<body>
    <?php
    include "../modelo/conexion.php";
    include "../modelo/sesion.php";
    include "saludo.php";
    if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['filtro']!= ""){
        $categoria = $_POST['filtro'];
        $consulta = "SELECT n.id,n.titulo,n.texto,c.nombre,n.fecha,n.imagen FROM noticias n JOIN categoria c ON n.categoria = c.id WHERE categoria = $categoria";
    }
    else{

        $consulta = "SELECT n.id,n.titulo,n.texto,c.nombre,n.fecha,n.imagen FROM noticias n JOIN categoria c ON n.categoria = c.id";
    }
        $resultado = mysqli_query($conexion,$consulta);
        $desplegable = "SELECT id, nombre FROM categoria";
        $resultadoDesplegable = mysqli_query($conexion,$desplegable);

    ?>
    <h1>Consulta de noticias</h1>
    <form action="" method="POST">
        <select name="filtro">
            <option value="">Todas</option>
            <?php
                while($fila = mysqli_fetch_assoc($resultadoDesplegable)){
                    echo"<option value='$fila[id]'>$fila[nombre]</option>";
                }
            ?>
        </select>
        <input type="submit" value="Filtrar">
        <br><br>
        
    </form>
    <br>
    <table border ="2">
        <tr>
            <th>Titulo</th>
            <th>Texto</th>
            <th>Categoria</th>
            <th>Fecha</th>
            <th>Imagen</th>
            <th>Actualizar</th>
        </tr>
        <?php
            while($fila = mysqli_fetch_assoc($resultado)){
                echo "<tr>";
                echo "<td>$fila[titulo]</td>"."<td>$fila[texto]</td>"."<td>$fila[nombre]</td>"."<td>$fila[fecha]</td>"."<td>$fila[imagen]</td>";
                echo"<td><form method='POST' action='formulario_modificar.php'><input type='submit' value='Modificar'><input type='hidden' name='idcat' value='$fila[id]'></form></td>";
                echo "</tr>";
            }
        ?>
        
    </table>
    <br>
    <a href="../index.php">Volver al index</a>
</body>
</html>