<?php

namespace App\Domains\ContasPagar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Fornecedores\Fornecedor;
use App\Domains\Produtos\Produto;

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

    private function save(ContaPagar $contaPagar, ContaPagarRequest $request)
    {
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

      return redirect()->route('contasPagar.show', ['id' => $contaPagar->id]);
    }
}
