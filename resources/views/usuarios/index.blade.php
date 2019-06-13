@extends('templates.layout')
@section('content-wrap')
<link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <div class="content-wrap">
                <div class="main">
                    <div class="container-fluid">

                        <form  method="GET" action="{{ route('usuarios.index') }}">
                          <div class="row">
                            <div class="col-lg-6">

                                <input class="form-control input-default "  type="text" name="filter" placeholder="Buscar um Usuário" value="{{$filter}}" />

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
                                      <a class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" href="{{ route('usuarios.create') }}">
                                          <i class="ti-plus"></i>Adicionar
                                      </a>
                                  </p>
                                  <div class="card table-responsive">
                                    <h4>Listagem de Usuários</h4>
                                      @if(count($usuarios))
                                      <table class="table table-bordered">
                                          <thead>
                                              <tr>
                                                  <th>ID</th>
                                                  <th>Nome</th>
                                                  <th>Login</th>
                                                  <th style="text-align: center">E-mail</th>
                                                  <th>Ação</th>

                                              </tr>
                                          </thead>

                                          <tbody>
                                              @foreach($usuarios as $usuario)
                                              <tr class="with-options">
                                                  <td>{{$usuario->id}}</td>
                                                  <td>{{$usuario->nome}}</td>
                                                  <td>{{$usuario->login}}</td>
                                                  <td style="text-align: center" >{{$usuario->email}}</td>
                                                  <td>
                                                    <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('usuarios.edit', ['$usuario' => $usuario->id]) }}"><i class="ti-settings"></i>Editar</a>

                                                    <a  class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('usuarios.destroy', ['$usuario' => $usuario->id]) }}"><i class="ti-settings"></i>Excluir</button>

                                                  </td>

                                              </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                      @else
                                      <p class="alert-disable">Não há usuarios.</p>
                                      @endif
                                  </div>
                                  {{ $usuarios->appends(['filter'=>$filter])->links() }}
                              </div>
                          </div>


@endsection
