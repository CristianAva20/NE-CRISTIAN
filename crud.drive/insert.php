<?php 
	
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellidos=$_POST['direccion'];
		$telefono=$_POST['telefono'];
		//$ciudad=$_POST['ciudad'];
		$correo=$_POST['correo'];
		
		//&& !empty($ciudad)
		if(!empty($nombre) && !empty($apellidos) && !empty($telefono)  && !empty($correo) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{

				$consulta_insert=$con->prepare('INSERT INTO clientes (nombre,telefono,email,direccion) VALUES(:nombre,:telefono,:correo,:direccion)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':telefono' =>$telefono,
					':correo' =>$correo,
					':direccion' =>$apellidos
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
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Agregar Cliente</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="direccion" placeholder="Dirección" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="telefono" placeholder="Teléfono" class="input__text">
				<!--<input type="text" name="ciudad" placeholder="Ciudad" class="input__text">-->
			</div>
			<div class="form-group">
				<input type="text" name="correo" placeholder="Correo electrónico" class="input__text">
			</div>
			<div class="btn__group">
				<a href="../starter.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
