<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/','FrontController@index');
Route::get('admin', 'FrontController@admin');

Route::resource('log', 'LogController');
Route::get('logout', 'LogController@logout');


Route::get('types','UsuarioController@types');
Route::get('usuarios','UsuarioController@listing');
Route::resource('usuario','UsuarioController');


Route::resource('estudiante','EstudianteController');
Route::get('typesT','EstudianteController@typesTurno');
Route::get('typesC','EstudianteController@typesCarrera');
Route::get('estudiantes','EstudianteController@listing');

Route::resource('carrera','CarreraController');
Route::get('carreras','CarreraController@listing');

Route::resource('lineainvestigacion','LineaInvesController');
Route::get('lineasinvestigacion','LineaInvesController@listing');








