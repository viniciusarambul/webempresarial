<?php

namespace App\Domains\Clientes;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', [
          'clientes' => $clientes
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
      $Cliente->delete();

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
      $cliente->bairro = $request->get('bairro');
      $cliente->numero = $request->get('numero');
      $cliente->save();

      return redirect()->route('clientes.show', ['id' => $cliente->id]);
    }
}
