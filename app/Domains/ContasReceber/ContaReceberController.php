<?php

namespace App\Domains\ContasReceber;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Clientes\Cliente;
use App\Domains\Produtos\Produto;
use Illuminate\Support\Facades\DB;


class ContaReceberController extends Controller
{
    public function index(Request $request)
    {
      $query = ContaReceber::query();

        if($request->get('filter')){
            $query->where('nome', 'like', '%' . $request->get('filter') . '%');
        }

        $contasReceber = $query->paginate(5);

        return view('contasReceber.index', [
          'contasReceber' => $contasReceber,
          'filter'=> $request->get('filter')
        ]);
    }

    public function create()
    {
        return $this->form(new ContaReceber());
    }

    public function store(ContaReceberRequest $request)
    {
      if ($request->get('id')) {
            return $this->save(ContaReceber::find($request->get('id')), $request);
        }
        return $this->save(new ContaReceber(), $request);
    }

    public function show(ContaReceber $contaReceber)
    {
        return view('contasReceber.show', [
          'contaReceber' => $contaReceber
        ]);
    }

    public function edit(ContaReceber $contaReceber)
    {
      return $this->form($contaReceber);
    }

    public function update(ContaReceberRequest $request, ContaReceber $contaReceber)
    {
      return $this->save($contaReceber, $request);
    }

    public function destroy(ContaReceber $contaReceber)
    {
      $contaReceber->delete();

      return redirect()->route('contasReceber.index');
    }

    private function form(ContaReceber $contaReceber) {
        $produtos = Produto::all();
        $clientes = Cliente::all();

        return view('contasReceber.form', [
          'contaReceber' => $contaReceber,
          'clientes' => $clientes,
          'produtos' => $produtos
        ]);
    }


    public function baixa(ContaReceber $contaReceber)
    {

      return view('contasReceber.baixa', [
        'contaReceber' => $contaReceber,
      ]);
    }



    private function save(ContaReceber $contaReceber, ContaReceberRequest $request)
    {
      if($request->get('baixa') == null){
      $contaReceber->situacao = $request->get('situacao');
      $contaReceber->valorPago = $request->get('valorPago');
      $contaReceber->dataPagamento = $request->get('dataPagamento');

      $contaReceber->save();
    }else{
      $contaReceber->descricao = $request->get('descricao');
      $contaReceber->dataEmissao = $request->get('dataEmissao');
      $contaReceber->dataVencimento = $request->get('dataVencimento');
      $contaReceber->situacao = $request->get('situacao');
      $contaReceber->idCliente = $request->get('idCliente');
      $contaReceber->idProduto = $request->get('idProduto');
      $contaReceber->quantidade = $request->get('quantidade');
      $contaReceber->parcelas = $request->get('parcelas');
      $contaReceber->tipoPagamento = $request->get('tipoPagamento');
      $contaReceber->valor = $request->get('valor');


      $contaReceber->save();
    }
      if($contaReceber->wasRecentlyCreated){
        $parcelas = $contaReceber->parcelas ? $contaReceber->parcelas : 1;
        for ($x = 0; $x<$parcelas; $x++){
          $conta = new ContaReceber;
          $conta->descricao = $contaReceber->id . '/' . $contaReceber->parcela;
          $conta->dataEmissao = $contaReceber->dataEmissao;
          $conta->dataVencimento = date('Y-m-d', strtotime('+' . 30 * $x . 'days'));
          $conta->situacao = $contaReceber->situacao;
          $conta->valor = round($contaReceber->valor/$contaReceber->parcelas, 2);

          $conta->save();
        }
      }

      return redirect()->route('contasReceber.show', ['id' => $contaReceber->id]);
    }

    public function consulta(Request $request){
      $contasReceber = ContaReceber::all();
      return view('contasReceber.consulta', [
        'contasReceber' => $contasReceber

      ]);

    }
    public function Baixar(Request $request)
    {
        $datainicial = $request->get('data_incial');
        $datafinal = $request->get('data_final');
        // $situacao = $request->get('situacao');
        if($datainicial <> ''){
          $inicio = $datafinal;
          $fim = $datafinal;
          // $situacao = $situacao;
        $contasReceber = db::select("SELECT cp.*, pc.nome as pedidovendanome, pc.data as datapedido, f.nome as clientenome  from tcc.contareceber cp left join pedidovenda pc on pc.id = cp.idPedidoVenda left join clientes f on f.id = pc.idCliente where cp.dataVencimento >= '$datainicial' and cp.dataVencimento <= '$datafinal'  ");
      }else{
        $inicio = '';
        $fim ='';
        // $situacao = $situacao;
        $contasReceber = db::select("SELECT cp.*, pc.nome as pedidovendanome, pc.data as datapedido, f.nome as clientenome  from tcc.contareceber cp left join pedidovenda pc on pc.id = cp.idPedidoVenda left join clientes f on f.id = pc.idCliente");
      }

        $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('contasReceber.relatorio', ['contasReceber' => $contasReceber, 'inicio' => $inicio, 'fim' => $fim]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }


}
