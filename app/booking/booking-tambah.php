<?php 
include "views/header.php";
$m = 31;
$nextN = mktime(0, 0, 0, date("m"), date("d") + $m, date("Y"));
$mak   = date("Y-m-d", $nextN);

function format_mak($mak)
{
  $bulan = array (1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $split = explode('-', $mak);
  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
?>
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
        <li class="active"><i class="fa fa-plus"></i> Tambah</li>
      </ol>
      <?php include "../../system/welcome.php"?>
      <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <font size='3'>Registrasi maksimal sampai tanggal <b><?php echo format_mak($mak);?></font></b>
      </div>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="table-responsive">
      <form method="post" action="booking-tambah-cari-rm" role="form">
        <div class="col-lg-6">
          <div class="form-group">
            <label>Nomor RM</label>
            <input class="form-control" type="text" name="id_catatan_medik" placeholder="Nomor Rekam Medik">
          </div><button type="submit" class="btn btn-success">Cari</button>
        </div>
      </form>
      <form method="post" action="booking-tambah-cari-nama" role="form">
        <div class="col-lg-6">
          <div class="form-group">
            <label>Nama</label>
            <input class="form-control" type="text" name="nama" placeholder="Nama Pasien">
          </div><button type="submit" class="btn btn-success">Cari</button>
        </div>
      </form>
      <div class="col-lg-6">
        <?php
        if(isset($_POST['polisubmit'])){
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
          $mandiri          = '0';
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
            $antrian       =  $b['antrian']+1;
          }

          $c = mysqli_query($koneksi,
            "SELECT kuota_status FROM dokter WHERE id_dokter='$id_dokter';");
          while($d = mysqli_fetch_array($c)){
            $kuota_status = $d['kuota_status'];
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
          }if (empty($error)){
            $hari = date('w', strtotime($booking_tanggal));

            $a = mysqli_query($koneksi,
              "SELECT COUNT(id_jadwal) AS cek_jadwal FROM dokter_jadwal WHERE id_dokter='$id_dokter' AND hari='$hari'AND id_sesi='$id_sesi';");
            while($b = mysqli_fetch_array($a)){
              $cek_jadwal  = $b['cek_jadwal'];
            }

            if($cek_jadwal>0){
              $e = mysqli_query($koneksi,
                "SELECT kuota FROM dokter_jadwal WHERE hari='$hari' AND id_dokter='$id_dokter'AND id_sesi='$id_sesi';");
              while($f = mysqli_fetch_array($e)){
                $kuota      = $f['kuota'];
              }
              if($antrian > $kuota){
            // Cek antrian melebihi kuota / tidak
                echo "<script>
                setTimeout(function() {
                  swal({
                    title: 'Kuota Penuh',
                    text: 'Silahkan Re-Schedule',
                    type: 'error'
                    }, function() {
                      window.location = 'booking-tambah';
                      });
                      }, 10);
                      </script>";
                    }else{
                      include 'booking-tambah-proses.php';
                    }
                  }else{
                    echo "<script>
                    setTimeout(function() {
                      swal({
                        title: 'Jadwal Kosong',
                        text: 'Silahkan Pilih Hari Lain',
                        type: 'error'
                        }, function() {
                          window.location = 'booking-tambah';
                          });
                          }, 10);
                          </script>";
                        }
                      }
                    }
                    ?><br><br>
                    <form method="post" action="" role="form">
                      <div class="form-group">
                        <label>Nama Pasien</label>
                        <input class="form-control" type="text" name="nama" placeholder="Masukkan..">
                        <p style="color:red;"><?php echo ($error['nama']) ? $error['nama'] : ''; ?></p>
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" type="text" name="alamat" placeholder="Masukkan..">
                        <p style="color:red;"><?php echo ($error['alamat']) ? $error['alamat'] : ''; ?></p>
                      </div>
                      <div class="form-group">
                        <label>Kontak</label>
                        <input class="form-control" type="text" name="kontak" placeholder="Masukkan..">
                        <p style="color:red;"><?php echo ($error['kontak']) ? $error['kontak'] : ''; ?></p>
                      </div>
                      <div class="form-group">
                        <label>Dokter</label>
                        <select class="form-control" type="text" name="id_dokter" required="">
                          <p style="color:red;"><?php echo ($error['id_dokter']) ? $error['id_dokter'] : ''; ?></p>
                          <option disabled selected>Pilih</option>
                          <?php 
                          include '../koneksi.php';
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
                        <input class="form-control" type="date" name="booking_tanggal">
                        <p style="color:red;"><?php echo ($error['booking_tanggal']) ? $error['booking_tanggal'] : ''; ?></p>
                      </div>
                      <div class="form-group">
                        <label>Sesi</label>
                        <p class="bluetext"><b>Pagi :</b> 07.00 - 10.59 | <b>Siang :</b> 11.00 - 14.59 | <b>Sore :</b> 15.00 - 17.59 | <b>Malam :</b> 18.00 - selesai</p>
                        <select class="form-control" type="text" name="id_sesi" required="">
                          <p style="color:red;"><?php echo ($error['id_sesi']) ? $error['id_sesi'] : ''; ?></p>
                          <option disabled selected>Pilih</option>
                          <?php 
                          include '../koneksi.php';
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
              </div><br><br><!-- /.row -->
            </div><!-- /#wrapper -->
            <?php include "views/footer.php"; ?> 