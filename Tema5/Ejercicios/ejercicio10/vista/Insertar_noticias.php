<?php
    include "../modelo/conexion.php";
    include "../modelo/sesion.php";
    include "saludo.php";
    $consulta = "SELECT id,nombre FROM categoria";
    $resultado = mysqli_query($conexion,$consulta);
    
    ?>
<h1>Insercion de nueva noticia</h1>
<form action="noticia_insertada.php" method="POST" enctype ="multipart/form-data">
<label for="titulo">Título*: </label>
<input type="text" name="nombre"><br><br>
<label for="Texto">Texto*: </label>
<textarea name="texto" cols=45 rows="5"></textarea><br><br>
<label for="categoria">Categoria:</label>
<select name="categoria">
    <?php
         
            while($fila =mysqli_fetch_assoc($resultado)){
                echo "<option value=$fila[id]>$fila[nombre]</option>";
                
            }
         
    ?>
</select><br><br>
<label for="imagen">Imagen:</label>
<input type="file" name="imagen"><br><br>
<input type="submit" value="Insertar noticia">
</form>