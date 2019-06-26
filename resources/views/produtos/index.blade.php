@extends('templates.layout')
@section('content-wrap')

<link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <div class="content-wrap">

                <div class="main">
                    <div class="container-fluid">

                        <form  method="GET" action="{{ route('produtos.index') }}">
                          <div class="row">
                            <div class="col-lg-6">

                                <input class="form-control input-default "  type="text" name="filter" placeholder="Buscar um Produto" value="{{$filter}}" />

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
                                      <a class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" href="{{ route('produtos.create') }}">
                                          <i class="ti-plus"></i>Adicionar
                                      </a>
                                  </p>
                                  <div class="card table-responsive">
                                    <h4>Listagem de Produtos</h4>
                                      @if(count($produtos))
                                      <table class="table table-bordered">
                                          <thead>
                                              <tr>
                                                  <th>Produto</th>
                                                  <th>Categoria</th>
                                                  <th>Valor Unitário</th>
                                                  <th>Valor Venda</th>
                                                  <th>Fornecedor</th>
                                                  <th>Ações</th>
                                              </tr>
                                          </thead>

                                          <tbody>
                                              @foreach($produtos as $produto)
                                              <tr class="with-options">
                                                  <td>{{$produto->nome}}</td>
                                                  <td>{{$produto->categorias->descricao}}</td>
                                                  <td style="text-align: right">R$ {{number_format($produto->valorUnitario, 2,',','.')}}</td>
                                                  <td style="text-align: right">R$ {{number_format($produto->valorSugerido, 2,',','.')}}</td>
                                                  <td>{{$produto->fornecedores->nome}}</td>
                                                  <td>
                                                    <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('produtos.edit', ['$produto' => $produto->id]) }}"><i class="ti-settings"></i>Ver</a>

                                                    <!--<a  class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('produtos.destroy', ['$produto' => $produto->id]) }}"><i class="ti-settings"></i>Excluir</button>
                                                    -->
                                                  </td>

                                              </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                      @else
                                      <p class="alert-disable">Não há Produtos cadastrados.</p>
                                      @endif
                                  </div>
                                  {{ $produtos->appends(['filter'=>$filter])->links() }}
                              </div>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div>


@endsection
