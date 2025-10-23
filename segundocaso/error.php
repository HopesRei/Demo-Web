<?php  
$descripcion = "";

if (isset($_GET['error'])) {
	$error = $_GET['error'];

	if ($error == "usuario") {
		$descripcion = "El usuario que ingresaste no existe. Verifica tu nombre de usuario.";
	} 
	else if ($error == "contrasena") {
		$descripcion = "La contraseña que ingresaste es incorrecta. Inténtalo de nuevo.";
	} 
	else if ($error == "vacio") {
		$descripcion = "Debes ingresar tu usuario y contraseña.";
	} 
	else {
		$descripcion = "Ha ocurrido un error desconocido. Por favor, intenta nuevamente.";
	}
} 
else {
	$descripcion = "No se recibió ninguna descripción de error.";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pantalla de Bienvenida</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			margin: 0;
			background-color: white;
		}
		.cajita {
			border: 2px solid black;
			width: 700px;
			height: 450px;
			position: relative;
			box-sizing: border-box;
		}
		h1 {
			position: absolute;
			top: 30%;
			left: 50%;
			transform: translate(-50%, -50%);
			font-family: Arial, sans-serif;
			font-weight: bold;
			text-transform: uppercase;
		}
		h2 {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			font-family: Arial, sans-serif;
			font-size: 18px;
			font-weight: normal;
			width: 80%;
			text-align: center;
			text-transform: none;
		}
		.boton-regresar {
			position: absolute;
			bottom: 20px;
			right: 20px;
			padding: 10px 20px;
			font-size: 25px;
			text-decoration: none;
			color: black;
			font-family: Arial, sans-serif;
		}
	</style>
</head>
<body>
	<div class="cajita">
		<h1>Error</h1>
		<h2><?php echo $descripcion; ?></h2>
		<a href="loging.php" class="boton-regresar">regresar</a>
	</div>
</body>
</html>
