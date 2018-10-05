<!DOCTYPE html>
<html>
 <head>
  <title>Login - Web Empresarial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Login Web Empresarial</h3><br />

   @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif

   @if (count($errors) > 0)
    <div class="alert alert-danger">
     <ul>
     @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
     </ul>
    </div>
   @endif

   <form method="post" action="{{ url('/main/checklogin') }}">
    {{ csrf_field() }}
    <div class="form-group">
     <label>Login</label>
     <input type="text" name="login" class="form-control" />
    </div>
    <div class="form-group">
     <label>Senha</label>
     <input type="password" name="senha" class="form-control" />
    </div>
    <div class="form-group">
     <button type="submit" class="btn btn-primary">Entrar</button>
    </div>
   </form>
  </div>
 </body>
</html>
