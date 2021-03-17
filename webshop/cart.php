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

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-14">
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 class="text-center text-info m-0">Kosár tartalma</h4>
                </td>
              </tr>
              <tr>
              <th>Kép</th>
              <th>Megnevezés</th>
              <th>Mennyiség</th>
              <th>Ár</th>
              <th>
                <a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Biztosan törli a kosár teljes tartalmát?')"><i class="fas fa-trash"></i>Törlés</a>
              </th>
            </tr>
            </thead>
            <tbody>
              <?php
                require 'config.php';
                $stms =$conn->prepare("SELECT * FROM cart");
                $stms->execute();
                $result=$stms->get_result();
                $grand_total=0;
                while($row =$result->fetch_assoc());
              ?>
              <tr>
                <td><img src="?= $row['cimage']?>" width="50"></td>
                <td><?= $row['cname']?></td>
                <td><i></i><?= number_format($row['cprice'],2);?></td>
                <td><input type="number" class="form-control itemQty" value="<?= $row['cquantity'] ?>" style="width: 70xp;"></td>
                <td>
                  <a href="action.php?clear=<?= $row['cname'] ?>" class="text-danger lead" onclick="return confirm('Biztosan törli ezt a terméket?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php $grand_total +=$row['totalprice']; ?>
              
              <tr>
                <td colspan="2">
                  <a href="vasarlas.php" class="btn btn-succes"><i class="fas fa-cart-plus"></i> Vásárlás folytatása</a>
                </td>
                <td><b>Teljes összeg:</b></td>
                <td><p><?= number_format($grand_total,2);?></p></td>
                <td>
                  <a href="checkout.php" class="btn btn-info"><i class="far fa-credit-card"></i> Összesítés</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>