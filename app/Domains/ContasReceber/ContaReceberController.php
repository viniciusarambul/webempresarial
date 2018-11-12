<?php

namespace App\Domains\ContasReceber;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Clientes\Cliente;
use App\Domains\Produtos\Produto;

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

    private function save(ContaReceber $contaReceber, ContaReceberRequest $request)
    {
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

      return redirect()->route('contasReceber.show', ['id' => $contaReceber->id]);
    }


}
