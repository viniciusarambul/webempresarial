@extends('templates.template', [
    'title'=> 'Pedido Compra',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-briefcase',
    'active_router'=> 'pedidosItens'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Pedido Item
        </h4>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
            <form method="post" action="{{route('pedidosVendas.pedidoItem.store', ['pedidoVenda' => $pedidoVenda->id])}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" value="{{ $pedidoItem->id }}" />
                <input type="hidden" id="idPedido" name="idPedido" value="{{ $pedidoItem->idPedido }}" />
                <div class="row">
                  <div class="input col s6">
                    <label for="idCliente">Cliente</label><br />
                    <select class="browser-default" name="idFornecedor">
                    @foreach($clientes as $cliente)
                      <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="input col s6">
                    <label for="idProduto">Produto</label><br />
                    <select class="browser-default" name="idProduto">
                    @foreach($produtos as $produto)
                      <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                      @endforeach
                    </select>
                  </div>
                    <div class="input col s6">
                        <label for="quantidade">Quantidade</label><br />
                        <input type="text" name="quantidade" id="quantidade" placeholder="Quantidade" value="{{ $pedidoItem->quantidade }}">
                    </div>
                    <div class="input col s6">
                        <label for="valorTotal">Valor Unitário</label><br />
                        <input type="text" name="situacao" id="situacao" readonly>

                    </div>
                    <div class="input col s6">
                        <label for="preco">Valor Total</label><br />
                        <input type="text" name="preco" id="preco" value="{{ $pedidoItem->preco }}">

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
