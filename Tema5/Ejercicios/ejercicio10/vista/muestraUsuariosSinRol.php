<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignacion de roles</title>
    <style>
        th{
            background-color:blue;
            color:white
        }
        table{
            text-align:center;
        }
    </style>
</head>
<body>
<?php
    include "../modelo/conexion.php";
    include "../modelo/sesion.php";
    include "saludo.php";
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['usuarioMod'])){
            $usuarioMod = $_POST['usuarioMod'];
            $tipo = $_POST['tipoUsuario'];
            $update = "UPDATE usuario SET tipo_usuario = '$tipo' WHERE usuario = '$usuarioMod'";
            $actualizacion = mysqli_query($conexion,$update);
            
            
        }
        
    }
    echo"<h2>Asignación de ROLES de usuario</h2>";
    $select ="SELECT nombre,usuario,email,tipo_usuario FROM usuario WHERE tipo_usuario = 'sinRol'";
    $query = mysqli_query($conexion,$select);

    if(mysqli_num_rows($query)==0){
        echo"No hay asignaciones pendientes";
    }
    else{
        echo"<table border='2'>";
        echo"<tr>";
        echo"<th>Nombre</th>";
        echo"<th>Usuario</th>";
        echo"<th>Mail</th>";
        echo"<th>Tipo Usuario</th>";
        echo"<th>Asignar ROL</th>";
        echo" </tr>";
        while($fila = mysqli_fetch_assoc($query)){
            echo"<form action='' method='POST'>";
            echo"<tr>";
            echo"<td>".$fila['nombre']."</td>";
            echo"<td>".$fila['usuario']."</td>";
            echo"<td>".$fila['email']."</td>";
            echo"<td>
            
            <select name='tipoUsuario'>
                
                <option value='Administrador'>Administrador</option>
                <option value='Moderador'>Moderador</option>
                <option value='Consultor'>Consultor</option>
            </select></td>";
            echo"<td><input type='submit' value='Modificar'></td>";
            echo"<input type='hidden' name='usuarioMod' value='".$fila['usuario']."'";
            
            echo"</tr>";
            echo"</form>";
            
        }
        echo"</table>";
    }
?>  

    

    <br><br><br>
    <a href="../index.php">Volver al index</a>
</body>
</html>
