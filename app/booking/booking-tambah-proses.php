<?php 
if($selisih>30){
 echo "<script>
 setTimeout(function() {
  swal({
    title: 'Diatas 30 Hari',
    text: 'Silahkan Re-Schedule',
    type: 'error'
    }, function() {
      window.location = 'booking-tambah.php';
      });
      }, 10);
      </script>";
    }elseif($terdaftar>0){
      echo "<script>
      setTimeout(function() {
        swal({
          title: 'Sudah Tendaftar',
          text: 'Silahkan Periksa Kembali',
          type: 'error'
          }, function() {
            window.location = 'booking-tambah.php';
            });
            }, 10);
            </script>";
          }elseif(empty($error)){
            $simpan=mysqli_query($koneksi,"INSERT INTO booking (id_booking, nama, alamat, kontak, id_catatan_medik, booking_tanggal, tanggal, jam, status, keterangan, id_dokter, id_sesi, mandiri, antrian)
              VALUES('','$nama','$alamat',
              '$kontak','$id_catatan_medik','$booking_tanggal','$tanggal','$jam','$status','$keterangan',
              '$id_dokter','$id_sesi','$mandiri','$antrian')");
            if($simpan){
                // cek antrian
              $a = mysqli_query($koneksi,
                "SELECT FIND_IN_SET( id_booking, (    
                SELECT GROUP_CONCAT(id_booking) 
                FROM booking 
                WHERE booking_tanggal = '$booking_tanggal'
                AND id_dokter = '$id_dokter'
                AND id_sesi = '$id_sesi')
                ) AS antrian
                FROM booking
                WHERE id_catatan_medik = '$id_catatan_medik';");
              while($b = mysqli_fetch_array($a)){
                $antrian =  $b['antrian'];
              }
              echo "<script>
              setTimeout(function() {
                swal({
                  title: 'Antrian $antrian',
                  text: 'Mendaftar Poliklinik',
                  type: 'success'
                  }, function() {
                    window.location = 'booking-tambah.php';
                    });
                    }, 10);
                    </script>";
                  }else{
                    echo "<script>
                    setTimeout(function() {
                      swal({
                        title: 'Gagal',
                        text: 'Hilangkan Tanda Petik di Nama Pasien',
                        type: 'error'
                        }, function() {
                          window.location = 'booking-tambah.php';
                          });
                          }, 10);
                          </script>";
                        }
                      }
                      ?>