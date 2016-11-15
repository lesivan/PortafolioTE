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
Route::get('usuarios/bySearch/{search}', 'UsuarioController@usersBySearch');


Route::resource('estudiante','EstudianteController');
Route::get('typesT','EstudianteController@typesTurno');
Route::get('typesC','EstudianteController@typesCarrera');
Route::get('estudiantes','EstudianteController@listing');

Route::resource('carrera','CarreraController');
Route::get('carreras','CarreraController@listing');

Route::resource('lineainvestigacion','LineaInvesController');
Route::get('lineasinvestigacion','LineaInvesController@listing');

Route::resource('turno','TurnoController');
Route::get('turnos','TurnoController@listing');

Route::resource('asignatura','AsignaturaController');
Route::get('asignaturas','AsignaturaController@listing');

Route::resource('carreraturno','CarreraTurnoController');
Route::get('typesTu','CarreraTurnoController@typesTurno');
Route::get('typesCa','CarreraTurnoController@typesCarrera');
Route::get('carreraturnos','CarreraTurnoController@listing');

Route::resource('lineaasignatura','LineaasignaturaController');
Route::get('typesLi','LineaasignaturaController@typesLineas');
Route::get('typesAs','LineaasignaturaController@typesAsignaturas');
Route::get('lineasasignaturas','LineaasignaturaController@listing');

Route::resource('proyecto','ProyectoController');
Route::get('typesA','ProyectoController@typesAsignatura');
Route::get('typesL','ProyectoController@typesLinea');
Route::get('typesE','ProyectoController@typesEstudiante');









