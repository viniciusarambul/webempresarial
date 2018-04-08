<form action="{{ route('produtos.update', [ 'id' => $produto->id]) }}" method="post">
  {{ csrf_field() }}
  @if($produto->id)
    <input type="hidden" name="_method" value="PUT">
  @endif
  <input type="text" name="nome" value="{{ $produto->nome }}" placeholder="nome">
  <input type="text" name="descricao" value="{{ $produto->descricao }}" placeholder="descricao">
  <input type="text" name="valorUnitario" value="{{ $produto->valorUnitario }}" placeholder="valor unitario">
  <input type="text" name="quantidade" value="{{ $produto->quantidade }}" placeholder="quantidade">

<button> salvar </button>
</form>
