<!DOCTYPE html>
<html>

    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114938863-2"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-114938863-2');
        </script>

        <script>window.csrf_token = '{{ csrf_token() }}';</script>
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="{{ asset('libs/materialize/css/materialize.min.css') }}" media="screen,projection" />

        <!--    <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="{{ asset('libs/material-icons/css/materialdesignicons.min.css') }}">

        <link type="text/css" rel="stylesheet" href="{{ asset('css/custom.css') }}" media="screen,projection" />
        <link type="text/css" rel="stylesheet" href="{{ asset('libs/sweetAlert/sweetalert.css') }}" media="screen,projection" />

        <title>{{$title}}</title>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <style media="screen">
          .attempt {
            position: absolute;
            right: 0;
            height: 71px;
            width: 350px;
            line-height: 18px;
            margin-top: 16px;
          }
          .attempt b{
            display: block;
          }
          .attempt small{
            display: block;
          }
        </style>
    </head>

    <body>
        <aside>
            <div class="logo-area">
                <img src="{{ asset('img/logo-cart.png') }}" alt="">
            </div>
            <ul>
                <li class="{{$active_router == 'clientes' ? 'active' : ''}}">
                  <a href="{{route('clientes.index')}}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="clientes">
                    <i class="mdi mdi-account"></i>
                  </a>
                </li>
                <li class="{{$active_router == 'fornecedores' ? 'active' : ''}}">
                  <a href="{{route('fornecedores.index')}}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="fornecedores">
                    <i class="mdi mdi-truck"></i>
                  </a>
                </li>
                <li class="{{$active_router == 'produtos' ? 'active' : ''}}">
                  <a href="{{route('produtos.index')}}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="produtos">
                    <i class="mdi mdi-folder"></i>
                  </a>
                </li>
                <li class="{{$active_router == 'pedidosCompras' ? 'active' : ''}}">
                  <a href="{{route('pedidosCompras.index')}}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Pedidos Compra">
                    <i class="mdi mdi-briefcase"></i>
                  </a>
                </li>
                <li class="{{$active_router == 'pedidosVendas' ? 'active' : ''}}">
                  <a href="{{route('pedidosVendas.index')}}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Pedidos Venda">
                    <i class="mdi mdi-briefcase"></i>
                  </a>
                </li>
                <li class="{{$active_router == 'contasReceber' ? 'active' : ''}}">
                  <a href="{{route('contasReceber.index')}}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Contas Receber">
                    <i class="mdi mdi-coin"></i>
                  </a>
                </li>
                <li class="{{$active_router == 'contasPagar' ? 'active' : ''}}">
                  <a href="{{route('contasPagar.index')}}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Contas Pagar">
                    <i class="mdi mdi-currency-usd"></i>
                  </a>
                </li>

            </ul>
        </aside>

        <main>

            <header>
                <div class="back waves-effect waves-light">
                    <a href="{{ route($prev_router) }}">
                        <i class="mdi mdi-arrow-left"></i>
                    </a>
                </div>
                <div class="icon waves-effect waves-light">
                    <i class="{{$icon}}"></i>
                </div>
                <div class="attempt">
                     <b>vinicius</b>
                     <small>email</small>
                 </div>
            </header>

            <section>
                @yield('container')
            </section>
        </main>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="{{ asset('libs/jquery/jquery-3.1.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/jquery/jquery.maskMoney.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/materialize/js/materialize.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/sweetAlert/sweetalert.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/tinymce/js/tinymce/tinymce.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/jquery-mask/jquery.mask.min.js') }}"></script>
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
          $('.cep').mask('00000-000');
          $('.telefone').mask('(00) 0000-0000');
          $('.celular').mask('(00) 00000-0000');
          $('.mixed').mask('AAA 000-S0S');
          $('.cpf').mask('000.000.000-00', {reverse: true});
          $('.cnpj').mask('00.000/0000-00', {reverse: true});
        });


          </script>
        <script>
          $(document).ready(function(){
            $("#cpfb").click(function(){
              $('#cpf').val('');
              $("#cnpjj").hide();
              $("#cpff").show();
            });
            $("#cnpjb").click(function(){
              $('#cnpj').val('');
              $("#cnpjj").show();
              $("#cpff").hide();
            });
          });
        </script>

        @if(Session::has('error'))
        <script>
            app.alert('{{Session::get('error')}}', 'error');
        </script>
        @endif

        @if(Session::has('success'))
        <script>
            app.alert('{{Session::get('success')}}', 'success');
        </script>
        @endif

        @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                app.alert('{{$error}}', 'error');
            @endforeach
        </script>
        @endif
    </body>

</html>
