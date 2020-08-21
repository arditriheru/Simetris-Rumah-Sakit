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
                                </div><hr>
                            </div>
                        </div>
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <ul class="nav nav-pills nav-justified mb-3 mt-2" id="pills-tab" role="tablist">
                                    <li class="nav-item"> 
                                        <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Persalinan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">Imunisasi</a>
                                    </li>
                                </ul>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <img class="img-responsive" src="images/price-list.jpg" width="100%" alt="Koneksi internet lambat.."><br>
                                        <div align="right"><small>Update : Agustus 2020</small></div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                      <!-- <div class="card-title">
                                        <h5 class="text-center">Harga Vaksin</h5>
                                    </div> -->
                                    <table class="table table-bordered table-hover table-striped tablesorter">
                                      <thead>
                                        <tr>
                                            <th scope="col"><center>Nama Vaksin</center></th>
                                            <th scope="col"><center>Harga</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <div id="antrian">
                                            <tr>
                                                <td><center>Hepatitis A</center></td>
                                                <td><center>Rp650.000</center></td>
                                            </tr>
                                            <tr>
                                                <td><center>Hepatitis B</center></td>
                                                <td><center>Rp250.000</center></td>
                                            </tr>
                                            <tr>
                                                <td><center>Imovax/ IPV/ Polio</center></td>
                                                <td><center>Rp250.000</center></td>
                                            </tr>
                                            <tr>
                                                <td><center>BCG</center></td>
                                                <td><center>Rp250.000</center></td>
                                            </tr>
                                            <tr>
                                                <td><center>IPD/ PCV/ Prevenar</center></td>
                                                <td><center>Rp950.000</center></td>
                                            </tr>
                                            <tr>
                                                <td><center>Rotarix/ Rotatex</center></td>
                                                <td><center>Rp450.000</center></td>
                                            </tr>
                                            <tr>
                                                <td><center>Influenza</center></td>
                                                <td><center>Rp450.000</center></td>
                                            </tr>
                                            <tr>
                                                <td><center>MR/ Campak</center></td>
                                                <td><center>Rp450.000</center></td>
                                            </tr>
                                            <tr>
                                                <td><center>Typus</center></td>
                                                <td><center>Rp600.000</center></td>
                                            </tr>
                                            <tr>
                                                <td><center>Varisela/ Cacar Air</center></td>
                                                <td><center>Rp650.000</center></td>
                                            </tr>
                                            <tr>
                                                <td><center>Hexaxim</center></td>
                                                <td><center>Rp1.100.000</center></td>
                                            </tr>
                                            <tr>
                                                <td><center>Imojev</center></td>
                                                <td><center>Rp900.000</center></td>
                                            </tr>
                                            <tr>
                                                <td><center>MMR</center></td>
                                                <td><center>Rp500.000</center></td>
                                            </tr>
                                        </div>
                                    </tbody>
                                </table><div align="right"><small>Update : Agustus 2020</small></div>
                            </div>
                        </div>
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
<a href="javascript: history.back()" class="nav-bottom__link">
    <i class="material-icons nav-bottom__icon">arrow_back</i>
    <span class="nav-bottom__text">Back</span>
</a>
</nav>
<?php include "views/footer.php"; ?> 
