<?php

namespace App\Domains\PedidosCompras;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Produtos\Produto;
use App\Domains\Fornecedores\Fornecedor;
use App\Domains\PedidosCompras\PedidosCompras;

use App\Domains\Pedidos\Pedidoitem;

class PedidoItemCompraController extends Controller
{
    public function index(Request $request)
    {

    }

    public function create(PedidoCompra $pedidoCompra)
    {
        return $this->form($pedidoCompra, new PedidoItem());

    }

    public function store(PedidoCompra $pedidoCompra, PedidoItemRequest $request)
    {
        if ($request->get('id')){
            return $this->save($pedidoCompra, $request, PedidoItem::find($request->get('id')));
        }

        return $this->save($pedidoCompra, $request, new PedidoItem());
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

    public function edit(PedidoCompra $pedidoCompra, PedidoItem $pedidoItem)
    {
      return $this->form($pedidoCompra, $pedidoItem);
    }

    public function update(PedidoCompraRequest $request, PedidoCompra $pedidoCompra)
    {
      return $this->save($pedidoCompra, $request);
    }

    public function destroy(PedidoCompra $pedidoCompra, PedidoItem $pedidoItem)
    {
      $pedidoItem->delete();

      return redirect()->route('pedidosCompras.show');
    }

    private function form(PedidoCompra $pedidoCompra, PedidoItem $pedidoItem) {

        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();

        return view('pedidosCompras.pedidosItens.form', [
          'produtos' => $produtos,
          'pedidoCompra' => $pedidoCompra,
          'pedidoItem' => $pedidoItem,
          'fornecedores' => $fornecedores
        ]);
    }

    private function save(PedidoCompra $pedidoCompra, PedidoItemRequest $request, PedidoItem $pedidoItem)
    {

      $pedidoItem->idProduto = $request->get('idProduto');
      $pedidoItem->quantidade = $request->get('quantidade');
      $pedidoItem->tipo_pedido = 'COMPRA';
      $pedidoItem->idPedido = $pedidoCompra->id;
      $pedidoItem->preco = $request->get('preco');
      $pedidoItem->valorUnitario = $request->get('valorUnitario');
      $pedidoItem->save();


      return redirect()->route('pedidosCompras.show', ['pedidoCompra' => $pedidoCompra->id])->with('success', 'Item inserido com Sucesso');
    }
}
