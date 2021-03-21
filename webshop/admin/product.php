<!DOCTYPE html>
<html lang="hu" dir="ltr">
  <head>
    <title>"Webarc.hu"</title>
    <meta charset="utf-8">
    <!--style-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    <!-- ikonok -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  </head>

<header>
  <nav class="navbar navbar-expand bg-dark navbar-dark">
    <a class="navbar-brand" href="index.php"> WEBARC WEBÁRUHÁZ</a>
  </nav>
</header>
<body>
  <div class="container">
    <h2>Adminisztrátori felület</h2>
    <ul class="nav nav-pills">
      <li class="nav-item" style="margin-right: 10px;">
        <a class="nav-link" href="index.php">Megrendelések</a>
      </li>
      <li class="nav-item dropdown" style="margin-right: 10px;">
        <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#"> Raktár</a>
        <div class="dropdown-menu">
          <a class="dropdown-item active" href="product.php">Termék hozzáadása</a>
          <a class="dropdown-item" href="update.php">Termék módosítása</a>
      </li>
      <li class="nav-item" style="margin-right: 10px;">
        <a class="nav-link" href="users.php">Vásárlók</a>
      </li>
      <li class="nav-item" style="margin-right: 10px;">
        <a class="nav-link" href="login.php">Kilépés</a>
      </li>
    </ul><hr>
  </div>
  <div class="container">
    <form method="post" action="">
          <div class="row-lg-6">
           <div class="col py-2">
              <h5>Új termék bevitele</h5>
              <hr class="mb-3">
              <label for="name"><b>Termék neve</b></label>
              <input class="form-control" placeholder="Termék neve" type="text" name="name" required>

              <label for="details"><b>Termék leírása</b></label>
              <input class="form-control" placeholder="Termék leírása" type="text" name="details" required>

              <label for="price"><b>Ár</b></label>
              <input class="form-control" placeholder="Ár" type="text" name="price" required> 

              <label for="image"><b>Kép elérési útvonala</b></label>
              <input class="form-control" placeholder="Kép elérési útvonala" type="text" name="image" required>

              <label for="quantity"><b>Mennyiség</b></label>
              <input class="form-control" placeholder="Mennyiség" type="text" name="quantity" required><br> 
              <button type="save" class="btn btn-primary">Mentés</button>
            </div>
          </div>
    </form>
  </div>
</body>
</html>