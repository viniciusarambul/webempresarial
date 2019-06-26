<?php

namespace App\Domains;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Core\Util\Permission;
use App\Domains\PedidosCompras\PedidoCompra;
use App\Domains\Clientes\Cliente;
use App\Domains\Fornecedores\Fornecedor;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
//SELECT YEAR(pc.data) as ano, MONTH(pc.data) as mes, count(pc.data) as contador
//FROM pedidoitens pi left join pedidocompra pc on pc.id = pi.idPedido group by YEAR(pc.data), MONTH(pc.data)
      $pedidocomprabar = db::select("SELECT YEAR(pc.data) AS ano,  MONTH(pc.data) AS mes, COUNT(pc.data) as contador, SUM(pi.preco) AS contadorpreco FROM pedidocompra pc LEFT JOIN pedidoitens pi ON pi.idPedido = pc.id WHERE pi.tipo_pedido = 'COMPRA' GROUP BY YEAR(pc.data) , MONTH(pc.data)");

      $pedidovendabar = db::select("SELECT  YEAR(pc.data) AS ano,  MONTH(pc.data) AS mes, COUNT(pc.data) as contador, SUM(pi.preco) AS contadorpreco FROM pedidovenda pc LEFT JOIN pedidoitens pi ON pi.idPedido = pc.id WHERE pi.tipo_pedido = 'VENDA' GROUP BY YEAR(pc.data) , MONTH(pc.data)");

      $clientesmes = db::select('SELECT YEAR(created_at) as ano, MONTH(created_at) as mes, count(created_at) as contador
      FROM clientes group by YEAR(created_at), MONTH(created_at)');

      $fornecedoresmes = db::select('SELECT YEAR(created_at) as ano, MONTH(created_at) as mes, count(created_at) as contador
      FROM fornecedores group by YEAR(created_at), MONTH(created_at)');

      $produtosmes = db::select('SELECT YEAR(created_at) as ano, MONTH(created_at) as mes, count(created_at) as contador
      FROM produtos group by YEAR(created_at), MONTH(created_at)');

      $categoriasmes = db::select('SELECT YEAR(created_at) as ano, MONTH(created_at) as mes, count(created_at) as contador
      FROM categorias group by YEAR(created_at), MONTH(created_at)');

      date_default_timezone_set('America/Sao_Paulo');
      $hoje = date('Y-m-d');

      $recebidos = db::select("SELECT SUM(valorPago) as soma FROM sandbox.contaReceber where dataPagamento = '$hoje'");
      $pagos = db::select("SELECT SUM(valorPago) as soma FROM sandbox.contaPagar where dataPagamento = '$hoje'");
      $vendasdia = db::select("SELECT SUM(preco) as soma FROM sandbox.pedidotitulos where tipo_pedido = 'VENDA' and dataEmissao = '$hoje'");
      $comprasdia = db::select("SELECT SUM(preco) as soma FROM sandbox.pedidotitulos where tipo_pedido = 'COMPRA' and dataEmissao = '$hoje'");
      //$fluxo = db::select("SELECT SUM(preco) as soma FROM sandbox.pedidotitulos where tipo_pedido = 'COMPRA' and dataEmissao = '$hoje'");

      $contasdodia = db::select("SELECT cp.*, f.nome as nomefornecedor FROM sandbox.contaPagar cp left join fornecedores f on f.id=cp.idFornecedor where dataVencimento = '2019-06-13' and (dataPagamento is null or dataPagamento = '0000-00-00') LIMIT 10");
      $receitasdodia = db::select("SELECT cp.*, f.nome as nomefornecedor FROM sandbox.contaReceber cp left join clientes f on f.id=cp.idCliente where dataVencimento = '2019-06-13' and (dataPagamento is null or dataPagamento = '0000-00-00') LIMIT 10");

     return view('dashboard',[
       'pedidocomprabar' => $pedidocomprabar,
       'pedidovendabar' => $pedidovendabar,
       'clientesmes' => $clientesmes,
       'fornecedoresmes' => $fornecedoresmes,
       'produtosmes' => $produtosmes,
       'categoriasmes' => $categoriasmes,
       'recebidos' => $recebidos,
       'pagos' => $pagos,
       'vendasdia' => $vendasdia,
       'comprasdia' => $comprasdia,
       'hoje' => $hoje,
       'contasdodia' => $contasdodia,
       'receitasdodia' => $receitasdodia
     ]);
    }
}

?>
