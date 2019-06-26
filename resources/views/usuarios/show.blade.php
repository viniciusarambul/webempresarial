@extends('templates.layout')
@section('content-wrap')

<div class="content-wrap">
        <div class="main" >
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8 p-r-0 title-margin-right">
                      <div class="page-header">
                          <div class="page-title">
                              <h1>Usuario {{$usuario->nome}}</h1>
                          </div>
                      </div>
                  </div>

                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">

                    <div class="row">
                        <div class="col s12 m4">
                            <div class="card">
                                <h5>Dados da Usuario</h5>
                                <p><b>Nome: </b>{{ $usuario->nome }}</p>
                                <p><b>Login: </b>{{ $usuario->login }}</p>
                                <p><b>E-mail: </b>{{ $usuario->email }}</p>

                            </div>


                              <a class="btn btn-danger btn-flat m-b-15 m-l-15" style="color:white"  data-toggle="modal" data-target="#meuModal">Excluir</a>
                            <a class="btn btn-success btn-flat m-b-15 m-l-15" href="{{ route('usuarios.edit', ['id' => $usuario->id ]) }}"><i class="ti-pencil"></i>Editar</a>
                        </div>


                      </div>

                        <div class="col s12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-title">
                                        Permissões
                                    </div>

                                    @if(count($permissoes))
                                    <form class="row" method="post" action="{{ route('usuarios.salvarPermissoes', ['usuario' => $usuario->id]) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        @foreach($permissoes as $permissao)
                                        <div class="col-lg-3">
                                            <p>
                                                <label>
                                                    <input type="checkbox" name="permissoes[{{ $permissao->id }}]" {{ $permissao->possui_permissao ? 'checked' : '' }} />
                                                    <span>{{ $permissao->descricao }}</span>
                                                </label>
                                            </p>
                                        </div>
                                        @endforeach

                                        <div class="col s12">
                                            <br />
                                            <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar Permissão do Usuário</button>

                                        </div>
                                    </form>
                                    @else
                                        <p>Nenhuma permissão cadastrada</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>


<!-- MODAL EXCLUSÃO -->
<div class="modal" tabindex="-1" role="dialog" id="meuModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="col-lg-12">
                            Deseja realmente excluir o Usuário <span id="categoriaDescricao"> </span> {{$usuario->login}} ?
                        </div>
                        <form class="col-lg-12" method="post" action="{{ route('usuarios.destroy',['$usuario' => $usuario->id])}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" id="id" value="{{$usuario->id}}">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Sim</button>
                                <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('usuarios.index') }}">Cancelar</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
