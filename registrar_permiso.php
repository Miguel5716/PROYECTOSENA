<?php 
	include_once 'conexión.php';
	
	if(isset($_POST['guardar'])){
		$doc_usuario =trim($_POST['doc_usuario']);
	    $fech_per =date("Y-m-d");
	    $hora_per =($_POST['hora_per']);
	    $cargo =trim($_POST['cargo']);
	    $observaciones =trim($_POST['observaciones']);

		if(!empty($doc_usuario) && !empty($hora_per) && !empty($cargo) ){
				$consulta_insert=$cone->prepare('INSERT INTO permisos(doc_usuario,fech_per,hora_per,cargo,observaciones) VALUES(:doc_usuario,:fech_per,:hora_per,:cargo,:observaciones)');

				$consulta_insert->execute(array(
					':doc_usuario' =>$doc_usuario,
					':fech_per' =>$fech_per,
					':hora_per' =>$hora_per,
					':cargo' =>$cargo,
					':observaciones' =>$observaciones
				));
				if($consulta_insert){
				echo  '<script>
						alert("Registro exitoso!");
						window.location.href = "Form_registrar_permisos.php"
					</script>';
				}
		
	}
}
?>