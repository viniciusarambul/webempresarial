@extends('templates.layout')
@section('content-wrap')
<link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <div class="content-wrap">
                <div class="main">
                    <div class="container-fluid">

                        <!-- /# row -->
                        <form  method="GET" action="{{ route('fluxoCaixa.index') }}">
                          <div class="row">
                            <div class="col-lg-3">
                               Data Base
                                <input class="form-control input-default "  type="date" name="filter" value="{{$filter}}"   />

                            </div>
                              <div class="col-lg-2" style="margin-top: 2%;">
                                  <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Filtrar</button>
                              </div>

                          </div>



                      </form>
                        <section id="main-content">
                          <div class="row">
                              <div class="col s12">

                                  <div class="card table-responsive">
                                    <h4>Fluxo de Caixa Diário</h4>
                                      @if(count($contasPagar))
                                      <?php $contador_saldo = 0;
                                        ?>
                                      <table class="table table-bordered">
                                          <thead>
                                              <tr>

                                                  <th>Descrição</th>
                                                  <th>Data Emissao</th>
                                                  <th>Data Vencimento</th>

                                                  <th>Data Pagamento</th>
                                                  <th>Valor Titulo</th>
                                                  <th>Valor Pago</th>


                                              </tr>
                                          </thead>

                                          <tbody>
                                              @foreach($contasPagar as $contasPagar)
                                              <tr >

                                                  <td>{{$contasPagar->descricao}}</td>
                                                  <td>{{date("d/m/Y", strtotime($contasPagar->dataEmissao))}}</td>
                                                  <td>{{date("d/m/Y", strtotime($contasPagar->dataVencimento))}}</td>

                                                  <td>{{date("d/m/Y", strtotime($contasPagar->dataPagamento))}}</td>
                                                  <td>{{number_format($contasPagar->valor,2,',','.')}}</td>
                                                  <td>{{$contasPagar->valorPago}}</td>


                                                  <?php $contador_saldo1 = $contador_saldo;?>
                                              </tr>
                                              @endforeach
                                              <!--<tr>
                                                <td colspan="6" align="right" style="color: black">Saldo:</td>
                                                <td style="text-align: center; color:black">
                                                    <b><?=$contador_saldo1?></b>
                                                </td>
                                            </tr>-->
                                          </tbody>
                                      </table>
                                      @else
                                      <p class="alert-disable">Não Tem Entradas e Nem Saída neste dia.</p>
                                      @endif

                                  </div>

                              </div>
                          </div>

                    </section>
                </div>
            </div>
        </div>

@endsection
