<?php
include "views/header.php";
include "controller/kandungan-session.php";
include "controller/kandungan-controller.php";
?>
<nav>
	<div id="wrapper">
		<?php include "kandungan-menu.php"; ?>   
	</div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Poli Kandungan <small> <?php include 'tanggal-sekarang.php';?></small></h1>
			<?php include "../notifikasi1.php"?>
		</div>
	</div><!-- /.row -->
	<?php $loket="1";?>
	<audio id="suarabel" src="rekaman/bell-bandara.mp3"></audio>
	<audio id="suarabelnomorurut" src="rekaman/nomor-antrian.mp3"></audio>
	<audio id="suarabelabjad" src="rekaman/b.mp3"></audio> 
	<audio id="suarabelsuarabelloket" src="rekaman/ke-poli-kandungan.mp3"></audio>
	<audio id="belas" src="rekaman/belas.mp3"></audio> 
	<audio id="sebelas" src="rekaman/sebelas.mp3"></audio> 
	<audio id="puluh" src="rekaman/puluh.mp3"></audio> 
	<audio id="sepuluh" src="rekaman/sepuluh.mp3"></audio> 
	<audio id="ratus" src="rekaman/ratus.mp3"></audio> 
	<audio id="seratus" src="rekaman/seratus.mp3"></audio> 
	<?php
	$c = mysqli_query($koneksi,
		"SELECT id_ant_kandungan
		FROM ant_kandungan
		WHERE status=1;");
	while($d = mysqli_fetch_array($c)){
		$tcounter 	= $d['id_ant_kandungan'];
		$panjang	= strlen($tcounter);
		$antrian 	= $tcounter;
		for($i=0;$i<$panjang;$i++){
			$id_ant_kandungan = $d['id_ant_kandungan']+1;
			?>
			<!--SUARA NOMOR URUT-->
			<audio id="suarabel<?php echo $i;?>"
				src="rekaman/<?php echo substr($tcounter,$i,1); ?>.mp3" >
			</audio>
			<?php
		}
	}
	?>   
	<div class="row">
		<div class="col-lg-6">
			<div align="center" class="panel panel-primary">
				<div class="panel-heading">
					<h2>Nomor Antrian</h2>
				</div><br>
				<div class="bs-example">
					<font class="redtext" size="4"><?php echo $nama_dokter?></font><br><br>
					<font size="10">B<?php echo $tcounter; ?></font><br>
					<font size="6">Poli Kandungan</font><br><br>
					<a href="kandungan-next.php"><button name="next" type="submit" 
						class="btn btn-success btn-lg">Next</button></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a name="play" onclick="mulai();" type="button" 
						class="btn btn-primary btn-lg">Play</a>
						<br><br>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div align="center" class="panel panel-primary">
					<div class="panel-heading">
						<h2>Jumlah Antrian</h2>
					</div><br>
					<div class="bs-example">
						<font class="redtext" size="4"><?php echo $nama_dokter?></font><br><br>
						<font size="10"><?php echo $total;?></font><br>
						<font size="6">Pasien</font><br><br>
						<button name="next" type="submit" 
						class="btn btn-warning btn-lg" onClick="window.location.reload()">Refresh</button>
						<br><br>
					</div>
				</div>
			</div>
			<?php include '../../system/copyright.php';?>
		</div>
		<script type="text/javascript">
			function onWindowClosing() {
				if (window.event.clientX < 0 || window.event.clientY < 0) {
					$.ajax({
						type: "POST",
						url: "/Account/OnWindowClosing"
					});
				}
			};
			function onKeydown(evt) {
            if (evt != undefined && evt.altKey && evt.keyCode == 115) //Alt + F4 
            {
            	$.ajax({
            		type: "POST",
            		url: "/Account/OnWindowClosing"
            	});
            }
        };
        window.onbeforeunload = onWindowClosing;
        window.document.onkeydown = onKeydown; 
    </script>
    <?php include "controller/suara.php";?><br><br><!-- /#page-wrapper -->
    <?php include "views/footer.php"; ?>
