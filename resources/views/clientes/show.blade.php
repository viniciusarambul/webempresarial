<h1> visualização de cliente </h1>

<p><b> nome </b> {{ $cliente->nome }}</p>
<p><b> sobrenome </b> {{ $cliente->sobrenome }}</p>
<p><b> telefone </b> {{ $cliente->telefone }}</p>
<p><b> email </b> {{ $cliente->email }}</p>
<p><b> cidade </b> {{ $cliente->cidade }}</p>
<p><b> estado </b> {{ $cliente->estado }}</p>
<p><b> cep </b> {{ $cliente->cep }}</p>
<p><b> bairro </b> {{ $cliente->bairro }}</p>
<p><b> numero </b> {{ $cliente->numero }}</p>
<form method="post" action="{{ route('clientes.destroy',['id' => $cliente->id])}}">
  {{ csrf_field() }}
   <input type="hidden" name="_method" value="DELETE">
   <button>Excluir</button>
</form>
