<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <?php
        $error="";
        if($_SERVER['REQUEST_METHOD']=="GET"){
            if(isset($_GET['error']))
            $error = "Ninguno de los campos puede estar vacios";
        }
    ?>
    <h1>Registro de Usuario</h1>
    <h2 style="color:red;"><?=$error?></h2>
    <form action="../modelo/nuevoUsuario.php" method="POST">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre"><br><br>
        <label for="usuario">Usuario: </label>
        <input type="text" name="usuario"><br><br>
        <label for="pass">Contraseña: </label>
        <input type="text" name="pass"><br><br>
        <label for="correo">Email: </label>
        <input type="text" name="email"><br><br>
        <!-- <label for="tipoUsuario">Tipo de Usuario: </label>
        <select name="tipoUsuario">
            <option value="">Selecciona</option>
            <option value="Administrador">Administrador</option>
            <option value="Moderador">Moderador</option>
            <option value="Consultor">Consultor</option>
        </select> -->
        <br><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>