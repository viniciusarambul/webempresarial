<?php

namespace App\Domains\PedidosVendas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Produtos\Produto;
use App\Domains\Clientes\Cliente;
use App\Domains\Pedidos\Pedidoitem;
use App\Domains\Vendedores\Vendedor;
use Illuminate\Support\Facades\DB;
use App\Domains\Pedidos\Pedidotitulo;


class PedidoVendaController extends Controller
{
    public function index(Request $request)
    {
      $query = PedidoVenda::query();

        if($request->get('filter')){
            $query->where('nome', 'like', '%' . $request->get('filter') . '%');
        }

        $pedidosVendas = $query->paginate(5);
        $clientes = Cliente::all();
        return view('pedidosVendas.index', [
          'pedidosVendas' => $pedidosVendas,
          'clientes' => $clientes,
          'filter'=> $request->get('filter')
        ]);
    }

    public function create()
    {
        return $this->form(new PedidoVenda());
    }

    public function store(PedidoVendaRequest $request)
    {
      if ($request->get('id')) {
            return $this->save(PedidoVenda::find($request->get('id')), $request);
        }
        return $this->save(new PedidoVenda(), $request);

    }

    public function show(PedidoVenda $pedidoVenda,PedidoItem $pedidoItem, PedidoTitulo $pedidoTitulo)
    {

      $produtos = Produto::all();

      return view('pedidosVendas.show', [
        'pedidoVenda' => $pedidoVenda,
        'pedidoTitulo' => $pedidoTitulo,
        'pedidoItem' => $pedidoItem,
        'produtos' => $produtos,
        'total' => $pedidoVenda->itens->reduce(function($total, $item){
          return $total+$item->preco;
        })
      ]);
    }

    public function edit(PedidoVenda $pedidoVenda)
    {
      return $this->form($pedidoVenda);
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

    private function form(PedidoVenda $pedidoVenda) {
        $produtos = Produto::all();
        $clientes = Cliente::all();
        $vendedores = Vendedor::all();

        return view('pedidosVendas.form', [
          'pedidoVenda' => $pedidoVenda,
          'produtos' => $produtos,
          'clientes' => $clientes,
          'vendedores' => $vendedores
        ]);
    }

    private function save(PedidoVenda $pedidoVenda, PedidoVendaRequest $request)
    {
      $pedidoVenda->nome = $request->get('nome');
      $pedidoVenda->data = $request->get('data');
      $pedidoVenda->idVendedor = $request->get('idVendedor');
      $pedidoVenda->situacao = $request->get('situacao');
      $pedidoVenda->idCliente = $request->get('idCliente');

      if($pedidoVenda->situacao == 1){
        $pedidoVenda->itens->each(function($item){
          $produto = $item->produto;
          $produto->quantidade -= $item->quantidade;
          $produto->save();
        });
      }

      if($pedidoVenda->situacao == 2){
        $pedidoVenda->itens->each(function($item){
          $produto = $item->produto;
          $produto->quantidade += $item->quantidade;
          $produto->save();
        });
      }

      $pedidoVenda->save();

      return redirect()->route('pedidosVendas.show', ['id' => $pedidoVenda->id]);
    }

    public function consulta(Request $request){
      $pedidosVendas = PedidoVenda::all();
      return view('pedidosVendas.consulta', [
        'pedidosVendas' => $pedidosVendas

      ]);

    }

    public function faturar(PedidoVenda $pedidoVenda){


      $pedidoVenda->situacao = 1;
      $pedidoVenda->save();
      return redirect()->route('pedidosVendas.index');
    }

    public function Baixar(Request $request)
    {
        $datainicial = $request->get('data_incial');
        $datafinal = $request->get('data_final');
        if($datainicial <> ''){
          $inicio = $datafinal;
          $fim = $datafinal;
        $pedidosVendas = db::select("SELECT pv.*, c.nome as clientenome, v.nome as vendedornome from tcc.pedidovenda pv left join clientes c on c.id = pv.idCliente left join vendedors v on v.id=pv.idVendedor where data >= '$datainicial' and data <= '$datafinal'");
      }else{
        $inicio = '';
        $fim ='';
        $pedidosVendas = db::select("SELECT pv.*, c.nome as clientenome, v.nome as vendedornome from tcc.pedidovenda pv left join clientes c on c.id = pv.idCliente left join vendedors v on v.id=pv.idVendedor ");
      }

        $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pedidosVendas.relatorio', ['pedidosVendas' => $pedidosVendas, 'inicio' => $inicio, 'fim' => $fim]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
}
