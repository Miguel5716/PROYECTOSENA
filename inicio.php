<?php
    require 'conexion.php';
    session_start();

        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];

$insertar = "SELECT COUNT(*) as contar FROM inicio_admin WHERE usuario = '$usuario' AND contraseña = '$contraseña'";

$consulta = mysqli_query($conexion,$insertar);
$array = mysqli_fetch_array($consulta);

    if($array['contar'] > 0){
        $_SESSION['usuario'] = $usuario;
        header("location:http://localhost/Proyecto%20Formativo/principalAdmin.php");
    }
    
    else{
        echo    '<script>
                    alert("!Datos incorrectos!");
                    window.location.href = "admin.php"
                </script>';
    }

    if(!preg_match("/^[a-zA-Z0-9\-_]+$/", $usuario)){
        $errores[]=true;
        $_SESSION['error1']="El nombre de usuario solo puede contener letras";
    }