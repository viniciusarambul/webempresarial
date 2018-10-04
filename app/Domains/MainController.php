<?php

namespace App\Domains;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Usuarios\Usuario;
use Validator;
use Auth;
use Illuminate\Contracts\Auth\Authenticatable;

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

      $credentials = $request->only('login', 'senha');

      $usuario = Usuario::where('login', $request->get('login'))
                          ->where('senha', $request->get('senha'))
                          ->first();
      
      if ($usuario)
      {
          Auth::login($usuario, $request->has('remember'));
          return redirect('/dashboard');
      }

      return redirect()->back()->with('error', 'Credenciais erradas');

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
