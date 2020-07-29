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
		<font class="antrian">B<?php echo $kandungan_ant; ?></font><br>
		<?php
		if(!$kandungan_nama_dokter){
			?>
			<font class="blacktext" size="5">Tutup</font><br>
			<font class="greentext" size="4"><strong>Total 0 Pasien</strong></font>
			<?php
		}else{
			?>
			<font class="blacktext" size="3"><?php echo $kandungan_nama_dokter?></font><br>
			<font class="greentext" size="4"><strong>Total <?php echo $total_kandungan_antrian; ?> Pasien</strong></font>
			<?php
		}
		?>
	</div>
	<?php include "views/footer.php";?>
