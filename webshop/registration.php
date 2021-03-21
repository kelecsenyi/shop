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
    <link rel="stylesheet" href="css/regstyle.css">
    <!-- jQuery first-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--ikonok-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  </head>

<body>
  <header>
    <nav class="navbar navbar-expand bg-dark navbar-dark">
      <a class="navbar-brand" href="index.php">WEBARC WEBÁRUHÁZ</a>
      
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Főoldal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="belepes.php" style="background-color: gray;">Belépés</a>
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
    <div class="col-sm-4 col-md-5 col-lg-8">
      <form action="registration.php" method="post">
        <div class="container">
          <h1>Regisztráció új vásárlóknak</h1>
            <div class="form-group">
              <h5>Kapcsolattartó</h5>
              <hr class="mb-3">
              <label for="name"><b>Név</b></label>
              <input class="form-control" placeholder="Név" type="text" name="name" required>

              <label for="email"><b>Email</b></label>
              <input class="form-control" placeholder="Email" type="text" name="email" required> 

              <label for="mobile"><b>Mobil</b></label>
              <input class="form-control" placeholder="Mobil" type="text" name="mobil" required>

              <label for="password"><b>Jelszó</b></label>
              <input class="form-control" placeholder="Jelszó" type="text" name="password" required> 

              <label for="repassword"><b>Jelszó újra</b></label>
              <input class="form-control" placeholder="Jelszó újra" type="text" name="repassword" required>
            </div>

            <div class="form-group">
              <h5>Szállítási adatok</h5>
              <hr class="mb-3">

              <label for="postcode"><b>Irányítószám</b></label>
              <input class="form-control" placeholder="Irányítószám" type="text" name="postcode" required>

              <label for="city"><b>Város</b></label>
              <input class="form-control" placeholder="Város" type="text" name="city" required>

              <label for="address"><b>utca, házszám</b></label>
              <input class="form-control" placeholder="utca, házszám" type="text" name="address" required>
            </div>
            
            <div class="form-group">
                <h5>Számlázási adatok</h5>
                <hr class="mb-3">
                <label for="szamname"><b>Számlázási név</b></label>
                <input class="form-control" placeholder="Számlázási név" type="text" name="szamname" required>

                <label for="szampostcode"><b>Irányítószám</b></label>
                <input class="form-control" placeholder="Irányítószám" type="text" name="szampostcode" required>

                <label for="city"><b>Város</b></label>
                <input class="form-control" placeholder="Város" type="text" name="city" required>

                <label for="address"><b>utca, házszám</b></label>
                <input class="form-control" placeholder="utca, házszám" type="text" name="address" required>

                <label for="taxnumber"><b>Adószám</b></label>
                <input class="form-control" placeholder="Adószám" type="text" name="taxnumber" required>

                <hr class="mb-3">
                <button type="submit" class="btn btn-primary">Regisztráció</button>
                <a href="belepes.php" class="btn btn-success">Mégse</a>
            </div>
            <br>
        </div>
      </form>
    </div>
  </div> 
</div>
</body>
</html>