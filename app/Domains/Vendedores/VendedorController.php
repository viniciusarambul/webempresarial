<?php

namespace App\Domains\Vendedores;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function index(Request $request)
    {
      $query = Vendedor::query();

        if($request->get('filter')){
            $query->where('nome', 'like', '%' . $request->get('filter') . '%');
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
        return $this->save($vendedor, $request);
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
      $vendedor->delete();

      return redirect()->route('vendedores.index');
    }

    private function form(Vendedor $vendedor) {
        return view('vendedores.form', [
          'vendedor' => $vendedor
        ]);
    }

    private function save(Vendedor $vendedor, VendedorRequest $request)
    {

      $vendedor->nome = $request->get('nome');
      $vendedor->sobrenome = $request->get('sobrenome');
      $vendedor->telefone = $request->get('telefone');
      $vendedor->email = $request->get('email');
      $vendedor->cidade = $request->get('cidade');
      $vendedor->estado = $request->get('estado');
      $vendedor->cep = $request->get('cep');
      $vendedor->cnpj = $request->get('cnpj');
      $vendedor->cpf = $request->get('cpf');
      $vendedor->bairro = $request->get('bairro');
      $vendedor->numero = $request->get('numero');
      $vendedor->status = $request->get('status');
      $vendedor->save();

      return redirect()->route('vendedores.show', ['id' => $vendedor->id]);
    }
}
