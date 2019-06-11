<?php

namespace App\Domains\Vendedores;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Core\Types\CPF;
use App\Domains\Core\Types\CNPJ;
use App\Domains\PedidosVendas\PedidoVenda;
use Illuminate\Support\Facades\DB;

class VendedorController extends Controller
{
    public function index(Request $request)
    {
      $query = Vendedor::query();

      if($request->get('filter')){
          $query->where('cpf', 'like', '%' . $request->get('filter') . '%')
          ->orWhere('cnpj', 'like', '%' . $request->get('filter') . '%');
      }

        $vendedores = $query->paginate(5);

        return view('vendedores.index', [
          'vendedores' => $vendedores,
          'filter'=> $request->get('filter')
        ]);
    }

    public function create()
    {
        return $this->form(new Vendedor());
    }

    public function store(VendedorRequest $request)
    {
      if ($request->get('id')) {
            return $this->save(Vendedor::find($request->get('id')), $request);
        }
        return $this->save(new Vendedor(), $request);
    }

    public function show(Vendedor $vendedor)
    {
        return view('vendedores.show', [
          'vendedor' => $vendedor
        ]);
    }

    public function edit(Vendedor $vendedor)
    {
      return $this->form($vendedor);
    }

    public function update(VendedorRequest $request, Vendedor $vendedor)
    {
      return $this->save($vendedor, $request);
    }

    public function destroy(Vendedor $vendedor)
    {
      $pedido = PedidoVenda::where('idVendedor', $vendedor->id)->get();

      if ($pedido->count() > 0) {
        return redirect()->route('vendedores.index')->with('error', 'Não pode excluir Vendedor vinculado à uma Venda');
      }
      $vendedor->delete();

      return redirect()->route('vendedores.index')->with('success', 'Vendedor excluido com sucesso');
    }

    private function form(Vendedor $vendedor) {
        return view('vendedores.form', [
          'vendedor' => $vendedor
        ]);
    }

    private function save(Vendedor $vendedor, VendedorRequest $request)
    {
      try{

      $vendedor->nome = $request->get('nome');
      $vendedor->sobrenome = $request->get('sobrenome');
      $vendedor->telefone = $request->get('telefone');
      $vendedor->email = $request->get('email');
      $vendedor->cidade = $request->get('cidade');
      $vendedor->estado = $request->get('estado');
      $vendedor->cep = $request->get('cep');
      $cnpj = new CNPJ($request->get('cnpj'));
      $vendedor->cnpj = $cnpj->get();
      $cpf = new CPF($request->get('cpf'));
      $vendedor->cpf = $cpf->get();
      $vendedor->bairro = $request->get('bairro');
      $vendedor->numero = $request->get('numero');
      $vendedor->status = $request->get('status');

      $vendedor->save();

      return redirect()->route('vendedores.index');

      } catch(\Exception $e){
        return redirect()->back()->with('error', $e->getMessage());
      }
    }

    public function consulta(Request $request){
      $vendedores = Vendedor::all();
      return view('clientes.consulta', [
        'vendedores' => $vendedores

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
        $vendedores = db::select("SELECT * from tcc.vendedors where DATE(created_at) >= '$datainicial' and DATE(created_at) <= '$datafinal' and nome like '%". $filtronome ."%'");
      }else{
        $inicio = '';
        $fim ='';
        $vendedores = db::select("SELECT * from tcc.vendedors");
      }

        $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('vendedores.relatorio', ['vendedores' => $vendedores, 'inicio' => $inicio, 'fim' => $fim]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
}
