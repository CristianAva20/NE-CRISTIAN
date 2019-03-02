<?php 
	
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$fecha=$_POST['fecha'];
		$des=$_POST['descripcion'];
		$monto=$_POST['monto'];
		//$ciudad=$_POST['ciudad'];
		//$correo=$_POST['correo'];
		
		//&& !empty($ciudad)
		if(!empty($fecha) && !empty($des) && !empty($monto)){
			

				$consulta_insert=$con->prepare('INSERT INTO presupuestos (fecha,descripcion,monto) VALUES(:fecha,:des,:monto)');
				$consulta_insert->execute(array(
					':fecha' =>$fecha,
					':des' =>$des,
					':monto' =>$monto
				));
				header('Location: ../starter-crud-pre.php');
			
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
				<input type="text" name="fecha" placeholder="Nombre" class="input__text">
				<input type="text" name="descripcion" placeholder="Dirección" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="monto" placeholder="Teléfono" class="input__text">
				<!--<input type="text" name="ciudad" placeholder="Ciudad" class="input__text">-->
			</div>
			<div class="form-group">
				<!--<input type="text" name="correo" placeholder="Correo electrónico" class="input__text">-->
			</div>
			<div class="btn__group">
				<a href="../starter-crud-pre.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
