<?php
include "views/header.php";
include "controller/kandungan-controller.php";
?>
<script type="text/javascript">
	var antriankandungan = setInterval(
		function(){
			$('#antriankandungan').load('kandungan-antrian.php').fadeIn("slow");
		}, 5000);
	</script>
	<div id="antriankandungan">
		<font class="antrian">B<?php echo $kandungan_ant; ?></font><br><br>
		<?php
		if(!$kandungan_nama_dokter){
			?>
			<font class="blacktext" size="6">Tutup</font><br><br>
			<?php
		}else{
			?>
			<font class="blacktext" size="6"><?php echo $kandungan_nama_dokter?></font><br><br>
			<?php
		}
		?>
		<font class="greentext" size="6">Total <?php echo $max; ?> Pasien</font>
	</div>
	<?php include "views/footer.php";?>
