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
           Cadastro de Conta a Receber
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
                        <label for="data">Data Emissão</label><br />
                        <input type="date" name="data" id="data" placeholder="Data" value="{{ $contaReceber->data }}">
                    </div>

                    <div class="input col s5">
                         <label for="situacao">Situação *</label><br />
                      <select class="browser-default" required name="situacao">
                        <option value="">Selecione</option>
                        <option value="Aberto">Aberto</option>
                        <option value="Fechado">Fechado</option>
                      </select>
                    </div>
                    <div class="input col s6" style="margin-left:8%;">
                        <label for="data">Data Vencimento</label><br />
                        <input type="date" name="data" id="data" placeholder="Data" value="{{ $contaReceber->data_vencimento }}">
                    </div>
                    <div class="input col s5" >
                      <label for="idCliente">Cliente</label><br />
                      <select class="browser-default" name="idCliente">
                      @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="input col s5" style="margin-left: 8%">
                      <label for="tipoPagamento">Tipo Documento</label><br />
                      <select class="browser-default" name="tipoPagamento">

                        <option value="0">Boleto</option>
                        <option value="1">Cartão de Crédito</option>
                        <option value="2">Cartão de Débito</option>
                        <option value="3">Cheque</option>
                        <option value="4">Duplicata</option>
                        <option value="5">Promissória</option>
                        <option value="6">Recibo</option>

                      </select>
                    </div>
                    <div class="input col s6">
                        <label for="parcelas">Parcelas (Preencha apenas para lançamentos parcelados)</label><br />
                        <input type="text" name="parcelas" id="parcelas" placeholder="Parcelas" value="{{ $contaReceber->parcelas }}">
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
            <p style="margin-left: 2%">* Campos Obrigatórios</p>
        </div>
    </div>
</div>

@endsection
