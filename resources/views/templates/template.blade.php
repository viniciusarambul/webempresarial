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


    </body>

</html>
