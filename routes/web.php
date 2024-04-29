<?php

use App\Http\Controllers\TiposAsientoController;
use App\Http\Controllers\VuelosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// tipoAsiento
Route::get('/tiposAsientos', [TiposAsientoController::class, 'inicioTiposAsientos'])->name('tipos.asientos.inicio');
Route::get('/tiposAsientos/agregar', [TiposAsientoController::class, 'redirectToTiposAsientosAgregar'])->name('tipos.asientos.agregar');
Route::post('/tiposAsientos/guardar', [TiposAsientoController::class, 'guardarTipoAsiento'])->name('tipos.asientos.guardar');
Route::get('/tiposAsientos/editar/{id}', [TiposAsientoController::class, 'editarTipoAsiento'])->name('tipos.asientos.editar');
Route::get('/tiposAsientos/eliminar/{id}', [TiposAsientoController::class, 'eliminarTipoAsiento'])->name('tipos.asientos.eliminar');
Route::put('/tiposAsientos/editado/guardar/{id}', [TiposAsientoController::class, 'guardarTipoAsientoEditado'])->name('tipos.asientos.editado.guardar');

// vuelos
Route::get('/inicio', [VuelosController::class, 'inicio'])->name('vuelos.inicio');
Route::get('/vuelos', [VuelosController::class, 'redirectToVuelos'])->name('vuelos');
Route::get('/vuelos/crear/form', [VuelosController::class, 'redirectToFormCrearVuelo'])->name('vuelos.crear.form');
Route::get('/vuelos/editar/{id}', [VuelosController::class, 'editarVuelo'])->name('vuelos.editar');
Route::get('/vuelos/eliminar/{id}', [VuelosController::class, 'eliminarVuelo'])->name('vuelos.eliminar');
Route::put('/vuelos/editado/guardar/{id}', [VuelosController::class, 'guardarVueloEditado'])->name('vuelos.editado.guardar');
Route::post('/vuelos/creado', [VuelosController::class, 'crearNuevoVuelo'])->name('vuelos.crear');
// vuelosAsiento
Route::post('/asientos/guardar', [TiposAsientoController::class, 'guardarAsiento'])->name('asientos.guardar');
Route::get('/vuelos/asientos/agregar/{idVuelo}', [TiposAsientoController::class, 'agregarAsiento'])->name('vuelos.asiento.agregar');
Route::get('/vuelos/asientos/ver/{idVuelo}', [TiposAsientoController::class, 'verAsientosVuelos'])->name('vuelos.asientos.ver');