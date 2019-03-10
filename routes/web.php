<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/notes', 'NotesController@showNotes');

$router->post('/notes', 'NotesController@storeNote');

$router->get('/notes/{id}', 'NotesController@showNote');

$router->put('/notes/{id}', 'NotesController@updateNote');

$router->delete('/notes/{id}', 'NotesController@deleteNote');