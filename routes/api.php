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

Route::get('/autor', 'AutorController@index')->name('autor.index');
Route::get('/autor/{id}', 'AutorController@show')->name('autor.show');
Route::post('/autor', 'AutorController@store')->name('autor.store');
Route::put('/autor/{id}', 'AutorController@update')->name('autor.update');
Route::delete('/autor/{id}', 'AutorController@destroy')->name('autor.destroy');


