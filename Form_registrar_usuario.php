<?php
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="shortcut icon" href="img/AdminWhite.png" type="image/x-icon">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/Form_estilos.css">
    <title><?php
                        $usuarios = "SELECT * FROM usuario";
                        $resultado = mysqli_query($conexion, $usuarios);
                        $total = mysqli_num_rows($resultado);
                        echo 'Usuarios '.$total.'';
                    ?></title>
</head>
<body>

<div class="sidenav">
         <div class="login-main-text">
                <div class="animate__animated animate__fadeInLeft animate__delay-1s">
                    <a href=""><img src="img/AdminWhite.png" alt="" class="fas fa-user-circle projects__icon1"></a>
                </div>
                <div class="animate__animated animate__fadeInRight animate__delay-1.5s">
                    <h1>Registra el usuario <br><br>
                    
                    <input type="submit" class="btn btn-secondary-inicio" 
                    onclick="javascript:window.location='principalAdmin.php';" name="ingresar" value="Inicio">
                    
                    </div>
                    
                </h1>
                </div>
         </div>
</div>


      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <div class="animate__animated animate__fadeInRight animate__delay-1.5s">

                <form action="registrar_usuario.php" method="POST">
                    
                    
                        <input type="text" name="nombre" placeholder="Nombre" class="form-control" autocomplete="off" required>
                        <br>
                        <input type="text" name="apellido" placeholder="Apellidos" class="form-control" autocomplete="off" required>
                        <br>
                            <select class="select-css" name="tipo_doc" class="form-control" autocomplete="off" required>
                                <option>Tipo de documento </option>
                                <option value="Cedula">CC</option>
                                <option value="Tarjeta de Identidad">TI</option>
                                <option value="Registro Civil">RC</option>
                            </select>
                            <br>

                        <input type="text" name="doc_usuario" placeholder="Documento" class="form-control" autocomplete="off" required>
                        <br>
                            <select class="select-css"name="cargo" class="form-control" autocomplete="off" required>
                                <option>Cargo </option>
                                <option value="Aprendiz">Aprendiz</option>
                                <option value="Instructor">Instructor</option>
                                <option value="Administrativo">Administrativo</option>
                                <option value="Visitante">Visitante</option>
                            </select>

                            <br>

                            <select class="select-css" name="sexo" class="form-control" autocomplete="off" required>
                                <option>Genero </option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="O">Otros</option>
                            </select>
                            <br>

                                <input type="email" name="correo" placeholder="E-mail" class="form-control" autocomplete="off" autofocus="off"  required>
                                <br>
                                <input type="text" name="celular" placeholder="Celular-Telefono" class="form-control" autocomplete="off"  autofocus="off"required>
                                <br>
                                <input type="text" name="cod_formacion" placeholder="Codigo Formacion" class="form-control" autocomplete="off">
                                <br>

                                <input type="submit" class="btn btn-black" name="guardar1" value="Guardar">
                                <input type="reset" class="btn btn-secondary-reset" value="Borrar">
                                <input type="submit" class="btn btn-secondary-usuarios" onclick="javascript:window.location='tabla_usuarios.php';"  value="Registros">
                                </form>
                </div>
            </div>
         </div>
    </div>

</body>
</html>