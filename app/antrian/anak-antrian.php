<?php
include "views/header.php";
include "controller/anak-controller.php";
?>
<script type="text/javascript">
	var antriananak = setInterval(
		function(){
			$('#antriananak').load('anak-antrian.php').fadeIn("slow");
		}, 5000);
	</script>
	<div id="antriananak">
		<font class="antrian">A<?php echo $anak_ant; ?></font><br><br>
		<?php
		if(!$anak_nama_dokter){
			?>
			<font class="blacktext" size="6">Tutup</font><br><br>
			<?php
		}else{
			?>
			<font class="blacktext" size="6"><?php echo $anak_nama_dokter?></font><br><br>
			<?php
		}
		?>
		<font class="greentext" size="6">Total <?php echo $max; ?> Pasien</font>
	</div>
	<?php include "views/footer.php";?>