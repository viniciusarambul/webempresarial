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
                        <!-- /# row -->
                        <section id="main-content">
                            <div class="row">

                                <!-- /# column -->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-title">
                                            <h4>Listagem de Categorias </h4>

                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                  @if(count($categorias))
                                                    <table class="table table-hover ">
                                                      <thead>
                                                          <tr>
                                                              <th>ID</th>
                                                              <th>Descricao</th>
                                                              <th>Ações</th>

                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          @foreach($categorias as $categoria)
                                                          <tr class="with-options">
                                                              <td>{{$categoria->id}}</td>
                                                              <td>{{$categoria->descricao}}</td>
                                                              <td style="width: 30%">

                                                                  <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('categorias.edit', ['$categoria' => $categoria->id]) }}"><i class="ti-settings"></i>Editar</a>

                                                                  <a  class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('categorias.destroy', ['$categoria' => $categoria->id]) }}"><i class="ti-settings"></i>Excluir</button>


                                                              </td>

                                                          </tr>
                                                          @endforeach
                                                      </tbody>
                                                </table>
                                                @else
                                                <p class="alert-disable">Não há categorias.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /# card -->
                                </div>
                                <!-- /# column -->
                            </div>
                            <!-- /# row -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="footer">
                                        <p>2018 © Admin Board. - <a href="#">example.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
@endsection
