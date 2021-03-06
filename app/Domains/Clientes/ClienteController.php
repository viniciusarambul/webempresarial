<?php

namespace App\Domains\Clientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Core\Types\CPF;
use App\Domains\Core\Types\CNPJ;
use Illuminate\Support\Facades\DB;
use App\Domains\PedidosVendas\PedidoVenda;


class ClienteController extends Controller
{
    public function index(Request $request)
    {
      $query = Cliente::query();

        if($request->get('filter')){
            $query->where('cpf', 'like', '%' . $request->get('filter') . '%')
            ->orWhere('cnpj', 'like', '%' . $request->get('filter') . '%');
        }

        $clientes = $query->paginate(10);

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
      $pedido = PedidoVenda::where('idCliente', $cliente->id)->get();

      if ($pedido->count() > 0) {
        return redirect()->route('clientes.index')->with('error', 'Não pode excluir Cliente vinculado à uma Venda');
      }

      $cliente->delete();

      return redirect()->route('clientes.index')->with('success', 'Vendedor excluido com sucesso');
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

      return redirect()->route('clientes.index', ['id' => $cliente->id]);

      } catch(\Exception $e){
        return redirect()->back()->with('error', $e->getMessage());
      }

    }

    public function consulta(Request $request){
    //  $clientes = Cliente::all()->groupBy('cidade')->get();
      $clientes = db::select("SELECT cidade from sandbox.clientes group by cidade");


      return view('clientes.consulta', [
        'clientes' => $clientes,


      ]);

    }

    public function Baixar(Request $request)
    {
        $datainicial = $request->get('data_incial');
        $datafinal = $request->get('data_final');
        $filtronome = $request->get('nome');
        $filtrocidade = $request->get('cidade');
        if($filtrocidade <> ''){

        $clientes = db::select("SELECT * from sandbox.clientes where cidade = '$filtrocidade' and nome like '%". $filtronome ."%'");
      }else{

        $clientes = db::select("SELECT * from sandbox.clientes where nome like '%". $filtronome ."%'");
      }

        //$pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('clientes.relatorio', ['clientes' => $clientes, 'inicio' => $inicio, 'fim' => $fim]);
        //$pdf->setPaper('A4', 'landscape');
        //return $pdf->stream();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('clientes.relatorio', ['clientes' => $clientes]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }


}
