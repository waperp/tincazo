<?php
Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'Auth\AuthController@login')->name('login');
    Route::post('register', 'Auth\AuthController@register');
    Route::resource('secusr', 'secusrController');
    Route::post('sendValidateMailApi', 'Auth\AuthController@sendValidateMailApi');
    Route::post('sendPinMailApi', 'Auth\AuthController@sendPinMailApi');
    Route::post('validateMailApi', 'Auth\AuthController@validateMailApi');
    Route::post('updateResetPasswordApi', 'Auth\AuthController@updateResetPasswordApi');
    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('user', 'Auth\AuthController@user');
        Route::get('membership', 'Auth\AuthController@membership');
        Route::get('tournament', 'Auth\AuthController@tournament');
        Route::post('groups', 'Auth\AuthController@groups');
        Route::get('tablePositionsGeneral', 'Auth\AuthController@tablePositionsGeneral');
        Route::get('tablePositionsDay', 'Auth\AuthController@tablePositionsDay');
        Route::get('pendingMatches', 'Auth\AuthController@pendingMatches');
        Route::get('inGameMatches', 'Auth\AuthController@inGameMatches');
        Route::get('finishedMatches', 'Auth\AuthController@finishedMatches');
        Route::get('myChampion', 'Auth\AuthController@myChampion');
        Route::get('myChampionTeams', 'Auth\AuthController@myChampionTeams');
        Route::get('tableGroupInvitations', 'Auth\AuthController@tableGroupInvitations');
        Route::resource('plapre', 'plapreController');
        Route::post('storeApp', 'plapreController@store_app');
        Route::post('pushChampions', 'touteaController@pushChampions');
        Route::post('invitarJugador', 'tougrpController@invitarJugadorApi');
        Route::post('myInvitationsCount', 'Auth\AuthController@myInvitationsCount');
        Route::post('myInvitationsApi', 'Auth\AuthController@myInvitationsApi');
        Route::post('acceptInvitationApi', 'tougrpController@acceptInvitationApi');
        Route::get('tincazosApi', 'Auth\AuthController@tincazosApi');
        Route::post('validateTournamentApi', 'Auth\AuthController@validateTournamentApi');
        Route::post('updateTougrpApi', 'tougrpController@updateTougrpApi')->name('tougrp.updateTougrp');
        Route::post('updatePerfilApi', 'secusrController@updatePerfilApi');
    });
    Route::get('tableGroupInvitations', 'Auth\AuthController@tableGroupInvitations');
});
