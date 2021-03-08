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
    <link rel="stylesheet" href="css/buystyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

     <!--ikonok-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  </head>

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

<body>

<section class="container" id="products">
  <br>
  <div class="row">
  <div class="col-md-2">
    <h5>Szűrő</h5>
    <hr>
    <h6 class="text-info">Ár szerint</h6>
    <ul class="list-group">
      <!--Ide jön egy php sql kódrész hogy kikeresse az adatokat-->
      <li class="list-group-item">
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input product_check"><!--ide jön egy value=""érték ahová meg kell csinálni phpval az árakat-->
          </label>
        </div>
      </li>
    </ul>
  </div>
  <div class="col-md-10">
    <div class="row text-center py-3">    
      <div class="col-md-4">
        <div class="card">
          <img src="Assets/ffp.jpg" alt="ffp2">
            <div class="card-body">
              <h5 class="card-title"> FFP2 maszk</h5>
             <p class="card-text">            
                Jellemzők:<br>
                - Arcformához illeszkedő, összehajtható, higiénikus maszk<br>
                - Könnyen az arcra illeszthető, kényelmes
             </p>
             <small class="raktar">Elérhetőség/nem elérhető</small>
              <h5>
               <span class="price">100</span>
             </h5>
            </div>
              <div class="card-footer">
                <button class="btn btn-success btn">Kosárhoz adás</button>
             </div>
          </div>
      </div>

    <div class="col-md-4">
      <div class="card">
        <img src="Assets/gasmask.jpg" class="card-img-top" alt="Vegyvédelmi maszk">
        <div class="card-body">
          <h5 class="card-title"> Vegyvédelmi maszk</h5>
             <p class="card-text">          
              Jellemzők:<br>
              - Arcformához illeszkedő<br>
              - Könnyen felhejezhető
             </p>
             <small class="raktar">Elérhetőség/nem elérhető</small>
             <h5>
               <span class="price">100</span>
             </h5>
        </div>
        <div class="card-footer">
          <button class="btn btn-success btn">Kosárhoz adás</button>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <img src="Assets/teljes2.jpg" class="card-img-top" alt="PANAREA">
        <div class="card-body">
          <h5 class="card-title"> PANAREA teljesálarc</h5>
          <p class="card-text">            
              Jellemzők:<br>
              -Könnyű, tartós, archoz kiválóan illeszkedő<br>
              -Egy kilégzőszelep
          </p>
          <small class="raktar">Elérhetőség/nem elérhető</small>
            <h5>
               <span class="price">100</span>
            </h5>
        </div>
        <div class="card-footer">
       <button class="btn btn-success btn">Kosárhoz adás</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row text-center py-3">
    <div class="col-md-4">
      <div class="card">
        <img src="Assets/style.jpg" class="card-img-top" alt="Egyedi maszk">
        <div class="card-body">
          <h5 class="card-title"> Egyedi maszk</h5>
           <p class="card-text">            
                Jellemzők:<br>
                - Arcformához illeszkedő, összehajtható, törésbiztos és alaktartó, higiénikus maszk
           </p>
           <small class="raktar">Elérhetőség/nem elérhető</small>
            <h5>
               <span class="price">100</span>
            </h5>
        </div>
        <div class="card-footer">
         <button class="btn btn-success btn">Kosárhoz adás</button>
        </div>
      </div>
    </div>


    <div class="col-md-4">
      <div class="card">
        <img src="Assets/medical.jpg" class="card-img-top" alt="Orvosi maszk">
        <div class="card-body">
          <h5 class="card-title"> Orvosi maszk</h5>
          <p class="card-text">            
              Jellemzők:<br>
              -CE minősítéssel rendelkezik<br>
              -háromrétegű szájmaszk<br>
              -eldobható maszk
          </p>
          <small class="raktar">Elérhetőség/nem elérhető</small>
            <h5>
               <span class="price">100</span>
            </h5>
        </div>
        <div class="card-footer">
       <button class="btn btn-success btn">Kosárhoz adás</button>
        </div>
      </div>
    </div>

   <div class="col-md-4">
      <div class="card">
        <img src="Assets/teljes.jpg" class="card-img-top" alt="3M 6800">
        <div class="card-body">
          <h5 class="card-title"> 3M 6800 teljesálarc</h5>
          <p class="card-text">            
              Jellemzők:<br>
              -Komfortos, lágy és jól illeszkedő<br>
              -Ikerszűrős kialakítás
          </p>
          <small class="raktar">Elérhetőség/nem elérhető</small>
            <h5>
               <span class="price">100</span>
            </h5>
        </div>
        <div class="card-footer">
       <button class="btn btn-success btn">Kosárhoz adás</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>