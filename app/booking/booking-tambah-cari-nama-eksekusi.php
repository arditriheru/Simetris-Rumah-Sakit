<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Daftar <small>Poliklinik</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Form</a></li>
      </ol>
     <?php include "../../system/welcome.php"?>
    </div>
    <div class="col-lg-6">
      <div class="table-responsive">
        <?php 
        $id_register = $_GET['id_register'];
        $data = mysqli_query($koneksi,"SELECT * FROM mr_pasien WHERE id_register=$id_register;");
        while($d = mysqli_fetch_array($data)){
          $id_catatan_medik = $d['id_catatan_medik'];
          $nama             = $d['nama'];
          $alamat           = $d['alamat'];
          $telp             = $d['telp'];
        }
        ?>
        <?php
        if(isset($_POST['polisubmit'])){
                // menangkap data yang di kirim dari form
          $id_catatan_medik = $_POST['id_catatan_medik'];
          $nama             = $_POST['nama'];
          $alamat           = $_POST['alamat'];
          $kontak           = $_POST['kontak'];
          $id_dokter        = $_POST['id_dokter'];
          $booking_tanggal  = $_POST['booking_tanggal'];
          $id_sesi          = $_POST['id_sesi'];
          $tanggal          = $tanggalsekarang;
          $jam              = $jamsekarang;
          $status           = '2';
          $keterangan       = $_POST['keterangan'];
          $tglsekarang      = new DateTime();
          $jadwal           = new DateTime("$booking_tanggal");
          $selisih          = $tglsekarang->diff($jadwal)->format("%a");
                // cek antrian
          $a = mysqli_query($koneksi,
            "SELECT COUNT(*) AS antrian
            FROM booking
            WHERE id_dokter='$id_dokter'
            AND booking_tanggal='$booking_tanggal'
            AND id_sesi='$id_sesi';");
          while($b = mysqli_fetch_array($a)){
            $terdaftar  = $b['antrian'];
            $antrian    =  $b['antrian']+1;
          }

          $c = mysqli_query($koneksi,
            "SELECT kuota_status FROM dokter WHERE id_dokter='$id_dokter';");
          while($d = mysqli_fetch_array($c)){
            $kuota_status = $d['kuota_status'];
          }

          $e = mysqli_query($koneksi,
            "SELECT COUNT(*) AS terdaftar
            FROM booking
            WHERE id_catatan_medik='$id_catatan_medik'
            AND id_dokter='$id_dokter'
            AND booking_tanggal='$booking_tanggal'
            AND id_sesi='$id_sesi';");
          while($f = mysqli_fetch_array($e)){
            $terdaftar  = $f['terdaftar'];
          }

          $error=array();
          if (empty($nama)){
            $error['nama']='Nama Harus Diisi!!!';
          }if (empty($alamat)){
            $error['alamat']='Alamat Harus Diisi!!!';
          }if (empty($kontak)){
            $error['kontak']='Kontak Harus Diisi!!!';
          }if (empty($id_dokter)){
            $error['id_dokter']='Dokter Harus Diisi!!!';
          }if (empty($booking_tanggal)){
            $error['booking_tanggal']='Tanggal Harus Diisi!!!';
          }if (empty($id_sesi)){
            $error['id_sesi']='Sesi Harus Diisi!!!';
          }
          if($kuota_status == 0){
            // Cek kuota_status tidak aktif
            include 'booking-tambah-proses.php';
          }else{
            $namahari = date('l', strtotime($booking_tanggal));
            $e = mysqli_query($koneksi,
              "SELECT kuota, kuota_hari FROM dokter WHERE id_dokter='$id_dokter';");
            while($f = mysqli_fetch_array($e)){
              $kuota      = $f['kuota'];
              $kuota_hari = $f['kuota_hari'];

              $a1     = explode (", ",$kuota_hari);
              $a2     = array("$namahari");
              $result = array_intersect($a1,$a2);
            }

            if(!$namahari == $result){
              include 'booking-tambah-proses.php';
            }else{
              if($antrian > $kuota){
                          // Cek antrian melebihi kuota / tidak
                echo "<script>
                setTimeout(function() {
                  swal({
                    title: 'Kuota Penuh',
                    text: 'Silahkan Re-Schedule!',
                    type: 'error'
                    }, function() {
                      window.location = 'booking-tambah';
                      });
                      }, 10);
                      </script>";
                    }else{
                      include 'booking-tambah-proses.php';
                    }
                  }
                }
              }
              ?>
              <form method="post" action="" role="form">
                <div class="form-group">
                  <label>Nomor Rekam Medik</label>
                  <input class="form-control" type="text" name="id_catatan_medik"
                  value="<?php echo $id_catatan_medik; ?>" readonly>
                  <p style="color:red;"><?php echo ($error['id_catatan_medik']) ? $error['id_catatan_medik'] : ''; ?></p>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input class="form-control" type="text" name="nama"
                  value="<?php echo $nama; ?>" readonly>
                  <p style="color:red;"><?php echo ($error['nama']) ? $error['nama'] : ''; ?></p>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input class="form-control" type="text" name="alamat"
                  value="<?php echo $alamat; ?>" required="">
                  <p style="color:red;"><?php echo ($error['alamat']) ? $error['alamat'] : ''; ?></p>
                </div>
                <div class="form-group">
                  <label>Kontak</label>
                  <input class="form-control" type="text" name="kontak"
                  value="<?php echo $telp; ?>" required="">
                  <p style="color:red;"><?php echo ($error['kontak']) ? $error['kontak'] : ''; ?></p>
                </div>
                <div class="form-group">
                  <label>Dokter</label>
                  <select class="form-control" type="text" name="id_dokter"
                  value="<?php echo $d['id_dokter']; ?>" required="">
                  <p style="color:red;"><?php echo ($error['id_dokter']) ? $error['id_dokter'] : ''; ?></p>
                  <option disabled selected>Pilih</option>
                  <?php 
                  $data = mysqli_query($koneksi,
                    "SELECT * FROM dokter WHERE status=1;");
                  while($d = mysqli_fetch_array($data)){
                    echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Jadwal</label>
                <input class="form-control" type="date" name="booking_tanggal"
                value="<?php echo $d['booking_tanggal']; ?>" required="">
                <p style="color:red;"><?php echo ($error['booking_tanggal']) ? $error['booking_tanggal'] : ''; ?></p>
              </div>
              <div class="form-group">
                <label>Sesi</label>
                <p class="bluetext"><b>Pagi :</b> 07.00 - 10.59 | <b>Siang :</b> 11.00 - 14.59 | <b>Sore :</b> 15.00 - 17.59 | <b>Malam :</b> 18.00 - selesai</p>
                <select class="form-control" type="text" name="id_sesi"
                value="<?php echo $d['id_sesi']; ?>" required="">
                <p style="color:red;"><?php echo ($error['id_sesi']) ? $error['id_sesi'] : ''; ?></p>
                <option disabled selected>Pilih</option>
                <?php 
                $data = mysqli_query($koneksi,
                  "SELECT * FROM sesi;");
                while($d = mysqli_fetch_array($data)){
                  echo "<option value='".$d['id_sesi']."'>".$d['nama_sesi']."</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input class="form-control" type="text" name="keterangan" placeholder="Masukkan..">
            </div>
            <button type="submit" name="polisubmit" class="btn btn-success">Tambah</button>
            <button type="reset" class="btn btn-warning">Reset</button>  
          </form>
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /#wrapper -->
  <?php include "views/footer.php"; ?>