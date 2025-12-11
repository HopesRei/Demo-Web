@extends('layouts.app') 

@section('title', 'Inicio')

@section('styles')
    <style>
.cards {
    display: flex;
    gap: 20px;
}

.card {
    background: #ffffffff;
    color: #b8b8b8ff;
    padding: 20px;
    border-radius: 10px;
    width: 280px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.3);
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #000000ff;
    font-size: 14px;
    font-weight: bold;
}

.card-icon {
    cursor: pointer;
    color: #000000ff;
}

.warning {
    color: #ffcc00ff;
    font-size: 18px;
    cursor: default;
}


.card-value {
    display: flex;
    align-items: baseline;
    gap: 10px;
}

.card-value h2 {
    font-size: 40px;
    color: #000000ff;
    margin: 0;
}

.subtitle {
    font-size: 16px;
    color: #000000ff;
}


.card-footer {
    margin-top: 10px;
    color: #000000ff;
    display: flex;
    gap: 5px;
}

.down {
    color: #ff0000ff;
}


.card-line {
    margin: 0;
    font-size: 16px;
    color: #000000ff;
}

.warning-text {
    margin-top: 5px;
    font-size: 14px;
    color: #f0c674;
}

.tab-buttons {
    display: flex;
    gap: 10px;
    margin: 30px 0 10px 20px;
}

.tab-buttons button {
    padding: 8px 18px;
    border-radius: 8px;
    background: #f4f4f4;
    border: 1px solid #ccc;
    cursor: pointer;
    font-weight: bold;
}

.tab-buttons button.active {
    background: #1b8ed1;
    color: white;
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
    <h1 style="padding-left: 20px; color: #1b8ed1ff; text-style: italic; font-size: 18px">Inicio /</h1>
    <h2 style="padding-left: 40px; color: #000000ff; font-size: 30px">Resumen Semanal</h2>
    
<div class="cards">
    <div class="card">
        <div class="card-header">
            <span>Ventas</span>
            <span class="card-icon">⋮</span>
        </div>

        <div class="card-value">
            <h2>24</h2>
            <span class="subtitle">Este Mes</span>
        </div>

        <div class="card-footer">
            <span>Mes Anterior:</span>
            <span class="down">22% ▼</span>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <span>Inventario global</span>
            <span class="warning">⚠</span>
        </div>

        <p class="card-line"><strong>Piezas Totales:</strong> 120</p>

        <p class="warning-text">
            Advertencia: Quedan Pocas Piezas de Paracetamol
        </p>
    </div>
</div>

<div class="tab-buttons">
    <a href="/citas/hoy"><button class="{{ $dia == 'hoy' ? 'active' : '' }}">Hoy</button></a>
    <a href="/citas/manana"><button class="{{ $dia == 'manana' ? 'active' : '' }}">Mañana</button></a>
    <a href="/citas/pasado"><button class="{{ $dia == 'pasado' ? 'active' : '' }}">Pasado</button></a>
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