<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Web Empresarial</title>

        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
        <!-- Retina iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
        <!-- Retina iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
        <!-- Standard iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
        <!-- Standard iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

        <!-- Styles -->
        <link href="{{ asset('assets/css/lib/weather-icons.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/css/lib/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/lib/themify-icons.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/lib/bootstrap.min.css')}}" rel="stylesheet">

        <link href="{{ asset('assets/css/lib/helper.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    </head>

    <body>

        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                    <div class="logo"><a href="{{route('dashboard')}}"><!-- <img src="assets/images/logo.png" alt="" /> --><span>WEB EMPRESARIAL</span></a></div>
                    <ul>
                        <li class="label">Main</li>
                        <li class="active"><a class="sidebar-sub-toggle"><i class="ti-home"></i> Dashboard<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="{{route('dashboard')}}">Dashboard</a></li>



                            </ul>
                        </li>

                        <li class="label">Appicações</li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-view-list-alt"></i>  Cadastros  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="{{route('categorias.index')}}">Categorias</a></li>
                                <li><a href="{{route('clientes.index')}}">Clientes</a></li>
                                <li><a href="{{route('fornecedores.index')}}">Fornecedores</a></li>
                                <li><a href="{{route('produtos.index')}}">Produtos</a></li>
                                <li><a href="{{route('vendedores.index')}}">Vendedores</a></li>
                                <li><a href="{{route('usuarios.index')}}">Usuários</a></li>

                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i>  Relatórios  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="{{ url('consultasClientes') }}">Clientes</a></li>
                                <li><a href="{{ url('consultasFornecedores') }}">Fornecedores</a></li>
                                <li><a href="{{ url('consultasVendedores') }}">Vendedores</a></li>
                                <li><a href="{{ url('consultasProdutos') }}">Produtos</a></li>
                                <li><a href="{{ url('consultasPedidosVendas') }}">Pedidos Vendas</a></li>
                                <li><a href="{{ url('consultasPedidosCompras') }}">Pedidos Compras</a></li>
                                <li><a href="{{ url('consultasContasPagar') }}">Contas Pagar</a></li>
                                <li><a href="{{ url('consultasContasReceber') }}">Contas Receber</a></li>

                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-slice"></i>  Pedidos  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="{{route('pedidosCompras.index')}}">Compra</a></li>
                                <li><a href="{{route('pedidosVendas.index')}}">Venda</a></li>
                                <li><a href="{{route('estoque')}}">Estoque</a></li>

                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-money"></i>  Financeiro  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="{{route('contasPagar.index')}}">Contas a Pagar</a></li>
                                <li><a href="{{route('contasReceber.index')}}">Contas a Receber</a></li>
                                <li><a href="{{route('fluxoCaixa')}}">Fluxo de Caixa</a></li>
                            </ul>
                        </li>
                        <!--<li><a href="app-event-calender.html"><i class="ti-calendar"></i> Calendário </a></li>
                        <li><a href="app-email.html"><i class="ti-email"></i> Email</a></li>
                        <li><a href="app-profile.html"><i class="ti-user"></i> Perfil</a></li>-->
                        <li><a><i class="ti-close"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>


<div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-left">
                            <div class="hamburger sidebar-toggle">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="float-right">
                            <ul>

                                <!--<li class="header-icon dib"><i class="ti-bell"></i>
                                    <div class="drop-down">
                                        <!--<div class="dropdown-content-heading">
                                            <span class="text-left">Recent Notifications</span>
                                        </div>
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Vinicius Arambul</div>
                                                    <div class="notification-text">5 members joined today </div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Mariam</div>
                                                    <div class="notification-text">likes a photo of you</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Tasnim</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Mr. John</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li class="text-center">
                                                    <a href="#" class="more-link">See All</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                  </li>-->

                                <!--<li class="header-icon dib"><i class="ti-email"></i>
                                    <div class="drop-down">
                                        <div class="dropdown-content-heading">
                                            <span class="text-left">2 New Messages</span>
                                            <a href="email.html"><i class="ti-pencil-alt pull-right"></i></a>
                                        </div>
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li class="notification-unread">
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Michael Qin</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li class="notification-unread">
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Mr. John</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Michael Qin</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Mr. John</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li class="text-center">
                                                    <a href="#" class="more-link">See All</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>-->
                                <li class="header-icon dib"><span class="user-avatar">Vinicius Arambul <i class="ti-angle-down f-s-10"></i></span>
                                    <div class="drop-down dropdown-profile">

                                        <div class="dropdown-content-body">
                                            <ul>
                                                <!--<li><a href="#"><i class="ti-user"></i> <span>Profile</span></a></li>

                                                <li><a href="#"><i class="ti-email"></i> <span>Inbox</span></a></li>
                                                <li><a href="#"><i class="ti-settings"></i> <span>Setting</span></a></li>

                                                <li><a href="#"><i class="ti-lock"></i> <span>Lock Screen</span></a></li>-->
                                                <li><a href="{{ url('/main/logout') }}"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="search">
            <button type="button" class="close">×</button>
            <form>
                <input type="search" value="" placeholder="type keyword(s) here" />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>


            @yield('content-wrap')

        <!-- jquery vendor -->
        <script src="{{ asset('assets/js/lib/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/js/lib/jquery.nanoscroller.min.js')}}"></script>
        <!-- nano scroller -->
        <script src="{{ asset('assets/js/lib/menubar/sidebar.js')}}"></script>
        <script src="{{ asset('assets/js/lib/preloader/pace.min.js')}}"></script>
        <!-- sidebar -->
        <script src="{{ asset('assets/js/lib/bootstrap.min.js')}}"></script>

        <!-- bootstrap -->

        <script src="{{ asset('assets/js/lib/circle-progress/circle-progress.min.js')}}"></script>
        <script src="{{ asset('assets/js/lib/circle-progress/circle-progress-init.js')}}"></script>

        <script src="{{ asset('assets/js/lib/morris-chart/raphael-min.js')}}"></script>
        <script src="{{ asset('assets/js/lib/morris-chart/morris.js')}}"></script>
        <script src="{{ asset('assets/js/lib/morris-chart/morris-init.js')}}"></script>

        <!--  flot-chart js -->
        <script src="{{ asset('assets/js/lib/flot-chart/jquery.flot.js')}}"></script>
        <script src="{{ asset('assets/js/lib/flot-chart/jquery.flot.resize.js')}}"></script>
        <script src="{{ asset('assets/js/lib/flot-chart/flot-chart-init.js')}}"></script>
        <!-- // flot-chart js -->


        <script src="{{ asset('assets/js/lib/vector-map/jquery.vmap.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/jquery.vmap.min.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/jquery.vmap.sampledata.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.world.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.algeria.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.argentina.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.brazil.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.france.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.germany.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.greece.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.iran.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.iraq.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.russia.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.tunisia.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.europe.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.usa.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/vector.init.js')}}"></script>

        <script src="{{ asset('assets/js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
        <script src="{{ asset('assets/js/lib/weather/weather-init.js')}}"></script>
        <script src="{{ asset('assets/js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('assets/js/lib/owl-carousel/owl.carousel-init.js')}}"></script>
        <script src="{{ asset('assets/js/scripts.js')}}"></script>
        <script type="text/javascript" src="{{ asset('libs/jquery-mask/jquery.mask.min.js') }}"></script>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="{{ asset('libs/jquery/jquery-3.1.1.min.js') }}"></script>
        <!-- <script type="text/javascript" src="{{ asset('libs/jquery/jquery.maskMoney.js') }}"></script> -->
        <script type="text/javascript" src="{{ asset('libs/jquery-price/jquery.price_format.1.8.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/materialize/js/materialize.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/morris.js/morris.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/morris.js/raphael-min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/sweetAlert/sweetalert.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/tinymce/js/tinymce/tinymce.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/jquery-mask/jquery.mask.min.js') }}"></script>
        <!-- scripit init-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>
      $(document).ready(function () {
          app.init();
      });
      </script>
      <script>
      $(document).ready(function(){
      $('.date').mask('11/11/1111');
      $('.time').mask('00:00:00');
      $('.date_time').mask('00/00/0000 00:00:00');
      $('#cep').mask('00000-000');
      $('#telefone').mask('(00) 0000-0000');
      $('#celular').mask('(00) 00000-0000');
      $('.mixed').mask('AAA 000-S0S');
      $('.cpf').mask('000.000.000-00', {reverse: true});
      $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
      });


      </script>

      <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>

      <script>

      $(function() {
      $('#valor').priceFormat({
          prefix: '',
          centsSeparator: ',',
           thousandsSeparator: '.'
          });

      });

      $(document).ready(function(e) {
        $('#valor').blur(function () {
        var valor = $(this).val();
        if (valor == '0,00') {
          $(this).val(' ');
        }

      });
      });

      $(function() {
      $('#valorPago').priceFormat({
          prefix: '',
          centsSeparator: ',',
           thousandsSeparator: '.'
          });

      });

      $(document).ready(function(e) {
        $('#valorPago').blur(function () {
        var valor = $(this).val();
        if (valor == '0,00') {
          $(this).val(' ');
        }

      });
      });
      </script>
      <script>
      $(document).ready(function(){
      $("#cpfb").click(function(){
        $("#cnpjj").hide();
        $("#razao").hide();
        $("#sobrenome").show();
        $("#nome").show();
        $("#cpff").show();
      });
      $("#cnpjb").click(function(){
        $("#cnpjj").show();
        $("#razao").show();
        $("#cpff").hide();
        $("#nome").hide();
        $("#sobrenome").hide();
      });
      });
      </script>
        </body>
