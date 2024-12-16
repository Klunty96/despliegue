<?php
    include "conexion.php";

    $nombre=$usuario=$password=$email="";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['nombre'])&& isset($_POST['usuario'])&&isset($_POST['pass'])&&isset($_POST['email'])){
            $nombre = $_POST['nombre'];
            $usuario = $_POST['usuario'];
            $password = $_POST['pass'];
            $email = $_POST['email'];
            // $tipoUsuario = $_POST['tipoUsuario'];
        }
    }
    
    if($nombre ==""){
        header("Location: ../vista/registro.php?error=1");
    }
    if(comprobarEspacios($nombre)&&comprobarEspacios($usuario)&&comprobarEspacios($password)&&comprobarEspacios($email)){
        $pass = password_hash($password,PASSWORD_DEFAULT);

        $existencia  = "SELECT  u.nombre ,u.usuario, u.email FROM usuario u WHERE u.usuario = '$usuario'";

        $busqueda = mysqli_query($conexion,$existencia);
        
        if(mysqli_num_rows($busqueda)==0){
            $insert = "INSERT INTO usuario (nombre,usuario,password,email,tipo_usuario) VALUES('$nombre','$usuario','$pass','$email','sinRol')";
            $resultado = mysqli_query($conexion,$insert);
           
                if($resultado){
                    echo"<h1 style='color:green;'>Usuario $usuario ha sido Creado Satisfactoriamente con la contraseña $pass</h1>";
                    echo"<a href='../vista/registro.php'>[Volver a la pagina de registro]</a>";
                }
        }
        else{
            echo"<h1 style='color:red;'>Fallo al crear usuario, El usuario ya existe</h1>";
            echo"<a href='../vista/registro.php'>[Volver a la pagina de registro]</a>";
    }

}else{
        echo"<h1 style='color:red;'>Fallo al crear usuario</h1>";
        echo"<a href='../vista/registro.php'>[Volver a la pagina de registro]</a>";
   }


    function comprobarEspacios($palabra){
    if(strlen(trim($palabra))>0){
        return true;
    }
    else{
        return false;
    }
}
?>