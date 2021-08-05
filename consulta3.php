<?php
include ("conexion.php");
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
	<link rel="stylesheet" href="css/tabla_consulta_estilo.css">
    <title><?php
                        $usuarios = "SELECT * FROM usuario";
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
                    <h1>Ingreso de menores<br><br>
                    
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

		<form action="Consulta3PDF.php" method="POST">
	<br>
	<br>
    <input type="text" class="form-control" placeholder="Fecha hora entrada" name="fecha_hora_entrada" onfocus="this.type='datetime-local'" required>
	<br>
    <input type="text" name="fecha_hora_salida" class="form-control" placeholder="Fecha hora salida" onfocus="this.type='datetime-local'" required>
	<br>
	<br>
	<input type="submit" name="enviar" class="btn btn-black" value="Enviar">
    <input type="reset" name="" class="btn btn-secondary-reset" value="Borrar">
	</form>

    </div>
    </div>
    </div>
	
   	<br>
    <br>
	<br>
    <div class="datatable-container">
                        <div class="header-tools">
		<table class="datatable">
                                    <thead>
                                        <tr>
											<td>Documento</td>
											<td>Tipo</td>
                                            <td>Cargo</td>
											<td>Nombre</td>
											<td>Apellido</td>
											<td>Genero</td>
                                            <td>Fecha</td>
                                        </tr>
                                    </thead>
                                    <?php
		if (isset($_POST['enviar'])) {
			$fecha_hora_entrada =($_POST['fecha_hora_entrada']);
			$fecha_hora_salida =($_POST['fecha_hora_salida']);

		$consulta4="SELECT usuario.doc_usuario, usuario.tipo_doc, usuario.cargo, usuario.nombre, usuario.apellido, usuario.sexo, 
        registro.fecha_hora_entrada from usuario,registro
        where usuario.doc_usuario=registro.doc_usuario and usuario.tipo_doc='RC' or usuario.tipo_doc='TI' and  usuario.doc_usuario=registro.doc_usuario 
        and registro.fecha_hora_entrada BETWEEN '$fecha_hora_entrada' AND '$fecha_hora_salida'" ;
		$resul=mysqli_query($conexion,$consulta4);
		while ($mostrar=mysqli_fetch_array($resul)) {
			?>

		<tr>
		<tbody>
            <td><?php echo $mostrar['doc_usuario']; ?></td>
            <td><?php echo $mostrar['tipo_doc']; ?></td>
			<td><?php echo $mostrar['cargo']; ?></td>
			<td><?php echo $mostrar['nombre']; ?></td>
			<td><?php echo $mostrar['apellido']; ?></td>
			<td><?php echo $mostrar['sexo']; ?></td>
			<td><?php echo $mostrar['fecha_hora_entrada']; ?></td>
		</tr>
        </tbody>
			<?php
			}} ?>

	</table>

    </div>
    </div>

                </div>
            </div>
         </div>
    </div>
</body>
</html>