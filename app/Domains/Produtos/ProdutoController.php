<?php

namespace App\Domains\Produtos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Fornecedores\Fornecedor;
use App\Domains\Categorias\Categoria;
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
      $produto->delete();

      return redirect()->route('produtos.index');
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
      $produto->quantidade = $request->get('quantidade');
      $produto->fornecedor = $request->get('fornecedor');
      $produto->categoria = $request->get('categoria');

      $produto->save();

      return redirect()->route('produtos.show', ['id' => $produto->id]);
    }

    public function consulta(Request $request){
      $produtos = Produto::all();
      return view('produtos.consulta', [
        'produtos' => $produtos

      ]);

    }
    public function Baixar(Request $request)
    {
        $datainicial = $request->get('data_incial');
        $datafinal = $request->get('data_final');
        $filtronome = $request->get('nome');
        if($datainicial <> ''){
          $inicio = $datafinal;
          $fim = $datafinal;
        $produtos = db::select("SELECT p.*, c.descricao as descricaocategoria, f.nome as nomeFornecedor from tcc.produtos p left join categorias c on c.id = p.categoria left join fornecedores f on f.id = p.fornecedor where DATE(p.created_at) >= '$datainicial' and DATE(p.created_at) <= '$datafinal' and p.nome like '%". $filtronome ."%'");
      }else{
        $inicio = '';
        $fim ='';
        $produtos = db::select("SELECT p.*, c.descricao as descricaocategoria, f.nome as nomeFornecedor from tcc.produtos p left join categorias c on c.id = p.categoria left join fornecedores f on f.id = p.fornecedor");
      }

        $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('produtos.relatorio', ['produtos' => $produtos, 'inicio' => $inicio, 'fim' => $fim]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

}
