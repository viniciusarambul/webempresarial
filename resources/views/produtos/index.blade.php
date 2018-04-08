@extends('templates.template')
@section('container')

<a href="{{ route('produtos.create') }}">Criar novo produto</a>
@foreach($produtos as $produto)
  <p>{{ $produto->nome }}
    <a href="{{ route('produtos.edit', ['id' => $produto->id ]) }}">editar</a>
    <a href="{{ route('produtos.show', [ 'id' => $produto->id ]) }}">ver</a>
  </p>

@endforeach


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Produtos
        </h4>
    </div>
</div>



<div class="row">
    <div class="col s12">
        <div class="card">
            @if(count($produtos))
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descricao</th>
                        <th>Valor Unitário</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($produtos as $produto)
                    <tr class="with-options">
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->descricao}}</td>
                        <td>{{$produto->valorUnitario}}</td>
                        <td>{{$produto->quantidade}}</td>
                        <td class="options">
                            <a href="{{ route('produtos.show', [ 'id' => $produto->id ]) }}">
                                <i class="mdi mdi-eye"></i>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="alert-disable">Não há Produtos Cadastrados.</p>
            @endif
        </div>
      </div>
    </div>
