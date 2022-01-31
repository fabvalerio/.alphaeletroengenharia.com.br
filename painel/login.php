<?
ob_start();
@session_start();

 //Validar Usuбrio
if( !empty( $_COOKIE['id'] ) )
{
 echo '<meta http-equiv="refresh" content="0;URL='.$url.'">';
 exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex">

  <title>Login Painel Administrativo | Webfreelancer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<? echo $url; ?>assets/bootstrap/4.1.3/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  <style type="text/css">
  body{
    background-image: url('images/estrutura/painel.svg');
    background-size: cover;
    background-position: center bottom;
    height: 100vh;
  }
  .container,
  .row{
    height: 100vh;
  }
</style>

<!-- Favicon -->
<link rel="shortcut icon" href="<? echo $url; ?>images/estrutura/Icone.png" />
<link rel="stylesheet" href="http://ianlunn.github.io/Hover/css/hover.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
<body>
 <div class="container">    
  <div class="row d-flex align-items-center">                    
    <div class="col-md-4 card bg-dark hvr-bounce-in" >    
      <div class="card-body" >
        <form action="validar.php" method="post" id="loginform" class="form-horizontal" role="form">
          <div class="mb-1 input-group text-sm-center">
            <img src="images/estrutura/W-branco.svg" class="img-fluid my-3" alt="">
          </div>
          <div class="mb-1 input-group">
            <span class="input-group-addon text-white px-3 py-1"><i class="fa-w fa-2x fas fa-at"></i></span>
            <input id="login-username" type="text" class="form-control form-control-lg" autocomplete="off" name="mail" value="" placeholder="login ou e-mail">                                        
          </div>

          <div class="mb-1 input-group">
            <span class="input-group-addon text-white px-3 py-1"><i class="fa-w fa-2x fas fa-key"></i></span>
            <input id="login-password" type="password" class="form-control form-control-lg" autocomplete="off" name="senha" placeholder="senha">
          </div>


          <!-- Button -->
          <div class="col-sm-12 px-0">
            <button type="submit" class="btn btn-lg btn-warning w-100">Entrar</button>
          </div>
        </form>     
      </div>                     
    </div>  
  </div>
</div>

<script>
  $('#login-username').focus();
</script>


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
