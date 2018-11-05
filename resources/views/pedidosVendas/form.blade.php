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
                        <label for="nome">Nome *</label><br />
                        <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ $pedidoVenda->nome }}">
                    </div>
                    <div class="input col s6">
                        <label for="data">Data *</label><br />
                        <input type="date" name="data" id="data" required placeholder="Data" value="{{ $pedidoVenda->data }}">
                    </div>
                    <div class="input col s6">
                         <label for="situacao">Situação *</label><br />
                      <select class="browser-default" required name="situacao">
                        <option value="">Selecione</option>
                        <option value="Aberto">Aberto</option>
                        <option value="Fechado">Fechado</option>
                      </select>
                    </div>
                    <div class="input col s6">
                      <label for="idVendedor">Vendedor</label><br />
                      <select class="browser-default" name="idVendedor">
                      @foreach($vendedores as $vendedor)
                        <option value="{{ $vendedor->id }}">{{ $vendedor->nome }}</option>
                        @endforeach
                      </select>
                    </div

                  </div>


                <div class="row">
                    <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                    <a class="waves-effect waves-green btn-flat right" href="{{ route('pedidosVendas.index') }}">Cancelar</a>
                </div>
            </form>
            <p style="margin-left: 2%">* Campos Obrigatórios</p>
        </div>
    </div>
</div>

@endsection
