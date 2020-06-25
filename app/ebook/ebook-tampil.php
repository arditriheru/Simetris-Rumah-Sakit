<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>E-Book <small>Tampil</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-list"></i> E-Book</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
              <th><center>No</center></th>
              <th><center>Kategori</center></th>
              <th><center>Judul</center></th>
              <th><center>Action</center></th>
            </tr>
          </thead>
          <tbody>
            <!---------- Batas ----------->
            <?php 
            $no = 1;
            $data = mysqli_query($koneksi,
             "SELECT * FROM buku order by id_buku DESC;");
            while($d = mysqli_fetch_array($data)){
              ?>
              <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><center><?php echo $d['kategori']; ?></center></td>
                <td><center><?php echo $d['judul']; ?></center></td>
                <td>
                  <div align="center">
                    <a href="dokumen-tampil.php?id_buku=<?php echo $d['id_buku']; ?>"
                      <button type="button" class="btn btn-warning"><i class="fa fa-book"></i></a>
                        <a href="ebook-hapus.php?id_buku=<?php echo $d['id_buku']; ?>"
                          <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                          </div>
                        </td>
                        </tr><?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div><!-- /.row -->
            </div><!-- /#wrapper -->
            <?php include "views/footer.php"; ?> 

