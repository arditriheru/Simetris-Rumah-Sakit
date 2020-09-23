<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>E-Book <small>Daftar</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-list"></i> Daftar</li>
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
              <th colspan="3"><center>Action</center></th>
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
                      <button type="button" class="btn btn-primary"><i class="fa fa-book"></i></a>
                      </div>
                    </td>
                    <td>
                      <div align="center">
                        <a href="ebook-edit.php?id_buku=<?php echo $d['id_buku']; ?>"
                          <button type="button" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                          </div>
                        </td>
                        <td>
                          <div align="center">
                            <a href="ebook-hapus.php?id_buku=<?php echo $d['id_buku']; ?>"
                              onclick="javascript: return confirm('Anda yakin hapus?')">
                              <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i>
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

