
  <div class="card-deck">
    <div class="card border-secondary">
      <img src="<?= $row['pimage']?>" class="card-img-top" alt="ffp2">
      <h5 class="text-light bg-info text-center"><?= $row['pname']?></h5>
      <div class="card-body">
        <h5 class="card-title text-dark"><?= $row['pprice']?>Ft</h5>              
        <p>            
          Jellemzők:<br>
          <?= $row['pdetails']?>
        </p>
      </div>
      <div class="card-footer">
        <p class="raktar">Raktáron: <?= $row['pquantity']?> db</p>
        <button class="btn btn-success">Kosárhoz adás</button>
      </div>
    </div>
  </div>
