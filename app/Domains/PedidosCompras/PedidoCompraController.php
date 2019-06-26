<?php

namespace App\Domains\PedidosCompras;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Produtos\Produto;
use App\Domains\Categorias\Categoria;
use App\Domains\Pedidos\Pedidoitem;
use App\Domains\Pedidos\Pedidotitulo;
use App\Domains\ContasPagar\ContaPagar;
use App\Domains\Fornecedores\Fornecedor;
use Illuminate\Support\Facades\DB;


class PedidoCompraController extends Controller
{
    public function index(Request $request)
    {
      $query = PedidoCompra::query();


        if($request->get('situacao_enum') !== null){
        $query->where('situacao', $request->get('situacao_enum'));
        }

        if($request->get('filter')){
            $query->where('id', 'like', '%' . $request->get('filter') . '%');
        }



        $pedidosCompras = $query->paginate(5);

        $fornecedores = Fornecedor::all();
        return view('pedidosCompras.index', [
          'fornecedores' => $fornecedores,
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
      if ($request->get('id')) {
            return $this->save(PedidoCompra::find($request->get('id')), $request);
        }
        return $this->save(new PedidoCompra(), $request);
    }

    public function show(PedidoCompra $pedidoCompra,PedidoItem $pedidoItem, PedidoTitulo $pedidoTitulo)
    {

        $produtoscadastro = Produto::all();
        $produtos = Produto::all();
        $categorias = Categoria::all();
        $fornecedores = Fornecedor::all();

        $pedidosCompraConta = db::select("SELECT * FROM sandbox.contaPagar where idPedidoCompra = '$pedidoCompra->id' ");

        return view('pedidosCompras.show', [
          'pedidoCompra' => $pedidoCompra,
          'pedidoTitulo' => $pedidoTitulo,
          'pedidoItem' => $pedidoItem,
          'categorias' => $categorias,
          'fornecedores' => $fornecedores,
          'pedidosCompraConta' => $pedidosCompraConta,
          'produtos' => $produtos,
          'produtoscadastro' => $produtoscadastro,
          'total' => $pedidoCompra->itens->reduce(function($total, $item){
            return $total+$item->preco;
          })
        ]);
    }



    public function baixa(PedidoCompra $pedidoCompra)
    {
      return view('pedidosCompras.baixa', [
        'pedidoCompra' => $pedidoCompra,

      ]);
    }

    public function observacao(PedidoCompra $pedidoCompra, PedidoCompraRequest $request )
    {
        dd($pedidoCompra);
        $pedidoCompra->nome = $request->get('nome');
        $pedidoCompra->save();
      return redirect()->route('pedidosCompras.show', ['id' => $pedidoCompra->id]);
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
          'produtos' => $produtos,
          'fornecedores' => $fornecedores
        ]);
    }

    public function criarProduto(PedidoCompra $pedidoCompra, Request $request, PedidoItem $pedidoItem){

        $novoProduto = new Produto;
        $novoProduto->nome = $request->get('produtoNovoNome');
        $novoProduto->categoria = $request->get('produtoNovoCategoria');
        $novoProduto->valorUnitario = $request->get('produtoNovoValorUnitario');
        $novoProduto->valorSugerido = $request->get('produtoNovoValorSugerido');
        $novoProduto->fornecedor = $request->get('produtoNovoFornecedor');

        $novoProduto->save();

        $pedidoItem->idProduto = $novoProduto->id;
        $pedidoItem->quantidade = $request->get('produtoNovoQuantidade');
        $pedidoItem->tipo_pedido = 'COMPRA';
        $pedidoItem->idPedido = $pedidoCompra->id;
        $pedidoItem->preco = $request->get('produtoNovoPreco');
        $pedidoItem->valorUnitario = $novoProduto->valorUnitario;
        $pedidoItem->save();


        return redirect()->route('pedidosCompras.show', ['id' => $pedidoCompra->id]);

    }

    //private function criarProduto(Produto $produtoscadastro, PedidoCompra $pedidoCompra)
    //{
    //  $produtoscadastro->nome = $request->get('nome');
    //  $produtoscadastro->valorUnitario = $request->get('valorUnitario');
  //    $produtoscadastro->valorSugerido = $request->get('valorSugerido');
    //  $produtoscadastro->quantidade = $request->get('quantidade');
    //  $produtoscadastro->fornecedor = $request->get('fornecedor');
    //  $produtoscadastro->categoria = $request->get('categoria');
//
    //  $produtoscadastro->save();

    //  return redirect()->route('pedidosCompras.show', ['id' => $pedidoCompra->id])->with('success', 'Produto inserido com sucesso');
  //  }

    private function save(PedidoCompra $pedidoCompra, PedidoCompraRequest $request)
    {
      $pedidoCompra->nome = $request->get('nome');
      $pedidoCompra->data = $request->get('data');
      $pedidoCompra->situacao = $request->get('situacao');
      $pedidoCompra->valorPago = $request->get('valorPago');
      $pedidoCompra->idFornecedor = $request->get('idFornecedor');

      if($pedidoCompra->situacao == 1){
        $pedidoCompra->itens->each(function($item){
          $produto = $item->produto;
          $produto->quantidade += $item->quantidade;
          $produto->save();
        });
      }

      if($pedidoCompra->situacao == 2){
        $pedidoCompra->itens->each(function($item){

          $produto = $item->produto;
          $produto->quantidade -= $item->quantidade;
          if($produto->quantidade < 0){
            $produto->quantidade = 0;
          }
          $produto->save();
        });
      }



      $pedidoCompra->save();

      return redirect()->route('pedidosCompras.show', ['id' => $pedidoCompra->id]);
    }

    public function faturar(PedidoCompra $pedidoCompra){


      $pedidoCompra->situacao = 1;
      $pedidoCompra->save();


        $pedidoCompra->itens->each(function($item){
          $produto = $item->produto;
          $produto->quantidade += $item->quantidade;
          $produto->save();
        });

      return redirect()->route('pedidosCompras.index');
    }

    public function cancelar(PedidoCompra $pedidoCompra){


      $pedidoCompra->situacao = 2;
      $pedidoCompra->save();


        $pedidoCompra->itens->each(function($item){
          $produto = $item->produto;
          $produto->quantidade -= $item->quantidade;
          $produto->save();
        });

      return redirect()->route('pedidosCompras.index');
    }

    public function consulta(Request $request){
      $pedidosCompras = PedidoCompra::all();
      return view('pedidosCompras.consulta', [
        'pedidosCompras' => $pedidosCompras

      ]);

    }

    public function imprimir(PedidoCompra $pedidoCompra){

        $pedidosCompraConta = db::select("SELECT * FROM sandbox.contaPagar where idPedidoCompra = '$pedidoCompra->id' ");

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('pedidosCompras.imprimir', ['pedidoCompra' => $pedidoCompra, 'pedidosCompraConta' => $pedidosCompraConta]);
        return $pdf->stream();
    }

    public function Baixar(Request $request)
    {
        $datainicial = $request->get('data_incial');
        $datafinal = $request->get('data_final');
        if($datainicial <> ''){
          $inicio = $datafinal;
          $fim = $datafinal;
        $pedidosCompras = db::select("SELECT pv.*, f.nome as nomeFornecedor from tcc.pedidocompra pv left join fornecedores f on f.id = pv.idFornecedor where data >= '$datainicial' and data <= '$datafinal'");
      }else{
        $inicio = '';
        $fim ='';
        $pedidosCompras = db::select("SELECT  pv.*, f.nome as nomeFornecedor from tcc.pedidocompra pv left join fornecedores f on f.id = pv.idFornecedor");
      }

        $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pedidosCompras.relatorio', ['pedidosCompras' => $pedidosCompras, 'inicio' => $inicio, 'fim' => $fim]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

}
