<h1> vizu de produto </h1>

<p><b> nome </b> {{ $produto->nome }}</p>
<p><b> descricao </b> {{ $produto->descricao }}</p>
<form method="post" action="{{ route('produtos.destroy',['id' => $produto->id])}}">
  {{ csrf_field() }}
   <input type="hidden" name="_method" value="DELETE">
   <button>Excluir</button>
</form>
