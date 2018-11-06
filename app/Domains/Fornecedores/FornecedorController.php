<?php

namespace App\Domains\Fornecedores;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(Request $request)
    {
      $query = Fornecedor::query();

        if($request->get('filter')){
            $query->where('nome', 'like', '%' . $request->get('filter') . '%');
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
        return $this->save($fornecedor, $request);
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
      $fornecedor->delete();

      return redirect()->route('fornecedores.index');
    }

    private function form(Fornecedor $fornecedor) {
        return view('fornecedores.form', [
          'fornecedor' => $fornecedor
        ]);
    }

    private function save(Fornecedor $fornecedor, FornecedorRequest $request)
    {
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
      $fornecedor->cpf = $request->get('cpf');
      $fornecedor->cnpj = $request->get('cnpj');
      $fornecedor->status = $request->get('status');
      $fornecedor->save();

      return redirect()->route('fornecedores.show', ['id' => $fornecedor->id]);
    }
}
