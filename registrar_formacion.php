<?php 
	include_once 'conexión.php';
	
	if(isset($_POST['guardar'])){
		$cod_formacion=trim($_POST['cod_formacion']);
	    $nombre=($_POST['nombre']);
	    $ambientes=trim($_POST['ambientes']);

		if(!empty($cod_formacion) && !empty($nombre) && !empty($ambientes) ){
				$consulta_insert=$cone->prepare('INSERT INTO formacion(cod_formacion,nombre,ambientes) VALUES(:cod_formacion,:nombre,:ambientes)');

				$consulta_insert->execute(array(
					':cod_formacion' =>$cod_formacion,
					':nombre' =>$nombre,
					':ambientes' =>$ambientes,
					));
				if($consulta_insert){
				echo  '<script>
						alert("Registro exitoso!");
						window.location.href = "Form_formacion.php"
					</script>';
				}
		
	}
}
?>