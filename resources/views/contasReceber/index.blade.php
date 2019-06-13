@extends('templates.layout')
@section('content-wrap')
<link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <div class="content-wrap">
                <div class="main">
                    <div class="container-fluid">
                        <form  method="GET" action="{{ route('contasReceber.index') }}">
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
                                    <a class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" href="{{ route('contasReceber.create') }}">
                                        <i class="ti-plus"></i>Adicionar
                                    </a>
                                </p>
                                  <div class="card table-responsive">
                                      @if(count($contasReceber))
                                      <table class="table table-bordered">
                                          <thead>
                                              <tr>
                                                  <th>ID</th>
                                                  <th>Descricao</th>
                                                  <th>Data de Emissão</th>
                                                  <th>Data de Vencimento</th>
                                                  <th>Vendedor</th>
                                                  <th>Cliente</th>
                                                  <th>Situação</th>
                                                  <th>Valor</th>
                                                  <th style="text-align: center">Ação</th>
                                              </tr>
                                          </thead>

                                          <tbody>
                                              @foreach($contasReceber as $contaReceber)
                                              <tr class="with-options">
                                                  <td style="width: 2%">{{$contaReceber->id}}</td>
                                                  <td style="width: 18%">{{$contaReceber->descricao}}</td>
                                                  <td style="width: 10%">{{date("d/m/Y", strtotime($contaReceber->dataEmissao))}}</td>
                                                  <td style="width: 10%">{{date("d/m/Y", strtotime($contaReceber->dataVencimento))}}</td>
                                                  <td style="width: 10%">{{$contaReceber->clientes ? $contaReceber->clientes->nome : ''}}</td>
                                                  <td style="width: 5%">{{$contaReceber->vendedores ? $contaReceber->vendedores->nome : 'Nenhum'}}</td>
                                                  <td style="width: 5%">{{$contaReceber->situacao_descricao}}</td>
                                                  <td style="width: 10%">R$ {{isset($contaReceber->valor) ? number_format($contaReceber->valor, 2,',','.') : '0,00'}}</td>
                                                  <td style="width: 30%">

                                                      @if($contaReceber->situacao != 1)
                                                      <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('contasReceber.edit', ['$contaReceber' => $contaReceber->id]) }}">
                                                          <i class="ti-settings"></i>Editar</a>
                                                      </a>
                                                      <a class="btn btn-success btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('contasReceber.baixa', ['$contaReceber' => $contaReceber->id]) }}">
                                                          <i class="ti-minus"></i>Baixar</a>

                                                      @else
                                                      <a class="btn btn-info btn-flat btn-addon m-b-10 m-l-5" href="{{ route('contasReceber.show', ['$contaReceber' => $contaReceber->id]) }}">
                                                          <i class="ti-eye"></i>Ver</a>
                                                      </a>
                                                      <a class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5" href="{{ route('contasReceber.cancel', ['$contaReceber' => $contaReceber->id]) }}">
                                                        <i class="ti-close"></i>Cancelar Baixa</a>
                                                      </a>
                                                      @endif
                                                  </td>

                                              </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                      @else
                                      <p class="alert-disable">Não há contas a receber.</p>
                                      @endif
                                  </div>
                                  {{ $contasReceber->appends(['filter'=>$filter])->links() }}
                              </div>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div>

@endsection
