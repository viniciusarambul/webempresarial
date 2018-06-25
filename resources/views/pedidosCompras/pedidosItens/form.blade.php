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
            <form method="post" action="{{route('pedidosCompras.pedidoItem.store', ['pedidoCompra' => $pedidoCompra->id])}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" value="{{ $pedidoItem->id }}" />
                <div class="row">
                  <div class="input col s6">
                    <label for="idProduto">Produto</label><br />
                    <select class="browser-default" name="idProduto">
                    @foreach($produtos as $produto)
                      <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                      @endforeach
                    </select>
                  </div>
                    <div class="input col s6">
                        <label for="data">Data</label><br />
                        <input type="date" name="data" id="data" placeholder="Data" value="{{ $pedidoCompra->data }}">
                    </div>
                    <div class="input col s6">
                        <label for="situacao">Situacao</label><br />
                        <input type="text" name="situacao" id="situacao" placeholder="situacao" value="{{ $pedidoCompra->situacao }}">

                    </div>

                  </div>


                <div class="row">
                    <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                    <a class="waves-effect waves-green btn-flat right" href="{{ route('pedidosCompras.index') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
