<?php
	include_once 'conexión.php';

	if(isset($_GET['cod_registro'])){
		$cod_registro=(int) $_GET['cod_registro'];

		$buscar_cod_registro=$cone->prepare('SELECT * FROM registro WHERE cod_registro=:cod_registro LIMIT 1');
		$buscar_cod_registro->execute(array(
			':cod_registro'=>$cod_registro
		));
		$resultado=$buscar_cod_registro->fetch();
	}else{
		header('Location: tabla_ingreso.php');
	}


	if(isset($_POST['guardar'])){
		$doc_usuario=$_POST['doc_usuario'];
		$fecha_hora_entrada=$_POST['fecha_hora_entrada'];
		$fecha_hora_salida=$_POST['fecha_hora_salida'];
		$observaciones=$_POST['observaciones'];
		$espacio=$_POST['espacio'];
        $cod_registro=(int) $_GET['cod_registro'];

		if(!empty($doc_usuario) && !empty($fecha_hora_entrada)){
				$consulta_update=$cone->prepare(' UPDATE registro SET  
					doc_usuario=:doc_usuario,
					fecha_hora_entrada=:fecha_hora_entrada,
					fecha_hora_salida=:fecha_hora_salida,
					observaciones=:observaciones,
                    espacio=:espacio
					WHERE cod_registro=:cod_registro;'
				);
				$consulta_update->execute(array(
					':doc_usuario' =>$doc_usuario,
					':fecha_hora_entrada' =>$fecha_hora_entrada,
					':fecha_hora_salida' =>$fecha_hora_salida,
					':observaciones' =>$observaciones,
                    ':espacio' =>$espacio, 
                    ':cod_registro' =>$cod_registro
				));
				header('Location: tabla_ingreso.php');
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
                    <h1>Actualizar Ingreso<br><br>
                    
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

                    <input type="text" name="doc_usuario" value="<?php if($resultado) echo $resultado['doc_usuario']; ?>" class="form-control">
                    <br>
                    <input type="text" name="fecha_hora_entrada" value="<?php if($resultado) echo $resultado['fecha_hora_entrada']; ?>" class="form-control">
                    <br>
                    <input type="datetime" name="fecha_hora_salida" value="<?php if($resultado) echo $resultado['fecha_hora_salida']; ?>" class="form-control">
                    <br>
                    <textarea name="observaciones" value="<?php if($resultado) echo $resultado['observaciones']; ?>" class="form-control"></textarea>
                    <br>
                    <input type="hidden" name="cod_registro" value="<?php if($resultado) echo $resultado['cod_registro']; ?>" class="form-control">
                    <br>
                    <input type="text" name="espacio" value="<?php if($resultado) echo $resultado['espacio']; ?>" class="form-control">
                    <br>
                
                    <input type="submit" name="guardar" value="Guardar" class="btn btn-black">

                    <input type="reset" name="" class="btn btn-secondary-reset" value="Restablecer">
                    <input type="submit" class="btn btn-secondary-usuarios" onclick="javascript:window.location='tabla_ingreso.php';"  value="Ingresos">     
                </form>
                </div>
            </div>
         </div>
    </div>

</body>
</html>