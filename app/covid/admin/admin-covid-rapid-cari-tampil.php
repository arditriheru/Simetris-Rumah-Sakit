<?php
include "admin-session-start.php";
include "../views/header.php";
?>
<nav>
  <div id="wrapper">
    <?php include "admin-menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <?php $id_catatan_medik = $_POST['id_catatan_medik']; ?>
      <h1>Pencarian <small>"<?php echo $id_catatan_medik; ?>"</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="booking-tambah"><i class="fa fa-plus"></i> Tambah</a></li>
        <li class="active"><i class="fa fa-list"></i> List</li>
      </ol>
      <?php include "../../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <?php
        $a = mysqli_query($koneksi,
          "SELECT COUNT(id_rapidtest) AS total
          FROM rapidtest
          WHERE id_catatan_medik='$id_catatan_medik';");
        while($b = mysqli_fetch_array($a)){
         $total         = $b['total'];
       }

       if($total<1){
        echo "<script>
        setTimeout(function() {
          swal({
            title: 'Tidak Ditemukan',
            text: 'Pasien Belum Terdaftar',
            type: 'error'
            }, function() {
              window.location = 'admin-dashboard';
              });
              }, 10);
              </script>";
            }else{
              $no=1;
              $data = mysqli_query($koneksi,
                "SELECT *, mr_dokter.nama_dokter,
                IF(rapidtest.igm='1', 'Reaktif', 'Non Reaktif') AS nama_igm,
                IF(rapidtest.igg='1', 'Reaktif', 'Non Reaktif') AS nama_igg
                FROM rapidtest, mr_dokter
                WHERE rapidtest.id_dokter=mr_dokter.id_dokter
                AND id_catatan_medik='$id_catatan_medik'
                ORDER BY id_rapidtest DESC;");
              while($d = mysqli_fetch_array($data)){
                $tgl_periksa  = $d['tgl_periksa'];
                $tanggal      = $d['tanggal'];
                $lahir        = new DateTime($d['tgl_lahir']);
                $today        = new DateTime();
                $umur         = $today->diff($lahir);

                ?>
                <div class="row">
                  <form method="post" action="admin-covid-rapid-cari-tampil" role="form">
                    <div class="col-lg-6">
                      <div class="form-group input-group">
                        <input type="text" class="form-control" name="id_catatan_medik" value="<?php echo $id_catatan_medik?>">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                        </span>
                      </div>
                    </div>
                  </form>
                  <div align="right" class="col-lg-6">
                    <?php
                    $m = 31;
                    $n = 7;
                    $nextN = mktime(0, 0, 0, date("m"), date("d") + $m, date("Y"));
                    $prevN = mktime(0, 0, 0, date("m"), date("d") - $n, date("Y"));
                    $mak   = date("Y-m-d", $nextN);
                    $min   = date("Y-m-d", $prevN);
                    ?>
                    <h1><small>Total <?php echo $total; ?> Pasien</small></h1>
                  </div>
                </div>
                <table class="table table-bordered table-hover table-striped tablesorter">
                  <thead>
                    <tr>
                     <th><center>#</center></th>
                     <th><center>No. RM</center></th>
                     <th><center>Nama Pasien</center></th>
                     <th><center>Dokter</center></th>
                     <th><center>IgM</center></th>
                     <th><center>IgG</center></th>
                     <th><center>Register</center></th>
                     <th colspan='3'><center>Action</center></th>
                   </tr>
                 </thead>
                 <tbody>
                  <tr>
                    <td><center><?php echo $no++; ?></center></td>
                    <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                    <td><center><?php echo $d['nama']; ?></center></td>
                    <td><center><?php echo $d['nama_dokter']; ?></center></td>
                    <td><center><?php echo $d['nama_igm']; ?></center></td>
                    <td><center><?php echo $d['nama_igg']; ?></center></td>
                    <td><center><?php echo $d['tanggal'].' / '.$d['jam']; ?></center></td>
                    <td>
                      <div align="center">
                        <a href="covid-rapid-detail?id=<?php echo $d['id_rapidtest']; ?>"
                          <button type="button" class="btn btn-primary"><i class='fa fa-print'></i></button></a>
                        </div>
                      </td>
                      <td>
                        <div align="center">
                          <a href="covid-rapid-edit?id=<?php echo $d['id_rapidtest']; ?>"
                            <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                          </div>
                        </td>
                        </tr><?php }} ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div><!-- /.row -->
            </div><!-- /#wrapper -->
            <?php include "../views/footer.php"; ?>