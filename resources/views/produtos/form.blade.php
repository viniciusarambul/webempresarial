<form action="{{ route('produtos.update', [ 'id' => $produto->id]) }}" method="post">
  {{ csrf_field() }}
  @if($produto->id)
    <input type="hidden" name="_method" value="PUT">
  @endif
  <input type="text" name="nome" value="{{ $produto->nome }}" placeholder="nome">
  <input type="text" name="descricao" value="{{ $produto->descricao }}" placeholder="descricao">

<button> salvar </button>
</form>
