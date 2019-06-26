@extends('templates.layout')
@section('content-wrap')
<link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <div class="content-wrap">
                <div class="main">
                    <div class="container-fluid">

                        <form  method="GET" action="{{ route('contasPagar.index') }}">
                            <div class="row">
                                <div class="col-lg-6">

                                    <input class="form-control input-default "  type="text" name="filter" placeholder="Buscar um Titulo" value="{{$filter}}" />

                                </div>
                                <div class="col-lg-3">

                                    <select id="situacao_enum" name="situacao_enum" class="form-control input-default " class="validate" style="height: 38px; margin-bottom: 20px;">
                                        <option value="" selected>Situação</option>

                                        <option value="0">Aberto</option>
                                        <option value="1">Baixado</option>


                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Filtrar</button>
                                </div>
                            </div>



                        </form>
                        <!-- /# row -->

                        <section id="main-content">
                          <div class="row">
                              <div class="col s12">
                                <p class="card-intro">
                                    &nbsp;
                                    <a class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" href="{{ route('contasPagar.create') }}">
                                        <i class="ti-plus"></i>Adicionar
                                    </a>
                                </p>
                                  <div class="card table-responsive">
                                      @if(count($contasPagar))
                                      <table class="table table-bordered">
                                          <thead>
                                              <tr>
                                                  <th>ID</th>
                                                  <th>Descricao</th>
                                                  <th>Data de Emissão</th>
                                                  <th>Data de Vencimento</th>
                                                  <th>Fornecedor</th>
                                                  <th>Situação</th>
                                                  <th style="text-align: center">Valor</th>
                                                  <th style="text-align: center">Ações</th>
                                              </tr>
                                          </thead>

                                          <tbody>
                                              @foreach($contasPagar as $contaPagar)
                                              <tr class="with-options">
                                                  <td style="width: 2%">{{$contaPagar->id}}</td>
                                                  <td style="width: 15%">{{isset($contaPagar->descricao) ? $contaPagar->descricao : ''}}</td>
                                                  <td style="width: 10%">{{date("d/m/Y", strtotime($contaPagar->dataEmissao))}}</td>
                                                  <td style="width: 10%">{{date("d/m/Y", strtotime($contaPagar->dataVencimento))}}</td>
                                                  <td style="width: 10%">{{isset($contaPagar->idFornecedor) ? $contaPagar->fornecedor->nome : ''}}</td>
                                                  <td style="width: 5%">{{$contaPagar->situacao_descricao}}</td>
                                                  <td style="width: 15%; text-align: right">R$ {{isset($contaPagar->valor) ? number_format($contaPagar->valor, 2,',','.') : '0,00'}}</td>
                                                  <td style="width: 33%">
                                                      @if($contaPagar->situacao != 1)
                                                      <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('contasPagar.edit', ['$contaPagar' => $contaPagar->id]) }}">
                                                          <i class="ti-settings"></i>Editar</a>
                                                      </a>
                                                      <a class="btn btn-success btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('contasPagar.baixa', ['$contaPagar' => $contaPagar->id]) }}"><i class="ti-minus"></i>Baixar
                                                      <!--<button style="color:white" class="btn btn-success btn-flat btn-addon m-b-10 m-l-5" data-mytitle="{{$contaPagar->valorPago}}" data-toggle="modal" data-target="#modalBaixar">
                                                          <i class="ti-minus"></i>Baixar</button>-->

                                                      @else
                                                              <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5" target="_blank" href="{{ route('contasPagar.imprimir', ['$contaPagar' => $contaPagar->id]) }}"><i class="ti-printer"></i>Imprimir</a>

                                                              <a class="btn btn-info btn-flat btn-addon m-b-10 m-l-5" href="{{ route('contasPagar.show', ['$contaPagar' => $contaPagar->id]) }}">
                                                          <i class="ti-eye"></i>Ver</a>
                                                      </a>
                                                      <a class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5" href="{{ route('contasPagar.cancel', ['$contaPagar' => $contaPagar->id]) }}">
                                                          <i class="ti-close"></i>Cancelar Baixa</a>
                                                      </a>
                                                      @endif
                                                  </td>

                                              </tr>

                                              @endforeach
                                          </tbody>
                                      </table>
                                      @else
                                      <p class="alert-disable">Não há Contas a pagar.</p>
                                      @endif
                                  </div>
                                  {{ $contasPagar->appends(['filter'=>$filter])->links() }}
                              </div>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div>

                  <div class="modal" tabindex="-1" role="dialog" id="modalBaixar" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="modal-body">
                            <div class="row">
                                <div class="col s12 m4">
                                    <div class="card">
                                        <h5>Dados da Conta</h5>
                                        <p><b>Descrição: </b>{{ $contaPagar->descricao }}</p>
                                        <p><b>Data: </b>{{ date('d/m/Y' , strtotime($contaPagar->dataEmissao)) }}</p>
                                        <p><b>Situacao: </b>{{ $contaPagar->situacao_descricao}}</p>
                                        <p><b>Valor Despesa: </b>{{ number_format($contaPagar->valor, 2,',','.') }}</p>

                                    </div>
                                </div>

                            </div>
                                <div class="row">
                                  <div class="col s12 m4">
                                  <div class="card">
                                <form method="post" action="{{route('contasPagar.store')}}">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="hidden" id="id" name="id" value="{{ $contaPagar->id }}" />
                                  <input type="hidden" id="baixa" name="baixa" value="{{ $contaPagar->baixa }}" />

                                      <div class="col-lg-4">
                                        <label for="dataPagamento">Data Pagamento</label><br />
                                        <input class="form-control input-default " type="date" name="dataPagamento" id="dataPagamento" placeholder="Data" value="{{ $contaPagar->dataPagamento }}">
                                    </div>
                                      <div class="col-lg-4">
                                        <label for="valorPago">Valor Pago </label><br />
                                        <input class="form-control input-default " type="text" name="valorPago" id="valorPago" min="0" value="{{ $contaPagar->valorPago }}">
                                    </div>



                                  <div class="row" style="margin-top: 2%">
                                      <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                                      <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('contasPagar.index') }}">Cancelar</a>
                                  </div>
                                </form>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <script>

                  $('#modalBaixar').on('show.bs.modal', function (e) {
                      console.log('modal aberto');

                  })
                </script>

@endsection
