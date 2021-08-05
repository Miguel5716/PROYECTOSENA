<?php
	include_once 'conexión.php';

	if(isset($_GET['doc_usuario'])){
		$doc_usuario=(int) $_GET['doc_usuario'];

		$buscar_doc_usuario=$cone->prepare('SELECT * FROM usuario WHERE doc_usuario=:doc_usuario LIMIT 1');
		$buscar_doc_usuario->execute(array(
			':doc_usuario'=>$doc_usuario
		));
		$resultado=$buscar_doc_usuario->fetch();
	}else{
		header('Location: tabla_usuarios.php');
	}


	if(isset($_POST['guardar'])){
        $cargo=$_POST['cargo'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $tipo_doc=$_POST['tipo_doc'];
		$sexo=$_POST['sexo'];
		$correo=$_POST['correo'];
        $celular=$_POST['celular'];
        $cod_formacion=$_POST['cod_formacion'];

		if(!empty($nombre) && !empty($apellido) && !empty($tipo_doc)
        && !empty($doc_usuario) && !empty($cargo) && !empty($sexo)
        && !empty($correo) && !empty($celular) && !empty($cod_formacion)){

				$consulta_update=$cone->prepare(' UPDATE usuario SET  
					cargo=:cargo,
                    nombre=:nombre,
                    apellido=:apellido,
                    tipo_doc=:tipo_doc,
					sexo=:sexo,
					correo=:correo,
					celular=:celular,
                    cod_formacion=:cod_formacion
					WHERE doc_usuario=:doc_usuario;'
				);
				$consulta_update->execute(array(
                    ':cargo'=>$cargo,
                    ':nombre'=>$nombre,
                    ':apellido'=>$apellido,
                    ':tipo_doc'=>$tipo_doc,
                    ':doc_usuario'=>$doc_usuario,
                    ':sexo'=>$sexo,
                    ':correo'=>$correo,
                    ':celular'=>$celular,
                    ':cod_formacion'=>$cod_formacion
				));
				header('Location: tabla_usuarios.php');
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
                    <input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" placeholder="Nombre" class="form-control" autocomplete="off" required>
                        <br>
                        <input type="text" name="apellido" value="<?php if($resultado) echo $resultado['apellido']; ?>" placeholder="Apellidos" class="form-control" autocomplete="off" required>
                        <br>
                            <select class="select-css"  name="tipo_doc" value="<?php if($resultado) echo $resultado['tipo_doc']; ?>" class="form-control" autocomplete="off" required>
                                <option >Tipo de documento </option>
                                <option value="Cedula">Cedula</option>
                                <option value="Tarjeta de Identidad">Tarjeta de identidad</option>
                                <option value="Registro Civil">Registro civil</option>
                            </select>
                            <br>

                        <input type="text" name="doc_usuario" value="<?php if($resultado) echo $resultado['doc_usuario']; ?>" placeholder="Documento" class="form-control" autocomplete="off" required>
                        <br>
                            <select class="select-css"name="cargo" value="<?php if($resultado) echo $resultado['cargo']; ?>" class="form-control" autocomplete="off" required>
                                <option>Cargo </option>
                                <option value="Aprendiz">Aprendiz</option>
                                <option value="Instructor">Instructor</option>
                                <option value="Administrativo">Administrativo</option>
                                <option value="Visitante">Visitante</option>
                            </select>

                            <br>

                            <select class="select-css" name="sexo" value="<?php if($resultado) echo $resultado['sexo']; ?>" class="form-control" autocomplete="off" required>
                                <option>Genero </option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otros">Otros</option>
                            </select>
                            <br>

                                <input type="email" name="correo" value="<?php if($resultado) echo $resultado['correo']; ?>" placeholder="E-mail" class="form-control" autocomplete="off" autofocus="off"  required>
                                <br>
                                <input type="text" name="celular" value="<?php if($resultado) echo $resultado['celular']; ?>" placeholder="Celular-Telefono" class="form-control" autocomplete="off"  autofocus="off"required>
                                <br>
                                <input type="text" name="cod_formacion" value="<?php if($resultado) echo $resultado['cod_formacion']; ?>" placeholder="Codigo Formacion" class="form-control" autocomplete="off">
                                <br>
                    <input type="submit" name="guardar" value="Guardar" class="btn btn-black">

                    <input type="reset" name="" class="btn btn-secondary-reset" value="Restablecer">
                
                </form>
                </div>
            </div>
         </div>
    </div>

</body>
</html>