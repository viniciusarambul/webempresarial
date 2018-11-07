<?php

namespace App\Domains;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Core\Util\Permission;
use App\Domains\PedidosCompras\PedidoCompra;
use App\Domains\Clientes\Cliente;
use App\Domains\Fornecedores\Fornecedor;
use Illuminate\Support\Facades\DB;


class RelatoriosController extends Controller
{
    public function index()
    {
      $clientescountativo = db::select('SELECT COUNT(status) as ativo FROM tcc.clientes where status = "Ativo"');
      $clientescountinativo = db::select('SELECT COUNT(status) as inativo FROM tcc.clientes where status = "inativo"');
      $clientescount = db::select('SELECT COUNT(id) as total FROM tcc.clientes');


      $fornecedorescountativo = db::select('SELECT COUNT(status) as ativo FROM tcc.fornecedores where status = "Ativo"');
      $fornecedorescountinativo = db::select('SELECT COUNT(status) as inativo FROM tcc.fornecedores where status = "inativo"');
      $fornecedorescount = db::select('SELECT COUNT(id) as total FROM tcc.fornecedores');

      $vendedorescountativo = db::select('SELECT COUNT(status) as ativo FROM tcc.vendedors where status = "Ativo"');
      $vendedorescountinativo = db::select('SELECT COUNT(status) as inativo FROM tcc.vendedors where status = "inativo"');
      $vendedorescount = db::select('SELECT COUNT(id) as total FROM tcc.vendedors');

      $produtoscountativo = db::select('SELECT COUNT(id) as total FROM tcc.produtos');
      $produtoscountinativo = db::select('SELECT COUNT(categoria) as categorias FROM tcc.produtos');
      $produtoscount = db::select('SELECT SUM(quantidade) as total_estoque FROM tcc.produtos');


     return view('relatorios',[
       'clientescountativo' => $clientescountativo,
       'clientescountinativo' => $clientescountinativo,
       'clientescount' => $clientescount,
       'fornecedorescountativo' => $fornecedorescountativo,
       'fornecedorescountinativo' => $fornecedorescountinativo,
       'fornecedorescount' => $fornecedorescount,
       'vendedorescountativo' => $vendedorescountativo,
       'vendedorescountinativo' => $vendedorescountinativo,
       'vendedorescount' => $vendedorescount,
       'produtoscountativo' => $produtoscountativo,
       'produtoscountinativo' => $produtoscountinativo,
       'produtoscount' => $produtoscount
     ]);
    }
}

?>
