<?php

namespace App\Domains;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Core\Util\Permission;
use App\Domains\PedidosCompras\PedidoCompra;
use App\Domains\Clientes\Cliente;
use App\Domains\Fornecedores\Fornecedor;
use Illuminate\Support\Facades\DB;


class FluxoController extends Controller
{
    public function index(Request $request)
    {

        if($request->get('filter') !== null)
      {
          $data = $request->get('filter');


          $query = db::select("SELECT id, descricao, dataEmissao, dataVencimento, situacao, dataPagamento, valor, valorPago FROM sandbox.contaPagar where (dataPagamento = '$data') union SELECT id, descricao, dataEmissao, dataVencimento, situacao, dataPagamento, valor, valorPago FROM sandbox.contaReceber where (dataPagamento = '$data')");

      }else{
            $hoje = date('Y-m-d');
            $query = db::select("SELECT id, descricao, dataEmissao, dataVencimento, situacao, dataPagamento, valor, valorPago FROM sandbox.contaPagar where (dataPagamento = '$hoje') union SELECT id, descricao, dataEmissao, dataVencimento, situacao, dataPagamento, valor, valorPago FROM sandbox.contaReceber where (dataPagamento = '$hoje')");

        }

     $contasPagar = $query;
     return view('fluxoCaixa',[
       'contasPagar' => $contasPagar,
         'filter' => $request->get('filter')
     ]);
    }
}

?>
