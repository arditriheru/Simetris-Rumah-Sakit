<div class="row">
  <div class="col-lg-12">
    <div class="table-responsive">
      <div class="row">
        <form method="post" action="suket-lahir-cari" role="form">
          <div class="col-lg-4">
            <div class="form-group input-group">
              <input type="text" class="form-control" name="id_catatan_medik" placeholder="Pencarian..">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
              </span>
            </div>
          </div>
        </form>
        <div align="right" class="col-lg-8">
          <?php
          $m = 7;
          $n = 7;
          $nextN = mktime(0, 0, 0, date("m"), date("d") + $m, date("Y"));
          $prevN = mktime(0, 0, 0, date("m"), date("d") - $n, date("Y"));
          $mak   = date("Y-m-d", $nextN);
          $min   = date("Y-m-d", $prevN);

          $data = mysqli_query($koneksi,
            "SELECT COUNT(id_suket) AS total
            FROM mr_suket
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
             <th><center>Kode</center></th>
             <th><center>No. RM</center></th>
             <th><center>Nama Pasien</center></th>
             <th><center>Dokter</center></th>
             <th><center>Registrasi</center></th>
             <th colspan='3'><center>Action</center></th>
           </tr>
         </thead>
         <tbody>
          <?php
          $no=$total;
          $data = mysqli_query($koneksi,
            "SELECT *, mr_pasien.nama, dokter.nama_dokter,
            IF(mr_suket.kode_jenis='1', 'SKL', 'Surat Keterangan') AS nama_jenis
            FROM mr_suket, mr_pasien, dokter
            WHERE mr_suket.id_catatan_medik=mr_pasien.id_catatan_medik
            AND mr_suket.id_dokter=dokter.id_dokter
            AND mr_suket.tanggal BETWEEN '$min' AND '$mak'
            ORDER BY mr_suket.id_suket DESC");
          while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
              <td><center><?php echo $no--; ?></center></td>
              <td><center><?php echo $d['id_suket']."/RM-".$d['nama_jenis'];?></center></td>
              <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
              <td><center><?php echo $d['nama']; ?></center></td>
              <td><center><?php echo $d['nama_dokter']; ?></center></td>
              <td><center><?php echo date("d-m-Y", strtotime($d['tanggal'])).' / '.$d['jam']; ?></center></td>
              <td>
                <div align="center">
                  <a href="suket-lahir-print?id=<?php echo $d['id_suket']; ?>">
                    <button type="button" class="btn btn-primary"><i class='fa fa-print'></i></button></a>
                  </div>
                </td>
                <td>
                  <div align="center">
                    <a href="suket-lahir-edit?id=<?php echo $d['id_suket']; ?>">
                      <button type="button" class="btn btn-warning"><i class='fa fa-edit'></i></button></a>
                    </div>
                  </td>
                  </tr><?php } ?>
                </tbody>
              </table>
            </div>
          </div><!-- /.row -->
