<?php include "controller/anak-controller.php";?>
<script type="text/javascript">
	var anaktotal = setInterval(
		function(){
			$('#anaktotal').load('anak-total.php').fadeIn("slow");
		}, 10000);
	</script>
	<div id="anaktotal">
		<?php echo $total;?>
	</div>