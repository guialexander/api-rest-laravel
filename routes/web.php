<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Rutas de prueba
Route::get('/', function () {
    return view('welcome world this is Larevel');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/pruebas/{nombre?}', function ($nombre = null){
    $text= '<h2>Texto de la ruta pruebas</h2>';
    $text.='Nombre: '.$nombre;
return $text;

});


Route::get('/animales', 'App\Http\Controllers\PruebasController@index');
Route::get('/test', 'App\Http\Controllers\PruebasController@testOrm');

// RUTAS DEL API

    /*Metodo HTTP comunes 
     
     * GET: conseguir datos o recursos
     * POST: Guardar datos o recursos o hacer logica desde un formulario.
     * PUT: Actualizar datos o recursos
     * DELETE: eliminar datos o recursos
     */

    //Rutas de prueba
    Route::get('/usuario/pruebas', 'App\Http\Controllers\UserController@pruebas');
    Route::get('/categoria/pruebas', 'App\Http\Controllers\CategoryController@pruebas');
    Route::get('/post/pruebas', 'App\Http\Controllers\PostController@pruebas');
    
    //Rutas controlador de usuarios
    Route::post('api/register', 'App\Http\Controllers\UserController@register');
    Route::post('api/login', 'App\Http\Controllers\UserController@login');
    

