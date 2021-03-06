<html>
<head>
      <style>

          body, html {
              font-family: 'Arial', sans-serif;
              margin: 0;
              font-size: 15px;
              background-color: #ccc;
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
  <h1 align="center">Pedidos Compras</h1>
      <table style="width: 100% !important">
                <thead>
                    <tr>

                        <th align="center" style="width:20% !important">ID</th>
                        <th align="center" style="width:20% !important">Descrição</th>
                        <th align="center" style="width:15% !important">Situação</th>
                        <th align="center" style="width:25% !important">Fornecedor</th>
                    </tr>
                </thead>

                <tbody>
                  <?php $status = array('Aberto', 'Fechado', 'Cancelado'); ?>

            @foreach($pedidosCompras as $pedidoCompra)
        <tr>



              <td style="text-align: center">{{ $pedidoCompra->id }}</td>
              <td style="text-align: right">{{ $pedidoCompra->nome }}</td>
              <td style="text-align: center"> <?php echo $status[$pedidoCompra->situacao]?> </td>
              <td style="text-align: center">{{ $pedidoCompra->nomeFornecedor }}</td>


        </tr>
          @endforeach

        </tbody>
      </table>
    </main>
    </body>
</html>
