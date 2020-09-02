<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Skrining <small>COVID-19</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="booking-tambah"><i class="fa fa-plus"></i> Tambah</a></li>
        <li class="active"><i class="fa fa-thumb-tack"></i> Skrining</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <?php
      if(isset($_POST['diagnosa'])){
        $A1 = $_POST['a1'];
        $A2 = $_POST['a2'];
        $A3 = $_POST['a3'];
        $B1 = $_POST['b1'];
        $C1 = $_POST['c1'];
        $C2 = $_POST['c2'];
        $C3 = $_POST['c3'];

        if($A1==1 && $A2==1 && $A3==1 && $B1==1 && $C1==1 ||
          $A1==1 && $A2==1 && $A3==1 && $B1==1 && $C2==1 ||
          $A1==1 && $A2==1 && $B1==1 && $C1==1 ||
          $A1==1 && $A2==1 && $B1==1 && $C2==1 ||
          $A1==1 && $A2==1 && $A3==1 && $C3==1 ||
          $A1==1 && $A2==1 && $A3==1 && $B1==1 ||
          $A1==1 && $A2==1 && $C3==1 ||
          $A1==1 && $C3==1 ||
          $A2==1 && $C3==1){
          echo "<script>
          setTimeout(function() {
            swal({
              title: 'P.D.P',
              text: 'Curiga Pasien Dalam Pengawasan',
              type: 'error'
              }, function() {
                window.location = 'covid-skrining';
                });
                }, 10);
                </script>";
              }elseif($A1==1 && $B1==1 && $C1==1 ||
                $A2==1 && $B1==1 && $C1==1 ||
                $A1==1 && $B1==1 && $C2==1 ||
                $A2==1 && $B1==1 && $C2==1){
                echo "<script>
                setTimeout(function() {
                  swal({
                    title: 'O.D.P',
                    text: 'Curiga Orang Dalam Pengawasan',
                    type: 'warning'
                    }, function() {
                      window.location = 'covid-skrining';
                      });
                      }, 10);
                      </script>";
                    }elseif($C1==1 && $C2==1 && $C3==1){
                      echo "<script>
                      setTimeout(function() {
                        swal({
                          title: 'O.T.G',
                          text: 'Curiga Orang Tanpa Gejala',
                          type: 'warning'
                          }, function() {
                            window.location = 'covid-skrining';
                            });
                            }, 10);
                            </script>";
                          }elseif($C1==1 && $C2==1){
                            echo "<script>
                            setTimeout(function() {
                              swal({
                                title: 'Inshaallah Aman',
                                text: 'Wajib Skrining Lanjutan di UGD',
                                type: 'warning'
                                }, function() {
                                  window.location = 'covid-skrining';
                                  });
                                  }, 10);
                                  </script>";
                                }else{
                                  echo "<script>
                                  setTimeout(function() {
                                    swal({
                                      title: 'Inshaallah Aman',
                                      text: 'Bismillah, Inshaallah Pasien Aman',
                                      type: 'success'
                                      }, function() {
                                        window.location = 'booking-tambah';
                                        });
                                        }, 10);
                                        </script>";
                                      }
                                    }
                                    ?>
                                    <form method="post" action="" role="form">
                                      <h5 class="bluetext"><b>A. Gejala</b></h5>
                                      <ol>
                                        <div class="form-group">
                                          <label><li></li></label> Apakah pasien (termasuk pendamping) merasa demam >38&deg;C / riwayat demam <14 hari?
                                          <select class="form-control" type="text" name="a1" required>
                                            <option value="">Pilih</option>
                                            <option value='1'>Ya</option>
                                            <option value='0'>Tidak</option>"
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label><li></li></label> Apakah pasien (termasuk pendamping) merasa batuk / pilek / sakit tenggorokan / sesak nafas <14 hari?
                                          <select class="form-control" type="text" name="a2" required>
                                            <option value="">Pilih</option>
                                            <option value='1'>Ya</option>
                                            <option value='0'>Tidak</option>"
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label><li></li></label> Apakah pasien (termasuk pendamping) merasakan nafas cepat / terasa berat <14 hari?<br>
                                            <select class="form-control" type="text" name="a3" required>
                                              <option value="">Pilih</option>
                                              <option value='1'>Ya</option>
                                              <option value='0'>Tidak</option>"
                                            </select>
                                          </div>
                                        </ol>
                                        <h5 class="bluetext"><b>B. Penyebab (Evaluasi DPJP)</b></h5>
                                        <ol>
                                          <div class="form-group">
                                            <label><li></li></label> Tidak ada penyebab lain berdasarkan gambaran klinis yang meyakinkan
                                            <select class="form-control" type="text" name="b1" required>
                                              <option value='1' selected >Ya (Otomatis)</option>
                                            </select>
                                          </div>
                                        </ol>
                                      </div>
                                      <div class="col-lg-6">
                                        <h5 class="bluetext"><b>C. Faktor Risiko</b></h5>
                                        <ol>
                                          <div class="form-group">
                                            <label><li></li></label> Apakah pasien (termasuk pendamping) memiliki riwayat perjalanan / tinggal di luar negeri dalam waktu 14 hari sebelum timbul gejala?
                                            <select class="form-control" type="text" name="c1" required>
                                              <option value="">Pilih</option>
                                              <option value='1'>Ya</option>
                                              <option value='0'>Tidak</option>"
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label><li></li></label> Apakah pasien (termasuk pendamping) memiliki riwayat bepergian dari area transmisi lokal di Indonesia / dari luar kota Yogyakarta / Indogrosir Yogyakarta, dalam waktu 14 hari sebelum timbul gejala?
                                            <select class="form-control" type="text" name="c2" required>
                                              <option value="">Pilih</option>
                                              <option value='1'>Ya</option>
                                              <option value='0'>Tidak</option>"
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label><li></li></label> Apakah pasien (termasuk pendamping) memiliki riwayat kontak erat dengan pasien yang diduga maupun yang positif COVID-19?<br>
                                            <select class="form-control" type="text" name="c3" required>
                                              <option value="">Pilih</option>
                                              <option value='1'>Ya</option>
                                              <option value='0'>Tidak</option>"
                                            </select>
                                          </div>
                                          <button type="submit" name="diagnosa" class="btn btn-success">Diagnosis</button>
                                        </ol>
                                      </form>
                                    </div>
                                  </div><br>
                                  <div class="row">
                                    <div class="col-lg-4">
                                      <p class="redtext"><b>Tindak Lanjut Curiga PDP :</b></p>
                                      <ol>
                                        <li>Siapkan rujukan ke RS rujukan, komunikasi risiko, identifikasi dan pemantauan kontak erat;</li>
                                      </ol>
                                    </div>
                                    <div class="col-lg-4">
                                      <p class="redtext"><b>Tindak Lanjut Curiga ODP :</b></p>
                                      <ol>
                                        <li>Beri masker pada ODP (jika tidak memakai masker);</li>
                                        <li>Edukasi isolasi di rumah selama 14 hari;</li>
                                        <li>Edukasi kepada pasien dan keluarga tentang PHBS;</li>
                                      </ol>
                                    </div>
                                    <div class="col-lg-4">
                                      <p class="redtext"><b>Tindak Lanjut Curiga OTG :</b></p>
                                      <ol>
                                        <li>Beri masker pada OTG (jika tidak memakai masker);</li>
                                        <li>Edukasi isolasi di rumah selama 14 hari;</li>
                                        <li>Edukasi kepada pasien dan keluarga tentang PHBS;</li>
                                      </ol>
                                    </div><br><br>
                                  </div><!-- /.row -->
                                </div><!-- /#wrapper -->
                                <?php include "views/footer.php"; ?> 