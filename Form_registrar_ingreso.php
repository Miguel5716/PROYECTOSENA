<?php
    include("conexion.php");
    $query = mysqli_query($conexion,"SELECT * FROM espacio");
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
                        $usuarios = "SELECT * FROM registro";
                        $resultado = mysqli_query($conexion, $usuarios);
                        $total = mysqli_num_rows($resultado);
                        echo 'Numero de registros '.$total.'';
                    ?></title>
</head>
<body>

<div class="sidenav">
         <div class="login-main-text">
                <div class="animate__animated animate__fadeInLeft animate__delay-1s">
                    <a href=""><img src="img/AdminWhite.png" alt="" class="fas fa-user-circle projects__icon1"></a>
                </div>
                <div class="animate__animated animate__fadeInRight animate__delay-1.5s">
                    <h1>Registra un ingreso <br><br>
                    
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

                <form action="registrar_ingreso.php" method="POST">
                    
                        <input type="text" name="doc_usuario" placeholder="Documento" class="form-control" autocomplete="off" required>
                        <br>
                        <textarea name="observaciones" class="form-control" placeholder="Observación" autocomplete="off" required></textarea>
                        <br>
                        <select class="select-css" name="espacio" class="form-control" autocomplete="off" required>
                        
                        <option>seleccione: </option>
                            <?php
                                while($datos = mysqli_fetch_array($query)){
                            ?>
                                <option value="<?php echo $datos['cod_espacio']?>"><?php echo $datos['nombre']?></option>
                            <?php
                                }
                            ?>
                            </select>
                                <br>
                                <br>

                                <input type="submit" class="btn btn-black" name="guardar" value="Guardar">
                                <input type="reset" name="" class="btn btn-secondary-reset" value="Restablecer">
                                <input type="submit" class="btn btn-secondary-usuarios"
                                onclick="javascript:window.location='tabla_ingreso.php';" name="ingresar" value="Ver">
                    </form>
                    
            
                </div>
            </div>
         </div>
    </div>

</body>
</html>