<?php include "views/header.php";?>
<body bgcolor="#248ea9" style="margin:0;" onload="waktu()">
	<div id="page-wrapper">
		<div class="row">
			<div align="left" class="col-lg-1">
				<h3 class="whitetext"><?php include "views/digital-timer.php";?></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-3">
						<div class="row">
							<div align="center" class="panel-queue panel-primary-queue">
								<div class="panel-heading">
									<h3>Poli Anak</h3>
								</div>
								<div class="bs-example">
									<?php 
									include "bell-antrian-anak.php";
									?><br><br>
								</div>
							</div>
						</div>
						<div class="row">
							<div align="center" class="panel-queue panel-primary-queue">
								<div class="panel-heading">
									<h3>Poli Kandungan</h3>
								</div>
								<div class="bs-example">
									<?php 
									include "bell-antrian-obsgyn.php";
									?><br><br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.row -->
	</div><!-- /.wrapper -->
</body>
<?php include "views/footer.php";?>
