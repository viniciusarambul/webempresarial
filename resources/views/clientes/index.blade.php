@extends('templates.template')
@section('container')

<a href="{{ route('clientes.create') }}">Criar novo cliente</a>
@foreach($clientes as $cliente)
  <p>{{ $cliente->nome }}
    <a href="{{ route('clientes.edit', ['id' => $cliente->id ]) }}">editar</a>
    <a href="{{ route('clientes.show', [ 'id' => $cliente->id ]) }}">ver</a>
  </p>

@endforeach
