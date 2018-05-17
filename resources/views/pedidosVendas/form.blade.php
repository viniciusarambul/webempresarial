@extends('templates.template', [
    'title'=> 'Pedido Venda',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-briefcase',
    'active_router'=> 'pedidosVendas'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Pedido Venda
        </h4>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
            <form method="post" action="{{route('pedidosVendas.store')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" value="{{ $pedidoVenda->id }}" />
                <div class="row">
                    <div class="input col s6">
                        <label for="nome">Nome</label><br />
                        <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ $pedidoVenda->nome }}">
                    </div>
                    <div class="input col s6">
                        <label for="data">Data</label><br />
                        <input type="date" name="data" id="data" placeholder="Data" value="{{ $pedidoVenda->data }}">
                    </div>
                    <div class="input col s6">
                        <label for="situacao">Situacao</label><br />
                        <input type="text" name="situacao" id="situacao" placeholder="situacao" value="{{ $pedidoVenda->situacao }}">
                    </div>
                    <div class="input col s6">
                      <label for="cliente">Cliente</label><br />
                      <select class="browser-default" name="cliente">
                      @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="input col s6">
                      <label for="situacao">Produto</label><br />
                      <select class="browser-default" name="produto">
                      @foreach($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="input col s6">
                        <label for="quantidade">Quantidade</label><br />
                        <input type="text" name="quantidade" id="quantidade" placeholder="Quantidade" value="{{ $pedidoVenda->quantidade }}">
                    </div>
                  </div>


                <div class="row">
                    <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                    <a class="waves-effect waves-green btn-flat right" href="{{ route('pedidosVendas.index') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
