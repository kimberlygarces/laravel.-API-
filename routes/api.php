<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ruta para login del usuario principal 
Route::post('/login', 'AuthController@login');

Route::post('logout', 'AuthController@logout');
Route::post('me', 'AuthController@me');


// Route::apiResource("cliente", "ClienteController");
// Route::apiResource("agendas", "AgendaController");

// ruta para los metodos del cliente
Route::prefix('cliente')->group(function() {
    // metodo all muestra todo los clientes creados
    Route::get('all', 'ClienteController@index');
    // metodo store recibe todo los datos para la creación de cliente
    Route::post('store', 'ClienteController@store');
});


// ruta para los metodos de agendas
Route::prefix('agendas')->group(function() {
    // metodo para mostrar todas las agendas creadas
    Route::get('all', 'AgendaController@index');
    // metodo para la creación de las agenadas - metodo que recibe los datos
    Route::post('store', 'AgendaController@store');
    // metodo para editar agenda - tree el id de la agenda
    Route::put('update/{id}', 'AgendaController@update');


    
});