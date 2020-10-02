<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Edit <small>HPL</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-check-square-o"></i> Edit</li>
      </ol>  
      <?php include "../../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <?php
      $id_hpl_register = $_GET['id'];

      if(isset($_POST['hplsubmit'])){
        $tgl_hpl    = $_POST['tgl_hpl'];
        $id_dokter  = $_POST['id_dokter'];

        $simpan=mysqli_query($koneksi,"UPDATE hpl_register 
          SET tgl_hpl='$tgl_hpl', id_dokter='$id_dokter'
          WHERE id_hpl_register='$id_hpl_register'");
        if($simpan){
          echo "<script>
          setTimeout(function() {
            swal({
              title: 'Berhasil',
              text: 'Menambah Prakiraan HPL',
              type: 'success'
              }, function() {
                window.location = 'hpl-detail.php?id=$id_hpl_register';
                });
                }, 10);
                </script>";
              }else{
                echo "<script>
                setTimeout(function() {
                  swal({
                    title: 'Upss..',
                    text: 'Coba Sekali Lagi',
                    type: 'error'
                    }, function() {
                      window.location = 'hpl-detail.php?id=$id_hpl_register';
                      });
                      }, 10);
                      </script>";
                    }
                  }
                  
                  $data = mysqli_query($koneksi,
                    "SELECT hpl_register.id_hpl_register, hpl_register.id_catatan_medik, hpl_register.tgl_hpl, hpl_register.tanggal, hpl_register.jam, mr_pasien.nama, mr_pasien.tgl_lahir, mr_pasien.telp, mr_pasien.alamat, dokter.nama_dokter, psdi_petugas.nama AS nama_petugas
                    FROM hpl_register
                    INNER JOIN mr_pasien ON hpl_register.id_catatan_medik=mr_pasien.id_catatan_medik
                    INNER JOIN dokter ON hpl_register.id_dokter=dokter.id_dokter
                    INNER JOIN psdi_petugas ON hpl_register.id_petugas=psdi_petugas.id_petugas
                    WHERE hpl_register.id_hpl_register='$id_hpl_register'
                    ORDER BY hpl_register.tgl_hpl ASC;");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <form method="post" action="" role="form">
                      <div class="form-group">
                        <label>Nomor Rekam Medik</label>
                        <input class="form-control" type="text" name="id_catatan_medik"
                        value="<?php echo $d['id_catatan_medik']; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>Nama Pasien</label>
                        <input class="form-control" type="text" id="nama" name="nama" 
                        value="<?php echo $d['nama']; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control" type="text" id="tgl_lahir" name="tgl_lahir" value="<?php echo $d['tgl_lahir']; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>Prakiraan HPL</label>
                        <input class="form-control" type="date" id="tgl_hpl" name="tgl_hpl" value="<?php echo $d['tgl_hpl']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Dokter</label>
                        <select class="form-control" type="text" id="id_dokter" name="id_dokter">
                          <option value='<?php echo $d['id_dokter']; ?>' selected><?php echo $d['nama_dokter']; ?></option>
                          <?php 
                          $data = mysqli_query($koneksi,
                            "SELECT id_dokter, nama_dokter FROM dokter WHERE id_unit=2 AND status=1;");
                          while($d = mysqli_fetch_array($data)){
                            echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <button type="submit" name="hplsubmit" class="btn btn-success">Perbarui</button>
                      </form><?php } ?>
                    </div><!-- row -->
                  </div><!-- /#page-wrapper -->
                </div><!-- /#wrapper -->
                <?php include "views/footer.php"; ?>