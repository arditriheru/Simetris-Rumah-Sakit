<?php
header("Content-type: application/ms-excel");
header("Content-Disposition: attachment; filename=rekap-kepuasan-pasien-".date('d-m-Y').".xls");

include '../../config/connect.php';
$skor       = $_POST['skor'];
$awal       = $_POST['awal'];
$akhir      = $_POST['akhir'];
?>
<html>
<body>
    <table align="center" border="1">
        <h3 align="center">Rekap Kepuasan Pasien</h3>
        <h3 align="center">Periode <?php echo $awal." - ".$akhir ?></h3>
        <h4></h4>
        <tr>
            <th><center>#</center></th>
            <th><center>Koresponden</center></th>
            <th><center>Kontak</center></th>
            <th><center>Pelayanan</center></th>
            <th><center>Poliklinik</center></th>
            <th><center>Bagian</center></th>
            <th><center>Dokter</center></th>
            <th><center>Skor</center></th>
            <th><center>Tanggal / Jam</center></th>
        </tr>
        <?php
        $no=1;
        if($skor==0){ 
          $data = mysqli_query($koneksi,
            "SELECT *, dokter.nama_dokter,
            CASE
            WHEN kuesioner.pelayanan='1' THEN 'Rawat Jalan'
            WHEN kuesioner.pelayanan='2' THEN 'Rawat Inap'
            END AS nama_pelayanan,
            CASE
            WHEN kuesioner.poliklinik='0' THEN '-'
            WHEN kuesioner.poliklinik='1' THEN 'Poli Anak'
            WHEN kuesioner.poliklinik='2' THEN 'Poli Kandungan'
            WHEN kuesioner.poliklinik='3' THEN 'ANC Terpadu'
            WHEN kuesioner.poliklinik='4' THEN 'Tumbuh Kembang'
            END AS nama_poliklinik,
            CASE
            WHEN kuesioner.bagian='parkir' THEN 'Parkir'
            WHEN kuesioner.bagian='satpam' THEN 'Satpam'
            WHEN kuesioner.bagian='pendaftaran' THEN 'Pendaftaran'
            WHEN kuesioner.bagian='poliklinik' THEN 'Poliklinik'
            WHEN kuesioner.bagian='dokter_umum' THEN 'Dokter Umum'
            WHEN kuesioner.bagian='perawat_ugd' THEN 'Perawat UDG'
            WHEN kuesioner.bagian='perawat_bidan' THEN 'Bidan / Perawat'
            WHEN kuesioner.bagian='dokter_spesialis' THEN 'Dokter Spesialis'
            WHEN kuesioner.bagian='laboratorium' THEN 'Laboratorium'
            WHEN kuesioner.bagian='farmasi' THEN 'Farmasi'
            WHEN kuesioner.bagian='gizi' THEN 'Gizi'
            WHEN kuesioner.bagian='kebersihan' THEN 'Kebersihan'
            WHEN kuesioner.bagian='sarpras' THEN 'Sarpras'
            WHEN kuesioner.bagian='kasir' THEN 'Kasir'
            WHEN kuesioner.bagian='rekomendasi' THEN 'Rekomendasi'
            END AS nama_bagian,
            CASE
            WHEN kuesioner.skor='1' THEN 'Sangat Puas'
            WHEN kuesioner.skor='2' THEN 'Cukup Puas'
            WHEN kuesioner.skor='3' THEN 'Tidak Puas'
            WHEN kuesioner.skor='4' THEN 'Sangat Ingin'
            WHEN kuesioner.skor='5' THEN 'Cukup Ingin'
            WHEN kuesioner.skor='6' THEN 'Tidak Ingin'
            END AS nama_skor
            FROM kuesioner, dokter
            WHERE kuesioner.id_dokter=dokter.id_dokter
            AND tanggal BETWEEN '$awal' AND '$akhir'
            ORDER BY kuesioner.id_kuesioner ASC");
            while($d = mysqli_fetch_array($data)){ ?>
               <tr>
                  <td><center><?php echo $no++; ?></center></td>
                  <td><center><?php echo $d['nama']; ?></center></td>
                  <td><center><?php echo $d['kontak']; ?></center></td>
                  <td><center><?php echo $d['nama_pelayanan']; ?></center></td>
                  <td><center><?php echo $d['nama_poliklinik']; ?></center></td>
                  <td><center><?php echo $d['nama_bagian']; ?></center></td>
                  <td><center><?php echo $d['nama_dokter']; ?></center></td>
                  <td><center>
                    <?php if($d['skor']==3 || $d['skor']==6){
                      ?>
                      <font class="redtext"><?php echo $d['nama_skor']; ?></font>
                  <?php }else{ ?>
                      <?php echo $d['nama_skor']; ?>
                  <?php } ?>
              </center></td>
              <td><center><?php echo $d['tanggal'].' / '.$d['jam']; ?></center></td>
          </tr>
      <?php } }else{ 
          $data = mysqli_query($koneksi,
            "SELECT *, dokter.nama_dokter,
            CASE
            WHEN kuesioner.pelayanan='1' THEN 'Rawat Jalan'
            WHEN kuesioner.pelayanan='2' THEN 'Rawat Inap'
            END AS nama_pelayanan,
            CASE
            WHEN kuesioner.poliklinik='0' THEN '-'
            WHEN kuesioner.poliklinik='1' THEN 'Poli Anak'
            WHEN kuesioner.poliklinik='2' THEN 'Poli Kandungan'
            WHEN kuesioner.poliklinik='3' THEN 'ANC Terpadu'
            WHEN kuesioner.poliklinik='4' THEN 'Tumbuh Kembang'
            END AS nama_poliklinik,
            CASE
            WHEN kuesioner.bagian='parkir' THEN 'Parkir'
            WHEN kuesioner.bagian='satpam' THEN 'Satpam'
            WHEN kuesioner.bagian='pendaftaran' THEN 'Pendaftaran'
            WHEN kuesioner.bagian='poliklinik' THEN 'Poliklinik'
            WHEN kuesioner.bagian='dokter_umum' THEN 'Dokter Umum'
            WHEN kuesioner.bagian='perawat_ugd' THEN 'Perawat UDG'
            WHEN kuesioner.bagian='perawat_bidan' THEN 'Bidan / Perawat'
            WHEN kuesioner.bagian='dokter_spesialis' THEN 'Dokter Spesialis'
            WHEN kuesioner.bagian='laboratorium' THEN 'Laboratorium'
            WHEN kuesioner.bagian='farmasi' THEN 'Farmasi'
            WHEN kuesioner.bagian='gizi' THEN 'Gizi'
            WHEN kuesioner.bagian='kebersihan' THEN 'Kebersihan'
            WHEN kuesioner.bagian='sarpras' THEN 'Sarpras'
            WHEN kuesioner.bagian='kasir' THEN 'Kasir'
            WHEN kuesioner.bagian='rekomendasi' THEN 'Rekomendasi'
            END AS nama_bagian,
            CASE
            WHEN kuesioner.skor='1' THEN 'Sangat Puas'
            WHEN kuesioner.skor='2' THEN 'Cukup Puas'
            WHEN kuesioner.skor='3' THEN 'Tidak Puas'
            WHEN kuesioner.skor='4' THEN 'Sangat Ingin'
            WHEN kuesioner.skor='5' THEN 'Cukup Ingin'
            WHEN kuesioner.skor='6' THEN 'Tidak Ingin'
            END AS nama_skor
            FROM kuesioner, dokter
            WHERE kuesioner.id_dokter=dokter.id_dokter
            AND skor='$skor'
            AND tanggal BETWEEN '$awal' AND '$akhir'
            ORDER BY kuesioner.id_kuesioner ASC");
            while($d = mysqli_fetch_array($data)){ ?>
              <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><center><?php echo $d['nama']; ?></center></td>
                <td><center><?php echo $d['kontak']; ?></center></td>
                <td><center><?php echo $d['nama_pelayanan']; ?></center></td>
                <td><center><?php echo $d['nama_poliklinik']; ?></center></td>
                <td><center><?php echo $d['nama_bagian']; ?></center></td>
                <td><center><?php echo $d['nama_dokter']; ?></center></td>
                <td><center>
                  <?php if($d['skor']==3 || $d['skor']==6){
                    ?>
                    <font class="redtext"><?php echo $d['nama_skor']; ?></font>
                <?php }else{ ?>
                    <?php echo $d['nama_skor']; ?>
                <?php } ?>
            </center></td>
            <td><center><?php echo $d['tanggal'].' / '.$d['jam']; ?></center></td>
        </tr>
    <?php } } ?>
</table>
</body>
</html>