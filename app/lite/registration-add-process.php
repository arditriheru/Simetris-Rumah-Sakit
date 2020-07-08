<?php
include 'views/header.php';
include 'controller/connection.php';
date_default_timezone_set("Asia/Jakarta");
$tanggal=date('Y-m-d');
$jam=date("h:i:sa");
                // menangkap data yang di kirim dari form
$id_catatan_medik = $_POST['id_catatan_medik'];
$nama             = $_POST['nama'];
$alamat           = $_POST['alamat'];
$kontak           = $_POST['kontak'];
$id_dokter        = $_POST['id_dokter'];
$booking_tanggal  = $_POST['booking_tanggal'];
$id_sesi          = $_POST['id_sesi'];
$tanggal          = $tanggal;
$jam              = $jam;
$status           = '2';
$keterangan       = 'DAFTAR MANDIRI';

$tglsekarang  = new DateTime();
$jadwal     = new DateTime("$booking_tanggal");
$selisih      = $tglsekarang->diff($jadwal)->format("%a");
                // cek antrian
$a = mysqli_query($koneksi,
  "SELECT COUNT(*) AS antrian
  FROM booking
  WHERE id_dokter='$id_dokter'
  AND booking_tanggal='$booking_tanggal'
  AND id_sesi='$id_sesi';");
while($b = mysqli_fetch_array($a)){
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
  include 'registration-add-query.php';
}else{
  include '../koneksi.php';
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
    include 'registration-add-query.php';
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
            include 'registration-add-query.php';
          }
        }
      }
      include 'views/footer.php';
      ?>