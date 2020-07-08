<?php 
if($selisih>30){
 echo "<script>
 setTimeout(function() {
  swal({
    title: 'Gagal',
    text: 'Lebih dari 30 Hari',
    type: 'error'
    }, function() {
      window.location = 'registration';
      });
      }, 10);
      </script>";
    }elseif($terdaftar>0){
      echo "<script>
      setTimeout(function() {
        swal({
          title: 'Sudah Terdaftar',
          text: 'Hanya dapat mendaftar sekali pada dokter, jadwal dan sesi yang sama',
          type: 'error'
          }, function() {
            window.location = 'registration';
            });
            }, 10);
            </script>";
          }elseif(empty($error)){
            $simpan=mysqli_query($koneksi,"INSERT INTO booking (id_booking, nama, alamat, kontak, id_catatan_medik, booking_tanggal, tanggal, jam, status, keterangan, id_dokter, id_sesi)
              VALUES('','$nama','$alamat',
              '$kontak','$id_catatan_medik','$booking_tanggal','$tanggal','$jam','$status','$keterangan',
              '$id_dokter','$id_sesi')");
            if($simpan){
              $a=mysqli_query($koneksi,"SELECT id_booking FROM booking WHERE id_catatan_medik='$id_catatan_medik' AND booking_tanggal='$booking_tanggal' AND id_dokter='$id_dokter' AND id_sesi='$id_sesi'");
              while($b = mysqli_fetch_array($a)){
                $id_booking = $b['id_booking'];
              }
              echo "<script>
              setTimeout(function() {
                swal({
                  title: 'Antrian $antrian',
                  text: 'Mendaftar Poliklinik',
                  type: 'success'
                  }, function() {
                    window.location = 'registration-detail?id_booking=$id_booking';
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
                          window.location = 'registration';
                          });
                          }, 10);
                          </script>";
                        }
                      }
                      ?>