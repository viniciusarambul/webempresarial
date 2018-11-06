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
Route::resource('/vendedores', 'Vendedores\VendedorController');
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
Route::resource('/usuarios', 'Usuarios\UsuarioController');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/estoque', 'EstoqueController@index')->name('estoque');



Route::get('/main', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('main/successlogin', 'MainController@successlogin');
Route::get('main/logout', 'MainController@logout');
