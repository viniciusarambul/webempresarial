<a href="{{ route('produtos.create') }}">Criar novo produto</a>
@foreach($produtos as $produto)
  <p>{{ $produto->nome }}
    <a href="{{ route('produtos.edit', ['id' => $produto->id ]) }}">editar</a>
    <a href="{{ route('produtos.show', [ 'id' => $produto->id ]) }}">ver</a>
  </p>

@endforeach
