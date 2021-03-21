<!DOCTYPE html>
<html lang="hu" dir="ltr">
  <head>
    <title>"Webarc.hu"</title>
    <meta charset="utf-8">
    <!--style-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/../css/admin.css">
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
    <a class="navbar-brand" href="signup.php"> WEBARC WEBÁRUHÁZ</a>
  </nav>
</header>
<body>
  <div class="container">  
    <div class="form-row">
      <div class="col-lg"> 
      <h4>Regisztráció</h4>  
       <form action="" method="post">                
              <input type="text" class="form-control" placeholder="Felhasználónév" name="username" required><br>
              <input type="password" class="form-control" placeholder="Jelszó" name="pwd" required><br>
              <input type="password" class="form-control" placeholder="Jelszó újra" name="pwdrepeat" required><br>          
              <button type="submit" name="gomb" class="btn btn-success">Regisztrálás</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>