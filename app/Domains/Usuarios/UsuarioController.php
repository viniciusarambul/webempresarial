<?php

namespace App\Domains\Usuarios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
      $query = Usuario::query();

        if($request->get('filter')){
            $query->where('nome', 'like', '%' . $request->get('filter') . '%');
        }

        $usuarios = $query->paginate(5);

        return view('usuarios.index', [
          'usuarios' => $usuarios,
          'filter'=> $request->get('filter')
        ]);
    }

    public function create()
    {
        return $this->form(new Usuario());
    }

    public function store(UsuarioRequest $request)
    {
      if ($request->get('id')) {
            return $this->save(Usuario::find($request->get('id')), $request);
        }
        return $this->save($usuario, $request);
    }

    public function show(Usuario $usuario)
    {
        return view('usuarios.show', [
          'usuario' => $usuario
        ]);
    }

    public function edit(Usuario $usuario)
    {
      return $this->form($usuario);
    }

    public function update(UsuarioRequest $request, Usuario $usuario)
    {
      return $this->save($usuario, $request);
    }

    public function destroy(Usuario $usuario)
    {
      $usuario->delete();

      return redirect()->route('usuarios.index');
    }

    private function form(Usuario $usuario) {
        return view('usuarios.form', [
          'usuario' => $usuario,
        ]);
    }

    private function save(Usuario $usuario, UsuarioRequest $request)
    {
      $usuario->nome = $request->get('nome');
      $usuario->email = $request->get('email');
      $usuario->login = $request->get('login');
      $usuario->senha = $request->get('senha');

      $usuario->save();

      return redirect()->route('usuarios.show', ['id' => $usuario->id]);
    }
}
