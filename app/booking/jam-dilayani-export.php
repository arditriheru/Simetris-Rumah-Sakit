<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekap Waktu Pelayanan ".date('dmY').".xls");

include "views/header.php";

$id_dokter  = $_GET['dokter'];
$id_sesi    = $_GET['sesi'];

$a = mysqli_query($koneksi,
    "SELECT nama_dokter FROM dokter WHERE id_dokter = '$id_dokter';");
while($b = mysqli_fetch_array($a)){
    $nama_dokter = $b['nama_dokter'];
}

?>
<body>
   <table align="center" border="0">
    <p align="center">Rekap Waktu Pelayanan<br>
        Dokter <?php echo $nama_dokter ?><br>
        Tanggal : <?php echo $tanggalsekarang ?></p>
        <tr>
            <th><center>No</center></th>
            <th><center>Nomor RM</center></th>
            <th><center>Nama Pasien</center></th>
            <th><center>Waktu Mulai</center></th>
            <th><center>Waktu Akhir</center></th>
            <th><center>Total</center></th>
        </tr>
        <?php 
        $no = 1;
        $data = mysqli_query($koneksi,
            "SELECT id_catatan_medik,nama,mulai,akhir FROM booking
            WHERE id_dokter = '$id_dokter' AND id_sesi = '$id_sesi' AND booking_tanggal = '$tanggalsekarang' ORDER BY id_booking ASC;");
        while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                <td><center><?php echo $d['nama']; ?></center></td>
                <td><center><?php echo $d['mulai']; ?></center></td>
                <td><center><?php echo $d['akhir']; ?></center></td>
                <td>
                    <center>
                        <?php 
                            $mulai = strtotime($d['mulai']); //waktu mulai
                            $akhir = strtotime($d['akhir']); //waktu akhir
                            $diff  = $akhir - $mulai;
                            $jam   = floor($diff/(60*60));
                            $menit = $diff-$jam*(60*60);
                            echo $jam.":".floor($menit/60);
                            ?>
                        </center>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
    <?php include "views/footer.php"; ?>