<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

///---- MIS RUTAS -----///
Route::resource('/tareas', App\Http\Controllers\TaskController::class);
Route::resource('/proyectos', App\Http\Controllers\ProjectController::class);

Route::get('/cambiar-estado/{id}', 'App\Http\Controllers\TaskController@status')->name('tareas.status');














