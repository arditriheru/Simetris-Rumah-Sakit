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
                </div>
                <?php 
                $id_dokter = $_POST['id_dokter'];
                include 'controller/connection.php';
                $no = 1;
                date_default_timezone_set("Asia/Jakarta");
                $tanggalHariIni=date('Y-m-d');
                $data = mysqli_query($koneksi,
                  "SELECT *, dokter.nama_dokter
                  FROM jadwal, dokter
                  WHERE jadwal.id_dokter = dokter.id_dokter
                  AND jadwal.id_dokter = $id_dokter;");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <hr>
                  <div class="card-title">
                    <b class="bluetext"><center><?php echo $d['nama_dokter']; ?></b>
                    </div>
                    <div class="card-body">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col"><center>Hari</th>
                              <th scope="col"><center>Pukul</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><center>Senin</td>
                                  <td><center>
                                    <?php 
                                    if(!$d['sen']){
                                      echo "-";
                                    }else{
                                      echo $d['sen'];
                                    }
                                    ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td><center>Selasa</td>
                                    <td><center>
                                      <?php 
                                      if(!$d['sel']){
                                        echo "-";
                                      }else{
                                        echo $d['sel'];
                                      }
                                      ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><center>Rabu</td>
                                      <td><center>
                                        <?php 
                                        if(!$d['rab']){
                                          echo "-";
                                        }else{
                                          echo $d['rab'];
                                        }
                                        ?>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td><center>Kamis</td>
                                        <td><center>
                                          <?php 
                                          if(!$d['kam']){
                                            echo "-";
                                          }else{
                                            echo $d['kam'];
                                          }
                                          ?>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td><center>Jumat</td>
                                          <td><center>
                                            <?php 
                                            if(!$d['jum']){
                                              echo "-";
                                            }else{
                                              echo $d['jum'];
                                            }
                                            ?>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td><center>Sabtu</td>
                                            <td><center>
                                              <?php 
                                              if(!$d['sab']){
                                                echo "-";
                                              }else{
                                                echo $d['sab'];
                                              }
                                              ?>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td><center>Minggu</td>
                                              <td><center>
                                                <?php 
                                                if(!$d['min']){
                                                  echo "-";
                                                }else{
                                                  echo $d['min'];
                                                }
                                                ?>
                                              </td>
                                            </tr>
                                          </tbody>
                                          </table> <?php } ?>
                                        </div>
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
                          <a href="search-schedule" class="nav-bottom__link">
                            <i class="material-icons nav-bottom__icon">arrow_back</i>
                            <span class="nav-bottom__text">Back</span>
                          </a>
                        </nav>
                        <?php include "views/footer.php"; ?> 