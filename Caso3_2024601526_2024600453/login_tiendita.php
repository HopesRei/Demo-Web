<?php 
$host = '127.0.0.1';
$db   = 'tiendarosa';
$user = 'root';
$pass = 'root';

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

if (isset($_COOKIE['remember_user'])) {
    session_start();
    $_SESSION['usuario'] = $_COOKIE['remember_user'];
    header('Location: principal.php');
    exit;
}

if (isset($_COOKIE['auto_user'])) {
    session_start();
    $_SESSION['usuario'] = $_COOKIE['auto_user'];
    header('Location: principal.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $contrasena = trim($_POST['contraseña'] ?? '');

    if ($usuario !== '' && $contrasena !== '') {
        $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?");
        $stmt->bind_param("ss", $usuario, $contrasena);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            if (isset($_POST['remember']) && $_POST['remember'] == '1') {
                setcookie('remember_user', $usuario, time() + 3600, "/");
                setcookie('auto_user', $usuario, time() + 300, "/");
            }

            session_start();
            $_SESSION['usuario'] = $usuario;
            header('Location: principal.php');
            exit;
        } else {
            header('Location: error.php?error=1');
            exit;
        }
    } else {
        header('Location: error.php?error=2');
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sesión</title>
    <meta charset="UTF-8">
<style>
    body {
        height: 100%;
        width: 100%;
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: lavenderblush;
        background-image: url('dulces.jpeg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }

    #tabla {
        border-collapse: collapse;
        margin-top: 100px;
        margin-left: 10px;
        font-size: 40px;
        width: 100%;
    }

    #inputstyle {
        width: 480px;
        height: 30px;
        font-size: 35px;
        margin-left: 50px;
        border-radius: 15px;
    }

    .cajita {
        border: 2px solid black;
        width: 600px;
        height: 650px;
        box-sizing: border-box;
        background-color: lightcyan;
        color: mediumpurple;
    }

    #remember {
        margin-top: 20px;
        margin-left: 200px;
        font-size: 25px;
    }
</style>
</head>
<body>
    <div class="cajita">
        <form method="POST" action="">
            <table id="tabla">
                <h1 style="margin-left: 240px; font-size: 45px; margin-top: 50px;">Log in</h1>
                <tr>
                    <td style="padding: 10px; margin-left: 37px;">Usuario</td>
                </tr>
                <tr>
                    <td><input type="text" placeholder="Id o User" id="inputstyle" name="usuario" required></td>
                </tr>
                <tr>
                    <td style="padding: 10px; margin-left: 37px;">Contraseña</td>
                </tr>
                <tr>
                    <td><input type="password" placeholder="Password" id="inputstyle" name="contraseña" required></td>
                </tr>
            </table>

            <table id="remember" style="padding: 10px;">
                <tr>
                    <td>
                        <input type="checkbox" name="remember" value="1"
                        style="transform: scale(2.5); cursor: pointer;">
                    </td>
                    <td style="padding: 20px;">Recuérdame</td>   
                </tr>
            </table>

            <table>
                <tr>
                    <td>
                        <input type="submit" value="Iniciar Sesión" 
                        style="padding: 10px 5px; margin-top: 20px; margin-left: 230px; 
                        border: 3px solid black; background-color: white; cursor: pointer; font-size: 25px;">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
