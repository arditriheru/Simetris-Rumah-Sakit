<?php include "controller/kandungan-controller.php";?>
<script type="text/javascript">
	var kandunganadd = setInterval(
		function(){
			$('#kandunganadd').load('kandungan-add.php').fadeIn("slow");
		}, 1000);
	</script>
	<div id="kandunganadd">
		<?php 
		if($total>$max){
			date_default_timezone_set("Asia/Jakarta");
			$id_ant_kandungan		= $max+1;
			$status					= 2;
			$loop					= $total;

			for ($x = $id_ant_kandungan; $x<=$loop; $x++) {
				mysqli_query($koneksi,"INSERT INTO ant_kandungan(id_ant_kandungan, status)VALUES('$id_ant_kandungan','$status')");
				header("location:kandungan-dashboard");
			}
		}
		?>
	</div>