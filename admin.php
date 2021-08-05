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
    <title>Inicio Sesión</title>
</head>
<body>

<div class="sidenav">
         <div class="login-main-text">
                <div class="animate__animated animate__fadeInLeft animate__delay-1s">
                    <a href=""><img src="img/AdminWhite.png" alt="" class="fas fa-user-circle projects__icon1"></a>
                </div>
                <div class="animate__animated animate__fadeInRight animate__delay-1.5s"><h1>Inicia sesión
                   <br>
                   <br>
                <input type="submit" class="btn btn-secondary-inicio" 
                    onclick="javascript:window.location='principal.php';" name="ingresar" value="Inicio">
                </h1>
                </div>
         </div>
</div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <div class="animate__animated animate__fadeInRight animate__delay-1.5s">
               <form action = "inicio.php" method = "POST">
                  <div class="form-group">
                     <input type="text" name="usuario" class="form-control" placeholder="Usuario" autocomplete="off"  maxlength="30" required>
                  </div>
                  <div class="form-group">
                     <input type="password" name="contraseña" class="form-control" placeholder="Contraseña" autocomplete="off" maxlength="30" required>
                  </div>
                  <br>
                  <button type="submit" class="btn btn-black">Entrar</button>
                  <button type="submit" class="btn btn-secondary-cancelar" onclick="javascript:window.location='http://localhost/Proyecto%20Formativo/registro.php';">Registrarse</button>
               </form>
            </div>
            </div>
         </div>
      </div>

         <?php
         include("conexion.php");
         ?>
         
    </body>
</html>