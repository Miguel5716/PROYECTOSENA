<?php
	include_once 'conexión.php'; //devulve valor verdadero sin repetir sentencias

	$sentencia_select=$cone-> prepare('SELECT * FROM permisos ORDER BY cod_permiso DESC'); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
	$sentencia_select->execute();  //Ejecuta una sentencia preparada
	$resultado=$sentencia_select->fetchAll();//Devuelve un array que contiene todas las filas del conjunto de resultados

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$cone->prepare('
			SELECT *FROM permisos WHERE doc_usuario LIKE :campo ;'
		);

		$select_buscar->execute(array(':campo' =>"%".$buscar_text."%"));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet"href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<title>Permisos de salida</title>
	<link rel="stylesheet" href="css/tabla_permiso_estilo.css">
    <link rel="shortcut icon" href="img/permisos.png">
</head>
<body>

<div class="sidenav">
         <div class="login-main-text">
                <div class="animate__animated animate__fadeInLeft animate__delay-0,5s">
                    <a href=""><img src="img/permisos.png" alt="" class="fas fa-user-circle projects__icon1"></a>
                </div>
                <div class="animate__animated animate__fadeInRight animate__delay-1.5s">
                    <h1>Permisos de salida<br>
					<br>
                    <input type="submit" class="btn btn-secondary-inicio" 
                    onclick="javascript:window.location='principalAdmin.php';" value="Inicio">

                    </div>
                    
                </h1>
                </div>
         </div>
</div>


<div class="datatable-container">
                        <div class="header-tools">
							<div class="search">
								<form  method="post">
                                    <input type="text" name="buscar" placeholder="Documento"
                                    value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="search-input">
			                      
                                </div>

								<div class="container_buscar">
								<input type="submit" class="btn btn-secondary-inicio" name="btn_buscar" value="Buscar">
								</form>
								<input type="submit" class="btn btn-secondary-usuarios"
                                onclick="javascript:window.location='Form_registrar_permisos.php';" value="Volver">
							</div>            
                </div>

                                <table class="datatable">
                                    <thead>
                                        <tr>
											<td>ID</td>
											<td>Documento</td>
											<td>Fecha</td>
											<td>Hora</td>
											<td>Cargo</td>
											<td>Observaciones</td>
											<td colspan="1">Editar</td>
											<td colspan="1">Eliminar</td>
                                        </tr>
                                    </thead>

                                    <tbody>

									<?php foreach($resultado as $fila):?>
										<tr>
										<td><?php echo $fila['cod_permiso']; ?></td>
										<td><?php echo $fila['doc_usuario']; ?></td>
										<td><?php echo $fila['fech_per']; ?></td>
										<td><?php echo $fila['hora_per']; ?></td>
										<td><?php echo $fila['cargo']; ?></td>
										<td><?php echo $fila['observaciones']; ?></td>
										<td><a href="update_permiso.php?cod_permiso=<?php echo $fila['cod_permiso']; ?>"><center><i class="material-icons">edit</i></center></a></td>
										<td><a href="delete_permiso.php?cod_permiso=<?php echo $fila['cod_permiso']; ?>""><center><i class="material-icons">delete</i></center></a></td>
									</tr>
										<?php endforeach ?>

                                    </tbody>
                                </table>

                            <div class="footer-tools">
                                        
                                    </div>
                                </div>
</body>
</html>