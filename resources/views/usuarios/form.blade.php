@extends('templates.layout')
@section('content-wrap')

<div class="content-wrap">
        <div class="main" >
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8 p-r-0 title-margin-right">
                      <div class="page-header">
                          <div class="page-title">
                              <h1>Cadastro de Produtos</h1>
                          </div>
                      </div>
                  </div>
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
                <!-- /# row -->
                <section id="main-content">

                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <form method="post" action="{{route('usuarios.store')}}" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" id="id" name="id" value="{{ $usuario->id }}" />
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <label for="nome">Nome *</label><br />
                                            <input class="form-control input-default " type="text" name="nome" id="nome" placeholder="Descrição" value="{{ $usuario->nome }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email">E-mail *</label><br />
                                            <input class="form-control input-default " type="text" name="email" id="email" placeholder="Descrição" value="{{ $usuario->email }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="login">Login *</label><br />
                                            <input class="form-control input-default " type="text" name="login" id="login" placeholder="Descrição" value="{{ $usuario->login }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="senha">Senha *</label><br />
                                            <input class="form-control input-default " type="text" name="senha" id="senha" placeholder="Descrição" value="{{ $usuario->senha }}">
                                        </div>
                                        <div class="col-lg-6">
                                             <label for="grupo_id">Grupo *</label><br />
                                          <select class="form-control input-default " required name="grupo_id">
                                            <option value="">Selecione</option>
                                            <option value="1">Administrador</option>
                                            <option value="2">Secretário(a)</option>
                                            <option value="3">Gerente</option>

                                          </select>
                                        </div>


                                    </div>
                                        <p style="margin-left: 2%">* Campos Obrigatórios</p>

                                    <div class="row" style="margin-top: 2%">
                                        <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                                        <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('usuarios.index') }}">Cancelar</a>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                  </section>
                </div>
              </div>
            </div>
<script>
document.addEventListener('DOMContentLoaded', function() {
var elems = document.querySelectorAll('.collapsible');
var instances = M.Collapsible.init(elems, options);
});
</script>

@endsection
