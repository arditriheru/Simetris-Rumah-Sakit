<?php
include 'views/header.php';
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
$keterangan       = 'DAFTAR MANDIRI, AMAN';
$mandiri          = '1';

$tglsekarang      = new DateTime();
$jadwal           = new DateTime("$booking_tanggal");
$selisih          = $tglsekarang->diff($jadwal)->format("%a");

// cek antrian
$simpan=mysqli_query($koneksi,"INSERT INTO booking (id_booking, nama, alamat, kontak, id_catatan_medik, booking_tanggal, tanggal, jam, status, keterangan, id_dokter, id_sesi, mandiri, antrian)
  VALUES('','$nama','$alamat',
  '$kontak','$id_catatan_medik','$booking_tanggal','$tanggal','$jam','$status','$keterangan',
  '$id_dokter','$id_sesi','$mandiri','$antrian')");

if($simpan){
  $a = mysqli_query($koneksi,
    "SELECT id_booking, FIND_IN_SET( id_booking, (    
    SELECT GROUP_CONCAT(id_booking) 
    FROM booking 
    WHERE booking_tanggal = '$booking_tanggal'
    AND id_dokter = '$id_dokter'
    AND id_sesi = '$id_sesi')
    ) AS antrian
    FROM booking
    WHERE id_catatan_medik = '$id_catatan_medik';");
  while($b = mysqli_fetch_array($a)){
    $id_booking = $b['id_booking'];
    $antrian    = $b['antrian'];
  }

  echo "<script>
  setTimeout(function() {
    swal({
      title: 'Antrian $antrian',
      text: 'Mendaftar Poliklinik',
      type: 'success'
      }, function() {
        window.location = 'registration-detail?id=$id_booking&no=$antrian';
        });
        }, 10);
        </script>";
      }else{
        echo "<script>
        setTimeout(function() {
          swal({
            title: 'Upss..',
            text: 'Gagal Mendaftar, Silahkan Hubungi Petugas',
            type: 'error'
            }, function() {
              javascript:window.location = document.referrer;
              });
              }, 10);
              </script>";
            }
            include 'views/footer.php';
            ?>