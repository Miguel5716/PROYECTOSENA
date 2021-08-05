<?php 
	include_once 'conexión.php';
	
	if(isset($_POST['guardar'])){
		$cod_espacio=trim($_POST['cod_espacio']);
	    $nombre=($_POST['nombre']);
	    

		if(!empty($cod_espacio) && !empty($nombre) ){
				$consulta_insert=$cone->prepare('INSERT INTO espacio(cod_espacio,nombre) VALUES(:cod_espacio,:nombre)');

				$consulta_insert->execute(array(
					':cod_espacio' =>$cod_espacio,
					':nombre' =>$nombre,
					));
				if($consulta_insert){
				echo  '<script>
						alert("Registro exitoso!");
						window.location.href = "Form_espacios.php"
					</script>';
				}
		
	}
}
?>