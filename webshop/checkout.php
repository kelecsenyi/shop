<?php
error_reporting(-1);
ini_set('display_errors','on');
session_start();
if (isset($_SESSION["id"])) {

}
else
{
  if (isset($_SESSION["currentuser"])) {
      
  }
  else
  {
      header('location: cart.php');
      exit();
  }

}
?>
<!DOCTYPE html>
<html lang="hu" dir="ltr">
  <head>
    <title>"Webarc.hu"</title>
    <meta charset="utf-8">
    <!--style-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/checkoutstyle.css">
    <!-- jQuery first-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">WEBARC WEBÁRUHÁZ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Főoldal</a>
          </li>
          <?php
          if (isset($_SESSION["id"])) 
          {
             echo '<li class="nav-item"><a class="nav-link" href="indexcustomer.php"> Profilom</a></li>';
           }
           else
           {
            echo'<li class="nav-item"><a class="nav-link" href="belepes.php"> Belépés</a></li>';
           }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="vasarlas.php">Vásárlás</a>
          </li>
          <li class="nav-item">        
            <a class="nav-link" href="cart.php">
              <i class="fas fa-shopping-basket"></i>Kosár <span id="cart-result"></span>
            </a>
          </li>
          <li class="nav-item"><a class="nav-link" href="logout.inc.php">
          <?php
          if (isset($_SESSION["id"])) {
             echo " Kilépés";
           } 
          ?>
          </a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">Rendelés véglegesítése!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Termék(ek) : </b><?php $allItems; ?></h6>
          <h6 class="lead"><b>Szállítási költség : </b>Ingyenes</h6>
          <h5><b>Végösszeg : </b><?php number_format($grand_total) ?></h5>
        </div>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
          </div>
          <div class="form-group">
            <input name="address" class="form-control" placeholder="Enter Delivery Address Here..."></input>
          </div>
          <h6 class="text-center lead">Fizetés mód</h6>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <option value="" selected disabled>-Válassza ki hogyan fizet-</option>
              <option value="cod">Utánvét</option>
              <option value="netbanking">Online bankkártya</option>
              <option value="cards">Bankkártya</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
          </div>
        </form>
      </div>
    </div>
  </div>
  
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });

    
    filter_cart();
      function filter_cart()
      {
          var action = 'cart_item';
          $.ajax({
              url:"action.php",
              method:"POST",
              data:{action:action},
              success:function(data){
             $('#cart-result').html(data);
              }
          });
      }
  });
  </script>

</body>
</html>