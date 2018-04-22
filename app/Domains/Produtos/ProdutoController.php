<?php

namespace App\Domains\Produtos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
      $query = Produto::query();

        if($request->get('filter')){
            $query->where('nome', 'like', '%' . $request->get('filter') . '%');
        }

        $produtos = $query->paginate(5);

        return view('produtos.index', [
          'produtos' => $produtos,
          'filter'=> $request->get('filter')
        ]);
    }

    public function create()
    {
        return $this->form(new Produto());
    }

    public function store(ProdutoRequest $request)
    {
        $produto = new Produto;

        return $this->save($produto, $request);
    }

    public function show(Produto $produto)
    {
        return view('produtos.show', [
          'produto' => $produto
        ]);
    }

    public function edit(Produto $produto)
    {
      return $this->form($produto);
    }

    public function update(ProdutoRequest $request, Produto $produto)
    {
      return $this->save($produto, $request);
    }

    public function destroy(Produto $produto)
    {
      $produto->delete();

      return redirect()->route('produtos.index');
    }

    private function form(Produto $produto) {
        return view('produtos.form', [
          'produto' => $produto
        ]);
    }

    private function save(Produto $produto, ProdutoRequest $request)
    {
      $produto->nome = $request->get('nome');
      $produto->descricao = $request->get('descricao');
      $produto->valorUnitario = $request->get('valorUnitario');
      $produto->quantidade = $request->get('quantidade');
      $produto->save();

      return redirect()->route('produtos.show', ['id' => $produto->id]);
    }
}
