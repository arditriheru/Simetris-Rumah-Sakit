<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SIMETRIS | Info Kamar</title>
  <!-- Bootstrap core CSS -->
  <link href="../../vendors/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../vendors/css/bootstrap.css">
  <!-- Add custom CSS here -->
  <link href="../../vendors/css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="../../vendors/font-awesome/css/font-awesome.min.css">
  <!-- Page Specific CSS -->
  <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  <style>
    .bluetext {
      color: #0779e4;
    }
    .whitetext {
      color: #ffffff;
    }
    .blacktext {
      color: #000000;
    }
    .redtext {
      color: #FF0000;
    }
    .greentext {
      color: #0c9463;
    }
  </style>
</head>
<body>
  <?php include '../../config/connect.php'; ?>
  <nav>
  </nav>
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1>Informasi <small>Kamar</small></h1>
        <ol class="breadcrumb">
          <li><a href="https://www.rskiarachmi.co.id">
            <i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">
              <i class="fa fa-edit"></i> Informasi Kamar</li>
            </ol>  
            <?php include "../../system/welcome.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">
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
          </div><br>
          <?php include"../../system/copyright.php"?>
          <!-- /.row -->
          <br><br>
        </div><!-- /#page-wrapper -->
      </div><!-- /#wrapper -->
      <!-- JavaScript -->
      <script src="../../vendors/js/jquery-1.10.2.js"></script>
      <script src="../../vendors/js/bootstrap.js"></script>
      <!-- Page Specific Plugins -->
      <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
      <script src="../../vendors/js/morris/chart-data-morris.js"></script>
      <script src="../../vendors/js/tablesorter/jquery.tablesorter.js"></script>
      <script src="../../vendors/js/tablesorter/tables.js"></script>
    </body>
    </html>
