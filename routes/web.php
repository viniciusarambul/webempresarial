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
Route::get('/pedidosCompras/{pedidoCompra}/baixa', 'PedidosCompras\PedidoCompraController@baixa')->name('pedidosCompras.baixa');
Route::get('/contasReceber/{contaReceber}/baixa', 'ContasReceber\ContaReceberController@baixa')->name('contasReceber.baixa');
Route::get('/contasPagar/{contaPagar}/baixa', 'ContasPagar\ContaPagarController@baixa')->name('contasPagar.baixa');
Route::get('/contasPagar/{contaPagar}/cancel', 'ContasPagar\ContaPagarController@cancel')->name('contasPagar.cancel');
Route::get('/contasReceber/{contaReceber}/cancel', 'ContasReceber\ContaReceberController@cancel')->name('contasReceber.cancel');
Route::get('/pedidosCompras/{pedidoCompra}/faturar', 'PedidosCompras\PedidoCompraController@faturar')->name('pedidosCompras.faturar');
Route::get('/pedidosVendas/{pedidoVenda}/faturar', 'PedidosVendas\PedidoVendaController@faturar')->name('pedidosVendas.faturar');
// Route::get('/contasReceber/{contaReceber}/baixa', 'ContasReceber\ContaReceberController@baixado')->name('contasReceber.baixa');
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
Route::get('/fluxoCaixa', 'FluxoController@index')->name('fluxoCaixa');
Route::get('/estoque', 'EstoqueController@index')->name('estoque');
Route::get('produto/pdf', 'Produtos\ProdutoController@Baixar')->name('produtos.relatorio');
Route::get('cliente/pdf', 'Clientes\ClienteController@Baixar')->name('clientes.relatorio');
Route::get('fornecedor/pdf', 'Fornecedores\FornecedorController@Baixar')->name('fornecedores.relatorio');
Route::get('vendedor/pdf', 'Vendedores\VendedorController@Baixar')->name('vendedores.relatorio');
Route::get('pedidoVenda/pdf', 'PedidosVendas\PedidoVendaController@Baixar')->name('pedidosVendas.relatorio');
Route::get('pedidoCompra/pdf', 'PedidosCompras\PedidoCompraController@Baixar')->name('pedidosCompras.relatorio');
Route::get('contaPagar/pdf', 'ContasPagar\ContaPagarController@Baixar')->name('contasPagar.relatorio');
Route::get('contaReceber/pdf', 'ContasReceber\ContaReceberController@Baixar')->name('contasReceber.relatorio');
Route::get('/relatorios', 'RelatoriosController@index')->name('relatorios');

Route::get('produtos/{produto}', 'Produtos\ProdutoController@produto');



Route::get('/consultasClientes', 'Clientes\ClienteController@consulta')->name('clientes.consulta');
Route::get('/consultasFornecedores', 'Fornecedores\FornecedorController@consulta')->name('fornecedores.consulta');
Route::get('/consultasVendedores', 'Vendedores\VendedorController@consulta')->name('vendedores.consulta');
Route::get('/consultasProdutos', 'Produtos\ProdutoController@consulta')->name('produtos.consulta');
Route::get('/consultasPedidosVendas', 'PedidosVendas\PedidoVendaController@consulta')->name('pedidosVendas.consulta');
Route::get('/consultasPedidosCompras', 'PedidosCompras\PedidoCompraController@consulta')->name('produtos.consulta');
Route::get('/consultasContasPagar', 'ContasPagar\ContaPagarController@consulta')->name('contasPagar.consulta');
Route::get('/consultasContasReceber', 'ContasReceber\ContaReceberController@consulta')->name('contasReceber.consulta');

Route::get('/main', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('main/successlogin', 'MainController@successlogin');
Route::get('main/logout', 'MainController@logout');


Route::get('pdf', function () {
  $pdf = App::make('dompdf.wrapper');
  $pdf->loadHTML('<h1>Test</h1>');
  return $pdf->stream();
});
