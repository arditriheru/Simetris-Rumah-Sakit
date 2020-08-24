<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Tambah <small>Petugas</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-plus"></i> Dokter</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
    <div class="col-lg-12">
      <div class="table-responsive">

        <ul class="nav nav-pills" style="margin-bottom: 15px;">
          <li class="active"><a href="#1" data-toggle="tab">Dokter</a></li>
          <li><a href="#2" data-toggle="tab">Petugas</a></li>
        </ul>

        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="1">
            <div class="row">
              <div class="table-responsive">
                <div class="col-lg-12">
                 <?php
                 if(isset($_POST['tambah'])){
                  $nama_dokter = $_POST['nama_dokter'];
                  $status = '1';
                  $id_unit = $_POST['id_unit'];
                  
                  $error=array();
                  if (empty($nama_dokter)){
                    $error['nama_dokter']='Nama Dokter Harus Diisi!!!';
                  }if (empty($id_unit)){
                    $error['id_unit']='Unit Dokter Harus Diisi!!!';
                  }if(empty($error)){
                    $simpan=mysqli_query($koneksi,"INSERT INTO dokter (id_dokter, nama_dokter, status, id_unit)
                      VALUES('','$nama_dokter','$status','$id_unit')");
                    if($simpan){
                      echo '<script>
                      setTimeout(function() {
                        swal({
                          title: "Sukses!!!",
                          text: "Berhasil Menambah Dokter",
                          type: "success"
                          }, function() {
                            window.location = "dokter-tambah";
                            });
                            }, 10);
                            </script>';
                          }else{
                            echo '<script>
                            setTimeout(function() {
                              swal({
                                title: "Gagal!!!",
                                type: "error"
                                }, function() {
                                  window.location = "dokter-tambah";
                                  });
                                  }, 10);
                                  </script>';
                                }
                              }
                            }
                            ?>
                            <form method="post" action="" role="form">
                              <div class="form-group">
                                <label>Nama Dokter</label>
                                <input class="form-control" type="text" name="nama_dokter" placeholder="Contoh : Sulchan Sofoewan, Ph.D, Sp.OG (K). Prof. dr.">
                                <p style="color:blue">Tuliskan nama dokter sesuai di SIMRS!!!
                                  <p style="color:red;"><?php echo ($error['nama_dokter']) ? $error['nama_dokter'] : ''; ?></p>
                                </div>
                                <div class="form-group">
                                  <label>Spesialis</label>
                                  <select class="form-control" type="text" name="id_unit" required="">
                                    <p style="color:red;"><?php echo ($error['id_unit']) ? $error['id_unit'] : ''; ?></p>
                                    <option value="">Pilih</option>
                                    <option value='1'>Dokter Anak</option>
                                    <option value='2'>Dokter Kandungan</option>
                                    <option value='3'>Dokter Bedah</option>
                                  </select>
                                </div>
                                <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
                                <button type="reset" class="btn btn-warning">Reset</button>  
                              </form><br>
                            </div>
                            <div class="col-lg-12">
                              <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                  <tr>
                                    <th><center>No</center></th>
                                    <th><center>Nama Dokter</center></th>
                                    <th><center>Spesialis</center></th>
                                    <th><center>Status</center></th>
                                    <th colspan="2"><center>Action</center></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                  $no = 1;
                                  $data = mysqli_query($koneksi,
                                    "SELECT *,  IF (status='1', 'Aktif', 'Nonaktif') AS status,
                                    CASE
                                    WHEN id_unit='1' THEN 'Dokter Anak'
                                    WHEN id_unit='2' THEN 'Dokter Kandungan'
                                    WHEN id_unit='3' THEN 'Dokter Bedah'
                                    END AS nama_unit
                                    FROM dokter;");
                                  while($d = mysqli_fetch_array($data)){
                                    $status = $d['status'];
                                    ?>
                                    <tr>
                                      <td><center><?php echo $no++; ?></center></td>
                                      <td><left><?php echo $d['nama_dokter']; ?></left></td>
                                      <td><center><?php echo $d['nama_unit']; ?></center></td>
                                      <td><center>
                                        <?php
                                        if($status='1'){
                                          echo $d['status'];
                                        }else{
                                          echo $d['nama_dokter'];
                                        }
                                        ?>
                                      </td>
                                      <td><center><a href="dokter-edit?id=<?php echo $d['id_dokter']; ?>"
                                        <button type="button" class="btn btn-warning"><i class='fa fa-pencil'></i></button></a></center></td>
                                        <td>
                                          <div align="center">
                                            <a href="dokter-hapus?id=<?php echo $d['id_dokter']; ?>"
                                             onclick="javascript: return confirm('Anda yakin hapus?')"
                                             <button type="button" name="hapus" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                             </div>
                                           </td>
                                           </tr><?php } ?>
                                         </tbody>
                                       </table>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                               <div class="tab-pane fade in" id="2">
                                <?php include 'petugas-tambah.php';?>
                              </div>
                            </div>
                          </div><!-- /#wrapper -->
                          <?php include "views/footer.php"; ?> 