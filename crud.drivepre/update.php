<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM presupuestos WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: ../starter-crud-pre.php');
	}


	if(isset($_POST['guardar'])){

		$fecha=$_POST['fecha'];
		$des=$_POST['descripcion'];
		$monto=$_POST['monto'];

		//$nombre=$_POST['nombre'];
		//$apellidos=$_POST['direccion'];
		//$apellidos=$_POST['apellidos'];
		//$telefono=$_POST['telefono'];
		//$ciudad=$_POST['ciudad'];
		//$correo=$_POST['correo'];
		$id=(int) $_GET['id'];
		//$id_c = (int) $_GET['id_cliente'];


		if(!empty($fecha) && !empty($des) && !empty($monto)) {
			
			
				$consulta_update=$con->prepare(' UPDATE presupuestos SET  
					fecha=:fecha,
					descripcion=:descripcion,
					monto=:monto,
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':fecha' =>$fecha,
					':descripcion' =>$des,
					':monto' =>$monto,
					':id' =>$id
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
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Actualizar Datos del Presupuesto</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="fecha" value="<?php if($resultado) echo $resultado['fecha']; ?>" class="input__text">
				<input type="text" name="descripcion" value="<?php if($resultado) echo $resultado['descripcion']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="monto" value="<?php if($resultado) echo $resultado['monto']; ?>" class="input__text">
			<!--	<input type="text" name="ciudad" value="<?php if($resultado) //echo $resultado['ciudad']; ?>" class="input__text">-->
			</div>
			<div class="form-group">
				<!--<input type="text" name="correo" value="<?php //if($resultado) echo $resultado['email']; ?>" class="input__text">-->
			</div>
			<div class="btn__group">
				<a href="../starter-crud-pre.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
