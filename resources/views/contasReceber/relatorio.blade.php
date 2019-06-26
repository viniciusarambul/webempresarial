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
  <h1 align="center">Contas Receber</h1>
      <table style="width: 100% !important">
                <thead>
                    <tr>

                        <th align="center" style="width:5% !important">ID</th>
                        <th align="center" style="width:10% !important">Observação </th>
                        <!-- <th align="center" style="width:10% !important">Descrição Pedido Compra</th> -->
                        <th align="center" style="width:10% !important">Data Pedido Venda</th>
                        <th align="center" style="width:10% !important">Situação</th>
                        <th align="center" style="width:10% !important">Nome Cliente</th>
                        <th align="center" style="width:10% !important">Data de Emissão</th>
                        <th align="center" style="width:10% !important">Data de Vencimento</th>
                        <th align="center" style="width:10% !important">Valor</th>
                    </tr>
                </thead>

                <tbody>
                  <?php $status = array('Aberto', 'Pago'); ?>
                  <?php $totalcontapagar = 0; $totaltudo = 0;?>
            @foreach($contasReceber as $contaReceber)
        <tr>



              <td style="text-align: center">{{ $contaReceber->id }}</td>
              <td style="text-align: right">{{ $contaReceber->descricao }}</td>
              <!-- <td style="text-align: right">{{ $contaReceber->pedidovendanome }}</td> -->
              <td style="text-align: center">{{ date('d/m/Y', strtotime($contaReceber->datapedido)) }}</td>
              <td style="text-align: center"> <?php echo $status[$contaReceber->situacao]?> </td>
              <td style="text-align: center">{{$contaReceber->clientenome }}</td>
              <td style="text-align: center">{{ date('d/m/Y', strtotime($contaReceber->dataEmissao)) }}</td>
              <td style="text-align: center">{{ date('d/m/Y', strtotime($contaReceber->dataVencimento)) }}</td>
              <td style="text-align: right">R$ {{ number_format($contaReceber->valor, 2, ',', '.') }}</td>


        </tr>
        <?php $totaltudo = $totalcontapagar+=$contaReceber->valor;?>
        @endforeach

        <tr>
          <td colspan="7" style="text-align: center">Total</td>
          <td colspan="1" style="text-align: right">R${{number_format($totaltudo, 2, ',', '.')}}</td>
        </tr>

        </tbody>
      </table>
    </main>
    </body>
</html>
