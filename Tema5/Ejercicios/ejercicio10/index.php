<?php
        include "modelo/conexion.php";
        include "modelo/sesion.php";
        include "vista/saludo.php";
        
        $permisos = "SELECT tipo_usuario FROM usuario WHERE usuario = '$usuario'";
        $resultadoPermisos = mysqli_query($conexion,$permisos);
        
            if($fila = mysqli_fetch_assoc($resultadoPermisos)){
                $rolUsuarioActual=$fila['tipo_usuario'];
                
            
        }
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $opcion = $_POST['opcion'];

        switch($opcion){
            case "ver":
                header("Location: vista/mostrar_noticias.php");
                break;
            case "insertar":
                header("Location: vista/Insertar_noticias.php");
                break;
            case "eliminar":
                header("Location: vista/eliminar_noticias.php");
                break;
            case "registrar":
                header("Location: vista/registro.php");
                break;
        }
    }
?>
<h1>SISTEMA DE GESTIÓN DE NOTICIAS</h1>
<?php
            if($rolUsuarioActual=="sinRol"){
                echo"<h2>Opciones no disponibles, espere a que un Administrador le asigne un rol del sistema</h2>";
            }
            else{
                echo"<form action='' method='POST'>";
                echo"<label>Selecciona una opción:</label>";
                echo"<select name='opcion'>";

                if($rolUsuarioActual=="Consultor"){
               
                    echo"<option value='ver'>Ver noticias</option>";
                   
                }
                elseif($rolUsuarioActual=="Moderador"){
                    echo"<option value='ver'>Ver noticias</option>";
                    echo"<option value='insertar'>Insertar Noticias</option>";
                }
                else{
                    echo"<option value='ver'>Ver noticias</option>";
                    echo"<option value='insertar'>Insertar Noticias</option>";
                    echo"<option value='eliminar'>Eliminar Noticias</option>";
                    echo"<option value='registrar'>Registrar</option>";
                    
                }
                echo"</select>";
                echo"<input type='submit' value='Ir'>";
                echo"</form>";
                echo"<br><br>";

            }
            
           
           if($rolUsuarioActual=="Administrador"){
            include "modelo/compruebaRol.php";
           }
            
            
        ?>


    
        
        
        
        
        
    
    
