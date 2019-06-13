<?php

namespace App\Domains\Produtos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Fornecedores\Fornecedor;
use App\Domains\Categorias\Categoria;
use App\Domains\Pedidos\Pedidoitem;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
      $query = Produto::query();

        if($request->get('filter')){
            $query->where('nome', 'like', '%' . $request->get('filter') . '%');
        }

        $produtos = $query->paginate(5);
        $categorias = Categoria::all();
        return view('produtos.index', [
          'produtos' => $produtos,
          'categorias' => $categorias,
          'filter'=> $request->get('filter')
        ]);
    }

    public function create()
    {
        return $this->form(new Produto());
    }

    public function store(ProdutoRequest $request)
    {
      if ($request->get('id')) {
            return $this->save(Produto::find($request->get('id')), $request);
        }
        return $this->save(new Produto(), $request);
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
      $pedido = Pedidoitem::where('idProduto', $produto->id)->get();

      if ($pedido->count() > 0) {
        return redirect()->route('produtos.index')->with('error', 'Não pode excluir produto vinculado à uma Venda ou Compra');
      }

      $produto->delete();

      return redirect()->route('produtos.index')->with('success', 'Produto excluido com sucesso');
    }

    private function form(Produto $produto) {
        $fornecedores = Fornecedor::all();
        $categorias = Categoria::all();
        return view('produtos.form', [
          'produto' => $produto,
          'fornecedores' => $fornecedores,
          'categorias' => $categorias
        ]);
    }

    private function save(Produto $produto, ProdutoRequest $request)
    {
      $produto->nome = $request->get('nome');
      $produto->valorUnitario = $request->get('valorUnitario');
      $produto->valorSugerido = $request->get('valorSugerido');
      $produto->quantidade = $request->get('quantidade');
      $produto->fornecedor = $request->get('fornecedor');
      $produto->categoria = $request->get('categoria');

      $produto->save();

      return redirect()->route('produtos.index')->with('success', 'Produto inserido com sucesso');
    }

    public function consulta(Request $request){
        $produtos = db::select("SELECT id, nome from sandbox.fornecedores");
      return view('produtos.consulta', [
        'produtos' => $produtos

      ]);

    }

    public function produto(Produto $produto){

      return view('pedidosCompras.produtos',[
            'produto' => $produto
      ]);

    }
    public function Baixar(Request $request)
    {

        $filtronome = $request->get('nome');
        $filtrofornecedor = $request->get('fornecedor');
        if($filtrofornecedor <> ''){

        $produtos = db::select("SELECT p.*, c.descricao as descricaocategoria, f.nome as nomeFornecedor from sandbox.produtos p left join sandbox.categorias c on c.id = p.categoria left join
          fornecedores f on f.id = p.fornecedor where p.fornecedor = '$filtrofornecedor' and p.nome like '%". $filtronome ."%'");
      }else{

        $produtos = db::select("SELECT * from sandbox.produtos where nome like '%". $filtronome ."%'");
      }

        //$pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('clientes.relatorio', ['clientes' => $produtos, 'inicio' => $inicio, 'fim' => $fim]);
        //$pdf->setPaper('A4', 'landscape');
        //return $pdf->stream();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('produtos.relatorio', ['produtos' => $produtos]);
        return $pdf->stream();
    }

}
