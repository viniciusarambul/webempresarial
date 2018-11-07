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


          function goBack() {
              window.history.back();
          }
        </script>

        <script>window.csrf_token = '{{ csrf_token() }}';</script>
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="{{ asset('libs/materialize/css/materialize.min.css') }}" media="screen,projection" />

        <!--    <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="{{ asset('libs/material-icons/css/materialdesignicons.min.css') }}">

        <link type="text/css" rel="stylesheet" href="{{ asset('css/custom.css') }}" media="screen,projection" />
        <link type="text/css" rel="stylesheet" href="{{ asset('libs/sweetAlert/sweetalert.css') }}" media="screen,projection" />
        <link type="text/css" rel="stylesheet" href="{{ asset('libs/morris/morris.css') }}" media="screen,projection" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
       <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
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
                <!--<img src="{{ asset('img/logo-cart.png') }}" alt=""> -->
            </div>
            <ul>
                <li class="{{$active_router == 'dashboard' ? 'active' : ''}}">
                  <a href="{{route('dashboard')}}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Dashboard">
                    <i class="mdi mdi-home"></i>
                  </a>
                </li>
                <li class="{{$active_router == 'relatorios' ? 'active' : ''}}">
                  <a href="{{route('relatorios')}}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Relatórios">
                    <i class="mdi mdi-chart-line"></i>
                  </a>
                </li>
                <li class="{{$active_router == 'clientes' ? 'active' : ''}}">
                  <a href="{{route('clientes.index')}}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Clientes">
                    <i class="mdi mdi-account"></i>
                  </a>
                </li>
                <li class="{{$active_router == 'vendedores' ? 'active' : ''}}">
                  <a href="{{route('vendedores.index')}}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Vendedores">
                    <i class="mdi mdi-account"></i>
                  </a>
                </li>
                <li class="{{$active_router == 'fornecedores' ? 'active' : ''}}">
                  <a href="{{route('fornecedores.index')}}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Fornecedores">
                    <i class="mdi mdi-truck"></i>
                  </a>
                </li>
                <li class="{{$active_router == 'categorias' ? 'active' : ''}}">
                  <a href="{{route('categorias.index')}}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Categorias">
                    <i class="mdi mdi-folder"></i>
                  </a>
                </li>
                <li class="{{$active_router == 'produtos' ? 'active' : ''}}">
                  <a href="{{route('produtos.index')}}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Produtos">
                    <i class="mdi mdi-folder"></i>
                  </a>
                </li>
                <li class="{{$active_router == 'estoque' ? 'active' : ''}}">
                  <a href="{{route('estoque')}}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Estoque">
                    <i class="mdi mdi-calendar"></i>
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
                <li class="{{$active_router == 'usuario' ? 'active' : ''}}">
                  <a href="{{route('usuarios.index')}}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Usuarios">
                    <i class="mdi mdi-account"></i>
                  </a>
                </li>
                <li class="">
                  <a href="http://file:///C:/tcc/manualtecnico.pdf" target="_blank" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Ajuda">
                    <i class="mdi mdi-help-circle-outline"></i>
                  </a>
                </li>
                <li class="">
                  <a href="{{ url('/main/logout') }}" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Sair">
                    <i class="mdi mdi-power"></i>
                  </a>
                </li>

            </ul>
        </aside>

        <main>

            <header>
                <div class="back waves-effect waves-light">
                    <a onclick="goBack()">
                        <i class="mdi mdi-arrow-left"></i>
                    </a>
                </div>
                <div class="icon waves-effect waves-light">
                    <i class="{{$icon}}"></i>
                </div>
                <div class="attempt">
                     <b>{{ auth()->user()->nome }}</b>
                     <small>{{ auth()->user()->email }}</small>
                 </div>
            </header>

            <section>
                @yield('container')
            </section>
        </main>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="{{ asset('libs/jquery/jquery-3.1.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/jquery/jquery.maskMoney.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/jquery-price/jquery.price_format.1.8.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/materialize/js/materialize.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/morris.js/morris.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/morris.js/morris.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/morris.js/raphael-min.js') }}"></script>
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
          $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        });
        $(document).ready(function(e) {
        $('#cpf').blur(function () {
		          var cpf = $(this).val();

      		$.post('validacpf.php', {cpf:cpf}, function (resposta) {
      			console.log(resposta);
      			if (resposta == '1') {
      				$('#cpf').val('');
      				alert('CPF inválido, por favor verifique e informe novamente.');
      				$('#erro').fadeIn(300).html('CPF inválido, por favor verifique e informe novamente.');
      				$('#cpf').val('');
      			}
      		});
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
          </script>
        <script>
          $(document).ready(function(){
            $("#cpfb").click(function(){
              $("#cnpjj").hide();
              $("#razao").hide();
              $("#cpff").show();
            });
            $("#cnpjb").click(function(){
              $("#cnpjj").show();
              $("#razao").show();
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
