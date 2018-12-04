<?php

namespace App\Domains\ContasPagar;
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

        if($request->get('filter')){
            $query->where('nome', 'like', '%' . $request->get('filter') . '%');
        }

        $contasPagar = $query->paginate(5);

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



    private function save(ContaPagar $contaPagar, ContaPagarRequest $request)
    {
      if($request->get('baixa') == null){
      $contaPagar->situacao = $request->get('situacao');
      $contaPagar->valorPago = $request->get('valorPago');
      $contaPagar->dataPagamento = $request->get('dataPagamento');

      $contaPagar->save();
    }else{
      $contaPagar->descricao = $request->get('descricao');
      $contaPagar->dataEmissao = $request->get('dataEmissao');
      $contaPagar->dataVencimento = $request->get('dataVencimento');
      $contaPagar->situacao = $request->get('situacao');
      $contaPagar->idCliente = $request->get('idCliente');
      $contaPagar->idProduto = $request->get('idProduto');
      $contaPagar->quantidade = $request->get('quantidade');
      $contaPagar->parcelas = $request->get('parcelas');
      $contaPagar->tipoPagamento = $request->get('tipoPagamento');
      $contaPagar->valor = $request->get('valor');


      $contaPagar->save();
    }

      if($contaPagar->wasRecentlyCreated){
        $parcelas = $contaPagar->parcelas ? $contaPagar->parcelas : 1;
        for ($x = 0; $x<$parcelas; $x++){
          $conta = new ContaPagar;
          $conta->descricao = $contaPagar->id . '/' . $contaPagar->parcela;
          $conta->dataEmissao = $contaPagar->dataEmissao;
          $conta->dataVencimento = date('Y-m-d', strtotime('+' . 30 * $x . 'days'));
          $conta->situacao = $contaPagar->situacao;
          $conta->valor = round($contaPagar->valor/$contaPagar->parcelas, 2);

          $conta->save();
        }
      }

      return redirect()->route('contasPagar.show', ['id' => $contaPagar->id]);
    }

    public function consulta(Request $request){
      $contasPagar = ContaPagar::all();
      return view('contasPagar.consulta', [
        'contasPagar' => $contasPagar

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
        $contasPagar = db::select("SELECT cp.*, pc.nome as pedidocompranome, pc.data as datapedido, f.nome as fornecedornome  from tcc.contapagar cp left join pedidocompra pc on pc.id = cp.idPedidoCompra left join fornecedores f on f.id = pc.idFornecedor where cp.dataVencimento >= '$datainicial' and cp.dataVencimento <= '$datafinal'  ");
      }else{
        $inicio = '';
        $fim ='';
        // $situacao = $situacao;
        $contasPagar = db::select("SELECT cp.*, pc.nome as pedidocompranome, pc.data as datapedido, f.nome as fornecedornome  from tcc.contapagar cp left join pedidocompra pc on pc.id = cp.idPedidoCompra left join fornecedores f on f.id = pc.idFornecedor");
      }

        $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('contasPagar.relatorio', ['contasPagar' => $contasPagar, 'inicio' => $inicio, 'fim' => $fim]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

}
