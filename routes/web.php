<?php

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

// Route::get('/', 'HomeController@index')->middleware('isadminMiddleware1');
// Route::get('inicio', 'HomeController@index');
// Route::get('inicio', 'HomeController@inicio')->middleware('isadminMiddleware');
    Route::get('matches', 'HomeController@matches');
    Route::get('test', 'HomeController@test');


Route::get('/', 'HomeController@index')->name('home.index');
// Route::get('inicio', 'HomeController@index');
Route::get('inicio', 'HomeController@inicio');
Route::get('matches_all_web', 'HomeController@matches_all_web');


Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::get('login/facebook', 'LoginController@redirectToProvider')->name('social.auth');
Route::get('login/facebook/callback', 'LoginController@handleProviderCallback');
Route::post('email', 'toufixController@email');
Route::get('email2', 'toufixController@email2');
Route::post('validateMail', 'HomeController@validateMail');
Route::post('sendValidateMail', 'HomeController@sendValidateMail');
Route::get('reset/password', 'HomeController@resetPassword');
Route::post('updateResetPassword', 'HomeController@updateResetPassword');



//Route::get('/cart/success/{data}', array('as' => 'success', 'uses' => 'ShopController@showSuccess'));
Route::get('comboEquipos/{f1}/{f2}', 'HomeController@comboEquipos');
Route::get('select2combos/{f1}', 'HomeController@select2combos');
Route::get('selectMenbresia', 'HomeController@selectMenbresia');
Route::get('selectResponsable', 'HomeController@selectResponsable');
Route::get('tusTincazosPendientes', 'HomeController@tusTincazosPendientes');
Route::get('tusTincazosJuego', 'HomeController@tusTincazosJuego');
Route::get('tusTincazosFinalizados', 'HomeController@tusTincazosFinalizados');
Route::get('validarCampeonFechas', 'HomeController@validarCampeonFechas');
Route::get('listaJugadoresCampeon', 'HomeController@listaJugadoresCampeon');

Route::post('actualizarPerfil', 'secusrController@actualizarPerfil');
Route::post('sessionLink', 'HomeController@sessionLink');
Route::post('eliminarTorneoEquipo', 'touteaController@eliminarTorneoEquipo');
Route::post('EstadoEquipoTorneo', 'touteaController@EstadoEquipoTorneo');
Route::post('aceptarInvitacion', 'tougrpController@aceptarInvitacion');
Route::post('invitarJugador', 'tougrpController@invitarJugador');
Route::post('tieneDatosTorneo', 'touteaController@tieneDatosTorneo');
Route::post('tieneDatosFix', 'touteaController@tieneDatosFix');
Route::post('enJuego', 'toufixController@enJuego');
Route::post('suspender', 'toufixController@suspender');
Route::post('procesarPartido', 'toufixController@procesarPartido');
Route::post('editarScore', 'toufixController@editarScore');
Route::post('agregarTorneosEquipos', 'touteaController@agregarTorneosEquipos');
Route::get('tablaPosicionesGrupo', 'HomeController@tablaPosicionesGrupo');
Route::get('tableGestionarFixture', 'HomeController@tableGestionarFixture');
Route::get('tablaInvitacionesGrupo', 'HomeController@tablaInvitacionesGrupo');
Route::get('tableGestionarGruposAdmin', 'HomeController@tableGestionarGruposAdmin');
Route::get('tablaPosicionesPorDia', 'HomeController@tablaPosicionesPorDia');




Route::get('PoliticaPrivacidad', 'HomeController@politica');
Route::post('EquipoChampions', 'touteaController@EquipoChampions');
Route::post('EquipoChampionsValidate', 'touteaController@EquipoChampionsValidate');

Route::get('Guia', 'HomeController@guia');
Route::get('tablaAdminTorneos', 'HomeController@tablaAdminTorneos');
Route::get('tougrpShow/{f}', 'tougrpController@show');
Route::get('toufixShow/{f}', 'toufixController@show1');
Route::get('tablaAdminEquipos', 'HomeController@tablaAdminEquipos');
Route::get('estadisticas', 'HomeController@estadisticas');
Route::get('tablaAdminTorneosEquipos', 'HomeController@tablaAdminTorneosEquipos');
Route::get('tablaInfoPlayer', 'HomeController@tablaInfoPlayer');
Route::get('tablaInfoPlayerDia', 'HomeController@tablaInfoPlayerDia');
Route::post('updateTougrp', 'tougrpController@updateTougrp')->name('tougrp.updateTougrp');
Route::post('adminUpdateTougrp', 'tougrpController@adminUpdateTougrp')->name('tougrp.adminUpdateTougrp');
Route::post('insertarCampeon', 'touteaController@insertarCampeon');
Route::get('editarPerfil/', array('as' => 'editarPerfil', 'uses' => 'secusrController@editarPerfil'));
Route::get('obtenerPredicciones', 'HomeController@obtenerPredicciones');

Route::get('mainnav/tournament/{secconnuuid}','touinfController@selectTournament')->name('touinf.tournament');

// Route::get('editarPerfil/{nick}', array('as' => 'user', function($nick) { 
// 	return view('editarPerfil',compact('nick')); 
// })); 
Route::resource('secusr','secusrController');
Route::resource('tougrp','tougrpController');
Route::resource('touinf','touinfController');
Route::resource('toutea','touteaController');
Route::resource('plapre','plapreController');
Route::resource('toufix','toufixController');
