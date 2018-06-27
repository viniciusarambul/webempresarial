<?php

namespace App\Domains\Clientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $cliente = new Cliente;

        return $this->save($cliente, $request);
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
      $cliente->nome = $request->get('nome');
      $cliente->sobrenome = $request->get('sobrenome');
      $cliente->telefone = $request->get('telefone');
      $cliente->email = $request->get('email');
      $cliente->cidade = $request->get('cidade');
      $cliente->estado = $request->get('estado');
      $cliente->cep = $request->get('cep');
      $cliente->cnpj = $request->get('cnpj');
      $cliente->cpf = $request->get('cpf');
      $cliente->bairro = $request->get('bairro');
      $cliente->numero = $request->get('numero');
      $cliente->status = $request->get('status');
      $cliente->save();

      return redirect()->route('clientes.show', ['id' => $cliente->id]);
    }
}
