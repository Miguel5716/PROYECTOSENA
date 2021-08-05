<?php 

	include_once 'conexión.php';
	if(isset($_GET['cod_registro'])){
		$cod_registro=(int) $_GET['cod_registro'];
		$delete=$cone->prepare('DELETE FROM registro WHERE cod_registro=:cod_registro');
		$delete->execute(array(
			':cod_registro'=>$cod_registro
		));
		header('Location: delete_registro.php');
	}else{
		header('Location: tabla_ingreso.php');
	}
 ?>