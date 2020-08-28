<?php include "views/header.php"; ?>
<?php
if(isset($_POST['submitrekomendasi'])){
  $bagian     = $_POST['bagian'];
  $skor       = $_POST['skor'];
  $simpan=mysqli_query($koneksi,"INSERT INTO kuesioner(id_kuesioner, nama, kontak, id_dokter, id_petugas, pelayanan, poliklinik, bagian, skor, tanggal, jam)
    VALUES('','$getNama','$getKontak','$null','$null','$getPelayanan','$null','$bagian','$skor','$tanggalsekarang','$jamsekarang')");
  
  if($simpan){
    unset($_SESSION['getNama']);
    unset($_SESSION['getKontak']);
    unset($_SESSION['getPelayanan']);
    unset($_SESSION['getIdDokter']);
    echo "<script>
    setTimeout(function() {
      swal({
        title: 'Terimakasih',
        text: 'Atas Partisipasi Anda',
        type: 'success',
        showConfirmButton: false,
        timer: 1500
        }, function() {
          window.location = '../index';
          });
          }, 10);
          </script>";
        }
      }
      ?>
      <div class="col-lg-12">
        <div align="center" class="row">
          <h3><b>SEBERAPA INGIN ANDA</b></h3>
          <h1><b>MEREKOMENDASIKAN RSKIA RACHMI KEPADA KOLEGA ANDA?</b></h1><br><br>
          <form method="post" action="" role="form">
            <div class="col-lg-4">
              <div align="center">
               <input class="form-control" type="hidden" name="bagian" value="rekomendasi">
               <input class="form-control" type="hidden" name="skor" value="4">
               <button type="submit" name="submitrekomendasi" class="btn">
                <img src="../images/a.png" class="rounded float-right" width="200px">
              </div>
              <h2>Sangat Ingin</h2>
            </div>
          </form>
          <form method="post" action="" role="form">
            <div class="col-lg-4">
              <div align="center">
                <input class="form-control" type="hidden" name="bagian" value="rekomendasi">
                <input class="form-control" type="hidden" name="skor" value="5">
                <button type="submit" name="submitrekomendasi" class="btn">
                  <img src="../images/b.png" class="rounded float-right" width="200px">
                </div>
                <h2>Cukup Ingin</h2>
              </div>
            </form>
            <form method="post" action="" role="form">
              <div class="col-lg-4">
                <div align="center">
                  <input class="form-control" type="hidden" name="bagian" value="rekomendasi">
                  <input class="form-control" type="hidden" name="skor" value="6">
                  <button type="submit" name="submitrekomendasi" class="btn">
                    <img src="../images/d.png" class="rounded float-right" width="200px">
                  </div>
                  <h2>Tidak Ingin</h2>
                </div>
              </form>
            </div>
          </div><br>
          <?php include "views/footer.php"; ?>