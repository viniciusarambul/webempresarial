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

                  <div class="row no-margin-bottom">
                      <div class="col s12">
                          <h4>
                              {{ $contaPagar->nome }}
                          </h4>
                      </div>
                  </div>


                  <div class="row">
                      <div class="col s12 m4">
                          <div class="card">
                              <h5>Dados da Despesa</h5>
                              <p><b>Descrição: </b>{{ $contaPagar->descricao }}</p>
                              <p><b>Data de Emissão: </b>{{date("d/m/Y", strtotime( $contaPagar->dataEmissao)) }}</p>
                              <p><b>Data de Vencimento: </b>{{ date("d/m/Y", strtotime($contaPagar->dataVencimento)) }}</p>
                              <p><b>Fornecedor: </b>{{ $contaPagar->idFornecedor }}</p>
                              <p><b>Situacao: </b>{{ $contaPagar->situacao_descricao }}</p>
                              <p><b>Parcelas: </b>{{ $contaPagar->parcelas }}</p>
                              <p><b>Tipo de Pagamento: </b>{{ $contaPagar->tipoPagamento }}</p>
                              <p><b>Valor: </b>{{ number_format($contaPagar->valor, 2, ',','.') }}</p>
                              <p><b>Data Pagamento: </b>{{$contaPagar->dataPagamento ? date("d/m/Y", strtotime($contaPagar->dataPagamento)) : '' }}</p>
                              <p><b>Valor Pago: </b>{{ $contaPagar->valorPago }}</p>

                          </div>
                      </div>



                        <form class="col s12 m4" method="post" action="{{ route('contasPagar.destroy',['id' => $contaPagar->id])}}">
                          <h5>Ações</h5>

                            {{ csrf_field() }}
                             <input type="hidden" name="_method" value="DELETE">
                             <button class="btn block red">Excluir</button>
                          <a class="btn blue white-text" href="{{ route('contasPagar.edit', ['id' => $contaPagar->id ]) }}"><i class="mdi mdi-pencil"></i>Editar</a>
                    </form>


                    </div>
                </section>
              </div>
            </div>
          </div>

@endsection
