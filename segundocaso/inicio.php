<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    if (session_status() === PHP_SESSION_NONE) session_start();
    session_unset();
    session_destroy();
    setcookie('remember_user', '', time() - 1);
    header('Location: login.php');
    
}

if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
   
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
			top: 45%;
			left: 50%;
			transform: translate(-50%, -50%);
			font-family: Arial, sans-serif;
			font-weight: 10%;
			text-transform: uppercase;
		}
		.boton-cerrar {
			position: absolute;
			bottom: 20px;
			left: 50%;
			transform: translateX(-50%);
			border: 3px solid black;
			padding: 15px 30px;
			text-decoration: none;
			font-size: 25px;
			color: black;
			font-family: Arial, sans-serif;
		}
		.boton-regresar {
			position: absolute;
			bottom: 20px;
			right: 20px;
			padding: 10px 20px;
			text-decoration: none;
			font-size: 25px;
			color: black;
			font-family: Arial, sans-serif;
		}
	</style>
</head>
<body>

	<div class="cajita">
		<h1>bienvenido</h1>

		<form method="POST" action="">
			<input type="submit"   name="logout"  value="Cerrar sesión"
			style="padding: 10px 5px; margin-top: 380px; margin-left: 270px; border: 3px solid black; background-color: white; cursor: pointer; font-size: 25px;">
		</form>

		<a href="login.php" class="boton-regresar">regresar</a>
		
	</div>



</body>
</html>
