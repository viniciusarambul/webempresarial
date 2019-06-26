<?php

namespace App\Domains\Usuarios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Usuarios\Permissoes;
use App\Domains\Usuarios\UsuarioPermissao;
use Illuminate\Support\Facades\Auth;

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
        return $this->save(new Usuario(), $request);
    }

    public function show(Usuario $usuario)
    {
        $permissoes = Permissoes::getPermissoes($usuario);

        return view('usuarios.show', [
          'usuario' => $usuario,
          'permissoes' => $permissoes
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



        if (Auth::user()->id == $usuario->id) {
          return redirect()->route('usuarios.index')->with('error', 'Você não pode se excluir!');
        }


      $usuario->delete();

      return redirect()->route('usuarios.index')->with('success', 'Usuário excluido com sucesso!');;
    }

    private function form(Usuario $usuario) {
        return view('usuarios.form', [
          'usuario' => $usuario,
        ]);
    }


    public function salvarPermissoes(Usuario $usuario, Request $request) {

        UsuarioPermissao::where('usuario_id', $usuario->id)->delete();

        $permissoes = $request->get('permissoes');

        if($permissoes) {
            foreach($permissoes as $permissao => $identificador) {
                if($identificador == 'on') {
                    $usuarioPermissao = new UsuarioPermissao();
                    $usuarioPermissao->usuario_id = $usuario->id;
                    $usuarioPermissao->permissao_id = $permissao;

                    $usuarioPermissao->save();
                }
            }
        }

        return redirect()
            ->route('usuarios.show', ['id' => $usuario->id])
            ->with('success', 'Permissões salvas com sucesso. É necessário relogar para entrar em vigor.');
    }

    private function save(Usuario $usuario, UsuarioRequest $request)
    {
      $usuario->nome = $request->get('nome');
      $usuario->email = $request->get('email');
      $usuario->login = $request->get('login');
      if($request->get('password'))
      {
        $usuario->senha = bcrypt($request->get('password'));
      }
      $usuario->grupo_id = $request->get('grupo_id');

      $usuario->save();

      return redirect()->route('usuarios.show', ['id' => $usuario->id]);
    }
}
