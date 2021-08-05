<?php
    include("conexion.php");
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        $encriptacion = hash('sha512', $contraseña);

$insertar = "INSERT INTO inicio_admin(usuario, contraseña) VALUES ('$usuario','$contraseña')";
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM inicio_admin WHERE usuario = '$usuario'");

if(mysqli_num_rows($verificar_usuario) > 0){
    echo '<script>
                    alert("Ya estas registrado!");
                    window.history.go(-1);
                    </script>';
            exit;
}

$resultado = mysqli_query($conexion, $insertar);

if($resultado){
    echo  '<script>
    alert("¡Te has registrado exitosamente!");
    window.location.href = "admin.php"
    </script>';
}