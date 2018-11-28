<?php

namespace App\Domains\Clientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Core\Types\CPF;
use App\Domains\Core\Types\CNPJ;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
      $query = Cliente::query();

        if($request->get('filter')){
            $query->where('nome', 'like', '%' . $request->get('filter') . '%');
        }

        $clientes = $query->paginate(5);

        return view('clientes.index', [
          'clientes' => $clientes,
          'filter'=> $request->get('filter')
        ]);
    }

    public function create()
    {
        return $this->form(new Cliente());
    }

    public function store(ClienteRequest $request)
    {
      if ($request->get('id')) {
            return $this->save(Cliente::find($request->get('id')), $request);
        }
        return $this->save(new Cliente(), $request);
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', [
          'cliente' => $cliente
        ]);
    }

    public function edit(Cliente $cliente)
    {
      return $this->form($cliente);
    }

    public function update(ClienteRequest $request, Cliente $cliente)
    {
      return $this->save($cliente, $request);
    }

    public function destroy(Cliente $cliente)
    {
      $cliente->delete();

      return redirect()->route('clientes.index');
    }

    private function form(Cliente $cliente) {
        return view('clientes.form', [
          'cliente' => $cliente
        ]);
    }


    private function save(Cliente $cliente, ClienteRequest $request)
    {

      try{

      $cliente->nome = $request->get('nome');
      $cliente->sobrenome = $request->get('sobrenome');
      $cliente->telefone = $request->get('telefone');
      $cliente->email = $request->get('email');
      $cliente->cidade = $request->get('cidade');
      $cliente->estado = $request->get('estado');
      $cliente->cep = $request->get('cep');
      $cnpj = new CNPJ($request->get('cnpj'));
      $cliente->cnpj = $cnpj->get();
      $cpf = new CPF($request->get('cpf'));
      $cliente->cpf = $cpf->get();
      $cliente->bairro = $request->get('bairro');
      $cliente->numero = $request->get('numero');
      $cliente->status = $request->get('status');

      $cliente->save();

      return redirect()->route('clientes.show', ['id' => $cliente->id]);

      } catch(\Exception $e){
        return redirect()->back()->with('error', $e->getMessage());
      }

    }

    public function consulta(Request $request){
      $clientes = Cliente::all();
      return view('clientes.consulta', [
        'clientes' => $clientes

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
        $clientes = db::select("SELECT * from tcc.clientes where DATE(created_at) >= '$datainicial' and DATE(created_at) <= '$datafinal' and nome like '%". $filtronome ."%'");
      }else{
        $inicio = '';
        $fim ='';
        $clientes = db::select("SELECT * from tcc.clientes");
      }

        $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('clientes.relatorio', ['clientes' => $clientes, 'inicio' => $inicio, 'fim' => $fim]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }


}
