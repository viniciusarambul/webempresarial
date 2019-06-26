@extends('templates.layout')
@section('content-wrap')

<div class="content-wrap">
        <div class="main" >
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8 p-r-0 title-margin-right">

                  </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Table-Basic</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                  <div class="row">
                      <div class="col s12 m4">
                          <div class="card">
                              <h5>Dados do Pedido</h5>
                              <p><b>Descrição: </b>{{ $contaReceber->descricao }}</p>
                              <p><b>Data: </b>{{ date('d/m/Y' , strtotime($contaReceber->dataEmissao)) }}</p>
                              <p><b>Situacao: </b>{{ $contaReceber->situacao_descricao}}</p>
                              <p><b>Valor Receita: </b>{{ number_format($contaReceber->valor, 2,',','.') }}</p>

                          </div>
                      </div>

                  </div>
                  <div class="row">
                    <div class="col s12 m4">
                    <div class="card">
                  <form method="post" action="{{route('contasReceber.store')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="id" name="id" value="{{ $contaReceber->id }}" />
                    <input type="hidden" id="baixa" name="baixa" value="1" />

                        <div class="col-lg-4">
                          <label for="dataPagamento">Data Pagamento</label><br />
                          <input class="form-control input-default " type="date" name="dataPagamento" id="dataPagamento" placeholder="Data" value="{{ $contaReceber->dataPagamento }}">
                      </div>
                        <div class="col-lg-4">
                          <label for="valorPago">Valor Pago </label><br />
                          <input class="form-control input-default " type="text" name="valorPago" id="valorPago" min="0" value="{{ $contaReceber->valorPago }}">
                      </div>



                    <div class="row" style="margin-top: 2%">
                        <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                        <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('contasReceber.index') }}">Cancelar</a>
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
