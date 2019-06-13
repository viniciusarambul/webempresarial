@extends('templates.layout')
@section('content-wrap')
<link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <div class="content-wrap">
                <div class="main">
                    <div class="container-fluid">

                        <form  method="GET" action="{{ route('contasPagar.index') }}">
                          <div class="row">
                            <div class="col-lg-6">

                                <input class="form-control input-default "  type="text" name="filter" placeholder="Buscar uma conta" value="{{$filter}}" />

                            </div>
                            <div class="col-lg-6">
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
                                                  <td style="width: 15%">{{$contaPagar->descricao}}</td>
                                                  <td style="width: 10%">{{date("d/m/Y", strtotime($contaPagar->dataEmissao))}}</td>
                                                  <td style="width: 10%">{{date("d/m/Y", strtotime($contaPagar->dataVencimento))}}</td>
                                                  <td style="width: 10%">{{$contaPagar->fornecedor->nome}}</td>
                                                  <td style="width: 5%">{{$contaPagar->situacao_descricao}}</td>
                                                  <td style="width: 15%; text-align: right">R$ {{isset($contaPagar->valor) ? number_format($contaPagar->valor, 2,',','.') : '0,00'}}</td>
                                                  <td style="width: 33%">
                                                      @if($contaPagar->situacao != 1)
                                                      <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('contasPagar.edit', ['$contaPagar' => $contaPagar->id]) }}">
                                                          <i class="ti-settings"></i>Editar</a>
                                                      </a>
                                                      <a class="btn btn-success btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('contasPagar.baixa', ['$contaPagar' => $contaPagar->id]) }}">
                                                          <i class="ti-minus"></i>Baixar</a>

                                                      @else
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

@endsection
