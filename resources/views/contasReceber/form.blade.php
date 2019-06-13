@extends('templates.layout')
@section('content-wrap')

<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8 p-r-0 title-margin-right">
                      <div class="page-header">
                          <div class="page-title">
                              <h1>Cadastro de Conta Receber</h1>
                          </div>
                      </div>
                  </div>

                </div>
                <!-- /# row -->
                <section id="main-content">
                  <div class="row">
                      <div class="col s12">
                          <div class="card">
                              <form method="post" action="{{route('contasReceber.store')}}" enctype="multipart/form-data">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="hidden" id="id" name="id" value="{{ $contaReceber->id }}" />
                                  <div class="row">
                                      <div class="input col-lg-6">
                                          <label for="descricao">Descrição *</label><br />
                                          <input class="form-control input-default" type="text" name="descricao" required id="descricao" placeholder="Descrição" value="{{ $contaReceber->descricao }}">
                                      </div>
                                      <div class="input col-lg-6">
                                          <label for="dataEmissao">Data Emissão *</label><br />
                                          <input class="form-control input-default" type="date" name="dataEmissao" id="dataEmissao" required placeholder="Data" value="{{ $contaReceber->dataEmissao }}">
                                      </div>

                                      <div class="input col s5">
                                           <label for="situacao">Situação *</label><br />
                                        <select class="form-control input-default" readonly name="situacao">

                                          <option value="0" <?php if($contaReceber->situacao == '0') {echo 'selected';} ?>>Aberto</option>
                                          <option value="1" <?php if($contaReceber->situacao == '1') {echo 'selected';} ?>>Baixado</option>
                                          <option value="2" <?php if($contaReceber->situacao == '2') {echo 'selected';} ?>>Atrasado</option>
                                        </select>
                                      </div>
                                      <div class="input col-lg-6" style="margin-left:8%;">
                                          <label for="dataVencimento">Data Vencimento *</label><br />
                                          <input class="form-control input-default" type="date" name="dataVencimento" id="dataVencimento" required placeholder="Data" value="{{ $contaReceber->dataVencimento }}">
                                      </div>
                                      <div class="input col-lg-5" >
                                        <label for="idCliente">Cliente *</label><br />
                                        <select class="form-control input-default" name="idCliente">
                                        @foreach($clientes as $cliente)
                                          <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="input col s5" style="margin-left: 8%">
                                        <label for="tipoPagamento">Tipo Documento *</label><br />
                                        <select class="form-control input-default" name="tipoPagamento">

                                          <option value="0">Boleto</option>
                                          <option value="1">Cartão de Crédito</option>
                                          <option value="6">Recibo</option>

                                        </select>
                                      </div>
                                      <div class="input col-lg-6">
                                          <label for="parcelas">Parcelas (Preencha apenas para lançamentos parcelados)</label><br />
                                          <input class="form-control input-default" type="text" name="parcelas" id="parcelas" placeholder="Parcelas" value="{{ $contaReceber->parcelas }}">
                                      </div>


                                      <div class="input col-lg-6">
                                          <label for="valor">Valor *</label><br />
                                          <input class="form-control input-default" type="text" name="valor" id="valor" required placeholder="Valor" value="{{ $contaReceber->valor }}">
                                      </div>
                                    </div>




                                  <div class="row">
                                    <div class="row" style="margin-top: 2%">
                                        <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                                        <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('contasReceber.index') }}">Cancelar</a>
                                        <a class="btn btn-danger btn-flat m-b-15 m-l-15" style="color:white"  data-toggle="modal" data-target="#meuModal">Excluir</a>
                                    </div>  </div>
                              </form>
                              <p style="margin-left: 2%">* Campos Obrigatórios</p>
                          </div>
                      </div>
                  </div>
                </section>
              </div>
            </div>
          </div>

          <!-- MODAL EXCLUSÃO -->
          <div class="modal" tabindex="-1" role="dialog" id="meuModal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

                  <div class="row">
                      <div class="col-lg-12">
                          <div class="card">
                            <div class="col-lg-12">
                              Deseja realmente excluir a Conta <span id="categoriaDescricao"> </span> {{$contaReceber->descricao}} ?
                            </div>
                            <form class="col-lg-12" method="post" action="{{ route('contasReceber.destroy',['$contaReceber' => $contaReceber->id])}}">
                                {{ csrf_field() }}
                                 <input type="hidden" name="_method" value="DELETE">
                                 <input type="hidden" name="id" id="id" value="{{$contaReceber->id}}">
                                 <div class="col-lg-12">
                                     <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Sim</button>
                                       <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('contasReceber.index') }}">Cancelar</a>
                                  </div>
                            </form>

                          </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>

@endsection
