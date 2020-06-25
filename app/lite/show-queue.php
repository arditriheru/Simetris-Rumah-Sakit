<?php
include "views/header.php";
include "controller/anak-controller.php";
include "controller/kandungan-controller.php";
?>
<script type="text/javascript">
    var antrian = setInterval(
        function(){
            $('#antrian').load('show-queue.php').fadeIn("slow");
        }, 1000);
    </script>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Poli Anak</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><center>Dokter</th>
                                            <th scope="col"><center>Antrian</th>
                                                <th scope="col"><center>Total</th>
                                                    <th scope="col"><center>Dilayani</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <div id="antrian">
                                                        <tr>
                                                            <td><center>
                                                                <?php
                                                                if(!$anak_nama_dokter){
                                                                    ?>
                                                                    Tutup
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <?php echo $anak_nama_dokter?>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><center>A<?php echo $anak_ant; ?></td>
                                                                <td><center><?php echo $anak_max; ?></td>
                                                                    <td><center><?php echo $anak_ant;?></td>
                                                                    </tr>
                                                                </div>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Poli Kandungan</strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col"><center>Dokter</th>
                                                                        <th scope="col"><center>Antrian</th>
                                                                            <th scope="col"><center>Total</th>
                                                                                <th scope="col"><center>Dilayani</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <div id="antrian">
                                                                                  <tr>
                                                                                    <td><center>
                                                                                        <?php
                                                                                        if(!$kandungan_nama_dokter){
                                                                                            ?>
                                                                                            Tutup
                                                                                            <?php
                                                                                        }else{
                                                                                            ?>
                                                                                            <?php echo $kandungan_nama_dokter?>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                    </td>
                                                                                    <td><center>B<?php echo $kandungan_ant; ?></td>
                                                                                        <td><center><?php echo $kandungan_max; ?></td>
                                                                                            <td><center><?php echo $kandungan_ant;?></td>
                                                                                            </tr>
                                                                                        </div>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                                        <a href="https://pendaftaran.rskiarachmi.co.id/" class="nav-bottom__link">
                                                            <i class="material-icons nav-bottom__icon">arrow_back</i>
                                                            <span class="nav-bottom__text">Back</span>
                                                        </a>
                                                    </nav>
                                                    <?php include "views/footer.php"; ?> 