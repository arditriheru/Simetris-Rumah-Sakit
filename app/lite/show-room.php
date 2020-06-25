<?php include "views/header.php"; ?>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <strong>Ketersediaan Kamar</strong>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"><center>Kamar</th>
                    <th scope="col"><center>Bed</th>
                      <th scope="col"><center>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!---------- Batas ----------->
                      <?php 
                      $no = 1;
                      $data = mysqli_query($koneksi,
                       "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register,
                       IF(mr_tt.no_bed='1', 'A', 'B') AS bed
                       FROM mr_tt, mr_unit
                       WHERE mr_tt.id_unit = mr_unit.id_unit
                       AND mr_tt.id_unit = 6;");
                      while($d = mysqli_fetch_array($data)){
                        $id_register = $d['id_register'];
                        ?>
                        <tr>
                          <td><left><font class="bluetext"><?php echo $d['kelas'];?></font> <?php echo $d['nama_unit']; ?></td>
                            <td><center><?php echo $d['bed']; ?></td>
                              <td><center>
                                <?php
                                if($id_register=='123'){
                                  ?>
                                  <font class="greentext">Kosong</font>
                                  <?php
                                }else{
                                  ?>
                                  <font class="redtext">Terpakai</font>
                                  <?php
                                }
                                ?>
                              </td>
                            </tr>
                          <?php } ?>
                          <!---------- Batas ----------->
                          <?php 
                          $data = mysqli_query($koneksi,
                           "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register,
                           IF(mr_tt.no_bed='1', 'A', 'B') AS bed
                           FROM mr_tt, mr_unit
                           WHERE mr_tt.id_unit = mr_unit.id_unit
                           AND mr_tt.id_unit = 29;");
                          while($d = mysqli_fetch_array($data)){
                            $id_register = $d['id_register'];
                            ?>
                            <tr>
                              <td><left><font class="bluetext"><?php echo $d['kelas'];?></font> <?php echo $d['nama_unit']; ?></td>
                                <td><center><?php echo $d['bed']; ?></td>
                                  <td><center>
                                    <?php
                                    if($id_register=='123'){
                                      ?>
                                      <font class="greentext">Kosong</font>
                                      <?php
                                    }else{
                                      ?>
                                      <font class="redtext">Terpakai</font>
                                      <?php
                                    }
                                    ?>
                                  </td>
                                </tr>
                              <?php } ?>
                              <!---------- Batas ----------->
                              <?php 
                              $data = mysqli_query($koneksi,
                               "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register,
                               IF(mr_tt.no_bed='1', 'A', 'B') AS bed
                               FROM mr_tt, mr_unit
                               WHERE mr_tt.id_unit = mr_unit.id_unit
                               AND mr_tt.id_unit = 24;");
                              while($d = mysqli_fetch_array($data)){
                                $id_register = $d['id_register'];
                                ?>
                                <tr>
                                  <td><left><font class="bluetext"><?php echo $d['kelas'];?></font> <?php echo $d['nama_unit']; ?></td>
                                    <td><center><?php echo $d['bed']; ?></td>
                                      <td><center>
                                        <?php
                                        if($id_register=='123'){
                                          ?>
                                          <font class="greentext">Kosong</font>
                                          <?php
                                        }else{
                                          ?>
                                          <font class="redtext">Terpakai</font>
                                          <?php
                                        }
                                        ?>
                                      </td>
                                    </tr>
                                  <?php } ?>
                                  <!---------- Batas ----------->
                                  <?php 
                                  $data = mysqli_query($koneksi,
                                   "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register,
                                   IF(mr_tt.no_bed='1', 'A', 'B') AS bed
                                   FROM mr_tt, mr_unit
                                   WHERE mr_tt.id_unit = mr_unit.id_unit
                                   AND mr_tt.id_unit = 26;");
                                  while($d = mysqli_fetch_array($data)){
                                    $id_register = $d['id_register'];
                                    ?>
                                    <tr>
                                      <td><left><font class="bluetext"><?php echo $d['kelas'];?></font> <?php echo $d['nama_unit']; ?></td>
                                        <td><center><?php echo $d['bed']; ?></td>
                                          <td><center>
                                            <?php
                                            if($id_register=='123'){
                                              ?>
                                              <font class="greentext">Kosong</font>
                                              <?php
                                            }else{
                                              ?>
                                              <font class="redtext">Terpakai</font>
                                              <?php
                                            }
                                            ?>
                                          </td>
                                        </tr>
                                      <?php } ?>
                                      <!---------- Batas ----------->
                                      <?php 
                                      $data = mysqli_query($koneksi,
                                       "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register,
                                       IF(mr_tt.no_bed='1', 'A', 'B') AS bed
                                       FROM mr_tt, mr_unit
                                       WHERE mr_tt.id_unit = mr_unit.id_unit
                                       AND mr_tt.id_unit = 7;");
                                      while($d = mysqli_fetch_array($data)){
                                        $id_register = $d['id_register'];
                                        ?>
                                        <tr>
                                          <td><left><font class="bluetext"><?php echo $d['kelas'];?></font> <?php echo $d['nama_unit']; ?></td>
                                            <td><center><?php echo $d['bed']; ?></td>
                                              <td><center>
                                                <?php
                                                if($id_register=='123'){
                                                  ?>
                                                  <font class="greentext">Kosong</font>
                                                  <?php
                                                }else{
                                                  ?>
                                                  <font class="redtext">Terpakai</font>
                                                  <?php
                                                }
                                                ?>
                                              </td>
                                            </tr>
                                          <?php } ?>
                                          <!---------- Batas ----------->
                                          <?php 
                                          $data = mysqli_query($koneksi,
                                           "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register,
                                           IF(mr_tt.no_bed='1', 'A', 'B') AS bed
                                           FROM mr_tt, mr_unit
                                           WHERE mr_tt.id_unit = mr_unit.id_unit
                                           AND mr_tt.id_unit = 28;");
                                          while($d = mysqli_fetch_array($data)){
                                            $id_register = $d['id_register'];
                                            ?>
                                            <tr>
                                              <td><left><font class="bluetext">Kelas <?php echo $d['kelas'];?></font> <?php echo $d['nama_unit']; ?></td>
                                                <td><center><?php echo $d['bed']; ?></td>
                                                  <td><center>
                                                    <?php
                                                    if($id_register=='123'){
                                                      ?>
                                                      <font class="greentext">Kosong</font>
                                                      <?php
                                                    }else{
                                                      ?>
                                                      <font class="redtext">Terpakai</font>
                                                      <?php
                                                    }
                                                    ?>
                                                  </td>
                                                </tr>
                                              <?php } ?>
                                              <!---------- Batas ----------->
                                              <?php 
                                              $data = mysqli_query($koneksi,
                                               "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register,
                                               IF(mr_tt.no_bed='1', 'A', 'B') AS bed
                                               FROM mr_tt, mr_unit
                                               WHERE mr_tt.id_unit = mr_unit.id_unit
                                               AND mr_tt.id_unit = 27;");
                                              while($d = mysqli_fetch_array($data)){
                                                $id_register = $d['id_register'];
                                                ?>
                                                <tr>
                                                  <td><left><font class="bluetext">Kelas <?php echo $d['kelas'];?></font> <?php echo $d['nama_unit']; ?></td>
                                                    <td><center><?php echo $d['bed']; ?></td>
                                                      <td><center>
                                                        <?php
                                                        if($id_register=='123'){
                                                          ?>
                                                          <font class="greentext">Kosong</font>
                                                          <?php
                                                        }else{
                                                          ?>
                                                          <font class="redtext">Terpakai</font>
                                                          <?php
                                                        }
                                                        ?>
                                                      </td>
                                                    </tr>
                                                  <?php } ?>
                                                  <!---------- Batas ----------->
                                                  <?php 
                                                  $data = mysqli_query($koneksi,
                                                   "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register,
                                                   IF(mr_tt.no_bed='1', 'A', 'B') AS bed
                                                   FROM mr_tt, mr_unit
                                                   WHERE mr_tt.id_unit = mr_unit.id_unit
                                                   AND mr_tt.id_unit = 31;");
                                                  while($d = mysqli_fetch_array($data)){
                                                    $id_register = $d['id_register'];
                                                    ?>
                                                    <tr>
                                                      <td><left><font class="bluetext">Kelas <?php echo $d['kelas'];?></font> <?php echo $d['nama_unit']; ?></td>
                                                        <td><center><?php echo $d['bed']; ?></td>
                                                          <td><center>
                                                            <?php
                                                            if($id_register=='123'){
                                                              ?>
                                                              <font class="greentext">Kosong</font>
                                                              <?php
                                                            }else{
                                                              ?>
                                                              <font class="redtext">Terpakai</font>
                                                              <?php
                                                            }
                                                            ?>
                                                          </td>
                                                        </tr>
                                                      <?php } ?>
                                                      <!---------- Batas ----------->
                                                      <?php 
                                                      $data = mysqli_query($koneksi,
                                                       "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register,
                                                       IF(mr_tt.no_bed='1', 'A', 'B') AS bed
                                                       FROM mr_tt, mr_unit
                                                       WHERE mr_tt.id_unit = mr_unit.id_unit
                                                       AND mr_tt.id_unit = 30;");
                                                      while($d = mysqli_fetch_array($data)){
                                                        $id_register = $d['id_register'];
                                                        ?>
                                                        <tr>
                                                          <td><left><font class="bluetext">Kelas <?php echo $d['kelas'];?></font> <?php echo $d['nama_unit']; ?></td>
                                                            <td><center><?php echo $d['bed']; ?></td>
                                                              <td><center>
                                                                <?php
                                                                if($id_register=='123'){
                                                                  ?>
                                                                  <font class="greentext">Kosong</font>
                                                                  <?php
                                                                }else{
                                                                  ?>
                                                                  <font class="redtext">Terpakai</font>
                                                                  <?php
                                                                }
                                                                ?>
                                                              </td>
                                                            </tr>
                                                          <?php } ?>
                                                          <!---------- Batas ----------->
                                                          <?php 
                                                          $data = mysqli_query($koneksi,
                                                           "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register,
                                                           IF(mr_tt.no_bed='1', 'A', 'B') AS bed
                                                           FROM mr_tt, mr_unit
                                                           WHERE mr_tt.id_unit = mr_unit.id_unit
                                                           AND mr_tt.id_unit = 25
                                                           ORDER BY mr_tt.no_bed ASC;");
                                                          while($d = mysqli_fetch_array($data)){
                                                           $id_register = $d['id_register'];
                                                           ?>
                                                           <tr>
                                                            <td><left><font class="bluetext">Kelas <?php echo $d['kelas'];?></font> <?php echo $d['nama_unit']; ?></td>
                                                              <td><center><?php echo $d['bed']; ?></td>
                                                                <td><center>
                                                                  <?php
                                                                  if($id_register=='123'){
                                                                    ?>
                                                                    <font class="greentext">Kosong</font>
                                                                    <?php
                                                                  }else{
                                                                    ?>
                                                                    <font class="redtext">Terpakai</font>
                                                                    <?php
                                                                  }
                                                                  ?>
                                                                </td>
                                                              </tr>
                                                            <?php } ?>
                                                          </tbody>
                                                        </table>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
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
                                              <a href="https://pendaftaran.rskiarachmi.co.id/" class="nav-bottom__link">
                                                <i class="material-icons nav-bottom__icon">arrow_back</i>
                                                <span class="nav-bottom__text">Back</span>
                                              </a>
                                            </nav>
                                            <?php include "views/footer.php"; ?> 