<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login usuario</title>
    <style>
        body{
            text-align: center;
            
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <hr>
    <form action="../modelo/compruebaLogin.php" method="POST">
        <label for="usuario">Usuario: </label>
        <input type="usuario" name="usuario"><br><br>
        <label for="password">Contraseña: </label>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Logear">
    </form>
    <br><br>
    <h3>¿Aún no estás registrado?</h3>
    <a href='../vista/registro.php'>Entra aquí</a><br>
</body>
</html>