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
      $pedidocomprabar = db::select('SELECT YEAR(pc.data) as ano, MONTH(pc.data) as mes, count(pc.data) as contador
      FROM pedidoitens pi left join pedidocompra pc on pc.id = pi.idPedido group by YEAR(pc.data), MONTH(pc.data)');

      $pedidovendabar = db::select('SELECT YEAR(pc.data) as ano, MONTH(pc.data) as mes, count(pc.data) as contador
      FROM pedidoitens pi left join pedidovenda pc on pc.id = pi.idPedido group by YEAR(pc.data), MONTH(pc.data)');

      $clientesmes = db::select('SELECT YEAR(created_at) as ano, MONTH(created_at) as mes, count(created_at) as contador
      FROM clientes group by YEAR(created_at), MONTH(created_at)');

      $fornecedoresmes = db::select('SELECT YEAR(created_at) as ano, MONTH(created_at) as mes, count(created_at) as contador
      FROM fornecedores group by YEAR(created_at), MONTH(created_at)');

      $produtosmes = db::select('SELECT YEAR(created_at) as ano, MONTH(created_at) as mes, count(created_at) as contador
      FROM produtos group by YEAR(created_at), MONTH(created_at)');

      $categoriasmes = db::select('SELECT YEAR(created_at) as ano, MONTH(created_at) as mes, count(created_at) as contador
      FROM categorias group by YEAR(created_at), MONTH(created_at)');


     return view('dashboard',[
       'pedidocomprabar' => $pedidocomprabar,
       'pedidovendabar' => $pedidovendabar,
       'clientesmes' => $clientesmes,
       'fornecedoresmes' => $fornecedoresmes,
       'produtosmes' => $produtosmes,
       'categoriasmes' => $categoriasmes
     ]);
    }
}

?>
