<?php include "controller/kandungan-controller.php";?>
<script type="text/javascript">
	var kandungantotal = setInterval(
		function(){
			$('#kandungantotal').load('kandungan-total.php').fadeIn("slow");
		}, 10000);
	</script>
	<div id="kandungantotal">
		<?php echo $total;?>
	</div>