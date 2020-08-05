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
                                    <h4 class="text-center">Jadwal Dokter</h4>
                                </div>
                                <hr>
                                <form action="show-schedule" method="post" class="">
                                    <div class="row form-group">
                                        <select class="form-control" type="text" name="id_dokter">
                                            <p style="color:red;"><?php echo ($error['dokter']) ? $error['dokter'] : ''; ?></p>
                                            <option disabled selected>Pilih Dokter</option>
                                            <?php 
                                            include 'controller/connection.php';
                                            $data = mysqli_query($koneksi,
                                              "SELECT * FROM dokter WHERE status=1;");
                                            while($d = mysqli_fetch_array($data)){
                                                echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div><br>
                                    <div>
                                        <button id="search-schedule" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="search-schedule-amount">Lihat Jadwal</span>
                                            <span id="search-schedule-sending" style="display:none;">Sending…</span>
                                        </button>
                                    </div>
                                </form><br>
                            </div>
                        </div>
                    </div>
                </div><!-- .card -->
            </div><!--/.col-->
        </div><!--/.row-->
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
<a href="https://pendaftaran.rskiarachmi.co.id/" class="nav-bottom__link">
    <i class="material-icons nav-bottom__icon">arrow_back</i>
    <span class="nav-bottom__text">Back</span>
</a>
</nav>
<?php include "views/footer.php"; ?> 