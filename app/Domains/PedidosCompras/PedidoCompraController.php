<?php

namespace App\Domains\PedidosCompras;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Produtos\Produto;
use App\Domains\Pedidos\Pedidoitem;
use App\Domains\Fornecedores\Fornecedor;
use Illuminate\Support\Facades\DB;


class PedidoCompraController extends Controller
{
    public function index(Request $request)
    {
      $query = PedidoCompra::query();

        if($request->get('filter')){
            $query->where('nome', 'like', '%' . $request->get('filter') . '%');
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

    public function show(PedidoCompra $pedidoCompra)
    {
        return view('pedidosCompras.show', [
          'pedidoCompra' => $pedidoCompra,
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


    public function consulta(Request $request){
      $pedidosCompras = PedidoCompra::all();
      return view('pedidosCompras.consulta', [
        'pedidosCompras' => $pedidosCompras

      ]);

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
