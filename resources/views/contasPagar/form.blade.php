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
                        <label for="descricao">Descrição *</label><br />
                        <input type="text" name="descricao" id="descricao" placeholder="Descrição" value="{{ $contaPagar->descricao }}">
                    </div>
                    <div class="input col s6">
                        <label for="dataEmissao">Data Emissão *</label><br />
                        <input type="date" name="dataEmissao" id="dataEmissao" placeholder="Data" value="{{ $contaPagar->dataEmissao }}">
                    </div>

                    <div class="input col s5">
                         <label for="situacao">Situação *</label><br />
                      <select class="browser-default" required name="situacao">
                        <option value="">Selecione</option>
                        <option value="Aberto">Aberto</option>
                        <option value="Fechado">Baixado</option>
                        <option value="Atrasado">Atrasado</option>
                      </select>
                    </div>
                    <div class="input col s6" style="margin-left:8%;">
                        <label for="dataVencimento">Data Vencimento *</label><br />
                        <input type="date" name="dataVencimento" id="dataVencimento" placeholder="Data" value="{{ $contaPagar->dataVencimento }}">
                    </div>
                    <div class="input col s5" >
                      <label for="idFornecedor">Fornecedor *</label><br />
                      <select class="browser-default" name="idFornecedor">
                      @foreach($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="input col s5" style="margin-left: 8%">
                      <label for="tipoPagamento">Tipo Documento *</label><br />
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
                        <input type="text" name="parcelas" id="parcelas" placeholder="Parcelas" value="{{ $contaPagar->parcelas }}">
                    </div>


                    <div class="input col s6">
                        <label for="valor">Valor *</label><br />
                        <input type="text" name="valor" id="valor" placeholder="Valor" value="{{ $contaPagar->valor }}">
                    </div>
                  </div>




                <div class="row">
                    <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                    <a class="waves-effect waves-green btn-flat right" href="{{ route('contasPagar.index') }}">Cancelar</a>
                </div>
            </form>
            <p style="margin-left: 2%">* Campos Obrigatórios</p>
        </div>
    </div>
</div>

@endsection
