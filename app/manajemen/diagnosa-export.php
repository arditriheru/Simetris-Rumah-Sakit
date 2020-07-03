<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekap Diagnosa Penyakit ".date('d/m/Y').".xls");
?>
<!DOCTYPE html>
<html>
<body>
    <?php
    $id_dokter = $_POST['id_dokter'];
    $awal = $_POST['awal'];
    $akhir = $_POST['akhir'];
    ?>
    <table border="1"  class="table table-bordered table-hover table-striped tablesorter">
        <thead>
           <h2 align="center">Rekap Data</h2>
           <h2 align="center">Diagnosa Penyakit</h2>
           <h3 align="center">Periode : <?php echo $awal ?> - <?php echo $akhir ?></h3>
           <tr>
            <th><div align="center">No</div></th>
            <th><div align="center">Nama Dokter</div></th>
            <th><div align="center">ICD</div></th>
            <th><div align="center">Diagnosa</div></th>
            <th><div align="center">Jumlah</div></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        include '../../config/connect.php';
        $no = 1;
        $data = mysqli_query($koneksi,"
            SELECT mr_rla.icd, MR_ICD.diagnosa, mr_dokter.nama_dokter,
            COUNT(*) AS 'hasil'
            FROM mr_rla, MR_ICD, mr_bl, mr_dokter
            WHERE mr_rla.id_mr_bl = mr_bl.id_mr_bl
            AND mr_bl.id_dokter = mr_dokter.id_dokter
            AND mr_rla.icd = MR_ICD.icd
            AND mr_bl.id_dokter = '$id_dokter'
            AND mr_rla.tanggal BETWEEN '$awal' AND '$akhir'
            GROUP BY icd
            ORDER BY hasil DESC;");
        while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><div align="center"><?php echo $no++; ?></div></td>
                <td><div align="center"><?php echo $d['nama_dokter']; ?></div></td>
                <td><div align="center"><?php echo $d['icd']; ?></div></td>
                <td><?php echo $d['diagnosa']; ?></td>
                <td><div align="center"><?php echo $d['hasil']; ?></div></td>
            </tr>
            <?php 
        }
        ?>
    </tbody>
</table>
</body>
</html>