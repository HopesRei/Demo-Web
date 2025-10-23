<?php
$user = ['admin' => 'password123', 'user' => 'userpass'];


if (isset($_COOKIE['remember_user'])) {
    $cookieUser = $_COOKIE['remember_user'];
    if (array_key_exists($cookieUser, $user)) {
        session_start();
        $_SESSION['usuario'] = $cookieUser;
        header('Location: inicio.php');
       
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
    $contrasena = isset($_POST['contraseña']) ? trim($_POST['contraseña']) : '';

    if ($usuario === '' || $contrasena === '') {
        
    }

    if (array_key_exists($usuario, $user) && $user[$usuario] === $contrasena) {
        
        if (isset($_POST['remember']) && $_POST['remember'] == '1') {
            setcookie('remember_user', $usuario, time() + 15);
        }

        session_start();
        $_SESSION['usuario'] = $usuario;
        header('Location: inicio.php');
        
    } else {
        header('Location: error.php');
        
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Sesion</title>
    <meta charset="UTF-8">


<style>

    body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }

    body {
            font-family: Arial, Helvetica, sans-serif;
        }

    body {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			margin: 0;
			background-color: white;
		}

    #tabla {
        border-collapse: collapse;
        margin-top: 100px;
        margin-left: 10px;
        font-size: 40px;
        width: 100%;
    }

    #inputstyle{
        width: 300px;
        height: 30px;
        font-size: 35px;
        border : 3px solid black;

    }

    .cajita {
			border: 2px solid black;
			width: 700px;
			height: 450px;
			position: relative;
			box-sizing: border-box;
		}

        #remember {
            margin-top: 20px;
            margin-left: 100px;
            font-size: 25px;
        }
        </style>



</head>
    <body>
        <div class="cajita">
            <form method="POST" action="">
        <table id="tabla">
            <tr>
                <td>Usuario: </td>
                <td><input type="text" id="inputstyle" name="usuario" required></td>
            </tr>
            <tr>
                <td>Contraseña:</td>
                <td><input type="text" id="inputstyle" name="contraseña" required></td>
            </tr>
        </table>

        <table  id="remember">
            <tr>

                <td>
                    <input type="checkbox" name="remember" value="1" 
                    style="padding: 0px; border: 3px solid black; background-color: white; cursor: pointer; transform: scale(2.5);">
                </td>
                <td style="padding: 20px;">Recuerdame</td>   
                </tr>
        </table>

    
        <table>
            <tr>
                <td>
                    <input type="submit" value="Iniciar Sesion" 
                    style="padding: 10px 5px; margin-top: 50px; margin-left: 450px; border: 3px solid black; background-color: white; cursor: pointer; font-size: 25px;">
                </td>
            </tr>
        </table>
    </form>
        </div>
    </body>
</html>