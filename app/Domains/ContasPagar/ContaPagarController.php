<?php

namespace App\Domains\ContasPagar;
use App\Domains\PedidosVendas\PedidoVenda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Fornecedores\Fornecedor;
use App\Domains\Produtos\Produto;
use Illuminate\Support\Facades\DB;

class ContaPagarController extends Controller
{
    public function index(Request $request)
    {
      $query = ContaPagar::query();

        if($request->get('situacao_enum') !== null){
            $query->where('situacao', $request->get('situacao_enum'));

        }

        if($request->get('filter')){
            $query->where('id', 'like', '%' . $request->get('filter') . '%')
            ->orWhere('descricao', 'like', '%'.$request->get('filter').'%');
        }
        $contasPagar = $query->paginate(10);

        return view('contasPagar.index', [
          'contasPagar' => $contasPagar,
          'filter'=> $request->get('filter')
        ]);
    }

    public function create()
    {
        return $this->form(new ContaPagar());
    }

    public function store(ContaPagarRequest $request)
    {
      if ($request->get('id')) {
            return $this->save(ContaPagar::find($request->get('id')), $request);
        }
        return $this->save(new ContaPagar(), $request);
    }

    public function show(ContaPagar $contaPagar)
    {
        return view('contasPagar.show', [
          'contaPagar' => $contaPagar
        ]);
    }

    public function edit(ContaPagar $contaPagar)
    {
      return $this->form($contaPagar);
    }

    public function update(ContaPagarRequest $request, ContaPagar $contaPagar)
    {
      return $this->save($contaPagar, $request);
    }

    public function destroy(ContaPagar $contaPagar)
    {
      $contaPagar->delete();

      return redirect()->route('contasPagar.index');
    }

    private function form(ContaPagar $contaPagar) {
        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();

        return view('contasPagar.form', [
          'contaPagar' => $contaPagar,
          'fornecedores' => $fornecedores,
          'produtos' => $produtos
        ]);
    }

    public function baixa(ContaPagar $contaPagar)
    {

      return view('contasPagar.baixa', [
        'contaPagar' => $contaPagar,
      ]);
    }

    public function cancel(ContaPagar $contaPagar, Request $request){


      $contaPagar->situacao = 0;
      $contaPagar->valorPago = 0;
      $contaPagar->dataPagamento = '0000-00-00';
      $contaPagar->save();
      $query = ContaPagar::query();

        if($request->get('filter')){
            $query->where('nome', 'like', '%' . $request->get('filter') . '%');
        }

        $contasPagar = $query->paginate(5);
      return view('contasPagar.index',[
        'contasPagar' => $contasPagar,
        'filter' => $request->get('filter')
      ]);
    }



    private function save(ContaPagar $contaPagar, ContaPagarRequest $request)
    {


      if($request->get('baixa') == 1){
      $contaPagar->situacao = 1;
      $contaPagar->valorPago = $request->get('valorPago');
      $contaPagar->dataPagamento = $request->get('dataPagamento');

      $contaPagar->save();
          return redirect()->route('contasPagar.index');
      }


        if($request->get('baixa') == 1) {
            if ($contaPagar->valorPago < $contaPagar->valor) {
                $contanova = new ContaPagar;
                $contanova->descricao = $contaPagar->id . 'Parcial' . $contaPagar->descricao;
                $contanova->dataEmissao = date('Y-m-d');
                $contanova->dataVencimento = date('Y-m-d', strtotime('+' . 30 . 'days'));
                $contanova->situacao = 0;
                $contanova->idFornecedor = $contaPagar->idFornecedor;
                $contanova->idProduto = $contaPagar->idProduto;
                $contanova->quantidade = $contaPagar->quantidade;
                $contanova->parcelas = '1';
                $contanova->tipoPagamento = $contaPagar->tipoPagamento;
                $contanova->valor = ($contaPagar->valor - $contaPagar->valorPago);

                $contanova->save();
            }
        }


        $contaPagar->descricao = $request->get('descricao');
        $contaPagar->dataEmissao = $request->get('dataEmissao');
        $contaPagar->dataVencimento = $request->get('dataVencimento');
        $contaPagar->situacao = $request->get('situacao');
        $contaPagar->idFornecedor = $request->get('idFornecedor');
        $contaPagar->idProduto = $request->get('idProduto');
        $contaPagar->quantidade = $request->get('quantidade');
        $contaPagar->parcelas = $request->get('parcelas');
        $contaPagar->tipoPagamento = $request->get('tipoPagamento');
        $contaPagar->valor = $request->get('valor');


        $contaPagar->save();

        if($contaPagar->wasRecentlyCreated){

            $parcelas = $contaPagar->parcelas ? $contaPagar->parcelas : 1;
            $valores = $this->getValores($parcelas, $contaPagar->valor);

            foreach ($valores as $key => $valor) {
                $conta = new ContaPagar;
                $conta->descricao = $contaPagar->id .' '. $contaPagar->descricao . ' '. $key .'/' . $contaPagar->parcelas ;
                $conta->dataEmissao = $contaPagar->dataEmissao;
                $conta->dataVencimento = date('Y-m-d', strtotime('+' . 30 * $key . 'days'));
                $conta->situacao = $contaPagar->situacao;
                $conta->idFornecedor = $contaPagar->idFornecedor;
                $conta->valor = $valor;

                $conta->save();
            }
        }



      return redirect()->route('contasPagar.index');
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
      $contasPagar = ContaPagar::all();
      $fornecedores = Fornecedor::all();
      return view('contasPagar.consulta', [
        'contasPagar' => $contasPagar,
        'fornecedores' => $fornecedores

      ]);

    }

    public function imprimir(ContaPagar $contaPagar){

        $conta = db::select("SELECT * FROM sandbox.contaPagar where id = '$contaPagar->id' ");


        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('contasPagar.imprimir', [ 'contaPagar' => $contaPagar, 'conta' => $conta]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
    public function Baixar(Request $request)
    {
        $datainicial = $request->get('data_incial');
        $datafinal = $request->get('data_final');
        $situacao = $request->get('situacao');
        $fornecedor = $request->get('fornecedor');
        $pagamento = $request->get('pagamento');
        if($datainicial <> ''){
          $inicio = $datafinal;
          $fim = $datafinal;
          if($situacao <> ''){
            $situacao = "AND cp.situacao = '$situacao'";
          }else{
              $situacao = '';
          }
          if($fornecedor <> ''){
            $fornecedor = "AND cp.idFornecedor = '$fornecedor'";
          }else{
            $fornecedor = '';
          }
          if($pagamento <> ''){
            $pagamento = "AND cp.tipoPagamento = '$pagamento'";
          }else{
            $pagamento = '';
          }

        $contasPagar = db::select("SELECT cp.*, pc.nome as pedidovendanome, pc.data as datapedido, f.nome as fornecedornome  from sandbox.contaPagar cp left join pedidocompra pc on pc.id = cp.idPedidoCompra left join fornecedores f on f.id = pc.idFornecedor where
          cp.dataVencimento >= '$datainicial' and cp.dataVencimento <= '$datafinal' $situacao  $fornecedor $pagamento ");

      }else{
        $inicio = '';
        $fim ='';
        if($situacao <> ''){
          $situacao = "AND cp.situacao = '$situacao'";
        }else{
            $situacao = '';
        }
        if($fornecedor <> ''){
          $fornecedor = "AND cp.idFornecedor = '$fornecedor'";
        }else{
          $fornecedor = '';
        }
        if($pagamento <> ''){
          $pagamento = "AND cp.tipoPagamento = '$pagamento'";
        }else{
          $pagamento = '';
        }
            $contasPagar = db::select("SELECT cp.*, pc.nome as pedidovendanome, pc.data as datapedido, f.nome as fornecedornome  from sandbox.contaPagar cp left join pedidocompra pc on pc.id = cp.idPedidoCompra left join fornecedores f on f.id = pc.idFornecedor where pc.id > 0 $situacao  $fornecedor $pagamento");

    }

      //  $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('contasReceber.relatorio', ['contasReceber' => $contasReceber, 'inicio' => $inicio, 'fim' => $fim]);
        //$pdf->setPaper('A4', 'landscape');
        //return $pdf->stream();


        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('contasPagar.relatorio', ['contasPagar' => $contasPagar, 'inicio' => $inicio, 'fim' => $fim]);
        return $pdf->stream();
    }


}
