<?php

namespace App\Domains\PedidosVendas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Produtos\Produto;
use App\Domains\Fornecedores\Fornecedor;
use App\Domains\Clientes\Cliente;
use App\Domains\Pedidos\Pedidoitem;
use App\Domains\PedidosVendas\PedidosVendas;

class PedidoItemVendaController extends Controller
{
    public function index(Request $request)
    {

    }

    public function create(PedidoVenda $pedidoVenda)
    {
        return $this->form($pedidoVenda, new PedidoItem());

    }

    public function store(PedidoVenda $pedidoVenda, PedidoItemRequest $request)
    {
        if ($request->get('id')){
            return $this->save($pedidoVenda, $request, PedidoItem::find($request->get('id')));
        }

        return $this->save($pedidoVenda, $request, new PedidoItem());
    }

    public function show(PedidoVenda $pedidoVenda)
    {
        return view('pedidosVendas.show', [
          'pedidoVenda' => $pedidoVenda,
          'total' => $pedidoVenda->itens->reduce(function($total, $item){
            return $total+$item->preco;
          })
        ]);
    }

    public function edit(PedidoVenda $pedidoVenda, PedidoItem $pedidoItem)
    {
      return $this->form($pedidoVenda, $pedidoItem);
    }

    public function update(PedidoVendaRequest $request, PedidoVenda $pedidoVenda)
    {
      return $this->save($pedidoVenda, $request);
    }

    public function destroy(PedidoVenda $pedidoVenda)
    {
      $pedidoVenda->delete();

      return redirect()->route('pedidosVendas.index');
    }

    private function form(PedidoVenda $pedidoVenda, PedidoItem $pedidoItem) {

        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();
        $clientes = Cliente::all();

        return view('pedidosVendas.pedidosItens.form', [
          'produtos' => $produtos,
          'pedidoVenda' => $pedidoVenda,
          'pedidoItem' => $pedidoItem,
          'fornecedores' => $fornecedores,
          'clientes' => $clientes
        ]);
    }


    private function save(PedidoVenda $pedidoVenda, PedidoItemRequest $request, PedidoItem $pedidoItem)
    {

      $pedidoItem->idProduto = $request->get('idProduto');
      if($request->get('quantidade') > $pedidoItem->produto->quantidade){
        return redirect()->back()->with('error', 'Quantidade Indisponivel');
      }else{

      $pedidoItem->idProduto = $request->get('idProduto');
      $pedidoItem->quantidade = $request->get('quantidade');
      $pedidoItem->idFornecedor = $request->get('idFornecedor');
      $pedidoItem->tipo_pedido = 'VENDA';
      $pedidoItem->idPedido = $pedidoVenda->id;
      $pedidoItem->preco = $request->get('preco');
      $pedidoItem->valorUnitario = $request->get('valorUnitario');
      $pedidoItem->save();

      return redirect()->route('pedidosVendas.show', ['pedidoVenda' => $pedidoVenda->id])->with('success', 'Item inserido com Sucesso');
      }
    }
    }
