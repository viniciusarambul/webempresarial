@extends('templates.template', [
    'title'=> 'Contas Receber',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-icon',
    'active_router'=> 'contasReceber'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Conta Receber
        </h4>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
            <form method="post" action="{{route('contasReceber.store')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" value="{{ $contaReceber->id }}" />
                <div class="row">
                    <div class="input col s6">
                        <label for="descricao">Descrição</label><br />
                        <input type="text" name="descricao" id="descricao" placeholder="Descrição" value="{{ $contaReceber->descricao }}">
                    </div>
                    <div class="input col s6">
                        <label for="data">Data</label><br />
                        <input type="date" name="data" id="data" placeholder="Data" value="{{ $contaReceber->data }}">
                    </div>
                    <div class="input col s6">
                        <label for="situacao">Situacao</label><br />
                        <input type="text" name="situacao" id="situacao" placeholder="situacao" value="{{ $contaReceber->situacao }}">
                    </div>
                    <div class="input col s6">
                      <label for="idCliente">Cliente</label><br />
                      <select class="browser-default" name="idCliente">
                      @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="input col s6">
                      <label for="idPrduto">Produto</label><br />
                      <select class="browser-default" name="idProduto">
                      @foreach($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="input col s6">
                        <label for="quantidade">Quantidade</label><br />
                        <input type="text" name="quantidade" id="quantidade" placeholder="Quantidade" value="{{ $contaReceber->quantidade }}">
                    </div>
                    <div class="input col s6">
                        <label for="parcelas">Parcelas</label><br />
                        <input type="text" name="parcelas" id="parcelas" placeholder="Parcelas" value="{{ $contaReceber->parcelas }}">
                    </div>
                    <div class="input col s6">
                        <label for="tipoPagamento">Tipo Pagamento</label><br />
                        <input type="text" name="tipoPagamento" id="tipoPagamento" placeholder="Tipo Pagamento" value="{{ $contaReceber->tipoPagamento }}">
                    </div>
                    <div class="input col s6">
                        <label for="valor">Valor</label><br />
                        <input type="text" name="valor" id="valor" placeholder="Valor" value="{{ $contaReceber->valor }}">
                    </div>
                  </div>


                <div class="row">
                    <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                    <a class="waves-effect waves-green btn-flat right" href="{{ route('contasReceber.index') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
