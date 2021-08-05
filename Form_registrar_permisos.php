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
    <link rel="shortcut icon" href="img/permisos.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilo_x.css">
    <link rel="stylesheet" href="css/Form_estilos.css">
    <title>Registra un Permiso</title>
</head>
<body>

<div class="sidenav">
         <div class="login-main-text">
                <div class="animate__animated animate__fadeInLeft animate__delay-1s">
                    <a href=""><img src="img/permisos.png" alt="" class="fas fa-user-circle projects__icon1"></a>
                </div>
                <div class="animate__animated animate__fadeInRight animate__delay-1.5s">
                    <h1>Registra un Permiso <br><br>
                    
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
                  
                <form action="registrar_permiso.php" method="POST">
                        <input type="number" class="form-control" name="doc_usuario" placeholder="Documento" required>
                        <br>
                        <input type="text" class="form-control" placeholder="Hora de salida" name="hora_per" onfocus="this.type='time'" required>
                        <br>
                        <select class="select-css"name="cargo" class="form-control" autocomplete="off" required>
                                <option>Cargo </option>
                                <option value="Instructor">Instructor</option>
                                <option value="Administrativo">Administrativo</option>
                            </select>
                        <br>
                        <textarea name="observaciones" class="form-control" placeholder="Observación"></textarea>
                        <br>
                        <input type="submit" name="guardar" class="btn btn-black" value="Guardar">
                        <input type="reset" name="" class="btn btn-secondary-reset" value="Borrar">
                        <input type="submit" class="btn btn-secondary-usuarios" onclick="javascript:window.location='tabla_permisos.php';"  value="Registros">
                
                </form>
                </div>
            </div>
         </div>
    </div>

</body>
</html>