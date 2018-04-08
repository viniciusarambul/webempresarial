<form action="{{ route('clientes.update', [ 'id' => $cliente->id]) }}" method="post">
  {{ csrf_field() }}
  @if($cliente->id)
    <input type="hidden" name="_method" value="PUT">
  @endif
  <input type="text" name="nome" value="{{ $cliente->nome }}" placeholder="nome">
  <input type="text" name="sobrenome" value="{{ $cliente->sobrenome }}" placeholder="sobrenome">
  <input type="text" name="telefone" value="{{ $cliente->telefone }}" placeholder="Telefone">
  <input type="text" name="email" value="{{ $cliente->email }}" placeholder="quantidade">
  <input type="text" name="cidade" value="{{ $cliente->cidade }}" placeholder="cidade">
  <input type="text" name="estado" value="{{ $cliente->estado }}" placeholder="estado">
  <input type="text" name="cep" value="{{ $cliente->cep }}" placeholder="cep">
  <input type="text" name="bairro" value="{{ $cliente->bairro }}" placeholder="bairro">
  <input type="text" name="numero" value="{{ $cliente->numero }}" placeholder="numero">

<button> salvar </button>
</form>
