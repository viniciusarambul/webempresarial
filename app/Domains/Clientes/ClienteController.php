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
      if ($request->get('id')) {
            return $this->save(Cliente::find($request->get('id')), $request);
        }
        return $this->save(new Cliente(), $request);
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

      $cpf = $cliente->cpf;
      function validarCPF($cpf) {

      $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
      // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
      if ( strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' ||
       $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' ||
       $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' ||
       $cpf == '88888888888' || $cpf == '99999999999') {
        //echo 1;
        return 1;
      } else { // Calcula os números para verificar se o CPF é verdadeiro
        for ($t = 9; $t < 11; $t++) {
          for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf{$c} * (($t + 1) - $c);
          }
          $d = ((10 * $d) % 11) % 10;
          if ($cpf{$c} != $d) {
            echo 1;
            return 1;
          }
        }
        //echo 0;
        return 0;
      }
    }

          if ($cliente->cpf <> '') {
        		$verificaCPF = validarCPF($cliente->cpf);
        	} else {
        		$verificaCPF = 0;
        	}


        	if ($verificaCPF == 1) {
        		echo "
        		<script>
        			alert('CPF do Aluno é inválido!');
        			history.back();
        		</script>
        		";

        	}else{
      $cliente->save();
}
      return redirect()->route('clientes.show', ['id' => $cliente->id]);
    }

}
