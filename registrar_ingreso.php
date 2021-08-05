<?php 

include_once 'conexión.php';

	if(isset($_POST['guardar'])){
		$doc_usuario = trim ($_POST['doc_usuario']);
		date_default_timezone_set('America/Bogota');
	    $fecha_hora_entrada = date("y/m/d H:i:s");
	    $observaciones = ($_POST['observaciones']);
	    $espacio = trim ($_POST['espacio']);

		if(!empty($doc_usuario) && !empty($fecha_hora_entrada) && !empty($observaciones) && !empty($espacio)){
			$consulta_insert=$cone->prepare('INSERT INTO registro(doc_usuario, fecha_hora_entrada, fecha_hora_salida, observaciones, espacio)
			VALUES(:doc_usuario,:fecha_hora_entrada, "2000-01-01 01:00:00",:observaciones,:espacio)');
				$consulta_insert->execute(array(
					':doc_usuario' =>$doc_usuario,
					':fecha_hora_entrada' =>$fecha_hora_entrada,
					':observaciones' =>$observaciones,
					':espacio' =>$espacio
				));
				if($consulta_insert){
				echo  '<script>
						alert("Registro exitoso!");
						window.location.href = "Form_registrar_ingreso.php"
					</script>';
				}
		
	}
}
?>