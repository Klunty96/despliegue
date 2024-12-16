<?php
include "conexion.php";


    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['usuario']) && isset($_POST['password'])){
            $usu = $_POST['usuario'];
            $password = $_POST['password'];
           
            $usu = mysqli_real_escape_string($conexion,$usu);
    
            $selectUsu = "SELECT u.password,u.tipo_usuario FROM usuario u WHERE u.usuario = '$usu'";
            $consulta = mysqli_query($conexion,$selectUsu);

            if($consulta ===false){
                echo"Error al hacer la consulta: ". mysqli_error($conexion);
            }
                if($fila = mysqli_fetch_assoc($consulta)){

                        $passHasheada = $fila['password'];

                            if(password_verify($password,$passHasheada)){
                                echo"<h1 style='color:green'>Acceso concedido👍🔓</h1><br>";
                                session_start();
                                $_SESSION['usuario']=$usu;
                                $_SESSION['tipoUsuario']=$fila['tipo_usuario'];
                                echo"<a href='../index.php' >[Volver al inicio]</a>";
                            }
                            else{
                                echo"<h2 style='color:red'>Contraseña no coincide</h2><br>";
                                echo"<a href='../index.php'>[Volver al inicio]</a><br>";
                                echo"<a href='../vista/registro.php'>¿Aún no estás registrado? entra aquí[Registrar Nuevo usuario]</a><br>";
                            }
                }
                else{
                        echo"<h2 style='color:red'>Usuario no encontrado</h2><br>";
                        echo"<a href='../index.php'>[Volver al inicio]</a>";
                        echo"<a href='../vista/registro.php'>¿Aún no estás registrado? entra aquí[Registrar Nuevo usuario]</a><br>";
                        
                }

        }
    }else{
        echo"<h1 style='color:red'>Acceso denegado</h1>";
        echo"<a href='../index.php'>[Volver al inicio]</a>";
    }
    
?>