<?php

namespace App\Domains\PedidosCompras;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Produtos\Produto;
use App\Domains\Fornecedores\Fornecedor;

class PedidoItemCompraController extends Controller
{
    public function index(Request $request)
    {

    }

    public function create()
    {
        return $this->form(new PedidoItem());
    }

    public function store(PedidoItemRequest $request)
    {
        $pedidoItem = new PedidoItem;

        return $this->save($pedidoItem, $request);
    }

    public function show(PedidoCompra $pedidoCompra)
    {
        return view('pedidosCompras.show', [
          'pedidoCompra' => $pedidoCompra,
          'total' => $pedidoCompra->itens->reduce(function($total, $item){
            return $total+$item->preco;
          })
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

    private function form(PedidoItem $pedidoItem) {
        $produtos = Produto::all();

        return view('pedidosCompras.form', [
          'pedidoCompra' => $pedidoCompra,
          'produtos' => $produtos,
          'fornecedores' => $fornecedores
        ]);
    }

    private function save(PedidoCompra $pedidoCompra, PedidoCompraRequest $request)
    {
      $pedidoCompra->nome = $request->get('nome');
      $pedidoCompra->data = $request->get('data');
      $pedidoCompra->situacao = $request->get('situacao');

      $pedidoCompra->save();

      return redirect()->route('pedidosCompras.show', ['id' => $pedidoCompra->id]);
    }
}
