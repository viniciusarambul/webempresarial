@extends('templates.layout')
@section('content-wrap')
<link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <div class="content-wrap">
                <div class="main">
                    <div class="container-fluid">
                        <div class="row">

                        </div>
                        <!-- /# row -->
                        <form  method="GET" action="{{ route('fluxoCaixa') }}">
                          <div class="row">
                            <div class="col-lg-6">
                              <label> Data Base
                                <input class="form-control input-default "  type="date" name="filter" placeholder="Buscar um Pedido"  />

                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Filtrar</button>
                              </div>
                          </div>



                        </form>
                        <section id="main-content">
                          <div class="row">
                              <div class="col s12">

                                  <div class="card table-responsive">
                                    <h4>Fluxo de Caixa</h4>
                                      @if(count($contasPagar))
                                      <?php $contador_saldo = 0;
                                        ?>
                                      <table class="table table-bordered">
                                          <thead>
                                              <tr>

                                                  <th>Descrição</th>
                                                  <th>Data Emissao</th>
                                                  <th>Data Vencimento</th>
                                                  <th>Situação</th>
                                                  <th>Data Pagamento</th>
                                                  <th>Valor Titulo</th>
                                                  <th>Valor Pago</th>
                                                  <th>TP</th>

                                              </tr>
                                          </thead>

                                          <tbody>
                                              @foreach($contasPagar as $contasPagar)
                                              <tr >

                                                  <td>{{$contasPagar->descricao}}</td>
                                                  <td>{{date("d/m/Y", strtotime($contasPagar->dataEmissao))}}</td>
                                                  <td>{{date("d/m/Y", strtotime($contasPagar->dataVencimento))}}</td>
                                                  <td>{{$contasPagar->situacao}}</td>
                                                  <td>{{date("d/m/Y", strtotime($contasPagar->dataVencimento))}}</td>
                                                  <td>{{number_format($contasPagar->valor,2,',','.')}}</td>
                                                  <td>{{number_format($contasPagar->valorPago,2,',','.')}}</td>
                                                  <td>Débito</td>

                                                  <?php $contador_saldo1 = $contador_saldo+=$contasPagar->valorPago?>
                                              </tr>
                                              @endforeach
                                              <tr>
                                                <td colspan="6" align="right" style="color: black">Saldo:</td>
                                                <td style="text-align: center; color:black">
                                                    <b><?=number_format(($contador_saldo1), 2,',','.')?></b>
                                                </td>
                                              </tr>
                                          </tbody>
                                      </table>
                                      @else
                                      <p class="alert-disable">Não há Pedidos Compra.</p>
                                      @endif

                                  </div>

                              </div>
                          </div>

                    </section>
                </div>
            </div>
        </div>

@endsection
