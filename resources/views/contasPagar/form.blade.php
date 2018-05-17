@extends('templates.template', [
    'title'=> 'Contas Pagar',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-currency-usd',
    'active_router'=> 'contasPagar'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Conta Pagar
        </h4>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
            <form method="post" action="{{route('contasPagar.store')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" value="{{ $contaPagar->id }}" />
                <div class="row">
                    <div class="input col s6">
                        <label for="descricao">Descrição</label><br />
                        <input type="text" name="descricao" id="descricao" placeholder="Descrição" value="{{ $contaPagar->descricao }}">
                    </div>
                    <div class="input col s6">
                        <label for="data">Data</label><br />
                        <input type="date" name="data" id="data" placeholder="Data" value="{{ $contaPagar->data }}">
                    </div>
                    <div class="input col s6">
                        <label for="situacao">Situacao</label><br />
                        <input type="text" name="situacao" id="situacao" placeholder="situacao" value="{{ $contaPagar->situacao }}">
                    </div>
                    <div class="input col s6">
                      <label for="idFornecedor">Fornecedor</label><br />
                      <select class="browser-default" name="idFornecedor">
                      @foreach($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
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
                        <input type="text" name="quantidade" id="quantidade" placeholder="Quantidade" value="{{ $contaPagar->quantidade }}">
                    </div>
                    <div class="input col s6">
                        <label for="parcelas">Parcelas</label><br />
                        <input type="text" name="parcelas" id="parcelas" placeholder="Parcelas" value="{{ $contaPagar->parcelas }}">
                    </div>
                    <div class="input col s6">
                        <label for="tipoPagamento">Tipo Pagamento</label><br />
                        <input type="text" name="tipoPagamento" id="tipoPagamento" placeholder="Tipo Pagamento" value="{{ $contaPagar->tipoPagamento }}">
                    </div>
                    <div class="input col s6">
                        <label for="valor">Valor</label><br />
                        <input type="text" name="valor" id="valor" placeholder="Valor" value="{{ $contaPagar->valor }}">
                    </div>
                  </div>


                <div class="row">
                    <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                    <a class="waves-effect waves-green btn-flat right" href="{{ route('contasPagar.index') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
