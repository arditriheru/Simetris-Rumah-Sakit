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
      <h1>Daftar <small>Antenatal Care</small></h1>
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
      <form method="post" action="anc-tambah-cari-rm.php" role="form">
        <div class="col-lg-6">
          <div class="form-group">
            <label>Nomor RM</label>
            <input class="form-control" type="text" name="id_catatan_medik" placeholder="Nomor Rekam Medik">
          </div><button type="submit" class="btn btn-success">Cari</button>
        </div>
      </form>
      <form method="post" action="anc-tambah-cari-nama.php" role="form">
        <div class="col-lg-6">
          <div class="form-group">
            <label>Nama</label>
            <input class="form-control" type="text" name="nama" placeholder="Nama Pasien">
          </div><button type="submit" class="btn btn-success">Cari</button>
        </div>
      </form>
      <div class="col-lg-6">
        <?php
        if(isset($_POST['ancsubmit'])){
          $id_catatan_medik = '0';
          $nama             = $_POST['nama'];
          $alamat           = $_POST['alamat'];
          $kontak           = $_POST['kontak'];
          $id_petugas       = $_POST['id_petugas'];
          $jadwal           = $_POST['jadwal'];
          $id_sesi          = $_POST['id_sesi'];
          $tanggal          = $tanggalsekarang;
          $jam              = $jamsekarang;
          $status           = '0';
          $keterangan       = $_POST['keterangan'];
          $tglsekarang      = new DateTime();
          $cekjadwal        = new DateTime("$jadwal");
          $hasil            = $tglsekarang->diff($cekjadwal)->format("%a");
          $selisih          = $hasil;

          $a = mysqli_query($koneksi,
            "SELECT COUNT(*) AS antrian
            FROM anc
            WHERE id_petugas='$id_petugas'
            AND jadwal='$jadwal'
            AND id_sesi='$id_sesi';");
          while($b = mysqli_fetch_array($a)){

            $antrian       =  $b['antrian']+1;

            $error=array();
            if (empty($nama)){
              $error['nama']='Nama Harus Diisi!!!';
            }if (empty($alamat)){
              $error['alamat']='Alamat Harus Diisi!!!';
            }if (empty($kontak)){
              $error['kontak']='Kontak Harus Diisi!!!';
            }if (empty($id_petugas)){
              $error['id_petugas']='Petugas Harus Diisi!!!';
            }if (empty($jadwal)){
              $error['jadwal']='Tanggal Harus Diisi!!!';
            }if (empty($id_sesi)){
              $error['id_sesi']='Sesi Harus Diisi!!!';
            }if($selisih>30){
              echo "<script>alert('GAGAL!!! Lebih dari 30 Hari!');document.location='anc-tambah.php'</script>";
              break;
            }if(empty($error)){
              $simpan=mysqli_query($koneksi,"INSERT INTO anc (id_anc, id_catatan_medik, id_petugas, nama, alamat, kontak, jadwal, id_sesi, tanggal, jam, status, keterangan)
                VALUES('','$id_catatan_medik','$id_petugas','$nama','$alamat','$kontak','$jadwal','$id_sesi','$tanggal','$jam','$status','$keterangan')");
              if($simpan){
                echo "<script>
                setTimeout(function() {
                  swal({
                    title: 'Antrian $antrian',
                    text: 'Mendaftar Antenatal Care',
                    type: 'success'
                    }, function() {
                      window.location = 'anc-tambah.php';
                      });
                      }, 10);
                      </script>";
                    }else{
                      echo "<script>
                      setTimeout(function() {
                        swal({
                          title: 'Gagal!!!',
                          text: 'Hilangkan Tanda Petik di Nama Pasien',
                          type: 'error'
                          }, function() {
                            window.location = 'anc-tambah.php';
                            });
                            }, 10);
                            </script>";
                          }
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
                        <label>Petugas</label>
                        <select class="form-control" type="text" name="id_petugas" required="">
                          <p style="color:red;"><?php echo ($error['id_petugas']) ? $error['id_petugas'] : ''; ?></p>
                          <option disabled selected>Pilih</option>
                          <?php 
                          $data = mysqli_query($koneksi,
                            "SELECT * FROM mr_petugas WHERE status=1 AND pelayanan=2;");
                          while($d = mysqli_fetch_array($data)){
                            echo "<option value='".$d['id_petugas']."'>".$d['nama_petugas']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Jadwal</label>
                        <input class="form-control" type="date" name="jadwal">
                        <p style="color:red;"><?php echo ($error['jadwal']) ? $error['jadwal'] : ''; ?></p>
                      </div>
                      <div class="form-group">
                        <label>Sesi</label>
                        <p class="bluetext"><b>Pagi :</b> 07.00 - 10.59 | <b>Siang :</b> 11.00 - 14.59 | <b>Sore :</b> 15.00 - 17.59 | <b>Malam :</b> 18.00 - selesai</p>
                        <select class="form-control" type="text" name="id_sesi" required="">
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
                      <button type="submit" name="ancsubmit" class="btn btn-success">Tambah</button>
                      <button type="reset" class="btn btn-warning">Reset</button>  
                    </form>
                  </div>
                </div>
              </div><br><br><!-- /.row -->
            </div><!-- /#wrapper -->
            <?php include "views/footer.php"; ?> 