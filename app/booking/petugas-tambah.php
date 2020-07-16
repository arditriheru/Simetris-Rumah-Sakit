<div class="row">
  <div class="table-responsive">
    <div class="col-lg-12">
     <?php
     if(isset($_POST['tambah'])){
      $nama_petugas = $_POST['nama_petugas'];
      $pelayanan = $_POST['pelayanan'];
      $status       = '1';

      $error=array();
      if (empty($nama_petugas)){
        $error['nama_petugas']='Nama Petugas Harus Diisi!!!';
      }if (empty($pelayanan)){
        $error['pelayanan']='Pelayanan Petugas Harus Diisi!!!';
      }if(empty($error)){
        $simpan=mysqli_query($koneksi,"INSERT INTO mr_petugas (id_petugas, nama_petugas, status, pelayanan)
          VALUES('','$nama_petugas','$status','$pelayanan')");
        if($simpan){
          echo '<script>
          setTimeout(function() {
            swal({
              title: "Sukses!!!",
              text: "Berhasil Menambah Petugas",
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
                    <label>Nama Petugas</label>
                    <input class="form-control" type="text" name="nama_petugas" placeholder="Contoh : Heru Sarmuji, S.Psi">
                    <p style="color:blue">Tuliskan nama petugas sesuai di SIMRS!!!
                      <p style="color:red;"><?php echo ($error['nama_petugas']) ? $error['nama_petugas'] : ''; ?></p>
                    </div>
                    <div class="form-group">
                      <label>Pelayanan</label>
                      <select class="form-control" type="text" name="pelayanan" required="">
                        <p style="color:red;"><?php echo ($error['pelayanan']) ? $error['pelayanan'] : ''; ?></p>
                        <option disabled selected>Pilih</option>
                        <option value='1'>Tumbuh Kembang</option>
                        <option value='2'>Antenatal Care</option>"
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
                        <th><center>Nama Petugas</center></th>
                        <th><center>Pelayanan</center></th>
                        <th><center>Status</center></th>
                        <th colspan="2"><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $data = mysqli_query($koneksi,
                        "SELECT *,  IF (status='1', 'Aktif', 'Nonaktif') AS status FROM mr_petugas ORDER BY pelayanan, nama_petugas ASC;");
                      while($d = mysqli_fetch_array($data)){
                        $status = $d['status'];
                        ?>
                        <tr>
                          <td><center><?php echo $no++; ?></center></td>
                          <td><left><?php echo $d['nama_petugas']; ?></left></td>
                          <td><center>
                            <?php 
                            if($d['pelayanan']==1){
                              echo 'Tumbuh Kembang';
                            }elseif($d['pelayanan']==2){
                              echo 'Antenatal Care';
                            }
                            ?>
                          </center></td>
                          <td><center>
                            <?php
                            if($status='1'){
                              echo $d['status'];
                            }else{
                              echo $d['nama_petugas'];
                            }
                            ?>
                          </td>
                          <td><center><a href="petugas-edit?id=<?php echo $d['id_petugas']; ?>"
                            <button type="button" class="btn btn-warning"><i class='fa fa-pencil'></i></button></a></center></td>
                            <td>
                              <div align="center">
                                <a href="petugas-hapus?id=<?php echo $d['id_petugas']; ?>"
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