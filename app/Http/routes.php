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

Route::get('/', [
    'as'    =>  'Tickets.latest',
    'uses'  =>  'TicketsController@latest'
]);

Route::get('/populares', [
    'as'    =>  'Tickets.popular',
    'uses'  =>  'TicketsController@popular'
]);

Route::get('/pendientes', [
    'as'    =>  'Tickets.open',
    'uses'  =>  'TicketsController@open'
]);

Route::get('/tutoriales', [
    'as'    =>  'Tickets.closed',
    'uses'  =>  'TicketsController@closed'
]);

Route::get('/solicitud/{id}', [
    'as'    =>  'Tickets.details',
    'uses'  =>  'TicketsController@details'
]);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
/*
 * El Middleware  Bloqueará a todos los usuarios que no esten
 * conectados
 */
Route::group(['middleware' => 'auth'], function (){
 
    //Muestra Formulario de Solicitudes
    Route::get('/solicitar',[
        
       'as'     =>  'tickets.create',
       'uses'   =>  'TicketsController@create'
    ]);
    
    //Procesa Formulario de Solicitudes
    Route::post('/solicitar',[
        
       'as'     =>  'tickets.store',
       'uses'   =>  'TicketsController@store'
    ]);
    
    //Votar
    Route::post('/votar/{id}',[
       'as'    =>  'votes.submit',
       'uses'  =>  'VotesController@submit'
    ]);
    Route::delete('/votar/{id}',[
       'as'    =>  'votes.destroy',
       'uses'  =>  'VotesController@destroy'
    ]);
    
    
    //Comentar
    Route::post('/comentar/{id}',[
       'as'     =>  'comments.comment',
       'uses'   =>  'CommentsController@comment'
        
    ]);
    
});