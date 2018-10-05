<?php

namespace App\Domains;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Usuarios\Usuario;
use Validator;
use Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function index()
    {
     return view('login');
    }

    function checklogin(Request $request)
    {

        $this->validate($request, [
            'login' => 'required', 'senha' => 'required',
        ]);

        $usuario = Usuario::where('login', $request->get('login'))
                            ->first();


        if (!$usuario)
        {
          return redirect()->back()->with('error', 'Usuário não encontrado');
        }

        if (Hash::check($request->get('senha'), $usuario->senha))
        {
            Auth::login($usuario, $request->has('remember'));
            return redirect('/dashboard');
        }

      return redirect()->back()->with('error', 'Senha incorreta');

    }

    function successlogin()
    {
     return view('successlogin');
    }

    function logout()
    {
     Auth::logout();
     return redirect('main');
    }
}

?>
