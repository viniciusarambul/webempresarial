<?php

namespace App\Domains\PedidosCompras;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Produtos\Produto;
use App\Domains\Fornecedores\Fornecedor;
use App\Domains\Pedidos\Pedidotitulo;
use App\Domains\PedidosCompras\PedidosCompras;
use App\Domains\ContasPagar\ContaPagar;


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

  private function form(PedidoCompra $pedidoCompra, PedidoTitulo $pedidoTitulo)
  {

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
    $pedidoTitulo->tipo_pedido = 'COMPRA';
    $pedidoTitulo->preco = $request->get('preco');
    $pedidoTitulo->tipoPagamento = $request->get('tipoPagamento');
    $pedidoTitulo->parcelas = $request->get('parcelas');

    $pedidoTitulo->save();

    if($pedidoTitulo->wasRecentlyCreated)
    {
      $parcelas = $pedidoTitulo->parcelas ? $pedidoTitulo->parcelas : 1;
      $valores = $this->getValores($parcelas, $pedidoTitulo->preco);

      foreach ($valores as $key => $valor) {
        $conta = new ContaPagar;
        $conta->idPedidoCompra = $pedidoCompra->id;
        $conta->descricao = 'Pedido Compra ' . $pedidoCompra->id .' '. $key .' / ' . $pedidoTitulo->parcelas;
        $conta->dataEmissao = $pedidoTitulo->dataEmissao;
        $conta->dataVencimento = date('Y-m-d', strtotime('+' . 30 * $key . 'days'));
        $conta->situacao = $pedidoCompra->situacao;
        $conta->idFornecedor = $pedidoCompra->idFornecedor;
        $conta->tipoPagamento = $pedidoTitulo->tipoPagamento;
        $conta->parcelas = $pedidoTitulo->parcelas;
        $conta->valor = $valor;

        $conta->save();
      }
    }

    return redirect()->route('pedidosCompras.show', ['pedidoCompra' => $pedidoCompra->id])->with('success', 'Titulo inserido com Sucesso');
  }

  private function getValores($numeroParcelas, $valorTotal)
  {
    $valores = [];
    $sobra = $valorTotal;

    for ($i=1; $i <= $numeroParcelas; $i++) {
      $divisao = round($valorTotal / $numeroParcelas, 2);
      $valores[$i] = $divisao;
      $sobra -= $divisao;
    }

    if($sobra > 0)
    {
      $valores[$numeroParcelas] += $sobra;
    }

    return $valores;
  }
}
