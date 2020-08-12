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
Route::get('/produtos', [
        'as'=>'produto',
        'uses'=>'ProdutoController@listarProdutos']);

Route::get('/produtos/visualizar/{id}', 'ProdutoController@visualizar')->where('id', '[0-9]+');
Route::get('/produtos/remove/{id}', 'ProdutoController@remove');
Route::get('/produtos/novo', 'ProdutoController@novo');
Route::match(array('GET','POST'),'/produtos/addProduto', 'ProdutoController@addProduto');
Route::get('/produtos/json', 'ProdutoController@listaJson');
Route::get('/produtos/{id}/edit', 'ProdutoController@edit');



