 <section class="">
            <div class="title">
              <div class="row">
                <div class="OrderId">rendelés azonosítója</div>
                <div class="Items"> 1 tétel 130 Ft értékben</div>
                <div class="date">dátuma</div>
              </div>
            </div>

            <div class="content">
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
                      <!--php kód, adószám-->123456-43-1
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
                      <b><!-- php kód, megrendelő neve-->online bankkártya</b>
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
                        <td style="width: 70xp;"><?= $row['cquantity']?></td>
                        <td><i></i><?= number_format($row['cprice'],2);?></td>
                      </tr>
                      <?php $grand_total +=$row['totalprice']; ?>
                      
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