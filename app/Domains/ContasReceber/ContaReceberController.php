<?php

namespace App\Domains\ContasReceber;
use App\Domains\ContasPagar\ContaPagar;
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

        if($request->get('situacao_enum') !== null){
            $query->where('situacao', $request->get('situacao_enum'));

        }

        if($request->get('filter')){
            $query->where('id', 'like', '%' . $request->get('filter') . '%');
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

    public function cancel(ContaReceber $contaReceber, Request $request){


      $contaReceber->situacao = 0;
      $contaReceber->valorPago = 0;
      $contaReceber->dataPagamento = '0000-00-00';
      $contaReceber->save();
      $query = ContaReceber::query();

        if($request->get('filter')){
            $query->where('nome', 'like', '%' . $request->get('filter') . '%');
        }

        $contasReceber = $query->paginate(5);
      return view('contasReceber.index',[
        'contasReceber' => $contasReceber,
        'filter' => $request->get('filter')
      ]);
    }



    private function save(ContaReceber $contaReceber, ContaReceberRequest $request)
    {

      if($request->get('baixa') == 1){
      $contaReceber->situacao = 1;
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

        if($request->get('baixa') == 1) {
            if ($contaReceber->valorPago < $contaReceber->valor) {

                $contanova = new ContaReceber;
                $contanova->descricao = 'Parcial Conta Receber id ' . $contaReceber->id;
                $contanova->dataEmissao = date('Y-m-d');
                $contanova->dataVencimento = date('Y-m-d', strtotime('+' . 30 . 'days'));
                $contanova->situacao = 0;
                $contanova->idVendedor = $contaReceber->idVendedor;
                $contanova->idProduto = $contaReceber->idCliente;
                $contanova->quantidade = $contaReceber->quantidade;
                $contanova->parcelas = '1';
                $contanova->tipoPagamento = $contaReceber->tipoPagamento;
                $contanova->valor = ($contaReceber->valor - $contaReceber->valorPago);

                $contanova->save();
            }
        }


      if($contaReceber->wasRecentlyCreated){

          $parcelas = $contaReceber->parcelas ? $contaReceber->parcelas : 1;
          $valores = $this->getValores($parcelas, $contaReceber->valor);

          foreach ($valores as $key => $valor) {
              $conta = new ContaReceber;
              $conta->descricao = $contaReceber->id .' '. $contaReceber->descricao . ' '. $key .'/' . $contaReceber->parcelas;
              $conta->dataEmissao = $contaReceber->dataEmissao;
              $conta->dataVencimento = date('Y-m-d', strtotime('+' . 30 * $key . 'days'));
              $conta->situacao = $contaReceber->situacao;
              $conta->idFornecedor = $contaReceber->idFornecedor;
              $conta->valor = $valor;

              $conta->save();
          }
      }

      return redirect()->route('contasReceber.index');
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

    public function consulta(Request $request){
      $contasReceber = ContaReceber::all();
      $clientes = CLiente::all();
      return view('contasReceber.consulta', [
        'contasReceber' => $contasReceber,
        'clientes' => $clientes

      ]);

    }


    public function imprimir(ContaReceber $contaReceber){

        $conta = db::select("SELECT * FROM sandbox.contaPagar where id = '$contaReceber->id' ");


        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('contasReceber.imprimir', [ 'contaReceber' => $contaReceber, 'conta' => $conta]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
    public function Baixar(Request $request)
    {
        $datainicial = $request->get('data_incial');
        $datafinal = $request->get('data_final');
        $situacao = $request->get('situacao');
        $cliente = $request->get('cliente');
        $pagamento = $request->get('pagamento');
        if($datainicial <> ''){
          $inicio = $datafinal;
          $fim = $datafinal;
          if($situacao <> ''){
            $situacao = "AND cp.situacao = '$situacao'";
          }else{
              $situacao = '';
          }
          if($cliente <> ''){
            $cliente = "AND cp.idCliente = '$cliente'";
          }else{
            $cliente = '';
          }
          if($pagamento <> ''){
            $pagamento = "AND cp.tipoPagamento = '$pagamento'";
          }else{
            $pagamento = '';
          }

        $contasReceber = db::select("SELECT cp.*, pc.nome as pedidovendanome, pc.data as datapedido, f.nome as clientenome  from sandbox.contaReceber cp left join pedidovenda pc on pc.id = cp.idPedidoVenda left join clientes f on f.id = pc.idCliente where
          cp.dataVencimento >= '$datainicial' and cp.dataVencimento <= '$datafinal' $situacao  $cliente $pagamento ");

      }else{
        $inicio = '';
        $fim ='';
        if($situacao <> ''){
          $situacao = "AND cp.situacao = '$situacao'";
        }else{
            $situacao = '';
        }
        if($cliente <> ''){
          $cliente = "AND cp.idCliente = '$cliente'";
        }else{
          $cliente = '';
        }
        if($pagamento <> ''){
          $pagamento = "AND cp.tipoPagamento = '$pagamento'";
        }else{
          $pagamento = '';
        }
            $contasReceber = db::select("SELECT cp.*, pc.nome as pedidovendanome, pc.data as datapedido, f.nome as clientenome  from sandbox.contaReceber cp left join pedidovenda pc on pc.id = cp.idPedidoVenda left join clientes f on f.id = pc.idCliente where pc.id > 0 $situacao  $cliente $pagamento");

    }

      //  $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('contasReceber.relatorio', ['contasReceber' => $contasReceber, 'inicio' => $inicio, 'fim' => $fim]);
        //$pdf->setPaper('A4', 'landscape');
        //return $pdf->stream();


        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('contasReceber.relatorio', ['contasReceber' => $contasReceber, 'inicio' => $inicio, 'fim' => $fim]);
        return $pdf->stream();
    }


}
