<?php 

	include_once 'conexión.php';
	if(isset($_GET['cod_permiso'])){
		$cod_permiso=(int) $_GET['cod_permiso'];
		$delete=$cone->prepare('DELETE FROM permisos WHERE cod_permiso=:cod_permiso');
		$delete->execute(array(
			':cod_permiso'=>$cod_permiso
		));
		header('Location: delete_permiso.php');
	}else{
		header('Location: tabla_permisos.php');
	}
 ?>