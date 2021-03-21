<?php
error_reporting(-1);
ini_set('display_errors','on');

$username = "root";
$password = "";
$dsn = "mysql:host=127.0.0.1;dbname=webshop;charset=utf8";
$db = new PDO($dsn,$username,$password);

$sql ="SELECT ID,pname,pdetails,pprice,pimage,pquantity FROM products";
$result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="hu" dir="ltr">
  <head>
    <title>"Webarc.hu"</title>
    <meta charset="utf-8">
    <!--style-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/buystyle.css">
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
          <a class="nav-link" href="vasarlas.php" style="background-color: gray;">Vásárlás</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">
            <i class="fas fa-shopping-basket"></i>Kosár <span id="cart_count" class="text-danger bg-light">0</span>
          </a>
        </li>
      </ul>
    </nav>
  </header>

  <section class="container">
    <br>
    <div class="row">
      <div class="col-sm-2 col-md-3">

        <div class="card">
          <div class="card-header">
            <div class="title"> Rendezés</div>
          </div>      
          <div class="card-body">
            <div class="title">Ár szerint</div>
            <br>
            <div class="form-check">
              <label class="form-check-label" for="price[0-2000]">
               <input type="checkbox" class="form-check-input" id="price[0-2000]" name="price[0-2000]">0-2 000 Ft
              </label>
            </div>
            <br>
            <div class="form-check">
              <label class="form-check-label" for="price[2000-3000]">
               <input type="checkbox" class="form-check-input" id="price[2000-3000]" name="price[2000-3000]">2 000-3 000 Ft
              </label>
            </div>
            <br>
            <div class="form-check">
              <label class="form-check-label" for="price[3000-6000]">
               <input type="checkbox" class="form-check-input" id="price[3000-6000]" name="price[3000-6000]">3 000-6 000 Ft
              </label>
            </div>
            <br>
            <div class="form-check">
              <label class="form-check-label" for="price[6000-9000]">
               <input type="checkbox" class="form-check-input" id="price[6000-9000]" name="price[6000-9000]">6 000-9 000 Ft
              </label>
            </div>
            <br>
            <div class="form-check">
              <label class="form-check-label" for="price[9000-12000]">
               <input type="checkbox" class="form-check-input" id="price[9000-12000]" name="price[9000-12000]">9 000-12 000 Ft
              </label>
            </div>
            <br>
            <div class="form-check">
              <label class="form-check-label" for="price[12000-20000]">
               <input type="checkbox" class="form-check-input" id="price[12000-20000]" name="price[12000-20000]">12 000-20 000 Ft
              </label>
            </div>
          </div>     
        </div>
      </div>

      <div class="col-sm-8 col-md-16">
          <div class="row products" id="products" style="margin-top: 0px;">
            <?php while($row = $result->fetch()):?>
              <div class="col-sm-3 col-md-4" style="margin-bottom: 20px;">
            <?php include 'templates/card.php'?>
            </div>
          <?php endwhile;?>
        </div>
      </div>
    </div>
  </section>
</body>
</html>