<?php

use App\Http\Controllers\SistemaEmbebidoController;
use App\SistemaEmbebido;
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
    Route::get('/sistema', 'SistemaEmbebidoController@index')->('name.index');
    Route::get('/sistema/{id}','SistemaEmbebidoController@show')->('name.show');
    Route::post('/sistema','SistemaEmbebidoController@store')->('name.store');
    Route::put('/sistema/{id}', 'SistemaEmbebidoController@update')->('name.update');
    Route::delete('/sistema/{id}','SistemaEmbebidoController@destroy')->('name.destroy');



});
