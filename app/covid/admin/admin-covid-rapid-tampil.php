<div class="row">
  <div class="col-lg-12">
    <div class="table-responsive">
      <div class="row">
        <form method="post" action="covid-rapid-cari-tampil" role="form">
          <div class="col-lg-6">
            <div class="form-group input-group">
              <input type="text" class="form-control" name="id_catatan_medik" placeholder="Pencarian..">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
              </span>
            </div>
          </div>
        </form>
        <div align="right" class="col-lg-6">
          <?php
          $m = 31;
          $n = 7;
          $nextN = mktime(0, 0, 0, date("m"), date("d") + $m, date("Y"));
          $prevN = mktime(0, 0, 0, date("m"), date("d") - $n, date("Y"));
          $mak   = date("Y-m-d", $nextN);
          $min   = date("Y-m-d", $prevN);

          $data = mysqli_query($koneksi,
            "SELECT COUNT(id_rapidtest) AS total
            FROM rapidtest
            WHERE tanggal BETWEEN '$min' AND '$mak';");
          while($d = mysqli_fetch_array($data)){
            $total = $d['total'];
            ?>
            <h1><small>Total <?php echo $total; }?> Pasien</small></h1>
          </div>
        </div>
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
             <th><center>#</center></th>
             <th><center>No. RM</center></th>
             <th><center>Nama Pasien</center></th>
             <th><center>Dokter</center></th>
             <th><center>IgM</center></th>
             <th><center>IgG</center></th>
             <th><center>Register</center></th>
             <th colspan='2'><center>Action</center></th>
           </tr>
         </thead>
         <tbody>
          <?php
          $no=$total;
          $data = mysqli_query($koneksi,
            "SELECT *, mr_dokter.nama_dokter,
            CASE
            WHEN rapidtest.igm='0' THEN 'Non Reaktif'
            WHEN rapidtest.igm='1' THEN 'Reaktif'
            WHEN rapidtest.igm='3' THEN 'On Process'
            END AS nama_igm,
            CASE
            WHEN rapidtest.igg='0' THEN 'Non Reaktif'
            WHEN rapidtest.igg='1' THEN 'Reaktif'
            WHEN rapidtest.igg='3' THEN 'On Process'
            END AS nama_igg
            FROM rapidtest, mr_dokter
            WHERE rapidtest.id_dokter=mr_dokter.id_dokter
            ORDER BY rapidtest.id_rapidtest DESC");
          while($d = mysqli_fetch_array($data)){
            $tgl_periksa  = $d['tgl_periksa'];
            $tanggal      = $d['tanggal'];
            $lahir        = new DateTime($d['tgl_lahir']);
            $today        = new DateTime();
            $umur         = $today->diff($lahir);
            ?>
            <tr>
              <td><center><?php echo $no--; ?></center></td>
              <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
              <td><center><?php echo $d['nama']; ?></center></td>
              <td><center><?php echo $d['nama_dokter']; ?></center></td>
              <td><center>
                <?php
                if($d['igm']==1){
                  ?>
                  <font class="redtext"><?php echo $d['nama_igm']; ?></font>
                  <?php
                }elseif($d['igm']==0){
                  ?>
                  <font class="greentext"><?php echo $d['nama_igm']; ?></font>
                  <?php
                }else{
                  ?>
                  <font class="blacktext"><?php echo $d['nama_igm']; ?></font>
                  <?php
                }
                ?>
              </center></td>
              <td><center>
                <?php
                if($d['igg']==1){
                  ?>
                  <font class="redtext"><?php echo $d['nama_igg']; ?></font>
                  <?php
                }elseif($d['igg']==0){
                  ?>
                  <font class="greentext"><?php echo $d['nama_igg']; ?></font>
                  <?php
                }else{
                  ?>
                  <font class="blacktext"><?php echo $d['nama_igg']; ?></font>
                  <?php
                }
                ?>
              </center></td>
              <td><center><?php echo $d['tanggal'].' / '.$d['jam']; ?></center></td>
              <td>
                <div align="center">
                  <a href="admin-covid-rapid-detail?id=<?php echo $d['id_rapidtest']; ?>"
                    <button type="button" class="btn btn-primary"><i class='fa fa-print'></i></button></a>
                  </div>
                </td>
                <td>
                  <div align="center">
                    <a href="admin-covid-rapid-edit?id=<?php echo $d['id_rapidtest']; ?>"
                      <button type="button" class="btn btn-warning"><i class='fa fa-pencil'></i></button></a>
                    </div>
                  </td>
                  </tr><?php } ?>
                </tbody>
              </table>
            </div>
</div><!-- /.row -->