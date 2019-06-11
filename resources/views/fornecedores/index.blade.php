@extends('templates.layout')
@section('content-wrap')
<link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <div class="content-wrap">
          @if (\Session::has('error'))
              <div class="alert alert-danger">
                  <ul>
                      <li>{!! \Session::get('error') !!}</li>
                  </ul>
              </div>
          @endif
          @if (\Session::has('success'))
              <div class="alert alert-success">
                  <ul>
                      <li>{!! \Session::get('success') !!}</li>
                  </ul>
              </div>
          @endif
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
                        <form  method="GET" action="{{ route('fornecedores.index') }}">
                          <div class="row">
                            <div class="col-lg-6">

                                <input class="form-control input-default "  type="text" name="filter" placeholder="Buscar um Fornecedor (digite o CPF ou CNPJ)" value="{{$filter}}" />

                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Filtrar</button>
                              </div>
                          </div>



                        </form>
                        <!-- /# row -->

                        <section id="main-content">


                        <!--<form class="row no-margin-bottom" method="GET" action="{{ route('fornecedores.index') }}">
                            <div class="input col m6">
                                <input type="text" name="filter" class="no-margin-bottom" placeholder="Buscar um Fornecedor (digite o CPF ou CNPJ)" value="{{$filter}}">
                            </div>
                            <div class="input col m6">
                                <button type="submit" class="btn blue">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                            </div>
                        </form>-->

                        <div class="row">
                            <div class="col s12">
                                <p class="card-intro">
                                    &nbsp;
                                    <a class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" href="{{ route('fornecedores.create') }}">
                                        <i class="ti-plus"></i>Adicionar
                                    </a>
                                </p>
                                <div class="card">
                                    @if(count($fornecedores))
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Fornecedor</th>
                                                <th>Telefone</th>
                                                <th>CPF</th>
                                                <th>CNPJ</th>
                                                <th>E-mail</th>
                                                <th>Cidade</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($fornecedores as $fornecedor)
                                            <tr class="with-options">
                                                <td>{{$fornecedor->nome}}</td>
                                                <td>{{$fornecedor->telefone}}</td>
                                                <td>{{$fornecedor->cpf}}</td>
                                                <td>{{$fornecedor->cnpj}}</td>
                                                <td>{{$fornecedor->email}}</td>
                                                <td>{{$fornecedor->cidade}}</td>
                                                <td style="width: 30%">
                                                  <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('fornecedores.edit', ['$fornecedor' => $fornecedor->id]) }}"><i class="ti-settings"></i>Ver</a>

                                                  <!--<a  class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('fornecedores.destroy', ['$fornecedor' => $fornecedor->id]) }}"><i class="ti-settings"></i>Excluir</button>
                                                  -->
                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p class="alert-disable">Não há Fornecedores cadastrados.</p>
                                    @endif
                                </div>
                                {{ $fornecedores->appends(['filter'=>$filter])->links() }}
                            </div>
                        </div>
                      </section>
                    </div>
                  </div>
                </div>


@endsection
