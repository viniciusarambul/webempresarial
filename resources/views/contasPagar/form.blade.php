@extends('templates.layout')
@section('content-wrap')

<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8 p-r-0 title-margin-right">
                      <div class="page-header">
                          <div class="page-title">
                              <h1>Cadastro de Conta Pagar</h1>
                          </div>
                      </div>
                  </div>

                </div>
                <!-- /# row -->
                <section id="main-content">
                  <div class="row">
                      <div class="col s12">
                          <div class="card">
                              <form method="post" action="{{route('contasPagar.store')}}" enctype="multipart/form-data">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="hidden" id="id" name="id" value="{{ $contaPagar->id }}" />
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <label for="descricao">Descrição *</label><br />
                                          <input class="form-control input-default " type="text" name="descricao" id="descricao" placeholder="Descrição" value="{{ $contaPagar->descricao }}">
                                      </div>
                                      <div class="col-lg-3">
                                          <label for="dataEmissao">Data Emissão *</label><br />
                                          <input class="form-control input-default " type="date" name="dataEmissao" required id="dataEmissao" placeholder="Data" value="{{ $contaPagar->dataEmissao }}">
                                      </div>

                                      <div class="col-lg-3">
                                           <label for="situacao">Situação *</label><br />
                                        <select class="form-control input-default " readonly required name="situacao">
                                          <option value="">Selecione</option>
                                          <option value="0" selected>Aberto</option>
                                          <option value="1">Baixado</option>
                                          <option value="2">Atrasado</option>
                                        </select>
                                      </div>
                                      <div class="col-lg-3">
                                          <label for="dataVencimento">Data Vencimento *</label><br />
                                          <input type="date" name="dataVencimento" class="form-control input-default " id="dataVencimento" placeholder="Data" value="{{ $contaPagar->dataVencimento }}">
                                      </div>
                                      <div class="col-lg-3" >
                                        <label for="idFornecedor">Fornecedor *</label><br />
                                        <select class="form-control input-default " name="idFornecedor">
                                        @foreach($fornecedores as $fornecedor)
                                          <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-lg-3">
                                        <label for="tipoPagamento">Tipo Documento *</label><br />
                                        <select class="form-control input-default " name="tipoPagamento">

                                          <option value="0">Boleto</option>
                                          <option value="1">Cartão de Crédito</option>
                                          <option value="2">Cartão de Débito</option>
                                          <option value="6">Recibo</option>

                                        </select>
                                      </div>
                                      <div class="col-lg-3">
                                          <label for="parcelas">Parcelas (Preencha apenas para lançamentos parcelados)</label><br />
                                          <input type="text" name="parcelas" class="form-control input-default " id="parcelas" placeholder="Parcelas" value="{{ $contaPagar->parcelas }}">
                                      </div>


                                      <div class="col-lg-3">
                                          <label for="valor">Valor *</label><br />
                                          <input class="form-control input-default " type="text" name="valor" id="valor" placeholder="Valor" value="{{ $contaPagar->valor }}">
                                      </div>
                                    </div>





                                    <p style="margin-left: 2%">* Campos Obrigatórios</p>

                                    <div class="row" style="margin-top: 2%">
                                        <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                                        <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('clientes.index') }}">Cancelar</a>

                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
@endsection
