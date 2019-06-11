@extends('templates.layout')
@section('content-wrap')
<link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <div class="content-wrap">
                <div class="main">
                    <div class="container-fluid">
                        <div class="row">

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
                                      <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('contasReceber.create') }}">
                                          <i class="mdi mdi-plus"></i>
                                      </a>
                                  </p>
                                  <div class="card">
                                      @if(count($contasReceber))
                                      <table>
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
                                                  <td>{{$contaReceber->id}}</td>
                                                  <td>{{$contaReceber->descricao}}</td>
                                                  <td>{{date("d/m/Y", strtotime($contaReceber->dataEmissao))}}</td>
                                                  <td>{{date("d/m/Y", strtotime($contaReceber->dataVencimento))}}</td>
                                                  <td>{{$contaReceber->clientes ? $contaReceber->clientes->nome : ''}}</td>
                                                  <td>{{$contaReceber->vendedores ? $contaReceber->vendedores->nome : ''}}</td>
                                                  <td>{{$contaReceber->situacao_descricao}}</td>
                                                  <td>{{number_format($contaReceber->valor, 2,',','.')}}</td>
                                                  <td style="width: 30%">
                                                      @if($contaReceber->situacao != 1)
                                                      <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('contasReceber.edit', ['$contaReceber' => $contaReceber->id]) }}">
                                                          <i class="ti-settings"></i>Editar</a>
                                                      </a>
                                                      <a class="btn btn-success btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('contasReceber.baixa', ['$contaReceber' => $contaReceber->id]) }}">
                                                          <i class="ti-minus"></i>Baixar</a>

                                                      @else
                                                      <a class="btn btn-info btn-flat btn-addon m-b-10 m-l-5" href="{{ route('contasReceber.show', ['$contaReceber' => $contaReceber->id]) }}">
                                                          <span style="font-size: 14px; color: white">Ver</span>
                                                      </a>
                                                      <a class="btn btn-info btn-flat btn-addon m-b-10 m-l-5" href="{{ route('contasReceber.cancel', ['$contaReceber' => $contaReceber->id]) }}">
                                                          <span style="font-size: 14px; color: white">Cancelar Baixa</span>
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
