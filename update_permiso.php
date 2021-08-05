<?php
	include_once 'conexión.php';

	if(isset($_GET['cod_permiso'])){
		$cod_permiso=(int) $_GET['cod_permiso'];

		$buscar_cod_permiso=$cone->prepare('SELECT * FROM permisos WHERE cod_permiso=:cod_permiso LIMIT 1');
		$buscar_cod_permiso->execute(array(
			':cod_permiso'=>$cod_permiso
		));
		$resultado=$buscar_cod_permiso->fetch();
	}else{
		header('Location: tabla_permisos.php');
	}


	if(isset($_POST['guardar'])){
		$doc_usuario=$_POST['doc_usuario'];
		$fech_per=$_POST['fech_per'];
		$hora_per=$_POST['hora_per'];
		$cargo=$_POST['cargo'];
		$observaciones=$_POST['observaciones'];
		$cod_permiso=(int) $_GET['cod_permiso'];

		if(!empty($doc_usuario) && !empty($hora_per) && !empty($cargo) ){
				$consulta_update=$cone->prepare(' UPDATE permisos SET  
					doc_usuario=:doc_usuario,
					fech_per=:fech_per,
					hora_per=:hora_per,
					cargo=:cargo,
					observaciones=:observaciones
					WHERE cod_permiso=:cod_permiso;'
				);
				$consulta_update->execute(array(
					':doc_usuario' =>$doc_usuario,
					':fech_per' =>$fech_per,
					':hora_per' =>$hora_per,
					':cargo' =>$cargo,
					':observaciones' =>$observaciones,
					':cod_permiso' =>$cod_permiso
				));
				header('Location: tabla_permisos.php');
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
    <title>Registra un Permiso</title>
</head>
<body>

<div class="sidenav">
         <div class="login-main-text">
                <div class="animate__animated animate__fadeInLeft animate__delay-1s">
                    <a href=""><img src="img/permisos.png" alt="" class="fas fa-user-circle projects__icon1"></a>
                </div>
                <div class="animate__animated animate__fadeInRight animate__delay-1.5s">
                    <h1>Actualizar Permiso <br><br>
                    
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

                <input type="hidden" name="cod_permiso" value="<?php if($resultado) echo $resultado['cod_permiso']; ?>" class="form-control">
                    <br>
                    <input type="text" name="doc_usuario" value="<?php if($resultado) echo $resultado['doc_usuario']; ?>" class="form-control">
                    <br>
                    <input type="text" name="fech_per" value="<?php if($resultado) echo $resultado['fech_per']; ?>" class="form-control">
                    <br>
                    <input type="text" name="hora_per" onfocus="this.type='time'" value="<?php if($resultado) echo $resultado['hora_per']; ?>" class="form-control">
                    <br>
                    <input type="text" name="cargo" value="<?php if($resultado) echo $resultado['cargo']; ?>" class="form-control">
                    <br>
                    <input type="text" name="observaciones" value="<?php if($resultado) echo $resultado['observaciones']; ?>" class="form-control">
                    <br>
                    <input type="submit" name="guardar" value="Guardar" class="btn btn-black">

                    <input type="reset" name="" class="btn btn-secondary-reset" value="Restablecer">
                    <input type="submit" class="btn btn-secondary-usuarios" onclick="javascript:window.location='tabla_permisos.php';"  value="Registro">
                
                </form>
                </div>
            </div>
         </div>
    </div>

</body>
</html>