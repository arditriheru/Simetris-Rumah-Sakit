<?php include "controller/anak.php" ?>
<script type="text/javascript">
	var antriananak = setInterval(
		function(){
			$('#antriananak').load('bell-antrian-anak.php').fadeIn("slow");
		},2000);
	</script>
	<div id="antriananak">
		<font class="antrian">B<?php echo $b_tcounter; ?></font><br>
		<font class="greentext" size="5">Panggilan selanjutnya B<?php echo $b_ncounter?></font>
		<br>
		<font class="greentext" size="6"><strong>Total <?php echo $b_total ?> Pasien</strong></font>
		<br>
		<font class="blacktext" size="5"><?php echo $b_nama_dokter?></font><br><br>
	</div>