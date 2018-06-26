<?php

namespace App\Domains\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Fornecedores\Fornecedor;

class UserController extends Controller
{
    public function index(Request $request)
    {
      $query = User::query();

        if($request->get('filter')){
            $query->where('nome', 'like', '%' . $request->get('filter') . '%');
        }

        $users = $query->paginate(5);

        return view('users.index', [
          'users' => $users,
          'filter'=> $request->get('filter')
        ]);
    }

    public function create()
    {
        return $this->form(new User());
    }

    public function store(UserRequest $request)
    {
        $user = new User;

        return $this->save($user, $request);
    }

    public function show(User $user)
    {
        return view('users.show', [
          'user' => $user
        ]);
    }

    public function edit(User $user)
    {
      return $this->form($user);
    }

    public function update(UserRequest $request, User $user)
    {
      return $this->save($user, $request);
    }

    public function destroy(User $user)
    {
      $user->delete();

      return redirect()->route('users.index');
    }

    private function form(User $user) {
        $fornecedores = Fornecedor::all();
        return view('users.form', [
          'user' => $user,
          'fornecedores' => $fornecedores
        ]);
    }

    private function save(User $user, UserRequest $request)
    {
      $user->nome = $request->get('nome');
      $user->email = $request->get('email');
      $user->password = $request->get('password')=>Hash::make;
      $user->quantidade = $request->get('quantidade');
      $user->fornecedor = $request->get('fornecedor');

      $user->save();

      return redirect()->route('users.show', ['id' => $user->id]);
    }
}
