<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/componente','ComponenteController@index')->name('componente.index');
// Route::get('/componente/{id}','ComponenteController@show')->name('componente.show');
// Route::post('/componente','ComponenteController@store')->name('componente.store');
// Route::put('/componente/{id}','ComponenteController@update')->name('componente.update');
// Route::delete('/componente/{id}','ComponenteController@destroy')->name('componente.destroy');
Route::apiResource('componente', 'ComponenteController');

Route::apiResource('mediciones', 'MedicionController');
Route::apiResource('unidades', 'UnidadController');
Route::apiResource('sistemas', 'SistemaEmbebidoController');

