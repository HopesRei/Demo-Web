<?php


session_start(); 

if (!isset($_SESSION['usuario'])) {
    header('Location: login_tiendita.php');
    exit;
}



$page = 'home';
$host = '127.0.0.1';
$db   = 'tiendarosa';
$user = 'root';
$pass = 'root';

$mysqli = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($mysqli->connect_error) {
    die('Error de conexión: ' . htmlspecialchars($mysqli->connect_error));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case '📖 Productos':
                $page = 'productos';
                break;
            case '📦 Inventario':
                $page = 'inventario';
                break;
            case '👥 Proveedores':
                $page = 'proveedores';
                break;
            case '💸 Compras':
                $page = 'compras';
                break;
            case '📄 Facturas':
                $page = 'facturas';
                break;
            case '📶 Reportes':
                $page = 'reportes';
                break;
            case '📞 Contacto':
                $page = 'contacto';
                break;
            default:
                $page = 'home';
        }
    } 
    elseif (isset($_POST['ordenar'])) {
        $page = 'compras';
    } 
    elseif (isset($_POST['add_producto'])) {
        $page = 'productos';
    }

}


if (isset($_POST['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    if (isset($_COOKIE['remember_user'])) {
        setcookie('remember_user', '', time() - 3600, '/');
    }
    if (isset($_COOKIE['auto_user'])) {
        setcookie('auto_user', '', time() - 3600, '/');
    }

    
    header('Location: login_tiendita.php');
    exit;
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
			align-items: flex-start;
			height: 100vh;
			margin: 0;
			flex-direction: column;
            background-color: lavenderblush;
            background-image: url('dulces.jpeg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
		}
		.fakebox {
			border: 2px solid black;
			width: 1800px;
			height: 80px;
			box-sizing: border-box;
			top: 10px; 
			position: absolute;
			display: flex;
			align-items: center;
            margin-left: 40px;
		}
		.maintype {
			padding: 10px 5px; 
			margin-left: 80px;
			border: 3px solid black; 
			background-color: white; 
			cursor: pointer; 
			font-size: 25px;
		}
		.maintype:hover,
		.maintype:focus {
			background-color: #fffa8b;
			transform: scale(1.03);
		}
		form.top-center {
			position: absolute;
			top: 20px; 
			display: flex;
			flex-direction: row;
			gap: 5px;  
			align-items: center;
		}
		table {
			border-collapse: collapse;
			width: 100%;
		}
		table, th, td {
			border: 2x solid black;
			padding: 8px;
			text-align: center;
		}
		th {
			background-color: #f75b5bff;
		}

        td {
            background-color: #94dbf7ff;
            font-weight: bold;
        }

        .removeBg {
        filter: brightness(1.1);
         mix-blend-mode: normal;
        }
		
	</style>
</head>
<body>

<div class="fakebox"></div>

<form method="POST" action="" class="top-center">
    <input type="submit" name="action" value="📖 Productos" class="maintype">
    <input type="submit" name="action" value="📦 Inventario" class="maintype">
    <input type="submit" name="action" value="👥 Proveedores" class="maintype">
    <input type="submit" name="action" value="💸 Compras" class="maintype">
    <input type="submit" name="action" value="📄 Facturas" class="maintype">
    <input type="submit" name="action" value="📶 Reportes" class="maintype">
    <input type="submit" name="action" value="📞 Contacto" class="maintype">
</form>



<?php
switch ($page) {

    case 'productos':
        echo "<h2 style='margin-top:120px; text-align:center;'>Productos</h2>";

       
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_producto'])) {
            $nombre = trim($_POST['nombre'] ?? '');
            $precio = floatval($_POST['precio'] ?? 0);
            $estatus = 1; // por defecto activo

            if ($nombre !== '' && $precio > 0) {
                $stmt = $mysqli->prepare("INSERT INTO productos (nombre, precio, estatus) VALUES (?, ?, ?)");
                $stmt->bind_param("sdi", $nombre, $precio, $estatus);
                if ($stmt->execute()) {
                    echo "<p style='color:green; text-align:center;'>✅ Producto agregado correctamente.</p>";
                } else {
                    echo "<p style='color:red; text-align:center;'>❌ Error al agregar producto: {$stmt->error}</p>";
                }
                $stmt->close();
            } else {
                echo "<p style='color:red; text-align:center;'>⚠️ Debes llenar todos los campos correctamente.</p>";
            }
        }

        
        echo '<div style="display:flex; align-items:flex-start; margin-top:30px;">';

        
        echo '<div style="margin-left:300px; margin-bottom: 300px">';
        $sql = "SELECT ID_Producto AS id, nombre, precio FROM productos ORDER BY id";
        $result = $mysqli->query($sql);
        if ($result && $result->num_rows > 0) {
            echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse:collapse;'>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $id = htmlspecialchars($row['id']);
                $nombre = htmlspecialchars($row['nombre']);
                $precio = number_format((float)$row['precio'], 2);
                echo "<tr><td>$id</td><td>$nombre</td><td>$$precio</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay productos.</p>";
        }
        echo '</div>';

echo '<div style="
        background:#f7f7f7;
        border:1px solid #aaa;
        border-radius:8px;
        padding:20px;
        box-shadow:2px 2px 5px rgba(0,0,0,0.2);
        margin-left:150px;
        width:300px;
    ">
    <h3>Agregar nuevo producto</h3>
    <form method="POST" action="">
        <input type="hidden" name="action" value="F1 Productos">
        <label>Nombre del producto:</label><br>
        <input type="text" name="nombre" required style="width:100%;"><br><br>
        <label>Precio:</label><br>
        <input type="number" step="0.01" name="precio" required style="width:100%;"><br><br>
        <button type="submit" name="add_producto" style="padding:10px 20px; font-size:16px;">Agregar producto</button>
    </form>
</div>';



        echo '</div>'; 
        break;

  
    case 'inventario':
        echo '<h2 style="margin-top:0px; text-align:center;">Inventario</h2>';
        $sql = "SELECT i.ID_Inventario, p.nombre AS producto, i.stock, i.ubicacion
                FROM inventario i
                JOIN productos p ON i.producto_ID = p.ID_Producto
                ORDER BY i.ID_Inventario";
        $result = $mysqli->query($sql);
        if ($result && $result->num_rows > 0) {
            echo '<table border="1" cellpadding="6" style="margin: 200px auto; border-collapse: collapse; width: 70%;">';
            echo '<tr><th>ID Inventario</th><th>Producto</th><th>Stock</th><th>Ubicación</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ID_Inventario']}</td>
                        <td>{$row['producto']}</td>
                        <td>{$row['stock']}</td>
                        <td>{$row['ubicacion']}</td>
                      </tr>";
            }
            echo '</table>';
        } else {
            echo '<p style="text-align:center;">No hay productos en inventario.</p>';
        }
        break;

    case 'proveedores':
        echo '<h2 style="margin-top:0px; text-align:center;">Proveedores</h2>';
        $sql = "SELECT ID_Proveedor, nombre, telefono FROM proveedores ORDER BY ID_Proveedor";
        $result = $mysqli->query($sql);
        if ($result && $result->num_rows > 0) {
            echo '<table border="1" cellpadding="6" style="margin: 200px auto; border-collapse: collapse; width: 70%;">';
            echo '<tr><th>ID</th><th>Nombre</th><th>Teléfono</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ID_Proveedor']}</td>
                        <td>{$row['nombre']}</td>
                        <td>{$row['telefono']}</td>
                      </tr>";
            }
            echo '</table>';
        } else {
            echo '<p style="text-align:center;">No hay proveedores registrados.</p>';
        }
        break;

case 'compras':
    echo '<h2 style=" margin-left:890px; margin-top:200px; text-align:center;">💸 Compras</h2>';

  
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ordenar'])) {
        $producto_id = intval($_POST['producto_id'] ?? 0);
        $cantidad = intval($_POST['cantidad'] ?? 0);

        if ($producto_id > 0 && $cantidad > 0) {
            $sql = "SELECT nombre, precio FROM productos WHERE ID_Producto = $producto_id";
            $res = $mysqli->query($sql);

            if ($res && $res->num_rows > 0) {
                $prod = $res->fetch_assoc();
                $nombre = $mysqli->real_escape_string($prod['nombre']);
                $precio = (float)$prod['precio'];
                $costo = $precio * $cantidad;
                $fecha = date('Y-m-d');

                $insert = $mysqli->query("
                    INSERT INTO facturas (fecha, producto, cantidad, costo)
                    VALUES ('$fecha', '$nombre', $cantidad, $costo)
                ");

                if ($insert) {
                    $factura_id = $mysqli->insert_id;
                    echo "
                    <div style='text-align:center; margin-top:40px;'>
                        <p style='color:green; font-size:22px; font-weight:bold;'>
                        ✅ Producto <strong>$nombre</strong> ordenado correctamente.<br>
                        Factura #$factura_id registrada el $fecha
                        </p>
                        <p style='font-size:18px;'>Cantidad: <strong>$cantidad</strong> | Total: <strong>$$costo</strong></p>
                    </div>";
                } else {
                    echo "<p style='color:red; text-align:center;'>❌ Error al registrar factura: {$mysqli->error}</p>";
                }
            } else {
                echo "<p style='color:red; text-align:center;'>⚠️ Producto no encontrado en base de datos.</p>";
            }
        } else {
            echo "<p style='color:red; text-align:center;'>⚠️ Debes seleccionar un producto y una cantidad válida.</p>";
        }
    }

    echo '
    <div style="
        display:flex;
        align-items:center;
        height:60vh;
        margin-bottom:250px;
        margin-left:800px;
    ">
        <form method="POST" action="" style="
            background:#f8f8f8;
            padding:30px 40px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.2);
            text-align:center;
        ">
            <h3 style="margin-bottom:25px; font-size:22px;">📦 Realizar una orden</h3>';

    
    $productos = $mysqli->query("SELECT ID_Producto, nombre FROM productos ORDER BY nombre");
    echo '
            <label for="producto_id" style="font-size:18px;">Selecciona producto:</label><br>
            <select name="producto_id" id="producto_id" required
                    style="padding:8px; font-size:16px; width:250px; margin:10px 0;">
    ';
    if ($productos && $productos->num_rows > 0) {
        while ($p = $productos->fetch_assoc()) {
            $id = htmlspecialchars($p['ID_Producto']);
            $nombre = htmlspecialchars($p['nombre']);
            echo "<option value='$id'>$nombre</option>";
        }
    } else {
        echo "<option value='0'>No hay productos</option>";
    }
    echo '
            </select><br>

            <label for="cantidad" style="font-size:18px;">Cantidad a ordenar:</label><br>
            <input type="number" name="cantidad" id="cantidad" min="1" required
                   style="width:120px; padding:5px; font-size:16px; margin-bottom:20px;"><br>

            <button type="submit" name="ordenar"
                    style="padding:10px 25px; font-size:17px; background:#4CAF50; color:white;
                           border:none; border-radius:6px; cursor:pointer;">
                Ordenar
            </button>
        </form>
    </div>
    ';
    break;

    case 'facturas':
    echo '<h2 style="margin-top:20px; text-align:center;">📄 Facturas registradas</h2>';

    // Consultar facturas
    $sql = "SELECT ID_Factura, fecha, producto, cantidad, costo FROM facturas ORDER BY ID_Factura DESC";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        echo '<table border="1" style="
                margin: 100px auto; 
                border-collapse: collapse; 
                width: 70%;
                font-size: 18px;
                text-align: center;
                margin-bottom: 400px;
            ">';
        echo '<tr style="background-color:#f0f0f0;">
                <th>ID Factura</th>
                <th>Fecha</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Costo Total</th>
              </tr>';
        while ($row = $result->fetch_assoc()) {
            $id = htmlspecialchars($row['ID_Factura']);
            $fecha = htmlspecialchars($row['fecha']);
            $producto = htmlspecialchars($row['producto']);
            $cantidad = htmlspecialchars($row['cantidad']);
            $costo = number_format((float)$row['costo'], 2);
            echo "<tr>
                    <td>$id</td>
                    <td>$fecha</td>
                    <td>$producto</td>
                    <td>$cantidad</td>
                    <td>$$costo</td>
                  </tr>";
        }
        echo '</table>';
    } else {
        echo '<p style="text-align:center; font-size:18px;">No hay facturas registradas.</p>';
    }
    break;


case 'reportes':
    echo "<div style='text-align:center; margin-top:100px; '>";
    echo "<img src='under.png' class='removeBg' alt='Reportes en construcción' style='display:block; margin:0 auto; margin-left: 700px; margin-bottom:100px; width:500px;'>";
    echo "<p style='font-size:50px; margin-left: 750px; margin-bottom:300px;'>En construcción<br>Vuelva pronto</p>";
    echo "</div>";
    break;

case 'contacto':
    echo "<div style='text-align:center; margin-left: 550px; margin-bottom:100px;'>";
    echo "<h2 style='font-size:100px;'>📞 Contacto</h2>";
    echo "<p style='font-size:40px;'>Si tiene alguna pregunta, no dude en contactarnos.</p>";
    echo "<p style='font-size:40px;'>555-555-555.</p>";
    echo "</div>";
    break;

    default:
echo "<div style='text-align:center; margin-left: 700px; margin-bottom:100px;'>";
    echo "<h2 style='font-size:100px;'>Bienvenido</h2>";
    echo "<p style='font-size:40px;'>Elije una opcion de arriba.</p>";
    echo "</div>";
}
?>

<div style="
    position: fixed;
    bottom: 20px;
    right: 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    z-index: 9999;
">
   
    <form action="login_tiendita.php" method="GET" style="margin:0;">
        <button type="submit" 
            style="background-color:#1976d2; color:white; border:none; border-radius:8px; 
                   padding:12px 20px; font-size:18px; cursor:pointer; 
                   box-shadow:0 3px 6px rgba(0,0,0,0.2);">
            🚪 Salir
        </button>
    </form>

    <!-- Botón Cerrar sesión -->
    <form method="POST" action="" style="margin:0;">
        <input type="hidden" name="logout" value="1">
        <button type="submit" 
            style="background-color:#d32f2f; color:white; border:none; border-radius:8px; 
                   padding:12px 20px; font-size:18px; cursor:pointer; 
                   box-shadow:0 3px 6px rgba(0,0,0,0.2);">
            🔒 Cerrar sesión
        </button>
    </form>
</div>

</body>
</html>
