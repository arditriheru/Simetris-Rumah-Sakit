<?php include "controller/anak-controller.php";?>
<!-- <script type="text/javascript">
	var anakadd = setInterval(
		function(){
			$('#anakadd').load('anak-add.php').fadeIn("slow");
		}, 1000);
	</script> -->
	<div id="anakadd">
		<?php 
		if($total>$max){
			date_default_timezone_set("Asia/Jakarta");
			$id_ant_anak	= $max+1;
			$status			= 2;
			$loop			= $total;

			for ($x = $id_ant_anak; $x<=$loop; $x++) {
				mysqli_query($koneksi,"INSERT INTO ant_anak(id_ant_anak, status)VALUES('$id_ant_anak',
					'$status')");
				header("location:anak-dashboard");
			}
		}
		?>
	</div>