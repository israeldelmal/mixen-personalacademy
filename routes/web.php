<?php
// Web
Route::get('/', 'WebController@index')->name('index');
Route::get('/cursos/{slug}', 'WebController@course');
Route::get('/articulos', 'WebController@articles');
Route::get('/articulos/{slug}', 'WebController@articles_show');
// Autenticación
Route::prefix('autenticacion')->group(function() {
	Route::get('/', 'AuthController@index')->name('autenticacion');
	Route::post('/autenticar', 'AuthController@auth');
	Route::get('/crear-cuenta', 'AuthController@create')->name('autenticacion/crear-cuenta');
	Route::post('/crear-cuenta/crear', 'AuthController@store');
	Route::get('/recuperar-contrasena', 'AuthController@index')->name('autenticacion/recuperar-contrasena');
	Route::post('/recuperar-contrasena/recuperar', 'AuthController@index');
	Route::get('/cerrar-sesion', 'AuthController@logout');
});
// Escritorio
Route::prefix('escritorio')->middleware('user.status')->group(function() {
	// Index
	Route::get('/', 'DashboardController@index')->name('escritorio');
	// Usuarios
	Route::prefix('usuarios')->group(function() {
		Route::get('/', 'DashboardController@users')->name('escritorio/usuarios');
		Route::get('/editar/{id}', 'DashboardController@users_edit')->name('escritorio/editar');
		Route::get('/actualizar/{id}', 'DashboardController@users_update');
	});
	// Usuario
	Route::get('/usuario/{id}', 'DashboardController@user');
	Route::post('/usuario/actualizar/{id}', 'DashboardController@user_update');
	// Home
	Route::get('/cabecera', 'DashboardController@header')->name('escritorio/cabecera');
	Route::post('/cabecera/actualizar', 'DashboardController@header_update');
	Route::get('/nosotros', 'DashboardController@about')->name('escritorio/nosotros');
	Route::post('/nosotros/actualizar', 'DashboardController@about_update');
	Route::get('/descanso', 'DashboardController@break')->name('escritorio/descanso');
	Route::post('/descanso/actualizar', 'DashboardController@break_update');
	Route::get('/faq', 'DashboardController@faq')->name('escritorio/faq');
	Route::post('/faq/actualizar', 'DashboardController@faq_update');
	// Metadata
	Route::prefix('metadatos')->group(function() {
		Route::get('/', 'DashboardController@metadata')->name('escritorio/metadatos');
		Route::post('/actualizar', 'DashboardController@metadata_update');
	});
	// Cursos
	Route::prefix('cursos')->group(function() {
		Route::get('/', 'DashboardController@courses')->name('escritorio/cursos');
		Route::get('/crear', 'DashboardController@courses_create')->name('escritorio/cursos/crear');
		Route::post('/almacenar', 'DashboardController@courses_store');
		Route::get('/editar/{id}', 'DashboardController@courses_edit')->name('escritorio/cursos/editar');
		Route::post('/actualizar/{id}', 'DashboardController@courses_update');
	});
	// Servicios
	Route::prefix('servicios')->group(function() {
		Route::get('/', 'DashboardController@services')->name('escritorio/servicios');
		Route::get('/crear', 'DashboardController@services_create')->name('escritorio/servicios/crear');
		Route::post('/almacenar', 'DashboardController@services_store');
		Route::get('/editar/{id}', 'DashboardController@services_edit')->name('escritorio/servicios/editar');
		Route::post('/actualizar/{id}', 'DashboardController@services_update');
	});
	// Artículos
	Route::prefix('articulos')->group(function() {
		Route::get('/', 'DashboardController@articles')->name('escritorio/articulos');
		Route::get('/crear', 'DashboardController@articles_create')->name('escritorio/articulos/crear');
		Route::post('/almacenar', 'DashboardController@articles_store');
		Route::get('/editar/{id}', 'DashboardController@articles_edit')->name('escritorio/articulos/editar');
		Route::post('/actualizar/{id}', 'DashboardController@articles_update');
	});
	// Testimonios
	Route::prefix('testimonios')->group(function() {
		Route::get('/', 'DashboardController@testimonies')->name('escritorio/testimonios');
		Route::get('/crear', 'DashboardController@testimonies_create')->name('escritorio/testimonios/crear');
		Route::post('/almacenar', 'DashboardController@testimonies_store');
		Route::get('/editar/{id}', 'DashboardController@testimonies_edit')->name('escritorio/testimonios/editar');
		Route::post('/actualizar/{id}', 'DashboardController@testimonies_update');
	});
});