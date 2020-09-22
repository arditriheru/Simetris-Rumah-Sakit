<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Edit <small>Inventaris</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="inventaris-detail.php?id=<?php echo $kode_registrasi?>"><i class="fa fa-eye"></i> Detail</a></li>
        <li class="active"><i class="fa fa-edit"></i> Form</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <?php
  $kode_registrasi = $_GET['id'];
  $data = mysqli_query($koneksi,
    "SELECT *, inventaris_jenis.nama_jenis, inventaris_ruangan.nama_ruangan,
    IF (inventaris.kondisi='0', 'Rusak', 'Baik') AS ifkondisi,
    IF (inventaris.status='0', 'Bekas', 'Baru') AS ifstatus
    FROM inventaris, inventaris_jenis, inventaris_ruangan
    WHERE inventaris.kode_jenis=inventaris_jenis.kode_jenis
    AND inventaris.kode_ruangan=inventaris_ruangan.kode_ruangan
    AND inventaris.kode_registrasi = '$kode_registrasi';");
  while($d = mysqli_fetch_array($data)){
    ?>
    <?php
    if(isset($_POST['submit'])){
      $nama_barang        = $_POST['nama_barang'];
      $kode_jenis         = $_POST['kode_jenis'];
      $kode_ruangan       = $_POST['kode_ruangan'];
      $tanggal_pengadaan  = $_POST['tanggal_pengadaan'];
      $kondisi            = $_POST['kondisi'];
      $status             = $_POST['status'];
      $tanggal_kalibrasi  = $_POST['tanggal_kalibrasi'];
      $kalibrasi_ulang    = $_POST['kalibrasi_ulang'];
      $keterangan         = $_POST['keterangan'];

      $edit=mysqli_query($koneksi,"UPDATE inventaris SET nama_barang='$nama_barang',kode_jenis='$kode_jenis',kode_ruangan='$kode_ruangan', tanggal_pengadaan='$tanggal_pengadaan',kondisi='$kondisi',status='$status',tanggal_kalibrasi='$tanggal_kalibrasi',kalibrasi_ulang='$kalibrasi_ulang'
        ,keterangan='$keterangan'
        WHERE kode_registrasi='$kode_registrasi'");
            // mengalihkan halaman kembali ke index.php
      if($edit){
        echo "<script>
        setTimeout(function() {
          swal({
            title: 'Uyeah!!',
            text: 'Berhasil Mengubah',
            type: 'success'
            }, function() {
              window.location = 'inventaris-detail?id=$kode_registrasi.php';
              });
              }, 10);
              </script>";
            }else{
              echo "<script>
              setTimeout(function() {
                swal({
                  title: 'Tetot!!',
                  text: 'Gagal Mengubah',
                  type: 'error'
                  }, function() {
                    window.location = 'inventaris-detail?id=$kode_registrasi.php';
                    });
                    }, 10);
                    </script>";
                  }
                }
                ?>
                <div class="row">
                  <div class="col-lg-6">
                    <form method="post" action="" role="form">
                      <div class="form-group">
                        <label>Nomor Inventaris</label>
                        <input class="form-control" type="text" name="nomor_inventaris"
                        value="<?php echo $d['nomor_inventaris']; ?> " readonly>
                      </div>
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <input class="form-control" type="text" name="nama_barang"
                        value="<?php echo $d['nama_barang']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Jenis</label>
                        <select class="form-control" type="text" name="kode_jenis">
                          <option value='<?php echo $d['kode_jenis']; ?>'selected><?php echo $d['nama_jenis']; ?></option>
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
                        <select class="form-control" type="text" name="kode_ruangan">
                          <option value='<?php echo $d['kode_ruangan']; ?>'selected><?php echo $d['nama_ruangan']; ?></option>
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
                        <input class="form-control" type="date" name="tanggal_pengadaan"
                        value="<?php echo $d['tanggal_pengadaan']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Kondisi</label>
                        <select class="form-control" type="text" name="kondisi">
                          <option value='<?php echo $d['kondisi']; ?>'selected><?php echo $d['ifkondisi']; ?></option>
                          <option value='1'>Baik</option>
                          <option value='0'>Rusak</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" type="text" name="status">
                          <option value='<?php echo $d['status']; ?>'selected><?php echo $d['ifstatus']; ?></option>
                          <option value='1'>Baru</option>
                          <option value='0'>Bekas</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Kalibrasi</label>
                        <input class="form-control" type="date" name="tanggal_kalibrasi"
                        value='<?php echo $d['tanggal_kalibrasi']; ?>'></input>
                      </div>
                      <div class="form-group">
                        <label>Kalibrasi Ulang</label>
                        <input class="form-control" type="date" name="kalibrasi_ulang"
                        value='<?php echo $d['kalibrasi_ulang']; ?>'></input>
                      </div>
                      <div class="form-group">
                        <label>Keterangan</label>
                        <input class="form-control" type="text" name="keterangan"
                        value="<?php echo $d['keterangan']; ?>"></input>
                      </div>
                      <button type="submit" name="submit" class="btn btn-success">Perbarui</button>
                      <button type="reset" class="btn btn-warning">Reset</button>  
                    </form>
                  </div>
                </div><!-- /.row -->
              <?php } ?>
            </div><br><br><?php include "../copyright.php";?><br><br><!-- /#page-wrapper -->
          </div><!-- /#wrapper -->
          <?php include "views/footer.php"; ?>