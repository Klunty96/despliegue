<?php
    session_start();
    session_destroy();
   
    
     //index es  C:\xampp\htdocs\Servidor\Tema5\Ejercicios\ejercicio9\modelo
                                                // otras paginas es vista\modelo\cerrarSession.php
     header("Location: ../vista/login.php");
?>