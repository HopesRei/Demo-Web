<!DOCTYPE html>
<html lang="es">
   


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
     @yield('styles')
<style>


.top-nav {
    background: #ecebebff;
    color: white;
    padding: 0 20px;
    height: 55px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-family: sans-serif;
}


.nav-left,
.nav-right {
    display: flex;
    align-items: center;
    gap: 20px;
}

/* LINKS */
.top-nav a {
    color: #080808ff;
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 4px;
    transition: 0.2s;
}

.top-nav a:hover {
    background: #020202ff;
    color: white;
}

/* ÍCONOS */
.icon {
    font-size: 18px;
    padding: 6px;
}

/* BOTÓN DROPDOWN */
.dropdown .dropbtn {
    background: none;
    border: none;
    color: #000000ff;
    cursor: pointer;
    padding: 8px 12px;
    font-size: 15px;
    border-radius: 4px;
    transition: 0.2s;
}

.dropdown .dropbtn:hover {
    background: #000000ff;
    color: white;
}

/* CONTENIDO DROPDOWN */
.dropdown {
    position: relative;
}

.dropdown-content {
    display: none;
    position: absolute;
    background: #080808ff;
    min-width: 150px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    border-radius: 4px;
    z-index: 10;
}

.dropdown-content a {
    color: #ccc;
    padding: 10px 15px;
    display: block;
}

.dropdown-content a:hover {
    background: #808080ff;
    color: white;
}

/* Muestra el dropdown al pasar el mouse */
.dropdown:hover .dropdown-content {
    display: block;
}




</style>

</head>
<body>


<nav class="top-nav">
    <div class="nav-left">
        <a href="/">Inicio</a>

        <div class="dropdown">
            <button class="dropbtn">Citas ▾</button>
            <div class="dropdown-content">
            <a href="/vercitas/ver">Ver Citas</a>
            <a href="#">Pendientes</a>
            </div>
        </div>

        <a href="#">Inventario</a>
        <a href="#">Expedientes</a>
    </div>

    <div class="nav-right">
        <a href="#" class="icon">🔔</a>

        <div class="dropdown">
            <button class="dropbtn">Administrador ▾</button>
            <div class="dropdown-content">
                <a href="#">Perfil</a>
                <a href="#">Cerrar sesión</a>
            </div>
        </div>

        <a href="#" class="icon">❓</a>
    </div>
</nav>


   

    
    <div class="container">
        @yield('content')
    </div>

</body>
</html>
