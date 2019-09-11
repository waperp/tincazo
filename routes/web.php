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

    Route::get('matches', 'HomeController@matches');

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('inicio', 'HomeController@inicio');
// Route::get('up', 'HomeController@up');
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
Route::post('validateMailLogin', 'secusrController@validateMailLogin');
Route::post('validateMailInvite', 'secusrController@validateMailInvite');

//Route::get('/cart/success/{data}', array('as' => 'success', 'uses' => 'ShopController@showSuccess'));
Route::get('comboEquipos/{f1}/{f2}', 'Select2Controller@comboEquipos');
Route::get('select2combos/{f1}', 'Select2Controller@select2combos');
Route::get('selectMenbresia', 'Select2Controller@selectMenbresia');
Route::get('selectResponsable', 'Select2Controller@selectResponsable');
Route::get('selected_tournament', 'Select2Controller@selected_tournament');
Route::get('selected_group', 'Select2Controller@selected_group');

Route::get('tusTincazosPendientes', 'HomeController@tusTincazosPendientes');
Route::get('tusTincazosJuego', 'HomeController@tusTincazosJuego');
Route::get('tusTincazosFinalizados', 'HomeController@tusTincazosFinalizados');
Route::get('validarCampeonFechas', 'HomeController@validarCampeonFechas');
Route::get('listaJugadoresCampeon', 'HomeController@listaJugadoresCampeon');
Route::get('estadisticas', 'HomeController@estadisticas');
Route::get('Guia', 'HomeController@guia');
Route::get('PoliticaPrivacidad', 'HomeController@politica');
Route::get('TerminosCondiciones', 'HomeController@TerminosCondiciones');
Route::get('obtenerPredicciones', 'HomeController@obtenerPredicciones');

Route::post('actualizarPerfil', 'secusrController@actualizarPerfil');
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

Route::get('tablaPosicionesGrupo', 'DatatablesController@tablaPosicionesGrupo');
Route::get('tableGestionarFixture', 'DatatablesController@tableGestionarFixture');
Route::get('tablaInvitacionesGrupo', 'DatatablesController@tablaInvitacionesGrupo');
Route::get('tableGestionarGruposAdmin', 'DatatablesController@tableGestionarGruposAdmin');
Route::get('tablaPosicionesPorDia', 'DatatablesController@tablaPosicionesPorDia');
Route::get('tablaAdminTorneosEquipos', 'DatatablesController@tablaAdminTorneosEquipos');
Route::get('tablaInfoPlayer', 'DatatablesController@tablaInfoPlayer');
Route::get('tablaInfoPlayerDia', 'DatatablesController@tablaInfoPlayerDia');
Route::get('tablaAdminEquipos', 'DatatablesController@tablaAdminEquipos');
Route::get('tablaAdminTorneos', 'DatatablesController@tablaAdminTorneos');


Route::get('user/invitation/{group}/{user}', 'secusrController@userInvitation');

Route::post('EquipoChampions', 'touteaController@EquipoChampions');
Route::post('EquipoChampionsValidate', 'touteaController@EquipoChampionsValidate');



Route::get('tougrpShow/{f}', 'tougrpController@show');
Route::get('toufixShow/{f}', 'toufixController@show1');

Route::post('updateTougrp', 'tougrpController@updateTougrp')->name('tougrp.updateTougrp');
Route::post('adminUpdateTougrp', 'tougrpController@adminUpdateTougrp')->name('tougrp.adminUpdateTougrp');
Route::post('insertarCampeon', 'touteaController@insertarCampeon');
Route::get('editarPerfil/', array('as' => 'editarPerfil', 'uses' => 'secusrController@editarPerfil'));

Route::get('mainnav/tournament/{secconnuuid}','touinfController@tableGestionarGruposAdmin')->name('touinf.tournament');

// Route::get('editarPerfil/{nick}', array('as' => 'user', function($nick) { 
// 	return view('editarPerfil',compact('nick')); 
// })); 
Route::resource('secusr','secusrController');
Route::resource('tougrp','tougrpController');
Route::resource('touinf','touinfController');
Route::resource('toutea','touteaController');
Route::resource('plapre','plapreController');
Route::resource('toufix','toufixController');
