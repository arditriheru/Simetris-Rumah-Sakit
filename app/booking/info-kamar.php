<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Info <small>Kamar</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-bed"></i> Kamar</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered table-hover table-striped tablesorter">
        <thead>
          <tr>
            <th><center>No</center></th>
            <th><center>Kamar</center></th>
            <th><center>Kelas</center></th>
            <th><center>Bed</center></th>
            <th><center>Keterangan</center></th>
          </tr>
        </thead>
        <tbody>
          <!---------- Batas ----------->
          <?php
          include '../../config/connect.php';
          $no = 1;
          $data = mysqli_query($koneksi,
           "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register
           FROM mr_tt, mr_unit
           WHERE mr_tt.id_unit = mr_unit.id_unit
           AND mr_tt.id_unit = 6;");
          while($d = mysqli_fetch_array($data)){
            $id_register = $d['id_register'];
            ?>
            <tr>
              <td><center><?php echo $no++; ?></center></td>
              <td><left><?php echo $d['nama_unit']; ?></left></td>
              <td><center><font class="bluetext"><?php echo $d['kelas'];?></font></center></td>
              <td><center>Bed <?php echo $d['no_bed']; ?></center></td>
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
              </center></td>
            </tr>
          <?php } ?>
          <!---------- Batas ----------->
          <?php 
          $data = mysqli_query($koneksi,
           "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register
           FROM mr_tt, mr_unit
           WHERE mr_tt.id_unit = mr_unit.id_unit
           AND mr_tt.id_unit = 29;");
          while($d = mysqli_fetch_array($data)){
            $id_register = $d['id_register'];
            ?>
            <tr>
              <td><center><?php echo $no++; ?></center></td>
              <td><left><?php echo $d['nama_unit']; ?></left></td>
              <td><center><font class="bluetext"><?php echo $d['kelas'];?></center></font></td>
              <td><center>Bed <?php echo $d['no_bed']; ?></center></td>
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
              </center></td>
            </tr>
          <?php } ?>
          <!---------- Batas ----------->
          <?php 
          $data = mysqli_query($koneksi,
           "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register
           FROM mr_tt, mr_unit
           WHERE mr_tt.id_unit = mr_unit.id_unit
           AND mr_tt.id_unit = 24;");
          while($d = mysqli_fetch_array($data)){
            $id_register = $d['id_register'];
            ?>
            <tr>
              <td><center><?php echo $no++; ?></center></td>
              <td><left><?php echo $d['nama_unit']; ?></left></td>
              <td><center><font class="bluetext"><?php echo $d['kelas'];?></center></font></td>
              <td><center>Bed <?php echo $d['no_bed']; ?></center></td>
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
              </center></td>
            </tr>
          <?php } ?>
          <!---------- Batas ----------->
          <?php 
          $data = mysqli_query($koneksi,
           "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register
           FROM mr_tt, mr_unit
           WHERE mr_tt.id_unit = mr_unit.id_unit
           AND mr_tt.id_unit = 26;");
          while($d = mysqli_fetch_array($data)){
            $id_register = $d['id_register'];
            ?>
            <tr>
              <td><center><?php echo $no++; ?></center></td>
              <td><left><?php echo $d['nama_unit']; ?></left></td>
              <td><center><font class="bluetext"><?php echo $d['kelas'];?></center></font></td>
              <td><center>Bed <?php echo $d['no_bed']; ?></center></td>
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
              </center></td>
            </tr>
          <?php } ?>
          <!---------- Batas ----------->
          <?php 
          $data = mysqli_query($koneksi,
           "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register
           FROM mr_tt, mr_unit
           WHERE mr_tt.id_unit = mr_unit.id_unit
           AND mr_tt.id_unit = 7;");
          while($d = mysqli_fetch_array($data)){
            $id_register = $d['id_register'];
            ?>
            <tr>
              <td><center><?php echo $no++; ?></center></td>
              <td><left><?php echo $d['nama_unit']; ?></left></td>
              <td><center><font class="bluetext"><?php echo $d['kelas'];?></center></font></td>
              <td><center>Bed <?php echo $d['no_bed']; ?></center></td>
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
              </center></td>
            </tr>
          <?php } ?>
          <!---------- Batas ----------->
          <?php 
          $data = mysqli_query($koneksi,
           "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register
           FROM mr_tt, mr_unit
           WHERE mr_tt.id_unit = mr_unit.id_unit
           AND mr_tt.id_unit = 28;");
          while($d = mysqli_fetch_array($data)){
            $id_register = $d['id_register'];
            ?>
            <tr>
              <td><center><?php echo $no++; ?></center></td>
              <td><left><?php echo $d['nama_unit']; ?></left></td>
              <td><center>
                <font class="bluetext">Kelas <?php echo $d['kelas'];?></center></font>
              </td>
              <td><center>Bed <?php echo $d['no_bed']; ?></td>
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
                </center></td>
              </tr>
            <?php } ?>
            <!---------- Batas ----------->
            <?php 
            $data = mysqli_query($koneksi,
             "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register
             FROM mr_tt, mr_unit
             WHERE mr_tt.id_unit = mr_unit.id_unit
             AND mr_tt.id_unit = 27;");
            while($d = mysqli_fetch_array($data)){
              $id_register = $d['id_register'];
              ?>
              <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><left><?php echo $d['nama_unit']; ?></left></td>
                <td><center>
                  <font class="bluetext">Kelas <?php echo $d['kelas'];?></center></font>
                </td>
                <td><center>Bed <?php echo $d['no_bed']; ?></center></td>
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
                </center></td>
              </tr>
            <?php } ?>
            <!---------- Batas ----------->
            <?php 
            $data = mysqli_query($koneksi,
             "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register
             FROM mr_tt, mr_unit
             WHERE mr_tt.id_unit = mr_unit.id_unit
             AND mr_tt.id_unit = 31;");
            while($d = mysqli_fetch_array($data)){
              $id_register = $d['id_register'];
              ?>
              <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><left><?php echo $d['nama_unit']; ?></left></td>
                <td><center>
                  <font class="bluetext">Kelas <?php echo $d['kelas'];?></center></font>
                </td>
                <td><center>Bed <?php echo $d['no_bed']; ?></center></td>
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
                </center></td>
              </tr>
            <?php } ?>
            <!---------- Batas ----------->
            <?php 
            $data = mysqli_query($koneksi,
             "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register
             FROM mr_tt, mr_unit
             WHERE mr_tt.id_unit = mr_unit.id_unit
             AND mr_tt.id_unit = 30;");
            while($d = mysqli_fetch_array($data)){
              $id_register = $d['id_register'];
              ?>
              <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><left><?php echo $d['nama_unit']; ?></left></td>
                <td><center>
                  <font class="bluetext">Kelas <?php echo $d['kelas'];?></center></font>
                </td>
                <td><center>Bed <?php echo $d['no_bed']; ?></center></td>
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
                </center></td>
              </tr>
            <?php } ?>
            <!---------- Batas ----------->
            <?php 
            $data = mysqli_query($koneksi,
             "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.id_register
             FROM mr_tt, mr_unit
             WHERE mr_tt.id_unit = mr_unit.id_unit
             AND mr_tt.id_unit = 25
             ORDER BY mr_tt.no_bed ASC;");
            while($d = mysqli_fetch_array($data)){
             $id_register = $d['id_register'];
             ?>
             <tr>
              <td><center><?php echo $no++; ?></center></td>
              <td><left><?php echo $d['nama_unit']; ?></left></td>
              <td><center>
                <font class="bluetext">Kelas <?php echo $d['kelas'];?></center></font>
              </td>
              <td><center>Bed <?php echo $d['no_bed']; ?></center></td>
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
              </center></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div><!-- /.row -->
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?> 