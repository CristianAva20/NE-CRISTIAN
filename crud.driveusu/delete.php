<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM presupuestos WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: ../starter-crud-pre.php');
	}else{
		header('Location: ../starter-crud-pre.php');
	}

	
 ?>