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
		<font class="antrian">A<?php echo $anak_ant; ?></font><br>
		<?php
		if(!$anak_nama_dokter){
			?>
			<font class="blacktext" size="5">Tutup</font><br>
			<font class="greentext" size="4"><strong>Total 0 Pasien</strong></font>
			<?php
		}else{
			?>
			<font class="blacktext" size="3"><?php echo $anak_nama_dokter?></font><br>
			<font class="greentext" size="4"><strong>Total <?php echo $total_anak_antrian; ?> Pasien</strong></font>
			<?php
		}
		?>
	</div>
	<?php include "views/footer.php";?>