<h1> vizu de produto </h1>

<p><b> nome </b> {{ $produto->nome }}</p>
<p><b> descricao </b> {{ $produto->descricao }}</p>
<p><b> valor unitario </b> {{ $produto->valorUnitario }}</p>
<p><b> quantidade </b> {{ $produto->quantidade }}</p>
<form method="post" action="{{ route('produtos.destroy',['id' => $produto->id])}}">
  {{ csrf_field() }}
   <input type="hidden" name="_method" value="DELETE">
   <button>Excluir</button>
</form>
