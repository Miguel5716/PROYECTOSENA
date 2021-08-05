<?php 

	include_once 'conexión.php';
	if(isset($_GET['doc_usuario'])){
		$doc_usuario=(int) $_GET['doc_usuario'];
		$delete=$cone->prepare('DELETE FROM usuario WHERE doc_usuario=:doc_usuario');
		$delete->execute(array(
			':doc_usuario'=>$doc_usuario
		));
		header('Location: delete_usuario.php');
	}else{
		header('Location: tabla_usuarios.php');
	}
 ?>