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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('/produtos', 'Produtos\ProdutoController');
Route::resource('/clientes', 'Clientes\ClienteController');
Route::resource('/fornecedores', 'Fornecedores\FornecedorController');
Route::resource('/pedidosCompras', 'PedidosCompras\PedidoCompraController');
Route::resource('pedidosCompras.pedidoItem', 'PedidosCompras\PedidoItemCompraController');
Route::resource('pedidosCompras.pedidoTitulo', 'PedidosCompras\PedidoTituloCompraController');
Route::resource('/pedidosVendas', 'PedidosVendas\PedidoVendaController');
Route::resource('pedidosVendas.pedidoItem', 'PedidosVendas\PedidoItemVendaController');
Route::resource('pedidosVendas.pedidoTitulo', 'PedidosVendas\PedidoTituloVendaController');
Route::resource('/contasReceber', 'ContasReceber\ContaReceberController');
Route::resource('/contasPagar', 'ContasPagar\ContaPagarController');
Route::resource('/categorias', 'Categorias\CategoriaController');
Route::resource('/dashboard', 'Dashboard\DashboardController');



Route::get('/main', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('main/successlogin', 'MainController@successlogin');
Route::get('main/logout', 'MainController@logout');
