<?php 

	include_once 'conexión.php';
	if(isset($_GET['cod_formacion'])){
		$cod_formacion=(int) $_GET['cod_formacion'];
		$delete=$cone->prepare('DELETE FROM formacion WHERE cod_formacion=:cod_formacion');
		$delete->execute(array(
			':cod_formacion'=>$cod_formacion
		));
		header('Location: delete_formacion.php');
	}else{
		header('Location: tabla_formacion.php');
	}
 ?>