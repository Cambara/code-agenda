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
//Agenda
$app->get('/',['as' => 'agenda.index', 'uses' => 'AgendaController@index']);
$app->get('/{name}',['as' => 'agenda.pesquisa', 'uses' => 'AgendaController@index']);
//Contato
$app->get('/contato/novo',['as' => 'pessoa.create', 'uses' => 'PessoaController@create']);
$app->post('/contato/',['as' => 'pessoa.store', 'uses' => 'PessoaController@store']);
$app->get('/contato/{id}/editar',['as' => 'pessoa.edit', 'uses' => 'PessoaController@edit']);
$app->put('/contato/{id}',['as' => 'pessoa.update', 'uses' => 'PessoaController@update']);
$app->get('/contato/{id}/deletar',['as' => 'pessoa.delete', 'uses' => 'PessoaController@delete']);
$app->delete('/contato/{id}/destroy',['as' => 'pessoa.destroy', 'uses' => 'PessoaController@destroy']);
//Telefone
$app->get('/telefone/novo/{id}',['as' => 'telefone.create', 'uses' => 'TelefoneController@create']);
$app->post('/telefone/',['as' => 'telefone.store', 'uses' => 'TelefoneController@store']);
$app->get('/telefone/{id}/editar',['as' => 'telefone.edit', 'uses' => 'TelefoneController@edit']);
$app->put('/telefone/{id}',['as' => 'telefone.update', 'uses' => 'TelefoneController@update']);
$app->get('/telefone/{id}/deletar',['as' => 'telefone.delete', 'uses' => 'TelefoneController@delete']);
$app->delete('/telefone/{id}/destroy',['as' => 'telefone.destroy', 'uses' => 'TelefoneController@destroy']);
//Email
$app->get('/email/novo/{id}',['as' => 'email.create', 'uses' => 'EmailController@create']);
$app->post('/email/',['as' => 'email.store', 'uses' => 'EmailController@store']);
$app->get('/email/{id}/editar',['as' => 'email.edit', 'uses' => 'EmailController@edit']);
$app->put('/email/{id}',['as' => 'email.update', 'uses' => 'EmailController@update']);
$app->get('/email/{id}/deletar',['as' => 'email.delete', 'uses' => 'EmailController@delete']);
$app->delete('/email/{id}/destroy',['as' => 'email.destroy', 'uses' => 'EmailController@destroy']);

