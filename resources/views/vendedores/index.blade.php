@extends('templates.layout')
@section('content-wrap')
<link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <div class="content-wrap">
                <div class="main">
                    <div class="container-fluid">

                        <!-- /# row -->
                        <form  method="GET" action="{{ route('vendedores.index') }}">
                          <div class="row">
                            <div class="col-lg-6">

                                <input class="form-control input-default "  type="text" name="filter" placeholder="Buscar um Vendedor (digite o CPF ou CNPJ)" value="{{$filter}}" />

                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Filtrar</button>
                              </div>
                          </div>
                        </form>
                        <section id="main-content">
                          <div class="row">
                              <div class="col s12">
                                  <p class="card-intro">
                                      &nbsp;
                                      <a class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" href="{{ route('vendedores.create') }}">
                                          <i class="ti-plus"></i>Adicionar
                                      </a>
                                  </p>
                                  <div class="card table-responsive">
                                    <h4>Listagem de Vendedores</h4>
                                      @if(count($vendedores))
                                      <table class="table table-bordered">
                                          <thead>
                                              <tr>
                                                  <th>Vendedor</th>
                                                  <th>Telefone</th>
                                                  <th>CPF</th>
                                                  <th>CNPJ</th>
                                                  <th>E-mail</th>
                                                  <th>Cidade</th>
                                                  <th>Ações</th>
                                              </tr>
                                          </thead>

                                          <tbody>
                                              @foreach($vendedores as $vendedor)
                                              <tr class="with-options">
                                                  <td>{{$vendedor->nome}}</td>
                                                  <td>{{$vendedor->telefone}}</td>
                                                  <td>{{$vendedor->cpf}}</td>
                                                  <td>{{$vendedor->cnpj}}</td>
                                                  <td>{{$vendedor->email}}</td>
                                                  <td>{{$vendedor->cidade}}</td>
                                                  <td>
                                                    <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('vendedores.edit', ['$vendedor' => $vendedor->id]) }}"><i class="ti-settings"></i>Ver</a>

                                                    <!--<a  class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('vendedores.destroy', ['$vendedor' => $vendedor->id]) }}"><i class="ti-settings"></i>Excluir</button>
                                                    -->
                                                  </td>

                                              </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                      @else
                                      <p class="alert-disable">Não há vendedores Cadastrados.</p>
                                      @endif
                                  </div>
                                  {{ $vendedores->appends(['filter'=>$filter])->links() }}
                              </div>
                          </div>


@endsection
