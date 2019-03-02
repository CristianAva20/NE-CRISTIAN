<?php

  session_start();
  $usuario = "root";
  $servidor = "localhost";
  $basedatos = "presupuestos";
  $conexion =mysqli_connect($servidor, $usuario, "") or die ("Error");
  $db = mysqli_select_db($conexion, $basedatos) or die("Error");

  $consulta = "SELECT * FROM usuarios";

  $resultado = mysqli_query($conexion, $consulta) or die("Conexión fallida (LOGIN)");

  $nom_usuario = '';
  $contrasena = '';
  $columna = '';
  $enviar = '';


  if(isset($_POST['enviar'])){ 

	    $nom_usuario=$_POST['usu'];
	    $contrasena=$_POST['contra'];  

	    while ($columna = mysqli_fetch_array($resultado)) {
	    	//echo '<h1>xxsxsx</h1>';
	     	if ( ($columna['contra_usuario'] == ($contrasena) && 
	     		($columna['nombre_usuario'] == ($nom_usuario)) ) ) {
	     		
		      	$enviar = 'starter.php';     
	    	}
		    else{

		      	$enviar = 'index.php'; 
		    }
	   }
  	}
?>

						<!-- CÓDIGO HTML -->
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login NE-Cristian</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

   <link rel="stylesheet" type="text/css" href="logincss.css">

</head>

<body>

<form method="POST">

  <div class="body"></div>

		<div class="grad"></div>
		<div class="header">
			<div>NE<span>|Cristian <br> <h2> Presupuestos al instante</h2></span> <br>
			</div>
		</div>
		<br>

		<div class="login">
				<input type="text" placeholder="Usuario" name="usu">
				<br>
				<input type="password" placeholder="Contraseña" name="contra">
				<br>
				
				 <?php
		          echo "<input type=\"submit\" value=\"Entrar\" name=\"enviar\">";
		          if ($enviar == 'starter.php') {
		          	echo 'entro';
		            header("location:starter.php");
		          }
		        ?>  
		</div>
</form>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

</body>

</html>
