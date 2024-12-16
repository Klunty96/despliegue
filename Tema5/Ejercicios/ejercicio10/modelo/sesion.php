<?php
    session_start();
    if(isset($_SESSION['usuario']) && isset($_SESSION['tipoUsuario'])){
        $usuario = $_SESSION['usuario'];
        $tipoUsuario = $_SESSION['tipoUsuario'];
    }
    else{
        header("Location:./vista/login.php");
    }
        
?>