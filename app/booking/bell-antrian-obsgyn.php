<?php
include "views/header.php";
$a = mysqli_query($koneksi,
	"SELECT *, dokter.nama_dokter
	FROM antrian, dokter, mr_unit
	WHERE antrian.id_dokter=dokter.id_dokter
	AND dokter.id_unit=mr_unit.id_unit
	AND mr_unit.id_unit='1';");
while($b = mysqli_fetch_array($a)){
	$obsgyn_nama_dokter 	= $b['nama_dokter'];
	$obsgyn_antrian 		= $b['antrian'];
	$obsgyn_total 		= $b['total'];
}
?>
<script type="text/javascript">
	var antrianobsgyn = setInterval(
		function(){
			$('#antrianobsgyn').load('bell-antrian-obsgyn.php').fadeIn("slow");
		}, 5000);
	</script>
	<div id="antrianobsgyn">
		<font class="antrian">B<?php echo $obsgyn_antrian; ?></font><br>
		<?php
		if(!$obsgyn_nama_dokter){
			?>
			<font class="blacktext" size="5">Tutup</font><br>
			<font class="greentext" size="4"><strong>Total 0 Pasien</strong></font>
			<?php
		}else{
			?>
			<font class="blacktext" size="3"><?php echo $obsgyn_nama_dokter; ?></font><br>
			<font class="greentext" size="4"><strong>Total <?php echo $obsgyn_total; ?> Pasien</strong></font>
			<?php
		}
		?>
	</div>
