<?php

namespace App\Domains\PedidosVendas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Produtos\Produto;
use App\Domains\Fornecedores\Fornecedor;
use App\Domains\Pedidos\Pedidotitulo;
use App\Domains\PedidosVendas\PedidosVendas;

class PedidoTituloVendaController extends Controller
{
    public function index(Request $request)
    {

    }

    public function create(PedidoVenda $pedidoVenda)
    {
        return $this->form($pedidoVenda, new PedidoTitulo());

    }

    public function store(PedidoVenda $pedidoVenda, PedidoTituloRequest $request)
    {
        if ($request->get('id')){
            return $this->save($pedidoVenda, $request, PedidoTitulo::find($request->get('id')));
        }

        return $this->save($pedidoVenda, $request, new PedidoTitulo());
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

    public function edit(PedidoVenda $pedidoVenda, PedidoTitulo $pedidoTitulo)
    {
      return $this->form($pedidoVenda, $pedidoTitulo);
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

    private function form(PedidoVenda $pedidoVenda, PedidoTitulo $pedidoTitulo) {

        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();

        return view('pedidosVendas.pedidosTitulos.form', [
          'produtos' => $produtos,
          'pedidoVenda' => $pedidoVenda,
          'pedidoTitulo' => $pedidoTitulo,
          'fornecedores' => $fornecedores
        ]);
    }

    private function save(PedidoVenda $pedidoVenda, PedidoTituloRequest $request, PedidoTitulo $pedidoTitulo)
    {

      $pedidoTitulo->dataEmissao = $request->get('dataEmissao');
      $pedidoTitulo->dataVencimento = $request->get('dataVencimento');
      $pedidoTitulo->situacao = $request->get('situacao');
      $pedidoTitulo->idPedido = $pedidoVenda->id;
      $pedidoTitulo->preco = $request->get('preco');
      $pedidoTitulo->tipoPagamento = $request->get('tipoPagamento');
      $pedidoTitulo->parcelas = $request->get('parcelas');

      $pedidoTitulo->save();

      return redirect()->route('pedidosVendas.show', ['pedidoVenda' => $pedidoVenda->id])->with('success', 'Titulo inserido com Sucesso');
    }
}