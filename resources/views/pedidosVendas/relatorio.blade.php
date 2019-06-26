<html>
<head>
      <style>

          body, html {
              font-family: 'Arial', sans-serif;
              margin: 0;
              font-size: 15px;

          }

          main {
              position: relative;
              width: 100%;
              margin-left: 2%;
              margin-right: 2%;
              padding-bottom: 2%;
          }

          main header,
          main footer,
          main article {
              padding: 10px;
          }
          th{
            padding: 2px;
            border-width: 1px;
            border-style: double;
            align: center;
          }
          td{
            border-width: 1px;
            border-style: double;
            font-size: 15px;
          }

      </style>
  </head>
    <body>



<main>
  <table style="width: 100% !important; margin-top: 5%;">
      <tr>
          <img src="http://sistema.awfranchising.com.br/web.png"  height="150" width="500" style="margin-left: 20%" />
      </tr>
  </table>
  <h1 align="center">Pedidos Vendas</h1>
      <table style="width: 100% !important">
                <thead>

                    <tr>

                        <th align="center" style="width:20% !important">ID</th>
                        <th align="center" style="width:20% !important">Descrição</th>
                        <th align="center" style="width:15% !important">Situação</th>
                        <th align="center" style="width:25% !important">Vendedor</th>
                        <th align="center" style="width:20% !important">Cliente</th>
                    </tr>
                </thead>

                <tbody>
                  <?php $status = array('Aberto', 'Fechado', 'Cancelado'); ?>

            @foreach($pedidosVendas as $pedidoVenda)
        <tr>



              <td style="text-align: center">{{ $pedidoVenda->id }}</td>
              <td style="text-align: right">{{ $pedidoVenda->nome }}</td>
              <td style="text-align: center"> <?php echo $status[$pedidoVenda->situacao]?> </td>
              <td style="text-align: center">{{ $pedidoVenda->vendedornome }}</td>
              <td style="text-align: center">{{ $pedidoVenda->clientenome }}</td>


        </tr>
            @if($pedidoVenda->idProduto > 0)

                <thead>
                    <tr>
                        <th></th>

                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Valor Unitário</th>
                        <th>Total</th>


                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td></td>

                        <td>{{$pedidoVenda->idProduto}}</td>
                        <td>{{$pedidoVenda->quantidade}}</td>
                        <td style="text-align: right">R$ {{number_format($pedidoVenda->valorUnitario, 2, ',', '.')}}</td>
                        <td style="text-align: right">R$ {{number_format($pedidoVenda->preco, 2, ',', '.')}}</td>
                    </tr>

                    <tr>
                      <td colspan="5" style="border:none; height: 15px;"></td>
                    </tr>


                </tbody>

              @endif

          @endforeach

        </tbody>
      </table>
    </main>
    </body>
</html>
