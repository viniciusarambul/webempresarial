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
    public function index()
    {

      $contasPagar = db::select("SELECT * FROM sandbox.contaPagar where dataPagamento <> '0000-00-00'");


     return view('fluxoCaixa',[
       'contasPagar' => $contasPagar
     ]);
    }
}

?>
