@extends('templates.layout')
@section('content-wrap')
<link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <div class="content-wrap">
                <div class="main">
                    <div class="container-fluid">
                        <section id="main-content">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-two">
                                        <div class="stat-content">
                                            <div class="stat-text">Recebidos Hoje </div>
                                            @foreach($recebidos as $recebido)
                                            <div class="stat-digit"> R$ {{isset($recebido->soma) ? number_format($recebido->soma,2,',','.') : '0,00'}}</div>
                                            @endforeach
                                        </div>
                                        <div class="progress">
                                          </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-two">
                                        <div class="stat-content">
                                            <div class="stat-text">Pagos Hoje</div>
                                            @foreach($pagos as $recebido)
                                            <div class="stat-digit"> R$ {{isset($recebido->soma) ? number_format($recebido->soma,2,',','.') : '0,00'}}</div>
                                            @endforeach
                                        </div>
                                        <div class="progress">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-two">
                                        <div class="stat-content">
                                            <div class="stat-text">Vendas do Dia</div>
                                              @foreach($vendasdia as $recebido)
                                              <div class="stat-digit"> R$ {{isset($recebido->soma) ? number_format($recebido->soma,2,',','.') : '0,00'}}</div>
                                              @endforeach
                                        </div>
                                        <div class="progress">
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-two">
                                        <div class="stat-content">
                                            <div class="stat-text">Compras do Dia</div>
                                            @foreach($comprasdia as $recebido)
                                            <div class="stat-digit"> R$ {{isset($recebido->soma) ? number_format($recebido->soma,2,',','.') : '0,00'}}</div>
                                            @endforeach
                                        </div>
                                        <div class="progress">
                                            </div>
                                    </div>
                                </div>
                                <!-- /# card -->
                            </div>
                            <!-- /# column -->
                        </div>


                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-6">
                                <div class="card">

                                        <h4 class="card-title" style="text-align: center; color:blue">Contas a Receber {{date('d/m/Y', strtotime($hoje))}}</h4>
                                        <div class="card table-responsive" style="overflow: auto; height: 250px;">
                                            @if(count($receitasdodia))
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>

                                                        <th>Cliente</th>

                                                        <th style="text-align: center">Valor</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($receitasdodia as $contaPagar)
                                                    <tr class="with-options">
                                                        <td style="width: 2%">{{$contaPagar->id}}</td>

                                                        <td style="width: 10%">{{$contaPagar->nomefornecedor}}</td>
                                                        <td style="width: 15%; text-align: right">R$ {{isset($contaPagar->valor) ? number_format($contaPagar->valor, 2,',','.') : '0,00'}}</td>


                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <p class="alert-disable">Não há Contas a pagar.</p>
                                            @endif

                                </div>
                            </div>
                          </div>
                            <div class="col-lg-6">
                                <div class="card">

                                        <h4 class="card-title" style="text-align: center; color:red">Contas a pagar {{date('d/m/Y', strtotime($hoje))}}</h4>
                                        <div class="card table-responsive" style="overflow: auto; height: 250px;">
                                            @if(count($contasdodia))
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>

                                                        <th>Fornecedor</th>

                                                        <th style="text-align: center">Valor</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($contasdodia as $contaPagar)
                                                    <tr class="with-options">
                                                        <td style="width: 2%">{{$contaPagar->id}}</td>

                                                        <td style="width: 10%">{{$contaPagar->nomefornecedor}}</td>
                                                        <td style="width: 15%; text-align: right">R$ {{isset($contaPagar->valor) ? number_format($contaPagar->valor, 2,',','.') : '0,00'}}</td>


                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <p class="alert-disable">Não há Contas a pagar.</p>
                                            @endif

                                </div>
                            </div>
                          </div>


                        </div>

                    </section>
                </div>
            </div>
        </div>

@endsection
