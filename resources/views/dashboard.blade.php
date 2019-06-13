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
                                            <div class="stat-digit"> <i class="fa fa-usd"></i>{{isset($recebido->soma) ? number_format($recebido->soma,2,',','.') : '0,00'}}</div>
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
                                            <div class="stat-digit"> <i class="fa fa-usd"></i>{{isset($recebido->soma) ? number_format($recebido->soma,2,',','.') : '0,00'}}</div>
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
                                              <div class="stat-digit"> <i class="fa fa-usd"></i>{{isset($recebido->soma) ? number_format($recebido->soma,2,',','.') : '0,00'}}</div>
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
                                            <div class="stat-digit"> <i class="fa fa-usd"></i>{{isset($recebido->soma) ? number_format($recebido->soma,2,',','.') : '0,00'}}</div>
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
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Sales Overview</h4>
                                        <div id="morris-bar-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="m-t-10">
                                        <p>Customer Feedback</p>
                                        <h5>385749</h5>
                                    </div>
                                    <div class="widget-card-circle pr m-t-20 m-b-20" id="info-circle-card">
                                        <i class="ti-control-shuffle pa"></i>
                                    </div>
                                    <ul class="widget-line-list m-b-15">
                                        <li class="border-right">92% <br><span class="color-success"><i class="ti-hand-point-up"></i> Positive</span></li>
                                        <li>8% <br><span class="color-danger"><i class="ti-hand-point-down"></i>Negative</span></li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </section>
                </div>
            </div>
        </div>

@endsection
