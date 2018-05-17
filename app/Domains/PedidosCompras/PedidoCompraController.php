<?php

namespace App\Domains\PedidosCompras;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Produtos\Produto;
use App\Domains\Fornecedores\Fornecedor;

class PedidoCompraController extends Controller
{
    public function index(Request $request)
    {
      $query = PedidoCompra::query();

        if($request->get('filter')){
            $query->where('nome', 'like', '%' . $request->get('filter') . '%');
        }

        $pedidosCompras = $query->paginate(5);

        return view('pedidosCompras.index', [
          'pedidosCompras' => $pedidosCompras,
          'filter'=> $request->get('filter')
        ]);
    }

    public function create()
    {
        return $this->form(new PedidoCompra());
    }

    public function store(PedidoCompraRequest $request)
    {
        $pedidoCompra = new PedidoCompra;

        return $this->save($pedidoCompra, $request);
    }

    public function show(PedidoCompra $pedidoCompra)
    {
        return view('pedidosCompras.show', [
          'pedidoCompra' => $pedidoCompra
        ]);
    }

    public function edit(PedidoCompra $pedidoCompra)
    {
      return $this->form($pedidoCompra);
    }

    public function update(PedidoCompraRequest $request, PedidoCompra $pedidoCompra)
    {
      return $this->save($pedidoCompra, $request);
    }

    public function destroy(PedidoCompra $pedidoCompra)
    {
      $pedidoCompra->delete();

      return redirect()->route('pedidosCompras.index');
    }

    private function form(PedidoCompra $pedidoCompra) {
        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();

        return view('pedidosCompras.form', [
          'pedidoCompra' => $pedidoCompra,
          'idProdutos' => $produtos,
          'idFornecedor' => $fornecedores
        ]);
    }

    private function save(PedidoCompra $pedidoCompra, PedidoCompraRequest $request)
    {
      $pedidoCompra->nome = $request->get('nome');
      $pedidoCompra->data = $request->get('data');
      $pedidoCompra->situacao = $request->get('situacao');
      $pedidoCompra->idFornecedor = $request->get('idFornecedor');
      $pedidoCompra->idProduto = $request->get('idProduto');
      $pedidoCompra->quantidade = $request->get('quantidade');

      $pedidoCompra->save();

      return redirect()->route('pedidosCompras.show', ['id' => $pedidoCompra->id]);
    }
}
