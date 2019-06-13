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
            font-size: 13px;
          }

      </style>
  </head>
    <body>



<main>
  <table style="width: 100% !important; margin-top: 5%;">
    <tr>
      <td style="font-size: 25px!important; padding: 20px; width: 60%!important;">WEB EMPRESARIAL</td>


    </tr>
  </table>
  <h1 align="center">Fornecedores</h1>
      <table style="width: 100% !important">
                <thead>
                    <tr>

                        <th align="center" style="width:11% !important">Nome</th>
                        <th align="center" style="width:12% !important">Sobrenome</th>
                        <th align="center" style="width:5% !important">Status</th>
                        <th align="center" style="width:11% !important">Telefone</th>
                        <th align="center" style="width:13% !important">E-mail</th>
                        <th align="center" style="width:11% !important">Cidade</th>
                        <th align="center" style="width:11% !important">Estado</th>
                        <th align="center" style="width:11% !important">CPF</th>
                        <th align="center" style="width:13% !important">CNPJ</th>
                    </tr>
                </thead>

                <tbody>

            @foreach($fornecedores as $fornecedor)
        <tr>



              <td>{{ $fornecedor->nome }}</td>
              <td style="text-align: center">{{ $fornecedor->sobrenome }}</td>
              <td style="text-align: center">{{ $fornecedor->status }}</td>
              <td style="text-align: center">{{ $fornecedor->telefone }}</td>
              <td style="text-align: center">{{ $fornecedor->email }}</td>
              <td style="text-align: center">{{ $fornecedor->cidade }}</td>
              <td style="text-align: center">{{ $fornecedor->estado }}</td>
              <td style="text-align: center">{{ $fornecedor->cpf }}</td>
              <td style="text-align: center">{{ $fornecedor->cnpj }}</td>


        </tr>
          @endforeach

        </tbody>
      </table>
    </main>
    </body>
</html>
