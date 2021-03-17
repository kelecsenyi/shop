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
    <link rel="stylesheet" href="css/logstyle.css">
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
     <form action="belepes.php" method="post">
      <div class="form-row">
         <div class="col-lg" id="bal">
          <h5>Belépés regisztrált felhasználóknak</h5>
            <label for="email"><b>Email</b></label>
            <input type="text" class="form-control" placeholder="Email" name="email" required>

            <label for="password"><b>Jelszó</b></label>
            <input type="password" class="form-control" placeholder="Jelszó" name="password" required><br>
            <a type="submit" href="indexcustomer.php" class="btn btn-success">Belépés</a>
          </div>
          <div class="col-lg">
            <h5>Regisztráció</h5>
            <p>Ha még nem regisztrált nálunk, érdemes regisztrálnia, mert így élvezheti áruházunk kényelmi szolgáltatásait, egyedi kedvezményeket kaphat, nyomon követheti rendeléseit.</p>
            <a class="btn btn-warning" href="registration.php">Regisztráció</a>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>