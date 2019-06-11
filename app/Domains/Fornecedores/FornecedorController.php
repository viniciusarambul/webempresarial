<?php

namespace App\Domains\Fornecedores;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Core\Types\CPF;
use App\Domains\Core\Types\CNPJ;
use Illuminate\Support\Facades\DB;
use App\Domains\PedidosCompras\PedidoCompra;

class FornecedorController extends Controller
{
    public function index(Request $request)
    {
      $query = Fornecedor::query();

      if($request->get('filter')){
          $query->where('cpf', 'like', '%' . $request->get('filter') . '%')
          ->orWhere('cnpj', 'like', '%' . $request->get('filter') . '%');
      }

        $fornecedores = $query->paginate(5);

        return view('fornecedores.index', [
          'fornecedores' => $fornecedores,
          'filter'=> $request->get('filter')
        ]);

    }

    public function create()
    {
        return $this->form(new Fornecedor());
    }

    public function store(FornecedorRequest $request)
    {
      if ($request->get('id')) {
            return $this->save(Fornecedor::find($request->get('id')), $request);
        }
        return $this->save(new Fornecedor(), $request);
    }

    public function show(Fornecedor $fornecedor)
    {
        return view('fornecedores.show', [
          'fornecedor' => $fornecedor
        ]);
    }

    public function edit(Fornecedor $fornecedor)
    {
      return $this->form($fornecedor);
    }

    public function update(FornecedorRequest $request, Fornecedor $fornecedor)
    {
      return $this->save($fornecedor, $request);
    }

    public function destroy(Fornecedor $fornecedor)
    {
      $pedido = PedidoCompra::where('idFornecedor', $fornecedor->id)->get();

      if ($pedido->count() > 0) {
        return redirect()->route('fornecedores.index')->with('error', 'Não pode excluir Fornecedor vinculado à uma Compra');;
      }

      $fornecedor->delete();

      return redirect()->route('fornecedores.index')->with('success', 'Fornecedor excluido com sucesso');
    }

    private function form(Fornecedor $fornecedor) {
        return view('fornecedores.form', [
          'fornecedor' => $fornecedor
        ]);
    }

    private function save(Fornecedor $fornecedor, FornecedorRequest $request)
    {
      try{
      $fornecedor->nome = $request->get('nome');
      $fornecedor->sobrenome = $request->get('sobrenome');
      $fornecedor->telefone = $request->get('telefone');
      $fornecedor->email = $request->get('email');
      $fornecedor->cidade = $request->get('cidade');
      $fornecedor->estado = $request->get('estado');
      $fornecedor->cep = $request->get('cep');
      $fornecedor->bairro = $request->get('bairro');
      $fornecedor->numero = $request->get('numero');
      $fornecedor->razaosocial = $request->get('razaosocial');
      $cnpj = new CNPJ($request->get('cnpj'));
      $fornecedor->cnpj = $cnpj->get();
      $cpf = new CPF($request->get('cpf'));
      $fornecedor->cpf = $cpf->get();
      $fornecedor->status = $request->get('status');

      $fornecedor->save();
      return redirect()->route('fornecedores.index', ['id' => $fornecedor->id]);

      } catch(\Exception $e){
        return redirect()->back()->with('error', $e->getMessage());
      }
    }

    public function consulta(Request $request){
      $fornecedores = Fornecedor::all();
      return view('fornecedores.consulta', [
        'fornecedores' => $fornecedores

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
        $fornecedores = db::select("SELECT * from tcc.fornecedores where DATE(created_at) >= '$datainicial' and DATE(created_at) <= '$datafinal' and nome like '%". $filtronome ."%'");
      }else{
        $inicio = '';
        $fim ='';
        $fornecedores = db::select("SELECT * from tcc.fornecedores");
      }

        $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('fornecedores.relatorio', ['fornecedores' => $fornecedores, 'inicio' => $inicio, 'fim' => $fim]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
}
