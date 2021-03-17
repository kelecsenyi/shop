<?php
error_reporting(-1);
ini_set('display_errors','on');
?>

<!DOCTYPE html>
<html lang="hu" dir="ltr">
  <head>
    <title>"Webarc.hu"</title>
    <meta charset="utf-8">
    <!--style-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/cart.css">
    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    <!-- ikonok -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  </head>

<body>
  <header>
    <nav class="navbar navbar-expand bg-dark navbar-dark">
      <a class="navbar-brand" href="index.php"> WEBARC WEBÁRUHÁZ</a>
      
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Főoldal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="belepes.php">Belépés</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="vasarlas.php">Vásárlás</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">
            <i class="fas fa-shopping-basket"></i>Kosár <span id="cart_count" class="text-danger bg-light">0</span>
          </a>
        </li>
      </ul>
    </nav>
  </header>

  
</body>
</html>