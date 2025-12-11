<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;


Route::get('/', [TableController::class, 'hoy']);

// Rutas de inicio (opcionales)
Route::get('/Inicio/citas/hoy', [TableController::class, 'hoy']);
Route::get('/Inicio/citas/manana', [TableController::class, 'manana']);
Route::get('/Inicio/citas/pasado', [TableController::class, 'pasado']);

// Rutas Ver Citas (explícitas, sin prefix ambiguo)
Route::get('/vercitas/ver', [TableController::class, 'verhoy']);
Route::get('/vercitas/ver/hoy', [TableController::class, 'verhoy']);
Route::get('/vercitas/ver/manana', [TableController::class, 'vermanana']);
Route::get('/vercitas/ver/pasado', [TableController::class, 'verpasado']);


