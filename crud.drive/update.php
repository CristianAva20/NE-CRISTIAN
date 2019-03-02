<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM clientes WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: ../starter-clientes.php');
	}


	if(isset($_POST['guardar'])){

		$nombre=$_POST['nombre'];
		$apellidos=$_POST['direccion'];
		//$apellidos=$_POST['apellidos'];
		$telefono=$_POST['telefono'];
		//$ciudad=$_POST['ciudad'];
		$correo=$_POST['correo'];
		$id=(int) $_GET['id'];
		

		if(!empty($nombre) && !empty($apellidos) && !empty($telefono) && !empty($correo) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$con->prepare(' UPDATE clientes SET  
					nombre=:nombre,
					direccion=:apellidos,
					telefono=:telefono,
				
					email=:correo
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
					':apellidos' =>$apellidos,
					':telefono' =>$telefono,
					
					':correo' =>$correo,
					':id' =>$id
				));
				header('Location: ../starter-clientes.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Actualizar Datos del Cliente</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="direccion" value="<?php if($resultado) echo $resultado['direccion']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input__text">
			<!--	<input type="text" name="ciudad" value="<?php if($resultado) //echo $resultado['ciudad']; ?>" class="input__text">-->
			</div>
			<div class="form-group">
				<input type="text" name="correo" value="<?php if($resultado) echo $resultado['email']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="../starter.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
