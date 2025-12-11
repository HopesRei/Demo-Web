@extends('layouts.app') 

@section('title', 'vercitas')

@section('styles')
    <style>
.dropdown-days {
    position: relative;
    display: inline-block;
    float: right;
    margin-bottom: 10px;
    padding-right: 50px;
}

.dropbtn {
    background: #1b8ed1;
    color: white;
    padding: 8px 12px;
    font-size: 14px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

.dropdown-days:hover .dropbtn {
    background: #167bb5;
}

.dropdown-content {
    display: none;
    position: absolute;
    right: 0; /* <-- menú alineado a la derecha */
    background-color: white;
    min-width: 150px;
    border-radius: 6px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    z-index: 10;
}

.dropdown-content a {
    color: black;
    padding: 10px 14px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #e6e6e6;
}

.dropdown-days:hover .dropdown-content {
    display: block;
}

.table-container {
    margin-left: 20px;
    width: 95%;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    text-align: left;
    background: #eaeaea;
    padding: 10px;
}

td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}


    </style>

@endsection

@section('content')

<h1>Citas</h1>

<div style="text-align:right; margin-bottom: 10px;">
    <button>Añadir</button>
    <button>Borrar</button>
</div>

<div class="table-container">

<div class="dropdown-days">
    <button class="dropbtn">
        Día: 
        @if ($dia == 'hoy') Hoy
        @elseif ($dia == 'manana') Mañana
        @elseif ($dia == 'pasado') Pasado
        @endif
        ▾
    </button>

    <div class="dropdown-content">
        <a href="/vercitas/ver/hoy">Hoy</a>
        <a href="/vercitas/ver/manana">Mañana</a>
        <a href="/vercitas/ver/pasado">Pasado</a>
    </div>
</div>



<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>No. de Cita</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Doctor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($citas as $cita)
            <tr>
                <td>{{ $cita['nombre'] }}</td>
                <td>{{ $cita['numero'] }}</td>
                <td>{{ $cita['fecha'] }}</td>
                <td>{{ $cita['hora'] }}</td>
                <td>{{ $cita['doctor'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>





@endsection