<?php include "views/header.php"; ?>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <!-- Credit Card -->
            <div id="pay-invoice">
              <div class="card-body">
                <div class="form-group text-center">
                  <img src="images/logo-rachmi-akreditasi-kars.png" alt="Rachmi Online">
                  <hr></div>
               <!--  <hr>
                <div class="card-title">
                  <h4 class="text-center">Ketersediaan Kamar</h4>
                </div> -->
                <table class="table">
                  <div class="col-lg-6">
                    <div style="background-color: #ffffff; height: auto; margin: 10px 0px; padding: 5px; text-align: center; width: auto;">
                    Kosong</div>
                  </div>
                  <div class="col-lg-6">
                    <div style="background-color: #fa7f72; height: auto; margin: 10px 0px; padding: 5px; text-align: center; width: auto;">
                    Terpakai</div>
                  </div>
                  <thead>
                    <tr>
                      <th scope="col"><center>Kelas</center></th>
                      <th scope="col"><center>Kamar</center></th>
                      <th scope="col"><center>Bed</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <!---------- Batas ----------->
                    <?php 
                    $no = 1;
                    $data = mysqli_query($koneksi,
                     "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.ket_antri,
                     IF(mr_tt.no_bed='1', 'A', 'B') AS bed
                     FROM mr_tt, mr_unit
                     WHERE mr_tt.id_unit = mr_unit.id_unit
                     AND mr_tt.id_unit
                     IN ('6','29','24','26','7','28','27','31','30','25')
                     ORDER BY mr_unit.nama_unit ASC;");
                    while($d = mysqli_fetch_array($data)){
                      $ket_antri = $d['ket_antri'];
                      ?>
                      <?php
                      if($ket_antri=='3'){ ?>
                        <tr>
                        <?php }else{ ?>
                          <tr style="background-color: #fa7f72;">
                          <?php } ?>
                          <td><center><?php echo $d['kelas'];?></center></td>
                          <td><center><?php echo $d['nama_unit']; ?></center></td>
                          <td><center><?php echo $d['bed']; ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- .card -->
          </div><!--/.col-->
        </div><!--/.row-->
      </div>
    </div>
    <nav class="nav-bottom">
      <a href="help" class="nav-bottom__link">
        <i class="material-icons nav-bottom__icon">help_outline</i>
        <span class="nav-bottom__text">Help</span>
      </a>
      <a href="https://pendaftaran.rskiarachmi.co.id/" class="nav-bottom__link nav-bottom__link--active">
        <i class="material-icons nav__icon">dashboard</i>
        <span class="nav-bottom__text">Home</span>
      </a>
      <a href="javascript: history.back()" class="nav-bottom__link">
        <i class="material-icons nav-bottom__icon">arrow_back</i>
        <span class="nav-bottom__text">Back</span>
      </a>
    </nav>
    <?php include "views/footer.php"; ?> 