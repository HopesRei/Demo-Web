<?php  
$descripcion = "";

if (isset($_GET['error'])) {
	$descripcion = "ERROR 500:El usuario o la contraseña son incorrectos. Inténtalo de nuevo.";
} 
else {
	$descripcion = "ERROR 404:No se recibió ninguna descripción de error.";
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
            background-image: url('piolin_enojado.jpeg');
            background-size: cover;            
            background-position: center;       
            background-repeat: no-repeat;
		}
		.cajita {
			width: 700px;
			height: 450px;
			position: relative;
			box-sizing: border-box;
		}
		h1 {
			position: absolute;
			top: 10%;
			left: 50%;
			transform: translate(-50%, -50%);
			font-family: Arial, sans-serif;
			font-weight: bold;
			text-transform: uppercase;
			color: darkorange;
		}
		h2 {
			position: absolute;
			bottom: 1px;
			left: 20px;
			padding: 10px 20px;
			font-size: 25px;
			text-align: center;
			text-transform: none;
			color: darkgoldenrod;
		}
		.boton-regresar {
			position: absolute;
			bottom: 1px;
			right: 20px;
			padding: 10px 20px;
			font-size: 45px;
			text-decoration: none;
			color: darkgoldenrod;
			font-family: Arial, sans-serif;
		}
	</style>
</head>
<body>
		<h1>Error</h1>
		<h2><?php echo $descripcion; ?></h2>
		<a href="login_tiendita.php" class="boton-regresar">regresar</a>
	</div>
</body>
</html>
