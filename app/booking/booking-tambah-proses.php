<?php 
if($selisih>30){
 echo "<script>
 setTimeout(function() {
  swal({
    title: 'Diatas 30 Hari',
    text: 'Silahkan Re-Schedule',
    type: 'error'
    }, function() {
      window.location = 'booking-tambah';
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
            window.location = 'booking-tambah';
            });
            }, 10);
            </script>";
          }elseif(empty($error)){
            $simpan=mysqli_query($koneksi,"INSERT INTO booking (id_booking, nama, alamat, kontak, id_catatan_medik, booking_tanggal, tanggal, jam, status, keterangan, id_dokter, id_sesi, mandiri)
              VALUES('','$nama','$alamat',
              '$kontak','$id_catatan_medik','$booking_tanggal','$tanggal','$jam','$status','$keterangan',
              '$id_dokter','$id_sesi','$mandiri')");
            if($simpan){
              echo "<script>
              setTimeout(function() {
                swal({
                  title: 'Antrian $antrian',
                  text: 'Mendaftar Poliklinik',
                  type: 'success'
                  }, function() {
                    window.location = 'booking-tambah';
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
                          window.location = 'booking-tambah';
                          });
                          }, 10);
                          </script>";
                        }
                      }
                      ?>