<?php

namespace App\Domains;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Core\Util\Permission;
use App\Domains\PedidosCompras\PedidoCompra;
use App\Domains\Produtos\Produto;
use App\Domains\Categorias\Categoria;
use Illuminate\Support\Facades\DB;


class EstoqueController extends Controller
{
    public function index()
    {
      $query = Produto::query();

        $produtos = $query->paginate(125);
        $categorias = Categoria::all();
        return view('estoque', [
          'produtos' => $produtos,
          'categorias' => $categorias
        ]);


    }
}

?>
