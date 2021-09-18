<?php include "controller/obsgyn.php" ?>
<script type="text/javascript">
	var antrianobgsyn = setInterval(
		function(){
			$('#antrianobgsyn').load('bell-antrian-obsgyn.php').fadeIn("slow");
		},2000);
	</script>
	<div id="antrianobgsyn">
		<font class="antrian">A<?php echo $a_tcounter; ?></font><br>
		<font class="greentext" size="5">Panggilan selanjutnya A<?php echo $a_ncounter?></font>
		<br>
		<font class="greentext" size="6"><strong>Total <?php echo $a_total ?> Pasien</strong></font>
		<br>
		<font class="blacktext" size="5"><?php echo $a_nama_dokter?></font><br><br>
	</div>