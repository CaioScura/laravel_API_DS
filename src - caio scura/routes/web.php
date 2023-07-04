<?php

use Illuminate\Support\Facades\Route;

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
// localhost:8000 ou 127.0.0.1:8000
Route::get('/', function () {
    return view('welcome');
});

//Route:: verbo_HTTP('URL', 'Controlador@método) ->name('nome_rota');
Route::get('/teste','TesteController@primeiraRota')->name('primeira_rota');

//Parametro Obrigatorio
Route::get('/param_obrig/{id}', 'TesteController@paramObrig')->name('parametros_obrigatorios');

//Parametros Opcionais = n2
Route::get('/soma/{n1}/{n2?}', 'TesteController@soma')->name('soma');


/**
 * Aula 7 - Material 6 - Eloquent ORM - Rotas
 * ==========================================
 *
 */
Route::get('/testes/get_all','TesteController@getAll')->name('testes.getAll');

Route::get('/testes/get_one_by_id/{id}', 'TesteController@getOneById')->name('testes.getOneById');

Route::get('/testes/get_many_by_id/{id1}/{id2}/{id3}', 'TesteController@getManyById')->name('testes.getManyById');

Route::get('/testes/get_by_name/{name}', 'TesteController@getByName')->name('testes.getByName');

Route::get('/testes/get_by_votes_between/{$min}/{$max}', 'TesteController@getByVotesBetween')->name('testes.getByVotesBetween');

Route::get('/testes/get_by_votes_not_between/{$min}/{$max}', 'TesteController@getByVotesNotBetween')->name('testes.getByVotesNotBetween');

Route::get('/testes/get_by_votes_in/{$min}/{$max}', 'TesteController@getByVotesIn')->name('testes.getByVotesIn');

//Segunda Parte
Route::get('/testes/get_testes_by_votes/{$vote1}/{$vote2}', 'TesteController@getTestesByVotes')->name('testes.getTestesByVotes');

Route::get('/testes/get_testes_by_votes_or/{$vote1}/{$vote2}', 'TesteController@getTestesByVotesOr')->name('testes.getTestesByVotesOr');

Route::get('/testes/get_testes_by_votes_and_prices/{$minVote}/{$maxVote}/{$minPrice}/{$maxPrice}', 'TesteController@getTestesByVotesAndPrices')->name('testes.getTestesByVotesAndPrices');

Route::get('/testes/get_testes_order_by_votes/{$min}/{$max}', 'TesteController@getTestesOrderByVotes')->name('testes.getTestesOrderByVotes');

Route::get('/testes/get_testes_order_by_price', 'TesteController@getAllOrderByPrice')->name('testes.getAllOrderByPrice');

Route::get('/testes/create_teste', 'TesteController@createTeste')->name('testes.createTeste');

Route::get('/testes/update_teste', 'TesteController@updateTeste')->name('testes.updateTeste');

Route::get('/testes/delete_teste', 'TesteController@deleteTeste')->name('testes.deleteTeste');


//Exercício AULA 08-04 - WEB.PHP
Route::get('/testes/soma', 'TesteController@sum')->name('testes.sum');

Route::get('/testes/vetor', 'TesteController@vetor')->name('testes.vetor');

Route::get('/testes/divisao', 'TesteController@divisao')->name('testes.divisao');

Route::get('/testes/total_itens', 'TesteController@totalItem')->name('testes.totalItem');

Route::get('/testes/estilo_json', 'TesteController@estiloJson')->name('testes.estiloJson');

Route::get('/testes/parte_dividida', 'TesteController@parteDividida')->name('testes.parteDividida');

Route::get('/testes/mesclar', 'TesteController@mesclar')->name('testes.mesclar');

Route::get('/testes/todos', 'TesteController@todos')->name('testes.todos');

Route::get('/testes/puxar', 'TesteController@puxar')->name('testes.puxar');

Route::get('/testes/acrescentar', 'TesteController@acrescentar')->name('testes.acrescentar');

Route::get('/testes/verificacao', 'TesteController@verificacao')->name('testes.verificacao');

Route::get('/testes/uniao', 'TesteController@uniao')->name('testes.uniao');

Route::get('/testes/especificado', 'TesteController@especificado')->name('testes.especificado');


/**
 * Rotas Aula 7 - CRUD Restful
 * ===========================
 */
// Route::view('/testes/index', 'testes/index');

Route::get('/testes', 'TesteController@index')->name('testes.index');

Route::get('/testes/{id}', 'TesteController@show')->name('testes.show');

Route::get('/testes/create', 'TesteController@create')->name('testes.create');

Route::post('/testes', 'TesteController@store')->name('testes.store');

Route::get()->name('/testes/{id}/edit', 'TesteController@edit')->name('testes.edit');

Route::put()->name('/testes/{id}', 'TesteController@update')->name('testes.update');
