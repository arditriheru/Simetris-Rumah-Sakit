<?php
header("Content-type: application/ms-excel");
header("Content-Disposition: attachment; filename=laporan-stok-obat ".date('dmY').".xls");
?>
<!DOCTYPE html>
<html>
<body>
    <?php 
    include '../../config/connect.php';
    $generik    = $_POST['generik'];
    $awal       = $_POST['awal'];
    $akhir      = $_POST['akhir'];
    ?>
    <table align="center" border="1">
        <h2 align="center">Laporan Stok Obat</h2>
        <h3 align="center">Tanggal : <?php echo $awal ?> - <?php echo $akhir ?></h3>
        <tr>
           <th><center>No</th>
            <th><center>Kode Obat</th>
                <th><center>Jenis Obat</th>
                    <th><center>Nama Obat</th>
                        <th><center>Jumlah</th>
                        </tr>
                        <?php 
                        $no=1;
                        $data = mysqli_query($koneksi,"
                            SELECT far_generik.nama_generik, far_stok.satuan, far_satuan.nama,
                            SUM(isi) AS hasil
                            FROM far_generik, far_stok, far_satuan
                            WHERE far_satuan.id_satuan=far_stok.satuan
                            AND far_generik.id_far_generik=far_stok.generik
                            AND tanggal BETWEEN '$awal' AND '$akhir'
                            AND generik = '$generik'
                            GROUP BY far_satuan.id_satuan
                            ORDER BY hasil DESC;");
                        while($d = mysqli_fetch_array($data)){
                            ?>
                            <tr>
                                <td><center><?php echo $no++; ?></td>
                                    <td><center><?php echo $d['satuan']; ?></td>
                                        <td><center><?php echo $d['nama_generik']; ?></td>
                                            <td><center><?php echo $d['nama']; ?></td>
                                                <td><center><?php echo $d['hasil']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                    </body>
                                    </html>