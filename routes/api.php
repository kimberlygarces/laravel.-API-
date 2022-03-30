<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('agendas')->group(function() {
    Route::get('all', 'AgendaController@index');
    Route::post('store', 'AgendaController@store');
    Route::put('update/{id}', 'AgendaController@update');


    
});