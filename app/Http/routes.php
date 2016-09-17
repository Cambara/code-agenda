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

$app->get('/',['as' => 'agenda.index', 'uses' => 'AgendaController@index']);
$app->get('/{name}',['as' => 'agenda.pesquisa', 'uses' => 'AgendaController@index']);
$app->get('/pessoa/destroy/{id}',['as' => 'pessoa.destroy', 'uses' => 'PessoaController@destroy']);
$app->get('/telefone/destroy/{id}',['as' => 'telefone.destroy', 'uses' => 'TelefoneController@destroy']);

