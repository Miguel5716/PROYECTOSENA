<?php
	include_once 'conexión.php';

	if(isset($_GET['cod_formacion'])){
		$cod_formacion=(int) $_GET['cod_formacion'];

		$buscar_cod_formacion=$cone->prepare('SELECT * FROM formacion WHERE cod_formacion=:cod_formacion LIMIT 1');
		$buscar_cod_formacion->execute(array(
			':cod_formacion'=>$cod_formacion
		));
		$resultado=$buscar_cod_formacion->fetch();
	}else{
		header('Location: tabla_formacion.php');
	}


	if(isset($_POST['guardar'])){
		$cod_formacion=$_POST['cod_formacion'];
		$nombre=$_POST['nombre'];
		$ambientes=$_POST['ambientes'];

		if(!empty($cod_formacion) && !empty($nombre) && !empty($ambientes) ){
				$consulta_update=$cone->prepare(' UPDATE formacion SET  
					cod_formacion=:cod_formacion,
                    nombre=:nombre,
					ambientes=:ambientes
					WHERE cod_formacion=:cod_formacion;'
				);
				$consulta_update->execute(array(
					':cod_formacion' =>$cod_formacion,
					':nombre' =>$nombre,
					':ambientes' =>$ambientes,
				));
				header('Location: tabla_formacion.php');
			}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}
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
    <title>Actualizar formacion</title>
</head>
<body>

<div class="sidenav">
         <div class="login-main-text">
                <div class="animate__animated animate__fadeInLeft animate__delay-1s">
                    <a href=""><img src="img/permisos.png" alt="" class="fas fa-user-circle projects__icon1"></a>
                </div>
                <div class="animate__animated animate__fadeInRight animate__delay-1.5s">
                    <h1>Actualizar Formación<br><br>
                    
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
                  
                <form action="" method="POST">
                    <input type="number" name="cod_formacion" value="<?php if($resultado) echo $resultado['cod_formacion']; ?>" class="form-control">
                    <br>
                    <input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="form-control">
                    <br>
                    <input type="number" name="ambientes" value="<?php if($resultado) echo $resultado['ambientes']; ?>" class="form-control">
                    <br>
                   <input type="submit" name="guardar" value="Guardar" class="btn btn-black">

                    <input type="reset" name="" class="btn btn-secondary-reset" value="Restablecer">
                    <input type="submit" class="btn btn-secondary-usuarios" onclick="javascript:window.location='tabla_formacion.php';"  value="Registros">
                
                </form>
                </div>
            </div>
         </div>
    </div>

</body>
</html>