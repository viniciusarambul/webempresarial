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
  <h1 align="center">Contas Pagar</h1>
      <table style="width: 100%">
                <thead >
                    <tr>

                        <th align="center" style="width:5% !important">ID</th>
                        <th align="center" style="width:10% !important">Observação / Pedido </th>
                        <!-- <th align="center" style="width:10% !important">Descrição Pedido Compra</th> -->

                        <th align="center" style="width:10% !important">Situação</th>
                        <th align="center" style="width:10% !important">Nome Fornecedor</th>
                        <th align="center" style="width:10% !important">Data de Emissão</th>
                        <th align="center" style="width:10% !important">Data de Vencimento</th>
                        <th align="center" style="width:15% !important">Valor</th>
                    </tr>
                </thead>

                <tbody>
                  <?php $status = array('Aberto', 'Pago'); ?>
                  <?php $totalcontapagar = 0; $totaltudo = 0;?>
            @foreach($contasPagar as $contaPagar)
        <tr>



              <td style="text-align: center">{{ $contaPagar->id }}</td>
              <td style="text-align: right">{{ $contaPagar->descricao }}</td>

              <td style="text-align: center"> <?php echo $status[$contaPagar->situacao]?> </td>
              <td style="text-align: center">{{$contaPagar->fornecedornome }}</td>
              <td style="text-align: center">{{ date('d/m/Y', strtotime($contaPagar->dataEmissao)) }}</td>
              <td style="text-align: center">{{ date('d/m/Y', strtotime($contaPagar->dataVencimento)) }}</td>
              <td style="text-align: right">R$ {{ number_format($contaPagar->valor, 2, ',', '.') }}</td>


        </tr>
        <?php $totaltudo = $totalcontapagar+=$contaPagar->valor;?>
        @endforeach

        <tr>
          <td colspan="6" style="text-align: center">Total</td>
          <td colspan="1" style="text-align: right">R${{number_format($totaltudo, 2, ',', '.')}}</td>
        </tr>

        </tbody>
      </table>
    </main>
    </body>
</html>
