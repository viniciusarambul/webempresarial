<?php

namespace App\Domains\PedidosCompras;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Produtos\Produto;
use App\Domains\Fornecedores\Fornecedor;
use App\Domains\Pedidos\Pedidotitulo;
use App\Domains\PedidosCompras\PedidosCompras;

class PedidoTituloCompraController extends Controller
{
    public function index(Request $request)
    {

    }

    public function create(PedidoCompra $pedidoCompra)
    {
        return $this->form($pedidoCompra, new PedidoTitulo());

    }

    public function store(PedidoCompra $pedidoCompra, PedidoTituloRequest $request)
    {
        if ($request->get('id')){
            return $this->save($pedidoCompra, $request, PedidoTitulo::find($request->get('id')));
        }

        return $this->save($pedidoCompra, $request, new PedidoTitulo());
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

    public function edit(PedidoCompra $pedidoCompra, PedidoTitulo $pedidoTitulo)
    {
      return $this->form($pedidoCompra, $pedidoTitulo);
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

    private function form(PedidoCompra $pedidoCompra, PedidoTitulo $pedidoTitulo) {

        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();

        return view('pedidosCompras.pedidosTitulos.form', [
          'produtos' => $produtos,
          'pedidoCompra' => $pedidoCompra,
          'pedidoTitulo' => $pedidoTitulo,
          'fornecedores' => $fornecedores
        ]);
    }

    private function save(PedidoCompra $pedidoCompra, PedidoTituloRequest $request, PedidoTitulo $pedidoTitulo)
    {

      $pedidoTitulo->dataEmissao = $request->get('dataEmissao');
      $pedidoTitulo->dataVencimento = $request->get('dataVencimento');
      $pedidoTitulo->situacao = $request->get('situacao');
      $pedidoTitulo->idPedido = $pedidoCompra->id;
      $pedidoTitulo->preco = $request->get('preco');
      $pedidoTitulo->tipoPagamento = $request->get('tipoPagamento');
      $pedidoTitulo->parcelas = $request->get('parcelas');

      $pedidoTitulo->save();

      return redirect()->route('pedidosCompras.show', ['pedidoCompra' => $pedidoCompra->id])->with('success', 'Titulo inserido com Sucesso');
    }
}
