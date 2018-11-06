<?php

namespace App\Domains\Categorias;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Fornecedores\Fornecedor;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
      $query = Categoria::query();

        if($request->get('filter')){
            $query->where('descricao', 'like', '%' . $request->get('filter') . '%');
        }

        $categorias = $query->paginate(5);

        return view('categorias.index', [
          'categorias' => $categorias,
          'filter'=> $request->get('filter')
        ]);
    }

    public function create()
    {
        return $this->form(new Categoria());
    }

    public function store(CategoriaRequest $request)
    {
      if ($request->get('id')) {
            return $this->save(Categoria::find($request->get('id')), $request);
        }
        return $this->save($categoria, $request);
    }

    public function show(Categoria $categoria)
    {
        return view('categorias.show', [
          'categoria' => $categoria
        ]);
    }

    public function edit(Categoria $categoria)
    {
      return $this->form($categoria);
    }

    public function update(CategoriaRequest $request, Categoria $categoria)
    {
      return $this->save($categoria, $request);
    }

    public function destroy(Categoria $categoria)
    {
      $categoria->delete();

      return redirect()->route('categorias.index');
    }

    private function form(Categoria $categoria) {
        return view('categorias.form', [
          'categoria' => $categoria,
        ]);
    }

    private function save(Categoria $categoria, CategoriaRequest $request)
    {
      $categoria->descricao = $request->get('descricao');

      $categoria->save();

      return redirect()->route('categorias.show', ['id' => $categoria->id]);
    }
}
