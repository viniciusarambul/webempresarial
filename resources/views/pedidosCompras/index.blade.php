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
                        <form  method="GET" action="{{ route('pedidosCompras.index') }}">
                          <div class="row">
                            <div class="col-lg-6">

                                <input class="form-control input-default "  type="text" name="filter" placeholder="Buscar um Pedido" value="{{$filter}}" />

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
                                      <a class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" href="{{ route('pedidosCompras.create') }}">
                                          <i class="ti-plus"></i>Adicionar
                                      </a>
                                  </p>
                                  <div class="card">
                                      @if(count($pedidosCompras))
                                      <table>
                                          <thead>
                                              <tr>
                                                  <th>ID</th>
                                                  <th>Descrição</th>
                                                  <th>Data Pedido</th>
                                                  <th>Situação</th>
                                                  <th>Valor Compra</th>
                                                  <th>Ações</th>
                                              </tr>
                                          </thead>

                                          <tbody>
                                              @foreach($pedidosCompras as $pedidoCompra)
                                              <tr class="with-options">
                                                  <td>{{$pedidoCompra->id}}</td>
                                                  <td>{{$pedidoCompra->nome}}</td>
                                                  <td>{{date("d/m/Y", strtotime($pedidoCompra->data))}}</td>
                                                  <td>{{$pedidoCompra->situacao_descricao}}</td>
                                                  <td>{{number_format($pedidoCompra->titulo->preco,2,',','.')}}</td>
                                                  <td style="width: 30%">
                                                    @if($pedidoCompra->situacao == 1)
                                                    <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('pedidosCompras.show', ['$pedidoCompra' => $pedidoCompra->id]) }}"><i class="ti-settings"></i>Ver / Editar</a>

                                                    @else
                                                    <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('pedidosCompras.show', ['$pedidoCompra' => $pedidoCompra->id]) }}"><i class="ti-settings"></i>Ver / Editar</a>

                                                      <a class="waves-effect waves-light btn black" href="{{ route('pedidosCompras.show', ['$pedidoCompra' => $pedidoCompra->id]) }}">
                                                          <span style="font-size: 14px; color: white">Ver</span>
                                                      </a>
                                                      @endif
                                                  </td>

                                              </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                      @else
                                      <p class="alert-disable">Não há Pedidos Compra.</p>
                                      @endif
                                  </div>
                                  {{ $pedidosCompras->appends(['filter'=>$filter])->links() }}
                              </div>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div>



@endsection
