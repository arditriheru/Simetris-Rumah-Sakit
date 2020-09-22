<?php include "views/header.php";?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Tambah <small>Inventaris</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-plus"></i> Tambah</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <?php
      if(isset($_POST['submit'])){
        date_default_timezone_set("Asia/Jakarta");
        $tgl_sekarang=date('Y-m-d');
        $a = mysqli_query($koneksi,
          "SELECT MAX(kode_registrasi) AS max
          FROM inventaris;");
        while($b = mysqli_fetch_array($a)){
          $max = $b['max']+1;
        }
        $kode_registrasi    = $max;
        $kode_jenis         = $_POST['kode_jenis'];
        $kode_ruangan       = $_POST['kode_ruangan'];
        $nama_barang        = $_POST['nama_barang'];
        $tanggal_pengadaan  = $_POST['tanggal_pengadaan'];
        $kondisi            = '1';
        $status             = $_POST['status'];
        $keterangan         = $_POST['keterangan'];
        $nomor_inventaris   = $kode_jenis.'/'.$tgl_sekarang.'/'.$kode_registrasi;

        $error=array();
        if (empty($nama_barang)){
          $error['nama_barang']='Nama Harus Diisi!!!';
        }if(empty($error)){
          $simpan=mysqli_query($koneksi,"INSERT INTO inventaris (kode_registrasi, kode_jenis, kode_ruangan, nomor_inventaris, nama_barang, tanggal_pengadaan, kondisi, status, tanggal_kalibrasi, kalibrasi_ulang, keterangan)
            VALUES('$kode_registrasi','$kode_jenis','$kode_ruangan','$nomor_inventaris','$nama_barang','$tanggal_pengadaan','$kondisi','$status','','','$keterangan')");
          if($simpan){
            echo "<script>
            setTimeout(function() {
              swal({
                title: 'Uyeah!!',
                text: 'Berhasil Menambahkan',
                type: 'success'
                }, function() {
                  window.location = 'inventaris-detail.php?id=$max';
                  });
                  }, 10);
                  </script>";
                }else{
                  echo "<script>
                  setTimeout(function() {
                    swal({
                      title: 'Tetot!!',
                      text: 'Hilangkan Tanda Petik di Nama Pasien',
                      type: 'error'
                      }, function() {
                        window.location = 'inventaris-tambah.php';
                        });
                        }, 10);
                        </script>";
                      }
                    }
                  }
                  ?>
                  <form method="post" action="" role="form">
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input class="form-control" type="text" name="nama_barang" placeholder="Masukkan..">
                      <p style="color:red;"><?php echo ($error['nama_barang']) ? $error['nama_barang'] : ''; ?></p>
                    </div>
                    <div class="form-group">
                      <label>Jenis</label>
                      <select class="form-control" type="text" name="kode_jenis" required="">
                        <p style="color:red;"><?php echo ($error['kode_jenis']) ? $error['kode_jenis'] : ''; ?></p>
                        <option disabled selected>Pilih</option>
                        <?php 
                        $data1 = mysqli_query($koneksi,
                          "SELECT * FROM inventaris_jenis ORDER BY kode_jenis ASC;");
                        while($d1 = mysqli_fetch_array($data1)){
                          echo "<option value='".$d1['kode_jenis']."'>".$d1['nama_jenis']."</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Ruangan</label>
                      <select class="form-control" type="text" name="kode_ruangan" required="">
                        <p style="color:red;"><?php echo ($error['kode_ruangan']) ? $error['kode_ruangan'] : ''; ?></p>
                        <option disabled selected>Pilih</option>
                        <?php 
                        $data2 = mysqli_query($koneksi,
                          "SELECT * FROM inventaris_ruangan ORDER BY nama_ruangan ASC;");
                        while($d2 = mysqli_fetch_array($data2)){
                          echo "<option value='".$d2['kode_ruangan']."'>".$d2['nama_ruangan']."</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Pengadaan</label>
                      <input class="form-control" type="date" name="tanggal_pengadaan">
                      <p style="color:red;"><?php echo ($error['tanggal_pengadaan']) ? $error['tanggal_pengadaan'] : ''; ?></p>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" type="text" name="status" required="">
                        <p style="color:red;"><?php echo ($error['status']) ? $error['status'] : ''; ?></p>
                        <option disabled selected>Pilih</option>
                        <option value='1'>Baru</option>
                        <option value='0'>Bekas</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input class="form-control" type="text" name="keterangan" placeholder="Masukkan..">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Tambah</button>
                    <button type="reset" class="btn btn-warning">Reset</button>  
                  </form>
                </div>
              </div><!-- /.row -->
            </div><!-- /#wrapper -->
            <?php include "views/footer.php"; ?> 