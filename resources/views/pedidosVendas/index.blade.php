@extends('templates.layout')
@section('content-wrap')
<link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <div class="content-wrap">
                <div class="main">
                    <div class="container-fluid">

                        <form  method="GET" action="{{ route('pedidosVendas.index') }}">
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
                                      <a class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" href="{{ route('pedidosVendas.create') }}">
                                          <i class="ti-plus"></i>Adicionar
                                      </a>
                                  </p>
                                  <div class="card table-responsive">
                                    <h4>Listagem Pedidos de Venda</h4>
                                      @if(count($pedidosVendas))
                                      <table class="table table-bordered">
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
                                              @foreach($pedidosVendas as $pedidoVenda)
                                              <tr class="with-options">
                                                  <td>{{$pedidoVenda->id}}</td>
                                                  <td>{{$pedidoVenda->nome}}</td>
                                                  <td>{{date("d/m/Y", strtotime($pedidoVenda->data))}}</td>
                                                  <td>{{$pedidoVenda->situacao_descricao}}</td>
                                                  <td style="text-align: right">R$ {{number_format($pedidoVenda->titulo->preco,2,',','.')}}</td>
                                                  <td >
                                                    @if($pedidoVenda->situacao == 1)
                                                    <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('pedidosVendas.show', ['$pedidoVenda' => $pedidoVenda->id]) }}"><i class="ti-settings"></i>Ver / Editar</a>

                                                    @else
                                                    <a class="btn btn-info btn-flat btn-addon m-b-10 m-l-5" href="{{ route('pedidosVendas.faturar', ['$pedidoVenda' => $pedidoVenda->id]) }}">
                                                      Faturar
                                                    </a>
                                                    <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('pedidosVendas.show', ['$pedidoVenda' => $pedidoVenda->id]) }}"><i class="ti-settings"></i>Ver / Editar</a>
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
                                  {{ $pedidosVendas->appends(['filter'=>$filter])->links() }}
                              </div>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div>



@endsection
