<?php 
if($selisih>30){
 echo "<script>
 setTimeout(function() {
  swal({
    title: 'Gagal',
    text: 'Lebih dari 30 Hari',
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
          title: 'Gagal',
          text: 'Sudah Mendaftar Sebelumnya',
          type: 'error'
          }, function() {
            window.location = 'booking-tambah';
            });
            }, 10);
            </script>";
          }elseif(empty($error)){
            $simpan=mysqli_query($koneksi,"INSERT INTO booking (id_booking, nama, alamat, kontak, id_catatan_medik, booking_tanggal, tanggal, jam, status, keterangan, id_dokter, id_sesi)
              VALUES('','$nama','$alamat',
              '$kontak','$id_catatan_medik','$booking_tanggal','$tanggal','$jam','$status','$keterangan',
              '$id_dokter','$id_sesi')");
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