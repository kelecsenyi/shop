<?php 
session_start();
if ($_SESSION['id']) {
}
else
{
  header("location: login.php");
}
include('dbh.inc.php');
include('../configPDO.php');
?>
<!DOCTYPE html>
<html lang="hu" dir="ltr">
  <head>
    <title>"Webarc.hu"</title>
    <meta charset="utf-8">
    <!--style-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/adminstyle.css">
    <!-- jQuery-->
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
  <header>
    <nav class="navbar navbar-expand bg-dark navbar-dark">
      <a class="navbar-brand" href="index.php"> WEBARC WEBÁRUHÁZ</a>
    </nav>
  </header>

  <div class="container">
    <h2>Adminisztrátori felület</h2>
    <ul class="nav nav-pills">
      <li class="nav-item" style="margin-right: 10px;">
        <a class="nav-link active" href="index.php">Megrendelések</a>
      </li>
      <li class="nav-item dropdown" style="margin-right: 10px;">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"> Raktár</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="product.php">Termék hozzáadása</a>
          <a class="dropdown-item" href="update.php">Termék módosítása</a>
      </li>
      <li class="nav-item" style="margin-right: 10px;">
        <a class="nav-link" href="users.php">Vásárlók</a>
      </li>
      <li class="nav-item"><a class="nav-link" href="logout.inc.php">
      <?php
      if (isset($_SESSION["id"])) {
         echo " Kilépés";
       } 
      ?>
      </a></li>
    </ul><hr>

    <div class="row">
      <div class="col sm-9 col-md-15 col-lg-15">
        <div class="section-container">

          <section class="">
            <div class="title">
              <div class="row">
                <div class="OrderId">rendelés azonosítója</div>
                <div class="Items"> 1 tétel 130 Ft értékben</div>
                <div class="date">dátuma</div>
              </div>
            </div>
            <div class="content" id="hide">
              <div class="orderdata">
                <div class="row">
                  <div class="col-sm-3 col-md-4">
                    <h4>Számlázási adatok</h4>
                    <p>
                      <b><!-- php kód, megrendelő neve-->Kelecsényi Balázs</b>
                      <br>
                      <!--php kód, cím-->1174 Budapest Dózsa György utca 15.
                      <br>
                      <!--php kód, telefonszám-->12345678910
                      <br>
                      <!--php kód, adószám-->234567-34-2
                      <br>
                    </p>
                  </div>
                  <div class="col-sm-3 col-md-4">
                    <h4>Szállítási adatok</h4>
                    <p>
                      <b><!-- php kód, megrendelő neve-->Kelecsényi Balázs</b>
                      <br>
                      <!--php kód, cím-->1174 Budapest Dózsa György utca 15.
                      <br>
                      <!--php kód, telefonszám-->12345678910
                      <br>
                    </p>
                  </div>
                  <div class="col-sm-3 col-md-4">
                    <h4>fizetési mód</h4>
                    <p>
                      <b>készpénz<!-- php kód, megrendelő neve--></b>
                      <br>
                    </p>
                  </div>
                </div>
              </div>
              <div class="basket">
                <div class="table-responsive mt-2">
                  <table class="table table-bordered table-striped text-center">
                    <thead>
                      <tr>
                        <td colspan="7">
                          <h4 class="text-center text-info m-0">Rendelt termékek</h4>
                        </td>
                      </tr>
                      <tr>
                      <th>Kép</th>
                      <th>Megnevezés</th>
                      <th>Mennyiség</th>
                      <th>Ár</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        $stms =$conn->prepare("SELECT * FROM cart");
                        $stms->execute();
                        $result=$stms->get_result();
                        $grand_total=0;
                        while($row =$result->fetch_assoc())
                        {
                      ?>
                      <tr>
                        <td><img src="?= $row['cimage']?>" width="50"></td>
                        <td><?= $row['cname']?></td>
                        <td style="width: 70xp;"><?= $row['cquantity']?></td>
                        <td><i></i><?= number_format($row['cprice'],2);?></td>
                      </tr>
                      <?php
                        }
                        ?>
                      <?php $grand_total += $row['totalprice']; ?>
                      
                      <tr>
                        <td colspan="3"><b>Teljes összeg:</b></td>
                        <td><p><?= number_format($grand_total,2);?></p></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </section>
          
        </div>
      </div>
    </div>
  </div>
</body>
</html>