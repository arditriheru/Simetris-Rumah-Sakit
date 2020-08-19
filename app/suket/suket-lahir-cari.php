<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
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
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <?php
        $a = mysqli_query($koneksi,
          "SELECT COUNT(id_suket) AS total
          FROM mr_suket
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
              window.location = 'dashboard';
              });
              }, 10);
              </script>";
            }else{
              ?>
              <div class="row">
                <form method="post" action="covid-rapid-cari-tampil" role="form">
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
                  <h1><small>Total <?php echo $total; ?> Pasien</small></h1>
                </div>
              </div>
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                   <th><center>#</center></th>
                   <th><center>Kode</center></th>
                   <th><center>No. RM</center></th>
                   <th><center>Nama Pasien</center></th>
                   <th><center>Dokter</center></th>
                   <th><center>Registrasi</center></th>
                   <th colspan='3'><center>Action</center></th>
                 </tr>
               </thead>
               <tbody>
                <?php
                $no=$total;
                $data = mysqli_query($koneksi,
                  "SELECT *, mr_pasien.nama, dokter.nama_dokter,
                  IF(mr_suket.kode_jenis='1', 'SKL', 'Surat Keterangan') AS nama_jenis
                  FROM mr_suket, mr_pasien, dokter
                  WHERE mr_suket.id_catatan_medik=mr_pasien.id_catatan_medik
                  AND mr_suket.id_dokter=dokter.id_dokter
                  AND mr_suket.id_catatan_medik='$id_catatan_medik'");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><center><?php echo $no--; ?></center></td>
                    <td><center><?php echo $d['id_suket']."/RM-".$d['nama_jenis'];?></center></td>
                    <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                    <td><center><?php echo $d['nama']; ?></center></td>
                    <td><center><?php echo $d['nama_dokter']; ?></center></td>
                    <td><center><?php echo date("d-m-Y", strtotime($d['tanggal'])).' / '.$d['jam']; ?></center></td>
                    <td>
                      <div align="center">
                        <a href="suket-lahir-print?id=<?php echo $d['id_suket']; ?>">
                          <button type="button" class="btn btn-primary"><i class='fa fa-print'></i></button></a>
                        </div>
                      </td>
                      <td>
                        <div align="center">
                          <a href="suket-lahir-edit?id=<?php echo $d['id_suket']; ?>">
                            <button type="button" class="btn btn-warning"><i class='fa fa-edit'></i></button></a>
                          </div>
                        </td>
                        </tr><?php } ?>
                      </tbody>
                    </table>
                  <?php } ?>
                </div>
              </div>
            </div><!-- /.row -->
          </div><!-- /#wrapper -->
          <?php include "views/footer.php"; ?>