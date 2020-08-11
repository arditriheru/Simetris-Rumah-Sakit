<?php include "views/header.php"; ?>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <!-- Credit Card -->
            <div id="pay-invoice">
              <div class="card-body">
                <div class="form-group text-center">
                  <img src="images/logo-rachmi-akreditasi-kars.png" alt="Rachmi Online">
                </div>
                <hr>
                <div class="card-title">
                  <h4 class="text-center">Skrining COVID-19</h4>
                </div>
                <hr>
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
                                    }else{
                                      echo "<script>
                                      setTimeout(function() {
                                        swal({
                                          title: 'Sehat',
                                          text: 'Pasien Aman',
                                          type: 'success'
                                          }, function() {
                                            window.location = 'registration';
                                            });
                                            }, 10);
                                            </script>";
                                          }
                                        }
                                        ?>
                                        <form method="post" action="" role="form">
                                          <p class="bluetext"><b>A. Gejala</b></p>
                                          <ol>
                                            <div class="form-group">
                                              <label><li></li></label> Apakah pasien (termasuk pendamping) merasa demam >38&deg;C / riwayat demam <14 hari?
                                              <select class="form-control" type="text" name="a1" required="">
                                               <option value="">Pilih</option>
                                               <option value='1'>Ya</option>
                                               <option value='0'>Tidak</option>"
                                             </select>
                                           </div>
                                           <div class="form-group">
                                            <label><li></li></label> Apakah pasien (termasuk pendamping) merasa batuk / pilek / sakit tenggorokan / sesak nafas <14 hari?
                                            <select class="form-control" type="text" name="a2" required="">
                                             <option value="">Pilih</option>
                                             <option value='1'>Ya</option>
                                             <option value='0'>Tidak</option>"
                                           </select>
                                         </div>
                                         <div class="form-group">
                                          <label><li></li></label> Apakah pasien (termasuk pendamping) merasakan nafas cepat / terasa berat <14 hari?<br>
                                            <select class="form-control" type="text" name="a3" required="">
                                             <option value="">Pilih</option>
                                             <option value='1'>Ya</option>
                                             <option value='0'>Tidak</option>"
                                           </select>
                                         </div>
                                       </ol><br>
                                       <p class="bluetext"><b>B. Penyebab (Evaluasi DPJP)</b></p>
                                       <ol>
                                        <div class="form-group">
                                          <label><li></li></label> Tidak ada penyebab lain berdasarkan gambaran klinis yang meyakinkan
                                          <select class="form-control" type="text" name="b1" required="">
                                            <option value='1' selected >Ya (Otomatis)</option>
                                          </select>
                                        </div>
                                      </ol><br>
                                      <p class="bluetext"><b>C. Faktor Risiko</b></p>
                                      <ol>
                                        <div class="form-group">
                                          <label><li></li></label> Apakah pasien (termasuk pendamping) memiliki riwayat perjalanan / tinggal di luar negeri dalam waktu 14 hari sebelum timbul gejala?
                                          <select class="form-control" type="text" name="c1" required="">
                                           <option value="">Pilih</option>
                                           <option value='1'>Ya</option>
                                           <option value='0'>Tidak</option>"
                                         </select>
                                       </div>
                                       <div class="form-group">
                                        <label><li></li></label> Apakah pasien (termasuk pendamping) memiliki riwayat bepergian dari area transmisi lokal di Indonesia / dari luar kota Yogyakarta / Indogrosir Yogyakarta, dalam waktu 14 hari sebelum timbul gejala?
                                        <select class="form-control" type="text" name="c2" required="">
                                         <option value="">Pilih</option>
                                         <option value='1'>Ya</option>
                                         <option value='0'>Tidak</option>"
                                       </select>
                                     </div>
                                     <div class="form-group">
                                      <label><li></li></label> Apakah pasien (termasuk pendamping) memiliki riwayat kontak erat dengan pasien yang diduga maupun yang positif COVID-19?<br>
                                      <select class="form-control" type="text" name="c3" required="">
                                       <option value="">Pilih</option>
                                       <option value='1'>Ya</option>
                                       <option value='0'>Tidak</option>"
                                     </select>
                                   </div><br>
                                   <div>
                                    <button id="diagnosa" name="diagnosa" type="submit" class="btn btn-lg btn-info btn-block">
                                      <span id="search-schedule-amount">Diagnosis</span>
                                      <span id="search-schedule-sending" style="display:none;">Sending…</span>
                                    </button>
                                  </div>
                                </ol>
                              </form><br>
                            </div>
                          </div>
                        </div><!-- .card -->
                      </div><!--/.col-->
                    </div><!--/.row-->
                  </div>
                </div>
              </div>
              <nav class="nav-bottom">
                <a href="help" class="nav-bottom__link">
                  <i class="material-icons nav-bottom__icon">help_outline</i>
                  <span class="nav-bottom__text">Help</span>
                </a>
                <a href="https://pendaftaran.rskiarachmi.co.id/" class="nav-bottom__link nav-bottom__link--active">
                  <i class="material-icons nav__icon">dashboard</i>
                  <span class="nav-bottom__text">Home</span>
                </a>
                <a href="javascript: history.back()" class="nav-bottom__link">
                  <i class="material-icons nav-bottom__icon">arrow_back</i>
                  <span class="nav-bottom__text">Back</span>
                </a>
              </nav>
              <?php include "views/footer.php"; ?> 