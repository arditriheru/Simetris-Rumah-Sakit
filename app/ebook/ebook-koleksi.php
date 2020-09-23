<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>E-Book <small>Koleksi</small></h1>
      <ol class="breadcrumb">
        <li><a href="../../dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-plus"></i> Koleksi</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
     <ul class="nav nav-tabs" style="margin-bottom: 15px;">
      <li><a href="#1" data-toggle="tab">Umum</a></li>
      <li><a href="#2" data-toggle="tab">Manajemen</a></li>
      <li><a href="#3" data-toggle="tab">Medis</a></li>
      <li><a href="#4" data-toggle="tab">Keperawatan</a></li>
      <li><a href="#5" data-toggle="tab">Perundangan</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade active in" id="1">
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                    <th><center>No</center></th>
                    <th><center>Kategori</center></th>
                    <th><center>Judul Buku</center></th>
                    <th><center>Tahun</center></th>
                    <th><center>Dokumen</center></th>
                  </tr>
                </thead>
                <tbody>
                  <!---------- Batas ----------->
                  <?php 
                  $no = 1;
                  $data = mysqli_query($koneksi,
                   "SELECT * FROM buku where kategori='Umum' ORDER BY id_buku DESC");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><center><?php echo $no++; ?></center></td>
                      <td><center><?php echo $d['kategori']; ?></center></td>
                      <td><left><?php echo $d['judul']; ?></left></td>
                      <td><center><?php echo $d['tahun']; ?></center></td>
                      <td><div align="center">
                        <a href="dokumen-tampil.php?id_buku=<?php echo $d['id_buku']; ?>"
                          <button type="button" class="btn btn-success">PDF</a>
                          </div></td>
                        </tr>
                      <?php } ?>                  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="2">
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th><center>No</center></th>
                        <th><center>Kategori</center></th>
                        <th><center>Judul Buku</center></th>
                        <th><center>Tahun</center></th>
                        <th><center>Dokumen</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <!---------- Batas ----------->
                      <?php 
                      $no = 1;
                      $data = mysqli_query($koneksi,
                       "SELECT * FROM buku where kategori='Manajemen' order by id_buku DESC");
                      while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                          <td><center><?php echo $no++; ?></center></td>
                          <td><center><?php echo $d['kategori']; ?></center></td>
                          <td><left><?php echo $d['judul']; ?></left></td>
                          <td><center><?php echo $d['tahun']; ?></center></td>
                          <td><div align="center">
                            <a href="dokumen-tampil.php?id_buku=<?php echo $d['id_buku']; ?>"
                              <button type="button" class="btn btn-success">PDF</a>
                              </div></td>
                            </tr>
                          <?php } ?>                  
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="3">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover table-striped tablesorter">
                        <thead>
                          <tr>
                            <th><center>No</center></th>
                            <th><center>Kategori</center></th>
                            <th><center>Judul Buku</center></th>
                            <th><center>Tahun</center></th>
                            <th><center>Dokumen</center></th>
                          </tr>
                        </thead>
                        <tbody>
                          <!---------- Batas ----------->
                          <?php 
                          $no = 1;
                          $data = mysqli_query($koneksi,
                           "SELECT * FROM buku where kategori='Medis' order by id_buku DESC");
                          while($d = mysqli_fetch_array($data)){
                            ?>
                            <tr>
                              <td><center><?php echo $no++; ?></center></td>
                              <td><center><?php echo $d['kategori']; ?></center></td>
                              <td><left><?php echo $d['judul']; ?></left></td>
                              <td><center><?php echo $d['tahun']; ?></center></td>
                              <td><div align="center">
                                <a href="dokumen-tampil.php?id_buku=<?php echo $d['id_buku']; ?>"
                                  <button type="button" class="btn btn-success">PDF</a>
                                  </div></td>
                                </tr>
                              <?php } ?>                  
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="4">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="table-responsive">
                          <table class="table table-bordered table-hover table-striped tablesorter">
                            <thead>
                              <tr>
                                <th><center>No</center></th>
                                <th><center>Kategori</center></th>
                                <th><center>Judul Buku</center></th>
                                <th><center>Tahun</center></th>
                                <th><center>Dokumen</center></th>
                              </tr>
                            </thead>
                            <tbody>
                              <!---------- Batas ----------->
                              <?php 
                              $no = 1;
                              $data = mysqli_query($koneksi,
                               "SELECT * FROM buku where kategori='Keperawatan' order by id_buku DESC");
                              while($d = mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                  <td><center><?php echo $no++; ?></center></td>
                                  <td><center><?php echo $d['kategori']; ?></center></td>
                                  <td><left><?php echo $d['judul']; ?></left></td>
                                  <td><center><?php echo $d['tahun']; ?></center></td>
                                  <td><div align="center">
                                    <a href="dokumen-tampil.php?id_buku=<?php echo $d['id_buku']; ?>"
                                      <button type="button" class="btn btn-success">PDF</a>
                                      </div></td>
                                    </tr>
                                  <?php } ?>                  
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="5">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                  <tr>
                                    <th><center>No</center></th>
                                    <th><center>Kategori</center></th>
                                    <th><center>Judul Buku</center></th>
                                    <th><center>Tahun</center></th>
                                    <th><center>Dokumen</center></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <!---------- Batas ----------->
                                  <?php 
                                  $no = 1;
                                  $data = mysqli_query($koneksi,
                                   "SELECT * FROM buku where kategori='Perundangan' order by id_buku DESC");
                                  while($d = mysqli_fetch_array($data)){
                                    ?>
                                    <tr>
                                      <td><center><?php echo $no++; ?></center></td>
                                      <td><center><?php echo $d['kategori']; ?></center></td>
                                      <td><left><?php echo $d['judul']; ?></left></td>
                                      <td><center><?php echo $d['tahun']; ?></center></td>
                                      <td><div align="center">
                                        <a href="dokumen-tampil.php?id_buku=<?php echo $d['id_buku']; ?>"
                                          <button type="button" class="btn btn-success">PDF</a>
                                          </div></td>
                                        </tr>
                                      <?php } ?>                  
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div><!-- /.row -->
                      </div><!-- /#page-wrapper -->
                    </div><!-- /#wrapper -->